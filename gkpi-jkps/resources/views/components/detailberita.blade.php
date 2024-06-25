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
<style type="text/css">
    .table-responsive-wrapper {
        overflow-x: auto;
    }
    td {
        white-space: normal !important;
        word-wrap: break-word;
    }
</style>
<div class="col-12 bg-white p-3">
    <div class="row">
        <div class="col-md-12 col-12">
            <h3 class="fs-3 fw-bold">Detail Berita</h3>
            <div class="table-responsive-wrapper col-md-11 col-12">
                <table class="mt-4 table">
                    <tr>
                        <td>Judul</td>
                        <td>{{ $berita_gereja['judul'] }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>@if ($berita_gereja['created_at'] == $berita_gereja['updated_at'])
                            {{ \Carbon\Carbon::parse($berita_gereja['created_at'])->isoFormat('D MMMM YYYY') }}
                        @else
                            {{ \Carbon\Carbon::parse($berita_gereja['updated_at'])->isoFormat('D MMMM YYYY') }}
                        @endif</td>
                    </tr>
                    <tr>
                        <td>Gambar</td>
                        <td><img alt="" class="img-responsive img-fluid rounded" width="250" src="{{ asset($berita_gereja['lampiran']) }}"></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>{{ $berita_gereja['isi'] }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
