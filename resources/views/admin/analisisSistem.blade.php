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
                     <span class="ml-1 text-sm font-medium text-gray-700 dark:text-gray-400">Analisis Sistem</span>
                  </div>
               </li>
            </ol>
         </nav>
         <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6 rounded-md shadow-md">
            <!-- Total Job Post -->
            <div class="flex flex-col p-5 rounded-lg bg-gradient-to-r from-[#fd7d09] to-[#e73002] shadow-md hover:shadow-lg transition-all duration-300">
              <div class="flex items-center mb-2">
                <div class="flex items-center justify-center h-10 w-10 rounded-full bg-white bg-opacity-20">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <span class="ml-2 text-white font-medium">Total Job Post</span>
              </div>
              <span class="text-3xl font-bold text-white mt-2">{{ $roomscount }}</span>
            </div>
          
            <!-- Total Pendaftar -->
            <div class="flex flex-col p-5 rounded-lg bg-gradient-to-r from-[#fd1d02] to-[#e73002] shadow-md hover:shadow-lg transition-all duration-300">
              <div class="flex items-center mb-2">
                <div class="flex items-center justify-center h-10 w-10 rounded-full bg-white bg-opacity-20">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                </div>
                <span class="ml-2 text-white font-medium">Total Pendaftar</span>
              </div>
              <span class="text-3xl font-bold text-white mt-2">{{ $candidatescount }}</span>
            </div>
          
            <!-- Total Perusahaan -->
            <div class="flex flex-col p-5 rounded-lg bg-gradient-to-r from-[#e73002] to-[#fd7d09] shadow-md hover:shadow-lg transition-all duration-300">
              <div class="flex items-center mb-2">
                <div class="flex items-center justify-center h-10 w-10 rounded-full bg-white bg-opacity-20">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                  </svg>
                </div>
                <span class="ml-2 text-white font-medium">Total Perusahaan</span>
              </div>
              <span class="text-3xl font-bold text-white mt-2">{{ $companiescount }}</span>
            </div>
          </div>
         <div class="flex justify-between items-center mt-6 mb-3">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Data Management</h2>
         </div>
         <!-- Tab Navigation -->
         <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="multiViewTab" role="tablist">
               <li class="mr-2" role="presentation">
                  <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 active" 
                     id="companies-tab" 
                     data-tabs-target="#companies" 
                     type="button" 
                     role="tab" 
                     aria-controls="companies" 
                     aria-selected="true">
                     Perusahaan
                  </button>
               </li>
               <li class="mr-2" role="presentation">
                  <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" 
                     id="applicants-tab" 
                     data-tabs-target="#applicants" 
                     type="button" 
                     role="tab" 
                     aria-controls="applicants" 
                     aria-selected="false">
                     Pendaftar
                  </button>
               </li>
               <li class="mr-2" role="presentation">
                  <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" 
                     id="jobposts-tab" 
                     data-tabs-target="#jobposts" 
                     type="button" 
                     role="tab" 
                     aria-controls="jobposts" 
                     aria-selected="false">
                     Lowongan Pekerjaan
                  </button>
               </li>
            </ul>
         </div>
         
         <!-- Tab Content -->
         <div id="multiViewTabContent">
            <!-- Perusahaan Tab Content -->
            <div class="block" id="companies" role="tabpanel" aria-labelledby="companies-tab">
               <div class="overflow-x-auto">
                  <table class="w-full text-sm text-left">
                     <thead class="text-xs font-semibold uppercase bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-t-lg">
                        <tr>
                           <th scope="col" class="px-6 py-4">Nama Perusahaan</th>
                           <th scope="col" class="px-6 py-4">Email</th>
                           <th scope="col" class="px-6 py-4">No Hp</th>
                           <th scope="col" class="px-6 py-4">Linkedin</th>
                           <th scope="col" class="px-6 py-4 text-center">Status</th>
                           <th scope="col" class="px-6 py-4 text-center">Detail</th>
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
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
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
                                    <button 
                                       class="p-1.5 bg-green-100 text-green-600 rounded-lg hover:bg-green-200 transition-colors dark:bg-green-900 dark:text-green-300 dark:hover:bg-green-800"
                                       onclick="openCompanyModal({
                                          id: '{{ $company->id }}',
                                          name: '{{ $company->company_name }}',
                                          logo: '{{ $company->logo ? asset('storage/' . $company->logo) : asset('images/profile-empty.png') }}',
                                          banner: '{{ $company->banner ? asset('storage/' . $company->banner) : '' }}',
                                          formattedId: '{{ str_pad($company->id, 5, '0', STR_PAD_LEFT) }}',
                                          email: '{{ $company->users->first()->email }}',
                                          phone: '{{ $company->contact->telephone }}',
                                          linkedin: '{{ $company->contact->linkedin }}',
                                          status: '{{ $company->status }}',
                                          address: '{{ $company->company_address }}',
                                          website: '{{ $company->company_website }}',
                                          motto: '{{ $company->company_motto }}',
                                          type: '{{ $company->company_type }}',
                                          description: '{{ $company->company_description }}'
                                       })"
                                    >
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
            
            <!-- Applicants Tab Content -->
            <div class="hidden" id="applicants" role="tabpanel" aria-labelledby="applicants-tab">
               <div class="overflow-x-auto">
                  <table class="w-full text-sm text-left">
                     <thead class="text-xs font-semibold uppercase bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-t-lg">
                        <tr>
                           <th scope="col" class="px-6 py-4">Nama Pendaftar</th>
                           <th scope="col" class="px-6 py-4">Email</th>
                           <th scope="col" class="px-6 py-4">No Hp</th>
                           <th scope="col" class="px-6 py-4">Pendidikan</th>
                           <th scope="col" class="px-6 py-4 text-center">Detail</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($candidates as $candidate)
                           <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-gray-600 transition-colors">
                              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                 <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gray-200 rounded-full overflow-hidden flex items-center justify-center mr-3 dark:bg-gray-700">
                                       <img src="{{  $candidate->photo_path ? asset('storage/' .  $candidate->photo_path) : asset('images/profile-empty.png') }}" alt="">
                                    </div>
                                    <div>
                                       <p class="font-semibold">{{ $candidate->full_name }}</p>
                                    </div>
                                 </div>
                              </th>
                              <td class="px-6 py-4">
                                 <div class="flex items-center">
                                    {{ $candidate->contact->email }}
                                 </div>
                              </td>
                              <td class="px-6 py-4">
                                 <span class="flex items-center">
                                    {{ $candidate->contact->whatsapp ?? 'Tidak Ada'  }}
                                 </span>
                              </td>
                              <td class="px-6 py-4">
                                 <a href="{{ $candidate->contact->linkedin }}" target="_blank" class="flex items-center text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                       <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                    <span>View Profile</span>
                                 </a>
                              </td>
                              <td class="px-6 py-4 text-center">
                                 <div class="flex justify-center space-x-2">
                                    <button onclick="openCandidateModal({{ $candidate->id }})" class="p-1.5 bg-green-100 text-green-600 rounded-lg hover:bg-green-200 transition-colors dark:bg-green-900 dark:text-green-300 dark:hover:bg-green-800">
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

            <!-- Job Posts Tab Content -->
            <div class="hidden" id="jobposts" role="tabpanel" aria-labelledby="jobposts-tab">
               <div class="overflow-x-auto">
                  <table class="w-full text-sm text-left">
                     <thead class="text-xs font-semibold uppercase bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-t-lg">
                        <tr>
                           <th scope="col" class="px-6 py-4">Posisi</th>
                           <th scope="col" class="px-6 py-4">Perusahaan</th>
                           <th scope="col" class="px-6 py-4">Lokasi</th>
                           <th scope="col" class="px-6 py-4">Gaji</th>
                           <th scope="col" class="px-6 py-4">Tipe Pekerjaan</th>
                           <th scope="col" class="px-6 py-4 text-center">Status</th>
                           <th scope="col" class="px-6 py-4 text-center">Detail</th>
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
                                 <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                    {{ $room->access_rights }}
                                 </span>
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
       
      <!-- Modal Detail Perusahaan -->
      <div id="companyDetailModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
         <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-3xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <!-- Header Modal dengan Banner (jika ada) -->
            <div class="relative">
               <!-- Banner perusahaan (jika ada) -->
               <div id="modal-company-banner" class="w-full h-32 bg-gray-200 dark:bg-gray-700 overflow-hidden hidden">
                     <img id="modal-banner-img" src="" alt="" class="w-full h-full object-cover">
               </div>
               
               <!-- Header dengan logo dan nama -->
               <div class="border-b dark:border-gray-700 px-6 py-4 flex items-center justify-between">
                     <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                        <div id="modal-company-logo" class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden flex items-center justify-center mr-3 dark:bg-gray-700">
                           <img id="modal-logo-img" src="" alt="" class="w-full h-full object-cover">
                        </div>
                        <div>
                           <span id="modal-company-name" class="block">Detail Perusahaan</span>
                           <span id="modal-company-motto" class="text-sm text-gray-500 dark:text-gray-400 hidden"></span>
                        </div>
                     </h3>
                     <button onclick="closeCompanyModal()" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                     </button>
               </div>
            </div>
            
            <!-- Body Modal -->
            <div class="p-6">
               <!-- Informasi Umum -->
               <div class="mb-6">
                     <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 border-b pb-2 dark:border-gray-700">Informasi Umum</h4>
                     <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                           <div>
                                 <span class="text-gray-500 dark:text-gray-400 text-sm">ID Perusahaan:</span>
                                 <p id="modal-company-id" class="font-medium text-gray-900 dark:text-white"></p>
                           </div>
                           <div>
                                 <span class="text-gray-500 dark:text-gray-400 text-sm">Status:</span>
                                 <div id="modal-company-status"></div>
                           </div>
                           <div>
                                 <span class="text-gray-500 dark:text-gray-400 text-sm">Jenis Perusahaan:</span>
                                 <p id="modal-company-type" class="font-medium text-gray-900 dark:text-white"></p>
                           </div>
                        </div>
                        <div class="space-y-2">
                           <div>
                                 <span class="text-gray-500 dark:text-gray-400 text-sm">Email:</span>
                                 <p id="modal-company-email" class="font-medium text-gray-900 dark:text-white"></p>
                           </div>
                           <div>
                                 <span class="text-gray-500 dark:text-gray-400 text-sm">Telepon:</span>
                                 <p id="modal-company-phone" class="font-medium text-gray-900 dark:text-white"></p>
                           </div>
                           <div id="modal-company-website-container" class="hidden">
                                 <span class="text-gray-500 dark:text-gray-400 text-sm">Website:</span>
                                 <p id="modal-company-website" class="font-medium"></p>
                           </div>
                        </div>
                     </div>
               </div>
               
               <!-- Alamat -->
               <div id="modal-address-section" class="mb-6 hidden">
                     <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 border-b pb-2 dark:border-gray-700">Alamat</h4>
                     <p id="modal-company-address" class="text-gray-700 dark:text-gray-300"></p>
               </div>
               
               <!-- Kontak & Media Sosial -->
               <div class="mb-6">
                     <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 border-b pb-2 dark:border-gray-700">Media Sosial</h4>
                     <div>
                        <span class="text-gray-500 dark:text-gray-400 text-sm">LinkedIn:</span>
                        <div id="modal-company-linkedin" class="font-medium text-blue-600 dark:text-blue-400"></div>
                     </div>
               </div>
               
               <!-- Deskripsi Perusahaan -->
               <div id="modal-description-section" class="hidden">
                     <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 border-b pb-2 dark:border-gray-700">Deskripsi Perusahaan</h4>
                     <p id="modal-company-description" class="text-gray-700 dark:text-gray-300"></p>
               </div>
            </div>
            
            <!-- Footer Modal -->
            <div class="border-t dark:border-gray-700 px-6 py-4 flex justify-end">
               <button onclick="closeCompanyModal()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                     Tutup
               </button>
            </div>
         </div>
      </div>
      <!-- Candidate Detail Modal -->
      <div id="candidateDetailModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
         <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-3xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <!-- Header Modal -->
            <div class="border-b dark:border-gray-700 px-6 py-4 flex items-center justify-between">
               <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                  <div id="modal-candidate-photo" class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden flex items-center justify-center mr-3 dark:bg-gray-700">
                     <img id="modal-photo-img" src="" alt="" class="w-full h-full object-cover">
                  </div>
                  <div>
                     <span id="modal-candidate-name" class="block">Detail Kandidat</span>
                     <span id="modal-candidate-headline" class="text-sm text-gray-500 dark:text-gray-400 hidden"></span>
                  </div>
               </h3>
               <button onclick="closeCandidateModal()" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 focus:outline-none">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
               </button>
            </div>
            
            <!-- Body Modal -->
            <div class="p-6">
               <!-- Informasi Umum -->
               <div class="mb-6">
                  <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 border-b pb-2 dark:border-gray-700">Informasi Umum</h4>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                     <div class="space-y-2">
                        <div>
                           <span class="text-gray-500 dark:text-gray-400 text-sm">ID Kandidat:</span>
                           <p id="modal-candidate-id" class="font-medium text-gray-900 dark:text-white"></p>
                        </div>
                        <div>
                           <span class="text-gray-500 dark:text-gray-400 text-sm">Nama Lengkap:</span>
                           <p id="modal-candidate-fullname" class="font-medium text-gray-900 dark:text-white"></p>
                        </div>
                        <div id="modal-candidate-skills-container" class="hidden">
                           <span class="text-gray-500 dark:text-gray-400 text-sm">Keahlian:</span>
                           <p id="modal-candidate-skills" class="font-medium text-gray-900 dark:text-white"></p>
                        </div>
                     </div>
                     <div class="space-y-2">
                        <div>
                           <span class="text-gray-500 dark:text-gray-400 text-sm">Email:</span>
                           <p id="modal-candidate-email" class="font-medium text-gray-900 dark:text-white"></p>
                        </div>
                        <div id="modal-candidate-telephone-container" class="hidden">
                           <span class="text-gray-500 dark:text-gray-400 text-sm">Telepon:</span>
                           <p id="modal-candidate-telephone" class="font-medium text-gray-900 dark:text-white"></p>
                        </div>
                        <div id="modal-candidate-whatsapp-container" class="hidden">
                           <span class="text-gray-500 dark:text-gray-400 text-sm">WhatsApp:</span>
                           <p id="modal-candidate-whatsapp" class="font-medium text-gray-900 dark:text-white"></p>
                        </div>
                     </div>
                  </div>
               </div>
               
               <!-- Alamat -->
               <div id="modal-address-section" class="mb-6 hidden">
                  <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 border-b pb-2 dark:border-gray-700">Alamat</h4>
                  <p id="modal-candidate-address" class="text-gray-700 dark:text-gray-300"></p>
               </div>
               
               <!-- Biografi -->
               <div id="modal-bio-section" class="mb-6 hidden">
                  <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 border-b pb-2 dark:border-gray-700">Biografi</h4>
                  <p id="modal-candidate-bio" class="text-gray-700 dark:text-gray-300"></p>
               </div>

               <!-- Pengalaman -->
               <div id="modal-experience-section" class="mb-6 hidden">
                  <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 border-b pb-2 dark:border-gray-700">Pengalaman</h4>
                  <p id="modal-candidate-experience" class="text-gray-700 dark:text-gray-300"></p>
               </div>
               
               <!-- Media Sosial & Kontak -->
               <div class="mb-6">
                  <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 border-b pb-2 dark:border-gray-700">Media Sosial & Kontak</h4>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                     <div id="modal-candidate-linkedin-container" class="hidden">
                        <span class="text-gray-500 dark:text-gray-400 text-sm">LinkedIn:</span>
                        <div id="modal-candidate-linkedin" class="font-medium text-blue-600 dark:text-blue-400"></div>
                     </div>
                     <div id="modal-candidate-website-container" class="hidden">
                        <span class="text-gray-500 dark:text-gray-400 text-sm">Website:</span>
                        <div id="modal-candidate-website" class="font-medium"></div>
                     </div>
                     <div id="modal-candidate-instagram-container" class="hidden">
                        <span class="text-gray-500 dark:text-gray-400 text-sm">Instagram:</span>
                        <div id="modal-candidate-instagram" class="font-medium text-purple-600 dark:text-purple-400"></div>
                     </div>
                     <div id="modal-candidate-facebook-container" class="hidden">
                        <span class="text-gray-500 dark:text-gray-400 text-sm">Facebook:</span>
                        <div id="modal-candidate-facebook" class="font-medium text-blue-600 dark:text-blue-400"></div>
                     </div>
                  </div>
               </div>
            </div>
            
            <!-- Footer Modal -->
            <div class="border-t dark:border-gray-700 px-6 py-4 flex justify-end">
               <button onclick="closeCandidateModal()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                  Tutup
               </button>
            </div>
         </div>
      </div>
      <!-- Job Details Modal -->
      <div id="roomDetailModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
         <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-3xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <!-- Header Modal with Banner (if available) -->
            <div class="relative">
               <!-- Job banner (if available) -->
               <div id="modal-job-banner" class="w-full h-32 bg-gray-200 dark:bg-gray-700 overflow-hidden hidden">
                  <img id="modal-job-banner-img" src="" alt="" class="w-full h-full object-cover">
               </div>
               
               <!-- Header with job title and company -->
               <div class="border-b dark:border-gray-700 px-6 py-4 flex items-center justify-between">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                     <div>
                        <span id="modal-position-name" class="block">Detail Lowongan</span>
                        <span id="modal-company-name" class="text-sm text-gray-500 dark:text-gray-400"></span>
                     </div>
                  </h3>
                  <button onclick="closeRoomModal()" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 focus:outline-none">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                     </svg>
                  </button>
               </div>
            </div>
            
            <!-- Body Modal -->
            <div class="p-6">
               <!-- Job Overview Section -->
               <div class="mb-6">
                  <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 border-b pb-2 dark:border-gray-700">Overview Lowongan</h4>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                     <div class="space-y-2">
                        <div>
                           <span class="text-gray-500 dark:text-gray-400 text-sm">Posisi:</span>
                           <p id="modal-position" class="font-medium text-gray-900 dark:text-white"></p>
                        </div>
                        <div>
                           <span class="text-gray-500 dark:text-gray-400 text-sm">Departemen:</span>
                           <p id="modal-departement" class="font-medium text-gray-900 dark:text-white"></p>
                        </div>
                        <div>
                           <span class="text-gray-500 dark:text-gray-400 text-sm">Gaji:</span>
                           <p id="modal-salary" class="font-medium text-gray-900 dark:text-white"></p>
                        </div>
                        <div>
                           <span class="text-gray-500 dark:text-gray-400 text-sm">Jumlah Posisi:</span>
                           <p id="modal-total-positions" class="font-medium text-gray-900 dark:text-white"></p>
                        </div>
                     </div>
                     <div class="space-y-2">
                        <div>
                           <span class="text-gray-500 dark:text-gray-400 text-sm">Sistem Kerja:</span>
                           <p id="modal-work-system" class="font-medium text-gray-900 dark:text-white"></p>
                        </div>
                        <div>
                           <span class="text-gray-500 dark:text-gray-400 text-sm">Jam Kerja:</span>
                           <p id="modal-working-hours" class="font-medium text-gray-900 dark:text-white"></p>
                        </div>
                        <div>
                           <span class="text-gray-500 dark:text-gray-400 text-sm">Pengalaman:</span>
                           <p id="modal-experience" class="font-medium text-gray-900 dark:text-white"></p>
                        </div>
                        <div>
                           <span class="text-gray-500 dark:text-gray-400 text-sm">Deadline:</span>
                           <p id="modal-deadline" class="font-medium text-gray-900 dark:text-white"></p>
                        </div>
                     </div>
                  </div>
               </div>
               
               <!-- Company Location Section -->
               <div id="modal-location-section" class="mb-6">
                  <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 border-b pb-2 dark:border-gray-700">Lokasi</h4>
                  <p id="modal-location" class="text-gray-700 dark:text-gray-300"></p>
               </div>
               
               <!-- Job Description Section -->
               <div id="modal-description-section" class="mb-6">
                  <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 border-b pb-2 dark:border-gray-700">Deskripsi Pekerjaan</h4>
                  <p id="modal-description" class="text-gray-700 dark:text-gray-300 whitespace-pre-line"></p>
               </div>
               
               <!-- Job Requirements Section -->
               <div id="modal-requirements-section" class="mb-6">
                  <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 border-b pb-2 dark:border-gray-700">Persyaratan</h4>
                  <p id="modal-requirements" class="text-gray-700 dark:text-gray-300 whitespace-pre-line"></p>
               </div>
               
               <!-- Status Section -->
               <div class="mb-6">
                  <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 border-b pb-2 dark:border-gray-700">Status</h4>
                  <div id="modal-access-rights"></div>
               </div>
            </div>
            
            <!-- Footer Modal -->
            <div class="border-t dark:border-gray-700 px-6 py-4 flex justify-between">
               <button id="modal-website-btn" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors hidden">
                  Kunjungi Website
               </button>
               <button onclick="closeRoomModal()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                  Tutup
               </button>
            </div>
         </div>
      </div>
      <script>
         document.addEventListener('DOMContentLoaded', function() {
         // Set up tab functionality
         const tabs = document.querySelectorAll('[data-tabs-target]');
         const tabContents = document.querySelectorAll('[role="tabpanel"]');
         
         // Set default active tab
         const defaultTab = document.getElementById('companies-tab');
         const defaultTabContent = document.getElementById('companies');
         
         // Show default tab content
         tabContents.forEach(content => {
            if (content !== defaultTabContent) {
               content.classList.add('hidden');
            } else {
               content.classList.remove('hidden');
               content.classList.add('block');
            }
         });
         
         // Set default tab as active
         defaultTab.classList.add('border-blue-600', 'text-blue-600', 'active');
         defaultTab.setAttribute('aria-selected', 'true');
         
         tabs.forEach(tab => {
            tab.addEventListener('click', () => {
               const target = document.querySelector(tab.dataset.tabsTarget);
               
               // Hide all tab contents
               tabContents.forEach(content => {
                  content.classList.add('hidden');
                  content.classList.remove('block');
               });
               
               // Remove active state from all tabs
               tabs.forEach(t => {
                  t.classList.remove('border-blue-600', 'text-blue-600');
                  t.classList.remove('active');
                  t.setAttribute('aria-selected', 'false');
               });
               
               // Show current tab content
               target.classList.remove('hidden');
               target.classList.add('block');
               
               // Set current tab as active
               tab.classList.add('border-blue-600', 'text-blue-600');
               tab.classList.add('active');
               tab.setAttribute('aria-selected', 'true');
            });
         });
      });

      // Company Modal
         function openCompanyModal(company) {
         // Set data dasar ke dalam modal
         document.getElementById('modal-company-name').textContent = company.name;
         document.getElementById('modal-logo-img').src = company.logo;
         document.getElementById('modal-company-id').textContent = company.formattedId;
         document.getElementById('modal-company-email').textContent = company.email;
         document.getElementById('modal-company-phone').textContent = company.phone;
         
         // Set jenis perusahaan
         const companyTypeElement = document.getElementById('modal-company-type');
         companyTypeElement.textContent = company.type || 'Tidak ditentukan';
         
         // LinkedIn dengan link
         const linkedinElement = document.getElementById('modal-company-linkedin');
         linkedinElement.innerHTML = `<a href="${company.linkedin}" target="_blank" class="flex items-center hover:underline">
               <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
               </svg>
               ${company.linkedin}
         </a>`;
         
         // Status dengan warna sesuai status
         const statusElement = document.getElementById('modal-company-status');
         let statusHTML = '';
         
         if (company.status === 'pending') {
               statusHTML = `<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                  <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                  </svg>
                  Pending
               </span>`;
         } else if (company.status === 'rejected') {
               statusHTML = `<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                  <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                  </svg>
                  Rejected
               </span>`;
         } else if (company.status === 'verified') {
               statusHTML = `<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                  <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                  </svg>
                  Verified
               </span>`;
         } else {
               statusHTML = `<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                  ${company.status || 'Unknown'}
               </span>`;
         }
         
         statusElement.innerHTML = statusHTML;
         
         // Tampilkan Banner jika ada
         const bannerContainer = document.getElementById('modal-company-banner');
         const bannerImg = document.getElementById('modal-banner-img');
         if (company.banner) {
               bannerImg.src = company.banner;
               bannerContainer.classList.remove('hidden');
         } else {
               bannerContainer.classList.add('hidden');
         }
         
         // Tampilkan Motto jika ada
         const mottoElement = document.getElementById('modal-company-motto');
         if (company.motto) {
               mottoElement.textContent = company.motto;
               mottoElement.classList.remove('hidden');
         } else {
               mottoElement.classList.add('hidden');
         }
         
         // Tampilkan Alamat jika ada
         const addressSection = document.getElementById('modal-address-section');
         const addressElement = document.getElementById('modal-company-address');
         if (company.address) {
               addressElement.textContent = company.address;
               addressSection.classList.remove('hidden');
         } else {
               addressSection.classList.add('hidden');
         }
         
         // Tampilkan Website jika ada
         const websiteContainer = document.getElementById('modal-company-website-container');
         const websiteElement = document.getElementById('modal-company-website');
         if (company.website) {
               websiteElement.innerHTML = `<a href="${company.website}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline flex items-center">
                  <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                  </svg>
                  ${company.website}
               </a>`;
               websiteContainer.classList.remove('hidden');
         } else {
               websiteContainer.classList.add('hidden');
         }
         
         // Tampilkan Deskripsi jika ada
         const descriptionSection = document.getElementById('modal-description-section');
         const descriptionElement = document.getElementById('modal-company-description');
         if (company.description) {
               descriptionElement.textContent = company.description;
               descriptionSection.classList.remove('hidden');
         } else {
               descriptionSection.classList.add('hidden');
         }
         
         // Tampilkan modal
         document.getElementById('companyDetailModal').classList.remove('hidden');
      }
      function closeCompanyModal() {
         // Sembunyikan modal
         document.getElementById('companyDetailModal').classList.add('hidden');
      }
      
      // Menutup modal saat mengklik di luar modal
      document.getElementById('companyDetailModal').addEventListener('click', function(event) {
         if (event.target === this) {
               closeCompanyModal();
         }
      });

      // Kandidat Modal
      function openCandidateModal(candidateId) {
         // Data kandidat (disediakan oleh Laravel dari controller)
         const candidates = {!! json_encode($candidates) !!};
         
         // Cari kandidat berdasarkan ID
         const candidate = candidates.find(c => c.id === candidateId);
         
         if (!candidate) {
            console.error('Kandidat dengan ID tersebut tidak ditemukan:', candidateId);
            alert('Gagal memuat data kandidat. Silakan coba lagi.');
            return;
         }
         
         // Isi modal dengan data kandidat
         populateCandidateModal(candidate);
         
         // Tampilkan modal
         document.getElementById('candidateDetailModal').classList.remove('hidden');
      }

      function populateCandidateModal(candidate) {
         // Isi informasi dasar
         document.getElementById('modal-candidate-name').textContent = candidate.full_name || 'Detail Kandidat';
         document.getElementById('modal-candidate-fullname').textContent = candidate.full_name || '-';
         document.getElementById('modal-candidate-id').textContent = candidate.id;
         document.getElementById('modal-candidate-email').textContent = candidate.contact.email || '-';
         
         // Isi foto kandidat
         const photoUrl = candidate.photo_path 
            ? `/storage/${candidate.photo_path}` 
            : '/images/profile-empty.png';
         document.getElementById('modal-photo-img').src = photoUrl;
         
         // Isi headline jika ada
         const headlineElement = document.getElementById('modal-candidate-headline');
         if (candidate.headline) {
            headlineElement.textContent = candidate.headline;
            headlineElement.classList.remove('hidden');
         } else {
            headlineElement.classList.add('hidden');
         }
         
         // Isi telepon jika ada
         const telephoneContainer = document.getElementById('modal-candidate-telephone-container');
         const telephoneElement = document.getElementById('modal-candidate-telephone');
         if (candidate.contact.telephone) {
            telephoneElement.textContent = candidate.contact.telephone;
            telephoneContainer.classList.remove('hidden');
         } else {
            telephoneContainer.classList.add('hidden');
         }
         
         // Isi WhatsApp jika ada
         const whatsappContainer = document.getElementById('modal-candidate-whatsapp-container');
         const whatsappElement = document.getElementById('modal-candidate-whatsapp');
         if (candidate.contact.whatsapp) {
            whatsappElement.textContent = candidate.contact.whatsapp;
            whatsappContainer.classList.remove('hidden');
         } else {
            whatsappContainer.classList.add('hidden');
         }
         
         // Isi keahlian jika ada
         const skillsContainer = document.getElementById('modal-candidate-skills-container');
         const skillsElement = document.getElementById('modal-candidate-skills');
         if (candidate.skills) {
            skillsElement.textContent = candidate.skills;
            skillsContainer.classList.remove('hidden');
         } else {
            skillsContainer.classList.add('hidden');
         }
         
         // Isi alamat jika ada
         const addressSection = document.getElementById('modal-address-section');
         const addressElement = document.getElementById('modal-candidate-address');
         if (candidate.address) {
            addressElement.textContent = candidate.address;
            addressSection.classList.remove('hidden');
         } else {
            addressSection.classList.add('hidden');
         }
         
         // Isi bio jika ada
         const bioSection = document.getElementById('modal-bio-section');
         const bioElement = document.getElementById('modal-candidate-bio');
         if (candidate.bio) {
            bioElement.textContent = candidate.bio;
            bioSection.classList.remove('hidden');
         } else {
            bioSection.classList.add('hidden');
         }
         
         // Isi pengalaman jika ada
         const experienceSection = document.getElementById('modal-experience-section');
         const experienceElement = document.getElementById('modal-candidate-experience');
         if (candidate.experience) {
            experienceElement.textContent = candidate.experience;
            experienceSection.classList.remove('hidden');
         } else {
            experienceSection.classList.add('hidden');
         }
         
         // Isi website jika ada
         const websiteContainer = document.getElementById('modal-candidate-website-container');
         const websiteElement = document.getElementById('modal-candidate-website');
         if (candidate.contact.website) {
            websiteElement.innerHTML = `<a href="${candidate.contact.website}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline flex items-center">
               <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
               </svg>
               ${candidate.contact.website}
            </a>`;
            websiteContainer.classList.remove('hidden');
         } else {
            websiteContainer.classList.add('hidden');
         }
         
         // Isi LinkedIn jika ada
         const linkedinContainer = document.getElementById('modal-candidate-linkedin-container');
         const linkedinElement = document.getElementById('modal-candidate-linkedin');
         if (candidate.contact.linkedin) {
            linkedinElement.innerHTML = `<a href="${candidate.contact.linkedin}" target="_blank" class="flex items-center hover:underline">
               <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
               </svg>
               ${candidate.contact.linkedin}
            </a>`;
            linkedinContainer.classList.remove('hidden');
         } else {
            linkedinContainer.classList.add('hidden');
         }
         
         // Isi Instagram jika ada
         const instagramContainer = document.getElementById('modal-candidate-instagram-container');
         const instagramElement = document.getElementById('modal-candidate-instagram');
         if (candidate.contact.instagram) {
            instagramElement.innerHTML = `<a href="https://instagram.com/${candidate.contact.instagram}" target="_blank" class="flex items-center hover:underline">
               <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
               </svg>
               ${candidate.contact.instagram}
            </a>`;
            instagramContainer.classList.remove('hidden');
         } else {
            instagramContainer.classList.add('hidden');
         }
         
         // Isi Facebook jika ada
         const facebookContainer = document.getElementById('modal-candidate-facebook-container');
         const facebookElement = document.getElementById('modal-candidate-facebook');
         if (candidate.contact.facebook) {
            facebookElement.innerHTML = `<a href="${candidate.contact.facebook}" target="_blank" class="flex items-center hover:underline">
               <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
               </svg>
               ${candidate.contact.facebook}
            </a>`;
            facebookContainer.classList.remove('hidden');
         } else {
            facebookContainer.classList.add('hidden');
         }
      }

      function closeCandidateModal() {
         // Sembunyikan modal
         document.getElementById('candidateDetailModal').classList.add('hidden');
      }

      // Menutup modal saat mengklik di luar modal
      document.getElementById('candidateDetailModal').addEventListener('click', function(event) {
         if (event.target === this) {
            closeCandidateModal();
         }
      });

      // Job Details Modal Functions
      function openRoomModal(room) {
         // Set basic position details
         document.getElementById('modal-position-name').textContent = room.position_name;
         document.getElementById('modal-position').textContent = room.position_name;
         document.getElementById('modal-departement').textContent = room.departement;
         document.getElementById('modal-salary').textContent = `${formatCurrency(room.salary)} / bulan`;
         document.getElementById('modal-total-positions').textContent = room.total_open_position;
         document.getElementById('modal-work-system').textContent = room.work_system;
         document.getElementById('modal-working-hours').textContent = room.working_hours;
         document.getElementById('modal-experience').textContent = room.years_of_experience_criteria;
         document.getElementById('modal-deadline').textContent = formatDate(room.deadline);
         
         // Set company name
         document.getElementById('modal-company-name').textContent = room.company.company_name;
         
         // Set company logo if available
         const logoImg = document.getElementById('modal-logo-img');
         logoImg.src = room.company.logo ? `/storage/${room.company.logo}` : '/images/profile-empty.png';
         
         // Set banner if available
         const bannerContainer = document.getElementById('modal-job-banner');
         const bannerImg = document.getElementById('modal-job-banner-img');
         if (room.banner) {
            bannerImg.src = `/storage/${room.banner}`;
            bannerContainer.classList.remove('hidden');
         } else {
            bannerContainer.classList.add('hidden');
         }
         
         // Set location details
         const locationSection = document.getElementById('modal-location-section');
         const locationElement = document.getElementById('modal-location');
         if (room.company.company_address) {
            locationElement.textContent = room.company.company_address;
            locationSection.classList.remove('hidden');
         } else {
            locationSection.classList.add('hidden');
         }
         
         // Set description if available
         const descriptionSection = document.getElementById('modal-description-section');
         const descriptionElement = document.getElementById('modal-description');
         if (room.description) {
            descriptionElement.textContent = room.description;
            descriptionSection.classList.remove('hidden');
         } else {
            descriptionSection.classList.add('hidden');
         }
         
         // Set requirements if available
         const requirementsSection = document.getElementById('modal-requirements-section');
         const requirementsElement = document.getElementById('modal-requirements');
         if (room.requirements) {
            requirementsElement.textContent = room.requirements;
            requirementsSection.classList.remove('hidden');
         } else {
            requirementsSection.classList.add('hidden');
         }
         
         // Set access rights status with appropriate color
         const accessRightsElement = document.getElementById('modal-access-rights');
         let statusHTML = '';
         
         if (room.access_rights === 'public') {
            statusHTML = `<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
               <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
               </svg>
               Public
            </span>`;
         } else if (room.access_rights === 'private') {
            statusHTML = `<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
               <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
               </svg>
               Private
            </span>`;
         } else {
            statusHTML = `<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
               ${room.access_rights}
            </span>`;
         }
         
         accessRightsElement.innerHTML = statusHTML;
         
         // Set website button if available
         const websiteBtn = document.getElementById('modal-website-btn');
         if (room.company.company_website) {
            websiteBtn.classList.remove('hidden');
            websiteBtn.onclick = function() {
               window.open(room.company.company_website, '_blank');
            };
         } else {
            websiteBtn.classList.add('hidden');
         }
         
         // Show modal
         document.getElementById('roomDetailModal').classList.remove('hidden');
      }

      function closeRoomModal() {
         // Hide modal
         document.getElementById('roomDetailModal').classList.add('hidden');
      }

      // Helper function to format currency
      function formatCurrency(amount) {
         if (!amount) return 'Tidak tersedia';
         return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
      }

      // Helper function to format date
      function formatDate(dateString) {
         if (!dateString) return 'Tidak tersedia';
         const date = new Date(dateString);
         return new Intl.DateTimeFormat('id-ID', { 
            day: 'numeric', 
            month: 'long', 
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
         }).format(date);
      }

      // Close modal when clicking outside
      document.getElementById('roomDetailModal').addEventListener('click', function(event) {
         if (event.target === this) {
            closeRoomModal();
         }
      });
      </script>
      

   </body>
</html>