@extends('pasien.components.layout')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Poli</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('dokter.updateProfil') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama">No RM</label>
                    <input type="text" name="nama" class="form-control" value="{{ $user->no_rm }}" readonly/>
                    @error('nama') <span class="text-danger">{{ $message }} </span> @enderror
                </div>
                <div class="mb-3">
                    <label for="nama">Pilih Poli</label>
                    <div class="mb-3">
                        <label for="id_poli">Pilih Poli</label>
                        <select name="id_poli" id="id_poli" class="form-control">
                            <option value="">-- Pilih Poli --</option>
                            @foreach ($polis as $poli)
                                <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('id_poli') <span class="text-danger">{{ $message }} </span> @enderror

                </div>
                
                <div class="mb-3">
                    <label for="id_jadwal">Pilih Jadwal</label>
                    <select name="id_jadwal" id="id_jadwal" class="form-control">
                        <option value="">-- Pilih Jadwal --</option>
                        <!-- Jadwal dokter akan dimuat melalui AJAX -->
                    </select>
                    @error('id_jadwal') <span class="text-danger">{{ $message }} </span> @enderror
                </div>
                
                <!-- Menampilkan Jadwal Dokter setelah dipilih -->
                <div id="jadwalDokterContainer"></div>
                
                <div class="mb-3">
                    <label for="no_hp">Keluhan</label>
                    <textarea name="keluhan" id="" cols="30" rows="10" class="form-control"></textarea>
                    {{-- <input type="text-area" name="no_hp" class="form-control" /> --}}
                    @error('no_hp') <span class="text-danger">{{ $message }} </span> @enderror
                </div>
            
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- Menambahkan jQuery dan Script untuk AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#id_poli').change(function() {
            var id_poli = $(this).val();  // Ambil id_poli yang dipilih

            // Jika id_poli ada
            if (id_poli) {
                // Kirim request AJAX untuk mendapatkan jadwal dokter berdasarkan poli yang dipilih
                $.ajax({
                    url: '{{ route("pasien.daftarPoli") }}',  // Pastikan route sesuai
                    type: 'GET',
                    data: { id_poli: id_poli },  // Kirim id_poli ke server
                    success: function(data) {
                        // Kosongkan dropdown jadwal dokter terlebih dahulu
                        $('#id_jadwal').empty().append('<option value="">-- Pilih Jadwal --</option>');

                        // Cek jika ada data jadwal dokter
                        if (data.length > 0) {
                            $.each(data, function(index, jadwal) {
                                // Render data jadwal dokter ke dropdown
                                $('#id_jadwal').append(
                                    '<option value="' + jadwal.id + '">' +
                                        jadwal.dokter.nama + ' - ' + jadwal.hari + 
                                        ' (' + jadwal.jam_mulai + ' - ' + jadwal.jam_selesai + ')' +
                                    '</option>'
                                );
                            });
                        } else {
                            // Jika tidak ada jadwal, tampilkan pesan
                            $('#id_jadwal').append('<option value="">Tidak ada jadwal untuk poli ini.</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Menampilkan status dan error response
                        console.log("Status: " + status);  // Menampilkan status response
                        console.log("Error: " + error);  // Menampilkan pesan error
                        console.log(xhr.responseText);  // Menampilkan response dari server
                        alert('Terjadi kesalahan dalam memuat data.');
                    }
                });
            } else {
                // Jika poli tidak dipilih, kosongkan dropdown jadwal dokter
                $('#id_jadwal').empty().append('<option value="">-- Pilih Jadwal --</option>');
            }
        });
    });
</script>


@endsection
