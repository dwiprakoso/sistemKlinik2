<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\RoomCandidate;
use App\Models\rooms;
use App\Models\RoomStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomCandidateController extends Controller
{
    public function apply($id)
    {
        $room = rooms::findOrFail($id);
        $candidate = Auth::user()->candidate;
        
        // Check if the RoomCandidate already exists
        $existingCandidate = RoomCandidate::where('candidates_id', $candidate->id)
            ->where('rooms_id', $room->id)
            ->first();

        // If it doesn't exist, create a new one
        if (!$existingCandidate) {
            // Get the first step of this room
            $firstStep = RoomStep::where('room_id', $room->id)
                ->orderBy('step_number', 'asc')
                ->first();
                
            $initialStatus = 'pending'; // Default status
            
            // Create room_candidate with initial status
            RoomCandidate::create([
                'candidates_id' => $candidate->id,
                'rooms_id' => $room->id,
                'status' => $initialStatus
            ]);

            return redirect()->back()->with('success', 'Sukses Apply Lowongan. Silahkan cek status aplikasi Anda di dashboard.');
        }

        // If it exists, return a message indicating so
        return redirect()->back()->with('error', 'Anda sudah mengapply untuk lowongan ini sebelumnya.');
    }
    
    // Fungsi untuk memperbarui status kandidat berdasarkan tahapan (step)
    public function updateStatusByStep($roomId, $candidateId, $stepNumber, $newStatus = null)
    {
        // Get the room candidate
        $roomCandidate = RoomCandidate::where('rooms_id', $roomId)
            ->where('candidates_id', $candidateId)
            ->first();
            
        if (!$roomCandidate) {
            return response()->json([
                'success' => false,
                'message' => 'Data kandidat tidak ditemukan'
            ], 404);
        }
        
        // Get current step information
        $currentStep = RoomStep::where('room_id', $roomId)
            ->where('step_number', $stepNumber)
            ->first();
            
        if (!$currentStep) {
            return response()->json([
                'success' => false,
                'message' => 'Tahapan tidak ditemukan'
            ], 404);
        }
        
        // Determine status based on step type if not provided
        if ($newStatus === null) {
            switch ($currentStep->step_type) {
                case 'Upload Berkas':
                    $newStatus = 'pending'; // Menunggu kandidat mengunggah berkas
                    break;
                case 'Challenge':
                    $newStatus = 'pending'; // Menunggu kandidat menyelesaikan challenge
                    break;
                case 'Meeting':
                    $newStatus = 'pending'; // Dijadwalkan untuk meeting
                    break;
                case 'Interview':
                    $newStatus = 'pending'; // Dijadwalkan untuk interview
                    break;
                case 'Test':
                    $newStatus = 'pending'; // Menunggu tes
                    break;
                case 'Custom':
                    $newStatus = 'pending'; // Status default untuk tipe custom
                    break;
                default:
                    $newStatus = 'pending';
            }
        } else {
            // Validate provided status
            $allowedStatuses = ['pending', 'approved', 'rejected', 'present', 'absent'];
            if (!in_array($newStatus, $allowedStatuses)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Status tidak valid'
                ], 400);
            }
        }
        
        // Update the status
        $roomCandidate->status = $newStatus;
        $roomCandidate->save();
        
        // If approved, check if there's a next step
        if ($newStatus === 'approved') {
            $nextStepNumber = $stepNumber + 1;
            $nextStep = RoomStep::where('room_id', $roomId)
                ->where('step_number', $nextStepNumber)
                ->first();
                
            if ($nextStep) {
                // Automatically update status for next step
                $this->updateStatusByStep($roomId, $candidateId, $nextStepNumber);
                
                return response()->json([
                    'success' => true,
                    'message' => 'Status diperbarui dan kandidat lanjut ke tahap berikutnya',
                    'next_step' => $nextStep
                ]);
            }
            
            // No more steps, candidate has completed the process
            return response()->json([
                'success' => true,
                'message' => 'Status diperbarui. Kandidat telah menyelesaikan semua tahapan.'
            ]);
        }
        
        // For rejected candidates
        if ($newStatus === 'rejected') {
            return response()->json([
                'success' => true,
                'message' => 'Kandidat ditolak pada tahap ini.'
            ]);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Status kandidat berhasil diperbarui ke ' . $newStatus
        ]);
    }
    
    // Fungsi untuk menyelesaikan tahapan tertentu
    public function completeStep(Request $request, $roomId, $candidateId, $stepNumber)
    {
        $status = $request->input('status', 'approved');
        $notes = $request->input('notes', '');
        
        // Validate status
        $allowedStatuses = ['approved', 'rejected', 'present', 'absent'];
        if (!in_array($status, $allowedStatuses)) {
            return response()->json([
                'success' => false,
                'message' => 'Status tidak valid'
            ], 400);
        }
        
        // Get current step information
        $step = RoomStep::where('room_id', $roomId)
            ->where('step_number', $stepNumber)
            ->first();
            
        if (!$step) {
            return response()->json([
                'success' => false,
                'message' => 'Tahapan tidak ditemukan'
            ], 404);
        }
        
        // Validate step completion based on step type
        // For example: if Upload Berkas, check if documents are uploaded
        $validCompletion = true; // Replace with actual validation logic
        
        if (!$validCompletion) {
            return response()->json([
                'success' => false,
                'message' => 'Tahapan belum dapat diselesaikan'
            ], 400);
        }
        
        // Update status
        return $this->updateStatusByStep($roomId, $candidateId, $stepNumber, $status);
    }
    
    // Fungsi untuk mendapatkan status dan progress kandidat 
    public function getProgress($roomId, $candidateId)
    {
        $roomCandidate = RoomCandidate::where('rooms_id', $roomId)
            ->where('candidates_id', $candidateId)
            ->first();
            
        if (!$roomCandidate) {
            return response()->json([
                'success' => false,
                'message' => 'Data kandidat tidak ditemukan'
            ], 404);
        }
        
        // Get all steps for this room
        $steps = RoomStep::where('room_id', $roomId)
            ->orderBy('step_number', 'asc')
            ->get();
            
        // Determine current step based on status history
        // This is a simplified version, you might need to track step history in a separate table
        $currentStepNumber = 1;
        
        if ($roomCandidate->status === 'rejected') {
            $progress = "Ditolak";
        } else if (count($steps) == 0) {
            $progress = "Belum ada tahapan";
        } else {
            $progress = "Tahap " . $currentStepNumber . " dari " . count($steps);
        }
        
        return response()->json([
            'success' => true,
            'status' => $roomCandidate->status,
            'current_step' => $currentStepNumber,
            'total_steps' => count($steps),
            'steps' => $steps,
            'progress' => $progress
        ]);
    }
}