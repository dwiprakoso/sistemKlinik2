<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>Selection Process</title>
</head>
<body>
@include('candidates.components.sidebar')
     
 <div class="sm:ml-80 p-4">
    <div class="border rounded-lg" >
        <div class="flex p-4 rounded-lg">
            <div class="relative">
                <!-- Profile Image -->
                <form action="{{ route('dashboard.kandidat.updatePhoto') }}" method="POST" enctype="multipart/form-data" id="profile-form">
                    @csrf
                    <div class="flex col-span-4 items-center justify-center">
                        <label for="profile-image" class="relative flex flex-col items-center justify-center w-full h-28 rounded-lg cursor-pointer hover:border-2 hover:border-e73002 bg-gray-50 hover:bg-gray-100">

                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <img id="profile-image-preview" class="w-28 h-28 object-cover border-2 rounded-lg" src="{{ $profile->photo_path ? asset('storage/' . $profile->photo_path) : asset('images/profile-empty.png') }}" alt="profile image - {{ $profile->full_name }}">

                                <div class="absolute inset-0 flex items-center justify-center hover:bg-white hover:bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity duration-300">
                                    <svg class="w-8 h-8 text-negative hover:text-e73002" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                                        <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                                    </svg>
                                </div>

                            </div>

                            <input id="profile-image" type="file" name="profile-image" class="hidden" accept="image/*" onchange="previewAndSubmit(event)">

                            {{-- <span class="top-32 start-32 absolute w-5 h-5 bg-green-500 border-2 border-white dark:border-gray-800 rounded-full"></span> --}}
                        </label>
                    </div>
                </form>
            </div>
            <div class="ps-3">
                <button data-modal-target="editProfile-modal" data-modal-toggle="editProfile-modal" type="button" class="absolute top-0 right-0 m-2 text-e73002 shadow-lg bg-white  hover:bg-negative hover:text-white font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center ">
                  
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                      </svg>
                      
                    <span class="sr-only">Edit Profile</span>
                </button>
                <div class="text-lg font-bold">{{ $profile->full_name }}</div>
                <div class="font-semibold text-xs text-gray-500">{{ $profile->headline }}</div>
                <div class="text-xs my-2 text-gray-500">{{ $profile->address }}</div>
                {{-- Social Media --}}
                <div class="flex">
                    <a target="blank" href="https://{{ $contact->instagram }}" class="w-8 h-8 text-white bg-white hover:bg-slate-50 border font-medium rounded-lg text-sm p-1 text-center inline-flex items-center me-2 ">
                        <svg class="w-8 h-8 text-e73002" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd"/>
                        </svg>
                        <span class="sr-only">Instagram</span>
                    </a>
                    <a target="blank" href="https://{{ $contact->linkedin }}" class="w-8 h-8 text-white bg-white hover:bg-slate-50 border font-medium rounded-lg text-sm p-1 text-center inline-flex items-center me-2 ">
                    
                        <svg class="w-8 h-8 text-e73002" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z" clip-rule="evenodd"/>
                            <path d="M7.2 8.809H4V19.5h3.2V8.809Z"/>
                        </svg>
                        
                        <span class="sr-only">Linkedin</span>
                    </a>
                    <a target="blank" href="https://wa.me/{{ $contact->whatsapp }}" class="w-8 h-8 text-white bg-white hover:bg-slate-50 border font-medium rounded-lg text-sm p-1 text-center inline-flex items-center me-2 ">
                        <svg class="w-8 h-8 text-e73002" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>
                            <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
                        </svg>
                        
                        
                        <span class="sr-only">Whatsapp</span>
                    </a>
                    <a target="blank" href="https://{{ $contact->website }}" class="w-8 h-8 text-white bg-white hover:bg-slate-50 border font-medium rounded-lg text-sm p-1 text-center inline-flex items-center me-2 ">
                        <svg class="w-8 h-8 text-e73002" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 2a10 10 0 1 0 10 10A10.009 10.009 0 0 0 12 2Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.093 20.093 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM10 3.707a8.82 8.82 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.755 45.755 0 0 0 10 3.707Zm-6.358 6.555a8.57 8.57 0 0 1 4.73-5.981 53.99 53.99 0 0 1 3.168 4.941 32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.641 31.641 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM12 20.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 15.113 13a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
                        </svg>
                        
                        <span class="sr-only">Website</span>
                    </a>
                </div>
            </div>  
        
            
        </div>

    <div class="px-8 pb-8 shadow-lg rounded-lg ">
        <div class="mb-4 border-b border-gray-200 ">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-e73002" id="default-tab" data-tabs-active-classes="text-e73002 border-e73002" data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 hover:border-e73002 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 hover:border-e73002 border-b-2 rounded-t-lg" id="experience-tab" data-tabs-target="#experience" type="button" role="tab" aria-controls="experience" aria-selected="false">Experience</button>
                </li>
                {{-- <li role="presentation">
                    <button class="inline-block p-4 hover:border-e73002 border-b-2 rounded-t-lg " id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Contacts</button>
                </li> --}}
            </ul>
               
        </div>
        <div id="default-tab-content">
            <div class="hidden rounded-lg" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                
                <div class="min-h-28 justify-start items-start">
                        
                    <p class="text-sm font-bold text-gray-500 dark:text-gray-400">
                      About Me:
                    </p>
                    <p class="text-sm text-gray-500">{{ $profile->bio }}</p>

                </div>

                <div class="flex flex-col gap-2 justify-center rounded">
                    <p class="mb-2 text-sm font-bold text-gray-500">
                        Last Experience:
                      </p>
                   
                      <div class="grid grid-cols-4 gap-4 ">
                    
                        @foreach($experiences->slice(0, 4) as $experience)
                        <div>
                            <a href="#">
                                <img class="rounded-lg mb-2 w-full h-40 object-cover" src="{{ asset('storage/' . $experience->photo_path) }}" alt="{{ $experience->title }}" />
                            </a>
                            <div class="p-5 bg-white border border-gray-200 rounded-lg shadow">
                                <a href="#">
                                    <h5 class="text-lg font-bold text-gray-900 dark:text-white">{{ $experience->title }}</h5>
                                    <h6 class="mb-2 text-base text-abu-abu dark:text-white">{{ $experience->position }}</h6>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $experience->description }}</p>
                                <h6 class="mb-2 text-base text-abu-abu dark:text-white">
                                    {{ \Carbon\Carbon::parse($experience->year_in)->format('M Y') }} - 
                                    {{ $experience->year_out ? \Carbon\Carbon::parse($experience->year_out)->format('M Y') : 'Present' }}
                                </h6>
                            </div>
                        </div>
                        @endforeach
                        
    
                    </div>

                </div>

                <div class="flex flex-col gap-2 mt-4 justify-center rounded">
                    <p class="mb-2 text-sm font-bold text-gray-500">
                        Pendidikan:
                      </p>
                    <div class="flex p-4 justify-center items-center rounded bg-white shadow-lg border-2 border-dashed">
                      
                        <button data-modal-target="education-modal" data-modal-toggle="education-modal" class="ps-3 w-full flex gap-2 justify-center items-center">
                            <svg class="w-6 h-6 text-e73002" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                            </svg>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Click untuk tambah <span class="font-semibold">pendidikan</span></p>
                        </button>

                        <!-- Add education modal -->
                        <div id="education-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-lg max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5">
                                        <h3 class="text-lg text-gray-500 dark:text-gray-400">
                                            Pendidikan
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="education-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="px-4 pb-4 md:px-5 md:pb-5">
                                        
                                        <form action="{{ route('dashboard.kandidat.addEducation') }}" class="p-4 md:p-5 overflow-y-auto flex-grow" method="POST" id="educationCandidate">
                                            @csrf
                                            <div class="grid gap-4 grid-cols-4">
                                              
                                                <div class="col-span-4">
                                                    <label for="institution_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Institusi</label>
                                                    <input type="text" name="institution_name" id="institution_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukan Nama Institusi" value="" required="">
                                                </div>
                                                <div class="col-span-2 sm:col-span-4">
                                                    <label for="major" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                                                    <input type="text" name="major" id="major" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="Masukkan jurusan" >
                                                </div>
                                                <div class="col-span-4">
                                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Rentang waktu</label>
                                                    <div date-rangepicker datepicker-format="yyyy-mm-dd" class="flex items-center">
                                                        <div class="relative">
                                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                            </svg>
                                                        </div>
                                                        <input name="year_in" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mulai">
                                                        </div>
                                                        <span class="mx-4 text-gray-500">to</span>
                                                        <div class="relative">
                                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                            </svg>
                                                        </div>
                                                        <input name="year_out" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Selesai">
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <input type="checkbox" id="current_education" name="current_education" class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                                                        <label for="current_education" class="ml-2 text-sm text-gray-700 dark:text-gray-300">Masih Berlangsung</label>
                                                    </div>
                                            </div>
                     
                                                
                                            </div>
                                        </form>
                                        
                                        <button type="submit" form="educationCandidate" class="py-2.5 mt-4 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 ">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                 
                    </div>

                     <!-- Iterasi melalui setiap riwayat pendidikan -->
                     @foreach ($educations as $education)
                        <div class="flex p-4 items-center rounded bg-white shadow-lg">
                            <div class="ps-3 w-full">
                                <div class="text-base font-semibold">{{ $education->institution_name }}</div>
                                <div class="font-normal text-gray-500">{{ $education->major }}</div>
                            </div>
                            <div class="ps-3 w-full text-right">
                                <div class="text-base font-semibold">{{ date('Y', strtotime($education->year_in)) }} - {{ $education->year_out ? date('Y', strtotime($education->year_out)) : 'Sekarang' }}</div>
                            </div>
                        </div>
                    @endforeach

                </div>
                    {{-- <div class="grid grid-cols-3 gap-4 mb-4">
                        <div class="p-4 items-center justify-center  rounded bg-white shadow-lg">
                            <div class="text-base font-semibold mb-2">Sosial Media</div>
                            <div class="flex">
                                <div class="relative flex-none me-4">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path fill="currentColor" fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd"/>
                                      </svg>
                                </div>
                                <a href="https://www.instagram.com/aslamthrq/" class="font-semibold text-abu-abu">@aslamthrq</a>
                            </div>
                            <div class="flex">
                                <div class="relative flex-none me-4">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z" clip-rule="evenodd"/>
                                        <path d="M7.2 8.809H4V19.5h3.2V8.809Z"/>
                                      </svg>
                                </div>
                                <a href="https://www.instagram.com/aslamthrq/" class="font-semibold text-abu-abu">@aslamthrq</a>
                            </div>  
                        </div>
                        <div class="p-4  items-center justify-center rounded shadow-lg bg-white">
                            <div class="text-base font-semibold mb-2">Skill</div>                            
                            <div class="flex justify-between mb-1">
                                <span class="text-base font-medium text-black dark:text-white">Tiduran</span>
                                <span class="text-sm font-medium text-black dark:text-white">80%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-e73002 h-2.5 rounded-full" style="width: 80%"></div>
                            </div>
                            <div class="flex justify-between mb-1">
                                <span class="text-base font-medium text-black dark:text-white">Photoshop</span>
                                <span class="text-sm font-medium text-black dark:text-white">45%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-e73002 h-2.5 rounded-full" style="width: 45%"></div>
                            </div>
                            
                        </div>
                        <div class="p-4 items-center justify-center  rounded bg-white shadow-lg">
                            <div class="text-base font-semibold mb-2">Languange</div>
                            <div class="flex justify-between mb-1">
                                <span class="text-base font-medium text-black dark:text-white">Bahasa Inggris</span>
                                <span class="text-sm font-medium text-black dark:text-white">60%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-e73002 h-2.5 rounded-full" style="width: 60%"></div>
                            </div>
                            <div class="flex justify-between mb-1">
                                <span class="text-base font-medium text-black dark:text-white">Bahasa Jawa</span>
                                <span class="text-sm font-medium text-black dark:text-white">90%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-e73002 h-2.5 rounded-full" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>
                     --}}
                    
                
                
            </div>
            <div class="hiddenrounded-lg bg-gray-50" id="experience" role="tabpanel" aria-labelledby="experience-tab">
             
                
                <div class="p-2 bg-slate-100 border-2 border-dashed border-gray-200 rounded-lg shadow w-64">
                    <button data-modal-target="experience-modal" data-modal-toggle="experience-modal" class=" w-full flex gap-2 justify-center items-center">
                        <svg class="w-6 h-6 text-e73002" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Tambah <span class="font-semibold">experience</span></p>
                    </button>
                </div>
                <!-- Add xperience modal -->
                <div id="experience-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-lg max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5">
                            <h3 class="text-lg text-gray-500 dark:text-gray-400">
                                Experience
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="experience-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="px-4 pb-4 md:px-5 md:pb-5">
                            
                            <form action="{{ route('dashboard.kandidat.addExperience') }}" class="p-4 md:p-5 overflow-y-auto flex-grow" method="POST" id="experienceCandidate" enctype="multipart/form-data">
                                @csrf
                                <div class="grid gap-4 grid-cols-4">
                                    <div class="flex col-span-4 items-center justify-center w-full">
                                        <label for="photo_path" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                            </div>
                                            <input id="photo_path" name="photo_path" type="file" class="hidden" />
                                        </label>
                                    </div> 
                                    <div class="col-span-2">
                                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                        <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukan tittle" value="" required="">
                                    </div>
                                    <div class="col-span-2 sm:col-span-2">
                                        <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posisi</label>
                                        <input type="text" name="position" id="position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="Masukkan jurusan" >
                                    </div>

                                    <div class="col-span-4">
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tulis deskripsi dan kualifikasi"></textarea>                    
                                    </div>

                                    <div class="col-span-4">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Rentang waktu</label>
                                        <div date-rangepicker datepicker-format="yyyy-mm-dd" class="flex items-center">
                                            <div class="relative">
                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                </svg>
                                            </div>
                                            <input name="year_in" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mulai">
                                            </div>
                                            <span class="mx-4 text-gray-500">to</span>
                                            <div class="relative">
                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                </svg>
                                            </div>
                                            <input name="year_out" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Selesai">
                                            </div>
                                        </div>
                                        <div class="flex items-center mt-2">
                                            <input type="checkbox" id="current_experience" name="current_experience" class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                                            <label for="current_experience" class="ml-2 text-sm text-gray-700 dark:text-gray-300">Masih Berlangsung</label>
                                        </div>
                                </div>
            
                                    
                                </div>
                            </form>
                            
                            <button type="submit" form="experienceCandidate" class="py-2.5 mt-4 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 ">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>



                <div class="grid grid-cols-4 gap-4 mt-5">
                    
                    @foreach($experiences as $experience)
                    <div>
                        <a href="#">
                            <img class="rounded-lg mb-2 w-full h-40 object-cover" src="{{ asset('storage/' . $experience->photo_path) }}" alt="{{ $experience->title }}" />
                        </a>
                        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow">
                            <a href="#">
                                <h5 class="text-lg font-bold text-gray-900 dark:text-white">{{ $experience->title }}</h5>
                                <h6 class="mb-2 text-base text-abu-abu dark:text-white">{{ $experience->position }}</h6>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $experience->description }}</p>
                            <h6 class="mb-2 text-base text-abu-abu dark:text-white">
                                {{ \Carbon\Carbon::parse($experience->year_in)->format('M Y') }} - 
                                {{ $experience->year_out ? \Carbon\Carbon::parse($experience->year_out)->format('M Y') : 'Present' }}
                            </h6>
                        </div>
                    </div>
                    @endforeach
                    

                </div>
            </div>

            <div class="hidden p-4 rounded-lg bg-gray-50" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
              
                   
                      {{-- <h3 class="text-2xl font-semibold mb-4">Contact Form</h3>
                  
                      <form action="#" class="space-y-4" data-form>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                          <input type="text" name="fullname" class="form-input border border-gray-300 p-2 rounded-lg w-full" placeholder="Full name" required data-form-input>
                          <input type="email" name="email" class="form-input border border-gray-300 p-2 rounded-lg w-full" placeholder="Email address" required data-form-input>
                        </div>
                  
                        <textarea name="message" class="form-input border border-gray-300 p-2 rounded-lg w-full h-32" placeholder="Your Message" required data-form-input></textarea>
                  
                        <button  type="sumbit" class="gap-2 bg-merah text-merah border border-merah hover:bg-abu-abu hover:text-white font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center ">
                            
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 2a1 1 0 0 1 .932.638l7 18a1 1 0 0 1-1.326 1.281L13 19.517V13a1 1 0 1 0-2 0v6.517l-5.606 2.402a1 1 0 0 1-1.326-1.281l7-18A1 1 0 0 1 12 2Z" clip-rule="evenodd"/>
                              </svg>                               
                            Send Message
                        </button>
                      </form> --}}
        
                {{-- <div class="flex">
                    <div class="relative flex-none me-4">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>
                            <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
                        </svg>
                          
                          
                    </div>
                    <a href="https://www.instagram.com/aslamthrq/" class="font-semibold text-abu-abu">{{ $contact->whatsapp }}</a>
                </div>
                <div class="flex">
                    <div class="relative flex-none me-4">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17 6h-2V5h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2h-.541A5.965 5.965 0 0 1 14 10v4a1 1 0 1 1-2 0v-4c0-2.206-1.794-4-4-4-.075 0-.148.012-.22.028C7.686 6.022 7.596 6 7.5 6A4.505 4.505 0 0 0 3 10.5V16a1 1 0 0 0 1 1h7v3a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-3h5a1 1 0 0 0 1-1v-6c0-2.206-1.794-4-4-4Zm-9 8.5H7a1 1 0 1 1 0-2h1a1 1 0 1 1 0 2Z"/>
                        </svg>
                    </div>
                    <a href="mailto:{{ $contact->email }}" class="font-semibold text-abu-abu">{{ $contact->email }}</a>
                </div>   --}}
            </div>
        </div>
    </div>
    </div>
 </div>
 
    
 <script>
    function previewAndSubmit(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('profile-image-preview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);

        // Submit the form after the image preview is loaded
        document.getElementById('profile-form').submit();
    }
</script>

</body>

    <!-- Edit Profile  modal -->
    <div id="editProfile-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 right-0 left-0 z-50  justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl h-full">
            <!-- Modal content -->
            <div class="relative rounded-lg shadow bg-gray-50 flex flex-col h-full">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Edit Profile
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editProfile-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body Post Room -->
                <form class="p-4 md:p-5 overflow-y-auto flex-grow" method="POST" id="profileCandidate">
                    @csrf
                    <div class="grid gap-4 grid-cols-4">
                      
                        <div class="col-span-4">
                            <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" name="full_name" id="full_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Lengkap" value="{{ old('full_name', $profile->full_name) }}" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-4">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $profile->address }}" placeholder="Alamat Anda" >
                        </div>
                        <div class="col-span-4">
                            <label for="headline" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Headline</label>
                            <input type="text" name="headline" id="headline" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $profile->headline }}" placeholder="Headline Anda" >
                        </div>
                
                        
                        <div class="col-span-4">
                            <label for="bio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio</label>
                            <textarea id="bio" name="bio" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Deskripsi Diri Anda">{{ $profile->bio }}</textarea>                    
                        </div>
                        
                    </div>
                    <div class="flex items-center py-8">
                        <div class="border-b-2 border-gray-300 w-full"></div>
                        <span class="px-3 text-xs font-bold text-gray-500 uppercase">Kontak</span>
                        <div class="border-b-2 border-gray-300 w-full"></div>
                    </div>
                    
                    <div class="grid gap-4 grid-cols-3">
                      
                        <div class="col-span-1">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                                <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                                </svg>
                            </div>
                            <input disabled type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $contact->email }}" placeholder="email@jobmatch.id">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telephone</label>
                            <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7.978 4a2.553 2.553 0 0 0-1.926.877C4.233 6.7 3.699 8.751 4.153 10.814c.44 1.995 1.778 3.893 3.456 5.572 1.68 1.679 3.577 3.018 5.57 3.459 2.062.456 4.115-.073 5.94-1.885a2.556 2.556 0 0 0 .001-3.861l-1.21-1.21a2.689 2.689 0 0 0-3.802 0l-.617.618a.806.806 0 0 1-1.14 0l-1.854-1.855a.807.807 0 0 1 0-1.14l.618-.62a2.692 2.692 0 0 0 0-3.803l-1.21-1.211A2.555 2.555 0 0 0 7.978 4Z"/>
                                  </svg>
                                  
                            </div>
                            <input type="text" id="telephone" name="telephone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $contact->telephone }}"  placeholder="(024) xxxxxx">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website</label>
                            <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 2a10 10 0 1 0 10 10A10.009 10.009 0 0 0 12 2Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.093 20.093 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM10 3.707a8.82 8.82 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.755 45.755 0 0 0 10 3.707Zm-6.358 6.555a8.57 8.57 0 0 1 4.73-5.981 53.99 53.99 0 0 1 3.168 4.941 32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.641 31.641 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM12 20.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 15.113 13a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
                                  </svg>
                            </div>
                            <input type="text" id="website" name="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $contact->website }}" placeholder="jobmatch.id">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="instagram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram</label>
                            <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                
                                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path fill="currentColor" fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <input type="text" id="instagram" name="instagram" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $contact->instagram }}" placeholder="instagram.com/example">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="linkedin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Linkedin</label>
                            <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                               
                                  <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z" clip-rule="evenodd"/>
                                    <path d="M7.2 8.809H4V19.5h3.2V8.809Z"/>
                                  </svg>
                                  
                            </div>
                            <input type="text" id="linkedin" name="linkedin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $contact->linkedin }}" placeholder="linkedin.com/in/example">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="whatsapp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Whatsapp</label>
                            <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                          
                                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>
                                    <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
                                  </svg>
                                  
                            </div>
                            <input type="text" id="whatsapp" name="whatsapp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $contact->whatsapp }}" placeholder="+62 812 3456 xxxx">
                            </div>
                        </div>
                        
                        
                    </div>
                </form>
                <!-- Modal footer -->
                <div class="flex items-center border-t border-gray-200 rounded-b dark:border-gray-600 p-4" >
                    <div class="flex">
                        
                        <button class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-positive border border-gray-300 rounded-lg hover:bg-positive-hover" type="submit" form="profileCandidate">
                            <svg class="w-6 h-6 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7.414A2 2 0 0 0 20.414 6L18 3.586A2 2 0 0 0 16.586 3H5Zm3 11a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v6H8v-6Zm1-7V5h6v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M14 17h-4v-2h4v2Z" clip-rule="evenodd"/>
                                </svg>
                            Simpan
                        </button>
                    </div>                 
                </div>
                
            </div>
        </div>
    </div>