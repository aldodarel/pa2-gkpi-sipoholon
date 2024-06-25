<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.Sektor') }} 
            @elseif ($navbars == StaticVariable::$navbarPendeta) 
                {{ route('pendeta.Sektor') }} @elseif ($navbars == StaticVariable::$navbarPenatua) 
                {{ route('penatua.Sektor') }} @endif"
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
                        <h2 class="text">Tambah Sektor</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 p-3 bg-white shadow rounded">
    <form class="mt-3" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 col-md-6 mt-3">
                <label class="form-control-label" for="nama">Nama Sektor</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    placeholder="" value="{{ old('nama') }}" required>
                @error('nama')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label class="form-control-label" for="keterangan">Keterangan</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                    placeholder="" value="{{ old('keterangan') }}" required>
                @error('keterangan')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12 col-md-6 mt-4">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>

            </div>
        </div>
    </form>
</div>
