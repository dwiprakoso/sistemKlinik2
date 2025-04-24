<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>Selection Process</title>
</head>
<body>
@include('recruiter.components.sidebar')
<div class="sm:ml-80">
<!-- Struktur HTML untuk form dinamis -->
<div id="pathsContainer">
    <div id="pathTemplate" style="display: none;">
        <span>0</span>
        <select class="type-selection">
            <option value="">Select Type</option>
            <option value="uploudBerkas">Upload Berkas</option>
            <option value="Challange">Challenge</option>
            <option value="meetInvitation">Meet Invitation</option>
        </select>
        <div class="uploud-berkas" style="display: none;">
            <input type="file" name="fileUpload">
        </div>
        <div class="challange-selection" style="display: none;">
            <input type="text" name="challengeText" placeholder="Challenge Text">
        </div>
        <div class="meet-invitation-selection" style="display: none;">
            <input type="date" name="meetDate">
        </div>
        <button class="btn-up-path">Up</button>
        <button class="btn-down-path">Down</button>
        <button class="btn-delete-path">Delete</button>
    </div>
</div>
<button id="addPathBtn">Add Path</button>
<button id="submitBtn">Submit</button>
</div>


<script>
// Fungsi untuk mengambil semua nilai dari paths
function getPathsData() {
    const pathsContainer = document.getElementById('pathsContainer');
    const paths = pathsContainer.querySelectorAll('.path-selection');
    let pathsData = [];

    paths.forEach((path, index) => {
        let pathData = {
            pathNumber: index + 1, // Nomor urut path
            type: '',
            data: {}
        };

        const typeSelection = path.querySelector('.type-selection').value;
        pathData.type = typeSelection;

        // Ambil data berdasarkan tipe yang dipilih
        switch (typeSelection) {
            case 'uploudBerkas':
                const fileInput = path.querySelector('.uploud-berkas input[type="file"]');
                pathData.data = fileInput ? fileInput.files[0] : null; // Jika ada file, ambil file pertama
                break;
            case 'Challange':
                const challengeInput = path.querySelector('.challange-selection input[type="text"]');
                pathData.data = challengeInput ? challengeInput.value : '';
                break;
            case 'meetInvitation':
                const meetDateInput = path.querySelector('.meet-invitation-selection input[type="date"]');
                pathData.data = meetDateInput ? meetDateInput.value : '';
                break;
        }

        pathsData.push(pathData);
    });

    return pathsData;
}

// Tambahkan event listener pada tombol submit
document.getElementById('submitBtn').addEventListener('click', () => {
    const pathsData = getPathsData();
    console.log(pathsData);
    // Anda bisa memproses pathsData lebih lanjut atau mengirimnya ke server
});


</script>


</body>
