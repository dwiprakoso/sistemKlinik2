<form class="p-4 md:p-5 overflow-y-auto flex-grow" id="formSelectionPath" method="POST">
    @csrf
    <div  id="pathsContainer" class="relative mb-4 md:mb-5"> 
        <div id="pathTemplate" tabindex="0" class="path-selection mb-2 rounded-md p-2 bg-white focus:outline-none focus-within:border-l-8 focus-within:border-e73002 shadow-md" style="display: none;">
            <div class="flex flex-wrap gap-4">
                <div class="flex items-center justify-center w-10 h-10 z-0 bg-e73002 text-center rounded-md mb-5">
                    <span class="text-white text-base font-bold">1</span>
                </div>
                
                <div class="relative flex-1 min-w-[200px] mb-5 group">
                    <input type="text" name="pathTittle" id="pathTittle" class="block py-2 px-0 w-full text-base font-bold text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-e73002 peer" placeholder="Masukkan Judul" required />
                    <label for="pathTittle" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-e73002 peer-focus:dark:e73002 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"></label>
                </div>
                <select class="type-selection block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 flex-none min-w-[150px] sm:w-auto">
                    <option selected>Pilih tipe</option>
                    <option value="uploudBerkas">Uploud Berkas</option>
                    <option value="meetInvitation">Meet Invitation</option>
                    <option value="Challange">Challange</option>
                </select>
            </div>
              <div class="uploud-berkas grid grid-cols-5 gap-4" style="display: none;">        
                  <div class="col-span-5">
                      <label for="pemberkasan_deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                      <textarea id="pemberkasan_deskripsi" name="pemberkasan_deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan deskripsi seleksi"></textarea>
                  </div>
                  <div class=" col-span-2">
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Rentang waktu</label>
                      <div date-rangepicker class="flex items-center">
                          <div class="relative">
                          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                  <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                              </svg>
                          </div>
                          <input name="pemberkasan_start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mulai">
                          </div>
                          <span class="mx-4 text-gray-500">to</span>
                          <div class="relative">
                          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                  <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                              </svg>
                          </div>
                          <input name="pemberkasan_end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Selesai">
                          </div>
                      </div>
                  </div>
                  <div class=" col-end-6 col-span-2">
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">Lampiran</label>
                      <input name="lampiran_pemberkasan" class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="small_size" type="file">
                  </div>
              </div>
              <div class="challange-selection grid grid-cols-5 gap-4" style="display: none;">  
                      
                  <div class="col-span-5">
                      <label for="challange_deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                      <textarea id="challange_deskripsi" name="challange_deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan deskripsi seleksi"></textarea>
                  </div>
                  <div class="col-span-5">
                    <label for="lampiran_challange" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link lampiran Challange</label>
                    <input type="text" name="lampiran_challange" id="lampiran_challange" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan lokasi atau link online meeting" required="">
                </div>
                  <div class=" col-span-2">
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Rentang waktu</label>
                      <div date-rangepicker class="flex items-center">
                          <div class="relative">
                          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                  <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                              </svg>
                          </div>
                          <input name="challange_start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mulai">
                          </div>
                          <span class="mx-4 text-gray-500">to</span>
                          <div class="relative">
                          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                  <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                              </svg>
                          </div>
                          <input name="challange_end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Selesai">
                          </div>
                      </div>
                  </div>
                  <div class=" col-end-6 col-span-2">
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">Lampiran</label>
                      <input name="lampiran_challange" class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="small_size" type="file">
                  </div>
              </div>
              <div class="meet-invitation-selection grid grid-cols-5 gap-4" style="display: none;">        
                  <div class="col-span-5">
                      <label for="meetInvitation_deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                      <textarea id="meetInvitation_deskripsi" name="meetInvitation_deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan deskripsi seleksi"></textarea>
                  </div>
                  <div class="col-span-5">
                      <label for="meetInvitation_location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi / Link Meeting</label>
                      <input type="text" name="meetInvitation_location" id="meetInvitation_location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan lokasi atau link online meeting" required="">
                  </div>
                  <div class="col-span-2">
                          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Rentang waktu</label>
                          <div date-rangepicker class="flex items-center">
                              <div class="relative">
                              <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                      <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                  </svg>
                              </div>
                              <input name="meetInvitation_start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mulai">
                              </div>
                              <span class="mx-4 text-gray-500">to</span>
                              <div class="relative">
                              <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                      <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                  </svg>
                              </div>
                              <input name="meetInvitation_end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Selesai">
                              </div>
                          </div>
                  </div>
                  <div class=" col-end-6 col-span-2">
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">Lampiran</label>
                      <input name="lampiran_meetInvitation" class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="small_size" type="file">
                  </div>
              </div>
             <!-- Card footer -->
              <div class="flex justify-between items-center border-t border-gray-200 rounded-b dark:border-gray-600">
                  <div class="flex gap-2 items-center mt-2">
                      <button type="button" class="btn-up-path w-8 h-8 text-white hover:bg-gray-300 font-medium rounded-full text-sm flex items-center justify-center">
                          <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                          </svg>
                          <span class="sr-only">Up Path</span>
                      </button>
                      <button type="button" class="btn-down-path w-8 h-8 text-white hover:bg-gray-300 font-medium rounded-full text-sm flex items-center justify-center">
                          <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                          </svg>
                          <span class="sr-only">Down Path</span>
                      </button>
                  </div>
                  <button type="button" class="btn-delete-path mt-2 w-8 h-8 text-white hover:bg-gray-300 font-medium rounded-full text-sm flex items-center justify-center">
                      <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                      </svg>
                      <span class="sr-only">Delete Path</span>
                  </button>
              </div>
    
          </div>
          <button id="addPathBtn" class="text-gray-600 gap-2 border border-dashed inline-flex w-full justify-center hover:bg-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-md">
              <svg class="w-6 h-6  text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6"/>
              </svg>
              Tambah Path
          </button>
    </div>
