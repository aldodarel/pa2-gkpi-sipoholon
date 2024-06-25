<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@if ($navbars == StaticVariable::$navbarPengurusHarian)
    <a href="{{ $keuangan->jenis_keuangan == 'Pemasukan' ? route('pengurusharian.dataPemasukanPersembahanIbadah') : route('pengurusharian.dataPengeluaranPersembahanIbadah') }}"
        class="btn btn-primary">
        <i class="fa fa-arrow-left"></i>
        <span>Kembali</span>
    </a>
@elseif ($navbars == StaticVariable::$navbarPendeta)
    <a href="{{ $keuangan->jenis_keuangan == 'Pemasukan' ? route('pendeta.dataPemasukanPersembahanIbadah') : route('pendeta.dataPengeluaranPersembahanIbadah') }}"
        class="btn btn-primary">
        <i class="fa fa-arrow-left"></i>
        <span>Kembali</span>
    </a>
@endif
<br><br>

<?php
$header_title = 'Form Ubah Data Keuangan';
// Indeks data kas berdasarkan kombinasi id_keuangan dan id_kas
$kases = $kases; // Data kases sudah difilter di controller
?>
<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    <form class="mt-3" action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            @if($keuangan->jenis_keuangan == 'Pemasukan')
                <div class="form-group col-12 col-md-6 mt-3">
                    <label for="keterangan" id="label_keterangan">Keterangan</label>
                    <select name="keterangan" id="selectKeterangan" class="form-control" required>
                        <option value="Sekolah Minggu" {{ $keuangan->keterangan == 'Sekolah Minggu' ? 'selected' : '' }}>Sekolah Minggu</option>
                        <option value="Minggu Umum" {{ $keuangan->keterangan == 'Minggu Umum' ? 'selected' : '' }}>Minggu Umum</option>
                        <option value="Partangiangan Sektor" {{ $keuangan->keterangan == 'Partangiangan Sektor' ? 'selected' : '' }}>Partangiangan Sektor</option>
                        <option value="Partangiangan PP dan Remaja" {{ $keuangan->keterangan == 'Partangiangan PP dan Remaja' ? 'selected' : '' }}>Partangiangan PP dan Remaja</option>
                        <option value="Ina Debora" {{ $keuangan->keterangan == 'Ina Debora' ? 'selected' : '' }}>Ina Debora</option>
                        <option value="Gemende" {{ $keuangan->keterangan == 'Gemende' ? 'selected' : '' }}>Gemende</option>
                    </select>
                </div>
            @else
                <div class="form-group col-12 col-md-6 mt-3" id="keteranganTextInput">
                    <label for="keterangan" id="label_keterangan">Keterangan</label>
                    <input type="text" name="keterangan" id="textKeterangan" class="form-control" value="{{ $keuangan->keterangan }}" required>
                </div>
            @endif
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control"
                    value="{{ $keuangan->tanggal }}" max="{{ date('Y-m-d') }}" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nominal">Nominal(Rp)</label>
                <input type="number" name="nominal" id="nominal" class="form-control"
                    value="{{ $keuangan->nominal }}" required>
            </div>
        </div>

        <!-- Bagian Baru untuk Pembagian Persentase -->
        <h3 class="mt-5">Pembagian Persentase ke Kas</h3>
        <div class="row">
            @foreach($kasList as $kas)
    <div class="form-group col-12 col-md-6 mt-3">
        @php
            $id_kas = $kas->id;
            $key = $keuangan->id . '_' . $id_kas;
        @endphp
        <label for="kas_{{ $id_kas }}">{{ $kas->nama_kas }} (%)</label>
        <input type="number" name="kas[{{ $id_kas }}]" id="kas_{{ $id_kas }}" class="form-control kas-persentase" min="0" max="100"
            value="{{ isset($kases[$key]) ? $kases[$key]->pembagian : 0 }}" required>
    </div>
@endforeach


        
        </div>
        <div class="form-group mt-3">
            <label>Total Persentase: <span id="totalPersentase">0%</span></label>
        </div>
        <div class="form-group mt-3">
            <p id="persentaseError" style="color:red; display:none;">Total persentase harus mencapai 100%.</p>
        </div>
        <div class="col-12 col-md-6 mt-5">
            <button type="submit" id="submitBtn" class="btn btn-success" disabled>
                Simpan
            </button>
        </div>
    </form>
</div>

<script>
    // Memastikan input tidak bernilai minus atau nol
    document.getElementById("nominal").addEventListener("input", function() {
        var nominalInput = document.getElementById("nominal");
        if (nominalInput.value < 0) {
            nominalInput.value = ""; // Mengosongkan nilai input jika kurang dari atau sama dengan nol
        }
    });

    // Validasi Persentase Pembagian ke Kas
    const kasInputs = document.querySelectorAll(".kas-persentase");
    const totalPersentaseElem = document.getElementById("totalPersentase");
    const submitBtn = document.getElementById("submitBtn");
    const persentaseError = document.getElementById("persentaseError");

    function validatePersentase() {
        let totalPersentase = 0;
        kasInputs.forEach(input => {
            totalPersentase += parseFloat(input.value) || 0;
        });

        totalPersentaseElem.textContent = totalPersentase + '%';

        if (totalPersentase === 100) {
            persentaseError.style.display = 'none';
            submitBtn.disabled = false;
        } else {
            persentaseError.style.display = 'block';
            submitBtn.disabled = true;
        }
    }

    kasInputs.forEach(input => {
        input.addEventListener('input', validatePersentase);
    });

    // Inisialisasi validasi saat halaman pertama kali dimuat
    validatePersentase();
</script>
