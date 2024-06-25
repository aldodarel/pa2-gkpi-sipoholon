<?php
$header_title = 'Edit Data Keluarga';
?>
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@if ($navbars == StaticVariable::$navbarPengurusHarian)
                    <a href="{{$keluarga->status == 'Aktif' ? route('pengurusharian.datakeluarga') : route('pengurusharian.datakeluargatidakaktif') }}"
                        class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                @elseif ($navbars == StaticVariable::$navbarPendeta)
                    <a href="{{$keluarga->status == 'Aktif'  ? route('pendeta.datakeluarga') : route('pendeta.datakeluargatidakaktif') }}"
                        class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                @elseif ($navbars == StaticVariable::$navbarPenatua)
                    <a href="{{$keluarga->status == 'Aktif'  ? route('penatua.datakeluarga') : route('penatua.datakeluargatidakaktif') }}"
                        class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                @endif
                <br></br>

<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    {{-- TODO: Controller not ready yet --}}
    <form class="mt-3" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="no_kk">No KK</label>
                <input type="text" name="no_kk" id="no_kk" class="form-control"
                    value="{{ $keluarga['no_kk'] }}" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nama_keluarga">Nama Keluarga</label>
                <input type="text" name="nama_keluarga" id="nama_keluarga" class="form-control"
                    value="{{ $keluarga['nama_keluarga'] }}" required>
            </div>
            {{-- <div class="form-group col-12 col-md-6 mt-3">
                <label for="no_telepon">No Telepon</label>
                <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="{{$keluarga['no_telepon']}}">
            </div> --}}
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_nikah">Tanggal Nikah</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" name="tanggal_nikah" id="tanggal_nikah" class="form-control"
                    value="{{ $keluarga['tanggal_nikah'] }}" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="status">Status</label>
                <select name="status" class="form-control" id="inputJemaat4" required>
                    <option value="Aktif" {{ $keluarga->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Pindah" {{ $keluarga->status == 'Pindah' ? 'selected' : '' }}>Pindah</option>
                    <option value="Nonaktif" {{ $keluarga->status == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="lampiran">Lampiran Akta Nikah</label>
                <div class="alert alert-info mt-2 d-flex align-items-center" role="alert">
                    <i class="fas fa-info-circle mr-2"></i>
                    <span>Ekstensi lampiran yang diperbolehkan: PNG, JPG, JPEG. Abaikan jika tidak ingin mengubah lampiran sebelumnya</span>
                </div>
                <table class="table">
                    @if (!$lampiran || count($lampiran) == 0 || (count($lampiran) == 1 && trim($lampiran[0]) == ''))
                    <tr>
                        <td><em>Lampiran tidak tersedia</em></td>
                    </tr>
                @else
                    @foreach ($lampiran as $l)
                        @if (trim($l) != '')
                            <tr>
                                <td><a target="_BLANK" href="{{ $l }}">{{ basename($l) }}</a></td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                </table>
                <input type="file" name="lampiran[]" class="form-control" id="lampiran" multiple>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="sektor_id">Sektor</label>
                <select name="sektor_id" id="inputJemaat17" class="form-control" required>
                    <option value="{{ $keluarga->id_sektor }}" selected>{{ $keluarga->sektor->nama }}</option>
                    @foreach ($sektors as $sektor)
                        @if ($sektor['id'] != $keluarga->id_sektor)
                            <option value="{{ $sektor['id'] }}">{{ $sektor['nama'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
           
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" cols="20" rows="5" class="form-control" required>{{ $keluarga['alamat'] }}</textarea>
            </div>
            <div class="form-group col-12 col-md-6 mt-3"></div>
           
            <div class="col-12 col-md-3 mt-5">
                <button type="submit" class="btn btn-warning" id="simpan">
                    Ubah
                </button>
            </div>
        </div>

    </form>
</div>
@include('sweetalert::alert')
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const tanggalNikahInput = document.getElementById('tanggal_nikah');
        const today = new Date();
        today.setDate(today.getDate() + 1); // Tambah satu hari
        const maxDate = today.toISOString().split('T')[0];
        tanggalNikahInput.max = maxDate;
        console.log(`Max date set to: ${maxDate}`); // Debug log untuk memastikan tanggal
    });
    </script>

