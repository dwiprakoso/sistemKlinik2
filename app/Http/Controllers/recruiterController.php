<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\companies_benefit;
use App\Models\companies_type;
use App\Models\company_user;
use App\Models\path_types;
use Illuminate\Support\Facades\DB;
use App\Models\RoomCandidate;
use App\Models\rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class recruiterController extends Controller
{

    public function showSelectionPathTesting()
    {
        return view('recruiter.SelectionPathTesting');
    }
    public function selectionPathTesting(Request $request)
    {
        dd($request->all());
        return view('recruiter.SelectionPathTesting');
    }

    // Versi yang dioptimalkan
    public function index()
    {
        // Ambil user yang sedang login
        $user = auth()->user();
        
        // Ambil company user dengan company dalam satu query
        $companyUser = $user->companyUser()->with('company')->first();
        
        if (!$companyUser) {
            return redirect()->back()->with('error', 'Profil perusahaan tidak ditemukan.');
        }
        
        $company = $companyUser->company;
        $company_id = $company->id;
        
        // Ambil 3 data terbaru dari room dengan eager loading candidates
        $rooms = rooms::where('company_id', $company_id)
            ->with(['candidates']) // Eager loading untuk room_candidates
            ->orderBy('updated_at', 'desc')
            ->take(3)
            ->get();
        
        // Tambahkan perhitungan untuk setiap room
        foreach ($rooms as $room) {
            $room->totalApplicants = $room->candidates->count();
            $room->filledPositions = $room->candidates->where('status', 'approved')->count();
        }
        
        // Query lain menggunakan builder yang lebih optimal
        $roomsCount = rooms::where('company_id', $company_id)->count();
        
        // Menghitung total kandidat aktif menggunakan whereHas
        $totalActiveApplicants = rooms::where('company_id', $company_id)
            ->withCount(['candidates' => function ($query) {
                $query->whereNotIn('status', ['approved', 'rejected']);
            }])
            ->get()
            ->sum('candidates_count');
        
        // Menghitung posisi yang masih open
        $openPositions = rooms::where('company_id', $company_id)
            ->where('deadline', '>=', now())
            ->sum('total_open_position');
        
        // Ambil 3 kandidat terbaru yang apply ke room perusahaan ini
        $latestCandidates = RoomCandidate::whereHas('rooms', function ($query) use ($company_id) {
            $query->where('company_id', $company_id);
        })
        ->with(['candidate.user', 'candidate.contact', 'rooms', 'candidate']) 
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

        return view('recruiter.index', compact(
            'company', 
            'rooms',
            'roomsCount',
            'totalActiveApplicants',
            'openPositions',
            'latestCandidates' // tambahkan ini
        ));
    }

    public function showProfile()
    {
        return view('recruiter.profile');
    }

    public function joinCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required|exists:companies,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = Auth::user();

        // Check if user is a recruiter
        if (!$user->roles()->where('name', 'recruiter')->exists()) {
            return response()->json(['message' => 'You must be a recruiter to join a company'], 403);
        }

        // Link user with company
        company_user::create([
            'user_id' => $user->id,
            'company_id' => $request->company_id,
        ]);

        return response()->json(['message' => 'Successfully joined the company'], 200);
    }

    public function createCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'company_address' => 'string|max:255|nullable',
            'company_website' => 'string|max:255|nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = Auth::user();

        // Check if user is a recruiter
        if (!$user->roles()->where('name', 'recruiter')->exists()) {
            return response()->json(['message' => 'You must be a recruiter to create a company'], 403);
        }

        $company = companies::create([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_website' => $request->company_website,
        ]);

        // Link user with company
        company_user::create([
            'user_id' => $user->id,
            'company_id' => $company->id,
        ]);

        return response()->json(['message' => 'Company created and joined successfully'], 201);
    }



    public function companyProfile()
    {
        // Ambil user yang sedang login
        $user = Auth::user();
        $companyBenefitsAll = companies_benefit::all();

        $companyTypes = companies_type::all();

        // Ambil data perusahaan yang terkait dengan user yang sedang login
        $companyUser = $user->companyUser()->first();

        if (!$companyUser) {
            return redirect()->back()->with('error', 'Company profile not found.');
        }

        $company = $companyUser->company;
        // dd($company->contact);

        // Ambil data manfaat perusahaan berdasarkan perusahaan yang sedang login
        $companyBenefits = $company->benefits;

        // Ambil data kontak perusahaan yang terkait
        $companyContact = $company->contact;
        // dd($companyContact);

        // Ambil semua room yang terkait dengan company
        $rooms = rooms::where('company_id', $companyUser->company_id)->get();

        // Kirim data perusahaan dan data kontak ke view
        return view('recruiter.companyProfile', compact('company', 'companyTypes', 'companyContact', 'companyBenefitsAll', 'companyBenefits', 'rooms'));
    }

    public function updateCompanyProfile(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();

        // Ambil data perusahaan yang terkait dengan user yang sedang login
        $companyUser = $user->companyUser()->first();
        $company = $companyUser->company;

        // Update data perusahaan
        $company->update([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_website' => $request->website,
            'company_type' => $request->company_type,
            'company_motto' => $request->company_motto,
            'company_description' => $request->description,
        ]);

        // Update data kontak perusahaan
        $company->contact()->update([
            'email' => $request->email,
            'telephone' => $request->telephone,
            'fax' => $request->fax,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'whatsapp' => $request->whatsapp,
        ]);

        // Pastikan untuk menangani redirect dengan pesan sukses atau error jika perlu
        return redirect()->back()->with('success', 'Company profile updated successfully.');
    }



    public function candidate()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil data perusahaan yang terkait dengan user yang sedang login
        $companyUser = $user->companyUser()->first();

        if (!$companyUser) {
            // Jika user tidak terhubung dengan perusahaan manapun, arahkan kembali dengan pesan error
            return redirect()->back()->with('error', 'User tidak terhubung dengan perusahaan manapun.');
        }

        // Ambil company_id dari companyUser
        $company_id = $companyUser->company_id;

        // Ambil semua room yang terkait dengan company
        $rooms = rooms::where('company_id', $company_id)->get();

        // Buat koleksi kosong untuk menyimpan semua kandidat
        $allCandidates = collect();

        // Iterasi melalui setiap room untuk mengumpulkan kandidat
        foreach ($rooms as $room) {
            $candidates = RoomCandidate::where('rooms_id', $room->id)
                ->with('candidate') // Asumsikan bahwa RoomCandidate memiliki relasi dengan Candidate
                ->get();
            $allCandidates = $allCandidates->merge($candidates);
        }

        // Mengembalikan view dengan data kandidat
        return view('recruiter.talentPool', compact('allCandidates'));
    }


    public function updateLogo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = Auth::user();

        // Ambil data perusahaan yang terkait dengan user yang sedang login
        $companyUser = $user->companyUser()->first();
        $company = $companyUser->company;

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }

            $logo = $request->file('logo');
            $logoPath = $logo->store('logos', 'public');

            // Simpan path logo ke database
            $company->update([
                'logo' => $logoPath
            ]);

            return response()->json(['success' => 'Logo updated successfully.']);
        }

        return response()->json(['error' => 'Logo upload failed.'], 400);
    }


    public function updateBanner(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->route('dashboard.recruiter.companyProfile')->withErrors($validator)->withInput();
        }

        // Ambil data perusahaan yang terkait dengan user yang sedang login
        $user = Auth::user();
        $companyUser = $user->companyUser()->first();
        $company = $companyUser->company;

        // Handle banner upload
        if ($request->hasFile('banner')) {
            // Hapus banner lama jika ada
            if ($company->banner) {
                Storage::disk('public')->delete($company->banner);
            }

            $banner = $request->file('banner');
            $bannerPath = $banner->store('banners', 'public');

            // Simpan path banner ke database
            $company->banner = $bannerPath;
            $company->save();

            // Redirect ke route recruiter.companyProfile dengan pesan sukses
            return redirect()->route('dashboard.recruiter.companyProfile')->with('success', 'Banner perusahaan diperbarui dengan sukses.');
        }

        // Redirect ke route recruiter.companyProfile dengan pesan kesalahan
        return redirect()->route('dashboard.recruiter.companyProfile')->withErrors('Gagal mengunggah banner perusahaan.');
    }

    public function addBenefit(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'benefit_id' => 'required|exists:companies_benefits,id',
            ]);

            // Ambil data perusahaan
            $company = companies::where('id', auth()->user()->companyUser->company_id)->firstOrFail();

            // Ambil benefit_id dari request
            $benefitId = $request->input('benefit_id');

            // Periksa apakah manfaat tersebut sudah terkait dengan perusahaan
            if ($company->benefits()->where('benefit_id', $benefitId)->exists()) {
                return redirect()->route('dashboard.recruiter.companyProfile')->withErrors('Manfaat perusahaan sudah ada.');
            }

            // Tambahkan manfaat perusahaan ke dalam pivot table
            $company->benefits()->attach($benefitId);

            return redirect()->route('dashboard.recruiter.companyProfile')->with('success', 'Manfaat perusahaan berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Handle errors
            return redirect()->route('dashboard.recruiter.companyProfile')->withErrors('Gagal menambahkan manfaat perusahaan: ' . $e->getMessage());
        }
    }

    public function companySettings()
    {
        return view('recruiter.settingsProfile');
    }
    public function message()
    {
        return view('recruiter.message');
    }
}
