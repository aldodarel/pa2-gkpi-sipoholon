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
        <div class="header-body text-left mt-4 mb-4">
            <div class="row justify-content">
                <div class="row col-lg-12 col-md-4 border-bottom">
                    <div class="col-10">
                        <h2 class="text">Ubah Sektor</h2>
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
                @foreach ($sektor as $item)
                    <form autocomplete="off" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label" for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                name="nama" placeholder="Masukkan Tanggal ..." value="{{ $item->nama }}">
                            @error('nama')
                                <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="keterangan">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                name="keterangan" value="{{ $item->keterangan }}">
                            @error('keterangan')
                                <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-warning btn-block col-12 col-md-2 mt-3"
                            id="simpan">Ubah</button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
