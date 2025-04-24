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
    
        <div class="p-4 mt-24 mx-16 rounded-lg dark:border-gray-700">
            <div class="relative overflow-x-auto rounded-lg mb-4">

                <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 p-4 bg-gradient-to-r from-negative to-negative-hover rounded-lg">
                    <div>
                        <p class="mb-2 text-sm font-bold text-white">
                            Active jobs opening:
                        </p>
                        <div class="relative flex gap-2 items-center">
                            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="text" id="table-search-users" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-negative focus:border-negative"  placeholder="Search job title">
                            
                            <div class="relative">
                                <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 font-medium rounded-lg text-sm px-3 py-2 " type="button">
                                    <span class="sr-only">Role Category</span>
                                    Role Category
                                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate account</a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete User</a>
                                    </div>
                                </div>
                            </div>
                    
                           
                        </div>
                    </div>
                </div>
                
               

                <div class="md:flex mt-4">
                    <ul class="flex-column space-y space-y-4 text-sm font-medium text-gray-500  md:me-4 mb-4 md:mb-0"  id="jobVacancy-tab" data-tabs-toggle="#jobVacancy-tab-content" role="tablist">
                        @foreach ($rooms as $room)
                        <li class="me-2" role="presentation">
                            <button class="inline-flex p-2 bg-slate-100 text-white rounded-lg active w-80 items-center justify-center"  id="jobVacancy{{ $room->id }}-tab" data-tabs-target="#jobVacancy{{ $room->id }}" type="button" role="tab" aria-controls="jobVacancy{{ $room->id }}" aria-selected="false">
                                <div>

                                    <div class="flex">
                                        <img class="w-16 h-16 border rounded-lg object-cover" src="{{ $room->company->logo ? asset('storage/' . $room->company->logo) : asset('images/profile-empty.png') }}" alt="Jese image">
                                        {{-- Keterangan --}}
                                        <div class="ps-3">
                                            <div class="text-base items-center flex gap-4 font-bold text-gray-800">
                                                <span class="text-xs text-gray-500 text-left"> {{ $room->position_name }}</span>
                                                <span class="inline-flex items-center bg-negative text-white text-xs font-semibold px-2 py-0.5 rounded-full">
                                                    {{ $room->work_system }}
                                                </span>
                                            </div>
                                            <div class="flex gap-2 my-1">
                                                <div class="flex items-center">
                                                    <span class="text-xs text-gray-400">{{ $room->company->company_name }}</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-2">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                                                    </svg>
                                                    <span class="text-xs text-gray-400">{{ $room->company->company_address }}</span>
                                                </div>
                                                {{-- <div class="flex items-center gap-1">
                                                    <svg class="w-4 h-4 text-gray-400 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                                    </svg>
                                                    <span class="text-xs text-gray-400">Negoitable</span>
                                                </div> --}}
                                            </div>
                                        </div>  
                                    </div>
                                    
                                    
                                    <div class="grid grid-cols-2 mt-2 gap-4 items-center justify-center rounded ">
                                        <div class="flex items-center p-1 rounded bg-fd7d09 dark:bg-gray-800">
                                           <h1 class=" text-xs font-bold leading-none tracking-tight text-white  dark:text-white">Posisi dibuka : <span class="text-xs font-bold text-white dark:text-blue-500">{{ $room->total_open_position }}</span></h1>
                                        </div>
                                        <div class="flex items-center p-1 rounded bg-fd1d02 dark:bg-gray-800">
                                           <h1 class=" text-xs font-bold leading-none tracking-tight text-white  dark:text-white">Total Pendaftar : <span class="text-xs font-bold text-white dark:text-blue-500">236</span></h1>
                                        </div>
                                     </div>
                                </div>
                            </button>
                        </li>
                        @endforeach
                        {{ $rooms->appends(Request::except('page'))->render() }}
                    </ul>
                    <div id="jobVacancy-tab-content" class="p-6 bg-slate-100 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full">
                        @foreach ($rooms as $room)
                        <div class="relative rounded-lg " id="jobVacancy{{ $room->id }}" role="tabpanel" aria-labelledby="jobVacancy{{ $room->id }}-tab">
                            @include('candidates.components.detailCard')
                        </div>
                        @endforeach

                    </div>
                    
                </div>
                
            </div>
            
        </div>
    
</body>
</html>