<?php

namespace App\Http\Controllers;

use App\Models\candidate_contact;
use App\Models\candidates;
use App\Models\companies;
use App\Models\companies_contact;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function profile()
    {
        return view('profile');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role_id' => 'required|in:1,2,3', // validasi role_id, termasuk admin (1)
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'role_id.required' => 'Role ID tidak boleh kosong',
            'role_id.in' => 'Role ID tidak valid',
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Cek apakah email sudah terdaftar
        $userExists = DB::table('users')
            ->where('email', $request->email)
            ->exists();

        if (!$userExists) {
            return redirect('/login')
                ->withErrors('Email belum terdaftar')
                ->withInput();
        }

        if (Auth::attempt($infoLogin)) {
            $user = Auth::user();
            $role_id = $request->role_id;

            // Cek apakah user memiliki role yang sesuai
            $hasRole = DB::table('role_users')
                ->where('user_id', $user->id)
                ->where('role_id', $role_id)
                ->exists();

            if ($hasRole) {
                // Arahkan pengguna berdasarkan role_id
                if ($role_id == 1) {
                    // Admin redirect
                    return redirect()->route('dashboard.admin');
                } elseif ($role_id == 3) {
                    // Recruiter redirect
                    return redirect()->route('dashboard.recruiter');
                } elseif ($role_id == 2) {
                    // Participant redirect
                    return redirect()->route('dashboard.kandidat');
                }
            } else {
                Auth::logout();
                session(['selected_tab' => $request->input('selected_tab')]); // Simpan tab terakhir yang dipilih sebelum logout

                return redirect('/login')
                    ->withErrors('Anda tidak terdaftar dengan peran yang sesuai')
                    ->withInput();
            }
        } else {
            return redirect('login')->withErrors('Email atau password salah')->withInput();
        }
    }
    public function showIdentityForm()
    {
        return view('auth.lengkapiProfile');
    }
    public function lengkapiProfil(Request $request, $username)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'floating_first_name' => 'required|string|max:255',
            'floating_last_name' => 'required|string|max:255',
            'floating_headline' => 'nullable|string',
            'floating_address' => 'required|string|max:255',
        ]);

        // Ambil user berdasarkan username
        $user = User::where('username', $username)->first();

        if (!$user) {
            // Handle jika user tidak ditemukan
            return redirect()->back()->with('error', 'User not found.');
        }

        // Cek apakah user sudah memiliki profil Candidate
        if ($user->candidate()->exists()) {
            // Jika sudah ada profil, update saja data yang diperlukan
            $candidate = $user->candidate;
        } else {
            // Jika belum ada, buat profil baru untuk user ini
            $candidate = new candidates();
            $candidate->user_id = $user->id;
        }

        // Simpan data dari form ke dalam profil Candidate
        $candidate->full_name = $validatedData['floating_first_name'] . ' ' . $validatedData['floating_last_name'];
        $candidate->headline = $validatedData['floating_headline'];
        $candidate->address = $validatedData['floating_address'];
        // Tambahkan logika untuk menyimpan path foto jika diperlukan

        $candidate->save();

        return redirect()->route('login')->withErrors('Profile completed successfully.');
    }

    public function showCompanyIdentityForm()
    {
        return view('auth.registerCompanyProfile');
    }

    public function RegisterCompany(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'floating_company_name' => 'required|string|max:255',
            'floating_address' => 'required|string|max:255',
            'floating_description' => 'nullable|string',
        ]);

        // Cari data company berdasarkan ID
        $company = companies::findOrFail($id);

        // Register/Update data company
        $company->company_name = $validatedData['floating_company_name'];
        $company->company_address = $validatedData['floating_address'];
        $company->company_description = $validatedData['floating_description'];
        // Tambahkan logika lain sesuai kebutuhan seperti user_id jika perlu

        $company->save();

        // Redirect dengan pesan sukses atau ke halaman lain sesuai kebutuhan
        return redirect()->route('login')->with('success', 'Company profile successfully updated.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login')->withErrors('Berhasil Keluar');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate incoming request data
        $validator = FacadesValidator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'role_id' => 'required|exists:roles,id'
        ]);
    
        // If validation fails, redirect back with errors and input data
        if ($validator->fails()) {
            session(['selected_tab' => $request->input('selected_tab')]);
            return back()->withErrors($validator)->withInput();
        }
    
        // Start a database transaction
        DB::beginTransaction();
    
        try {
            // Check if user with the given email already exists
            $user = User::where('email', $request->email)->first();
    
            if ($user) {
                // User exists, check password
                if (Hash::check($request->password, $user->password)) {
                    // Password matches, assign the new role if not already assigned
                    if (!$user->roles->contains($request->role_id)) {
                        $user->roles()->attach($request->role_id);
                    }
    
                    // Check if the user already has a candidate record
                    if ($request->role_id == 2) {
                        // Participant role, check candidate profile
                        if (!empty($user->candidate->full_name)) {
                            // If candidate profile is complete, commit transaction and redirect to login
                            DB::commit();
                            return redirect()->route('login')->withErrors('Email already registered. Please login.');
                        } else {
                            // If candidate profile is incomplete, create candidate contact and redirect to identityForm
                            $candidate_contact = new candidate_contact();
                            $candidate_contact->candidate_id = $user->id;
                            $candidate_contact->email = $user->email;
                            $candidate_contact->save();
    
                            DB::commit();
                            return redirect()->route('identityForm', ['username' => $user->username])->withErrors('Please complete your profile.');
                        }
                    } elseif ($request->role_id == 3) {
                        // Recruiter role, check company profile
                        $companyUser = $user->companyUser;
    
                        if ($companyUser && $companyUser->company_id) {
                            // If recruiter is associated with a company, commit transaction and redirect to appropriate dashboard or page
                            DB::commit();
                            return redirect()->route('dashboard.recruiter')->with('success', 'Registration successful.');
                        } else {
                            // If recruiter is not associated with a company, create a new company
                            $company = new companies();
                            $company->company_name = 'Company_' . Str::random(8); // Example: Generate a random company name
                            $company->save();
    
                            $company_contact = new companies_contact();
                            $company_contact->company_id = $company->id;
                            $company_contact->save();
    
                            // Associate user with the newly created company
                            $user->companyUser()->create([
                                'company_id' => $company->id,
                            ]);
    
                            DB::commit();
                            return redirect()->route('showCompanyIdentityForm', ['id' => $company->id])->withErrors('Please complete your company profile.');
                        }
                    }
                } else {
                    // Password does not match, rollback transaction and return with error
                    DB::rollBack();
                    return back()->withErrors(['password' => 'Password does not match with the registered account.'])->withInput();
                }
            } else {
                // User does not exist, create new user
                $user = User::create([
                    'username' => 'user_' . Str::random(8),
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
    
                // Assign the role to the newly created user
                $user->roles()->attach($request->role_id, [
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
    
                // Create a candidate record for participant role
                if ($request->role_id == 2) {
                    $candidate = candidates::create([
                        'user_id' => $user->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
    
                    $candidate_contact = new candidate_contact();
                    $candidate_contact->candidate_id = $candidate->id;
                    $candidate_contact->email = $user->email;
                    $candidate_contact->save();
    
                    DB::commit();
                    return redirect()->route('identityForm', ['username' => $user->username])->withErrors('Registration successful. Please complete your profile.');
                }
    
                // For recruiter role, create a new company and redirect to company identity form
                if ($request->role_id == 3) {
                    $company = new companies();
                    $company->company_name = 'Company_' . Str::random(8); // Example: Generate a random company name
                    $company->save();
    
                    $company_contact = new companies_contact();
                    $company_contact->company_id = $company->id;
                    $company_contact->save();
    
                    // Associate user with the newly created company
                    $user->companyUser()->create([
                        'company_id' => $company->id,
                    ]);
    
                    DB::commit();
                    return redirect()->route('showCompanyIdentityForm', ['id' => $company->id])->withErrors('Registration successful. Please complete your company profile.');
                }
            }
        } catch (\Exception $e) {
            // An error occurred; rollback the transaction
            DB::rollBack();
    
            // Log the exception or handle it as needed
            Log::error('Error during registration: ' . $e->getMessage());
    
            // Return back with an error message
            return back()->withErrors('An error occurred during registration. Please try again.')->withInput();
        }
    }
    

    public function showForgotPasswordForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // Logic for sending password reset link
    }

    public function showResetForm($token)
    {
        return view('auth.passwords.reset')->with(['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        // Logic for resetting password
    }
}
