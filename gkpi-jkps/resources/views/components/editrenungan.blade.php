<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.renunganshow') }} 
            @elseif ($navbars == StaticVariable::$navbarPendeta) 
                {{ route('pendeta.renunganshow') }} @elseif ($navbars == StaticVariable::$navbarPenatua) 
                {{ route('penatua.renunganshow') }} @endif"
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
                        <h2 class="text">Ubah Renungan</h2>
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
                @foreach ($renungan as $renunganas)
                    <form autocomplete="off" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label" for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                name="tanggal" placeholder="Masukkan Tanggal ..." value="{{ $renunganas->tanggal }}">
                            @error('tanggal')
                                <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="ayat">Ayat</label>
                            <input type="text" class="form-control @error('ayat') is-invalid @enderror"
                                name="ayat" placeholder="Masukkan Tanggal ..." value="{{ $renunganas->ayat }}">
                            @error('ayat')
                                <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="title">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" placeholder="Masukkan Tanggal ..." value="{{ $renunganas->title }}">
                            @error('title')
                                <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="isi">Isi</label>
                            <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" id="isi" cols="20"
                            rows="5" class="form-control" required>{{ $renunganas->isi }}</textarea>
                            @error('tanggal')
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
