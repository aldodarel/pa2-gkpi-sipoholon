<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.dataPemasukanPersembahanIbadah') }} 
            @elseif ($navbars == StaticVariable::$navbarPendeta) 
                {{ route('pendeta.dataPemasukanPersembahanIbadah') }} 
                @elseif ($navbars == StaticVariable::$navbarPenatua) 
                {{ route('penatua.dataPemasukanPersembahanIbadah') }}
                @else
                {{ route('jemaat.dataPemasukanPersembahanIbadah') }}@endif"
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
            <h3 class="fs-3 fw-bold">Detail Pembagian Persembahan Ibadah</h3>
            <div class="table-responsive-wrapper col-md-11 col-12">
                <table class="mt-4 table">
                    <tr>
                        <td>Tanggal</td>
                        <td>{{ \Carbon\Carbon::parse($persembahan->tanggal)->isoFormat('D MMMM YYYY') }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>{{ $persembahan->keterangan}}</td>
                    </tr>
                    @foreach ($kasList as $kas)
                        @if ($persembahan->kasKeuangan->contains('id_kas', $kas->id))
                            <tr>
                                <td>{{ $kas->nama_kas }}</td>
                                <td>{{ $persembahan->kasKeuangan->where('id_kas', $kas->id)->first()->nominal }}</td>
                            </tr>
                        @endif
                    @endforeach
                    <tr>
                        <td><strong>Total Nominal</strong></td>
                        <td><strong>{{ $persembahan->nominal}}</strong></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
