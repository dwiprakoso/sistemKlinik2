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
                                    <a href="{{ route('cvMaker') }}" class="nav-link-item drop-trigger ">Buat CV</a>
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
            @include('components.jobVacancy')
            
        </main>
       

        

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


