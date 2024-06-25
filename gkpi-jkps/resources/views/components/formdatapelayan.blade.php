<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.datapelayan') }} 
            @elseif ($navbars == StaticVariable::$navbarPendeta) 
                {{ route('pendeta.datapelayan') }} @elseif ($navbars == StaticVariable::$navbarPenatua) 
                {{ route('penatua.datapelayan') }} @endif"
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
                    <div class="col-10">
                        <h2 class="">Tambah Data Pelayan</h2> 
                        </p>
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
                <label for="nik">NIK</label>
                <select name="nik" id="nik" class="form-control" required>
                    <option disabled selected>Silahkan Pilih NIK</option>
                    @foreach ($jemaat as $item )
                    <option value= {{ $item->nik }}>{{$item->nik }}</option>
                    @endforeach  
                </select>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#nik').select2();
                    });
                </script>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="peran">Peran</label>
                <select name="peran" id="peran" class="form-control" required>
                    <option disabled selected>Pilih Peran</option>
                    <option value="Pendeta">Pendeta</option>
                    <option value="Sekretaris">Sekretaris</option>
                    <option value="Bendahara">Bendahara</option>
                    <option value="Penatua Aktif">Penatua Aktif</option>
                    <option value="Calon Penatua Aktif">Calon Penatua Aktif</option>
                    <option value="Pelayan Ibadah">Pelayan Ibadah</option>
                    <option value="Seksi Pelayanan Rohani">Seksi Pelayanan Rohani</option>
                    <option value="Seksi Pekabaran Injil">Seksi Pekabaran Injil</option>
                    <option value="Seksi Diakoni Sosial">Seksi Diakoni Sosial</option>
                    <option value="Seksi Musik/Nyanyian/Koor">Seksi Musik/Nyanyian/Koor</option>
                    <option value="Seksi Sekolah Minggu">Seksi Sekolah Minggu</option>
                    <option value="Seksi Remaja">Seksi Remaja</option>
                    <option value="Seksi Pemuda/i (PP)">Seksi Pemuda/i (PP)</option>
                    <option value="Seksi Perempuan">Seksi Perempuan</option>
                    <option value="Seksi Pria">Seksi Pria</option>
                    <option value="Seksi Lansia">Seksi Lansia</option>
                    <option value="Seksi Kesehatan">Seksi Kesehatan</option>
                    <option value="Seksi Pendidikan">Seksi Pendidikan</option>
                    <option value="Seksi Sarana dan Prasarana">Seksi Sarana dan Prasarana</option>
                    <option value="Seksi Usaha/Pengembangan Sumber Daya">Seksi Usaha/Pengembangan Sumber Daya</option>
                    <option value="Pengawas Harta Benda">Pengawas Harta Benda</option>
                    <option value="Penasehat Jemaat">Penasehat Jemaat</option>
                </select>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#peran').select2();
                    });
                </script>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_terima_jabatan">Tanggal Terima Jabatan</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" name="tanggal_terima_jabatan" id="tanggal_terima_jabatan" class="form-control" oninput="setEndDateMin()" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_akhir_jabatan">Tanggal Akhir Jabatan</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" name="tanggal_akhir_jabatan" id="tanggal_akhir_jabatan" class="form-control">
            </div>
            <div class="col-12 col-md-6 mt-4">
                <button type="submit" class="btn btn-success">
                    Tambahkan Data Pelayan
                </button>
            </div>
        </div>
    </form>
</div>

@include('sweetalert::alert')

<script>
     function setMaxDateToday() {
        const today = new Date().toISOString().split('T')[0]; // Mendapatkan tanggal hari ini dalam format 'YYYY-MM-DD'
        const startDateInput = document.getElementById('tanggal_terima_jabatan');

        startDateInput.max = today; // Mengatur batas maksimum pada input tanggal
    }
    function setEndDateMin() {
        const startDate = document.getElementById('tanggal_terima_jabatan').value;
        const endDateInput = document.getElementById('tanggal_akhir_jabatan');
        if (startDate) {
            // Set the min attribute to the day after the start date
            const minEndDate = new Date(startDate);
            minEndDate.setDate(minEndDate.getDate() + 1);
            endDateInput.min = minEndDate.toISOString().split('T')[0];
        } else {
            endDateInput.min = '';
        }
    }
    
    document.addEventListener('DOMContentLoaded', (event) => {
        const startDateInput = document.getElementById('tanggal_terima_jabatan');
        const endDateInput = document.getElementById('tanggal_akhir_jabatan');
        setMaxDateToday();
        
        startDateInput.addEventListener('change', setEndDateMin);
    });
    </script>
