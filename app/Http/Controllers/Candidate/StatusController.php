<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\paths;
use App\Models\RoomCandidate;
use App\Models\submission_challange;
use App\Models\submission_meeting_invitation;
use App\Models\submission_pemberkasan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $candidate = auth()->user()->candidate;
        $rooms = $candidate->rooms()->get();
        
        // Create a collection that maps room IDs to their corresponding room_candidate record
        $roomCandidatesMap = RoomCandidate::where('candidates_id', $candidate->id)
            ->get()
            ->keyBy('rooms_id');

        return view('candidates.status', compact('rooms', 'roomCandidatesMap'));
    }

    public function detail($id)
    {
        $room = auth()->user()->candidate->rooms()->where('rooms.id', $id)->first();

        if (!$room) {
            return redirect()->route('candidate.status')->with('error', 'Anda tidak memiliki akses ke halaman ini');
        }

        // Get room_candidate record for the current user
        $room_candidate = RoomCandidate::where('candidates_id', auth()->user()->candidate->id)
            ->where('rooms_id', $id)
            ->first();
        
        // Fetch all steps for this room
        $steps = \App\Models\RoomStep::where('room_id', $room->id)
            ->orderBy('step_number')
            ->get();
        
        // Prepare data for view
        $pathData = [];
        
        foreach ($steps as $step) {
            $submissions = $this->getSubmissionsForStep($step, auth()->user()->candidate->id);
            
            $pathInfo = [
                'path' => (object)[
                    'path_name' => $step->step_name,
                    'path_type_id' => $this->getPathTypeIdFromStepType($step->step_type),
                    'description' => $step->step_description
                ],
                'detail' => (object)[
                    'rentang_waktu' => $step->start_date && $step->end_date ? 
                        Carbon::parse($step->start_date)->format('d M Y') . ' - ' . 
                        Carbon::parse($step->end_date)->format('d M Y') : null,
                    'location_link' => $step->location_link,
                    'attachment_path' => $step->attachment_path
                ],
                'submission' => $submissions
            ];
            
            $pathData[] = $pathInfo;
        }

        return view('candidates.statusDetail', compact('room', 'pathData', 'room_candidate'));
    }

    private function getPathTypeIdFromStepType($stepType)
    {
        // Map step_type to path_type_id
        $mapping = [
            'Upload Berkas' => 1,
            'Meeting' => 2,
            'Challenge' => 3,
            // Add more mappings as needed
        ];
        
        return $mapping[$stepType] ?? 4; // Default to 4 for other types
    }

    private function getSubmissionsForStep($step, $candidateId)
    {
        // Based on the step type, retrieve the appropriate submission
        switch ($this->getPathTypeIdFromStepType($step->step_type)) {
            case 1: // Pemberkasan
                return submission_pemberkasan::where('candidate_id', $candidateId)
                    ->where('path_pemberkasan_id', $step->id)
                    ->first();
                
            case 2: // Meeting
                return submission_meeting_invitation::where('candidate_id', $candidateId)
                    ->where('path_meeting_invitation_id', $step->id)
                    ->first();
                
            case 3: // Challenge
                return submission_challange::where('candidate_id', $candidateId)
                    ->where('path_challange_id', $step->id)
                    ->first();
                
            default:
                // For other step types, you might need a different approach or a generic submission model
                return null;
        }
    }
}