<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@if($navbars == StaticVariable::$navbarPengurusHarian)
    <a href="{{ route('pengurusharian.dataPembagianPersembahanIbadah') }} "
        class="btn btn-primary">
        <i class="fa fa-arrow-left"></i>
        <span>Kembali</span>
    </a>
@elseif ($navbars == StaticVariable::$navbarPendeta)
    <a href="{{ route('pendeta.dataPembagianPersembahanIbadah') }} "
        class="btn btn-primary">
        <i class="fa fa-arrow-left"></i>
        <span>Kembali</span>
    </a>
@endif
<br><br>

<?php
$header_title = 'Form Ubah Data Keuangan';
?>
<div class="col-12 p-3 bg-white shadow rounded">
    <form class="mt-3" action="" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Bagian Baru untuk Pembagian Persentase -->
        <h3 class="mt-5">Pembagian Persentase ke Kas</h3>
        <div class="row">
            @foreach($kasList as $kas)
    <div class="form-group col-12 col-md-6 mt-3">
        @php
            $id_kas = $kas->id;
        @endphp
        <label for="kas_{{ $id_kas }}">{{ $kas->nama_kas }} (%)</label>
        <input type="number" name="kas[{{ $id_kas }}]" id="kas_{{ $id_kas }}" class="form-control kas-persentase" min="0" max="100"
            value="{{ isset($kas) ? $kas->pembagian : 0 }}" required>
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
    document.querySelectorAll(".kas-persentase").forEach(input => {
        input.addEventListener("input", function() {
            if (this.value < 0) {
                this.value = ""; // Mengosongkan nilai input jika kurang dari atau sama dengan nol
            }
            validatePersentase();
        });
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

    // Inisialisasi validasi saat halaman pertama kali dimuat
    validatePersentase();
</script>
