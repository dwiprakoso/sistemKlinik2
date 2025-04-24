<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      @vite(['resources/css/app.css','resources/js/app.js'])
      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
      <link rel="icon" href="{{ url('images/job-match-white.svg') }}">
      <title>Selection Process</title>
   </head>
   <body>
      @include('recruiter.components.sidebar')     
      <div class="sm:ml-80">
         <div class="p-6 m-4 rounded-lg shadow-lg bg-white dark:bg-gray-800 dark:border-gray-700">
           <!-- Breadcrumb Navigation -->
           <nav class="flex mb-5" aria-label="Breadcrumb">
             <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
               <li class="inline-flex items-center">
                 <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white transition-colors duration-200">
                   <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                     <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                   </svg>
                   Dashboard
                 </a>
               </li>
             </ol>
           </nav>
       
           <!-- Header Section with Welcome and Notifications -->
           <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">
            <!-- Welcome Message Card -->
            <div class="md:col-span-4 p-6 flex items-center rounded-lg bg-gradient-to-r from-[#e73002] to-[#fd7d09] shadow-md hover:shadow-lg transition-all duration-300 dark:bg-gray-800">
              <div class="flex items-center">
                <div class="p-3 mr-4 rounded-full bg-white bg-opacity-20">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"></path>
                  </svg>
                </div>
                <div>
                  <p class="text-sm font-medium text-white">Selamat datang,</p>
                  <h2 class="text-xl font-bold text-white">{{ $company->company_name }}</h2>
                </div>
              </div>
            </div>

            <!-- Notification Icons Card -->
            <div class="flex items-center justify-center gap-2 p-1 rounded-lg bg-white shadow-md hover:shadow-lg transition-all duration-300 dark:bg-gray-800">
              <!-- Notification Button -->
              <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class="relative inline-flex items-center text-[#e73002] hover:text-[#fd7d09] transition-colors duration-200 focus:outline-none dark:text-gray-400" type="button" aria-label="Notifications">
                <div class="flex items-center justify-center h-10 w-10 rounded-full bg-gray-100">
                  <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                    <path d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z"/>
                  </svg>
                </div>
                <div class="absolute w-3 h-3 bg-[#fd1d02] border-2 border-white rounded-full -top-0.5 right-0 dark:border-gray-900"></div>
              </button>
            </div>
          </div>
       
           <!-- Dropdown Notification Menu -->
           <div id="dropdownNotification" class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow-xl dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton">
            <!-- Header with brand gradient -->
            <div class="flex items-center justify-between px-4 py-3 font-medium text-white bg-gradient-to-r from-[#e73002] to-[#fd7d09] rounded-t-lg dark:from-[#e73002] dark:to-[#fd7d09]">
              <span>Notifications</span>
              <span class="inline-flex items-center justify-center w-6 h-6 text-xs font-semibold bg-white text-[#e73002] rounded-full">1</span>
            </div>
            
            @foreach ( $latestCandidates as $latestCandidate )
              <div class="divide-y divide-gray-100 dark:divide-gray-700">
                <a href="#" class="flex px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                  <div class="relative flex-shrink-0">
                    <img class="rounded-full w-11 h-11 border-2 border-orange-100" src="{{  $latestCandidate->candidate->photo_path ? asset('storage/' .  $latestCandidate->candidate->photo_path) : asset('images/profile-empty.png') }}" alt="profile image - {{ $latestCandidate->candidate->full_name  }}">
                    <div class="absolute flex items-center justify-center w-5 h-5 -right-1 -bottom-1 bg-[#fd7d09] border-2 border-white rounded-full dark:border-gray-800">
                      <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z"/>
                        <path d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z"/>
                      </svg>
                    </div>
                  </div>
                  <div class="w-full ps-3">
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">Pendaftar baru <span class="font-semibold text-gray-900 dark:text-white">{{ $latestCandidate->candidate->full_name }}</span></div>
                    <div class="text-xs text-gray-500 dark:text-gray-400">Posisi <span class="font-semibold text-gray-900 dark:text-white">{{ $latestCandidate->rooms->position_name }}</span></div>
                    <div class="text-xs text-[#e73002] dark:text-[#fd7d09] mt-1">
                      {{ $latestCandidate->created_at->diffForHumans() }}
                  </div>
                  </div>
                </a>
              </div>  
            @endforeach
            
            
            <a href="#" class="block py-3 text-sm font-medium text-center text-[#e73002] hover:bg-orange-50 rounded-b-lg transition-all duration-200 dark:text-[#fd7d09] dark:hover:bg-gray-700">
              <div class="inline-flex items-center">
                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                  <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                </svg>
                View all
              </div>
            </a>
          </div>
       
           <!-- Section Header -->
           <div class="flex items-center justify-between mb-4">
             <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Overview</h3>

           </div>
       
           <!-- Dashboard Metrics Cards -->
           <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Job Post Card -->
            <div class="p-6 bg-gradient-to-r from-orange-500 to-orange-400 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 dark:from-orange-600 dark:to-orange-500 overflow-hidden relative">
                <div class="absolute -bottom-6 -right-6 opacity-10">
                    <svg class="w-32 h-32" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="mb-1 text-sm font-medium text-white/80">Total Job Post</p>
                        <p class="text-3xl font-bold text-white">{{ $roomsCount }}</p>
                    </div>
                    <div class="p-3 rounded-full bg-white/20 flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 pt-3 border-t border-white/20">
                    <a href="{{ route('dashboard.recruiter.selectionRoom') }}" class="text-white/90 hover:text-white text-sm font-medium flex items-center">
                        Lihat Detail
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Pendaftar Card -->
            <div class="p-6 bg-gradient-to-r from-red-600 to-red-500 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 dark:from-red-700 dark:to-red-600 overflow-hidden relative">
                <div class="absolute -bottom-6 -right-6 opacity-10">
                    <svg class="w-32 h-32" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="mb-1 text-sm font-medium text-white/80">Total Pendaftar</p>
                        <p class="text-3xl font-bold text-white">{{ $totalActiveApplicants }}</p>
                    </div>
                    <div class="p-3 rounded-full bg-white/20 flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 pt-3 border-t border-white/20">
                    <a href="{{ route('dashboard.recruiter.candidate') }}" class="text-white/90 hover:text-white text-sm font-medium flex items-center">
                        Lihat Detail
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
       
           <!-- Recent Activity Section -->
           <div class="bg-white mt-6 p-6 rounded-lg shadow-md dark:bg-gray-700">
            <div class="flex justify-between items-center mb-4">
              <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Recent Activity</h3>
              <a href="{{ route('dashboard.recruiter.selectionRoom') }}" class="text-blue-600 hover:underline dark:text-blue-400 text-sm">View All</a>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="px-4 py-3 rounded-tl-lg">Position</th>
                    <th scope="col" class="px-4 py-3">Department</th>
                    <th scope="col" class="px-4 py-3">Work System</th>
                    <th scope="col" class="px-4 py-3">Deadline</th>
                    <th scope="col" class="px-4 py-3 rounded-tr-lg">Applicants</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($rooms as $room)
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      <a href="{{ route('dashboard.recruiter.selectionRoom.detail', $room->id) }}" class="hover:text-blue-600 dark:hover:text-blue-400">
                        {{ $room->position_name }}
                      </a>
                    </th>
                    <td class="px-4 py-3">{{ $room->departement }}</td>
                    <td class="px-4 py-3">
                      @php
                        $workSystemColors = [
                          'WFO' => 'bg-blue-500',
                          'Hybrid' => 'bg-purple-500',
                          'WFH' => 'bg-green-500'
                        ];
                        $systemColor = $workSystemColors[$room->work_system] ?? 'bg-gray-500';
                      @endphp
                      <span class="px-2 py-1 text-xs font-medium text-white rounded-full {{ $systemColor }}">
                        {{ $room->work_system }}
                      </span>
                    </td>
                    <td class="px-4 py-3">
                      @php
                        $now = now();
                        $deadline = $room->deadline;
                        $interval = $now->diff($deadline);
                        $isExpired = $now > $deadline;
                      @endphp
                      
                      @if ($isExpired)
                        <span class="text-red-500">Expired</span>
                      @else
                        @if ($interval->days == 0)
                          <span class="text-red-500">Today</span>
                        @else
                          <span class="{{ $interval->days < 3 ? 'text-orange-500' : 'text-green-500' }}">
                            {{ $interval->days }} days left
                          </span>
                        @endif
                      @endif
                    </td>
                    <td class="px-4 py-3">
                      <span class="font-medium">{{ $room->filledPositions }}/{{ $room->total_open_position }}</span>
                      <span class="text-xs text-gray-500">({{ $room->totalApplicants }} applicants)</span>
                    </td>
                  </tr>
                  @empty
                  <tr class="bg-white dark:bg-gray-800">
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500 dark:text-gray-400">
                      Belum ada posisi yang dibuka.
                      <a href="{{ route('dashboard.recruiter.selectionRoom') }}" class="text-blue-600 hover:underline dark:text-blue-400">
                        Buka posisi baru
                      </a>
                    </td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
       </div>
      <!-- Chat container -->
      

      


      

   </body>
</html>