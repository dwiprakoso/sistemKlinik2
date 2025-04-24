<a href="{{ ($room->access_rights == 'private' || (isset($room_candidate) && $room_candidate->status == 'approved')) ? '#' : route('dashboard.kandidat.status.detail', $room->id) }}"
    class="inline-flex p-2 text-white rounded-lg bg-slate-100 active {{ ($room->access_rights == 'private' || (isset($room_candidate) && $room_candidate->status == 'approved')) ? 'cursor-not-allowed opacity-50' : '' }}" 
    aria-current="page"
    {{ ($room->access_rights == 'private' || (isset($room_candidate) && $room_candidate->status == 'approved')) ? 'tabindex="-1"' : '' }}>
    <div class="w-full">
        <!-- Company and Job Info Section -->
        <div class="flex justify-between">
            <div class="flex">
                <img class="w-16 h-16 border rounded-lg" src="{{ $room->company->logo ? asset('storage/' . $room->company->logo) : asset('images/profile-empty.png') }}" alt="profile image - {{ $room->company->company_name }}">
                <div class="ps-3">
                    <div class="flex items-center gap-4 text-base font-bold text-gray-800">
                        <span class="text-xs text-gray-500">
                            {{ $room->position_name }}
                            @if($room->access_rights == 'private')
                                <span class="text-red-500">(ditutup)</span>
                            @elseif (isset($room_candidate) && $room_candidate->status == 'approved')
                                <span class="text-red-500">(diterima)</span>
                            @endif
                        </span>
                    </div>
                    <div class="flex gap-2 my-1">
                        <div class="flex items-center">
                            <span class="text-xs text-gray-400">{{ $room->company->company_name }}</span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-xs text-gray-400">{{ $room->company->company_address }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                            </svg>
                            <span class="text-xs text-gray-400">{{ $room->salary }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                            </svg>
                            <span class="text-xs text-gray-400">{{ $room->work_system }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modern Progress Steps/Tabs with Gradient Background -->
        <div class="p-4 mt-4 bg-white border rounded-xl shadow-sm">
            <ul class="flex flex-wrap items-center w-full text-sm font-medium text-center" id="selection-steps" 
                data-tabs-toggle="#selection-steps-content" data-tabs-active-classes="text-red-600" 
                data-tabs-inactive-classes="text-gray-500" role="tablist">
                
                <!-- Step 1: Pemberkasan -->
                <li class="relative flex flex-col items-center w-1/4 mb-4 sm:mb-0" role="path point selection">
                    <div class="flex items-center">
                        <button class="flex flex-col items-center {{ ($room->access_rights == 'private' || (isset($room_candidate) && $room_candidate->status == 'approved')) ? 'opacity-50 cursor-not-allowed' : '' }}" 
                                id="pemberkasan-tab" data-tabs-target="#pemberkasan" type="button" role="tab"
                                aria-controls="pemberkasan" aria-selected="false"
                                {{ ($room->access_rights == 'private' || (isset($room_candidate) && $room_candidate->status == 'approved')) ? 'disabled' : '' }}>
                            <span class="inline-flex items-center justify-center w-8 h-8 text-white rounded-full bg-gradient-to-r from-red-600 to-orange-500 shadow-md">1</span>
                            <span class="mt-2 text-xs font-medium">Pemberkasan</span>
                        </button>
                    </div>
                    <div class="hidden w-full h-1 bg-gradient-to-r from-red-600 to-orange-500 absolute top-4 left-1/2 sm:block -z-10"></div>
                </li>
                
                <!-- Step 2: Meet Invitation -->
                <li class="relative flex flex-col items-center w-1/4 mb-4 sm:mb-0" role="path point selection">
                    <div class="flex items-center">
                        <button class="flex flex-col items-center {{ ($room->access_rights == 'private' || (isset($room_candidate) && $room_candidate->status == 'approved')) ? 'opacity-50 cursor-not-allowed' : '' }}" 
                                id="meet-invitation-tab" data-tabs-target="#meet-invitation" type="button" role="tab"
                                aria-controls="meet-invitation" aria-selected="false"
                                {{ ($room->access_rights == 'private' || (isset($room_candidate) && $room_candidate->status == 'approved')) ? 'disabled' : '' }}>
                            <span class="inline-flex items-center justify-center w-8 h-8 text-white rounded-full bg-gradient-to-r from-red-600 to-orange-500 shadow-md">2</span>
                            <span class="mt-2 text-xs font-medium">Meet Invitation</span>
                        </button>
                    </div>
                    <div class="hidden w-full h-1 bg-gradient-to-r from-red-600 to-orange-500 absolute top-4 left-1/2 sm:block -z-10"></div>
                </li>
                
                <!-- Step 3: Challenge -->
                <li class="relative flex flex-col items-center w-1/4 mb-4 sm:mb-0" role="path point selection">
                    <div class="flex items-center">
                        <button class="flex flex-col items-center {{ ($room->access_rights == 'private' || (isset($room_candidate) && $room_candidate->status == 'approved')) ? 'opacity-50 cursor-not-allowed' : '' }}" 
                                id="challenge-tab" data-tabs-target="#challenge" type="button" role="tab"
                                aria-controls="challenge" aria-selected="false"
                                {{ ($room->access_rights == 'private' || (isset($room_candidate) && $room_candidate->status == 'approved')) ? 'disabled' : '' }}>
                            <span class="inline-flex items-center justify-center w-8 h-8 text-white rounded-full bg-gradient-to-r from-red-600 to-orange-500 shadow-md">3</span>
                            <span class="mt-2 text-xs font-medium">Challenge</span>
                        </button>
                    </div>
                    <div class="hidden w-full h-1 bg-gradient-to-r from-red-600 to-orange-500 absolute top-4 left-1/2 sm:block -z-10"></div>
                </li>
                
                <!-- Step 4: Pengumuman -->
                <li class="flex flex-col items-center w-1/4" role="path point selection">
                    <div class="flex items-center">
                        <button class="flex flex-col items-center {{ ($room->access_rights == 'private' || (isset($room_candidate) && $room_candidate->status == 'approved')) ? 'opacity-50 cursor-not-allowed' : '' }}" 
                                id="pengumuman-tab" data-tabs-target="#pengumuman" type="button" role="tab"
                                aria-controls="pengumuman" aria-selected="false"
                                {{ ($room->access_rights == 'private' || (isset($room_candidate) && $room_candidate->status == 'approved')) ? 'disabled' : '' }}>
                            <span class="inline-flex items-center justify-center w-8 h-8 text-white rounded-full bg-gradient-to-r from-red-600 to-orange-500 shadow-md">4</span>
                            <span class="mt-2 text-xs font-medium">Pengumuman</span>
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</a>