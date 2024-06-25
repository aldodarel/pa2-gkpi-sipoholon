<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.berita') }} 
            @elseif ($navbars == StaticVariable::$navbarPendeta) 
                {{ route('pendeta.berita') }} @elseif ($navbars == StaticVariable::$navbarPenatua) 
                {{ route('penatua.berita') }} @endif"
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
                        <h2 class="text">Tambah Berita Gereja</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 p-3 bg-white shadow rounded">
    <form autocomplete="off"
        action="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.storeberita', ['id_user' => StaticVariable::$user->nik]) }} @elseif($navbars == StaticVariable::$navbarPendeta) {{ route('pendeta.storeberita', ['id_user' => StaticVariable::$user->nik])}} @elseif($navbars == StaticVariable::$navbarPenatua) {{ route('penatua.storeberita', ['id_user' => StaticVariable::$user->nik]) }} @endif"
        method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            {{-- <div class="form-group col-12 col-md-6 mt-3">
                <label class="form-control-label" for="tanggal">Tanggal</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                    placeholder="" value="{{ old('tanggal') }}">
                @error('tanggal')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div> --}}
            <div class="form-group col-12 col-md-6 mt-3">
                <label class="form-control-label" for="judul">Judul Berita</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                    placeholder="" value="{{ old('judul') }}" required>
                @error('judul')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label class="form-control-label">Isi Berita</label>
                <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" required>{{ old('isi') }}</textarea>
                @error('isi')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label class="form-control-label" for="lampiran">Lampiran Berita</label>
                <div class="alert alert-info mt-2 d-flex align-items-center" role="alert">
                    <i class="fas fa-info-circle mr-2"></i>
                    <span>Ekstensi lampiran Berita yang diperbolehkan: PNG, JPG, JPEG</span>
                </div>
                <input type="file" class="form-control @error('lampiran') is-invalid @enderror" name="lampiran"
                    placeholder="" value="{{ old('lampiran') }}" required>
                @error('lampiran')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3"></div>
            <div class="col-12 col-md-6 mt-4">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
