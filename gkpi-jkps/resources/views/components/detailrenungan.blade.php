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
            <h3 class="fs-3 fw-bold">Detail Renungan</h3>
            <div class="table-responsive-wrapper col-md-11 col-12">
                <table class="mt-4 table">
                    <tr>
                        <td>Judul</td>
                        <td>{{ $renungan['title'] }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>{{ \Carbon\Carbon::parse($renungan['tanggal'])->isoFormat('D MMMM YYYY') }}</td>
                    </tr>
                    <tr>
                        <td>Ayat</td>
                        <td>{{ $renungan['ayat'] }}</td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>{{ $renungan['isi'] }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
