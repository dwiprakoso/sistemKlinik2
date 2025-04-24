<!DOCTYPE html>
<html lang="en">
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
   @include('candidates.components.sidebar')     
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
         <div class="md:col-span-5 p-6 flex items-center rounded-lg bg-gradient-to-r from-[#e73002] to-[#fd7d09] shadow-md hover:shadow-lg transition-all duration-300 dark:bg-gray-800">
           <div class="flex items-center">
             <div class="p-3 mr-4 rounded-full bg-white bg-opacity-20">
               <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"></path>
               </svg>
             </div>
             <div>
               <p class="text-sm font-medium text-white">Selamat datang,</p>
               <h2 class="text-xl font-bold text-white">{{ $profile->full_name }}</h2>
             </div>
           </div>
         </div>
       </div>
    
        <!-- Dropdown Notification Menu -->
        <div id="dropdownNotification" class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow-xl dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton">
         <!-- Header with brand gradient -->
         <div class="flex items-center justify-between px-4 py-3 font-medium text-white bg-gradient-to-r from-[#e73002] to-[#fd7d09] rounded-t-lg dark:from-[#e73002] dark:to-[#fd7d09]">
           <span>Notifications</span>
           <span class="inline-flex items-center justify-center w-6 h-6 text-xs font-semibold bg-white text-[#e73002] rounded-full">1</span>
         </div>
         
         <div class="divide-y divide-gray-100 dark:divide-gray-700">
           <a href="#" class="flex px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
             <div class="relative flex-shrink-0">
               <img class="rounded-full w-11 h-11 border-2 border-orange-100" src="{{  $profile->photo_path ? asset('storage/' .  $profile->photo_path) : asset('images/profile-empty.png') }}" alt="Profile image">
               <div class="absolute flex items-center justify-center w-5 h-5 -right-1 -bottom-1 bg-[#fd7d09] border-2 border-white rounded-full dark:border-gray-800">
                 <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                   <path d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z"/>
                   <path d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z"/>
                 </svg>
               </div>
             </div>
             <!-- Bagian Notifikasi -->
            <div class="notifications-container bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-6">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Notifikasi</h3>
              
              @if(count($notifications) > 0)
                  @foreach($notifications as $notification)
                      <div class="flex items-center border-b dark:border-gray-700 py-3 last:border-b-0">
                          <div class="w-10 h-10 flex-shrink-0 rounded-full bg-blue-100 flex items-center justify-center">
                              @if($notification->status == 'accepted')
                                  <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                  </svg>
                              @elseif($notification->status == 'rejected')
                                  <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                  </svg>
                              @elseif($notification->status == 'present')
                                  <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                  </svg>
                              @endif
                          </div>
                          <div class="w-full ps-3">
                              <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">
                                  Status aplikasi <span class="font-semibold text-gray-900 dark:text-white">
                                      @if($notification->status == 'accepted')
                                          diterima
                                      @elseif($notification->status == 'rejected')
                                          ditolak
                                      @elseif($notification->status == 'present')
                                          diundang wawancara
                                      @else
                                          {{ $notification->status }}
                                      @endif
                                  </span>
                              </div>
                              <div class="text-xs text-gray-500 dark:text-gray-400">
                                  {{ $notification->position_name }} - {{ $notification->departement }} - {{ $notification->company_name }}
                              </div>
                              <div class="text-xs text-[#e73002] dark:text-[#fd7d09] mt-1">
                                  {{ \Carbon\Carbon::parse($notification->updated_at)->diffForHumans() }}
                              </div>
                          </div>
                      </div>
                  @endforeach
              @else
                  <div class="text-center text-gray-500 dark:text-gray-400 py-4">
                      Tidak ada notifikasi baru
                  </div>
              @endif
            </div>
           </a>
         </div>
         
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
                    <path d="M19 4h-3V2h-2v2h-4V2H8v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2zm-7 5h5v5h-5v-5z"></path>
                </svg>
            </div>
            <div class="flex items-center justify-between">
                <div>
                    <p class="mb-1 text-sm font-medium text-white/80">Total Lamaran</p>
                    <p class="text-3xl font-bold text-white">{{ $jumlahRoomsApply }}</p>
                </div>
                <div class="p-3 rounded-full bg-white/20 flex items-center justify-center">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-white/20">
                <a href="{{ route('dashboard.kandidat.status') }}" class="text-white/90 hover:text-white text-sm font-medium flex items-center">
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
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"></path>
                </svg>
            </div>
            <div class="flex items-center justify-between">
                <div>
                    <p class="mb-1 text-sm font-medium text-white/80">Lamaran di Proses</p>
                    <p class="text-3xl font-bold text-white">{{ $jumlahRoomsPresentStatus }}</p>
                </div>
                <div class="p-3 rounded-full bg-white/20 flex items-center justify-center">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
            </div>
            
        </div>
         </div>
    
        <!-- Recent Activity Section -->
        <div class="bg-white mt-6 p-6 rounded-lg shadow-md dark:bg-gray-700">
         <div class="flex justify-between items-center mb-4">
           <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Recent Activity</h3>
           <a href="{{ route('dashboard.kandidat.status') }}" class="text-blue-600 hover:underline dark:text-blue-400 text-sm">View All</a>
         </div>
         <div class="overflow-x-auto">
           <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
             <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
               <tr>
                 <th scope="col" class="px-4 py-3 rounded-tl-lg">Position</th>
                 <th scope="col" class="px-4 py-3">Perusahaan</th>
                 <th scope="col" class="px-4 py-3">Work System</th>
                 <th scope="col" class="px-4 py-3">Status</th>
                 <th scope="col" class="px-4 py-3 rounded-tr-lg">Applied</th>
               </tr>
             </thead>
             <tbody>
               @if(count($recentAppliedJobs) > 0)
                 @foreach($recentAppliedJobs as $job)
                   <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                     <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       <a href="#" class="hover:text-blue-600 dark:hover:text-blue-400">
                         {{ $job->position_name }}
                       </a>
                     </th>
                     <td class="px-4 py-3">{{ $job->company_name }}</td>
                     <td class="px-4 py-3">
                       {{ $job->work_system }}
                     </td>
                     <td class="px-4 py-3">
                       {{ $job->status }}
                     </td>
                     <td class="px-4 py-3">
                        @if(is_string($job->created_at))
                            {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}
                        @else
                            {{ $job->created_at->diffForHumans() }}
                        @endif
                    </td>
                   </tr>
                 @endforeach
               @else
                 <tr class="bg-white dark:bg-gray-800">
                   <td colspan="5" class="px-4 py-6 text-center text-gray-500 dark:text-gray-400">
                     Belum ada posisi yang dibuka.
                     <a href="{{ route('dashboard.recruiter.selectionRoom') }}" class="text-blue-600 hover:underline dark:text-blue-400">
                       Buka posisi baru
                     </a>
                   </td>
                 </tr>
               @endif
             </tbody>
           </table>
         </div>
       </div>
    </div>
   
</body>
</html>