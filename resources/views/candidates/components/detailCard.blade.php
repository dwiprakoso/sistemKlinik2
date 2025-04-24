<!-- Modal header -->
<div class="flex items-center justify-between border-b ">
    <div class="flex pb-3">
        <img class="w-20 h-20 border rounded-lg"
            src="{{ $room->company->logo ? asset('storage/' . $room->company->logo) : asset('images/profile-empty.png') }}"
            alt="Jese image">
        <div class="ps-3">

            <div class="flex items-center gap-4 text-base font-bold text-gray-800">
                <span class="text-lg text-gray-500"> {{ $room->position_name }}</span>
                <span
                    class="inline-flex items-center bg-negative text-white text-xs font-bold px-2.5 py-0.5 rounded-full">
                    {{ $room->work_system }}
                </span>
            </div>
            <div class="text-xs font-semibold text-gray-500">{{ $room->company->company_name }}</div>
            <div class="flex gap-2 mt-2">
                <div class="flex items-center">
                    <svg class="w-4 h-4 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-xs text-gray-400">{{ $room->company->company_address }}</span>
                </div>
                <div class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-gray-400 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor" className="size-6">
                        <path
                            d="M21.721 12.752a9.711 9.711 0 0 0-.945-5.003 12.754 12.754 0 0 1-4.339 2.708 18.991 18.991 0 0 1-.214 4.772 17.165 17.165 0 0 0 5.498-2.477ZM14.634 15.55a17.324 17.324 0 0 0 .332-4.647c-.952.227-1.945.347-2.966.347-1.021 0-2.014-.12-2.966-.347a17.515 17.515 0 0 0 .332 4.647 17.385 17.385 0 0 0 5.268 0ZM9.772 17.119a18.963 18.963 0 0 0 4.456 0A17.182 17.182 0 0 1 12 21.724a17.18 17.18 0 0 1-2.228-4.605ZM7.777 15.23a18.87 18.87 0 0 1-.214-4.774 12.753 12.753 0 0 1-4.34-2.708 9.711 9.711 0 0 0-.944 5.004 17.165 17.165 0 0 0 5.498 2.477ZM21.356 14.752a9.765 9.765 0 0 1-7.478 6.817 18.64 18.64 0 0 0 1.988-4.718 18.627 18.627 0 0 0 5.49-2.098ZM2.644 14.752c1.682.971 3.53 1.688 5.49 2.099a18.64 18.64 0 0 0 1.988 4.718 9.765 9.765 0 0 1-7.478-6.816ZM13.878 2.43a9.755 9.755 0 0 1 6.116 3.986 11.267 11.267 0 0 1-3.746 2.504 18.63 18.63 0 0 0-2.37-6.49ZM12 2.276a17.152 17.152 0 0 1 2.805 7.121c-.897.23-1.837.353-2.805.353-.968 0-1.908-.122-2.805-.353A17.151 17.151 0 0 1 12 2.276ZM10.122 2.43a18.629 18.629 0 0 0-2.37 6.49 11.266 11.266 0 0 1-3.746-2.504 9.754 9.754 0 0 1 6.116-3.985Z" />
                    </svg>

                    <span class="text-xs text-gray-400">{{ $room->company->company_website }}</span>
                </div>
            </div>
        </div>

    </div>
    <a href="{{ route('kandidat.apply', $room->id) }}"
        class="inline-flex items-center p-2 text-sm font-medium text-center text-white border rounded-lg bg-negative hover:bg-negative-hover">
        <span class="text-sm font-semibold text-white">Easy Apply</span>
    </a>
</div>
<div class="grid grid-cols-2 gap-4 my-2">

    <div class="flex items-center p-2 rounded-lg">
        <div class="inline-flex items-center w-8 h-8 p-1 text-sm font-medium text-center text-white rounded-lg me-2 ">
            <svg class="w-8 h-8 text-e73002" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                className="size-6">
                <path
                    d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                <path fillRule="evenodd"
                    d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
                    clipRule="evenodd" />
            </svg>
            <span class="sr-only">Deadline Pendaftaran</span>
        </div>
        <div>
            <p class="text-sm font-bold text-gray-500">Deadline Pendaftaran</p>
            <p class="text-xs font-semibold text-gray-500">{{ Carbon\Carbon::parse($room->deadline)->format('d M Y') }}
            </p>
        </div>
    </div>
    <div class="flex items-center p-2 rounded-lg">
        <div class="inline-flex items-center w-8 h-8 p-1 text-sm font-medium text-center text-white rounded-lg me-2 ">

            <svg class="w-8 h-8 text-e73002" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
            </svg>


            <span class="sr-only">Sistem Kerja</span>
        </div>
        <div>
            <p class="text-sm font-bold text-gray-500">Sistem Kerja</p>
            <p class="text-xs font-semibold text-gray-500">{{ $room->work_system }}</p>
        </div>
    </div>
    <div class="flex items-center p-2 rounded-lg">
        <div class="inline-flex items-center w-8 h-8 p-1 text-sm font-medium text-center text-white rounded-lg me-2 ">
            <svg class="w-8 h-8 text-e73002" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
            </svg>


            <span class="sr-only">Jumlah posisi</span>
        </div>
        <div>
            <p class="text-sm font-bold text-gray-500">Jumlah posisi</p>
            <p class="text-xs font-semibold text-gray-500">{{ $room->total_open_position }}</p>
        </div>
    </div>
    <div class="flex items-center p-2 rounded-lg">
        <div class="inline-flex items-center w-8 h-8 p-1 text-sm font-medium text-center text-white rounded-lg me-2 ">

            <svg class="w-8 h-8 text-e73002" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>



            <span class="sr-only">Jumlah posisi</span>
        </div>
        <div>
            <p class="text-sm font-bold text-gray-500">Jam kerja</p>
            <p class="text-xs font-semibold text-gray-500">{{ $room->working_hours }}</p>
        </div>
    </div>


</div>
<div class="items-start justify-start ">

    <p class="text-sm font-bold text-gray-500 dark:text-gray-400">
        Job Description:
    </p>
    <p class="text-sm text-gray-500"> {{ $room->description }}</p>

</div>
<div class="items-start justify-start mt-2 ">

    <p class="text-sm font-bold text-gray-500 dark:text-gray-400">
        Requirements :
    </p>
    <p class="text-sm text-gray-500"> {{ $room->requirements }}</p>

</div>
<div class="items-start justify-start mt-2">
    <p class="mb-2 text-sm font-bold text-gray-500">
        Benefits:
    </p>
    <div class="grid grid-cols-3 gap-4 md:grid-cols-4">
        @foreach ($allBenefits[$room->id] as $benefit)
            <div class="flex items-center p-2 border rounded-lg">
                <div
                    class="inline-flex items-center w-8 h-8 p-1 text-sm font-medium text-center text-white bg-white border rounded-lg me-2">
                    {!! $benefit->svg !!}
                    <span class="sr-only">Website</span>
                </div>
                <p class="text-sm font-semibold text-gray-500">{{ $benefit->benefit }}</p>
            </div>
        @endforeach

    </div>
</div>
