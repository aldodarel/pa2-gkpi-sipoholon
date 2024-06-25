@section('title', '')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.detailkeluarga',['id'=>$no_kk]) }} 
            @elseif ($navbars == StaticVariable::$navbarPendeta) 
                {{ route('pendeta.detailkeluarga',['id'=>$no_kk]) }} @elseif ($navbars == StaticVariable::$navbarPenatua) 
                {{ route('penatua.detailkeluarga',['id'=>$no_kk]) }} @endif"
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
                        <h2 class="">Data Keluarga Baru</h2>
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
                <input disabled type="text" value="{{ $jemaat->name}}" name="nik" id="nik"
                    class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="no_kk">Nomor KK</label>
                <select name="no_kk" id="no_kk" class="form-control" required>
                    <option disabled selected>Silahkan Pilih Nomor KK</option>
                    @foreach ($keluarga as $item )
                    <option value= {{ $item->no_kk }}>{{$item->no_kk }}</option>
                    @endforeach  
                </select>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#no_kk').select2();
                    });
                </script>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <input disabled type="text" value="{{ $jemaat->jenis_kelamin}}" name="jenis_kelamin" id="jenis_kelamin"
                    class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="posisi_di_keluarga">Posisi Di Keluarga</label>
                <select name="posisi_di_keluarga" id="posisi_di_keluarga" class="form-control" required>
                    <option disabled selected>Pilih posisi</option>
                    <option value="Suami">Suami</option>
                    <option value="Istri">Istri</option>
                </select>
            </div>
            <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
            </div>
        
        </div>
    </form>
</div>

@include('sweetalert::alert')

<script>
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
        
        startDateInput.addEventListener('change', setEndDateMin);
    });
    </script>
