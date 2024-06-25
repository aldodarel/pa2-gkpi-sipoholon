<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@if(isset($idKeluarga))
<a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.detailkeluarga',['id'=>$idKeluarga]) }} 
            @elseif ($navbars == StaticVariable::$navbarPendeta) 
                {{ route('pendeta.detailkeluarga',['id'=>$idKeluarga]) }} 
            @elseif ($navbars == StaticVariable::$navbarPenatua) 
                {{ route('penatua.detailkeluarga',['id'=>$idKeluarga]) }} 
            @endif"
   class="btn btn-primary">
    <i class="fas fa-arrow-left"></i> <!-- Ikon dari Font Awesome -->
    <span>Kembali</span>
</a>
@else
@if ($navbars == StaticVariable::$navbarPengurusHarian)
    <a href="{{$jemaat->status_gereja == 'Aktif' ? route('pengurusharian.datajemaat') : route('pengurusharian.datajemaattidakaktif') }}"
       class="btn btn-primary">
        <i class="fa fa-arrow-left"></i>
        <span>Kembali</span>
    </a>
@elseif ($navbars == StaticVariable::$navbarPendeta)
    <a href="{{$jemaat->status_gereja == 'Aktif' ? route('pendeta.datajemaat') : route('pendeta.datajemaattidakaktif') }}"
       class="btn btn-primary">
        <i class="fa fa-arrow-left"></i>
        <span>Kembali</span>
    </a>
@elseif ($navbars == StaticVariable::$navbarPenatua)
    <a href="{{$jemaat->status_gereja == 'Aktif' ? route('penatua.datajemaat') : route('penatua.datajemaattidakaktif') }}"
       class="btn btn-primary">
        <i class="fa fa-arrow-left"></i>
        <span>Kembali</span>
    </a>
@endif
@endif
                <br></br>

