document.addEventListener('DOMContentLoaded', function() {
    // Element untuk container tahapan
    const pathContainer = document.querySelector('.path-container');
    // Template tahapan
    const pathTemplate = document.getElementById('path-template');
    // Template custom field
    const customFieldTemplate = document.getElementById('custom-field-template');
    // Tombol tambah tahapan
    const addPathBtn = document.getElementById('add-path-btn');
    // Form utama
    const jobPortalForm = document.getElementById('jobPortalForm');
    
    // Counter untuk tahapan dan custom field
    let pathCounter = 0;
    let customFieldCounters = {};
    
    // Fungsi untuk menambah tahapan baru
    function addNewPath() {
        // Salin template
        const pathNode = document.importNode(pathTemplate.content, true);
        
        // Ganti placeholder dengan nilai sebenarnya
        replaceTemplateValues(pathNode, {
            __ORDER__: pathCounter + 1,
            __TITLE__: 'Tahapan ' + (pathCounter + 1),
            __INDEX__: pathCounter
        });
        
        // Inisialisasi custom field counter untuk tahapan ini
        customFieldCounters[pathCounter] = 0;
        
        // Tambahkan ke container
        pathContainer.appendChild(pathNode);
        
        // Setup event listener untuk tipe tahapan
        setupPathTypeListener(pathCounter);
        
        // Setup event listener untuk tombol delete
        setupDeletePathButton(pathCounter);
        
        // Setup event listener untuk tombol move up/down
        setupMoveButtons();
        
        // Setup event listener untuk tombol tambah custom field
        setupAddCustomFieldButton(pathCounter);
        
        // Increment counter
        pathCounter++;
        
        // Update urutan semua tahapan
        updatePathOrder();
    }
    
    // Fungsi untuk mengganti placeholder pada template
    function replaceTemplateValues(node, replacements) {
        // Ganti placeholder di atribut
        Array.from(node.querySelectorAll('*')).forEach(el => {
            Array.from(el.attributes).forEach(attr => {
                Object.keys(replacements).forEach(placeholder => {
                    if (attr.value.includes(placeholder)) {
                        attr.value = attr.value.replace(new RegExp(placeholder, 'g'), replacements[placeholder]);
                    }
                });
            });
            
            // Ganti placeholder di text content
            if (el.textContent) {
                Object.keys(replacements).forEach(placeholder => {
                    if (el.textContent.includes(placeholder)) {
                        el.textContent = el.textContent.replace(new RegExp(placeholder, 'g'), replacements[placeholder]);
                    }
                });
            }
        });
    }
    
    // Fungsi untuk setup event listener pada select tipe tahapan
    function setupPathTypeListener(index) {
        const pathItem = document.querySelector(`.path-item:nth-child(${index + 1})`);
        if (!pathItem) return;
        
        const pathType = pathItem.querySelector('.path-type-select');
        const meetingChallengeFields = pathItem.querySelector('.meeting-challenge-fields');
        const customFields = pathItem.querySelector('.custom-fields');
        
        pathType.addEventListener('change', function() {
            // Sembunyikan semua field khusus terlebih dahulu
            meetingChallengeFields.style.display = 'none';
            customFields.style.display = 'none';
            
            // Tampilkan field sesuai tipe tahapan
            if (this.value === '2' || this.value === '3') { // Meeting atau Challenge
                meetingChallengeFields.style.display = 'block';
            } else if (this.value === '4') { // Custom
                customFields.style.display = 'block';
            }
        });
    }
    
    // Fungsi untuk setup tombol hapus tahapan
    function setupDeletePathButton(index) {
        const pathItem = document.querySelector(`.path-item:nth-child(${index + 1})`);
        if (!pathItem) return;
        
        const deleteBtn = pathItem.querySelector('.delete-path-btn');
        
        deleteBtn.addEventListener('click', function() {
            // Konfirmasi penghapusan
            if (confirm('Apakah Anda yakin ingin menghapus tahapan ini?')) {
                const pathItem = this.closest('.path-item');
                pathItem.remove();
                
                // Update urutan semua tahapan
                updatePathOrder();
            }
        });
    }
    
    // Fungsi untuk setup tombol move up/down
    function setupMoveButtons() {
        // Tombol move up
        document.querySelectorAll('.move-up-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const pathItem = this.closest('.path-item');
                const prevPathItem = pathItem.previousElementSibling;
                
                if (prevPathItem) {
                    pathContainer.insertBefore(pathItem, prevPathItem);
                    updatePathOrder();
                }
            });
        });
        
        // Tombol move down
        document.querySelectorAll('.move-down-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const pathItem = this.closest('.path-item');
                const nextPathItem = pathItem.nextElementSibling;
                
                if (nextPathItem) {
                    pathContainer.insertBefore(nextPathItem, pathItem);
                    updatePathOrder();
                }
            });
        });
    }
    
    // Fungsi untuk update urutan tahapan
    function updatePathOrder() {
        const pathItems = document.querySelectorAll('.path-item');
        
        pathItems.forEach((item, index) => {
            // Update nomor urutan
            const orderElement = item.querySelector('[order]');
            if (orderElement) {
                orderElement.setAttribute('order', index + 1);
                orderElement.textContent = `Tahapan ${index + 1}`;
            }
            
            // Update semua input name untuk menyesuaikan index
            updateInputNames(item, index);
        });
    }
    
    // Fungsi untuk update nama input
    function updateInputNames(pathItem, newIndex) {
        const inputs = pathItem.querySelectorAll('input, select, textarea');
        
        inputs.forEach(input => {
            if (input.name) {
                // Ambil indeks lama dari nama input
                const match = input.name.match(/paths\[(\d+)\]/);
                if (match) {
                    const oldIndex = match[1];
                    // Ganti indeks lama dengan yang baru
                    input.name = input.name.replace(`paths[${oldIndex}]`, `paths[${newIndex}]`);
                    
                    // Update ID jika perlu
                    if (input.id && input.id.includes(`__${oldIndex}`)) {
                        input.id = input.id.replace(`__${oldIndex}`, `__${newIndex}`);
                    }
                }
            }
        });
    }
    
    // Fungsi untuk setup tombol tambah custom field
    function setupAddCustomFieldButton(index) {
        const pathItem = document.querySelector(`.path-item:nth-child(${index + 1})`);
        if (!pathItem) return;
        
        const addCustomFieldBtn = pathItem.querySelector('.add-custom-field-btn');
        const customFieldsContainer = pathItem.querySelector('.custom-fields-container');
        
        addCustomFieldBtn.addEventListener('click', function() {
            // Salin template
            const fieldNode = document.importNode(customFieldTemplate.content, true);
            
            // Ganti placeholder dengan nilai sebenarnya
            replaceTemplateValues(fieldNode, {
                __INDEX__: index,
                __FIELD_INDEX__: customFieldCounters[index]
            });
            
            // Tambahkan ke container
            customFieldsContainer.appendChild(fieldNode);
            
            // Setup tombol hapus field
            setupDeleteCustomFieldButton(index, customFieldCounters[index]);
            
            // Increment counter
            customFieldCounters[index]++;
        });
    }
    
    // Fungsi untuk setup tombol hapus custom field
    function setupDeleteCustomFieldButton(pathIndex, fieldIndex) {
        const pathItem = document.querySelector(`.path-item:nth-child(${pathIndex + 1})`);
        if (!pathItem) return;
        
        const customFieldItem = pathItem.querySelector(`.custom-field-item:nth-child(${fieldIndex + 1})`);
        if (!customFieldItem) return;
        
        const deleteBtn = customFieldItem.querySelector('.delete-custom-field-btn');
        
        deleteBtn.addEventListener('click', function() {
            const fieldItem = this.closest('.custom-field-item');
            fieldItem.remove();
            
            // Update urutan dan nama input field custom
            updateCustomFieldsOrder(pathIndex);
        });
    }
    
    // Fungsi untuk update urutan custom field
    function updateCustomFieldsOrder(pathIndex) {
        const pathItem = document.querySelector(`.path-item:nth-child(${pathIndex + 1})`);
        if (!pathItem) return;
        
        const customFieldItems = pathItem.querySelectorAll('.custom-field-item');
        
        customFieldItems.forEach((item, index) => {
            // Update semua input name untuk menyesuaikan index
            const inputs = item.querySelectorAll('input, select');
            
            inputs.forEach(input => {
                if (input.name) {
                    // Ambil indeks lama dari nama input
                    const match = input.name.match(/paths\[\d+\]\[custom_fields\]\[(\d+)\]/);
                    if (match) {
                        const oldIndex = match[1];
                        // Ganti indeks lama dengan yang baru
                        input.name = input.name.replace(`[custom_fields][${oldIndex}]`, `[custom_fields][${index}]`);
                    }
                }
            });
        });
    }

    // Validasi form saat submit
    if (jobPortalForm) {
        jobPortalForm.addEventListener('submit', function(event) {
            // Cek apakah user sudah menambahkan minimal 1 tahapan
            const pathItems = document.querySelectorAll('.path-item');
            if (pathItems.length === 0) {
                event.preventDefault();
                alert('Anda harus menambahkan minimal 1 tahapan seleksi!');
                
                // Buka modal tahapan jika belum terbuka
                const timelineModal = document.getElementById('timeline-modal');
                if (!timelineModal.classList.contains('flex')) {
                    document.querySelector('[data-modal-target="timeline-modal"]').click();
                }
                return false;
            }
            
            // Validasi input untuk setiap tahapan
            let isValid = true;
            pathItems.forEach((item, index) => {
                const pathType = item.querySelector('.path-type-select');
                if (!pathType.value) {
                    event.preventDefault();
                    alert(`Silakan pilih jenis tahapan untuk Tahapan ${index + 1}`);
                    isValid = false;
                    return;
                }
                
                const pathName = item.querySelector(`[name="paths[${index}][path_name]"]`);
                if (!pathName.value.trim()) {
                    event.preventDefault();
                    alert(`Silakan isi judul untuk Tahapan ${index + 1}`);
                    isValid = false;
                    return;
                }
                
                // Validasi khusus berdasarkan tipe
                if ((pathType.value === '2' || pathType.value === '3') && 
                    item.querySelector(`[name="paths[${index}][link_lokasi]"]`) && 
                    !item.querySelector(`[name="paths[${index}][link_lokasi]"]`).value.trim()) {
                    event.preventDefault();
                    alert(`Silakan isi link/lokasi untuk Tahapan ${index + 1}`);
                    isValid = false;
                    return;
                }
            });
            
            return isValid;
        });
    }
    
    // Event listener untuk tombol tambah tahapan
    addPathBtn.addEventListener('click', addNewPath);
    
    // Tambahkan tahapan pertama secara default
    addNewPath();
}
);