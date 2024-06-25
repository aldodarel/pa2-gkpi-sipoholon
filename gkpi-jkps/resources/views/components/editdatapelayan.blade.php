@section('content')
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
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
</a>
<br></br>

    <div class="row">
        <div class="col-md">
            <div class="header-body text-left mt-4 mb-4">
                <div class="row justify-content">
                    <div class="row col-lg-12 col-md-4 border-bottom">
                        <div class="col-10">
                            <h2 class="text">Ubah Data Pelayan</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card  shadow h-100">

                <div class="card-body">
                    
<form autocomplete="off" 
      action="@if ($navbars == StaticVariable::$navbarPengurusHarian) 
                  /pengurusharian/{{ StaticVariable::$user->pelayanGereja->id }}/data/pelayan/edit/{{ $pelayanas->id }} 
              @elseif($navbars == StaticVariable::$navbarPendeta) 
                  /pendeta/{{ StaticVariable::$user->pelayanGereja->id }}/data/pelayan/edit/{{ $pelayanas->id }} 
              @endif" 
      method="post" 
      enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12 col-md-6 mt-3">
                                <label for="nik">NIK</label>
                                <select name="nik" id="nik" class="form-control">
                                    @foreach ($jemaat as $item )
                                    @if( $item->nik === $pelayanas['nik'])
                                    <option value= {{ $item->nik }} selected>{{$item->nik }}</option>
                                    @else
                                    <option value= {{ $item->nik }} >{{$item->nik }}</option>
                                    @endif
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
                                <select name="peran" class="form-control" id="inputJemaat4">
                                    <option value="Pendeta" {{ $pelayanas->peran == 'Pendeta' ? 'selected' : '' }}>Pendeta
                                    </option>
                                    <option value="Sekretaris" {{ $pelayanas->peran == 'Sekretaris' ? 'selected' : '' }}>
                                        Sekretaris
                                    </option>
                                    <option value="Bendahara" {{ $pelayanas->peran == 'Bendahara' ? 'selected' : '' }}>
                                        Bendahara
                                    </option>
                                    <option value="Penatua Aktif" {{ $pelayanas->peran == 'Penatua Aktif' ? 'selected' : '' }}>Penatua Aktif
                                    </option>
                                    <option value="Calon Penatua Aktif" {{ $pelayanas->peran == 'Calon Penatua Aktif' ? 'selected' : '' }}>Calon Penatua Aktif
                                    </option>
                                    <option value="Pelayan Ibadah"
                                        {{ $pelayanas->peran == 'Pelayan Ibadah' ? 'selected' : '' }}>Pelayan Ibadah
                                    </option>
                                    <option value="Seksi Pelayanan Rohani"
                                        {{ $pelayanas->peran == 'Seksi Pelayanan Rohani' ? 'selected' : '' }}>Seksi
                                        Pelayanan Rohani
                                    </option>
                                    <option value="Seksi Pekabaran Injil"
                                        {{ $pelayanas->peran == 'Seksi Pekabaran Injil' ? 'selected' : '' }}>Seksi Pekabaran
                                        Injil
                                    </option>
                                    <option value="Seksi Diakoni Sosial"
                                        {{ $pelayanas->peran == 'Seksi Diakoni Sosial' ? 'selected' : '' }}>Seksi Diakoni Sosial
                                    </option>
                                    <option value="Seksi Musik/Nyanyian/Koor"
                                        {{ $pelayanas->peran == 'Seksi Musik/Nyanyian/Koor' ? 'selected' : '' }}>Seksi
                                        Musik/Nyanyian/Koor
                                    </option>
                                    <option value="Seksi Sekolah Minggu"
                                        {{ $pelayanas->peran == 'Seksi Sekolah Minggu' ? 'selected' : '' }}>Seksi Sekolah
                                        Minggu
                                    </option>
                                    <option value="Seksi Remaja"
                                    {{ $pelayanas->peran == 'Remaja' ? 'selected' : '' }}>Remaja
                                    </option>
                                    <option value="Seksi Pemuda/i (PP)"
                                        {{ $pelayanas->peran == 'Seksi Pemuda/i (PP)' ? 'selected' : '' }}>Seksi Pemuda/i
                                        (PP)
                                    </option>
                                    <option value="Seksi Perempuan"
                                    {{ $pelayanas->peran == 'Seksi Perempuan' ? 'selected' : '' }}>Seksi Perempuan
                                    </option>
                                    <option value="Seksi Pria"
                                    {{ $pelayanas->peran == 'Seksi Pria' ? 'selected' : '' }}>Seksi Pria
                                    </option>
                                    <option value="Seksi Lansia"
                                    {{ $pelayanas->peran == 'Seksi Lansia' ? 'selected' : '' }}>Seksi Lansia
                                    </option>
                                    <option value="Seksi Kesehatan"
                                    {{ $pelayanas->peran == 'Seksi Kesehatan' ? 'selected' : '' }}>Seksi Kesehatan
                                    </option>
                                    <option value="Seksi Pendidikan"
                                    {{ $pelayanas->peran == 'Seksi Pendidikan' ? 'selected' : '' }}>Seksi Pendidikan
                                    </option>
                                    <option value="Seksi Sarana dan Prasarana"
                                    {{ $pelayanas->peran == 'Seksi Sarana dan Prasarana' ? 'selected' : '' }}>Seksi Sarana dan Prasarana
                                    </option>
                                    <option value="Seksi Usaha/Pengembangan Sumber Daya"
                                    {{ $pelayanas->peran == 'Seksi Usaha/Pengembangan Sumber Daya' ? 'selected' : '' }}>Seksi Usaha/Pengembangan Sumber Daya
                                    </option>
                                    <option value="Pengawas Harta Benda"
                                        {{ $pelayanas->peran == 'Pengawas Harta Benda' ? 'selected' : '' }}>Pengawas Harta
                                        Benda
                                    </option>
                                    <option value="Penasehat Jemaat"
                                        {{ $pelayanas->peran == 'Penasehat Jemaat' ? 'selected' : '' }}>Penasehat Jemaat
                                    </option>
                                    <option value="Tata Usaha" {{ $pelayanas->peran == 'Tata Usaha' ? 'selected' : '' }}>
                                        Tata Usaha</option>
                                    </select>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('#inputJemaat4').select2();
                                        });
                                    </script>
                            </div>
                            <div class="form-group col-12 col-md-6 mt-3">
                                <label for="tanggal_terima_jabatan">Tanggal terima jabatan</label>
                                <input type="date" name="tanggal_terima_jabatan" id="tanggal_terima_jabatan"
                                    class="form-control" value="{{ $pelayanas['tanggal_terima_jabatan'] }}" oninput="setEndDateMin()">
                            </div>
                            <div class="form-group col-12 col-md-6 mt-3">
                                <label for="tanggal_akhir_jabatan">Tanggal akhir jabatan</label>
                                <input type="date" name="tanggal_akhir_jabatan" id="tanggal_akhir_jabatan"
                                    class="form-control" value="{{ $pelayanas['tanggal_akhir_jabatan'] }}">
                            </div>
                            <div class="col-12 col-md-3">
                                <button type="submit" class="btn btn-warning" id="simpan">
                                    Ubah
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
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
            setMaxDateToday();
            setEndDateMin(); // Call the function on page load to set the min attribute based on the current start date
            document.getElementById('tanggal_terima_jabatan').addEventListener('change', setEndDateMin);
        });
        </script>
@endsection

