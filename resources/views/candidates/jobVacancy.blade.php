<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                        <a href="{{ route('dashboard.kandidat') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white transition-colors duration-200">
                            <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="text-sm font-medium text-gray-500 ms-1 md:ms-2 dark:text-gray-400">Post
                                Room</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="relative mb-6 overflow-x-auto rounded-lg">
                <!-- Header Section with Gradient Background -->
                <div class="flex flex-wrap items-center justify-between p-6 space-y-4 rounded-lg flex-column md:flex-row md:space-y-0 bg-gradient-to-r from-[#e73002] to-[#fd7d09] shadow-md hover:shadow-lg transition-all duration-300">
                    <div>
                        <p class="mb-2 text-sm font-bold text-white">
                            Active jobs opening:
                        </p>
                        <div class="relative flex items-center gap-2">
                            <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="table-search-users"
                                class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 w-80 bg-gray-50 focus:ring-[#e73002] focus:border-[#e73002]"
                                placeholder="Search job title">

                            <div class="relative">
                                <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200"
                                    type="button">
                                    <span class="sr-only">Role Category</span>
                                    Role Category
                                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownAction"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownActionButton">
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white transition-colors duration-200">Reward</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white transition-colors duration-200">Promote</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white transition-colors duration-200">Activate
                                                account</a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white transition-colors duration-200">Delete
                                            User</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:flex mt-6">
                    <ul class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 md:me-4 mb-4 md:mb-0" id="jobVacancy-tab" data-tabs-toggle="#jobVacancy-tab-content" role="tablist">
                        @foreach ($rooms as $room)
                        <li class="me-2" role="presentation">
                            <button class="inline-flex p-4 bg-white text-gray-800 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 w-80 items-center justify-center border border-gray-200" id="jobVacancy{{ $room->id }}-tab" data-tabs-target="#jobVacancy{{ $room->id }}" type="button" role="tab" aria-controls="jobVacancy{{ $room->id }}" aria-selected="false">
                                <div class="w-full">
                                    <div class="flex">
                                        <img class="w-16 h-16 border rounded-lg object-cover" src="{{ $room->company->logo ? asset('storage/' . $room->company->logo) : asset('images/profile-empty.png') }}" alt="Company logo">
                                        {{-- Keterangan --}}
                                        <div class="ps-3">
                                            <div class="text-base items-center flex gap-4 font-bold text-gray-800">
                                                <span class="text-xs text-gray-500 text-left">{{ $room->position_name }}</span>
                                                <span class="inline-flex items-center bg-gradient-to-r from-[#e73002] to-[#fd7d09] text-white text-xs font-semibold px-2 py-0.5 rounded-full">
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
                                                    <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                                                    </svg>
                                                    <span class="text-xs text-gray-400">{{ $room->company->company_address }}</span>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    
                                    <div class="grid grid-cols-2 mt-3 gap-4 items-center justify-center">
                                        <div class="flex items-center justify-center p-2 rounded bg-[#fd7d09] dark:bg-gray-800">
                                           <h1 class="text-xs font-bold leading-none tracking-tight text-white dark:text-white">Posisi dibuka: <span class="text-xs font-bold text-white dark:text-blue-500">{{ $room->total_open_position }}</span></h1>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </li>
                        @endforeach
                        <div class="mt-4">
                            {{ $rooms->appends(Request::except('page'))->render() }}
                        </div>
                    </ul>
                    
                    <div id="jobVacancy-tab-content" class="p-6 bg-white text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full shadow-md hover:shadow-lg transition-all duration-300">
                        @foreach ($rooms as $room)
                        <div class="relative rounded-lg" id="jobVacancy{{ $room->id }}" role="tabpanel" aria-labelledby="jobVacancy{{ $room->id }}-tab">
                            @include('candidates.components.detailCard')
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>