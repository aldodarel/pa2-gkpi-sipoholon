<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <div class="col-12 bg-white p-3 ">
        <div class="row">
            <div class="row col-lg-12 col-md-4 border-bottom">
                <div class="col-10 text-center">
                    <h2 class="text">Profil {{ $jemaat['name'] }}</h2>
                    <p class="text"></p>
                </div>
            </div>
            <div class="col-md-7 col-12">
                <div class="table-responsive col-md-11 col-12">
                <table class="mt-4 table">
                    <tr>
                        <td>No NIK</td>
                        <td>{{ $jemaat['nik'] }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>{{ $jemaat['name'] }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>{{ $jemaat['no_telepon'] }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{ $jemaat['jenis_kelamin'] }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $jemaat['alamat'] }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $jemaat['status_gereja'] }}</td>
                    </tr>
                    <tr>
                        <td>Status Pernikahan</td>
                        <td>{{ $jemaat['status_pernikahan'] }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>{{ $jemaat['tempat_lahir'] }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>{{ \Carbon\Carbon::parse($jemaat['tanggal_lahir'])->isoFormat('D MMMM YYYY') }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan Baptis</td>
                        <td>{{ $jemaat['baptis'] }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan Sidi</td>
                        <td>{{ $jemaat['sidi'] }}</td>
                    </tr>
                    </tr>
                    @foreach ($lampiran as $l)
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
                        </tr>
                    @endforeach
                </table>
            
               
                    @if ($jemaat['baptis'] == 'Ya')
                        <!-- Detail Baptis -->
                        <h3 class="fs-3 fw-bold">Detail Baptis</h3>
                        <table class="mt-4 table">
                            <tr>
                                <td>Tanggal Baptis</td>
                                <td>{{ $baptis['tgl_baptis'] }}</td>
                            </tr>
                            <tr>
                                <td>Nama Pendeta</td>
                                <td>{{ $baptis['nama_pendeta_baptis'] }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Surat Baptis</td>
                                <td>{{ $baptis['no_surat_baptis'] }}</td>
                            </tr>
                            @foreach ($file_surat_baptis as $l)
                                <tr>
                                    <td>Lampiran Surat Baptis</td>
                                    @if (!$file_surat_baptis || count($file_surat_baptis) == 0 || (count($file_surat_baptis) == 1 && trim($file_surat_baptis[0]) == ''))
                                    <td><em>Lampiran tidak tersedia</em></td>
                                    @else
                                    @foreach ($file_surat_baptis as $l)
                                    @if (trim($l) != '')
                                        <td><a target="_BLANK" href="{{ $l }}">{{ basename($l) }}</a></td>
                                    @endif
                                    @endforeach
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    @endif
    
                    @if ($jemaat['sidi'] == 'Ya')
                        <!-- Detail Sidi -->
                        <h3 class="fs-3 fw-bold">Detail Sidi</h3>
                        <table class="mt-4 table">
                            <tr>
                                <td>Tanggal Sidi</td>
                                <td>{{ $sidi['tgl_sidi'] }}</td>
                            </tr>
                            <tr>
                                <td>Nama Pendeta</td>
                                <td>{{ $sidi['nama_pendeta_sidi'] }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Surat Sidi</td>
                                <td>{{ $sidi['no_surat_sidi'] }}</td>
                            </tr>
                            @foreach ($file_surat_sidi as $l)
                                <tr>
                                    <td>Lampiran Surat Sidi</td>
                                    @if (!$file_surat_sidi || count($file_surat_sidi) == 0 || (count($file_surat_sidi) == 1 && trim($file_surat_sidi[0]) == ''))
                                    <td><em>Lampiran tidak tersedia</em></td>
                                    @else
                                    @foreach ($file_surat_sidi as $l)
                                    @if (trim($l) != '')
                                        <td><a target="_BLANK" href="{{ $l }}">{{ basename($l) }}</a></td>
                                    @endif
                                    @endforeach
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
            <div class="col-md-5 col-12">
                <div class="table-responsive col-md-11 col-12">
                    <table class="mt-4 table">
                        <tr>
                            <td><img name ="profile" class="form-control" src="{{ $jemaat['profile'] }}" id = "profile"
                                    alt="" style="width: 250px; height: 300px;" value="{{ $jemaat['profile'] }}"
                                    required>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="table-responsive col-md-11 col-12">
                    <table class="mt-4 table">
                        <tr>
                            <td>Username</td>
                            <td>{{ $jemaat['username'] }}</td>
                        </tr>
                        <tr> 
                            <td colspan="2">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubahKataSandiModal">Ubah Akun</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ubahFotoProfilModal">Ubah Foto Profil</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Ubah Foto Profil -->
<div class="modal fade" id="ubahFotoProfilModal" tabindex="-1" aria-labelledby="ubahFotoProfilModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ubahFotoProfilModalLabel">Ubah Foto Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <form action="{{ route('pendeta.updateFotoProfil', ['nik' => $jemaat['nik']]) }}" method="post" enctype="multipart/form-data"> --}}
                    <form action="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.updateFotoProfil', ['nik' => $jemaat['nik']]) }} @elseif($navbars == StaticVariable::$navbarPendeta) {{ route('pendeta.updateFotoProfil', ['nik' => $jemaat['nik']]) }} @elseif($navbars == StaticVariable::$navbarPenatua) {{ route('penatua.updateFotoProfil', ['nik' => $jemaat['nik']]) }} @elseif($navbars == StaticVariable::$navbarJemaat) {{ route('jemaat.updateFotoProfil', ['nik' => $jemaat['nik']]) }}@endif" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="fotoProfilBaru">Foto Profil Baru</label>
                        <div class="alert alert-info mt-2 d-flex align-items-center" role="alert">
                            <i class="fas fa-info-circle mr-2"></i>
                            <span>Ekstensi lampiran yang diperbolehkan: PNG, JPG, JPEG</span>
                        </div>
                        <input type="file" class="form-control" id="fotoProfilBaru" name="fotoProfilBaru" accept=".png, .jpg, .jpeg" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

   <!-- Modal Ubah Kata Sandi -->
<div class="modal fade" id="ubahKataSandiModal" tabindex="-1" aria-labelledby="ubahKataSandiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ubahKataSandiModalLabel">Ubah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                    <form action="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.konfirmasi', ['nik' => $jemaat['nik']]) }} @elseif($navbars == StaticVariable::$navbarPendeta) {{ route('pendeta.konfirmasi', ['nik' => $jemaat['nik']]) }} @elseif($navbars == StaticVariable::$navbarPenatua) {{ route('penatua.konfirmasi', ['nik' => $jemaat['nik']]) }} @elseif($navbars == StaticVariable::$navbarJemaat) {{ route('jemaat.konfirmasi', ['nik' => $jemaat['nik']]) }}@endif" method="post" id="ubahKataSandiForm">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" type="text" class="form-control" id="username" value="{{ $jemaat['username'] }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="passwordLama">Password Lama</label>
                        <input name="password" type="password" class="form-control" id="passwordLama" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Username and Password -->
<div class="modal fade" id="updateUsernamePasswordModal" tabindex="-1" aria-labelledby="updateUsernamePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateUsernamePasswordModalLabel">Ubah Username and Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(session('success'))
                <div class="alert alert-success">
                 {{ session('success') }}
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger">
                {{ session('error') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.updatepassword', ['nik' => $jemaat['nik']]) }} @elseif($navbars == StaticVariable::$navbarPendeta) {{ route('pendeta.updatepassword', ['nik' => $jemaat['nik']]) }} @elseif($navbars == StaticVariable::$navbarPenatua) {{ route('penatua.updatepassword', ['nik' => $jemaat['nik']]) }} @elseif($navbars == StaticVariable::$navbarJemaat) {{ route('jemaat.updatepassword', ['nik' => $jemaat['nik']]) }}@endif" method="post" id="updateUsernamePasswordForm">

                    @csrf
                    <div class="form-group">
                        <label for="newUsername">New Username</label>
                        <input name="newUsername" type="text" class="form-control" id="newUsername" required>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input name="newPassword" type="password" class="form-control" id="newPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmNewPassword">Confirm New Password</label>
                        <input name="newPassword_confirmation" type="password" class="form-control" id="confirmNewPassword" required>
                    </div>
                    <div class="alert alert-danger" id="passwordError" style="display: none;">
                        Password dan konfirmasi password tidak sama.
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        if ("{{ session('modal') }}" == "ubahKataSandiModal") {
            $('#ubahKataSandiModal').modal('show');
        } else if ("{{ session('modal') }}" == "updateUsernamePasswordModal") {
            $('#updateUsernamePasswordModal').modal('show');
        }
    $('#updateUsernamePasswordForm').on('submit', function(event) {
            var newPassword = $('#newPassword').val();
            var confirmNewPassword = $('#confirmNewPassword').val();

            if (newPassword !== confirmNewPassword) {
                event.preventDefault();
                $('#passwordError').show();
            } else {
                $('#passwordError').hide();
            }
        });
    });
</script>




<!-- Tambahkan input untuk password baru jika diperlukan -->
                    <!-- <div class="form-group">
                        <label for="passwordBaru">Password Baru</label>
                        <input type="password" class="form-control" id="passwordBaru" required>
                    </div> -->