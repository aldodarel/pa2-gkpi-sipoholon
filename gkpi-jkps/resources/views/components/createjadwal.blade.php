<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.jadwal') }} 
            @elseif ($navbars == StaticVariable::$navbarPendeta) 
                {{ route('pendeta.jadwal') }} @elseif ($navbars == StaticVariable::$navbarPenatua) 
                {{ route('penatua.jadwal') }} @endif"
                    class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> <!-- Ikon dari Font Awesome -->
                    <span>Kembali</span>
</a>
<br></br>

<div class="row">
    <div class="col-md">
        <div class="header-body text-left mt-2 mb-4">
            <div class="row justify-content">
                <div class="row col-lg-12 col-md-4 border-bottom">
                    <div class="col">
                        <h2 class="">Tambah Jadwal Ibadah</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 p-3 bg-white shadow rounded">

    {{-- TODO: Controller not ready yet --}}
    <form class="mt-3" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 col-md-6 mt-3">
                <label class="form-control-label" for="name">Nama Jadwal</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    placeholder="" value="{{ old('name') }}" required>
                @error('name')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label class="form-control-label" for="tanggal">Tanggal</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="Masukkan Tanggal ..." value="{{ old('tanggal') }}" min="{{ now()->toDateString() }}" required>
                @error('tanggal')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label class="form-control-label" for="waktu">Pukul</label>
                <input type="time" class="form-control @error('waktu') is-invalid @enderror" name="waktu"
                    placeholder="Masukkan Tanggal ..." value="{{ old('tanggal') }}" required>
                @error('waktu')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label class="form-control-label" for="jumlah_hadir">Jumlah Hadir</label>
                <input type="number" class="form-control @error('jumlah_hadir') is-invalid @enderror"
                    name="jumlah_hadir" id="jumlah_hadir" placeholder="" value="{{ old('jumlah_hadir') }}" min="0">
                @error('jumlah_hadir')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label class="form-control-label" for="jenis">Jenis Ibadah </label>
                <select name="jenis" id="jenis" class="form-control" required>
                    <option disabled selected>Pilih jenis ibadah</option>
                    <option value="Mingguan">Mingguan</option>
                    <option value="Mingguan">Sektor</option>
                    <option value="Situasional">Situasional</option>
                    <option value="Dukacita">Dukacita</option>
                    <option value="Sakramen">Sakramen</option>
                </select>
                @error('jenis')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="lampiran">Lampiran Tata Ibadah</label>
                <div class="alert alert-info mt-2 d-flex align-items-center" role="alert">
                    <i class="fas fa-info-circle mr-2"></i>
                    <span>Ekstensi lampiran tata ibadah yang diperbolehkan: PDF</span>
                </div>
                <input type="file" class="form-control @error('lampiran') is-invalid @enderror" name="lampiran[]"
                    class="form-control" id="lampiran" value="{{ old('lampiran') }}" multiple>
                @error('lampiran')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12 col-md-6 mt-4">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
            </div>
        </div>
    </form>
</div>
<script>
    // Mendapatkan referensi input jumlah hadir
    const jumlahHadirInput = document.getElementById('jumlah_hadir');

    // Menambahkan event listener untuk memvalidasi nilai pada event input dan change
    jumlahHadirInput.addEventListener('input', validateInput);
    jumlahHadirInput.addEventListener('change', validateInput);

    // Fungsi untuk memvalidasi nilai input
    function validateInput(event) {
        let value = parseInt(event.target.value); // Mendapatkan nilai input sebagai angka

        // Jika nilai input negatif, ubah menjadi positif
        if (value < 0 || isNaN(value)) {
            value = Math.abs(value); // Ubah menjadi positif
            jumlahHadirInput.value = value; // Update nilai input
        }
    }
</script>

