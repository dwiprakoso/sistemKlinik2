<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ url('images/job-match-white.svg') }}">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <title>Selection Process</title>
</head>

<body>
    @php
        use Carbon\Carbon;
    @endphp
    @include('recruiter.components.sidebar')

    <div class="sm:ml-80">

        <div class="p-4 m-4 rounded-lg dark:border-gray-700">
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard.recruiter') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="{{ route('dashboard.recruiter.selectionRoom') }}"
                                class="text-sm font-medium text-gray-700 ms-1 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Post
                                Room</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="text-sm font-medium text-gray-500 ms-1 md:ms-2 dark:text-gray-400">{{ $room->position_name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h2 class="mb-2 text-xl font-bold text-gray-900">{{ $room->position_name }}</h2>

<!-- Statistics Cards with Gradient Background -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
    <!-- Pendaftar Card -->
    <div class="flex items-center rounded-lg shadow-md bg-gradient-to-r from-red-600 to-orange-500 text-white p-4">
        <div class="p-3 bg-white/20 rounded-full">
            <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div class="ps-4">
            <div class="text-2xl font-extrabold">{{ $room->candidates()->count() }}</div>
            <div class="text-sm font-medium opacity-90">Pendaftar</div>
        </div>
    </div>

    <!-- Sedang Proses Card -->
    <div class="flex items-center rounded-lg shadow-md bg-gradient-to-r from-red-600 to-orange-500 text-white p-4">
        <div class="p-3 bg-white/20 rounded-full">
            <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div class="ps-4">
            <div class="text-2xl font-extrabold">{{ $room->candidates()->wherePivot('status', 'present')->count() }}</div>
            <div class="text-sm font-medium opacity-90">Sedang proses</div>
        </div>
    </div>

    <!-- Tereliminasi Card -->
    <div class="flex items-center rounded-lg shadow-md bg-gradient-to-r from-red-600 to-orange-500 text-white p-4">
        <div class="p-3 bg-white/20 rounded-full">
            <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 8 0 4 4 0 0 1-8 0Zm-2 9a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-1Zm13-6a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-4Z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div class="ps-4">
            <div class="text-2xl font-extrabold">{{ $room->candidates()->wherePivot('status', 'rejected')->count() }}</div>
            <div class="text-sm font-medium opacity-90">Tereliminasi</div>
        </div>
    </div>

    <!-- Tahap Offering Card -->
    <div class="flex items-center rounded-lg shadow-md bg-gradient-to-r from-red-600 to-orange-500 text-white p-4">
        <div class="p-3 bg-white/20 rounded-full">
            <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M9 2a1 1 0 0 0-1 1H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2a1 1 0 0 0-1-1H9Zm1 2h4v2h1a1 1 0 1 1 0 2H9a1 1 0 0 1 0-2h1V4Zm5.707 8.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div class="ps-4">
            <div class="text-2xl font-extrabold">{{ $room->candidates()->wherePivot('status', 'approved')->count() }}</div>
            <div class="text-sm font-medium opacity-90">Tahap Offering</div>
        </div>
    </div>
</div>

<!-- Progress Tabs with Enhanced Styling - Dinamis -->
<div class="p-6 mb-4 border bg-white rounded-xl shadow-md">
    <ul class="flex flex-wrap md:flex-nowrap items-center w-full text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" data-tabs-active-classes="text-red-600" data-tabs-inactive-classes="text-gray-500" role="tablist">
        <!-- Phase 0: Participant Info (selalu ada) -->
        <li class="relative flex flex-col items-center w-full md:w-1/{{ count($pathData) + 2 }} mb-4 md:mb-0" role="path point selection">
            <div class="flex items-center">
                <button class="flex flex-col items-center" id="participant-tab" data-tabs-target="#participant" type="button" role="tab" aria-controls="participant" aria-selected="false">
                    <span class="inline-flex items-center justify-center w-10 h-10 text-white rounded-full bg-gradient-to-r from-red-600 to-orange-500 shadow-md">1</span>
                    <span class="mt-2 font-medium text-red-600">Participant Info</span>
                    <span class="block mt-1 text-xs text-gray-500">{{ Carbon::parse($room->created_at)->translatedFormat('d F Y') }}</span>
                </button>
            </div>
            <div class="hidden md:block w-full h-1 bg-gradient-to-r from-red-600 to-orange-500 absolute top-5 left-1/2 -z-10"></div>
        </li>
        
        <!-- Tahapan Dinamis berdasarkan pathData -->
        @foreach($pathData as $index => $data)
        <li class="relative flex flex-col items-center w-full md:w-1/{{ count($pathData) + 2 }} mb-4 md:mb-0" role="path point selection">
            <div class="flex items-center">
                <button class="flex flex-col items-center" id="path-tab-{{ $index + 1 }}" data-tabs-target="#path-content-{{ $index + 1 }}" type="button" role="tab" aria-controls="path-content-{{ $index + 1 }}" aria-selected="false">
                    <span class="inline-flex items-center justify-center w-10 h-10 text-white rounded-full bg-gradient-to-r from-red-600 to-orange-500 shadow-md">{{ $index + 2 }}</span>
                    <span class="mt-2 font-medium text-red-600">{{ $data['path']->path_name }}</span>
                    @if(isset($data['detail']->rentang_waktu))
                    <span class="block mt-1 text-xs text-gray-500">{{ $data['detail']->rentang_waktu }}</span>
                    @endif
                </button>
            </div>
            @if($index < count($pathData))
            <div class="hidden md:block w-full h-1 bg-gradient-to-r from-red-600 to-orange-500 absolute top-5 left-1/2 -z-10"></div>
            @endif
        </li>
        @endforeach
        
        <!-- Phase terakhir: Offering (selalu ada) -->
        <li class="flex flex-col items-center w-full md:w-1/{{ count($pathData) + 2 }}" role="path point selection">
            <div class="flex items-center">
                <button class="flex flex-col items-center" id="approved-tab" data-tabs-target="#approved" type="button" role="tab" aria-controls="approved" aria-selected="false">
                    <span class="inline-flex items-center justify-center w-10 h-10 text-white rounded-full bg-gradient-to-r from-red-600 to-orange-500 shadow-md">{{ count($pathData) + 2 }}</span>
                    <span class="mt-2 font-medium text-red-600">Tahap Offering</span>
                </button>
            </div>
        </li>
    </ul>
</div>

<div id="default-tab-content">
    <!-- Tab Participant -->
    <div class="hidden p-4 border rounded-lg bg-gray-50" id="participant" role="tabpanel"
        aria-labelledby="participant-tab">
        @include('recruiter.components.participantTable')
    </div>
    
    <!-- Tab untuk setiap tahapan dinamis -->
    @foreach($pathData as $index => $data)
    <div class="hidden p-4 border rounded-lg bg-gray-50" id="path-content-{{ $index + 1 }}" role="tabpanel"
        aria-labelledby="path-tab-{{ $index + 1 }}">
        
        <!-- Menentukan komponen tabel yang ditampilkan berdasarkan tipe path -->
        @switch($data['path']->path_type_id)
            @case(1)
                @include('recruiter.components.pemberkasanTable', ['berkasCandidates' => $data['candidates']])
                @break
            @case(2)
                @include('recruiter.components.meetInvitationTable', ['meetCandidates' => $data['candidates']])
                @break
            @case(3)
                @include('recruiter.components.challangeTable', ['challangeCandidates' => $data['candidates']])
                @break
            @default
                <!-- Template untuk tipe tahapan custom -->
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-4">{{ $data['path']->path_name }}</h3>
                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-6">Nama Kandidat</th>
                                    <th scope="col" class="py-3 px-6">Tanggal Submit</th>
                                    <th scope="col" class="py-3 px-6">Status</th>
                                    <th scope="col" class="py-3 px-6">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data['candidates'] && count($data['candidates']) > 0)
                                    @foreach($data['candidates'] as $candidate)
                                    <tr class="bg-white border-b">
                                        <td class="py-4 px-6">{{ $candidate->candidate->full_name ?? 'Nama tidak tersedia' }}</td>
                                        <td class="py-4 px-6">{{ $candidate->created_at ? $candidate->created_at->format('d/m/Y') : '-' }}</td>
                                        <td class="py-4 px-6">
                                            <span class="px-2 py-1 text-xs rounded-full {{ $candidate->status == 'approved' ? 'bg-green-100 text-green-800' : ($candidate->status == 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                                {{ ucfirst($candidate->status) }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-6">
                                            <button class="text-blue-600 hover:text-blue-900">Detail</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr class="bg-white border-b">
                                        <td colspan="4" class="py-4 px-6 text-center">Belum ada kandidat yang mengikuti tahapan ini</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                @break
        @endswitch
    </div>
    @endforeach
    
    <!-- Tab Approved/Offering -->
    <div class="hidden p-4 border rounded-lg bg-gray-50" id="approved" role="tabpanel"
        aria-labelledby="approved-tab">
        @include('recruiter.components.approvedTable')
    </div>
</div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Script untuk tab default yang aktif saat halaman pertama kali dibuka
        const firstTab = document.querySelector('[data-tabs-toggle="#default-tab-content"] button');
        if (firstTab) {
            firstTab.click();
        }
    });
    </script>
</body>

</html>