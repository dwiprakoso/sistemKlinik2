<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      @vite(['resources/css/app.css','resources/js/app.js'])
      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
      <link rel="icon" href="{{ url('images/job-match-white.svg') }}">
      <title>Pesan Baru | Job Match</title>
   </head>
   <body class="bg-gray-50">
      <!-- Sidebar tetap di kiri -->
      @include('candidates.components.sidebar')
       
      <!-- Container utama dengan flex untuk membagi area -->
      <div class="flex sm:ml-80">
         <!-- Daftar pesan (panel tengah) dengan warna yang disesuaikan -->
         <div class="w-80 border-r border-gray-200 dark:border-gray-700 h-screen overflow-y-auto bg-white dark:bg-gray-800">
            <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center bg-gradient-to-r from-[#e73002] to-[#fd7d09] text-white">
               <h1 class="text-xl font-bold text-white">Pesan</h1>
               <a href="{{ route('dashboard.kandidat.message') }}" class="p-2 rounded-full bg-white/20 text-white hover:bg-white/30 transition-colors">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                  </svg>
               </a>
            </div>
            
            <!-- Search bar untuk mencari user -->
            <div class="p-2 border-b border-gray-200 dark:border-gray-700">
               <div class="relative">
                <input type="text" id="search-user" placeholder="Cari pengguna..." class="w-full pl-8 pr-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#fd7d09] dark:bg-gray-700 dark:text-white text-sm">
                <svg class="w-4 h-4 absolute left-2.5 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
             </div>
          </div>
          
          <!-- Daftar pengguna -->
          <div id="user-list">
             @if(isset($users) && count($users) > 0)
                @foreach($users as $user)
                   <div class="border-b border-gray-200 dark:border-gray-700 p-3 hover:bg-orange-50 dark:hover:bg-gray-700 cursor-pointer transition-all duration-200 user-item">
                      <div class="flex items-center">
                         <img src="" alt="User Image" class="w-10 h-10 rounded-full mr-3 object-cover border border-gray-200 dark:border-gray-600">
                         <div class="flex-1">
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $user->name }}</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ Auth::user()->role == 'candidate' ? 'Perusahaan' : 'Kandidat' }}</p>
                         </div>
                         <button type="button" class="select-user-btn p-2 text-gray-500 hover:text-[#fd7d09]" data-id="{{ $user->id }}" data-name="{{ $user->name }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                         </button>
                      </div>
                   </div>
                @endforeach
             @else
                <div class="p-4 text-center text-gray-500">
                   Tidak ada pengguna ditemukan.
                </div>
             @endif
          </div>
       </div>

       <!-- Area pesan baru (panel kanan) -->
       <div class="flex-1 flex flex-col h-screen">
          <!-- Header area pesan baru -->
          <div class="p-4 bg-gradient-to-r from-[#e73002] to-[#fd7d09] border-b border-gray-200 dark:border-gray-700 flex justify-between items-center sticky top-0 z-10">
             <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center mr-3">
                   <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                   </svg>
                </div>
                <div>
                   <h3 class="font-semibold text-white" id="selected-user-name">Pesan Baru</h3>
                   <p class="text-xs text-white/70">Pilih pengguna dari daftar untuk memulai percakapan</p>
                </div>
             </div>
          </div>
          
          <!-- Area utama - form pesan baru -->
          <div class="flex-1 overflow-y-auto p-4 bg-orange-50 dark:bg-gray-750" id="message-form-container">
             <div class="max-w-3xl mx-auto">
                <!-- Form akan ditampilkan setelah pengguna dipilih -->
                <div id="no-user-selected" class="flex justify-center items-center h-full">
                   <div class="text-center p-8 bg-white rounded-lg shadow-sm">
                      <img src="{{ url('images/job-match-white.svg') }}" alt="Logo" class="w-16 h-16 mx-auto mb-4">
                      <h2 class="text-xl font-bold text-gray-700 mb-2">Mulai Percakapan Baru</h2>
                      <p class="text-gray-500 mb-2">Pilih pengguna dari daftar di sebelah kiri untuk memulai percakapan baru.</p>
                      <p class="text-gray-400 text-sm">Anda dapat mencari pengguna dengan menggunakan kotak pencarian.</p>
                   </div>
                </div>
                
                <!-- Form pesan (awalnya disembunyikan) -->
                <form action="{{ route('dashboard.kandidat.startMessage') }}" method="POST" id="new-message-form" class="hidden">
                   @csrf
                   <input type="hidden" name="user_id" id="receiver-id" value="">
                   
                   <div class="bg-white p-6 rounded-lg shadow-sm">
                      <h3 class="text-lg font-semibold text-gray-800 mb-4">Kirim Pesan Ke: <span id="form-user-name" class="text-[#fd7d09]"></span></h3>
                      
                      <div class="mb-4">
                         <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                         <div class="bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-700 rounded-lg mb-2 relative">
                            <textarea 
                               name="message" 
                               rows="6" 
                               placeholder="Ketik pesan Anda di sini..." 
                               class="w-full p-3 bg-transparent focus:outline-none focus:ring-2 focus:ring-[#fd7d09] dark:text-white resize-none"
                               required
                            ></textarea>
                         </div>
                         <p class="text-xs text-gray-500">Perkenalkan diri Anda dan sampaikan pesan secara jelas.</p>
                      </div>
                      
                      <div class="flex justify-end">
                         <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-[#e73002] to-[#fd7d09] hover:from-[#d62d00] hover:to-[#ed7407] text-white font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-[#fd7d09] focus:ring-opacity-50 transition-all duration-200 flex items-center">
                            <span>Kirim Pesan</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                         </button>
                      </div>
                   </div>
                </form>
             </div>
          </div>
       </div>
    </div>
    
    <script>
       document.addEventListener('DOMContentLoaded', function() {
          // Search functionality
          const searchInput = document.getElementById('search-user');
          const userItems = document.querySelectorAll('.user-item');
          
          searchInput.addEventListener('input', function() {
             const searchTerm = this.value.toLowerCase();
             
             userItems.forEach(item => {
                const userName = item.querySelector('h3').textContent.toLowerCase();
                if (userName.includes(searchTerm)) {
                   item.style.display = 'block';
                } else {
                   item.style.display = 'none';
                }
             });
          });
          
          // User selection
          const selectUserBtns = document.querySelectorAll('.select-user-btn');
          const noUserSelected = document.getElementById('no-user-selected');
          const newMessageForm = document.getElementById('new-message-form');
          const receiverId = document.getElementById('receiver-id');
          const formUserName = document.getElementById('form-user-name');
          const selectedUserName = document.getElementById('selected-user-name');
          
          selectUserBtns.forEach(btn => {
             btn.addEventListener('click', function() {
                const userId = this.getAttribute('data-id');
                const userName = this.getAttribute('data-name');
                
                receiverId.value = userId;
                formUserName.textContent = userName;
                selectedUserName.textContent = 'Pesan Ke: ' + userName;
                
                noUserSelected.classList.add('hidden');
                newMessageForm.classList.remove('hidden');
             });
          });
       });
    </script>
 </body>
</html>