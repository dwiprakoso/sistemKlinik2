<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="../path/to/flowbite/dist/datepicker.js"></script>
    <link rel="icon" href="{{ url('images/job-match-white.svg') }}">
    <title>Talent pool</title>
</head>
<body class="bg-gray-50">
    @include('recruiter.components.sidebar')
     
    <div class="sm:ml-80">
        <div class="p-4 m-4 rounded-lg dark:border-gray-700">
            <!-- Breadcrumb Navigation -->
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard.recruiter') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Talent Pool</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Header Section with Gradient -->
            <div class="mb-6">
                <div class="p-6 rounded-lg shadow-md bg-gradient-to-r from-[#e73002] to-[#fd7d09] text-white">
                    <div class="flex justify-between items-center">
                        <div>
                            <h1 class="text-2xl font-bold mb-2">Talent Pool</h1>
                        </div>
                        <div class="flex items-center space-x-3">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Total Candidates</p>
                            <h3 class="font-bold text-2xl">{{ count($allCandidates) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Approved</p>
                            <h3 class="font-bold text-2xl">{{ $allCandidates->where('status', 'approved')->count() }}</h3>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Pending</p>
                            <h3 class="font-bold text-2xl">{{ $allCandidates->where('status', 'pending')->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Candidate Table -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-100">
                <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="font-semibold text-gray-700">Candidate List</h3>
                </div>
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-[#e73002] bg-gray-100 border-gray-300 rounded focus:ring-[#e73002]">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Position
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Department
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allCandidates as $roomCandidate)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-{{ $roomCandidate->id }}" type="checkbox" class="w-4 h-4 text-[#e73002] bg-gray-100 border-gray-300 rounded focus:ring-[#e73002]">
                                    <label for="checkbox-table-search-{{ $roomCandidate->id }}" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                <img class="w-10 h-10 rounded-full object-cover" src="{{  $roomCandidate->candidate->photo_path ? asset('storage/' .  $roomCandidate->candidate->photo_path) : asset('images/profile-empty.png') }}"
                                alt="profile image - {{ $roomCandidate->candidate->full_name  }}">
                                <div class="ps-3">
                                    <div class="text-base font-semibold">{{ $roomCandidate->candidate->full_name }}</div>
                                    <div class="font-normal text-gray-500">{{ $roomCandidate->candidate->user->email }}</div>
                                </div>  
                            </th>
                            <td class="px-6 py-4">
                                {{ $roomCandidate->rooms->where('id', $roomCandidate->rooms_id)->first()->position_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $roomCandidate->rooms->where('id', $roomCandidate->rooms_id)->first()->departement }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @php
                                        $statusColors = [
                                            'pending' => 'bg-yellow-500',
                                            'approved' => 'bg-green-500',
                                            'rejected' => 'bg-red-500',
                                            'present' => 'bg-blue-500',
                                            'default' => 'bg-gray-500'
                                        ];
                                        $bgColor = $statusColors[$roomCandidate->status] ?? $statusColors['default'];
                                        
                                        $statusClasses = [
                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                            'approved' => 'bg-green-100 text-green-800',
                                            'rejected' => 'bg-red-100 text-red-800',
                                            'present' => 'bg-blue-100 text-blue-800',
                                            'default' => 'bg-gray-100 text-gray-800'
                                        ];
                                        $badgeClass = $statusClasses[$roomCandidate->status] ?? $statusClasses['default'];
                                    @endphp
                                    
                                    <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $badgeClass }}">
                                        {{ ucfirst($roomCandidate->status) }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 flex justify-center items-center">
                            <div class="flex space-x-2">
                                <button class="p-1.5 bg-green-100 text-green-600 rounded-lg hover:bg-green-200 transition-colors dark:bg-green-900 dark:text-green-300 dark:hover:bg-green-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
<!-- Modal untuk melihat detail kandidat -->
<div id="viewCandidateModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/5 lg:w-2/5 shadow-lg rounded-lg bg-white">
        <!-- Header Modal -->
        <div class="flex justify-between items-center border-b pb-3">
            <h3 class="text-lg font-semibold text-gray-700">Detail Kandidat</h3>
            <button id="closeViewModal" class="text-gray-500 hover:text-gray-700">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Isi Modal -->
        <div class="pt-4">
            <div class="flex flex-col md:flex-row items-center mb-6">
                <img id="candidatePhoto" class="w-24 h-24 rounded-full object-cover mb-4 md:mb-0 md:mr-6" src="" alt="Foto Kandidat">
                <div>
                    <h4 id="candidateName" class="text-xl font-semibold"></h4>
                    <p id="candidateEmail" class="text-gray-500"></p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <h5 class="text-sm font-medium text-gray-500">Posisi</h5>
                    <p id="candidatePosition" class="text-gray-900"></p>
                </div>
                <div>
                    <h5 class="text-sm font-medium text-gray-500">Departemen</h5>
                    <p id="candidateDepartment" class="text-gray-900"></p>
                </div>
                <div>
                    <h5 class="text-sm font-medium text-gray-500">Status</h5>
                    <div id="candidateStatusContainer"></div>
                </div>
                <!-- Tanggal Aplikasi field has been removed -->
            </div>

            <!-- Tombol aksi -->
            <div class="flex justify-end mt-6">
                <button id="closeModalButton" class="py-2 px-4 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>  

</body>
<!-- Script untuk menangani modal -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil semua tombol view
        const viewButtons = document.querySelectorAll('.bg-green-100.text-green-600');
        const modal = document.getElementById('viewCandidateModal');
        const closeIconButton = document.getElementById('closeViewModal');
        const closeActionButton = document.getElementById('closeModalButton');

        // Fungsi untuk membuka modal
        function openModal(candidateData) {
            // Isi data kandidat ke dalam modal
            document.getElementById('candidatePhoto').src = candidateData.photo;
            document.getElementById('candidatePhoto').alt = 'Foto ' + candidateData.name;
            document.getElementById('candidateName').textContent = candidateData.name;
            document.getElementById('candidateEmail').textContent = candidateData.email;
            document.getElementById('candidatePosition').textContent = candidateData.position;
            document.getElementById('candidateDepartment').textContent = candidateData.department;
            
            // Atur status badge
            const statusContainer = document.getElementById('candidateStatusContainer');
            statusContainer.innerHTML = '';
            
            const statusClasses = {
                'pending': 'bg-yellow-100 text-yellow-800',
                'approved': 'bg-green-100 text-green-800',
                'rejected': 'bg-red-100 text-red-800',
                'present': 'bg-blue-100 text-blue-800',
                'absent': 'bg-gray-100 text-gray-800',
                'default': 'bg-gray-100 text-gray-800'
            };
            
            const badgeClass = statusClasses[candidateData.status] || statusClasses['default'];
            const statusBadge = document.createElement('span');
            statusBadge.className = `px-2.5 py-1 rounded-full text-xs font-medium ${badgeClass}`;
            statusBadge.textContent = candidateData.status.charAt(0).toUpperCase() + candidateData.status.slice(1);
            statusContainer.appendChild(statusBadge);
            
            // Tampilkan modal
            modal.classList.remove('hidden');
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            modal.classList.add('hidden');
        }

        // Event listener untuk tombol view
        viewButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Ambil data dari baris tabel
                const row = this.closest('tr');
                
                // Dapatkan data dari elemen tersembunyi yang akan ditambahkan pada blade template
                const candidateId = row.querySelector('input[type="checkbox"]').id.replace('checkbox-table-search-', '');
                const name = row.querySelector('.text-base.font-semibold').textContent.trim();
                const email = row.querySelector('.font-normal.text-gray-500').textContent.trim();
                const position = row.querySelector('td:nth-child(3)').textContent.trim();
                const department = row.querySelector('td:nth-child(4)').textContent.trim();
                const statusElement = row.querySelector('td:nth-child(5) .rounded-full');
                const status = statusElement.textContent.trim().toLowerCase();
                const photo = row.querySelector('img').src;
                
                // Buka modal dengan data kandidat
                openModal({
                    id: candidateId,
                    name,
                    email,
                    position,
                    department,
                    status,
                    photo
                });
            });
        });

        // Event listener untuk tombol tutup (ikon X)
        if (closeIconButton) {
            closeIconButton.addEventListener('click', closeModal);
        }
        
        // Event listener untuk tombol tutup (tombol "Tutup")
        if (closeActionButton) {
            closeActionButton.addEventListener('click', closeModal);
        }
        
        // Tutup modal ketika mengklik di luar modal
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                closeModal();
            }
        });
    });
</script>
</html>