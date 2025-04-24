<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\rooms;
use Illuminate\Http\Request;
use Carbon\Carbon;


class LandingPageController extends Controller
{
    public function index()
    {
        return view('landingPage');
    }
    
    public function cariLowongan()
    {
        // Mengambil semua data rooms beserta data company terkait
        $rooms = rooms::with('company')->paginate(4);
        
        // Prepare benefits for all rooms
        $allBenefits = [];
        foreach ($rooms as $room) {
            $company = $room->company;
            $benefits = $company->benefits; // assuming benefits relation is defined in the Company model
            $allBenefits[$room->id] = $benefits;
        }
        
        return view('jobList', compact('rooms', 'allBenefits'));
    }
    
    
}
