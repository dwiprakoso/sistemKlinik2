<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      @vite(['resources/css/app.css','resources/js/app.js'])
      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
      <link rel="icon" href="{{ url('images/job-match-white.svg') }}">
      <title>Pesan | Job Match</title>
   </head>
   <body class="bg-gray-50">
      <!-- Sidebar tetap di kiri -->
      @include('recruiter.components.sidebar')
       
      <!-- Container utama dengan flex untuk membagi area -->
      <div class="flex sm:ml-80">
         <!-- Daftar pesan (panel tengah) dengan warna yang disesuaikan -->
         <div class="w-80 border-r border-gray-200 dark:border-gray-700 h-screen overflow-y-auto bg-white dark:bg-gray-800">
            <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center bg-gradient-to-r from-[#e73002] to-[#fd7d09] text-white">
               <h1 class="text-xl font-bold text-white">Pesan</h1>
               <!-- Tombol pesan baru dengan tooltip -->
               <a href="{{ route('dashboard.recruiter.newMessage') }}" class="p-2 rounded-full bg-white/20 text-white hover:bg-white/30 transition-colors relative group">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                  </svg>
                  <span class="absolute -top-10 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Pesan Baru</span>
               </a>
            </div>
            
            <!-- Search bar untuk mencari pesan -->
            <div class="p-2 border-b border-gray-200 dark:border-gray-700">
               <div class="relative">
                  <input type="text" placeholder="Cari pesan..." class="w-full pl-8 pr-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#fd7d09] dark:bg-gray-700 dark:text-white text-sm">
                  <svg class="w-4 h-4 absolute left-2.5 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                  </svg>
               </div>
            </div>
            
            <!-- Daftar pesan yang ditingkatkan dengan warna yang disesuaikan -->
            <div>
               @if(isset($conversations) && count($conversations) > 0)
                  @foreach($conversations as $conversation)
                     <!-- Determine if this conversation is active -->
                     @php
                        $isActive = false;
                        if (isset($activeConversation) && $activeConversation['user_id'] == $conversation['user_id']) {
                           $isActive = true;
                        } elseif (isset($activeUserDetails) && $activeUserDetails['user_id'] == $conversation['user_id']) {
                           $isActive = true;
                        }
                     @endphp
                     
                     <a href="{{ route('dashboard.recruiter.showMessage', $conversation['user_id']) }}" 
                        class="block {{ $isActive ? 'border-l-4 border-[#fd7d09] bg-orange-50 dark:bg-gray-800' : 'hover:bg-orange-50 dark:hover:bg-gray-700 border-b border-gray-200 dark:border-gray-700' }} p-3 cursor-pointer transition-all duration-200">
                        <div class="flex items-start">
                           <div class="relative">
                              <img src="{{ asset('storage/' . $conversation['logo']) }}" alt="Logo" class="w-10 h-10 rounded-full mr-3 object-cover border border-gray-200 dark:border-gray-600">
                              @if($conversation['unread_count'] > 0)
                                 <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                                    {{ $conversation['unread_count'] }}
                                 </span>
                              @endif
                           </div>
                           <div class="flex-1 min-w-0">
                              <div class="flex justify-between items-start">
                                 <h3 class="text-sm font-semibold text-gray-900 dark:text-white truncate">{{ $conversation['name'] }}</h3>
                                 <span class="text-xs text-gray-500 dark:text-gray-400 whitespace-nowrap ml-1">{{ $conversation['last_message_time']->diffForHumans() }}</span>
                              </div>
                              <p class="text-sm text-gray-500 dark:text-gray-400 truncate mt-0.5">{{ $conversation['last_message'] }}</p>
                           </div>
                        </div>
                     </a>
                  @endforeach
               @else
                  <div class="p-4 text-center text-gray-500">
                     Tidak ada percakapan. 
                     <a href="{{ route('dashboard.recruiter.newMessage') }}" class="text-[#fd7d09] hover:underline">Mulai percakapan baru</a>
                  </div>
               @endif
            </div>
         </div>

         <!-- Area percakapan (panel kanan) -->
         <div class="flex-1 flex flex-col h-screen">
            @if(isset($activeConversation) || isset($activeUserDetails))
               <!-- Header percakapan -->
               <div class="p-4 bg-gradient-to-r from-[#e73002] to-[#fd7d09] border-b border-gray-200 dark:border-gray-700 flex justify-between items-center sticky top-0 z-10">
                  <div class="flex items-center">
                     <img src="{{ asset('storage/' . (isset($activeConversation) ? $activeConversation['logo'] : $activeUserDetails['logo'])) }}" alt="Logo" class="w-10 h-10 rounded-full mr-3 border border-white/30">
                     <div>
                        <div class="flex items-center">
                           <h3 class="font-semibold text-white">{{ isset($activeConversation) ? $activeConversation['name'] : $activeUserDetails['name'] }}</h3>
                        </div>
                     </div>
                  </div>
               </div>
               
               <!-- Area pesan dengan indikator tanggal -->
               <div class="flex-1 overflow-y-auto p-4 bg-orange-50 dark:bg-gray-750" id="message-container">
                  <div class="max-w-3xl mx-auto">
                     @if(isset($messages) && count($messages) > 0)
                        @php
                           $currentDate = null;
                        @endphp
                        
                        @foreach($messages as $message)
                           @php
                              $messageDate = $message->created_at->format('d F Y');
                              $showDateHeader = ($currentDate !== $messageDate);
                              $currentDate = $messageDate;
                              $isSentByMe = $message->sender_id == Auth::id();
                           @endphp
                           
                           @if($showDateHeader)
                              <!-- Indikator tanggal -->
                              <div class="flex justify-center mb-6">
                                 <span class="px-3 py-1 text-xs text-gray-500 bg-white rounded-full shadow-sm dark:bg-gray-700 dark:text-gray-300">
                                    {{ $messageDate }}
                                 </span>
                              </div>
                           @endif
                           
                           @if($isSentByMe)
                              <!-- Pesan dari pengguna -->
                              <div class="mb-6 flex justify-end">
                                 <div class="max-w-[80%] bg-gradient-to-r from-[#e73002] to-[#fd7d09] text-white rounded-lg p-3 shadow-sm">
                                    <div>
                                       {!! nl2br(e($message->message)) !!}
                                    </div>
                                    <div class="text-right text-xs text-white/80 mt-1 flex items-center justify-end">
                                       <span>{{ $message->created_at->diffForHumans() }}</span>
                                       <span class="ml-1">
                                          <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                          </svg>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           @else
                              <!-- Pesan dari perusahaan/lawan bicara -->
                              <div class="mb-6 flex">
                                 <img src="{{ asset('storage/' . (isset($activeConversation) ? $activeConversation['logo'] : $activeUserDetails['logo'])) }}" alt="Logo" class="w-8 h-8 rounded-full mr-2 self-end">
                                 <div class="max-w-[80%] bg-white dark:bg-gray-700 rounded-lg p-3 shadow-sm">
                                    <div class="text-gray-800 dark:text-gray-200">
                                       {!! nl2br(e($message->message)) !!}
                                    </div>
                                    <div class="text-left text-xs text-gray-500 dark:text-gray-400 mt-1">
                                       {{ $message->created_at->diffForHumans() }}
                                    </div>
                                 </div>
                              </div>
                           @endif
                        @endforeach
                     @else
                        <div class="flex justify-center items-center h-full">
                           <div class="text-center p-8 bg-white rounded-lg shadow-sm">
                              <p class="text-gray-500 mb-4">Belum ada pesan dalam percakapan ini.</p>
                              <p class="text-gray-400 text-sm">Kirim pesan untuk memulai percakapan.</p>
                           </div>
                        </div>
                     @endif
                  </div>
               </div>
               
               <!-- Area input pesan -->
               <div class="border-t border-gray-200 dark:border-gray-700 p-4 bg-white dark:bg-gray-800">
                  <form action="{{ route('dashboard.recruiter.sendMessage') }}" method="POST">
                     @csrf
                     <input type="hidden" name="receiver_id" value="{{ isset($activeConversation) ? $activeConversation['user_id'] : $activeUserDetails['user_id'] }}">
                     
                     <!-- Area input teks -->
                     <div class="flex">
                        <div class="flex-1">
                           <div class="bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-700 rounded-lg mb-2 relative">
                              <textarea 
                                 name="message" 
                                 rows="3" 
                                 placeholder="Ketik pesan Anda di sini..." 
                                 class="w-full p-3 bg-transparent focus:outline-none focus:ring-2 focus:ring-[#fd7d09] dark:text-white resize-none"
                                 required
                              ></textarea>
                           </div>
                        </div>
                     </div>
                     
                     <!-- Bar aksi -->
                     <div class="flex justify-end items-center">
                        <!-- Tombol kirim -->
                        <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-[#e73002] to-[#fd7d09] hover:from-[#d62d00] hover:to-[#ed7407] text-white font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-[#fd7d09] focus:ring-opacity-50 transition-all duration-200 flex items-center">
                           <span>Kirim</span>
                           <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                           </svg>
                        </button>
                     </div>
                  </form>
               </div>
            @else
               <!-- Empty state when no conversation is selected -->
               <div class="flex-1 flex items-center justify-center bg-orange-50 dark:bg-gray-750">
                  <div class="text-center p-8 bg-white rounded-lg shadow-sm max-w-md">
                     <img src="{{ url('images/job-match-white.svg') }}" alt="Logo" class="w-16 h-16 mx-auto mb-4">
                     <h2 class="text-xl font-bold text-gray-700 mb-2">Tidak Ada Percakapan Terpilih</h2>
                     <p class="text-gray-500 mb-4">Pilih percakapan dari daftar di sebelah kiri atau mulai percakapan baru.</p>
                     <a href="{{ route('dashboard.recruiter.newMessage') }}" class="inline-block px-6 py-2.5 bg-gradient-to-r from-[#e73002] to-[#fd7d09] text-white font-medium rounded-lg hover:from-[#d62d00] hover:to-[#ed7407] transition-all duration-200">
                        Mulai Percakapan Baru
                     </a>
                  </div>
               </div>
            @endif
         </div>
      </div>
      
      <script>
         document.addEventListener('DOMContentLoaded', function() {
            // Scroll to bottom of message container
            const messageContainer = document.getElementById('message-container');
            if (messageContainer) {
               messageContainer.scrollTop = messageContainer.scrollHeight;
            }
         });
      </script>
   </body>
</html>