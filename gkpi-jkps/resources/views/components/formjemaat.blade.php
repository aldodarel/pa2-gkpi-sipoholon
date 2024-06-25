<?php
$header_title = 'Tambah Data Jemaat';
?>
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.detailkeluarga',['id'=>$keluarga['no_kk']]) }} 
            @elseif ($navbars == StaticVariable::$navbarPendeta) 
                {{ route('pendeta.detailkeluarga',['id'=>$keluarga['no_kk']]) }} @elseif ($navbars == StaticVariable::$navbarPenatua) 
                {{ route('penatua.detailkeluarga',['id'=>$keluarga['no_kk']]) }} @endif"
                    class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> <!-- Ikon dari Font Awesome -->
                    <span>Kembali</span>
</a>
<br></br>
<div class="col-12 p-3 bg-white rounded shadow">
    @include('components.headerform')

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group mt-3 col-6">
                <label for="no_kk">NO KK</label>
                <input disabled type="text" value="{{ $keluarga['no_kk'] }}" name="no_kk" id="no_kk"
                    class="form-control">
            </div>
            <div class="form-group mt-3 col-6">
                <label for="name">Nama Keluarga</label>
                <input type="text" name="nama_keluarga" id="nama_keluarga" value="{{ $keluarga['nama_keluarga'] }}"
                    disabled class="form-control">
            </div>

            <div class="form-group mt-3 col-6">
                <label for="nik">No NIK</label>
                <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                    placeholder="" value="{{ old('nik') }}" required>
                @error('nik')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mt-3 col-6">
                <label for="name">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    placeholder="" value="{{ old('name') }}" required>
                @error('name')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mt-3 col-6">
                <label for="name">Nomor Telepon</label>
                <input type="number" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon"
                placeholder="08xxxxxxxxxx" oninput="if(this.value.length > 13) this.value = this.value.slice(0, 13);" value="{{ old('no_telepon') }}" required>
                @error('no_telepons')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mt-3 col-6" required>
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <div class="form-check">
                    <input value="Laki-laki" class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1">
                    <label class="form-check-label" for="jenis_kelamin1">
                        Laki Laki
                    </label>
                </div>
                <div class="form-check">
                    <input value="Perempuan" class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2">
                    <label class="form-check-label" for="jenis_kelamin2">
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="form-group mt-3 col-6">
                <label for="posisi_di_keluarga">Posisi Di Keluarga</label>
                <select name="posisi_di_keluarga" id="posisi_di_keluarga" class="form-control" required>
                    <option disabled selected>Pilih posisi</option>
                    <option value="Suami">Suami</option>
                    <option value="Istri">Istri</option>
                    <option value="Anak">Anak</option>
                </select>
            </div>
            <div class="form-group mt-3 col-6">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                    name="tempat_lahir" placeholder="" value="{{ old('tempat_lahir') }}" required>
                @error('tempat_lahir')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            {{-- TODO: Need to format date --}}
            <div class="form-group mt-3 col-6">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                    name="tanggal_lahir" id="tanggal_lahir" placeholder="" value="{{ old('tanggal_lahir') }}" required>
                @error('tanggal_lahir')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mt-3 col-6">
                <label for="status">Status Anggota</label>
                <select name="status" id="status" class="form-control" required>
                    <option disabled selected>Pilih status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Meninggal">Meninggal</option>
                    <option value="Pindah">Pindah</option>
                </select>
            </div>

            <div class="form-group mt-3 col-6">
                <label for="status_pernikahan">Status Pernikahan</label>
                <select name="status_pernikahan" id="status_pernikahan" class="form-control" required>
                    <option disabled selected>Pilih status pernikahan</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                </select>
            </div>

            {{-- TODO: Need to format date --}}
            {{-- <div class="form-group mt-3 col-6">
                <label for="tanggal_baptis">Tanggal Baptis</label>
                <input type="date" class="form-control @error('tanggal_baptis') is-invalid @enderror"
                    name="tanggal_baptis" placeholder="" value="{{ old('tanggal_baptis') }}">
                @error('tanggal_baptis')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div> --}}
            <!-- Tambahan untuk memilih apakah seseorang telah dibaptis atau tidak -->
            <div class="form-group mt-3 col-6">
                <label for="baptis">Sudah dibaptis?</label>
                <div class="form-check">
                    <input value="Ya" class="form-check-input" type="radio" name="baptis" id="baptis1">
                    <label class="form-check-label" for="baptis1">
                        Ya
                    </label>
                </div>
                <div class="form-check">
                    <input value="Tidak" class="form-check-input" type="radio" name="baptis" id="baptis2">
                    <label class="form-check-label" for="baptis2">
                        Tidak
                    </label>
                </div>
            </div>

            <!-- Field tambahan untuk tanggal baptis, nama pendeta baptis, dan nomor surat baptis -->
            <div id="additional_fields" style="display: none;">
                <!-- Garis pemisah -->
                <div class="col-12">
                    <hr>
                    <div class="alert alert-warning mt-2 d-flex align-items-center" role="alert">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <span>Data baptis wajib diisi.</span>
                    </div>
                </div>
                <div class="form-group mt-3 col-6">
                    <label for="tanggal_baptis">Tanggal Baptis</label>
                    <input type="date" class="form-control @error('tanggal_baptis') is-invalid @enderror"
                        name="tanggal_baptis" id="tanggal_baptis" placeholder="" value="{{ old('tanggal_baptis') }}">
                    @error('tanggal_baptis')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3 col-6">
                    <label for="nama_pendeta">Nama Pendeta Baptis</label>
                    <input type="text" class="form-control @error('nama_pendeta') is-invalid @enderror"
                        name="nama_pendeta" placeholder="" value="{{ old('nama_pendeta') }}">
                    @error('nama_pendeta')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3 col-6">
                    <label for="nomor_surat_baptis">Nomor Surat Baptis</label>
                    <input type="text" class="form-control @error('nomor_surat_baptis') is-invalid @enderror"
                        name="nomor_surat_baptis" placeholder="" value="{{ old('nomor_surat_baptis') }}">
                    @error('nomor_surat_baptis')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3 col-6">
                    <label for="surat_baptis">Surat Baptis</label>
                    <div class="alert alert-info mt-2 d-flex align-items-center" role="alert">
                        <i class="fas fa-info-circle mr-2"></i>
                        <span>Ekstensi surat yang diperbolehkan: PNG, JPG, JPEG</span>
                    </div>
                    <input type="file" class="form-control @error('surat_baptis') is-invalid @enderror"
                        name="surat_baptis[]" placeholder="" id="surat_baptis" multiple
                        value="{{ old('surat_baptis') }}">
                    @error('surat_baptis')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Garis pemisah -->
                <div class="col-12">
                    <hr>
                </div>
            </div>
            <!-- Tambahan untuk memilih apakah seseorang telah disidi atau tidak -->
            <div class="form-group mt-3 col-6">
                <label for="sidi">Sudah disidi?</label>
                <div class="form-check">
                    <input value="Ya" class="form-check-input" type="radio" name="sidi" id="sidi1">
                    <label class="form-check-label" for="sidi1">
                        Ya
                    </label>
                </div>
                <div class="form-check">
                    <input value="Tidak" class="form-check-input" type="radio" name="sidi" id="sidi2">
                    <label class="form-check-label" for="sidi2">
                        Tidak
                    </label>
                </div>
            </div>

            <!-- Field tambahan untuk tanggal sidi, nama pendeta sidi, dan nomor surat sidi -->
            <div id="additional_sidi_fields" style="display: none;">
                <div class="col-12">
                    <hr>
                    <div class="alert alert-warning mt-2 d-flex align-items-center" role="alert">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <span>Data sidi wajib diisi.</span>
                    </div>
                </div>
                <div class="form-group mt-3 col-6">
                    <label for="tanggal_sidi">Tanggal Sidi</label>
                    <input type="date" class="form-control @error('tanggal_sidi') is-invalid @enderror"
                        name="tanggal_sidi" id="tanggal_sidi" placeholder="" value="{{ old('tanggal_sidi') }}">
                    @error('tanggal_sidi')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3 col-6">
                    <label for="nama_pendeta_sidi">Nama Pendeta Sidi</label>
                    <input type="text" class="form-control @error('nama_pendeta_sidi') is-invalid @enderror"
                        name="nama_pendeta_sidi" placeholder="" value="{{ old('nama_pendeta_sidi') }}">
                    @error('nama_pendeta_sidi')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3 col-6">
                    <label for="nomor_surat_sidi">Nomor Surat Sidi</label>
                    <input type="text" class="form-control @error('nomor_surat_sidi') is-invalid @enderror"
                        name="nomor_surat_sidi" placeholder="" value="{{ old('nomor_surat_sidi') }}">
                    @error('nomor_surat_sidi')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3 col-6">
                    <label for="surat_baptis">Surat Sidi</label>
                    <div class="alert alert-info mt-2 d-flex align-items-center" role="alert">
                        <i class="fas fa-info-circle mr-2"></i>
                        <span>Ekstensi surat yang diperbolehkan: PNG, JPG, JPEG</span>
                    </div>
                    <input type="file" class="form-control @error('surat_sidi') is-invalid @enderror"
                        name="surat_sidi[]" placeholder="" id="surat_sidi" multiple
                        value="{{ old('surat_sidi') }}">
                    @error('surat_sidi')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <hr>
                </div>
            </div>


            {{-- TODO: Remember to add to varibel $sktors in controller --}}
            <div class="form-group mt-3 col-6">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" cols="30" rows="5"
                    class="form-control @error('tempat_lahir') is-invalid @enderror" name="alamat" placeholder=""
                    value="{{ old('alamat') }}"></textarea>
                @error('alamat')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
            <div class="form-group mt-3 col-6">
                <label for="lampiran">Lampiran Akta Lahir</label>
                <div class="alert alert-info mt-2 d-flex align-items-center" role="alert">
                    <i class="fas fa-info-circle mr-2"></i>
                    <span>Ekstensi lampiran yang diperbolehkan: PNG, JPG, JPEG</span>
                </div>
                <input type="file" class="form-control @error('lampiran') is-invalid @enderror" name="lampiran[]"
                    placeholder="" id="lampiran" multiple value="{{ old('lampiran') }}">
                @error('lampiran')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mt-3 col-6"></div>
            <div class="d-flex col-1 gap-3 mt-4">
                <button type="submit" class="btn btn-success ms-auto">
                    Simpan
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const tanggalLahirInput = document.getElementById('tanggal_lahir');
        const tanggalBaptisInput = document.getElementById('tanggal_baptis');
        const tanggalSidiInput = document.getElementById('tanggal_sidi');
        
        // Set max date for tanggal lahir to tomorrow
        const today = new Date();
        today.setDate(today.getDate());
        const maxLahirDate = today.toISOString().split('T')[0];
        tanggalLahirInput.max = maxLahirDate;
    
        const updateBaptisMinDate = () => {
            const tanggalLahir = tanggalLahirInput.value;
            if (tanggalLahir) {
                const minBaptisDate = new Date(tanggalLahir);
                minBaptisDate.setDate(minBaptisDate.getDate() + 1);
                tanggalBaptisInput.min = minBaptisDate.toISOString().split('T')[0];
            }
        };
    
        const updateSidiMinDate = () => {
            const tanggalBaptis = tanggalBaptisInput.value;
            if (tanggalBaptis) {
                const minSidiDate = new Date(tanggalBaptis);
                minSidiDate.setDate(minSidiDate.getDate() + 1);
                tanggalSidiInput.min = minSidiDate.toISOString().split('T')[0];
            }
        };
    
        tanggalLahirInput.addEventListener('change', () => {
            updateBaptisMinDate();
            updateSidiMinDate();
        });
    
        tanggalBaptisInput.addEventListener('change', updateSidiMinDate);
    
        // Initial call to set min dates if values are already filled
        updateBaptisMinDate();
        updateSidiMinDate();
    });
    </script>
    
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var optionRadios = document.querySelectorAll('input[name="baptis"], input[name="sidi"]');
        var additionalFields = document.getElementById('additional_fields');
        var additionalSidiFields = document.getElementById('additional_sidi_fields');
        const jenisKelaminElements = document.querySelectorAll('input[name="jenis_kelamin"]');
        const posisiDiKeluargaElement = document.getElementById('posisi_di_keluarga');
        const form = document.querySelector('form');
    
        function toggleAdditionalFields(option, additionalFieldsElement) {
            if (option === 'Ya') {
                additionalFieldsElement.style.display = 'block';
            } else {
                additionalFieldsElement.style.display = 'none';
            }
        }
        function setJenisKelamin(posisi) {
        if (posisi === 'Suami') {
            document.getElementById('jenis_kelamin1').checked = true;
        } else if (posisi === 'Istri') {
            document.getElementById('jenis_kelamin2').checked = true;
        }
    }

    function validateSelection() {
        const selectedGender = document.querySelector('input[name="jenis_kelamin"]:checked');
        const selectedPosition = posisiDiKeluargaElement.value;

        if (selectedPosition === 'Suami' && selectedGender && selectedGender.value !== 'Laki-laki') {
            document.getElementById('jenis_kelamin1').checked = true;
        } else if (selectedPosition === 'Istri' && selectedGender && selectedGender.value !== 'Perempuan') {
            document.getElementById('jenis_kelamin2').checked = true;
        } else if (selectedGender && selectedGender.value === 'Laki-laki' && selectedPosition === 'Istri') {
            posisiDiKeluargaElement.value = 'Suami';
        } else if (selectedGender && selectedGender.value === 'Perempuan' && selectedPosition === 'Suami') {
            posisiDiKeluargaElement.value = 'Istri';
        }
    }

    function handlePosisiChange() {
        setJenisKelamin(this.value);
        validateSelection();
    }

    function handleJenisKelaminChange() {
        validateSelection();
    }

    posisiDiKeluargaElement.addEventListener('change', handlePosisiChange);

    jenisKelaminElements.forEach(element => {
        element.addEventListener('change', handleJenisKelaminChange);
    });

    form.addEventListener('submit', function(event) {
        validateSelection();  // Ensure the selection is validated one last time before submission
    });
    
        optionRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                if (this.name === 'baptis') {
                    toggleAdditionalFields(this.value, additionalFields);
                }
                if (this.name === 'sidi') {
                    toggleAdditionalFields(this.value, additionalSidiFields);
                }
            });
        });
    
        optionRadios.forEach(function(radio) {
            if (radio.checked) {
                if (radio.name === 'baptis') {
                    toggleAdditionalFields(radio.value, additionalFields);
                }
                if (radio.name === 'sidi') {
                    toggleAdditionalFields(radio.value, additionalSidiFields);
                }
            }
        });
    });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const posisiDiKeluarga = document.getElementById('posisi_di_keluarga');
            const statusPernikahanElement = document.getElementById('status_pernikahan');
    
            function handlePosisiChange() {
                const selectedPosition = posisiDiKeluarga.value;
    
                if (selectedPosition === 'Suami' || selectedPosition === 'Istri') {
                    statusPernikahanElement.querySelectorAll('option').forEach(option => {
                        if (option.value === 'Belum Menikah') {
                            option.disabled = true;
                        } else {
                            option.disabled = false;
                        }
                    });
                } else {
                    statusPernikahanElement.querySelectorAll('option').forEach(option => {
                        if (option.value === 'Menikah' || option.value === 'Cerai Mati' ) {
                            option.disabled = true;
                        } else {
                            option.disabled = false;
                        }
                    });
                }
            }
    
            posisiDiKeluarga.addEventListener('change', handlePosisiChange);
    
            // Call the function initially to set the appropriate options based on the initial selection
            handlePosisiChange();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const baptisYes = document.getElementById('baptis1');
            const baptisNo = document.getElementById('baptis2');
            const sidiYes = document.getElementById('sidi1');
            const sidiNo = document.getElementById('sidi2');
    
            const baptisFields = document.getElementById('baptis_fields');
            const tanggalBaptis = document.getElementById('tanggal_baptis');
            const namaPendetaBaptis = document.getElementById('nama_pendeta_baptis');
            const nomorSuratBaptis = document.getElementById('nomor_surat_baptis');
    
            const sidiFields = document.getElementById('sidi_fields');
            const tanggalSidi = document.getElementById('tanggal_sidi');
            const namaPendetaSidi = document.getElementById('nama_pendeta_sidi');
            const nomorSuratSidi = document.getElementById('nomor_surat_sidi');
    
            function toggleFields(radioYes, radioNo, fields, ...inputs) {
                if (radioYes.checked) {
                    fields.style.display = 'block';
                    inputs.forEach(input => input.setAttrIstrite('required', 'required'));
                } else if (radioNo.checked) {
                    fields.style.display = 'none';
                    inputs.forEach(input => input.removeAttrIstrite('required'));
                }
            }
    
            baptisYes.addEventListener('change', function() {
                toggleFields(baptisYes, baptisNo, baptisFields, tanggalBaptis, namaPendetaBaptis, nomorSuratBaptis);
            });
    
            baptisNo.addEventListener('change', function() {
                toggleFields(baptisYes, baptisNo, baptisFields, tanggalBaptis, namaPendetaBaptis, nomorSuratBaptis);
            });
    
            sidiYes.addEventListener('change', function() {
                toggleFields(sidiYes, sidiNo, sidiFields, tanggalSidi, namaPendetaSidi, nomorSuratSidi);
            });
    
            sidiNo.addEventListener('change', function() {
                toggleFields(sidiYes, sidiNo, sidiFields, tanggalSidi, namaPendetaSidi, nomorSuratSidi);
            });
        });
    </script>

