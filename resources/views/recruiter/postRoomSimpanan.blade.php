<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="../path/to/flowbite/dist/datepicker.js"></script>
    <link rel="icon" href="{{ url('images/job-match-white.svg') }}">
    <title>Selection Process</title>
</head>
<body>
    @include('recruiter.components.sidebar')
     
 <div class=" sm:ml-80">
    <div class="p-4 m-4 rounded-lg dark:border-gray-700">
        {{-- Body konten --}}
        
        <div class="grid grid-cols-1 md:grid-cols-3  gap-4">

            <div>
                <div class="flex items-center justify-center w-full">
                    <button data-modal-target="postJob-modal" data-modal-toggle="postJob-modal">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Click untuk post <span class="font-semibold">Job</span></p>
                        </div>
                    </button>
                </div> 
            </div>

          
        </div>
    </div>
 </div>
    
<!-- Main modal -->
<div id="postJob-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 right-0 left-0 z-50  justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg shadow bg-gray-50 flex flex-col h-full">
            
            <!-- Modal body Post Room -->
            <form class="p-4 md:p-5 overflow-y-auto flex-grow">
                <div class=" grid gap-4 grid-cols-4">
                    
                    <div class="col-span-2">
                        <label for="position_name" >Masukan posisi lowongan</label>
                        <input type="text" name="position_name" id="position_name" placeholder="Masukan judul" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-2">
                        <label for="departement" >Departemen</label>
                        <input type="text" name="departement" id="departement" placeholder="Masukkan departement" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-2">
                        <label for="years_of_experience" >Kriteria tahun pengalaman</label>
                        <div class="flex flex-wrap mt-4">
                            <div class="flex items-center me-4">
                                <input id="red-radio" type="radio" value="" name="colored-radio" >
                                <label for="red-radio" >< 1 tahun</label>
                            </div>
                            <div class="flex items-center me-4">
                                <input id="green-radio" type="radio" value="" name="colored-radio" >
                                <label for="green-radio" >1 Tahun</label>
                            </div>
                            <div class="flex items-center me-4">
                                <input checked id="purple-radio" type="radio" value="" name="colored-radio" >
                                <label for="purple-radio" >2 Tahun</label>
                            </div>
                            <div class="flex items-center me-4">
                                <input id="teal-radio" type="radio" value="" name="colored-radio" >
                                <label for="teal-radio">3-4 Tahun</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="total_open_position" >Jumlah posisi dibuka</label>
                        <input type="number" name="total_open_position" id="total_open_position" placeholder="10" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="sallary" >Gaji</label>
                        <input type="number" name="sallary" id="sallary" placeholder="2.500.000" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="dateline" >Akhir pendaftaran</label>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            
                            </div>
                            <input datepicker datepicker-autohide datepicker-format="dd-mm-yyyy" type="text" name="dateline"  placeholder="Select date">
                        </div>
                    </div>
                  
                    <div class="col-span-2 sm:col-span-1">
                        <label for="work_system" >Work System</label>
                        <select id="category">
                            <option selected value="WFO" >WFO</option>
                            <option value="WFH" >WFH</option>
                            <option value="Hybrid">Hybrid</option>
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="working_hours" >Working Hours</label>
                        <select id="category" >
                            <option selected value="fulltime" >fulltime</option>
                            <option value="magang" >magang</option>
                            <option value="parttime">parttime</option>
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="accsess_rights" >Hak akses</label>
                        <select id="category" >
                            <option selected="" value="public" >Public</option>
                            <option value="private">Private</option>
                        </select>
                    </div>
                    <div class="col-span-4">
                        <label for="description" >Deskripsi pekerjaan</label>
                        <textarea id="description" rows="4"  placeholder="Tulis deskripsi"></textarea>                    
                    </div>
                    <div class="col-span-4">
                        <label for="requirements" >Kualifikasi pekerjaan</label>
                        <textarea id="requirements" rows="4"  placeholder="Tulis kualifikasi"></textarea>                    
                    </div>
                </div>
            </form>
            <!-- Modal footer -->
            <div class="flex items-center border-t border-gray-200 rounded-b dark:border-gray-600 p-4" >
                <div class="flex">
                    <button 
                    data-modal-hide="postJob-modal" 
                    data-modal-target="timeline-modal" 
                    data-modal-show="timeline-modal"  
                    type="button"
                    >
                        Berikutnya
                        
                        <span class="sr-only">Berikutnya</span>
                    </button>
                </div>                 
            </div>
            
        </div>
    </div>
