<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<?php
$header_title = 'Form Tambah Data Keuangan';
?>
<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    {{-- TODO: Controller not ready yet --}}
    <form class="mt-3" action="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.formproseskeuangan', ['id_user' => StaticVariable::$user->nik]) }} @elseif($navbars == StaticVariable::$navbarPendeta) {{ route('pendeta.formproseskeuangan', ['id_user' => StaticVariable::$user->nik])}} @endif" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="row">
                <div class="form-group
                       col-12 col-md-6 mt-3">
                   <label for="jenis_keuangan">Jenis Tranksaksi</label>
                   <select name="jenis_keuangan" id="jenis_keuangan" class="form-control" onchange="changeInputType()">
                       <option disabled selected>Silahkan Pilih Jenis Tranksaksi</option>
                       <option value="Pemasukan">Pemasukan</option>
                       <option value="Pengeluaran">Pengeluaran</option>
                   </select>
               </div>
               <div class="form-group col-12 col-md-6 mt-3">
                   <label for="kategori">Kategori</label>
                   <select name="kategori" id="kategori" class="form-control" onchange="changeInputType()" required>
                       <option disabled selected>Silahkan Pilih Kategori</option>
                       <option value="Persembahan">Persembahan</option>
                       <option value="Persembahan Bulanan">Persembahan Bulanan</option>
                       <option value="Ucapan Syukur">Ucapan Syukur</option>
                       <option value="Diakoni Sosial">Diakoni Sosial</option>
                       <!-- Tambahkan opsi dari nama kas -->
                        @foreach ($kas as $item)
                        <option class="kas-option" value="{{ $item->id }}" style="display: none;">{{ $item->nama_kas }}</option>
                        @endforeach
                   </select>
                   {{-- <script type="text/javascript">
                       $(document).ready(function() {
                           $('#kategori').select2();
                       });
                   </script> --}}
   
               </div>
            <div class="form-group col-12 col-md-6 mt-3" id="noKkSelectInput" style="display: none;">
                <div><label for="no_kk">Nama Keluarga</label></div>
                <select name="no_kk" id="no_kk" class="form-control" style="width: 100%;">
                    <option disabled selected>Silahkan Pilih Nama Keluarga</option>
                    @foreach ($keluarga as $item)
                        <option value={{ $item->no_kk }}>{{ $item->nama_keluarga }}</option>
                    @endforeach
                </select>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#no_kk').select2();
                    });
                </script>
            </div>
            <div class="form-group col-12 col-md-6 mt-3" id="keteranganTextInput">
                <label for="keterangan" id="label_keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="textKeterangan" class="form-control" >
            </div>
            <div class="form-group col-12 col-md-6 mt-3" id="keteranganSelectInput" style="display: none;">
                <label for="keterangan" id="label_keterangan">Keterangan</label>
                <select name="keterangan" id="selectKeterangan" class="form-control" >
                    <option disabled selected>Silahkan Pilih Jenis Persembahan</option>
                    <option value="Sekolah Minggu">Sekolah Minggu</option>
                    <option value="Minggu Umum">Ibadah Minggu Umum</option>
                    <option value="Partangiangan Sektor">Partangiangan Sektor</option>
                    <option value="Partangiangan PP dan Remaja">Partangiangan PP dan Remaja</option>
                    <option value="Ina Debora">Ina Debora</option>
                    <option value="Gemende">Gemende</option>
                </select>
            </div>

            <script>
                function changeInputType() {
        var kategori = document.getElementById("kategori").value;
        var jenisKeuangan = document.getElementById("jenis_keuangan").value;
        var keteranganTextInput = document.getElementById("keteranganTextInput");
        var keteranganSelectInput = document.getElementById("keteranganSelectInput");
        var noKkSelectInput = document.getElementById("noKkSelectInput");
        var textNominal = document.getElementById("Nominal");
        
        // Sembunyikan atau tampilkan opsi kategori "Persembahan" berdasarkan jenis transaksi
        var persembahanOption = document.querySelector('#kategori option[value="Persembahan"]');
        
        if (jenisKeuangan === "Pengeluaran") {
            document.querySelector('#kategori option[value="Persembahan"]').style.display = "none";

            // Tampilkan semua opsi kas
            var kasOptions = document.querySelectorAll('.kas-option');
            kasOptions.forEach(function(option) {
                option.style.display = "block";
            });
            persembahanOption.style.display = "none"; // Sembunyikan opsi "Persembahan"
            if (kategori === "Persembahan") {
                document.getElementById("kategori").selectedIndex = 0; // Reset pilihan kategori
            }
        } else {
            // Tampilkan opsi default
        document.querySelector('#kategori option[value="Persembahan"]').style.display = "";

        // Sembunyikan semua opsi kas
        var kasOptions = document.querySelectorAll('.kas-option');
        kasOptions.forEach(function(option) {
            option.style.display = "none";
        });
            persembahanOption.style.display = ""; // Tampilkan kembali opsi "Persembahan"
        }
        
        if (jenisKeuangan === "Pengeluaran") {
            if (kategori === "Persembahan Bulanan" || kategori === "Ucapan Syukur") {
                keteranganTextInput.style.display = "block";
                keteranganSelectInput.style.display = "none";
                noKkSelectInput.style.display = "block";
                textNominal.style.display = "block";
            } else {
                keteranganTextInput.style.display = "block";
                keteranganSelectInput.style.display = "none";
                noKkSelectInput.style.display = "none";
                textNominal.style.display = "block";
            }
        } else {
            if (kategori === "Persembahan") {
                keteranganTextInput.style.display = "none";
                keteranganSelectInput.style.display = "block";
                textNominal.style.display = "block";
            } else if (kategori === "Persembahan Bulanan" || kategori === "Ucapan Syukur") {
                keteranganTextInput.style.display = "block";
                keteranganSelectInput.style.display = "none";
                noKkSelectInput.style.display = "block";
                textNominal.style.display = "block";
            } else {
                keteranganTextInput.style.display = "block";
                keteranganSelectInput.style.display = "none";
                noKkSelectInput.style.display = "none";
                textNominal.style.display = "block";
            }
        }
    }
            </script>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal">Tanggal</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" name="tanggal" id="tanggal" class="form-control" max="{{ date('Y-m-d') }}">
            </div>
            <div class="form-group col-12 col-md-6 mt-3" id="Nominal">
                <label for="nominal">Nominal(Rp)</label>
                <input type="number" name="nominal" id="nominal" class="form-control">
            </div>

        </div>
        <div class="col-12 col-md-6 mt-5">
            <button type="submit" class="btn btn-success">
                Tambahkan Data Keuangan
            </button>
        </div>
    </form>
</div>
<script>
    // Memastikan input tidak bernilai minus atau nol
    document.getElementById("nominal").addEventListener("input", function() {
        var nominalInput = document.getElementById("nominal");
        if (nominalInput.value <= 0) {
            nominalInput.value = ""; // Mengosongkan nilai input jika kurang dari atau sama dengan nol
        }
    });
</script>