<div class="col-12 bg-white p-3">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="row col-lg-12 col-md-4 border-bottom">
                <div class="col-10">
                    <h2 class="text">Ubah Data Jemaat</h2>
                    <p class="text">Data Jemaat dapat dengan mudah mengetahui informasi seputar data jemaat</p>
                </div>
            </div>
            <div class="table-responsive col-md-12 col-12">
                <form
                    action="@if ($navbars == StaticVariable::$navbarPengurusHarian) /pengurusharian/data/jemaat/edit/{{ $jemaat['nik'] }}
                @elseif($navbars == StaticVariable::$navbarPendeta)
                    /pendeta/data/jemaat/edit/{{ $jemaat['nik'] }} @elseif($navbars == StaticVariable::$navbarPenatua)
                    /penatua/data/jemaat/edit/{{ $jemaat['nik'] }} @endif"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <table class="mt-4 table">
                        @if (session()->has('berhasilupdatejemaat'))
                            <div class="alert alert-success" role="alert">
                                <p>{{ session('berhasilupdatejemaat') }}</p>
                            </div>
                        @endif
                        <tr>
                            <td>No NIK</td>
                            <td><input type="text" name="nik" class="form-control" id="inputJemaat" value="{{ $jemaat['nik'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td><input type="text" name="name" class="form-control" id="inputJemaat1" value="{{ $jemaat['name'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td><input type="number" name="no_telepon" class="form-control" id="inputJemaat2" placeholder="08xxxxxxxxxx" oninput="if(this.value.length > 13) this.value = this.value.slice(0, 13);" value="{{ $jemaat['no_telepon'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <select name="jenis_kelamin" class="form-control" id="inputJemaat3" required disabled>
                                    <option value="Laki-laki" {{ $jemaat->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $jemaat->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><input type="text" name="alamat" class="form-control" id="inputJemaat4" value="{{ $jemaat['alamat'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <select name="status" class="form-control" id="inputJemaat5" required disabled>
                                    <option value="Aktif" {{ $jemaat->status_gereja == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Meninggal" {{ $jemaat->status_gereja == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
                                    <option value="Pindah" {{ $jemaat->status_gereja == 'Pindah' ? 'selected' : '' }}>Pindah</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Status Pernikahan</td>
                            <td>
                                <select name="status_pernikahan" class="form-control" id="inputJemaat6" required disabled>
                                    <option value="Menikah" {{ $jemaat->status_pernikahan == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                    <option value="Belum Menikah" {{ $jemaat->status_pernikahan == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                    <option value="Cerai Mati" {{ $jemaat->status_pernikahan == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td><input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="inputJemaat16"
                                name="tanggal_lahir" placeholder="" value="{{ $jemaat['tanggal_lahir'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td><input type="text" name="tempat_lahir" class="form-control" id="inputJemaat7" value="{{ $jemaat['tempat_lahir'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="alert alert-info mt-2 d-flex align-items-center" role="alert">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    <Abaikan>Ekstensi lampiran akta lahir yang diperbolehkan: PNG, JPG, JPEG. Abaikan jika tidak ingin mengubah lampiran sebelumnya.</span>
                                </div>
                                </td>
                        </tr>
                        <tr>
                                <tr>
                                    <td>Lampiran Akta Lahir</td>
                                    
                                        @if (!$lampiran || count($lampiran) == 0 || (count($lampiran) == 1 && trim($lampiran[0]) == ''))
                                        <td><em>Lampiran tidak tersedia</em></td>
                                        @else
                                        @foreach ($lampiran as $l)
                                        @if (trim($l) != '')
                                        <td><a target="_BLANK" href="{{ $l }}">{{ basename($l) }}</a></td>
                                        @endif
                                        @endforeach
                                        @endif
                                    </td>
                                </tr>
                            <tr>
                                <td></td>
                                <td><input type="file" name="lampiran[]" class="form-control" id="lampiran_jemaat" disabled></td>
                            </tr>
                        </tr>
                        <tr>
                            <td>Keterangan Baptis</td>
                            <td>
                                <select name="baptis" class="form-control" id="inputJemaat8" required onchange="toggleForm('baptis', this.value)" disabled>
                                    <option value="Tidak" {{ $jemaat['baptis'] == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Ya" {{ $jemaat['baptis'] == 'Ya' ? 'selected' : '' }}>Ya</option>
                                </select>
                            </td>
                        </tr>
                        <tr id="formBaptis" style="display: none;">
                            <td colspan="2">
                                <!-- Form Baptis -->
                                <h2 class="text">Ubah Data Baptis</h2>
                                <table class="mt-4 table">
                                    <tr>
                                        <td>Tanggal Baptis</td>
                                        <td><input type="date" name="tgl_baptis" id="inputJemaat9" class="form-control" value="{{ isset($baptis['tgl_baptis']) ? $baptis['tgl_baptis'] : '' }}" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pendeta</td>
                                        <td><input type="text" name="nama_pendeta_baptis" id="inputJemaat10" class="form-control" value="{{ isset($baptis['nama_pendeta_baptis']) ? $baptis['nama_pendeta_baptis'] : '' }}" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Surat Baptis</td>
                                        <td><input type="text" name="no_surat_baptis" id="inputJemaat11" class="form-control" value="{{ isset($baptis['no_surat_baptis']) ? $baptis['no_surat_baptis'] : '' }}" disabled></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                        <div class="alert alert-info mt-2 d-flex align-items-center" role="alert">
                                            <i class="fas fa-info-circle mr-2"></i>
                                            <Abaikan>Ekstensi lampiran surat baptis yang diperbolehkan: PNG, JPG, JPEG. Abaikan jika tidak ingin mengubah lampiran sebelumnya.</span>
                                        </div>
                                        </td>
                                    </tr>
                                        <tr>
                                            <td>Lampiran Surat Baptis</td>
                                            @if (!$file_surat_baptis || count($file_surat_baptis) == 0 || (count($file_surat_baptis) == 1 && trim($file_surat_baptis[0]) == ''))
                                            <td><em>Lampiran baptis tidak tersedia</em></td>
                                            @else
                                            @foreach ($file_surat_baptis as $l)
                                            @if (trim($l) != '')
                                            <td><a target="_BLANK" href="{{ $l }}">{{ basename($l) }}</a></td>
                                            @endif
                                            @endforeach
                                            @endif
                                        </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="file" name="file_surat_baptis[]" class="form-control" id="lampiran_baptis" disabled></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>Keterangan Sidi</td>
                            <td>
                                <select name="sidi" class="form-control" id="inputJemaat12" required onchange="toggleForm('sidi', this.value)" disabled>
                                    <option value="Tidak" {{ $jemaat['sidi'] == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Ya" {{ $jemaat['sidi'] == 'Ya' ? 'selected' : '' }}>Ya</option>
                                </select>
                            </td>
                        </tr>
                        <tr id="formSidi" style="display: none;">
                            <td colspan="2">
                                <!-- Form Sidi -->
                                <h2 class="text">Ubah Data Sidi</h2>
                                <table class="mt-4 table">
                                    <tr>
                                        <td>Tanggal Sidi</td>
                                        <td><input type="date" name="tgl_sidi" id="inputJemaat13" class="form-control" value="{{ isset($sidi['tgl_sidi']) ? $sidi['tgl_sidi'] : '' }}" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pendeta</td>
                                        <td><input type="text" name="nama_pendeta_sidi" id="inputJemaat14" class="form-control" value="{{ isset($sidi['nama_pendeta_sidi']) ? $sidi['nama_pendeta_sidi'] : '' }}" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Surat Sidi</td>
                                        <td><input type="text" name="no_surat_sidi" id="inputJemaat15" class="form-control" value="{{ isset($sidi['no_surat_sidi']) ? $sidi['no_surat_sidi'] : '' }}" disabled></td>
                                    </tr>
                                        <tr>
                                            <td>Lampiran Surat Sidi</td>
                                            {{-- <div class="alert alert-info mt-2 d-flex align-items-center" role="alert">
                                                <i class="fas fa-info-circle mr-2"></i>
                                                <Abaikan>Ekstensi lampiran surat sidi yang diperbolehkan: PNG, JPG, JPEG. Abaikan jika tidak ingin mengubah lampiran sebelumnya.</span>
                                            </div> --}}
                                            @if (!$file_surat_sidi || count($file_surat_sidi) == 0 || (count($file_surat_sidi) == 1 && trim($file_surat_sidi[0]) == ''))
                                            <td><em>Lampiran sidi tidak tersedia</em></td>
                                            @else
                                            @foreach ($file_surat_sidi as $l)
                                            @if (trim($l) != '')
                                            <td><a target="_BLANK" href="{{ $l }}">{{ basename($l) }}</a></td>
                                            @endif
                                            @endforeach
                                            @endif
                                        </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="file" name="file_surat_sidi[]" class="form-control" id="lampiran_sidi" disabled></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td><button type="button" class="btn btn-warning" onclick="editjemaat()">Ubah Jemaat</button></td>
                            <td><button type="submit" class="btn btn-success" id="tblSave" disabled>Simpan</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="col-12" id="additionalForms">
                <!-- Additional forms for Baptis and Sidi will be displayed here based on selection -->
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tanggalLahirInput = document.getElementById('tanggal_lahir');
            const tanggalBaptisInput = document.getElementById('inputJemaat9');
            const tanggalSidiInput = document.getElementById('inputJemaat13');
            const formBaptis = document.getElementById("formBaptis");
            const formSidi = document.getElementById("formSidi");
            const dropdownBaptis = document.getElementById('inputJemaat8');
        const dropdownSidi = document.getElementById('inputJemaat12');

        if (dropdownBaptis.value === "Ya") {
            formBaptis.style.display = "";
        }

        if (dropdownSidi.value === "Ya") {
            formSidi.style.display = "";
        }
    
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
    
            // Initial check to display forms if already set to "Ya"
            if (document.getElementById("inputJemaat8").value == "Ya") {
                document.getElementById("formBaptis").style.display = "";
                setRequiredAttributes('baptis', true);
            }
            if (document.getElementById("inputJemaat12").value == "Ya") {
                document.getElementById("formSidi").style.display = "";
                setRequiredAttributes('sidi', true);
            }
        });
    
        function toggleForm(type, value) {
            const formBaptis = document.getElementById("formBaptis");
            const formSidi = document.getElementById("formSidi");
    
            if (type === "baptis") {
                formBaptis.style.display = value === "Ya" ? "" : "none";
                setRequiredAttributes(type, value === "Ya");
            } else if (type === "sidi") {
                formSidi.style.display = value === "Ya" ? "" : "none";
                setRequiredAttributes(type, value === "Ya");
            }
        }
    
        function setRequiredAttributes(formType, isRequired) {
            const inputs = document.querySelectorAll(`#form${capitalize(formType)} input, #form${capitalize(formType)} select`);
            inputs.forEach(input => {
                if (isRequired) {
                    input.setAttribute('required', 'required');
                } else {
                    input.removeAttribute('required');
                }
            });
        }
    
        function capitalize(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }
    
        function editjemaat() {
            var elements = document.getElementById("inputJemaat"),
                elements1 = document.getElementById("inputJemaat1"),
                elements2 = document.getElementById("inputJemaat2"),
                elements3 = document.getElementById("inputJemaat3"),
                elements4 = document.getElementById("inputJemaat4"),
                elements5 = document.getElementById("inputJemaat5"),
                elements6 = document.getElementById("inputJemaat6"),
                elements7 = document.getElementById("inputJemaat7"),
                elements8 = document.getElementById("inputJemaat8"),
                elements9 = document.getElementById("inputJemaat9"),
                elements10 = document.getElementById("inputJemaat10"),
                elements11 = document.getElementById("inputJemaat11"),
                elements12 = document.getElementById("inputJemaat12"),
                elements13 = document.getElementById("inputJemaat13"),
                elements14 = document.getElementById("inputJemaat14"),
                elements15 = document.getElementById("inputJemaat15"),
                elements16 = document.getElementById("inputJemaat16"),
                lampiran_jemaat = document.getElementById("lampiran_jemaat"),
                lampiran_baptis = document.getElementById("lampiran_baptis"),
                lampiran_sidi = document.getElementById("lampiran_sidi"),
                tblSave = document.getElementById("tblSave");
    
            var button = document.querySelector(".btn-warning");
    
            var disabled = elements.disabled;
    
            elements.disabled = !disabled;
            elements1.disabled = !disabled;
            elements2.disabled = !disabled;
            elements3.disabled = !disabled;
            elements4.disabled = !disabled;
            elements5.disabled = !disabled;
            elements6.disabled = !disabled;
            elements7.disabled = !disabled;
            elements8.disabled = !disabled;
            elements9.disabled = !disabled;
            elements10.disabled = !disabled;
            elements11.disabled = !disabled;
            elements12.disabled = !disabled;
            elements13.disabled = !disabled;
            elements14.disabled = !disabled;
            elements15.disabled = !disabled;
            elements16.disabled = !disabled;
            lampiran_jemaat.disabled = !disabled;
            lampiran_baptis.disabled = !disabled;
            lampiran_sidi.disabled = !disabled;
            tblSave.disabled = !disabled;
            
            if (!disabled) {
                button.innerHTML = "Ubah Jemaat";
            } else {
                button.innerHTML = "Batal";
            }
        }
    </script>
    


{{-- <script>        
    document.addEventListener("DOMContentLoaded", function() {
        const tanggalLahirInput = document.getElementById('inputJemaat16');
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
        // Initial check to display forms if already set to "Ya"
        if (document.getElementById("inputJemaat8").value == "Ya") {
            document.getElementById("formBaptis").style.display = "";
        }
        if (document.getElementById("inputJemaat12").value == "Ya") {
            document.getElementById("formSidi").style.display = "";
        }
    });

    function toggleForm(type, value) {
        const formBaptis = document.getElementById("formBaptis");
        const formSidi = document.getElementById("formSidi");

        if (type === "baptis") {
            formBaptis.style.display = value === "Ya" ? "" : "none";
        } else if (type === "sidi") {
            formSidi.style.display = value === "Ya" ? "" : "none";
        }
    }

    function editjemaat() {
        var elements = document.getElementById("inputJemaat"),
            elements1 = document.getElementById("inputJemaat1"),
            elements2 = document.getElementById("inputJemaat2"),
            elements3 = document.getElementById("inputJemaat3"),
            elements4 = document.getElementById("inputJemaat4"),
            elements5 = document.getElementById("inputJemaat5"),
            elements6 = document.getElementById("inputJemaat6"),
            elements7 = document.getElementById("inputJemaat7"),
            elements8 = document.getElementById("inputJemaat8"),
            elements9 = document.getElementById("inputJemaat9"),
            elements10 = document.getElementById("inputJemaat10"),
            elements11 = document.getElementById("inputJemaat11"),
            elements12 = document.getElementById("inputJemaat12"),
            elements13 = document.getElementById("inputJemaat13"),
            elements14 = document.getElementById("inputJemaat14"),
            elements15 = document.getElementById("inputJemaat15"),
            elements16 = document.getElementById("inputJemaat16"),
            lampiran_jemaat = document.getElementById("lampiran_jemaat"),
            lampiran_baptis = document.getElementById("lampiran_baptis"),
            lampiran_sidi = document.getElementById("lampiran_sidi"),
            tblSave = document.getElementById("tblSave");

        var button = document.querySelector(".btn-warning");

        if (elements.disabled == true) {
            elements.disabled = false;
            elements1.disabled = false;
            elements2.disabled = false;
            elements3.disabled = false;
            elements4.disabled = false;
            elements5.disabled = false;
            elements6.disabled = false;
            elements7.disabled = false;
            elements8.disabled = false;
            elements9.disabled = false;
            elements10.disabled = false;
            elements11.disabled = false;
            elements12.disabled = false;
            elements13.disabled = false;
            elements14.disabled = false;
            elements15.disabled = false;
            elements16.disabled = false;
            lampiran_jemaat.disabled = false;
            lampiran_baptis.disabled = false;
            lampiran_sidi.disabled = false;
            tblSave.disabled = false;
            button.innerHTML = "Batal";
        } else {
            elements.disabled = true;
            elements1.disabled = true;
            elements2.disabled = true;
            elements3.disabled = true;
            elements4.disabled = true;
            elements5.disabled = true;
            elements6.disabled = true;
            elements7.disabled = true;
            elements8.disabled = true;
            elements9.disabled = true;
            elements10.disabled = true;
            elements11.disabled = true;
            elements12.disabled = true;
            elements13.disabled = true;
            elements14.disabled = true;
            elements15.disabled = true;
            elements16.disabled = true;
            lampiran_jemaat.disabled = true;
            lampiran_baptis.disabled = true;
            lampiran_sidi.disabled = true;
            tblSave.disabled = true;
            button.innerHTML = "Ubah Jemaat";
        }
    }
</script> --}}
