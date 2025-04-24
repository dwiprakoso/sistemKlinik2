<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\RoomCandidate;
use App\Models\submission_challange;
use App\Models\submission_meeting_invitation;
use App\Models\submission_pemberkasan;
use Illuminate\Http\Request;

class SubmissionRecruiterController extends Controller
{
    public function lolosBerkas(Request $request)
    {
        $request->validate([
            'submission_pemberkasan_id' => 'required',
            'status' => 'required',
            'candidates_id' => 'required',
            'rooms_id' => 'required',
        ]);

        // approved', 'rejected'
        if ($request->status == 'approved') {
            RoomCandidate::where('candidates_id', $request->candidates_id)
                ->where('rooms_id', $request->rooms_id)
                ->update(['status' => 'present']);
        } else {
            RoomCandidate::where('candidates_id', $request->candidates_id)
                ->where('rooms_id', $request->rooms_id)
                ->update(['status' => 'rejected']);
        }

        $submissionPemberkasan = submission_pemberkasan::find($request->submission_pemberkasan_id);
        $submissionPemberkasan->status = $request->status;
        $submissionPemberkasan->save();

        return redirect()->back()->with('success', 'Status berhasil diubah');
    }

    public function lolosChallange(Request $request)
    {
        $request->validate([
            'submission_challange_id' => 'required',
            'status' => 'required',
            'candidates_id' => 'required',
            'rooms_id' => 'required',
        ]);



        if ($request->status == 'approved') {
            RoomCandidate::where('candidates_id', $request->candidates_id)
                ->where('rooms_id', $request->rooms_id)
                ->update(['status' => 'present']);
        } else {
            RoomCandidate::where('candidates_id', $request->candidates_id)
                ->where('rooms_id', $request->rooms_id)
                ->update(['status' => 'rejected']);
        }

        $submissionChallange = submission_challange::find($request->submission_challange_id);
        $submissionChallange->status = $request->status;
        $submissionChallange->save();

        return redirect()->back()->with('success', 'Status berhasil diubah');
    }

    public function lolosMeetingInvitation(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'submission_meeting_invitation_id' => 'required',
                'status' => 'required',
                'candidates_id' => 'required',
                'keterangan_recruiter' => 'nullable',
                'rooms_id' => 'required',
            ]);

            if ($request->status == 'approved') {
                RoomCandidate::where('candidates_id', $request->candidates_id)
                    ->where('rooms_id', $request->rooms_id)
                    ->update(['status' => 'approved']);
            } else {
                RoomCandidate::where('candidates_id', $request->candidates_id)
                    ->where('rooms_id', $request->rooms_id)
                    ->update(['status' => 'rejected']);
            }

            $submissionMeetingInvitation = submission_meeting_invitation::find($request->submission_meeting_invitation_id);
            $submissionMeetingInvitation->status = $request->status;
            $submissionMeetingInvitation->keterangan_recruiter = $request->keterangan_recruiter;
            $submissionMeetingInvitation->save();

            return redirect()->back()->with('success', 'Status berhasil diubah');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
