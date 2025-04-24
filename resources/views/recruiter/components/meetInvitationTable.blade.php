<div class="relative p-1 overflow-x-auto">
    <div class="flex flex-wrap items-center justify-between pb-4 space-y-4 flex-column sm:flex-row sm:space-y-0">
        <div>
            <button id="dropdownRadioButton3" data-dropdown-toggle="dropdownRadio3"
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
            <div id="dropdownRadio3"
                class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownRadioButton3">
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input id="filter-radio-example-1" type="radio" value="" name="filter-radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="filter-radio-example-1"
                                class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">Sedang
                                Proses</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input checked="" id="filter-radio-example-2" type="radio" value=""
                                name="filter-radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="filter-radio-example-2"
                                class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">Diterima</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input id="filter-radio-example-3" type="radio" value="" name="filter-radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="filter-radio-example-3"
                                class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">Ditolak</label>
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
                    Schedule Appointment
                </th>
                <th scope="col" class="px-6 py-3">
                    Kehadiran
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
            @foreach ($meetCandidates as $meet)
                <tr class="bg-white hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4 whitespace-nowrap">
                        1
                    </td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
                        <img class="object-cover w-10 h-10 rounded-full"
                        src="{{  $meet->candidate->photo_path ? asset('storage/' .  $meet->candidate->photo_path) : asset('images/profile-empty.png') }}"
                        alt="profile image - {{ $meet->candidate->full_name  }}">
                        <div class="ps-3">
                            <div class="text-base font-semibold">{{ $meet->candidate->full_name }}</div>
                            <div class="font-normal text-gray-500">{{ $meet->candidate->user->email }}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <button type="button" data-modal-target="timepicker-modal"
                                data-modal-toggle="timepicker-modal"
                                class="inline-flex items-center text-sm font-medium text-gray-500 bg-white rounded-lg hover:underline">
                                <svg class="h-4 w4 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Set Schedule
                            </button>

                        </div>
                    </td>



                    <td class="px-6 py-4 whitespace-nowrap">
                        @if ($meet->status == 'approved')
                            <span
                                class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                <span class="w-2 h-2 bg-green-400 rounded-full me-1"></span>
                                Lolos
                            </span>
                        @elseif($meet->status == 'pending')
                            <span
                                class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                                <span class="w-2 h-2 bg-yellow-400 rounded-full me-1"></span>
                                Pending
                            </span>
                        @elseif($meet->status == 'rejected')
                            <span
                                class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                <span class="w-2 h-2 rounded-full bg-reeed-400 me-1"></span>
                                Ditolak
                            </span>
                        @endif
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <button data-modal-target="notulen-modal-{{ $meet->id }}"
                            data-modal-toggle="notulen-modal-{{ $meet->id }}" type="button"
                            class=" bg-merah text-merah border border-merah hover:bg-abu-abu hover:text-white font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center ">
                            <svg class="w-5 h-5 text-putih e" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.3 6.2H5a2 2 0 0 0-2 2V19a2 2 0 0 0 2 2h11c1.1 0 2-1 2-2.1V11l-4 4.2c-.3.3-.7.6-1.2.7l-2.7.6c-1.7.3-3.3-1.3-3-3.1l.6-2.9c.1-.5.4-1 .7-1.3l3-3.1Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M19.8 4.3a2.1 2.1 0 0 0-1-1.1 2 2 0 0 0-2.2.4l-.6.6 2.9 3 .5-.6a2.1 2.1 0 0 0 .6-1.5c0-.2 0-.5-.2-.8Zm-2.4 4.4-2.8-3-4.8 5-.1.3-.7 3c0 .3.3.7.6.6l2.7-.6.3-.1 4.7-5Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Catatan
                        </button>
                        <!-- Notulensi modal -->
                        <div id="notulen-modal-{{ $meet->id }}" data-modal-backdrop="notulen" tabindex="-1"
                            aria-hidden="true"
                            class="hidden fixed top-0 right-0 left-0 z-50  justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full h-full max-w-4xl p-4">
                                <!-- Modal content -->
                                <div class="relative flex flex-col h-full rounded-lg shadow bg-gray-50">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                        <div class="flex ">
                                            <img class="object-cover w-10 h-10 rounded-full"
                                                src="https://media.licdn.com/dms/image/D5603AQHC4IFjmiQi1Q/profile-displayphoto-shrink_400_400/0/1680830096821?e=1721260800&v=beta&t=djkevYMcgIYM7wYZJxQ1Xrp7N6e5KE8IqNhd0PCIi6A"
                                                alt="">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold">{{ $meet->candidate->full_name }}
                                                </div>
                                                <div class="font-normal text-gray-500">
                                                    {{ $meet->candidate->user->email }}</div>
                                            </div>
                                        </div>
                                        <button type="button"
                                            class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="notulen-modal-{{ $meet->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <form id="meet-{{ $meet->id }}"
                                        action="{{ route('dashboard.recruiter.submission.lolosMeetingInvitation') }}"
                                        method="POST">
                                        @csrf
                                        <!-- Modal body -->
                                        <div class="flex-grow p-4 overflow-y-auto md:p-5">
                                            <input id="x" type="hidden" name="keterangan_recruiter">
                                            <trix-editor input="x"
                                                class="trix-content h-auto min-h-[calc(100%-3rem)]"></trix-editor>
                                        </div>
                                        <!-- Modal footer -->
                                        <div
                                            class="flex items-center gap-2 p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                                            <input type="text" name="submission_meeting_invitation_id"
                                                value="{{ $meet->id }}" hidden>
                                            <input type="text" name="candidates_id"
                                                value="{{ $meet->candidate_id }}" hidden>
                                            <input type="text" name="status" id="meet-status{{ $meet->id }}"
                                                hidden>
                                            <input type="text" value="{{ $room->id }}" name="rooms_id"
                                                hidden>

                                            <button type="button"
                                                class="text-white bg-positive hover:bg-positive-hover font-medium rounded-lg text-sm px-5 py-2.5"
                                                onclick="meetForm({{ $meet->id }}, 'approved')">Lolos</button>
                                            <button type="button"
                                                class="text-white bg-negative hover:bg-negative-hover font-medium rounded-lg text-sm px-5 py-2.5"
                                                onclick="meetForm({{ $meet->id }}, 'rejected')">Gagal</button>
                                            <script>
                                                function meetForm(meetId, status) {
                                                    document.getElementById('meet-status' + meetId).value = status;
                                                    document.getElementById('meet-' + meetId).submit();
                                                }
                                            </script>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <nav class="flex flex-wrap items-center justify-between pt-4 flex-column md:flex-row"
        aria-label="Table navigation">
        <span
            class="block w-full mb-4 text-sm font-normal text-gray-500 dark:text-gray-400 md:mb-0 md:inline md:w-auto">
            Showing
            <span class="font-semibold text-gray-900 dark:text-white">
                {{ $meetCandidates->firstItem() }}-{{ $meetCandidates->lastItem() }}
            </span>
            of
            <span class="font-semibold text-gray-900 dark:text-white">
                {{ $meetCandidates->total() }}
            </span>
        </span>
        <ul class="inline-flex h-8 -space-x-px text-sm rtl:space-x-reverse">
            {{-- Previous Page Link --}}
            @if ($meetCandidates->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span
                        class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-300 ms-0 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                        Previous
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $meetCandidates->previousPageUrl() }}"
                        class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-300 ms-0 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Previous
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($meetCandidates as $page => $url)
                @if ($page == $meetCandidates->currentPage())
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
            @if ($meetCandidates->hasMorePages())
                <li>
                    <a href="{{ $meetCandidates->nextPageUrl() }}"
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




    <!-- Pilih schedule modal -->
    <div id="timepicker-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-[50rem] max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Schedule an appointment
                    </h3>
                    <button type="button"
                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="timepicker-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 pt-0">
                    <div class="my-2">
                        <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 ">Lokasi /
                            link</label>
                        <div class="relative mb-6">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">

                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </div>
                            <input type="text" id="input-group-1"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Telkom indonesia Regional 4">
                        </div>
                    </div>

                    <div
                        class="flex flex-col pt-5 my-4 border-t border-gray-200 dark:border-gray-800 sm:flex-row sm:space-x-5 rtl:space-x-reverse">
                        <div inline-datepicker class="mx-auto sm:mx-0"></div>

                        <div class="sm:ms-7 sm:ps-5 sm:border-s border-gray-200  w-full sm:max-w-[50rem] mt-5 sm:mt-0">
                            <div class="p-2 rounded-t-lg bg-gradient-to-r from-negative to-red-800">
                                <span class="text-sm font-bold text-white">Schedule for January 13th, 2022</span>
                            </div>
                            <div
                                class="flex-grow mb-4 overflow-y-auto border border-gray-100 rounded-b-lg ps-5 bg-gray-50 h-44">
                                <ol class="relative border-gray-200 border-s">
                                    <li class="ms-6">
                                        <a href="#"
                                            class="items-center block p-1 rounded-lg sm:flex hover:bg-gray-100">
                                            <span
                                                class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white ">
                                                <img class="rounded-full shadow-lg"
                                                    src="https://media.licdn.com/dms/image/D5603AQHC4IFjmiQi1Q/profile-displayphoto-shrink_400_400/0/1680830096821?e=1721260800&v=beta&t=djkevYMcgIYM7wYZJxQ1Xrp7N6e5KE8IqNhd0PCIi6A"
                                                    alt="Bonnie image" />
                                            </span>
                                            <div class="text-gray-600">
                                                <div class="text-base font-normal">
                                                    <span class="text-sm font-medium text-gray-900">Aslam Thariq Akbar
                                                        Akrami</span>
                                                    <div class="text-xs font-normal">10.00 - 11.30 WIB
                                                        <span
                                                            class="inline-flex items-center text-xs font-normal text-gray-500 ms-2">
                                                            <svg class="w-2.5 h-2.5 me-1" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd"
                                                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            Telkom regional IV
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>
                                    </li>
                                    <li class="ms-6">
                                        <a href="#"
                                            class="items-center block p-1 rounded-lg sm:flex hover:bg-gray-100">
                                            <span
                                                class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white ">
                                                <img class="rounded-full shadow-lg"
                                                    src="https://media.licdn.com/dms/image/D5603AQHC4IFjmiQi1Q/profile-displayphoto-shrink_400_400/0/1680830096821?e=1721260800&v=beta&t=djkevYMcgIYM7wYZJxQ1Xrp7N6e5KE8IqNhd0PCIi6A"
                                                    alt="Bonnie image" />
                                            </span>
                                            <div class="text-gray-600">
                                                <div class="text-base font-normal">
                                                    <span class="text-sm font-medium text-gray-900">Aslam Thariq Akbar
                                                        Akrami</span>
                                                    <div class="text-xs font-normal">10.00 - 11.30 WIB
                                                        <span
                                                            class="inline-flex items-center text-xs font-normal text-gray-500 ms-2">
                                                            <svg class="w-2.5 h-2.5 me-1" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd"
                                                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            Telkom regional IV
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>
                                    </li>
                                    <li class="ms-6">
                                        <a href="#"
                                            class="items-center block p-1 rounded-lg sm:flex hover:bg-gray-100">
                                            <span
                                                class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white ">
                                                <img class="rounded-full shadow-lg"
                                                    src="https://media.licdn.com/dms/image/D5603AQHC4IFjmiQi1Q/profile-displayphoto-shrink_400_400/0/1680830096821?e=1721260800&v=beta&t=djkevYMcgIYM7wYZJxQ1Xrp7N6e5KE8IqNhd0PCIi6A"
                                                    alt="Bonnie image" />
                                            </span>
                                            <div class="text-gray-600">
                                                <div class="text-base font-normal">
                                                    <span class="text-sm font-medium text-gray-900">Aslam Thariq Akbar
                                                        Akrami</span>
                                                    <div class="text-xs font-normal">10.00 - 11.30 WIB
                                                        <span
                                                            class="inline-flex items-center text-xs font-normal text-gray-500 ms-2">
                                                            <svg class="w-2.5 h-2.5 me-1" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd"
                                                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            Telkom regional IV
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>
                                    </li>
                                    <li class="ms-6">
                                        <a href="#"
                                            class="items-center block p-1 rounded-lg sm:flex hover:bg-gray-100">
                                            <span
                                                class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white ">
                                                <img class="rounded-full shadow-lg"
                                                    src="https://media.licdn.com/dms/image/D5603AQHC4IFjmiQi1Q/profile-displayphoto-shrink_400_400/0/1680830096821?e=1721260800&v=beta&t=djkevYMcgIYM7wYZJxQ1Xrp7N6e5KE8IqNhd0PCIi6A"
                                                    alt="Bonnie image" />
                                            </span>
                                            <div class="text-gray-600">
                                                <div class="text-base font-normal">
                                                    <span class="text-sm font-medium text-gray-900">Aslam Thariq Akbar
                                                        Akrami</span>
                                                    <div class="text-xs font-normal">10.00 - 11.30 WIB
                                                        <span
                                                            class="inline-flex items-center text-xs font-normal text-gray-500 ms-2">
                                                            <svg class="w-2.5 h-2.5 me-1" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd"
                                                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            Telkom regional IV
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>
                                    </li>
                                    <li class="ms-6">
                                        <a href="#"
                                            class="items-center block p-1 rounded-lg sm:flex hover:bg-gray-100">
                                            <span
                                                class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white ">
                                                <img class="rounded-full shadow-lg"
                                                    src="https://media.licdn.com/dms/image/D5603AQHC4IFjmiQi1Q/profile-displayphoto-shrink_400_400/0/1680830096821?e=1721260800&v=beta&t=djkevYMcgIYM7wYZJxQ1Xrp7N6e5KE8IqNhd0PCIi6A"
                                                    alt="Bonnie image" />
                                            </span>
                                            <div class="text-gray-600">
                                                <div class="text-base font-normal">
                                                    <span class="text-sm font-medium text-gray-900">Aslam Thariq Akbar
                                                        Akrami</span>
                                                    <div class="text-xs font-normal">10.00 - 11.30 WIB
                                                        <span
                                                            class="inline-flex items-center text-xs font-normal text-gray-500 ms-2">
                                                            <svg class="w-2.5 h-2.5 me-1" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd"
                                                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            Telkom regional IV
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>
                                    </li>
                                    <li class="ms-6">
                                        <a href="#"
                                            class="items-center block p-1 rounded-lg sm:flex hover:bg-gray-100">
                                            <span
                                                class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white ">
                                                <img class="rounded-full shadow-lg"
                                                    src="https://media.licdn.com/dms/image/D5603AQHC4IFjmiQi1Q/profile-displayphoto-shrink_400_400/0/1680830096821?e=1721260800&v=beta&t=djkevYMcgIYM7wYZJxQ1Xrp7N6e5KE8IqNhd0PCIi6A"
                                                    alt="Bonnie image" />
                                            </span>
                                            <div class="text-gray-600">
                                                <div class="text-base font-normal">
                                                    <span class="text-sm font-medium text-gray-900">Aslam Thariq Akbar
                                                        Akrami</span>
                                                    <div class="text-xs font-normal">10.00 - 11.30 WIB
                                                        <span
                                                            class="inline-flex items-center text-xs font-normal text-gray-500 ms-2">
                                                            <svg class="w-2.5 h-2.5 me-1" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd"
                                                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            Telkom regional IV
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>
                                    </li>
                                    <li class="ms-6">
                                        <a href="#"
                                            class="items-center block p-1 rounded-lg sm:flex hover:bg-gray-100">
                                            <span
                                                class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white ">
                                                <img class="rounded-full shadow-lg"
                                                    src="https://media.licdn.com/dms/image/D5603AQHC4IFjmiQi1Q/profile-displayphoto-shrink_400_400/0/1680830096821?e=1721260800&v=beta&t=djkevYMcgIYM7wYZJxQ1Xrp7N6e5KE8IqNhd0PCIi6A"
                                                    alt="Bonnie image" />
                                            </span>
                                            <div class="text-gray-600">
                                                <div class="text-base font-normal">
                                                    <span class="text-sm font-medium text-gray-900">Aslam Thariq Akbar
                                                        Akrami</span>
                                                    <div class="text-xs font-normal">10.00 - 11.30 WIB
                                                        <span
                                                            class="inline-flex items-center text-xs font-normal text-gray-500 ms-2">
                                                            <svg class="w-2.5 h-2.5 me-1" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd"
                                                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            Telkom regional IV
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>
                                    </li>
                                    <li class="ms-6">
                                        <a href="#"
                                            class="items-center block p-1 rounded-lg sm:flex hover:bg-gray-100">
                                            <span
                                                class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white ">
                                                <img class="rounded-full shadow-lg"
                                                    src="https://media.licdn.com/dms/image/D5603AQHC4IFjmiQi1Q/profile-displayphoto-shrink_400_400/0/1680830096821?e=1721260800&v=beta&t=djkevYMcgIYM7wYZJxQ1Xrp7N6e5KE8IqNhd0PCIi6A"
                                                    alt="Bonnie image" />
                                            </span>
                                            <div class="text-gray-600">
                                                <div class="text-base font-normal">
                                                    <span class="text-sm font-medium text-gray-900">Aslam Thariq Akbar
                                                        Akrami</span>
                                                    <div class="text-xs font-normal">10.00 - 11.30 WIB
                                                        <span
                                                            class="inline-flex items-center text-xs font-normal text-gray-500 ms-2">
                                                            <svg class="w-2.5 h-2.5 me-1" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd"
                                                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            Telkom regional IV
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>
                                    </li>
                                    <li class="ms-6">
                                        <a href="#"
                                            class="items-center block p-1 rounded-lg sm:flex hover:bg-gray-100">
                                            <span
                                                class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white ">
                                                <img class="rounded-full shadow-lg"
                                                    src="https://media.licdn.com/dms/image/D5603AQHC4IFjmiQi1Q/profile-displayphoto-shrink_400_400/0/1680830096821?e=1721260800&v=beta&t=djkevYMcgIYM7wYZJxQ1Xrp7N6e5KE8IqNhd0PCIi6A"
                                                    alt="Bonnie image" />
                                            </span>
                                            <div class="text-gray-600">
                                                <div class="text-base font-normal">
                                                    <span class="text-sm font-medium text-gray-900">Aslam Thariq Akbar
                                                        Akrami</span>
                                                    <div class="text-xs font-normal">10.00 - 11.30 WIB
                                                        <span
                                                            class="inline-flex items-center text-xs font-normal text-gray-500 ms-2">
                                                            <svg class="w-2.5 h-2.5 me-1" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd"
                                                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            Telkom regional IV
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>
                                    </li>


                                </ol>
                            </div>


                            <form
                                class="grid w-full grid-cols-2 gap-4 p-4 mx-auto border border-gray-100 rounded-lg bg-gray-50">
                                <div>
                                    <label for="start-time"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Start time:</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input type="time" id="start-time"
                                            class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            min="09:00" max="18:00" value="00:00" required />
                                    </div>
                                </div>
                                <div>
                                    <label for="end-time" class="block mb-2 text-sm font-medium text-gray-900 ">End
                                        time:</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input type="time" id="end-time"
                                            class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            min="09:00" max="18:00" value="00:00" required />
                                    </div>
                                </div>
                            </form>




                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-2">
                        <button type="button"
                            class="text-white bg-positive hover:bg-positive-hover font-medium rounded-lg text-sm px-5 py-2.5 mb-2 ">Send
                            invitation</button>
                        <button type="button" data-modal-hide="timepicker-modal"
                            class="py-2.5 px-5 mb-2 text-sm font-medium text-white rounded-lg border border-gray-200 bg-negative">Discard</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
