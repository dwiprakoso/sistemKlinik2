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
                    <img src="images/jobMatch.svg" alt="Job Match" width="109" height="24" />
                </a>
                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Register
                        </h1>
                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-col -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                                <div class="grid grid-cols-2">
                                    <li class="me-2" role="presentation">
                                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="recruiter-tab" data-tabs-target="#recruiter" type="button" role="tab" aria-controls="recruiter" aria-selected="{{ session('selected_tab') === 'recruiter' ? 'true' : 'false' }}">Recruiter</button>
                                    </li>
                                    <li class="me-2" role="presentation">
                                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="participant-tab" data-tabs-target="#participant" type="button" role="tab" aria-controls="participant" aria-selected="{{ session('selected_tab') === 'participant' ? 'true' : 'false' }}"">Participant</button>
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

                            <div class="hiddenrounded-lg bg-gray-50 dark:bg-gray-800" id="recruiter" role="tabpanel" aria-labelledby="recruiter-tab">
                                <form class="space-y-4 md:space-y-6" method="POST" >
                                    @csrf
                                    <input class="hidden" type="text" name="role_id" id="role_id" value="3" >
                                    <input type="hidden" name="selected_tab" value="recruiter">
                                    <div>
                                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email" >
                                        
                                    </div>
                                    <div>
                                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    </div>
                                    <div>
                                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                                        <input type="password_confirmation" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    </div>
                                    <button type="submit" class="w-full text-white bg-e73002 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create an account</button>
                                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                        Sudah punya akun? <a href="/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                                    </p>
                                </form>
                            </div>

                            <div class="hiddenrounded-lg bg-gray-50 dark:bg-gray-800" id="participant" role="tabpanel" aria-labelledby="participant-tab">
                                <form class="space-y-4 md:space-y-6" method="POST" >
                                    @csrf
                                    <input class="hidden" type="text" name="role_id" id="role_id" value="2" >
                                    <input type="hidden" name="selected_tab" value="participant">
                                    <div>
                                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email" >
                                    </div>
                                    <div>
                                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    </div>
                                    <div>
                                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                                        <input type="password_confirmation" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    </div>
                                    {{-- <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                          <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" >
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Terms and Conditions</a></label>
                                        </div>
                                    </div> --}}
                                    <button type="submit" class="w-full text-white bg-e73002 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create an account</button>
                                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                        Sudah punya akun? <a href="/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                                    </p>
                                </form>
                            </div>
                
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>