<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>Login - Job Match</title>
</head>
    <body>
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <a href="/">
                    <img src="{{ URL('images/jobMatch.svg') }}" alt="Job Match" width="109" height="24" />
                </a>
                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4">
                        <h1 class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Login
                        </h1>
                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-col -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                                <div class="grid grid-cols-2">
                                    <li class="me-2" role="presentation">
                                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="recruiter-tab" data-tabs-target="#recruiter" type="button" role="tab" aria-controls="recruiter" aria-selected="{{ session('selected_tab') === 'recruiter' ? 'true' : 'false' }}">Recruiter</button>
                                    </li>
                                    <li class="me-2" role="presentation">
                                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="participant-tab" data-tabs-target="#participant" type="button" role="tab" aria-controls="participant" aria-selected="{{ session('selected_tab') === 'participant' ? 'true' : 'false' }}">Participant</button>
                                    </li>
                                </div>
                            </ul>
                        </div>

                        <div id="default-tab-content">
                        @php
                            $index = 0;
                        @endphp

                        
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                @php
                                    $index++;
                                @endphp
                                <div id="toast-warning{{ $index }}" class="flex items-center w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                                        </svg>
                                        <span class="sr-only">Warning icon</span>
                                    </div>
                                    <div class="ms-3 text-sm font-normal">{{ $error }}</div>
                                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-warning{{ $index }}" aria-label="Close">
                                        <span class="sr-only">Close</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        @endif
                            <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="recruiter" role="tabpanel" aria-labelledby="recruiter-tab">
                               
                                <form class="space-y-4 md:space-y-6"  method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div>
                                        <label for="email-recruiter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                                        <input type="email" name="email" id="email-recruiter" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email" value="{{ old('email') }}" >
                                        <input class="hidden" type="text" name="role_id" id="role_id-recruiter" value="3" >
                                        <input type="hidden" name="selected_tab" value="recruiter">

                                    </div>
                                    <div>
                                        <label for="password-recruiter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                        <input type="password" name="password" id="password-recruiter" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    </div>
                                    <button type="submit" class="w-full text-white bg-e73002 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                        Belum punya akun? <a href="/register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                                    </p>
                                </form>
                            </div>
                            <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="participant" role="tabpanel" aria-labelledby="participant-tab">
                                
                                <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div>
                                        <label for="email-participant" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                                        <input type="email" name="email" id="email-participant" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email" required="">
                                        <input class="hidden" type="text" name="role_id" id="role_id-participant" value="2" >
                                        <input type="hidden" name="selected_tab" value="participant">
                                    </div>
                                    <div>
                                        <label for="password-participant" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                        <input type="password" name="password" id="password-participant" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                    </div>
                                    <button type="submit" class="w-full text-white bg-e73002 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                                    
                                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                        Belum punya akun? <a href="/register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

        <!-- Script untuk mendeteksi admin login -->
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tangkap input email pada form recruiter dan participant
            const recruiterEmail = document.getElementById('email-recruiter');
            const participantEmail = document.getElementById('email-participant');
            
            // Daftar email admin yang valid
            const adminEmails = ['admin@jobmatch.com', 'admin5@example.com'];
            
            // Fungsi untuk cek email admin
            function checkAdminEmail(emailInput, roleInput) {
                emailInput.addEventListener('blur', function() {
                    const email = this.value.trim().toLowerCase();
                    
                    // Cek apakah email termasuk dalam daftar email admin
                    if (adminEmails.includes(email) || email.startsWith('admin@')) {
                        roleInput.value = '1'; // Set role_id menjadi admin (1)
                        console.log('Admin email detected:', email);
                    } else if (emailInput.id === 'email-recruiter') {
                        roleInput.value = '3'; // Reset ke recruiter
                    } else {
                        roleInput.value = '2'; // Reset ke participant
                    }
                });
            }
            
            // Terapkan fungsi pada form recruiter
            if (recruiterEmail) {
                const recruiterRoleInput = document.getElementById('role_id-recruiter');
                checkAdminEmail(recruiterEmail, recruiterRoleInput);
            }
            
            // Terapkan fungsi pada form participant
            if (participantEmail) {
                const participantRoleInput = document.getElementById('role_id-participant');
                checkAdminEmail(participantEmail, participantRoleInput);
            }
        });
        </script>
    </body>
</html>