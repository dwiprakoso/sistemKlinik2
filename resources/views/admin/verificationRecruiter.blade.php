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
                     Admin
                  </a>
               </li>
               <li>
                  <div class="flex items-center">
                     <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                     </svg>
                     <span class="ml-1 text-sm font-medium text-gray-700 dark:text-gray-400">Verifikasi Recruiter</span>
                  </div>
               </li>
            </ol>
         </nav>
         
         <!-- Main Card -->
         <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
               <div class="flex items-center justify-between">
                  <div>
                     <h1 class="text-xl font-bold text-gray-900 dark:text-white">Verifikasi Recruiter</h1>
                     
                  </div>
                  
               </div>
            </div>
            
            <!-- Table -->
            <div class="overflow-x-auto">
               <table class="w-full text-sm text-left">
                  <thead class="text-xs font-semibold uppercase bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                     <tr>
                        <th scope="col" class="px-6 py-4">Nama Perusahaan</th>
                        <th scope="col" class="px-6 py-4">Email</th>
                        <th scope="col" class="px-6 py-4">No Telephone</th>
                        <th scope="col" class="px-6 py-4">Linkedin</th>
                        <th scope="col" class="px-6 py-4 text-center">Status</th>
                        <th scope="col" class="px-6 py-4 text-center">Actions</th>
                     </tr>
                  </thead>
                     <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($companies as $company)
                           <tr class="bg-white dark:bg-gray-800 hover:bg-blue-50 dark:hover:bg-gray-700 transition-colors">
                              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                 <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gray-200 rounded-full overflow-hidden flex items-center justify-center mr-3 dark:bg-gray-700">
                                       <img src="{{  $company->logo ? asset('storage/' .  $company->logo) : asset('images/profile-empty.png') }}" alt="">
                                    </div>
                                    <div>
                                       <p class="font-semibold">{{ $company->company_name }}</p>
                                       <p class="text-xs text-gray-500 dark:text-gray-400">ID: {{ str_pad($company->id, 5, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                 </div>
                              </th>
                              <td class="px-6 py-4">
                                 <div class="flex items-center">
                                    <svg class="w-4 h-4 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-gray-700 dark:text-gray-300">{{ $company->users->first()->email }}</span>
                                 </div>
                              </td>
                              <td class="px-6 py-4">
                                 <div class="flex items-center">
                                    <svg class="w-4 h-4 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <span class="text-gray-700 dark:text-gray-300">{{ $company->contact->telephone }}</span>
                                 </div>
                              </td>
                              <td class="px-6 py-4">
                                 <a href="{{ $company->contact->linkedin }}" target="_blank" class="flex items-center text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                       <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                    <span>View Profile</span>
                                 </a>
                              </td>
                              <td class="px-6 py-4">
                                 <div class="flex justify-center">
                                    @if($company->status === 'pending')
                                       <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                          <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                          </svg>
                                          Pending
                                       </span>
                                    @elseif($company->status === 'rejected')
                                       <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                                          <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                          </svg>
                                          Rejected
                                       </span>
                                    @elseif($company->status === 'verified')
                                       <span class="inline-flex text-center items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                          <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                          </svg>
                                          Verified
                                       </span>
                                    @else
                                       <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                          {{ $company->status ?? 'Unknown' }}
                                       </span>
                                    @endif
                              </div>
                              </td>
                              <td class="px-6 py-4 text-center">
                                 <div class="flex justify-center space-x-2">
                                     @if($company->status === 'pending')
                                         <form action="{{ route('admin.verifyCompany', $company->id) }}" method="POST" class="inline">
                                             @csrf
                                             <button type="submit" class="p-2 text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-300" title="Verify Company">
                                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                 </svg>
                                             </button>
                                         </form>
                                         <form action="{{ route('admin.rejectCompany', $company->id) }}" method="POST" class="inline">
                                             @csrf
                                             <button type="submit" class="p-2 text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300" title="Reject Company">
                                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                 </svg>
                                             </button>
                                         </form>
                                     @else
                                         <button onclick="openModal('{{ $company->id }}', '{{ $company->status }}')" class="p-2 text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300" title="Edit Status">
                                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                             </svg>
                                         </button>
                                     @endif
                                 </div>
                             </td>
                        </tr>                            
                        @endforeach
                     </tbody>
               </table>
            </div>
         </div>
       </div>
       <div id="editStatusModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full items-center justify-center bg-black bg-opacity-50">
         <div class="relative w-full max-w-md max-h-full">
             <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                 <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                     <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                         Edit Company Status
                     </h3>
                     <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="closeModal()">
                         <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                         </svg>
                         <span class="sr-only">Close modal</span>
                     </button>
                 </div>
                 <div class="p-4 md:p-5">
                     <form id="editStatusForm" action="" method="POST">
                         @csrf
                         <div class="mb-6">
                             <label for="modal-status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                             <select id="modal-status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                 <option value="pending">Pending</option>
                                 <option value="verified">Verified</option>
                                 <option value="rejected">Rejected</option>
                             </select>
                         </div>
                         <div class="flex items-center space-x-4">
                             <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:bg-blue-500 dark:hover:bg-blue-600">
                                 Update Status
                             </button>
                             <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                                 Cancel
                             </button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
   </body>
   <script>
      function openModal(companyId, currentStatus) {
          const modal = document.getElementById('editStatusModal');
          const form = document.getElementById('editStatusForm');
          const statusSelect = document.getElementById('modal-status');
          
          // Set the form action URL
          form.action = `/dashboard/admin/company/${companyId}/update-status`;
          
          // Set the current status in the dropdown
          statusSelect.value = currentStatus;
          
          // Show the modal
          modal.classList.remove('hidden');
          modal.classList.add('flex');
      }
      
      function closeModal() {
          const modal = document.getElementById('editStatusModal');
          modal.classList.remove('flex');
          modal.classList.add('hidden');
      }
  </script>
</html>