</div>
<!-- modal timeline -->
<div id="timeline-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 right-0 left-0 z-50  justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg shadow bg-gray-50 flex flex-col h-full">
            
            <!-- Modal body -->
            <div class="p-4 md:p-5 overflow-y-auto flex-grow">
                <div  id="pathsContainer" class="relative mb-4 md:mb-5"> 
                    <div id="pathTemplate"  class="path-selection" tabindex="0" style="display: none;">
                        <div class="flex flex-wrap gap-4">
                            <div class="flex items-center justify-center w-10 h-10 z-0 bg-e73002 text-center rounded-md mb-5">
                                <span class="text-white text-base font-bold">1</span>
                            </div>
                            
                            <div class="relative flex-1 min-w-[200px] mb-5 group">
                                <input type="text" name="pathTittle" id="pathTittle"  placeholder="Masukkan Judul" required />
                                <label for="pathTittle"></label>
                            </div>
                            
                            <select class="type-selection block w-full p-2 mb-6 text-sm ">
                                <option selected>Pilih tipe</option>
                                <option value="uploudBerkas">Uploud Berkas</option>
                                <option value="meetInvitation">Meet Invitation</option>
                                <option value="Challange">Challange</option>
                            </select>
                        </div>
                        
                
                          <div class="uploud-berkas grid grid-cols-5 gap-4" style="display: none;">        
                              <form class="col-span-5">
                                  <label for="description" >Deskripsi</label>
                                  <textarea id="description" placeholder="Masukkan deskripsi seleksi"></textarea>
                              </form>
                              <div class=" col-span-2">
                                  <label  >Rentang waktu</label>
                                  <div date-rangepicker class="flex items-center">
                                      <div class="relative">
                                      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                          
                                      </div>
                                      <input name="start" type="text"  placeholder="Mulai">
                                      </div>
                                      <span class="mx-4 text-gray-500">to</span>
                                      <div class="relative">
                                      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                         
                                      </div>
                                      <input name="end" type="text"  placeholder="Selesai">
                                      </div>
                                  </div>
                              </div>
                              <div class=" col-end-6 col-span-2">
                                  <label  for="small_size">Lampiran</label>
                                  <input  id="small_size" type="file">
                              </div>
                          </div>

                          <div class="challange-selection grid grid-cols-5 gap-4" style="display: none;">  
                                  
                              <form class="col-span-5">
                                  <label for="deskripsi" >Deskripsi</label>
                                  <textarea id="deskripsi"  placeholder="Masukkan deskripsi seleksi"></textarea>
                              </form>
                              <div class="col-span-5">
                                <label for="name" >Link lampiran Challange</label>
                                <input type="text" name="name" id="name" placeholder="Masukkan lokasi atau link online meeting" required="">
                            </div>
                              <div class=" col-span-2">
                                  <label  >Rentang waktu</label>
                                  <div date-rangepicker class="flex items-center">
                                      <div class="relative">
                                      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                          
                                      </div>
                                      <input name="start" type="text"  placeholder="Mulai">
                                      </div>
                                      <span class="mx-4 text-gray-500">to</span>
                                      <div class="relative">
                                      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                          
                                      </div>
                                      <input name="end" type="text"  placeholder="Selesai">
                                      </div>
                                  </div>
                              </div>
                              <div class=" col-end-6 col-span-2">
                                  <label  for="small_size">Lampiran</label>
                                  <input  id="small_size" type="file">
                              </div>
                          </div>
                          <div class="meet-invitation-selection grid grid-cols-5 gap-4" style="display: none;">        
                              <form class="col-span-5">
                                  <label for="message" >Deskripsi</label>
                                  <textarea id="message" placeholder="Masukkan deskripsi seleksi"></textarea>
                              </form>
                              <div class="col-span-5">
                                  <label for="name" >Lokasi / Link Meeting</label>
                                  <input type="text" name="name" id="name" placeholder="Masukkan lokasi atau link online meeting" required="">
                              </div>
                              <div class="col-span-2">
                                      <label  >Rentang waktu</label>
                                      <div date-rangepicker class="flex items-center">
                                          <div class="relative">
                                          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                              
                                          </div>
                                          <input name="start" type="text"  placeholder="Mulai">
                                          </div>
                                          <span class="mx-4 text-gray-500">to</span>
                                          <div class="relative">
                                          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                              
                                          </div>
                                          <input name="end" type="text" placeholder="Selesai">
                                          </div>
                                      </div>
                              </div>
                              <div class=" col-end-6 col-span-2">
                                  <label  for="small_size">Lampiran</label>
                                  <input  id="small_size" type="file">
                              </div>
                          </div>
                         <!-- Card footer -->
                          <div class="flex justify-between items-center border-t border-gray-200 rounded-b dark:border-gray-600">
                              <div class="flex gap-2 items-center mt-2">
                                  <button type="button" class="btn-up-path ">
                                      
                                      <span class="">Up Path</span>
                                  </button>
                                  <button type="button" class="btn-down-path ">
                                      
                                      <span class="">Down Path</span>
                                  </button>
                              </div>
                              <button type="button" class="btn-delete-path mt-2 ">
                                  
                                  <span class="">Delete Path</span>
                              </button>
                          </div>
                
                      </div>
                      <button id="addPathBtn">
                          
                          Tambah Path
                      </button>
                </div>
                
            </div>
            <!-- Modal footer -->
            <div class="flex items-center border-t border-gray-200 rounded-b dark:border-gray-600 p-4" >
                <div class="flex">
                    <!-- Previous Button -->
                    <button  
                    data-modal-hide="timeline-modal" 
                    data-modal-target="postJob-modal" 
                    data-modal-show="postJob-modal"  
                    >
                        Kembali
                    </a>
                    <button data-modal-target="timeline-modal" data-modal-toggle="timeline-modal" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-positive border border-gray-300 rounded-lg hover:bg-positive-hover " type="sumbit">
                        
                        Simpan
                    </a>
                </div>                 
            </div>
        </div>
    </div>
