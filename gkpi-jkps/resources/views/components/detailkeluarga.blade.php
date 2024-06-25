<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@if ($navbars == StaticVariable::$navbarPengurusHarian)
                    <a href="{{$keluarga->status == 'Aktif' ? route('pengurusharian.datakeluarga') : route('pengurusharian.datakeluargatidakaktif') }}"
                        class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                @elseif ($navbars == StaticVariable::$navbarPendeta)
                    <a href="{{$keluarga->status == 'Aktif'  ? route('pendeta.datakeluarga') : route('pendeta.datakeluargatidakaktif') }}"
                        class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                @elseif ($navbars == StaticVariable::$navbarPenatua)
                    <a href="{{$keluarga->status == 'Aktif'  ? route('penatua.datakeluarga') : route('penatua.datakeluargatidakaktif') }}"
                        class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                @endif
                <br></br>
<div class="col-12 bg-white shadow-sm p-3">
    <div class="row">
        <div class="col-md-7 col-12">
            <h3 class="fs-3 fw-bold">Detail</h3>
            <div class="table-responsive col-md-11 col-12">
                <table class="mt-4 table">
                    <tr>
                        <td>NO KK</td>
                        <td>{{ $keluarga['no_kk'] }}</td>
                    </tr>
                    <tr>
                        <td>Nama Keluarga</td>
                        <td>{{ $keluarga['nama_keluarga'] }}</td>
                    </tr>
                    <tr>
                        <td>Sektor</td>
                        <td>{{ $keluarga->sektor->nama }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $keluarga['alamat'] }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Nikah</td>
                        <td>{{ $keluarga['tanggal_nikah'] }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $keluarga['status'] }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-5 col-12">
            <h3 class="fs-3 fw-bold">Lampiran Akta Pernikahan</h3>
            <table class="mt-4 table">
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
            </table>
        </div>
        
        
        
    </div>
    <div class="col-12 mt-5">
        <div class="d-flex flex-column flex-md-row">
            <h3 class="fs-3 fw-bold">Anggota Keluarga</h3>
            @if ($navbars == StaticVariable::$navbarPengurusHarian)
                <a href="/pengurusharian/data/jemaat/add/{{ $keluarga['no_kk'] }}" class="btn btn-success ms-auto">
                    <i class="fa fa-plus"></i>
                    <span>Tambah Anggota</span>
                </a>
            @elseif($navbars == StaticVariable::$navbarPendeta)
                <a href="/pendeta/data/jemaat/add/{{ $keluarga['no_kk'] }}" class="btn btn-success ms-auto">
                    <i class="fa fa-plus"></i>
                    <span>Tambah Anggota</span>
                </a>
            @elseif($navbars == StaticVariable::$navbarPenatua)
                <a href="/penatua/data/jemaat/add/{{ $keluarga['no_kk'] }}" class="btn btn-success ms-auto">
                    <i class="fa fa-plus"></i>
                    <span>Tambah Anggota</span>
                </a>
            @endif
        </div>
        <div class="table-responsive mt-4">
            <table class="table">
                <thead>
                    <th style="width: 130px;">NIK</th>
                    <th style="min-width: 140px;">Nama</th>
                    <th class="col">Jenis Kelamin</th>
                    <th class="col">Tempat Lahir</th>
                    <th class="col">Tanggal Lahir</th>
                    <th class="col">Kode Registrasi</th>
                    <th class="col">Posisi</th>
                    <th>Pilihan</th>
                </thead>
                <tbody>
                    @foreach ($jemaats as $jemaat)
                        <tr>
                            <td>{{ $jemaat->nik }}</td>
                            <td>{{ $jemaat->name }}</a></td>
                            <td>{{ $jemaat->jenis_kelamin }}</td>
                            <td>{{ $jemaat->tempat_lahir }}</td>
                            <td>{{ $jemaat->tanggal_lahir }}</td>
                            <td>{{ $jemaat->kode_registrasi }}</td>
                            <td>{{ $jemaat->status }}</td>
                            <td>
                                @if ($navbars == StaticVariable::$navbarPengurusHarian)
                                    <a href="/pengurusharian/data/jemaat/editdetail/{{ $keluarga['no_kk'] }}/{{ $jemaat->nik }}"
                                        data-toggle="tooltip" data-placement="bottom" title="Edit Data Jemaat"
                                        class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="/pengurusharian/data/jemaatdetail/{{ $keluarga['no_kk'] }}/{{ $jemaat->nik }}" class="btn btn-secondary"><i
                                            class="fa fa-eye"></i></a>
                                    @if($jemaat->status_pernikahan ==='Belum Menikah' || $jemaat->status_pernikahan ==='Cerai Mati')
                                            <a href="/pengurusharian/data/jemaat/keluargabaru/{{ $keluarga['no_kk'] }}/{{ $jemaat->nik }}" class="btn btn-secondary" onclick="confirmAddition(event)"><i class="fa fa-users"></i></a>
                                    @endif
                                @elseif($navbars == StaticVariable::$navbarPendeta)
                                    <a href="/pendeta/data/jemaat/editdetail/{{ $keluarga['no_kk'] }}/{{ $jemaat->nik }}" data-toggle="tooltip"
                                        data-placement="bottom" title="Edit Data Jemaat" class="btn btn-warning"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="/pendeta/data/jemaatdetail/{{ $keluarga['no_kk'] }}/{{ $jemaat->nik }}" class="btn btn-secondary"><i
                                            class="fa fa-eye"></i></a>
                                            @if($jemaat->status_pernikahan ==='Belum Menikah' || $jemaat->status_pernikahan ==='Cerai Mati')
                                            <a href="/pendeta/data/jemaat/keluargabaru/{{ $keluarga['no_kk'] }}/{{ $jemaat->nik }}" class="btn btn-secondary" onclick="confirmAddition(event)"><i class="fa fa-users"></i></a>
                                            @endif
                                @elseif($navbars == StaticVariable::$navbarPenatua)
                                    <a href="/penatua/data/jemaat/editdetail/{{ $keluarga['no_kk'] }}/{{ $jemaat->nik }}" data-toggle="tooltip"
                                        data-placement="bottom" title="Edit Data Jemaat" class="btn btn-warning"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="/penatua/data/jemaatdetail/{{ $keluarga['no_kk'] }}/{{ $jemaat->nik }}" class="btn btn-secondary"><i
                                            class="fa fa-eye"></i></a>
                                    @if($jemaat->status_pernikahan ==='Belum Menikah' || $jemaat->status_pernikahan ==='Cerai Mati')
                                    <a href="/penatua/data/jemaat/keluargabaru/{{ $keluarga['no_kk'] }}/{{ $jemaat->nik }}" class="btn btn-secondary" onclick="confirmAddition(event)"><i class="fa fa-users"></i></a>
                                    @endif
                                @elseif($navbars == StaticVariable::$navbarJemaat)
                                <a href="/jemaat/data/jemaatdetail/{{ $keluarga['no_kk'] }}/{{ $jemaat->nik }}" class="btn btn-secondary"><i
                                    class="fa fa-eye"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('sweetalert::alert')
<script>
    function confirmAddition(event) {
        event.preventDefault();
        const url = event.currentTarget.href;
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda ingin menambah keluarga baru dari jemaat ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, tambah!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>


