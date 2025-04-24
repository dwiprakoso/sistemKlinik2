<div class="relative p-1 overflow-x-auto">
    <div class="flex flex-wrap items-center justify-between pb-4 space-y-4 flex-column sm:flex-row sm:space-y-0">
        <div>
            <button id="dropdownRadioButton2" data-dropdown-toggle="dropdownRadio2"
                class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800  dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                type="button">

                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M18.458 3.11A1 1 0 0 1 19 4v16a1 1 0 0 1-1.581.814L12 16.944V7.056l5.419-3.87a1 1 0 0 1 1.039-.076ZM22 12c0 1.48-.804 2.773-2 3.465v-6.93c1.196.692 2 1.984 2 3.465ZM10 8H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6V8Zm0 9H5v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3Z"
                        clip-rule="evenodd" />
                </svg>

                Status
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownRadio2"
                class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownRadio2Button2">
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input id="filter-radio-example-1" type="radio" value="" name="filter-radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="filter-radio-example-1"
                                class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">Ready</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input id="filter-radio-example-1" type="radio" value="" name="filter-radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="filter-radio-example-1"
                                class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">Belum
                                Uploud</label>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input checked="" id="filter-radio-example-2" type="radio" value=""
                                name="filter-radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="filter-radio-example-2"
                                class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">Lolos</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input id="filter-radio-example-3" type="radio" value="" name="filter-radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="filter-radio-example-3"
                                class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">Gagal</label>
                        </div>
                    </li>



                </ul>
            </div>
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none rtl:inset-r-0 rtl:right-0 ps-3">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input type="text" id="table-search"
                class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Cari Kandidat">
        </div>
    </div>

    <table class="w-full mb-4 text-sm text-left text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 ">
            <tr>
                <th scope="col" class="p-4">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Nama
                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg></a>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($berkasCandidates as $berkas)
                <tr class="bg-white hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4 whitespace-nowrap">
                        1
                    </td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
                        <img class="object-cover w-10 h-10 rounded-full"
                        src="{{  $berkas->candidate->photo_path ? asset('storage/' .  $berkas->candidate->photo_path) : asset('images/profile-empty.png') }}"
                        alt="profile image - {{ $berkas->candidate->full_name  }}">
                        <div class="ps-3">
                            <div class="text-base font-semibold">{{ $berkas->candidate->full_name }}</div>
                            <div class="font-normal text-gray-500">{{ $berkas->candidate->user->email }}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if ($berkas->status == 'approved')
                            <span
                                class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                <span class="w-2 h-2 bg-green-400 rounded-full me-1"></span>
                                Lolos
                            </span>
                        @elseif($berkas->status == 'pending')
                            <span
                                class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                                <span class="w-2 h-2 bg-yellow-400 rounded-full me-1"></span>
                                Pending
                            </span>
                        @elseif($berkas->status == 'rejected')
                            <span
                                class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                <span class="w-2 h-2 bg-red-400 rounded-full me-1"></span>
                                Ditolak
                            </span>
                        @endif

                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button type="button" data-modal-target="modal-{{ $berkas->id }}"
                            data-modal-toggle="modal-{{ $berkas->id }}"
                            class="text-gray-500 gap-2 bg-gray-50 hover:bg-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                            <svg fill="none" aria-hidden="true" class="flex-shrink-0 w-5 h-5"
                                viewBox="0 0 20 21">
                                <g clip-path="url(#clip0_3173_1381)">
                                    <path fill="#E2E5E7"
                                        d="M5.024.5c-.688 0-1.25.563-1.25 1.25v17.5c0 .688.562 1.25 1.25 1.25h12.5c.687 0 1.25-.563 1.25-1.25V5.5l-5-5h-8.75z" />
                                    <path fill="#B0B7BD" d="M15.024 5.5h3.75l-5-5v3.75c0 .688.562 1.25 1.25 1.25z" />
                                    <path fill="#CAD1D8" d="M18.774 9.25l-3.75-3.75h3.75v3.75z" />
                                    <path fill="#F15642"
                                        d="M16.274 16.75a.627.627 0 01-.625.625H1.899a.627.627 0 01-.625-.625V10.5c0-.344.281-.625.625-.625h13.75c.344 0 .625.281.625.625v6.25z" />
                                    <path fill="#fff"
                                        d="M3.998 12.342c0-.165.13-.345.34-.345h1.154c.65 0 1.235.435 1.235 1.269 0 .79-.585 1.23-1.235 1.23h-.834v.66c0 .22-.14.344-.32.344a.337.337 0 01-.34-.344v-2.814zm.66.284v1.245h.834c.335 0 .6-.295.6-.605 0-.35-.265-.64-.6-.64h-.834zM7.706 15.5c-.165 0-.345-.09-.345-.31v-2.838c0-.18.18-.31.345-.31H8.85c2.284 0 2.234 3.458.045 3.458h-1.19zm.315-2.848v2.239h.83c1.349 0 1.409-2.24 0-2.24h-.83zM11.894 13.486h1.274c.18 0 .36.18.36.355 0 .165-.18.3-.36.3h-1.274v1.049c0 .175-.124.31-.3.31-.22 0-.354-.135-.354-.31v-2.839c0-.18.135-.31.355-.31h1.754c.22 0 .35.13.35.31 0 .16-.13.34-.35.34h-1.455v.795z" />
                                    <path fill="#CAD1D8"
                                        d="M15.649 17.375H3.774V18h11.875a.627.627 0 00.625-.625v-.625a.627.627 0 01-.625.625z" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_3173_1381">
                                        <path fill="#fff" d="M0 0h20v20H0z" transform="translate(0 .5)" />
                                    </clipPath>
                                </defs>
                            </svg>
                            Lihat Berkas

                        </button>
                    </td>
                </tr>
                <!-- Pemberkasan modal -->
                <div id="modal-{{ $berkas->id }}" tabindex="-1" aria-hidden="true"
                    class="hidden fixed top-0 right-0 left-0 z-50  justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative h-full p-4">
                        <!-- Modal content -->
                        <div class="relative flex flex-col h-full rounded-lg shadow bg-gray-50"
                            style="width: calc(100vh / 1.414); max-width: 100%;">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <div class="flex ">
                                    <img class="object-cover w-10 h-10 rounded-full"
                                        src="{{  $berkas->candidate->photo_path ? asset('storage/' .  $berkas->candidate->photo_path) : asset('images/profile-empty.png') }}"
                                        alt="profile image - {{ $berkas->candidate->full_name  }}">
                                    <div class="ps-3">
                                        <div class="text-base font-semibold">{{ $berkas->candidate->full_name }}</div>
                                        <div class="font-normal text-gray-500">{{ $berkas->candidate->user->email }}
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="inline-flex items-center justify-center text-sm text-gray-400 bg-transparent ms-auto">
                                    <a href="{{ $berkas->berkas }}" download
                                        class="inline-flex items-center self-center p-2 text-sm font-medium text-center text-gray-400 rounded-lg hover:bg-gray-200 hover:text-gray-900 bg-gray-50 "
                                        type="button">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                                            <path
                                                d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                        <span class="sr-only">Download</span>
                                    </a>
                                    <a href="{{ $berkas->berkas }}"
                                        class="inline-flex items-center self-center p-2 text-sm font-medium text-center text-gray-400 rounded-lg hover:bg-gray-200 hover:text-gray-900 bg-gray-50 "
                                        type="button">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" 
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M8 4H4m0 0v4m0-4 5 5m7-5h4m0 0v4m0-4-5 5M8 20H4m0 0v-4m0 4 5-5m7 5h4m0 0v-4m0 4-5-5" />
                                        </svg>
                                        <span class="sr-only">Expand</span>
                                    </a>
                                    <button type="button"
                                        class="inline-flex items-center self-center p-2 text-sm font-medium text-center text-gray-400 rounded-lg hover:bg-gray-200 hover:text-gray-900 bg-gray-50"
                                        data-modal-toggle="modal{{ $berkas->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                            </div>

                            <embed src="{{ $berkas->berkas }}" type="application/pdf"
                                class="w-full h-full p-2 rounded-xl" />

                            <!-- Modal footer -->
                            <div class="flex items-center justify-between grid-cols-2 col-span-2 row-span-2 gap-2 p-2">
                                <span class="flex gap-2 text-xs font-normal text-gray-500 dark:text-gray-400">
                                    12 Pages
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="self-center"
                                        width="3" height="4" viewBox="0 0 3 4" fill="none">
                                        <circle cx="1.5" cy="2" r="1.5" fill="#6B7280" />
                                    </svg>
                                    18 MB
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="self-center"
                                        width="3" height="4" viewBox="0 0 3 4" fill="none">
                                        <circle cx="1.5" cy="2" r="1.5" fill="#6B7280" />
                                    </svg>
                                    PDF
                                </span>
                                <div class="flex space-x-2">
                                    <form id="submissionForm-{{ $berkas->id }}"
                                        action="{{ route('dashboard.recruiter.submission.lolosBerkas') }}"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $berkas->id }}"
                                            name="submission_pemberkasan_id">
                                        <input type="hidden" value="{{ $berkas->candidate_id }}"
                                            name="candidates_id">
                                        <input type="hidden" value="{{ $room->id }}" name="rooms_id">
                                        <input type="hidden" id="status-{{ $berkas->id }}" name="status">

                                        <button type="button"
                                            class="text-white bg-positive hover:bg-positive-hover font-medium rounded-lg text-sm px-5 py-2.5"
                                            onclick="berkasForm({{ $berkas->id }}, 'approved')">Lolos</button>
                                        <button type="button"
                                            class="text-white bg-negative hover:bg-negative-hover font-medium rounded-lg text-sm px-5 py-2.5"
                                            onclick="berkasForm({{ $berkas->id }}, 'rejected')">Gagal</button>
                                        <script>
                                            function berkasForm(berkasId, status) {
                                                document.getElementById('status-' + berkasId).value = status;
                                                document.getElementById('submissionForm-' + berkasId).submit();
                                            }
                                        </script>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>

    </table>

    <nav class="flex flex-wrap items-center justify-between pt-4 flex-column md:flex-row"
        aria-label="Table navigation">
        <span
            class="block w-full mb-4 text-sm font-normal text-gray-500 dark:text-gray-400 md:mb-0 md:inline md:w-auto">
            Showing
            <span class="font-semibold text-gray-900 dark:text-white">
                {{ $berkasCandidates->firstItem() }}-{{ $berkasCandidates->lastItem() }}
            </span>
            of
            <span class="font-semibold text-gray-900 dark:text-white">
                {{ $berkasCandidates->total() }}
            </span>
        </span>
        <ul class="inline-flex h-8 -space-x-px text-sm rtl:space-x-reverse">
            {{-- Previous Page Link --}}
            @if ($berkasCandidates->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span
                        class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-300 ms-0 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                        Previous
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $berkasCandidates->previousPageUrl() }}"
                        class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-300 ms-0 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Previous
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($berkasCandidates as $page => $url)
                @if ($page == $berkasCandidates->currentPage())
                    <li>
                        <a href="{{ $url }}"
                            class="flex items-center justify-center h-8 px-3 leading-tight text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">
                            {{ $page }}
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ $url }}"
                            class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            {{ $page }}
                        </a>
                    </li>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($berkasCandidates->hasMorePages())
                <li>
                    <a href="{{ $berkasCandidates->nextPageUrl() }}"
                        class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Next
                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span
                        class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                        Next
                    </span>
                </li>
            @endif
        </ul>
    </nav>





</div>
