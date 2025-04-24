<?php

namespace App\Http\Controllers;

use App\Models\candidates;
use App\Models\rooms;
use App\Models\companies;
use App\Models\RoomCandidate;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index()
    {     
        $companies = companies::with('users', 'contact')->get();
        $companiescount = $companies->count(); // Menghitung jumlah perusahaan yang terdaftar

        // Mengambil semua data dari tabel rooms
        $rooms = rooms::all();     
        // Menghitung jumlah baris
        $roomscount = $rooms->count();

        // Mengambil semua data dari tabel rooms
        $candidates = candidates::all();     
        // Menghitung jumlah baris
        $candidatescount = $candidates->count();


        // data aplly
        $candidatesroom = RoomCandidate::with('rooms', 'candidate')
                             ->latest()
                             ->take(5)
                             ->get();
        return view('admin.index', compact('companies','rooms','candidates', 'companiescount', 'roomscount','candidatescount', 'candidatesroom')); // Tambahkan variabel baru ke view
    }
    public function verificationRecruiter()
    {
        $companies = companies::with('users', 'contact')->get();
        return view('admin.verificationRecruiter', compact('companies'));
    }
    public function updateCompanyStatus(Request $request, $id)
    {
        $company = Companies::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,verified,rejected',
        ]);
        
        $company->status = $request->status;
        $company->save();
        
        return redirect()->route('dashboard.admin.verificationRecruiter')
            ->with('success', 'Company status updated successfully');
    }

    public function verifyCompany(companies $company)
    {
        $company->status = 'verified';
        $company->save();
        
        return redirect()->back()->with('success', 'Company has been verified successfully!');
    }
    public function rejectCompany(companies $company)
    {
        $company->status = 'rejected';
        $company->save();
        
        return redirect()->back()->with('success', 'Company has been rejected.');
    }
    public function analisisSistem()
    {
        $companies = companies::with('users', 'contact')->get();
        $companiescount = $companies->count(); // Menghitung jumlah perusahaan yang terdaftar

        // Mengambil semua data dari tabel rooms
        $rooms = rooms::all();     
        // Menghitung jumlah baris
        $roomscount = $rooms->count();

        // Mengambil semua data dari tabel rooms
        $candidates = candidates::all();     
        // Menghitung jumlah baris
        $candidatescount = $candidates->count();

        return view('admin.analisisSistem', compact('companies','rooms','candidates', 'companiescount', 'roomscount','candidatescount')); // Tambahkan variabel baru ke view
    }
    public function kelolaSistem()
    {
        $companies = companies::with('users', 'contact')->get();
        // Mengambil semua data dari tabel rooms
        $rooms = rooms::all();     
        // Menghitung jumlah baris
        $roomscount = $rooms->count();
        return view('admin.kelolaSistem', compact('rooms','companies','roomscount',)); // Tambahkan variabel baru ke view
    }
    public function updateRoomStatus(Request $request, $roomId)
    {
        // Validate request
        $request->validate([
            'access_rights' => 'required|string|in:public,private',
        ]);
        
        // Find the room
        $room = rooms::findOrFail($roomId);
        
        // Update only the status field
        $room->access_rights = $request->access_rights;
        $room->save();
        
        // Redirect back with success message
        return redirect()->route('dashboard.admin.kelolaSistem')
            ->with('success', 'Status updated successfully');
    }
    public function kelolaAdministrasi()
    {
        return view('admin.kelolaAdministrasi'); // Tambahkan variabel baru ke view
    }
}
