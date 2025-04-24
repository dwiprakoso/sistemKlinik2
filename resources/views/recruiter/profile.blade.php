<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>Selection Process</title>
</head>
<body>
@include('recruiter.components.sidebar')
     
 <div class="sm:ml-80 p-4">
    <div class="flex p-4 mb-6 shadow-lg rounded-lg dark:border-gray-700">
        <div class="relative flex-none me-4">
            <img class="w-28 h-28 object-cover rounded-lg" src="https://images.unsplash.com/photo-1561131989-b8112bafbd43?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="profile image">
            <span class="top-24 start-24 absolute w-5 h-5 bg-green-500 border-2 border-white dark:border-gray-800 rounded-full"></span>
        </div>
        <div class="ps-3">
            <div class="text-base font-bold">Aslam Thariq Akbar Akrami</div>
            <div class="font-semibold text-sm text-gray-500">I'm a sixth semester S1-Engineering Informatics student at Dian Nuswantoro University. I'm actively involved in BEM FIK UDINUS and Radio Swara Dian, gaining experience in organizing campus-wide events. I'm passionate about Machine Learning and other tech areas like Cloud Computing, NLP, IoT, and Networking, and I'm open to connecting with professionals for potential collaborations or projects.</div>
            <div class="font-normal text-gray-500">Semarang, Indonesia</div>
        </div>  
        
    </div>

    <div class=" p-4 shadow-lg rounded-lg dark:border-gray-700">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="experience-tab" data-tabs-target="#experience" type="button" role="tab" aria-controls="experience" aria-selected="false">Experience</button>
                </li>
            </ul>
               
        </div>
        <div id="default-tab-content">
            <div class="relative hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <button type="button" class="absolute top-0 right-0 m-2 text-e73002 shadow-lg bg-white  hover:bg-negative hover:text-white font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center ">
                  
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                      </svg>
                      
                    <span class="sr-only">Edit Banner</span>
                </button>
                <div class="flex flex-col gap-4 p-4 justify-center mb-4 rounded bg-white shadow-lg dark:bg-gray-800">
                    <div class="text-base font-semibold">Pendidikan</div>
                    <div class="flex p-4 items-center rounded bg-white shadow-lg dark:bg-gray-800">
                        <img class="w-10 h-10 object-cover" src="https://upload.wikimedia.org/wikipedia/commons/9/98/Logo_udinus1.jpg" alt="Jese image">
                        <div class="ps-3 w-full">
                            <div class="text-base font-semibold">Universitas Dian Nuswantoro</div>
                            <div class="font-normal text-gray-500">S1-Teknik Infromatika</div>
                        </div>
                        <div class="ps-3 w-full text-right">
                            <div class="text-base font-semibold ">2021 - Sekarang</div>
                        </div>                             
                    </div>
                    <div class="flex p-4 items-center rounded bg-white shadow-lg dark:bg-gray-800">
                        <img class="w-10 h-10 object-cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSA_Tg1MtWmyrOZi6AY3jXa9Hcgd2K1YJnzVA&s" alt="Jese image">
                        <div class="ps-3 w-full">
                            <div class="text-base font-semibold">SMA N 4 Semarang</div>
                            <div class="font-normal text-gray-500">MIPA</div>
                        </div>
                        <div class="ps-3 w-full text-right">
                            <div class="text-base font-semibold ">2018 - 2021</div>
                        </div>                             
                    </div>
                </div>
                    <div class="grid grid-cols-3 gap-4 mb-4">
                        <div class="p-4 items-center justify-center  rounded bg-white shadow-lg dark:bg-gray-800">
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
                        <div class="p-4  items-center justify-center rounded shadow-lg bg-white dark:bg-gray-800">
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
                        <div class="p-4 items-center justify-center  rounded bg-white shadow-lg dark:bg-gray-800">
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
                    
                    
                
                
            </div>
            <div class="hiddenrounded-lg bg-gray-50 dark:bg-gray-800" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                <div class="grid grid-cols-4 gap-4">
                    <div>
                        <a href="#">
                            <img class="rounded-lg mb-2 w-64 h-40 object-cover" src="https://media.licdn.com/dms/image/D5622AQGoQfDjHJaIsQ/feedshare-shrink_2048_1536/0/1706456185534?e=1721865600&v=beta&t=vh73LL1UQBanZMOdyD9WzfwmtMwPeq1-yBocDa1JD70" alt="" />
                        </a>
                        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow">
                            <a href="#">
                                <h5 class="text-lg font-bold text-gray-900 dark:text-white">Nama perusahaan</h5>
                                <h6 class="mb-2 text-base text-abu-abu dark:text-white">Posisi</h6>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Tulis tentang pencapaian, keberhasilan, dan kontribusi Anda terhadap perusahaan ini.</p>
                            <h6 class="mb-2 text-base text-abu-abu dark:text-white">2021-2022</h6>

                        </div>
                    </div>
                    <div>
                        <a href="#">
                            <img class="rounded-lg mb-2 w-64 h-40 object-cover" src="https://media.licdn.com/dms/image/D5622AQFvXlyNopB19g/feedshare-shrink_2048_1536/0/1706456134681?e=1721865600&v=beta&t=IwiFhmMmYVqWHZ-aEAd7oiDYEjoDtyk4o9EgBhvU_30" alt="" />
                        </a>
                        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow">
                            <a href="#">
                                <h5 class="text-lg font-bold text-gray-900 dark:text-white">Nama perusahaan</h5>
                                <h6 class="mb-2 text-base text-abu-abu dark:text-white">Posisi</h6>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Tulis tentang pencapaian, keberhasilan, dan kontribusi Anda terhadap perusahaan ini.</p>
                            <h6 class="mb-2 text-base text-abu-abu dark:text-white">2021-2022</h6>

                        </div>
                    </div>
                    <div>
                        <a href="#">
                            <img class="rounded-lg mb-2 w-64 h-40 object-cover" src="https://media.licdn.com/dms/image/D562DAQEtFoWq4_wg4Q/profile-treasury-image-shrink_800_800/0/1680828757802?e=1719849600&v=beta&t=BD_a4Bva7ETT7b0qGEaT5vBie1RIn5SUAEP2cMLvpDQ" alt="" />
                        </a>
                        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow">
                            <a href="#">
                                <h5 class="text-lg font-bold text-gray-900 dark:text-white">Nama perusahaan</h5>
                                <h6 class="mb-2 text-base text-abu-abu dark:text-white">Posisi</h6>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Tulis tentang pencapaian, keberhasilan, dan kontribusi Anda terhadap perusahaan ini.</p>
                            <h6 class="mb-2 text-base text-abu-abu dark:text-white">2021-2022</h6>

                        </div>
                    </div>
                    <div>
                        <a href="#">
                            <img class="rounded-lg mb-2 w-64 h-40 object-cover" src="https://media.licdn.com/dms/image/D562DAQGV2Yvij34P9g/profile-treasury-image-shrink_8192_8192/0/1680872378166?e=1719849600&v=beta&t=wqSOOzLFZQK4eE4sS4fpH6xzT0yZBPPyEiPZOIdxclk" alt="" />
                        </a>
                        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow">
                            <a href="#">
                                <h5 class="text-lg font-bold text-gray-900 dark:text-white">Nama perusahaan</h5>
                                <h6 class="mb-2 text-base text-abu-abu dark:text-white">Posisi</h6>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Tulis tentang pencapaian, keberhasilan, dan kontribusi Anda terhadap perusahaan ini.</p>
                            <h6 class="mb-2 text-base text-abu-abu dark:text-white">2021-2022</h6>

                        </div>
                    </div>

                </div>
            </div>

            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                <div class="flex">
                    <div class="relative flex-none me-4">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>
                            <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
                        </svg>
                          
                          
                    </div>
                    <a href="https://www.instagram.com/aslamthrq/" class="font-semibold text-abu-abu">+6281325080083</a>
                </div>
                <div class="flex">
                    <div class="relative flex-none me-4">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17 6h-2V5h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2h-.541A5.965 5.965 0 0 1 14 10v4a1 1 0 1 1-2 0v-4c0-2.206-1.794-4-4-4-.075 0-.148.012-.22.028C7.686 6.022 7.596 6 7.5 6A4.505 4.505 0 0 0 3 10.5V16a1 1 0 0 0 1 1h7v3a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-3h5a1 1 0 0 0 1-1v-6c0-2.206-1.794-4-4-4Zm-9 8.5H7a1 1 0 1 1 0-2h1a1 1 0 1 1 0 2Z"/>
                        </svg>
                    </div>
                    <a href="https://www.instagram.com/aslamthrq/" class="font-semibold text-abu-abu">aslamthariq01@gmail.com</a>
                </div>  
            </div>
        </div>
    </div>
    
 </div>
 
    


</body>
