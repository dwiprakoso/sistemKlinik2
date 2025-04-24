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
           <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
               <li class="inline-flex items-center">
                  <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                     <svg class="w-3.5 h-3.5 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                     </svg>
                     Dashboard
                  </a>
               </li>
               <li>
                  <div class="flex items-center">
                     <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                     </svg>
                     <span class="ml-1 text-sm font-medium text-gray-700 dark:text-gray-400">Kelola Administrasi</span>
                  </div>
               </li>
            </ol>
         </nav>
         <div class="flex items-center p-6 rounded-lg bg-gradient-to-r from-orange-500 to-orange-400 shadow-lg dark:from-orange-600 dark:to-orange-500">
            <div>
              <h2 class="text-lg font-medium text-white dark:text-white opacity-90">Coming Soon</h2>
              <p class="text-4xl font-bold text-white dark:text-white mt-2">Coming Soon</p>
            </div>
            <div class="ml-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
          </div>
         <!-- Main Card -->
         <div class="bg-white dark:bg-gray-800 rounded-xl mt-6 shadow-md overflow-hidden">
            <!-- Table -->
            <div class=" mt-3 p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
               <div class="flex justify-between items-center mb-6">
                  <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Coming Soon</h2>
               </div>
               <div class="overflow-x-auto">
                  <table class="w-full text-sm text-left">
                     <thead class="text-xs font-semibold uppercase bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-t-lg">
                        <tr>
                           <th scope="col" class="px-6 py-4">Coming Soon</th>
                           <th scope="col" class="px-6 py-4">Coming Soon</th>
                           <th scope="col" class="px-6 py-4">Coming Soon</th>
                           <th scope="col" class="px-6 py-4">Coming Soon</th>
                           <th scope="col" class="px-6 py-4">Coming Soon</th>
                           <th scope="col" class="px-6 py-4">Coming Soon</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-gray-600 transition-colors">
                           <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              <div class="flex items-center">
                                 <div>
                                    <p class="font-semibold">Coming Soon</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Coming Soon</p>
                                 </div>
                              </div>
                           </th>
                           <td class="px-6 py-4">
                              <div class="flex items-center">
                                 <div class="w-3 h-3 rounded-full bg-gray-300 mr-2"></div>
                                 Coming Soon
                              </div>
                           </td>
                           <td class="px-6 py-4">
                              <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                 Coming Soon
                              </span>
                           </td>
                           <td class="px-6 py-4 font-medium">
                              Coming Soon
                           </td>
                           <td class="px-6 py-4 text-center">
                              <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300" id="job-status-1">
                                 Coming Soon
                              </span>
                           </td>
                           <td class="px-6 py-4 text-center">
                              <button data-job-id="1" class="job-edit-btn inline-block p-1.5 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition-colors dark:bg-blue-900 dark:text-blue-300 dark:hover:bg-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                              </button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
       </div>
   </body>
</html>