<div class="flex flex-row items-center p-1 bg-white border border-gray-200 rounded-lg shadow h-44 hover:bg-gray-100">
    <div class="flex-grow p-2 ">
        <a href="{{ route('dashboard.recruiter.selectionRoom.detail', $room->id) }}">
            <div class="text-base font-bold text-gray-500">{{ $room->position_name }}</div>
            <div class="text-xs font-semibold text-gray-500">{{ $room->departement }} | {{ $room->working_hours }} |
                {{ $room->work_system }}</div>
            <div class="text-xs font-normal text-gray-500">Tenggat : {{ $room->deadline->format('d-m-Y') }}</div>

            <div class="grid items-center justify-center grid-cols-2 gap-4 mt-2 rounded ">
                <div class="flex items-center p-2 rounded bg-fd7d09 dark:bg-gray-800">
                    <h1 class="text-xs font-medium leading-none tracking-tight text-white dark:text-white">Posisi
                        dibuka<br /> <span
                            class="text-sm font-extrabold text-white dark:text-blue-500">{{ $room->total_open_position }}</span>
                    </h1>
                </div>
                <div class="flex items-center p-2 rounded bg-fd1d02 dark:bg-gray-800">
                    <h1 class="text-xs font-medium leading-none tracking-tight text-white dark:text-white">Total
                        Pendaftar<br /> <span
                            class="text-sm font-extrabold text-white dark:text-blue-500">{{ $room->candidates()->count() }}</span>
                    </h1>
                </div>
            </div>
        </a>
        <!-- Card footer -->
        <div class="flex items-center justify-between p-2 ">
            <div class="flex -space-x-1 rtl:space-x-reverse">
                <div class="flex items-center">
                    <img class="w-6 h-6 border-2 border-white rounded-full"
                        src="https://avatars.githubusercontent.com/u/91769513?v=4" alt=""
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-flex';">
                    <span
                        class="items-center justify-center hidden w-6 h-6 font-medium text-gray-600 border-2 border-white rounded-full bg-slate-300">JL</span>
                </div>
                <div class="flex items-center">
                    <img class="w-6 h-6 border-2 border-white rounded-full"
                        src="https://avatars.githubusercontent.com/u/91769513?v=4" alt=""
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-flex';">
                    <span
                        class="items-center justify-center hidden w-6 h-6 font-medium text-gray-600 border-2 border-white rounded-full bg-slate-300">JL</span>
                </div>
                <div class="flex items-center">
                    <img class="w-6 h-6 border-2 border-white rounded-full"
                        src="https://avatars.githubusercontent.com/u/91769513?v=4" alt=""
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-flex';">
                    <span
                        class="items-center justify-center hidden w-6 h-6 font-medium text-gray-600 border-2 border-white rounded-full bg-slate-300">JL</span>
                </div>
                <div
                    class="flex items-center justify-center w-6 h-6 text-[10px] font-medium text-white bg-gray-700 border-2 border-white rounded-full">
                    +99</div>
            </div>
            <!-- Share button -->
            <button type="button" data-modal-target="course-modal" data-modal-toggle="course-modal"
                class="flex items-center justify-center w-8 h-8 text-sm font-medium text-center text-gray-900 bg-white border border-gray-200 rounded-lg">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M17.5 3A3.5 3.5 0 0 0 14 7L8.1 9.8A3.5 3.5 0 0 0 2 12a3.5 3.5 0 0 0 6.1 2.3l6 2.7-.1.5a3.5 3.5 0 1 0 1-2.3l-6-2.7a3.5 3.5 0 0 0 0-1L15 9a3.5 3.5 0 0 0 6-2.4c0-2-1.6-3.5-3.5-3.5Z" />
                </svg>
                <span class="sr-only">Share Room</span>
            </button>
        </div>
    </div>
</div>

<!-- Share modal -->
<div id="course-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-lg max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5">
                <h3 class="text-lg text-gray-500 dark:text-gray-400">
                    Share
                </h3>
                <button type="button"
                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-700 dark:hover:text-white"
                    data-modal-toggle="course-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="px-4 pb-4 md:px-5 md:pb-5">
                <label for="course-url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Share room
                    rekrutment ke kandidat :</label>
                <div class="relative mb-4">
                    <input id="course-url" type="text"
                        class="col-span-6 bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ route('kandidat.apply', $room->id) }}" disabled readonly>
                    <button data-copy-to-clipboard-target="course-url" data-tooltip-target="tooltip-course-url"
                        class="absolute inline-flex items-center justify-center p-2 text-gray-500 -translate-y-1/2 rounded-lg end-2 top-1/2 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800">
                        <span id="default-icon-course-url">
                            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 18 20">
                                <path
                                    d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                            </svg>
                        </span>
                        <span id="success-icon-course-url" class="items-center hidden">
                            <svg class="w-3.5 h-3.5 text-blue-700 dark:text-blue-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                        </span>
                    </button>
                    <div id="tooltip-course-url" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        <span id="default-tooltip-message-course-url">Copy to clipboard</span>
                        <span id="success-tooltip-message-course-url" class="hidden">Copied!</span>
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
                <button type="button" data-modal-hide="course-modal"
                    class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
            </div>
        </div>
    </div>
</div>