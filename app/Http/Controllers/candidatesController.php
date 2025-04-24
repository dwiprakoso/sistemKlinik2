<?php

namespace App\Http\Controllers;

use App\Models\rooms;
use App\Models\resumes;
use App\Models\candidates;
use App\Models\pendidikan;
use Illuminate\Http\Request;
use App\Models\candidate_contact;
use Illuminate\Support\Facades\DB;
use App\Models\educational_history;
use App\Models\keahlian;
use App\Models\pengalamanKerja;
use App\Models\pengalamanOrganisasi;
use App\Models\sertifikat;
use App\Models\traces_of_experience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class candidatesController extends Controller
{
    public function index()
    {
        // Kode yang sudah ada tetap sama
        $user = Auth::user();
        $profile = $user->candidate;
        $contact = $profile->contact;
        $jumlahRoomsApply = 0;
        $recentAppliedJobs = [];
        
        if ($profile) {
            // Kode yang sudah ada tetap sama
            $jumlahRoomsApply = DB::table('room_candidates')
                                ->where('candidates_id', $profile->id)
                                ->count();
                                
            $recentAppliedJobs = DB::table('room_candidates')
                                ->join('rooms', 'room_candidates.rooms_id', '=', 'rooms.id')
                                ->join('companies', 'rooms.company_id', '=', 'companies.id')
                                ->where('room_candidates.candidates_id', $profile->id)
                                ->select(
                                    'room_candidates.id',
                                    'room_candidates.rooms_id',
                                    'room_candidates.status',
                                    'room_candidates.created_at',
                                    'room_candidates.updated_at',
                                    'rooms.position_name',
                                    'rooms.departement',
                                    'rooms.work_system',
                                    'rooms.working_hours',
                                    'companies.company_name',
                                    'companies.company_address'
                                )
                                ->orderBy('room_candidates.created_at', 'desc')
                                ->limit(5)
                                ->get();
                                
            // Mengambil notifikasi perubahan status
            $notifications = DB::table('room_candidates')
                            ->join('rooms', 'room_candidates.rooms_id', '=', 'rooms.id')
                            ->join('companies', 'rooms.company_id', '=', 'companies.id')
                            ->where('room_candidates.candidates_id', $profile->id)
                            ->whereIn('room_candidates.status', ['accepted', 'rejected', 'present']) // Status yang biasanya berubah
                            ->where('room_candidates.updated_at', '>', now()->subDays(7)) // Notifikasi seminggu terakhir
                            ->select(
                                'room_candidates.id',
                                'room_candidates.status',
                                'room_candidates.updated_at',
                                'rooms.position_name',
                                'rooms.departement',
                                'companies.company_name'
                            )
                            ->orderBy('room_candidates.updated_at', 'desc')
                            ->limit(3) // Maksimal 10 notifikasi terbaru
                            ->get();
        }
        
        // Kode yang sudah ada tetap sama
        $jumlahRoomsPresentStatus = DB::table('room_candidates')
        ->where('candidates_id', $profile->id)
        ->where('status', 'present')
        ->count();

        $jumlahRoomsPendingStatus = DB::table('room_candidates')
        ->where('candidates_id', $profile->id)
        ->where('status', 'pending')
        ->count();
        
        $roomCandidate = $profile->roomCandidate;
        $educations = $profile->educationalHistories()->orderBy('year_in', 'desc')->orderBy('year_out', 'desc')->get();
        
        return view('candidates.index', compact(
            'profile', 'contact', 'roomCandidate', 'educations', 
            'jumlahRoomsApply', 'jumlahRoomsPresentStatus', 'jumlahRoomsPendingStatus',
            'recentAppliedJobs', 'notifications' // Tambahkan notifications ke compact
        ));
    }
    public function showProfile()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil profil kandidat dan data kontaknya
        $profile = $user->candidate;
        $contact = $profile->contact;
        $educations = $profile->educationalHistories()->orderBy('year_in', 'desc')->orderBy('year_out', 'desc')->get(); // Adjust this based on your relationship
        // Ambil semua pengalaman dari database
        $experiences = traces_of_experience::where('candidate_id', auth()->user()->candidate->id)->get();

        // dd($profile);
        // dd($contact);

        return view('candidates.profile', compact('profile', 'contact', 'educations', 'experiences'));
    }

    // Method untuk upload foto profil
    public function updatePhoto(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'profile-image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $user = Auth::user();
        $profile = $user->candidate; // Asumsikan kandidat memiliki relasi profile
        // dd($profile);

        if ($request->hasFile('profile-image')) {
            // Hapus foto lama jika ada
            if ($profile->photo_path && Storage::exists('public/' . $profile->photo_path)) {
                Storage::delete('public/' . $profile->photo_path);
            }

            // Simpan foto baru
            $file = $request->file('profile-image');
            $path = $file->store('profile_images', 'public');

            // Update path foto di profil kandidat
            $profile->photo_path = $path;
            $profile->save();
        }

        return redirect()->route('dashboard.kandidat.showProfile')->with('success', 'Foto profil berhasil diperbarui.');
    }

    public function updateProfile(Request $request)
    {
        // Retrieve the candidate ID from the authenticated user
        $userId = auth()->user()->id;
        $candidate = candidates::where('user_id', $userId)->firstOrFail();
        $candidateId = $candidate->id;

        // Validate the request data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'headline' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'telephone' => 'nullable|string|max:20',
            'website' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:20',
        ]);

        // Find the candidate and contact records
        $contact = candidate_contact::where('candidate_id', $candidateId)->firstOrFail();

        // Update the candidate record
        $candidate->update([
            'full_name' => $validatedData['full_name'],
            'address' => $validatedData['address'],
            'headline' => $validatedData['headline'],
            'bio' => $validatedData['bio'],
        ]);

        // Update the contact record
        $contact->update([
            'telephone' => $validatedData['telephone'],
            'website' => $validatedData['website'],
            'instagram' => $validatedData['instagram'],
            'linkedin' => $validatedData['linkedin'],
            'whatsapp' => $validatedData['whatsapp'],
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }


    // Method to handle the form submission and add education history
    public function addEducation(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'institution_name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'year_in' => 'required|date_format:Y-m-d',
            'year_out' => 'nullable|date_format:Y-m-d', // year_out boleh null jika masih berlangsung
        ]);

        // Buat instansi baru dari model EducationalHistory dan simpan ke database
        $education = new educational_history();
        $education->candidate_id = auth()->user()->candidate->id; // Mengasumsikan candidate_id terkait dengan user yang sedang login
        $education->institution_name = $request->input('institution_name');
        $education->major = $request->input('major');
        $education->year_in = $request->input('year_in');

        // Periksa apakah pendidikan masih berlangsung
        if ($request->has('current_education')) {
            $education->year_out = null; // Set year_out ke null jika masih berlangsung
        } else {
            $education->year_out = $request->input('year_out');
        }

        $education->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Riwayat pendidikan berhasil ditambahkan.');
    }

    public function addExperience(Request $request)
    {
        // dd($request->all());

        // Buat instansi baru dari model TracesOfExperience dan simpan ke database
        $experience = new traces_of_experience();
        $experience->candidate_id = auth()->user()->candidate->id; // Mengasumsikan candidate_id terkait dengan user yang sedang login
        $experience->title = $request->input('title');
        $experience->description = $request->input('description');
        $experience->position = $request->input('position');
        $experience->year_in = $request->input('year_in');

        // Periksa apakah pengalaman masih berlangsung
        if ($request->has('current_experience')) {
            $experience->year_out = null; // Set year_out ke null jika masih berlangsung
        } else {
            $experience->year_out = $request->input('year_out');
        }

        // Proses pengunggahan file gambar jika ada
        if ($request->hasFile('photo_path')) {
            $file = $request->file('photo_path');
            $path = $file->store('images/experiences', 'public'); // Menyimpan di direktori storage/app/public/images/experiences
            $experience->photo_path = $path;
        }

        $experience->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Riwayat pengalaman berhasil ditambahkan.');
    }

    public function lowongan()
    {
        // Mengambil semua data rooms beserta data company terkait
        $rooms = Rooms::with('company')->where('access_rights', 'public')->paginate(5);

        // Prepare benefits for all rooms
        $allBenefits = [];
        foreach ($rooms as $room) {
            $company = $room->company;
            $benefits = $company->benefits; // assuming benefits relation is defined in the Company model
            $allBenefits[$room->id] = $benefits;
        }
        
        return view('candidates.jobVacancy', compact('rooms', 'allBenefits'));
    }
    public function status()
    {
        return view('candidates.status');
    }
    public function statusDetail()
    {
        return view('candidates.statusDetail');
    }
    public function message()
    {
        return view('candidates.message');
    }
    public function cvMaker()
    {  
        return view('candidates.cvMaker');
    }
    public function storeCv(Request $request)
    {
        // Validate the personal data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'lokasi' => 'nullable|string|max:255',
            'ringkasan' => 'nullable|string',
            // Add any other validations as necessary
        ]);

        // Store personal data into the candidate model
        $candidate = new resumes();
        $candidate->nama = $validatedData['nama'];
        $candidate->email = $validatedData['email'];
        $candidate->telepon = $validatedData['telepon'];
        $candidate->lokasi = $validatedData['lokasi'];
        $candidate->ringkasan = $validatedData['ringkasan'];
        $candidate->user_id = auth()->user()->id; // Assuming the user is authenticated
        $candidate->save();

        // Store education data
        if ($request->has('pendidikan')) {
            foreach ($request->pendidikan as $education) {
                $educationModel = new pendidikan();
                $educationModel->resume_id= $candidate->id;
                $educationModel->gelar = $education['gelar'];
                $educationModel->institusi = $education['institusi'];
                $educationModel->tahun_mulai = $education['tahun_mulai'];
                $educationModel->tahun_selesai = $education['tahun_selesai'] ?? null;
                $educationModel->save();
            }
        }

        // Store work experience data
        if ($request->has('pengalaman')) {
            foreach ($request->pengalaman as $experience) {
                $experienceModel = new pengalamanKerja();
                $experienceModel->resume_id = $candidate->id;
                $experienceModel->posisi = $experience['posisi'];
                $experienceModel->perusahaan = $experience['perusahaan'];
                $experienceModel->tanggal_mulai = $experience['tanggal_mulai'];
                $experienceModel->tanggal_selesai = $experience['tanggal_selesai'] ?? null;
                $experienceModel->deskripsi = $experience['deskripsi'];
                $experienceModel->save();
            }
        }

        // Store organization experience data
        if ($request->has('organisasi')) {
            foreach ($request->organisasi as $organization) {
                $organizationModel = new pengalamanOrganisasi();
                $organizationModel->resume_id = $candidate->id;
                $organizationModel->posisi = $organization['posisi'];
                $organizationModel->organisasi = $organization['organisasi'];
                $organizationModel->tanggal_mulai = $organization['tanggal_mulai'];
                $organizationModel->tanggal_selesai = $organization['tanggal_selesai'] ?? null;
                $organizationModel->deskripsi = $organization['deskripsi'];
                $organizationModel->save();
            }
        }

        // Store certificates data
        if ($request->has('sertifikat')) {
            foreach ($request->sertifikat as $certificate) {
                $certificateModel = new sertifikat();
                $certificateModel->resume_id = $candidate->id;
                $certificateModel->nama_sertifikat = $certificate['sertifikat'];
                $certificateModel->penerbit = $certificate['penerbit'];
                $certificateModel->tanggal_terbit = $certificate['tanggal_terbit'];
                $certificateModel->save();
            }
        }

        // Store skills (keahlian) data
        if ($request->has('keahlian')) {
            foreach ($request->keahlian as $skill) {
                $skillModel = new keahlian();
                $skillModel->resume_id = $candidate->id;
                $skillModel->nama_keahlian = $skill;
                $skillModel->save();
            }
        }

        // Langsung download PDF setelah data tersimpan
        // Ambil data terkait untuk PDF
        $pendidikan = pendidikan::where('resume_id', $candidate->id)->get();
        $pengalamanKerja = pengalamanKerja::where('resume_id', $candidate->id)->get();
        $pengalamanOrganisasi = pengalamanOrganisasi::where('resume_id', $candidate->id)->get();
        $sertifikat = sertifikat::where('resume_id', $candidate->id)->get();
        $keahlian = keahlian::where('resume_id', $candidate->id)->get();
        
        $pdf = Pdf::loadView('candidates.pdf.cv', [
            'resume' => $candidate,
            'pendidikan' => $pendidikan,
            'pengalamanKerja' => $pengalamanKerja,
            'pengalamanOrganisasi' => $pengalamanOrganisasi,
            'sertifikat' => $sertifikat,
            'keahlian' => $keahlian,
        ]);
        
        // Atur ukuran kertas dan orientasi
        $pdf->setPaper('a4', 'portrait');
        
        // Kirim flash message ke session untuk ditampilkan setelah redirect
        session()->flash('success', 'CV Anda telah dibuat!');
        
        // Return PDF sebagai download dengan nama yang sesuai
        return $pdf->download('CV_'.$candidate->nama.'_'.date('Y-m-d').'.pdf');
    }
    

}
