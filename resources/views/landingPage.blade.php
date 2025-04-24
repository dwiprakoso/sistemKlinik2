<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JOB MATCH</title>
    <link rel="icon" href="{{ url('images/job-match-white.svg') }}">
    @vite(['resources/css/styleLandingPage.css','resources/css/menu.css','resources/fonts/stylesheet.css','resources/js/app.js'])
</head>

<body>
    <div class="page-wrapper relative z-[1] bg-[#FDFBF9]">
        <!--...::: Header Start :::... -->
        <header class="site-header site-header--absolute is--white py-3" id="sticky-menu">
            <div class="container-default">
                <div class="flex items-center justify-between gap-x-8">
                    <!-- Header Logo -->
                    <a href="" class="">
                        <img src="images/jobMatch.svg" alt="Job Match" width="109" height="24" />
                    </a>
                    <!-- Header Logo -->

                    <!-- Header Navigation -->
                    <div class="menu-block-wrapper">
                        <div class="menu-overlay"></div>
                        <nav class="menu-block" id="append-menu-header">
                            <div class="mobile-menu-head">
                                <div class="go-back">
                                    <i class="fa-solid fa-angle-left"></i>
                                </div>
                                <div class="current-menu-title"></div>
                                <div class="mobile-menu-close">&times;</div>
                            </div>
                            <ul class="site-menu-main">
                                <li class="nav-item nav-item-has-children">
                                    <a href="" class="nav-link-item drop-trigger  ">Home</a>
                                </li>
                                <li class="nav-item nav-item-has-children">
                                    <a href="#section-about" class="nav-link-item drop-trigger ">About</a>
                                </li>
                                <li class="nav-item nav-item-has-children">
                                    <a href="#section-feature" class="nav-link-item drop-trigger ">Layanan</a>
                                </li>
                                <li class="nav-item nav-item-has-children">
                                    <a href="#section-contact" class="nav-link-item drop-trigger ">Contact</a>
                                </li>
                                <li class="nav-item nav-item-has-children">
                                    <a href="{{ route('dashboard.kandidat.cvMaker') }}" class="nav-link-item drop-trigger ">Buat CV</a>
                                </li>
                                <li class="nav-item nav-item-has-children">
                                    <a href="{{ route('cariLowongan') }}" class="nav-link-item drop-trigger ">Cari Lowongan</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Navigation -->

                    <!-- Header User Event -->
                    <div class="flex items-center gap-6">
                        <a href="/login" class="btn-text hidden hover:text-ColorPurple sm:inline-block">Login</a>
                        <a href="/register" class="btn is-lime btn-animation group hidden rounded-[3px] sm:inline-block"><span>Register</span></a>
                        <!-- Responsive Offcanvas Menu Button -->
                        <div class="block lg:hidden">
                            <button id="openBtn" class="hamburger-menu mobile-menu-trigger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                    <!-- Header User Event -->
                </div>
            </div>
        </header>
        <!--...::: Header End :::... -->
        
        <main class="main-wrapper relative overflow-hidden">
            <!--...::: Hero Section Start :::... -->
            <section class="section-hero">
                <!-- Section Background -->
                <div class="relative z-10 overflow-hidden">
                    <!-- Hero Section Space -->
                    <div class="pt-[105px] sm:pt-[145px] lg:pt-[185px]">
                        <!-- Section Container -->
                        <div class="container-default relative z-10">
                            <!-- Hero Area -->
                            <div class="text-center">
                                <h1 class="jos -trackig-[1px] mx-auto mb-6 font-PublicSans text-5xl font-bold leading-[1.06] text-[#121212] md:max-w-[80%] md:text-[60px] lg:max-w-[70%] lg:text-[70px] xl:max-w-[856px] xl:text-[90px]">
                                    Temukan Kandidat Tanpa Biaya Berlebihan!
                                </h1>
                                <p class="jos mx-auto mb-8 max-w-[658px] lg:mb-[50px]">
                                    Platform inovatif untuk membantu perusahaan menemukan kandidat yang tepat dengan efisien. kami mengurangi biaya rekrutmen perusahaan dengan memastikan setiap perekrutan merupakan investasi yang bernilai. Hemat waktu, hemat biaya, hasil optimal!
                                </p>
                                <div class="jos flex flex-wrap justify-center gap-[18px]">
                                    <a href="#section-feature" class="btn is-lime is-large btn-animation group rounded-[3px]"><span>Layanan Kami</span></a>
                                    {{-- <a href="#section-feature" class="btn is-outline-black is-large btn-animation group rounded-[3px]"><span>Layanan Kami</span></a> --}}
                                </div>
                            </div>
                        </div>
                        <!-- Section Container -->
                    </div>
                </div>
                <!-- Section Background -->
            </section>
            <!--...::: Hero Section End :::... -->

      

            <!--...::: Content Section Start :::... -->
            <section class="section-content" id="section-about">
                <div class="relative z-10">
                    <!-- Section Space -->
                    <div class="section-space">
                        <!-- Section Container -->
                        <div class="container-default">
                            <div class="flex flex-col gap-y-20 lg:gap-y-[100px] xl:gap-y-[120px]">
                                <!-- Content Area Single -->
                                <div class="grid items-center gap-10 md:grid-cols-2 lg:gap-24 xl:gap-60">
                                    <!-- Content Block Left -->
                                    <div class="jos order-1 md:order-2" data-jos_animation="fade-right">
                                        <!-- Section Wrapper -->
                                        <div>
                                            <!-- Section Block -->
                                            <div class="mb-5">
                                                <h2 class="font-PublicSans text-4xl font-bold leading-[1.14] text-[#121212] lg:text-left lg:text-5xl xl:text-[56px]">
                                                    Kisah dibalik kami
                                                </h2>
                                            </div>
                                            <!-- Section Block -->
                                        </div>
                                        <!-- Section Wrapper -->
                                        <p class="mb-5">
                                            Kami telah menciptakan ruang untuk menyederhanakan proses rekrutmen, mengurangi biaya, dan memastikan perusahaan menemukan kandidat yang tepat dengan efisien.
                                        </p>
                                        <hr class="mb-5" />
                                        <p>
                                            Kami mencakup segala hal untuk dengan cepat menemukan bakat terbaik. Di era dimana biaya perekrutan tinggi dan waktu terbatas, kami hadir untuk menentukan apa yang benar-benar penting: menemukan kesesuaian yang sempurna tanpa menguras anggaran.
                                        </p>
                                        <div class="mt-8 lg:mt-[50px]">
                                            <a href="https://www.instagram.com/jobmatch.indonesia/" class="btn is-lime is-large btn-animation group inline-block rounded-[3px]"><span>Ikuti Kami</span></a>
                                        </div>
                                    </div>
                                    <!-- Content Block Left -->
                                    <!-- Content Block Right -->
                                    <div class="jos relative order-2 md:order-1" data-jos_animation="fade-left">
                                        <!-- Content Image -->
                                        <img src="images/content_1.png" alt="content-img-1" width="523" height="450" class="h-auto w-full rounded-[10px]" />
                                        <!-- Content Shape -->
                                        <img src="images/tekan_biaya.png" alt="content-shape-1" width="304" height="104" class="jos absolute bottom-6 left-full hidden -translate-x-1/2 xl:inline-block" data-jos_animation="fade-up" data-jos_delay="0.3" />
                                    </div>
                                    <!-- Content Block Right -->
                                </div>
                                <!-- Content Area Single -->

                                <!-- Content Area Single -->
                                <div class="grid items-center gap-10 md:grid-cols-2 lg:gap-24 xl:gap-60" id="section-feature">
                                    <!-- Content Block Left -->
                                    <div class="jos" data-jos_animation="fade-left">
                                        <!-- Section Wrapper -->
                                        <div>
                                            <!-- Section Block -->
                                            <div class="mb-5">
                                                <h2 class="font-PublicSans text-4xl font-bold leading-[1.14] text-[#121212] lg:text-left lg:text-5xl xl:text-[56px]">
                                                    Misi Kami adalah Membantu Proses Rekrutmen Bisnis Anda
                                                </h2>
                                            </div>
                                            <!-- Section Block -->
                                        </div>
                                        <!-- Section Wrapper -->
                                        <p>
                                            Tim penulis, pengembang, dan pengaruh kami siap membantu Anda memulai dengan solusi yang tepat.
                                        </p>
                                        <ul class="grid lg:grid-cols-2 flex-col gap-5 font-semibold">
                                            <li>
                                                <span class="mr-3 inline-block text-xl text-ColorPurple"><i class="fa-solid fa-badge-check"></i></span>
                                                Assesment Pool
                                            </li>
                                            <li>
                                                <span class="mr-3 inline-block text-xl text-ColorPurple"><i class="fa-solid fa-badge-check"></i></span>
                                                Monitor timelines
                                            </li>
                                            <li>
                                                <span class="mr-3 inline-block text-xl text-ColorPurple"><i class="fa-solid fa-badge-check"></i></span>
                                                One Way Selection
                                            </li>
                                            <li>
                                                <span class="mr-3 inline-block text-xl text-ColorPurple"><i class="fa-solid fa-badge-check"></i></span>
                                                Custom Path Selection
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Content Block Left -->
                                    <!-- Content Block Right -->
                                    <div class="jos relative" data-jos_animation="fade-right">
                                        <!-- Content Image -->
                                        <img src="images/alur_jobmatch.png" alt="Job Match Flow" width="520" height="450" class="h-auto w-full rounded-[10px]" />
                                     
                                    </div>
                                    <!-- Content Block Right -->
                                </div>
                                <!-- Content Area Single -->
                            </div>
                        </div>
                        <!-- Section Container -->
                    </div>
                    <!-- Section Space -->

                </div>
            </section>
            <!--...::: Content Section End :::... -->
           
        </main>

        <!--...::: CTA Section Start :::... -->
        <section class="section-cta relative z-30" id="section-contact">
            <!-- Negative Section Space -->
            <div class="-mb-20 lg:-mb-40">
                <!-- Section Container -->
                <div class="container-default">
                    <div class="relative z-10 rounded-[5px] bg-black">
                        <div class="py-[60px] lg:py-20 xl:py-[100px]">
                            <div class="mx-auto max-w-full px-8 md:max-w-[80%] lg:max-w-[675px]">
                                <h2 class="jos mb-5 text-center font-PublicSans text-2xl font-semibold leading-[1.14] text-[#1212121] text-white lg:text-5xl xl:text-[56px]">
                                    Hubungi kami!
                                </h2>
                                <p class="jos text-center text-white">
                                    Kirimkan pesan kepada kami untuk mendapatkan jawaban atas semua pertanyaan Anda & kami akan membalas dalam waktu 24-48 jam atau sesegera mungkin.
                                </p>
                                <div class="jos flex flex-wrap justify-center gap-[18px]">
                                    <a href="https://api.whatsapp.com/send/?phone=%2B6289527830486&text&type=phone_number&app_absent=0" class="btn is-lime is-large btn-animation group inline-block rounded-[3px]"><span>Whatsapp kami</span></a>
                                    <a href="#section-feature" class="btn is-outline-white is-large btn-animation group inline-block rounded-[3px]"><span>Lihat Layanan</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Section Container -->
            </div>
            <!-- Section Space -->
        </section>
        <!--...::: CTA Section End :::... -->

        <!--...::: Footer Section Start :::... -->
        <footer class="section-footer z-20">
            <div class="relative z-10 bg-[#121212]">
                <div class="pt-20 lg:pt-[100px] xl:pt-32 xxl:pt-[200px]">
                    <!-- Footer Area Center -->
                    <div class="text-[#FDFBF9]/80">
                        <!-- Footer Center Spacing -->
                        <div class="py-[60px] lg:py-20">
                            <!-- Section Container -->
                            <div class="container-default">
                                <!-- Footer Widget List -->
                                <div class="grid gap-x-16 gap-y-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-[1fr_repeat(3,_auto)] xl:gap-x-20 xxl:gap-x-[134px]">
                                    <!-- Footer Widget Item -->
                                    <div class="flex flex-col md:col-span-3 lg:col-span-1">
                                        <!-- Footer Logo -->
                                        <a href="index.html">
                                            <img src="images/jobMatch.svg" alt="Job Match" class="h-14 w-20 object-cover" />
                                        </a>
                                        <!-- Footer Content -->
                                        <div>
                                            <!-- Footer About Text -->
                                            <div class="lg:max-w-[416px]">
                                                Memastikan setiap penempatan bukan hanya sekadar perekrutan, melainkan investasi strategis dalam kesuksesan masa depan.
                                            </div>
                                        </div>
                                        <!-- Footer Content -->
                                    </div>
                                    <!-- Footer Widget Item -->

                                    <!-- Footer Widget Item -->
                                    <div class="flex flex-col md:col-span-1 lg:col-span-1">
                                        <!-- Footer Title -->
                                        <div class="text-xl font-semibold capitalize">
                                            Contact
                                        </div>
                                        <!-- Footer Title -->
                                        
                                        <!-- Footer Mail -->
                                        <a href="mailto:jobmatch6@gmail.com" class="my-6 block underline-offset-4 transition-all duration-300 hover:underline">jobmatch6@gmail.com</a>
                                        <!-- Footer Social Link -->
                                        <div class="flex flex-wrap gap-5">
                                            <a href="https://www.instagram.com/jobmatch.indonesia/" target="_blank" rel="noopener noreferrer" class="flex h-[30px] w-[30px] items-center justify-center rounded-[50%] bg-[#FDFBF9]/10 text-sm text-[#FDFBF9] transition-all duration-300 hover:bg-ColorLime hover:text-[#121212]" aria-label="instagram">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                            <a href="https://www.tiktok.com/@jobmatch.id" target="_blank" rel="noopener noreferrer" class="flex h-[30px] w-[30px] items-center justify-center rounded-[50%] bg-[#FDFBF9]/10 text-sm text-[#FDFBF9] transition-all duration-300 hover:bg-ColorLime hover:text-[#121212]" aria-label="instagram">
                                                <i class="fa-brands fa-tiktok"></i>
                                            </a>
                                           
                                        </div>

                                       
                                    </div>
                                    <!-- Footer Widget Item -->
                                </div>
                                <!-- Footer Widget List -->
                            </div>
                            <!-- Section Container -->
                        </div>
                        <!-- Footer Center Spacing -->
                    </div>
                

                  
                </div>
                <!-- Footer Bottom -->

            </div>
        </footer>
        <!--...::: Footer Section End :::... -->
    </div>

    <script src="{{ asset('js/jos.min.js') }}"></script>
    <!--Vendor js-->
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/fslightbox.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>

     <!-- Main js -->
     <script src="{{ asset('js/main.js') }}"></script>


</body>

</html>


