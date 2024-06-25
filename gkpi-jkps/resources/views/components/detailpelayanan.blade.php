<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.jadwal') }} 
            @elseif ($navbars == StaticVariable::$navbarPendeta) 
                {{ route('pendeta.jadwal') }} @elseif ($navbars == StaticVariable::$navbarPenatua) 
                {{ route('penatua.jadwal') }} @else {{ route('jemaat.jadwal') }} @endif"
    class="btn btn-primary">
    <i class="fas fa-arrow-left"></i> <!-- Ikon dari Font Awesome -->
    <span>Kembali</span>
</a>
<a href="{{ route('generate.pdf') }}" class="btn btn-danger">
    <i class="fa-solid fa-file-pdf"></i>
    <span>Unduh</span>
</a>
<br></br>
<div class="col-12 bg-white p-3">
    <div class="row">
        <div class="col-md-7 col-12">
            <h3 class="fs-3 fw-bold">Pelayan Altar</h3>
            <div class="table-responsive col-md-11 col-12">
                <table class="mt-4 table">
                    @foreach ($status_pelayanan as $status)
                        @if ($results[$status]->isNotEmpty())
                            <tr>
                                <td>{{ ucfirst($status) }}</td>
                                <td>
                                    @foreach ($results[$status] as $result)
                                        {{ $result->jemaat->name }}
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="col-12">
                {{-- Tampilkan judul dan tabel pengumpul persembahan hanya jika ada data --}}
                @php
                    $show_persembahan_title = false;
                    foreach ($persembahan as $status) {
                        if ($results_persembahan[$status]->isNotEmpty()) {
                            $show_persembahan_title = true;
                            break;
                        }
                    }
                @endphp
                @if ($show_persembahan_title)
                    <!-- Detail Pengumpul Persembahan -->
                    <h3 class="fs-3 fw-bold">Pengumpul Persembahan</h3>
                    <table class="mt-4 table">
                        @foreach ($persembahan as $status)
                            @if ($results_persembahan[$status]->isNotEmpty())
                                <tr>
                                    <td>{{ ucfirst($status) }}</td>
                                    <td>
                                        @foreach ($results_persembahan[$status] as $result)
                                            {{ $result->jemaat->name }}
                                        @endforeach
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                @endif

                {{-- Tampilkan judul dan tabel penerima tamu hanya jika ada data --}}
                @php
                    $show_penerima_tamu_title = false;
                    foreach ($penerima_tamu as $status) {
                        if ($results_penerima_tamu[$status]->isNotEmpty()) {
                            $show_penerima_tamu_title = true;
                            break;
                        }
                    }
                @endphp
                @if ($show_penerima_tamu_title)
                    <!-- Detail Penerima Tamu -->
                    <h3 class="fs-3 fw-bold">Penerima Tamu</h3>
                    <table class="mt-4 table">
                        @foreach ($penerima_tamu as $status)
                            @if ($results_penerima_tamu[$status]->isNotEmpty())
                                <tr>
                                    <td>{{ ucfirst($status) }}</td>
                                    <td>
                                        @foreach ($results_penerima_tamu[$status] as $result)
                                            {{ $result->jemaat->name }}
                                        @endforeach
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
