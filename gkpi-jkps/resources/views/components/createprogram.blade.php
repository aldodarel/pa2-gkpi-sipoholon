<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<div class="row">
    <div class="col-md">
        <div class="header-body text-left mt-2 mb-4">
            <div class="row justify-content">
                <div class="row col-lg-12 col-md-4 border-bottom">
                    <div class="col-10">
                        <h2 class="text">Tambah Program Kerja Pelayanan</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 p-3 bg-white shadow rounded">
    <form class="mt-3" action="{{ route('pengurusharian.storeprogram', ['id_user' => StaticVariable::$user->nik]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 col-md-6 mt-3">
                <label class="form-control-label" for="jenis_program">Jenis Program</label>
                <select name="jenis_program" id="jenis_program" class="form-control" required>
                    <option disabled selected>Pilih Jenis Program</option>
                    <option value="Rancangan Program Kerja">Rancangan Program Kerja</option>
                    <option value="Rancangan Anggaran Penerimaan dan Belanja">Rancangan Anggaran Penerimaan dan Belanja</option>
                </select>
                @error('jenis_program')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label class="form-control-label" for="tahun">Tahun</label>
                <select name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror" required>
                    <option disabled selected>Pilih Tahun</option>
                    @for ($year = 2017; $year <= now()->year; $year++)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
                @error('tahun')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="lampiran">Lampiran Program</label>
                <div class="alert alert-info mt-2 d-flex align-items-center" role="alert">
                    <i class="fas fa-info-circle mr-2"></i>
                    <span>Ekstensi lampiran program yang diperbolehkan: PDF</span>
                </div>
                <input type="file" class="form-control @error('lampiran') is-invalid @enderror" name="lampiran[]" id="lampiran" value="{{ old('lampiran') }}" multiple required>
                @error('lampiran')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3"></div>
            <div class="col-12 col-md-6 mt-4">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>
</div>