</form>


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

    // Function to collect data from all paths
    function collectFormData() {
        const pathsContainer = document.getElementById('pathsContainer');
        const paths = pathsContainer.querySelectorAll('.path-selection');
        let formData = [];

        paths.forEach(path => {
            let pathData = {
                title: path.querySelector('input[name="pathTittle"]').value,
                type: path.querySelector('.type-selection').value,
                description: '',
                start: '',
                end: '',
                attachment: ''
            };

            // Check the type and collect specific data accordingly
            switch (pathData.type) {
                case 'uploudBerkas':
                    pathData.description = path.querySelector('textarea[name="pemberkasan_deskripsi"]').value;
                    pathData.start = path.querySelector('input[name="pemberkasan_start"]').value;
                    pathData.end = path.querySelector('input[name="pemberkasan_end"]').value;
                    pathData.attachment = path.querySelector('input[name="lampiran_pemberkasan"]').value;
                    break;
                case 'Challange':
                    pathData.description = path.querySelector('textarea[name="challange_deskripsi"]').value;
                    pathData.start = path.querySelector('input[name="challange_start"]').value;
                    pathData.end = path.querySelector('input[name="challange_end"]').value;
                    pathData.attachment = path.querySelector('input[name="lampiran_challange"]').value;
                    break;
                case 'meetInvitation':
                    pathData.description = path.querySelector('textarea[name="meetInvitation_deskripsi"]').value;
                    pathData.start = path.querySelector('input[name="meetInvitation_start"]').value;
                    pathData.end = path.querySelector('input[name="meetInvitation_end"]').value;
                    pathData.attachment = path.querySelector('input[name="lampiran_meetInvitation"]').value;
                    break;
            }

            formData.push(pathData);
        });

        return formData;
    }

    // Example usage:
    document.getElementById('submitButton').addEventListener('click', function() {
        const formData = collectFormData();
        console.log(formData); // Use formData as needed (e.g., send it to server)
    });

</script>