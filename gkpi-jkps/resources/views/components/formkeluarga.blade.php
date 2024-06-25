<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.datakeluarga') }} 
            @elseif ($navbars == StaticVariable::$navbarPendeta) 
                {{ route('pendeta.datakeluarga') }} @elseif ($navbars == StaticVariable::$navbarPenatua) 
                {{ route('penatua.datakeluarga') }} @endif"
                    class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> <!-- Ikon dari Font Awesome -->
                    <span>Kembali</span>
</a>
<br></br>
<?php
$header_title = 'Tambah Data Keluarga';
?>
<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    {{-- TODO: Controller not ready yet --}}
    <form class="mt-3" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="no_kk">No KK</label>
                <input type="text" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk"
                    placeholder="" value="{{ old('no_kk') }}" required>
                @error('no_kk')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nama_keluarga">Nama Keluarga</label>
                <input type="text" class="form-control @error('nama_keluarga') is-invalid @enderror"
                    name="nama_keluarga" placeholder="" value="{{ old('nama_keluarga') }}" required>
                @error('nama_keluarga')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mt-3 col-6">
                <label for="sektor_id">Sektor</label>
                <select name="sektor_id" id="sektor_id" class="form-control" required>
                    <option disabled selected>Pilih sektor dibawah</option>
                    @foreach ($sektors as $sektor)
                        <option value="{{ $sektor['id'] }}">{{ $sektor['nama'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_nikah">Tanggal Nikah</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" class="form-control @error('tanggal_nikah') is-invalid @enderror"
                    name="tanggal_nikah" id="tanggal_nikah" placeholder="" value="{{ old('tanggal_nikah') }}" required>
                @error('tanggal_nikah')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                    <option disabled selected>Silahkan pilih status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Pindah">Pindah</option>
                    <option value="Nonaktif">Nonaktif</option>
                    @error('status')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </select>
            </div>
            {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="lampiran">Lampiran Akta Nikah</label>
                <div class="alert alert-info mt-2 d-flex align-items-center" role="alert">
                    <i class="fas fa-info-circle mr-2"></i>
                    <span>Ekstensi lampiran yang diperbolehkan: PNG, JPG, JPEG</span>
                </div>
                <input type="file" class="form-control @error('lampiran') is-invalid @enderror" name="lampiran[]"
                    class="form-control" id="lampiran" value="{{ old('lampiran') }}" multiple>
                @error('lampiran')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" cols="20"
                    rows="5" class="form-control" required></textarea>
                @error('alamat')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3"></div>
            <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
            </div>
        </div>
</div>

</form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const tanggalNikahInput = document.getElementById('tanggal_nikah');
        const today = new Date();
        today.setDate(today.getDate()); // Tambah satu hari
        const maxDate = today.toISOString().split('T')[0];
        tanggalNikahInput.max = maxDate;
        console.log(`Max date set to: ${maxDate}`); // Debug log untuk memastikan tanggal
    });
    </script>