</div>
 

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const pathsContainer = document.getElementById('pathsContainer');
        const pathTemplate = document.getElementById('pathTemplate');
        const addPathBtn = document.getElementById('addPathBtn');
    
        function updatePathNumbers() {
            const paths = pathsContainer.querySelectorAll('.path-selection');
            paths.forEach((path, index) => {
                path.querySelector('span').textContent = index;
            });
        }
    
        function addNewPath() {
            const newPath = pathTemplate.cloneNode(true);
            newPath.style.display = 'block';
            newPath.removeAttribute('id');
            pathsContainer.insertBefore(newPath, addPathBtn);
    
            const typeSelection = newPath.querySelector('.type-selection');
            typeSelection.addEventListener('change', (event) => {
                const value = event.target.value;
                newPath.querySelector('.uploud-berkas').style.display = (value === 'uploudBerkas' ? 'grid' : 'none');
                newPath.querySelector('.challange-selection').style.display = (value === 'Challange' ? 'grid' : 'none');
                newPath.querySelector('.meet-invitation-selection').style.display = (value === 'meetInvitation' ? 'grid' : 'none');
            });
    
            newPath.querySelector('.btn-up-path').addEventListener('click', () => {
                const prevSibling = newPath.previousElementSibling;
                if (prevSibling && prevSibling !== pathTemplate) {
                    pathsContainer.insertBefore(newPath, prevSibling);
                    updatePathNumbers();
                }
            });
    
            newPath.querySelector('.btn-down-path').addEventListener('click', () => {
                const nextSibling = newPath.nextElementSibling;
                if (nextSibling && nextSibling !== addPathBtn) {
                    pathsContainer.insertBefore(nextSibling, newPath);
                    updatePathNumbers();
                }
            });
    
            newPath.querySelector('.btn-delete-path').addEventListener('click', () => {
                pathsContainer.removeChild(newPath);
                updatePathNumbers();
            });
    
            updatePathNumbers();
        }
    
        addPathBtn.addEventListener('click', addNewPath);
    
        // Memanggil addNewPath pertama kali untuk menambahkan path pertama dengan nomor urut 1
        addNewPath();
    });
    </script>


</body>
