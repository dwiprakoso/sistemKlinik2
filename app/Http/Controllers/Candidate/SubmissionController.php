<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\submission_challange;
use App\Models\submission_meeting_invitation;
use App\Models\submission_pemberkasan;
use App\Services\FileServices;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function submissionPemberkasan(Request $request)
    {
        $request->validate([
            'path_pemberkasan_id' => 'required',
            'berkas' => 'required',
            'keterangan_tambahan' => 'nullable',
        ]);

        $candidate = auth()->user()->candidate;
        $fileServices = new FileServices();
        $berkas =    $fileServices->uploadFile($request->file('berkas'), 'pemberkasan');
        submission_pemberkasan::create([
            'candidate_id' => $candidate->id,
            'path_pemberkasan_id' => $request->path_pemberkasan_id,
            'berkas' => $berkas,
            'keterangan_tambahan' => $request->keterangan_tambahan,
        ]);

        return redirect()->back()->with('success', 'Pemberkasan berhasil diupload');
    }

    public function submissionChallenges(Request $request)
    {
        $request->validate([
            'path_challange_id' => 'required',
            'berkas' => 'required',
            'keterangan_tambahan' => 'required',
        ]);


        $candidate = auth()->user()->candidate;
        $fileServices = new FileServices();
        $berkas =    $fileServices->uploadFile($request->file('berkas'), 'challenges');
        submission_challange::create([
            'candidate_id' => $candidate->id,
            'path_challange_id' => $request->path_challange_id,
            'berkas' => $berkas,
            'keterangan_tambahan' => $request->keterangan_tambahan,
        ]);

        return redirect()->back()->with('success', 'Challange berhasil diupload');
    }

    public function submissionMeetingInvitation(Request $request)
    {
        $request->validate([
            'path_meeting_invitation_id' => 'required',
            'keterangan_tambahan' => 'nullable',
        ]);

        $candidate = auth()->user()->candidate;
        submission_meeting_invitation::create([
            'candidate_id' => $candidate->id,
            'path_meeting_invitation_id' => $request->path_meeting_invitation_id,
            'konfirmasi_kehadiran' => 'yes',
            'keterangan_tambahan' => $request->keterangan_tambahan,
        ]);

        return redirect()->back()->with('success', 'Meeting invitation berhasil diupload');
    }
}
