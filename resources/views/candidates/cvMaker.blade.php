<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="icon" href="{{ url('images/job-match-white.svg') }}">
    <title>Pembuat CV ATS</title>
</head>

<body class="bg-gray-50">
    @include('candidates.components.sidebar')
    <div class="sm:ml-80">
        <div class="p-6 m-4 rounded-lg shadow-lg bg-white border border-gray-200">
            <!-- Navigasi Breadcrumb -->
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard.kandidat') }}" 
                           class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-[#e73002] transition-colors duration-200">
                            <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="text-sm font-medium text-gray-500 ms-1 md:ms-2">
                                Pembuat CV ATS
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Header Section -->
            <div class="grid grid-cols-1 gap-4 mb-6">
                <div class="flex items-center p-6 rounded bg-gradient-to-r from-[#e73002] to-[#fd7d09]">
                    <div class="w-full">
                        <h2 class="mb-2 text-xl font-bold text-white">
                            Buat CV yang Lolos ATS
                        </h2>
                        <p class="text-white text-sm mb-4">
                            Buat CV yang dioptimalkan untuk sistem pelacakan kandidat (ATS) untuk meningkatkan peluang Anda dalam mendapatkan pekerjaan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Form Section -->
                <div class="md:col-span-2">
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Data Pribadi</h3>
                        
                        <form action="{{ route('dashboard.kandidat.storeCv') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap</label>
                                    <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5" required>
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5" required>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="telepon" class="block mb-2 text-sm font-medium text-gray-700">Nomor Telepon</label>
                                    <input type="number" id="telepon" name="telepon" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                                </div>
                                <div>
                                    <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-700">Domisili</label>
                                    <input type="text" id="lokasi" name="lokasi" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="ringkasan" class="block mb-2 text-sm font-medium text-gray-700">Ringkasan Profil</label>
                                <textarea id="ringkasan" name="ringkasan" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5" placeholder="Deskripsikan tentang diri Anda secara singkat"></textarea>
                            </div>

                            <h3 class="text-lg font-semibold mb-4 mt-8 text-gray-800">Pendidikan</h3>
                            <div id="pendidikan-container">
                                <div class="pendidikan-item border border-gray-200 p-4 rounded-lg mb-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-700">Gelar/Jurusan</label>
                                            <input type="text" name="pendidikan[0][gelar]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                                        </div>
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-700">Nama Institusi</label>
                                            <input type="text" name="pendidikan[0][institusi]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-700">Tahun Mulai</label>
                                            <input type="date" name="pendidikan[0][tahun_mulai]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                                        </div>
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-700">Tahun Selesai</label>
                                            <input type="date" name="pendidikan[0][tahun_selesai]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="tambah-pendidikan" class="text-[#e73002] hover:text-[#fd7d09] font-medium text-sm inline-flex items-center mb-6">
                                <svg class="w-4 h-4 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                                Tambah Pendidikan
                            </button>

                            <h3 class="text-lg font-semibold mb-4 text-gray-800">Pengalaman Kerja</h3>
                            <div id="pengalaman-container">
                                <div class="pengalaman-item border border-gray-200 p-4 rounded-lg mb-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-700">Posisi</label>
                                            <input type="text" name="pengalaman[0][posisi]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                                        </div>
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-700">Nama Perusahaan</label>
                                            <input type="text" name="pengalaman[0][perusahaan]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-700">Tanggal Mulai</label>
                                            <input type="date" name="pengalaman[0][tanggal_mulai]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                                        </div>
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-700">Tanggal Selesai</label>
                                            <input type="date" name="pengalaman[0][tanggal_selesai]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="block mb-2 text-sm font-medium text-gray-700">Deskripsi Pekerjaan</label>
                                        <textarea name="pengalaman[0][deskripsi]" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5" placeholder="Jelaskan tanggung jawab dan pencapaian Anda"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="tambah-pengalaman" class="text-[#e73002] hover:text-[#fd7d09] font-medium text-sm inline-flex items-center mb-6">
                                <svg class="w-4 h-4 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                                Tambah Pengalaman
                            </button>
                            <h3 class="text-lg font-semibold mb-4 text-gray-800">Pengalaman Organisasi</h3>
                            <div id="organisasi-container">
                                <div class="organisasi-item border border-gray-200 p-4 rounded-lg mb-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-700">Posisi</label>
                                            <input type="text" name="organisasi[0][posisi]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                                        </div>
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-700">Nama Organisasi</label>
                                            <input type="text" name="organisasi[0][organisasi]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-700">Tanggal Mulai</label>
                                            <input type="date" name="organisasi[0][tanggal_mulai]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                                        </div>
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-700">Tanggal Selesai</label>
                                            <input type="date" name="organisasi[0][tanggal_selesai]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="block mb-2 text-sm font-medium text-gray-700">Deskripsi Kegiatan</label>
                                        <textarea name="organisasi[0][deskripsi]" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5" placeholder="Jelaskan kegiatan yang dilakukan selama di organisasi"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="tambah-organisasi" class="text-[#e73002] hover:text-[#fd7d09] font-medium text-sm inline-flex items-center mb-6">
                                <svg class="w-4 h-4 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                                Tambah Pengalaman Organisasi
                            </button>

                            <h3 class="text-lg font-semibold mb-4 text-gray-800">Sertifikat</h3>
                            <div id="sertifikat-container">
                                <div class="sertifikat-item border border-gray-200 p-4 rounded-lg mb-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-700">Nama Sertifikat</label>
                                            <input type="text" name="sertifikat[0][sertifikat]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                                        </div>
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-700">Penerbit</label>
                                            <input type="text" name="sertifikat[0][penerbit]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-700">Tanggal Diterbitkan</label>
                                            <input type="date" name="sertifikat[0][tanggal_terbit]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="tambah-sertifikat" class="text-[#e73002] hover:text-[#fd7d09] font-medium text-sm inline-flex items-center mb-6">
                                <svg class="w-4 h-4 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                                Tambah Sertifikat
                            </button>

                            <h3 class="text-lg font-semibold mb-4 text-gray-800">Keterampilan</h3>
                            <div class="mb-6">
                                <div id="keahlian-container" class="border border-gray-200 p-4 rounded-lg">
                                    <div class="mb-2">
                                        <label class="block mb-2 text-sm font-medium text-gray-700">Keterampilan</label>
                                        <div class="mb-2 flex flex-wrap gap-2" id="keahlian-list">
                                            <!-- Skills will appear here as tags -->
                                        </div>
                                        <div class="flex">
                                            <input type="text" id="input-keahlian" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5" placeholder="Tambahkan keterampilan...">
                                            <button type="button" id="tambah-keahlian" class="ms-2 text-white bg-[#e73002] hover:bg-[#fd7d09] font-medium rounded-lg text-sm px-4 py-2 text-center">Tambah</button>
                                        </div>
                                        <p class="mt-2 text-xs text-gray-500">*Tambahkan kata kunci keterampilan yang relevan dengan posisi yang Anda lamar</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end mt-8">
                                <button type="submit" class="text-white bg-[#e73002] hover:bg-[#fd7d09] focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                                    <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    Buat CV
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tips Section -->
                <div class="md:col-span-1">
                    <div class="bg-orange-50 p-6 rounded-lg shadow-sm border border-orange-100">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Tips CV ATS</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-[#e73002]" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-gray-700">Gunakan kata kunci yang relevan dengan posisi yang dilamar</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-[#e73002]" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-gray-700">Gunakan format yang sederhana dan hindari tabel kompleks</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-[#e73002]" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-gray-700">Hindari header dan footer yang rumit</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-[#e73002]" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-gray-700">Gunakan nama file yang jelas (contoh: CV_NamaAnda_Posisi)</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-[#e73002]" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-gray-700">Simpan CV dalam format PDF untuk menjaga formatting</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 p-4 bg-white rounded-lg shadow-sm border border-gray-200">
                            <h4 class="text-md font-semibold mb-2 text-gray-800">Template CV ATS</h4>
                            <p class="text-sm text-gray-700 mb-4">Download template CV yang sudah dioptimalkan untuk ATS</p>
                            <a href="#" class="text-white bg-[#e73002] hover:bg-[#fd7d09] focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center">
                                <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Download Template
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    // Script untuk menambah pendidikan
    document.getElementById('tambah-pendidikan').addEventListener('click', function() {
        const container = document.getElementById('pendidikan-container');
        const pendidikanCount = container.querySelectorAll('.pendidikan-item').length;
        
        const newPendidikan = document.createElement('div');
        newPendidikan.className = 'pendidikan-item border border-gray-200 p-4 rounded-lg mb-4';
        newPendidikan.innerHTML = `
            <div class="flex justify-end mb-2">
                <button type="button" class="hapus-pendidikan text-red-500 hover:text-red-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Gelar/Jurusan</label>
                    <input type="text" name="pendidikan[${pendidikanCount}][gelar]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nama Institusi</label>
                    <input type="text" name="pendidikan[${pendidikanCount}][institusi]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Tahun Mulai</label>
                    <input type="date" name="pendidikan[${pendidikanCount}][tahun_mulai]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Tahun Selesai</label>
                    <input type="date" name="pendidikan[${pendidikanCount}][tahun_selesai]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                </div>
            </div>
        `;
        
        container.appendChild(newPendidikan);
        
        // Event listener untuk tombol hapus
        newPendidikan.querySelector('.hapus-pendidikan').addEventListener('click', function() {
            container.removeChild(newPendidikan);
        });
    });
    
    // Script untuk menambah pengalaman kerja
    document.getElementById('tambah-pengalaman').addEventListener('click', function() {
        const container = document.getElementById('pengalaman-container');
        const pengalamanCount = container.querySelectorAll('.pengalaman-item').length;
        
        const newPengalaman = document.createElement('div');
        newPengalaman.className = 'pengalaman-item border border-gray-200 p-4 rounded-lg mb-4';
        newPengalaman.innerHTML = `
            <div class="flex justify-end mb-2">
                <button type="button" class="hapus-pengalaman text-red-500 hover:text-red-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Posisi</label>
                    <input type="text" name="pengalaman[${pengalamanCount}][posisi]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nama Perusahaan</label>
                    <input type="text" name="pengalaman[${pengalamanCount}][perusahaan]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Mulai</label>
                    <input type="date" name="pengalaman[${pengalamanCount}][tanggal_mulai]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Selesai</label>
                    <input type="date" name="pengalaman[${pengalamanCount}][tanggal_selesai]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                </div>
            </div>
            <div class="mb-2">
                <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi Pekerjaan</label>
                <textarea name="pengalaman[${pengalamanCount}][deskripsi]" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5" placeholder="Jelaskan tanggung jawab dan pencapaian Anda"></textarea>
            </div>
        `;
        
        container.appendChild(newPengalaman);
        
        // Event listener untuk tombol hapus
        newPengalaman.querySelector('.hapus-pengalaman').addEventListener('click', function() {
            container.removeChild(newPengalaman);
        });
    });
    // Script untuk menambah pengalaman organisasi
    document.getElementById('tambah-organisasi').addEventListener('click', function() {
        const container = document.getElementById('organisasi-container');
        const organisasiCount = container.querySelectorAll('.organisasi-item').length;
        
        const newOrganisasi = document.createElement('div');
        newOrganisasi.className = 'organisasi-item border border-gray-200 p-4 rounded-lg mb-4';
        newOrganisasi.innerHTML = `
            <div class="flex justify-end mb-2">
                <button type="button" class="hapus-organisasi text-red-500 hover:text-red-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Posisi</label>
                    <input type="text" name="organisasi[${organisasiCount}][posisi]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Nama Organisasi</label>
                    <input type="text" name="organisasi[${organisasiCount}][organisasi]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Tanggal Mulai</label>
                    <input type="date" name="organisasi[${organisasiCount}][tanggal_mulai]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Tanggal Selesai</label>
                    <input type="date" name="organisasi[${organisasiCount}][tanggal_selesai]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                </div>
            </div>
            <div class="mb-2">
                <label class="block mb-2 text-sm font-medium text-gray-700">Deskripsi Kegiatan</label>
                <textarea name="organisasi[${organisasiCount}][deskripsi]" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5" placeholder="Jelaskan kegiatan yang dilakukan selama di organisasi"></textarea>
            </div>
        `;
        
        container.appendChild(newOrganisasi);
        
        // Event listener untuk tombol hapus
        newOrganisasi.querySelector('.hapus-organisasi').addEventListener('click', function() {
            container.removeChild(newOrganisasi);
        });
    });
    // Script untuk menambah sertifikat
    document.getElementById('tambah-sertifikat').addEventListener('click', function() {
        const container = document.getElementById('sertifikat-container');
        const sertifikatCount = container.querySelectorAll('.sertifikat-item').length;
        
        const newSertifikat = document.createElement('div');
        newSertifikat.className = 'sertifikat-item border border-gray-200 p-4 rounded-lg mb-4';
        newSertifikat.innerHTML = `
            <div class="flex justify-end mb-2">
                <button type="button" class="hapus-sertifikat text-red-500 hover:text-red-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Nama Sertifikat</label>
                    <input type="text" name="sertifikat[${sertifikatCount}][sertifikat]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Penerbit</label>
                    <input type="text" name="sertifikat[${sertifikatCount}][penerbit]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Tanggal Diterbitkan</label>
                    <input type="date" name="sertifikat[${sertifikatCount}][tanggal_terbit]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#e73002] focus:border-[#e73002] block w-full p-2.5">
                </div>
            </div>
        `;
        
        container.appendChild(newSertifikat);
        
        // Event listener untuk tombol hapus
        newSertifikat.querySelector('.hapus-sertifikat').addEventListener('click', function() {
            container.removeChild(newSertifikat);
        });
    });
    // Script untuk menambah keterampilan/keahlian
    document.getElementById('tambah-keahlian').addEventListener('click', function() {
        const inputKeahlian = document.getElementById('input-keahlian');
        const keahlianList = document.getElementById('keahlian-list');
        
        if (inputKeahlian.value.trim() !== '') {
            // Membuat tag keterampilan baru
            const keahlianTag = document.createElement('div');
            keahlianTag.className = 'flex items-center bg-orange-100 text-orange-800 text-sm font-medium px-2.5 py-0.5 rounded';
            
            // Menambahkan teks keterampilan
            const keahlianText = document.createElement('span');
            keahlianText.textContent = inputKeahlian.value.trim();
            keahlianTag.appendChild(keahlianText);
            
            // Menambahkan input hidden untuk menyimpan nilai
            const keahlianInput = document.createElement('input');
            keahlianInput.type = 'hidden';
            keahlianInput.name = 'keahlian[]';
            keahlianInput.value = inputKeahlian.value.trim();
            keahlianTag.appendChild(keahlianInput);
            
            // Menambahkan tombol hapus
            const hapusButton = document.createElement('button');
            hapusButton.type = 'button';
            hapusButton.className = 'ml-1.5 text-orange-800 hover:text-orange-900';
            hapusButton.innerHTML = `
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            `;
            
            // Event listener untuk menghapus tag
            hapusButton.addEventListener('click', function() {
                keahlianList.removeChild(keahlianTag);
            });
            
            keahlianTag.appendChild(hapusButton);
            
            // Menambahkan tag ke daftar
            keahlianList.appendChild(keahlianTag);
            
            // Mengosongkan input
            inputKeahlian.value = '';
            inputKeahlian.focus();
        }
    });
    
    // Event listener untuk input keahlian dengan tombol Enter
    document.getElementById('input-keahlian').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            document.getElementById('tambah-keahlian').click();
        }
    });
    
    // Mode gelap (dark mode) toggle
    if (localStorage.getItem('color-theme') === 'light' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: light)').matches)) {
        document.documentElement.classList.add('light');
    } else {
        document.documentElement.classList.remove('light');
    }
    
    // Membuat handler untuk validasi form sebelum submit
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Melakukan validasi
        const nama = document.getElementById('nama').value.trim();
        const email = document.getElementById('email').value.trim();
        
        if (nama === '') {
            alert('Nama lengkap harus diisi!');
            document.getElementById('nama').focus();
            return false;
        }
        
        if (email === '') {
            alert('Email harus diisi!');
            document.getElementById('email').focus();
            return false;
        }
        
        // Jika validasi berhasil, kirim form
        // Di sini Anda bisa menambahkan kode untuk mengirim form lewat AJAX atau langsung submit
        alert('CV sedang diproses!');
        
        // Untuk demo, kita bisa menuju ke halaman "hasil" jika tersedia

        
        // Atau submit form jika endpoint sudah siap
        this.submit();
    });
</script>
</html>