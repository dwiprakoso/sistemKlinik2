<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\paths;
use App\Models\rooms;
use App\Models\path_types;
use Illuminate\Http\Request;
use App\Models\path_challange;
use App\Services\FileServices;
use App\Models\path_pemberkasan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\path_meeting_invitation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class RoomController extends Controller
{

    public function selectionRoom()
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        // Ambil ID company dari user yang sedang login
        $company_id = $user->companyUser->company_id;

        // Ambil semua room yang terkait dengan company
        $rooms = rooms::where('company_id', $company_id)->get();

        // Return view dengan data rooms
        return view('recruiter.postRoom', compact('rooms'));
    }

    // Method untuk menyimpan data room baru
    
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $fileServices = new FileServices();

            // Simpan data room dasar
            $roomInput = $request->all();
            $room = rooms::create([
                'company_id' => auth()->user()->companyUser->company_id,
                'position_name' => $roomInput['position_name'],
                'departement' => $roomInput['departement'],
                'years_of_experience_criteria' => $roomInput['years_of_experience_criteria'],
                'total_open_position' => $roomInput['total_open_position'],
                'salary' => intval(str_replace('.', '', $roomInput['salary'])),
                'deadline' => $roomInput['deadline'],
                'work_system' => $roomInput['work_system'],
                'working_hours' => $roomInput['working_hours'],
                'access_rights' => $roomInput['access_rights'],
                'description' => $roomInput['description'],
                'requirements' => $roomInput['requirements'],
            ]);

            // Proses setiap tahapan seleksi dari input dinamis
            if ($request->has('step_type')) {
                foreach ($request->step_type as $index => $type) {
                    // Validasi keberadaan data yang diperlukan
                    $stepName = $request->input("step_name.$index", '');
                    $stepDescription = $request->input("step_description.$index");
                    $locationLink = $request->input("step_location.$index");
                    $startDate = $request->input("step_start_date.$index");
                    $endDate = $request->input("step_end_date.$index");
                    
                    // Upload file attachment jika ada
                    $attachmentPath = null;
                    if ($request->hasFile("step_attachment.$index")) {
                        $attachmentPath = $fileServices->uploadFile(
                            $request->file("step_attachment")[$index], 
                            strtolower($type)
                        );
                    }
                    
                    // Buat entri di room_steps untuk tahapan ini
                    \App\Models\RoomStep::create([
                        'room_id' => $room->id,
                        'step_number' => $index + 1,
                        'step_type' => $type,
                        'step_name' => $stepName,
                        'step_description' => $stepDescription,
                        'location_link' => $locationLink,
                        'start_date' => $startDate,
                        'end_date' => $endDate,
                        'attachment_path' => $attachmentPath
                    ]);
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Data lowongan berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Menentukan path_type_id berdasarkan jenis tahapan
     */
    private function getPathTypeIdByStepType($stepType)
    {
        $pathTypes = [
            'Upload Berkas' => 1,
            'Meeting' => 2,
            'Challenge' => 3,
            // Tambahkan pemetaan untuk jenis tahapan baru
        ];
        
        // Jika jenis tahapan tidak dikenali, gunakan tipe generic
        return $pathTypes[$stepType] ?? 4; // Asumsi 4 adalah ID untuk tipe generic
    }


    // public function selectionRoomDetail($id)
    // {
    //     $room = rooms::findOrFail($id);

    //     $allcandidates
    //         = $room->candidates()->paginate(10);
    //     // dd($room->id);
    //     $berkasPath = paths::where('room_id', $room->id)->where('path_type_id', 1)->first();
    //     $meetPath = paths::where('room_id', $room->id)->where('path_type_id', 2)->first();
    //     $challangePath = paths::where('room_id', $room->id)->where('path_type_id', 3)->first();
    //     // dd(paths::all());
    //     // foreach ($berkasPath->pathPemberkasan->submissionPemberkasan as $submission) {
    //     //     dd($submission->candidate->full_name);
    //     // }

    //     // foreach ($meetPath->pathMeetingInvitation->submissionMeetingInvitation as $submission) {
    //     //     dd($submission->candidate->full_name);
    //     // }

    //     // foreach ($challangePath->pathChallange->submissionChallange as $submission) {
    //     //     dd($submission->candidate->full_name);
    //     // }
    //     $berkasCandidates = $berkasPath->pathPemberkasan->submissionPemberkasan;
    //     $meetCandidates = $meetPath->pathMeetingInvitation->submissionMeetingInvitation;
    //     $challangeCandidates = $challangePath->pathChallange->submissionChallange;
    //     $approvedCandidates = $room->candidates()->wherePivot('status', 'approved')->paginate(10);
    //     return view('recruiter.postRoomDetail', compact('room', 'allcandidates', 'berkasPath', 'meetPath', 'challangePath', 'berkasCandidates', 'meetCandidates', 'challangeCandidates', 'approvedCandidates'));
    // }
    public function selectionRoomDetail($id)
{
    $room = rooms::findOrFail($id);
    $allcandidates = $room->candidates()->paginate(5);
    
    // Fetch steps for this room
    $steps = \App\Models\RoomStep::where('room_id', $room->id)
        ->orderBy('step_number')
        ->get();
    
    // Prepare data for view
    $pathData = [];
    
    foreach ($steps as $step) {
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
            'candidates' => $this->getCandidatesForStep($room, $step)
        ];
        
        $pathData[] = $pathInfo;
    }
    
    $approvedCandidates = $room->candidates()->wherePivot('status', 'approved')->paginate(5);

    return view('recruiter.postRoomDetail', compact('room', 'allcandidates', 'pathData', 'approvedCandidates'));
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

private function getCandidatesForStep($room, $step)
{
    // This would need to be replaced with your actual implementation
    // based on how you track which candidates are at which step
    $candidates = collect(); // Empty collection as placeholder
    
    // Return paginated candidates
    return $this->paginate($candidates, 5);
}

private function paginate($items, $perPage = 15)
{
    $page = \Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1;
    $items = $items instanceof \Illuminate\Support\Collection ? $items : collect($items);
    return new \Illuminate\Pagination\LengthAwarePaginator(
        $items->forPage($page, $perPage),
        $items->count(),
        $perPage,
        $page,
        ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()]
    );
}
}
