<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
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
                    <div class="col-10">
                        <h2 class="text">Ubah Jadwal Ibadah</h2>
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
                {{-- @foreach ($jadwal_ibadah as $jadwal) --}}
                <form autocomplete="off" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="name">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="Masukkan Tanggal ..." value="{{ $jadwal_ibadah['name'] }}">
                        @error('name')
                            <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="tanggal">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                            placeholder="Masukkan Tanggal ..." value="{{ $jadwal_ibadah['tanggal'] }}">
                        @error('tanggal')
                            <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="waktu">Jam</label>
                        <input type="time" class="form-control @error('waktu') is-invalid @enderror" name="waktu"
                            placeholder="Masukkan Tanggal ..." value="{{ $jadwal_ibadah['waktu'] }}">
                        @error('waktu')
                            <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="jenis">Jenis Ibadah</label>
                        <select name="jenis" class="form-control" id="inputJemaat4">
                            <option disabled selected>Pilih jenis ibadah</option>
                            <option value="Mingguan" {{ $jadwal_ibadah['jenis'] == 'Mingguan' ? 'selected' : '' }}>
                                Mingguan</option>
                            <option value="Sektor" {{ $jadwal_ibadah['jenis'] == 'Sektor' ? 'selected' : '' }}>
                                Sektor</option>
                            <option value="Situasional"
                                {{ $jadwal_ibadah['jenis'] == 'Situasional' ? 'selected' : '' }}>
                                Situasional</option>
                            <option value="Dukacita" {{ $jadwal_ibadah['jenis'] == 'Dukacita' ? 'selected' : '' }}>
                                Dukacita</option>
                            <option value="Sakramen" {{ $jadwal_ibadah['jenis'] == 'Sakramen' ? 'selected' : '' }}>
                                Sakramen</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="jumlah_hadir">Jumlah Hadir</label>
                        <input type="number" class="form-control @error('jumlah_hadir') is-invalid @enderror"
                            name="jumlah_hadir" placeholder="" value="{{ $jadwal_ibadah['jumlah_hadir'] }}">
                        @error('jumlah_hadir')
                            <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="lampiran">Lampiran Tata Ibadah</label>
                        <div class="alert alert-info mt-2 d-flex align-items-center" role="alert">
                            <i class="fas fa-info-circle mr-2"></i>
                            <span>Ekstensi lampiran yang diperbolehkan: PDF. Abaikan jika tidak ingin mengubah lampiran sebelumnya</span>
                        </div>
                        <div class="form-group">
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
                        </div>
                        <input type="file" class="form-control @error('lampiran') is-invalid @enderror"
                            name="lampiran[]" class="form-control" id="lampiran" value="{{ old('lampiran') }}"
                            multiple>
                        @error('lampiran')
                            <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-warning btn-block col-12 col-md-2 mt-3"
                        id="simpan">Ubah</button>
                </form>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
</div>
