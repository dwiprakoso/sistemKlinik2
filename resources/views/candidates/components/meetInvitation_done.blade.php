<div class="relative grid grid-cols-2 gap-4 overflow-x-auto">
    <div class="col-span-1 p-6 bg-white rounded-lg">
        <div class="items-start justify-start ">
            <p class="text-lg font-bold text-gray-500 ">
                Deskripsi seleksi:
            </p>
            <p class="text-sm text-gray-500"> {{ $meetPath->pathMeetingInvitation->deskripsi }}</p>
        </div>
        <div class="items-start justify-start mt-4">
            <p class="text-sm font-bold text-gray-500 ">
                Lampiran :
            </p>
            <div class="text-sm text-gray-500">
                <button type="button" data-modal-target="meet-modal" data-modal-toggle="meet-modal"
                    class="text-gray-500 gap-2 bg-gray-50 hover:bg-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                    <svg fill="none" aria-hidden="true" class="flex-shrink-0 w-5 h-5" viewBox="0 0 20 21">
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
                    Lihat Lampiran
                </button>
            </div>
        </div>
        <div class="items-start justify-start mt-4">
            <p class="text-sm font-bold text-gray-500 ">
                Rentang waktu :
            </p>
            <p class="text-sm text-gray-500">{{ $meetPath->pathMeetingInvitation->rentang_waktu }}</p>
        </div>
    </div>
    <div class="flex flex-col h-full p-6 bg-white rounded-lg">
        <p class="mb-4 text-lg font-bold text-gray-500">
            Terimakasih sudah mengirimkan pemberkasan
        </p>
        <p class="text-sm text-gray-500">
            Pemberkasan anda sudah kami terima dan sedang dalam proses pengecekan. Kami akan memberitahukan anda jika
            terdapat informasi lebih lanjut.
        </p>
    </div>

</div>


<!-- Pemberkasan modal -->
<div id="meet-modal" tabindex="-1" aria-hidden="true"
    class="hidden fixed top-0 right-0 left-0 z-50  justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative h-full p-4">
        <!-- Modal content -->
        <div class="relative flex flex-col h-full rounded-lg shadow bg-gray-50"
            style="width: calc(100vh / 1.414); max-width: 100%;">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <div class="flex ">
                    <div class="me-2">
                        <span class="flex items-center gap-2 pb-2 text-sm font-medium text-gray-900 dark:text-white">
                            <svg fill="none" aria-hidden="true" class="flex-shrink-0 w-5 h-5" viewBox="0 0 20 21">
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
                            Lampiran seleksi
                        </span>
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
                    </div>
                </div>
                <div class="inline-flex items-center justify-center text-sm text-gray-400 bg-transparent ms-auto">
                    <a href="pemberkasanPath/aslam.pdf" download
                        class="inline-flex items-center self-center p-2 text-sm font-medium text-center text-gray-400 rounded-lg hover:bg-gray-200 hover:text-gray-900 bg-gray-50 "
                        type="button">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                            <path
                                d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Download</span>
                    </a>
                    <a href="pemberkasanPath/aslam.pdf"
                        class="inline-flex items-center self-center p-2 text-sm font-medium text-center text-gray-400 rounded-lg hover:bg-gray-200 hover:text-gray-900 bg-gray-50 "
                        type="button">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 4H4m0 0v4m0-4 5 5m7-5h4m0 0v4m0-4-5 5M8 20H4m0 0v-4m0 4 5-5m7 5h4m0 0v-4m0 4-5-5" />
                        </svg>
                        <span class="sr-only">Expand</span>
                    </a>
                    <button type="button"
                        class="inline-flex items-center self-center p-2 text-sm font-medium text-center text-gray-400 rounded-lg hover:bg-gray-200 hover:text-gray-900 bg-gray-50"
                        data-modal-toggle="meet-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
            </div>

            <embed src="pemberkasanPath/aslam.pdf" type="application/pdf" class="w-full h-full p-2 rounded-xl" />


        </div>
    </div>
</div>
