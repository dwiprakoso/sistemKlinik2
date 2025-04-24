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
      @include('admin.components.sidebar')     
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
                  <h2 class="text-xl font-bold text-white">Admin</h2>
                </div>
              </div>
            </div>

            <!-- Notification Icons Card -->
            <div class="flex items-center justify-center gap-4 p-4 rounded-lg bg-white shadow-md hover:shadow-lg transition-all duration-300 dark:bg-gray-800">
              <!-- Message Button -->
              <button class="relative inline-flex items-center p-2 text-[#e73002] hover:text-[#fd7d09] transition-colors duration-200 focus:outline-none dark:text-gray-400" type="button" aria-label="Messages">
                <div class="flex items-center justify-center h-10 w-10 rounded-full bg-gray-100">
                  <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M3 5.983C3 4.888 3.895 4 5 4h14c1.105 0 2 .888 2 1.983v8.923a1.992 1.992 0 0 1-2 1.983h-6.6l-2.867 2.7c-.955.899-2.533.228-2.533-1.08v-1.62H5c-1.105 0-2-.888-2-1.983V5.983Zm5.706 3.809a1 1 0 1 0-1.412 1.417 1 1 0 1 0 1.412-1.417Zm2.585.002a1 1 0 1 1 .003 1.414 1 1 0 0 1-.003-1.414Zm5.415-.002a1 1 0 1 0-1.412 1.417 1 1 0 1 0 1.412-1.417Z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <div class="absolute w-3 h-3 bg-[#fd1d02] border-2 border-white rounded-full -top-0.5 right-0 dark:border-gray-900"></div>
              </button>
              
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
             <div class="flex items-center justify-between px-4 py-3 font-medium text-gray-700 bg-gray-50 dark:bg-gray-800 dark:text-white">
               <span>Notifications</span>
               <span class="inline-flex items-center justify-center w-6 h-6 text-xs font-semibold text-white bg-red-500 rounded-full">1</span>
             </div>
             <div class="divide-y divide-gray-100 dark:divide-gray-700">
               <a href="#" class="flex px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                 <div class="flex-shrink-0">
                   <img class="rounded-full w-11 h-11" src="https://media.licdn.com/dms/image/D5603AQHC4IFjmiQi1Q/profile-displayphoto-shrink_400_400/0/1680830096821?e=1721260800&v=beta&t=djkevYMcgIYM7wYZJxQ1Xrp7N6e5KE8IqNhd0PCIi6A" alt="Profile image">
                   <div class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-blue-600 border border-white rounded-full dark:border-gray-800">
                     <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                       <path d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z"/>
                       <path d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z"/>
                     </svg>
                   </div>
                 </div>
                 <div class="w-full ps-3">
                   <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">Pendaftar baru <span class="font-semibold text-gray-900 dark:text-white">Aslam Thariq</span> Marketing Manager - Unit MSOS</div>
                   <div class="text-xs text-blue-600 dark:text-blue-500">a few moments ago</div>
                 </div>
               </a>
             </div>
             <a href="#" class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white transition-colors duration-200">
               <div class="inline-flex items-center">
                 <svg class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
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
           <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
             <!-- Job Post Card -->
             <div class="p-4 bg-fd7d09 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 dark:bg-gray-800">
               <div class="flex items-center">
                 <div class="p-3 mr-4 rounded-full bg-white/20">
                   <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                   </svg>
                 </div>
                 <div>
                   <p class="mb-2 text-sm font-medium text-white">Total Job Post</p>
                   <p class="text-2xl font-semibold text-white">{{ $roomscount }}</p>
                 </div>
               </div>
             </div>
       
             <!-- Pendaftar Card -->
             <div class="p-4 bg-fd1d02 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 dark:bg-gray-800">
               <div class="flex items-center">
                 <div class="p-3 mr-4 rounded-full bg-white/20">
                   <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                   </svg>
                 </div>
                 <div>
                   <p class="mb-2 text-sm font-medium text-white">Total Pendaftar</p>
                   <p class="text-2xl font-semibold text-white">{{ $candidatescount }}</p>
                 </div>
               </div>
             </div>
       
             <!-- Perusahaan Card -->
             <div class="p-4 bg-fd1d02 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 dark:bg-gray-800">
               <div class="flex items-center">
                 <div class="p-3 mr-4 rounded-full bg-white/20">
                   <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                   </svg>
                 </div>
                 <div>
                   <p class="mb-2 text-sm font-medium text-white">Total Perusahaan</p>
                   <p class="text-2xl font-semibold text-white">{{ $companiescount }}</p>
                 </div>
               </div>
             </div>
           </div>
       
           <!-- Recent Activity Section -->
           <div class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-700">
             <div class="flex justify-between items-center mb-4">
               <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Recent Activity</h3>
             </div>
             <div class="overflow-x-auto">
               <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                 <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                   <tr>
                     <th scope="col" class="px-4 py-3 rounded-tl-lg">Name</th>
                     <th scope="col" class="px-4 py-3">Position</th>
                     <th scope="col" class="px-4 py-3">Company</th>
                     <th scope="col" class="px-4 py-3">Status</th>
                     <th scope="col" class="px-4 py-3 rounded-tr-lg">Date</th>
                   </tr>
                 </thead>
                 <tbody>
                  @foreach ( $candidatesroom as $candidateroom )
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{ $candidateroom->candidate->full_name }}
                    </th>
                    <td class="px-4 py-3">{{ $candidateroom->rooms->position_name }}</td>
                    <td class="px-4 py-3">{{ $candidateroom->rooms->company->company_name }}</td>
                    <td class="px-4 py-3">
                      <span class="px-2 py-1 text-xs font-medium text-white rounded-full
                        @if($candidateroom->status == 'pending') bg-yellow-500
                        @elseif($candidateroom->status == 'approved') bg-green-500
                        @elseif($candidateroom->status == 'rejected') bg-red-500
                        @elseif($candidateroom->status == 'present') bg-blue-500
                        @elseif($candidateroom->status == 'absent') bg-gray-500
                        @endif">
                        {{ $candidateroom->status }}
                      </span>
                    </td>
                    <td class="px-4 py-3">{{ $candidateroom->created_at->format('d M Y, H:i') }}</td>
                  </tr>
                  @endforeach
                 </tbody>
               </table>
             </div>
           </div>
         </div>
       </div>
      

   </body>
</html>