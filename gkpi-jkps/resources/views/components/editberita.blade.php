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
<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-4 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text">Ubah Berita Gereja</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="row">
    <div class="col">
        <div class="card  shadow h-100">
            <div class="card-header bg-white border-0">
                <h3 class="mb-0">Ubah Berita</h3>
            </div>
            <div class="card-body">
            @foreach ($berita_gereja as $item)
            <form autocomplete="off" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <label class="form-control-label" for="judul">Judul Berita</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Masukkan Tanggal ..." value="{{ $item->judul }}">
                            @error('judul')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Isi Berita</label>
                        <textarea class="form-control @error('isi') is-invalid @enderror" name="isi">{{ $item->isi }}</textarea>
                        @error('isi') <span class="invalid-feedback font-weight-bold">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="lampiran">Lampiran Berita</label>
                        <div class="alert alert-info mt-2 d-flex align-items-center" role="alert">
                            <i class="fas fa-info-circle mr-2"></i>
                            <Abaikan>Ekstensi lampiran yang diperbolehkan: PNG, JPG, JPEG. Abaikan jika tidak ingin mengubah lampiran sebelumnya.</span>
                        </div>
                        <div class="form-group">
                        <img alt="" class="img-responsive img-fluid rounded"
                                                                    width="250"
                                                                    src="{{ asset($item->lampiran) }}">
                        </div>
                        <input type="file" class="form-control @error('lampiran') is-invalid @enderror" name="lampiran" placeholder="Masukkan Tanggal ..." value="{{ $item->lampiran }}">
                            @error('lampiran')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <button  type="submit" class="btn btn-warning btn-block col-12 col-md-2 mt-3" id="simpan">Ubah</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>