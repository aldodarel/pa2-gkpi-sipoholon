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
            <h3 class="fs-3 fw-bold">Detail Data Diri</h3>
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
                        <td>Tanggal Lahir</td>
                        <td>{{ \Carbon\Carbon::parse($jemaat['tanggal_lahir'])->isoFormat('D MMMM YYYY') }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>{{ $jemaat['tempat_lahir'] }}</td>
                    </tr>
                    <tr>
                        <td>Kode Registrasi</td>
                        <td>{{ $jemaat['kode_registrasi'] }}</td>
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
                        </table>
                    @endif
                </div>
            
        </div>
        
    </div>
</div>
