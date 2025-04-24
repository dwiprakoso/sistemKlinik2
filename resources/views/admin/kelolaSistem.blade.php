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
      @if (session('success'))
         <div id="alert-success" class="fixed top-4 right-4 flex items-center p-4 rounded-lg bg-white shadow-md z-50">
            <div class="flex items-center">
               <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
               </svg>
               <span class="text-gray-700">{{ session('success') }}</span>
            </div>
         </div>
      @endif
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
                     Admin
                  </a>
               </li>
               <li>
                  <div class="flex items-center">
                     <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                     </svg>
                     <span class="ml-1 text-sm font-medium text-gray-700 dark:text-gray-400">Kelola Aplikasi</span>
                  </div>
               </li>
            </ol>
         </nav>
         <div class="flex items-center p-6 rounded-lg bg-gradient-to-r from-orange-500 to-orange-400 shadow-lg dark:from-orange-600 dark:to-orange-500">
            <div>
              <h2 class="text-lg font-medium text-white dark:text-white opacity-90">Total Job Post</h2>
              <p class="text-4xl font-bold text-white dark:text-white mt-2">{{ $roomscount }}</p>
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
                  <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Daftar Lowongan Pekerjaan</h2>
               </div>
               <div class="overflow-x-auto">
                  <table class="w-full text-sm text-left">
                     <thead class="text-xs font-semibold uppercase bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-t-lg">
                        <tr>
                           <th scope="col" class="px-6 py-4">Posisi</th>
                           <th scope="col" class="px-6 py-4">Nama Perusahaan</th>
                           <th scope="col" class="px-6 py-4">Lokasi</th>
                           <th scope="col" class="px-6 py-4">Gaji</th>
                           <th scope="col" class="px-6 py-4 text-center">Tipe Pekerjaan</th>
                           <th scope="col" class="px-6 py-4 text-center">Status</th>
                           <th scope="col" class="px-6 py-4 text-center">Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($rooms as $room)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-gray-600 transition-colors">
                           <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              <div class="flex items-center">
                                 <div>
                                    <p class="font-semibold">{{ $room->position_name }}</p>
                                 </div>
                              </div>
                           </th>
                           <td class="px-6 py-4">
                              {{ $room->company->company_name }}
                           </td>
                           <td class="px-6 py-4">
                              {{ $room->company->company_address }}
                           </td>
                           <td class="px-6 py-4 font-medium">
                              {{ $room->salary }} / month
                           </td>
                           <td class="px-6 py-4 font-medium">
                              {{ $room->work_system }}
                           </td>
                           <td class="px-6 py-4 text-center">
                              @if($room->access_rights == 'private')
                                  <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                      {{ $room->access_rights }}
                                  </span>
                              @else
                                  <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                      {{ $room->access_rights }}
                                  </span>
                              @endif
                          </td>
                           <td class="px-6 py-4 text-center">
                              <div class="flex justify-center space-x-2">
                                 <button onclick="openRoomModal({{ $room->toJson() }})" class="p-1.5 bg-green-100 text-green-600 rounded-lg hover:bg-green-200 transition-colors dark:bg-green-900 dark:text-green-300 dark:hover:bg-green-800">
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
       </div>
       <!-- Status Update Modal -->
       <div id="statusUpdateModal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50 flex items-center justify-center">
         <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-md w-full mx-4">
            <div class="p-6">
               <div class="flex justify-between items-center mb-4">
                  <h3 class="text-lg font-medium text-gray-900 dark:text-white">Update Status</h3>
                  <button type="button" onclick="closeModal()" class="text-gray-400 hover:text-gray-500">
                     <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                     </svg>
                  </button>
               </div>
               
               <form id="updateStatusForm" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" id="room_id" name="room_id">
                  
                  <div class="mb-4">
                     <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Position: <span id="modal_position" class="font-medium"></span></p>
                     <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Company: <span id="modal_company" class="font-medium"></span></p>
                  </div>
                  
                  <div class="mb-4">
                     <label for="access_rights" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status</label>
                     <select id="access_rights" name="access_rights" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="public">Public</option>
                        <option value="private">Private</option>
                     </select>
                  </div>
                  
                  <div class="mt-6 flex justify-end">
                     <button type="button" onclick="closeModal()" class="mr-2 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                        Cancel
                     </button>
                     <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update Status
                     </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         function openRoomModal(room) {
            // Set form values
            document.getElementById('room_id').value = room.id;
            document.getElementById('modal_position').textContent = room.position_name;
            document.getElementById('modal_company').textContent = room.company.company_name;
            document.getElementById('access_rights').value = room.access_rights;
            
            // Set form action with correct path including 'dashboard'
            document.getElementById('updateStatusForm').action = `/dashboard/admin/update-room-status/${room.id}`;
            
            // Show modal
            document.getElementById('statusUpdateModal').classList.remove('hidden');
         }
      
         // Fungsi yang hilang untuk menutup modal
         function closeModal() {
            document.getElementById('statusUpdateModal').classList.add('hidden');
         }
         
         // Auto close alert after 3 seconds
         setTimeout(function() {
            const alert = document.getElementById('alert-success');
            if (alert) {
               alert.style.display = 'none';
            }
         }, 2000);
      </script>

   </body>
</html>