<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js">
</script>

<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css" />
<style type="text/css">
    .table-wrapper-scroll-x {
        overflow-x: auto;
    }
    th, .td1 {
        white-space: normal !important;
        word-wrap: break-word;
    }
</style>

{{-- <section class="mb-5">
    <div class="row">
        <div class="col-md">
            <div class="header-body text-left mb-4">
                <div class="row justify-content">
                    <div class="row col-lg-12 col-md-4 border-bottom">
                        <div class="col-10">
                            <h2 class="text">Daftar Jadwal Ibadah</h2>
                        </div>
                        <div class="col-12 p-3">
                            <div class="col-12 shadow-sm rounded bg-white p-3">
                                <div class="col-12">
                                    <div class="table-responsive-sm">
                                        <table class="table table-bordered" id="list">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nama Ibadah</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Waktu</th>
                                                    <th scope="col">Jenis ibadah</th>
                                                    <th scope="col">Jumlah Hadir</th>
                                                    <th scope="col">Tata Ibadah</th>
                                                    <th scope="col">Pilihan</th>
                                                    <th scope="col">Jadwal Pelayanan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jadwal_ibadah as $item)
                                                    <tr>
                                                        <td class="col-2">{{ $item['name'] }}</td>
                                                        <td>{{ $item['tanggal'] }}</td>
                                                        <td>{{ $item['waktu'] }}</td>
                                                        <td>{{ $item['jenis'] }}</td>
                                                        <td>{{ $item['jumlah_hadir'] }}</td>
                                                        <td>
                                                            @if ($item['tata_ibadah'] !== null)
                                                                <a target="_BLANK"
                                                                    href="{{ $item['tata_ibadah'] }}">Lihat File</a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) /pengurusharian/editjadwal/{{ $item['id'] }}
@elseif ($navbars == StaticVariable::$navbarPendeta)
    /pendeta/editjadwal/{{ $item['id'] }}  @elseif ($navbars == StaticVariable::$navbarPenatua)
    /penatua/editjadwal/{{ $item['id'] }} @endif"
                                                                class="btn btn-sm btn-warning hapus-data" title="Edit"
                                                                style="color: white;">Ubah</a>

                                                        </td>
                                                        <td>
                                                            @if ($jadwal_pelayanan->where('id_jadwal_ibadah', $item['id'])->count() > 0)
                                                                <a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) /pengurusharian/jadwal/pelayanan/{{ $item['id'] }}
                                                                        @elseif ($navbars == StaticVariable::$navbarPendeta)
                                                                            /pendeta/jadwal/pelayanan/{{ $item['id'] }} @elseif ($navbars == StaticVariable::$navbarPenatua)
                                                                            /penatua/jadwal/pelayanan/{{ $item['id'] }} @endif"
                                                                    class="btn btn-sm btn-success hapus-data"
                                                                    title="jadwal_pelayanan" style="color: white;">
                                                                    Lihat Pelayanan
                                                                </a>
                                                                <a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) /pengurusharian/jadwal/editpelayanan/{{ $item['id'] }}
                                                                        @elseif ($navbars == StaticVariable::$navbarPendeta)
                                                                            /pendeta/jadwal/editpelayanan/{{ $item['id'] }} @elseif ($navbars == StaticVariable::$navbarPenatua)
                                                                            /penatua/jadwal/editpelayanan/{{ $item['id'] }} @endif"
                                                                    class="btn btn-sm btn-warning hapus-data"
                                                                    title="Edit" style="color: white;">
                                                                    Ubah
                                                                </a>
                                                            @else
                                                                <a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) /pengurusharian/createpelayanan/{{ $item['id'] }}
                                                                        @elseif ($navbars == StaticVariable::$navbarPendeta)
                                                                            /pendeta/createpelayanan/{{ $item['id'] }} @elseif ($navbars == StaticVariable::$navbarPenatua)
                                                                            /penatua/createpelayanan/{{ $item['id'] }} @endif"
                                                                    class="btn btn-sm btn-success hapus-data"
                                                                    title="jadwal_pelayanan" style="color: white;">
                                                                    Tambah Pelayanan
                                                                </a>
                                                            @endif
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('sweetalert::alert')
</section> --}}

<div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
    <div class="d-flex">
        @if ($navbars == StaticVariable::$navbarPengurusHarian)
            <a href="/pengurusharian/tambah-jadwal" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Jadwal Ibadah</span>
            </a>
        @elseif($navbars == StaticVariable::$navbarPendeta)
            <a href="/pendeta/tambah-jadwal" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Jadwal Ibadah</span>
            </a>
        @elseif($navbars == StaticVariable::$navbarPenatua)
            <a href="/penatua/tambah-jadwal" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Jadwal Ibadah</span>
            </a>
        @endif
    </div>

    <div class="col-12 mt-3">
        <div class="table-responsive">
            <table class="table table-bordered mb-0" id="list">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Nama Ibadah</th>
                        <th scope="col">Jenis Ibadah</th>
                        @if ($navbars == StaticVariable::$navbarPengurusHarian || $navbars == StaticVariable::$navbarPendeta || $navbars == StaticVariable::$navbarPenatua)
                        <th scope="col">Jumlah Hadir</th>
                        @endif
                        <th scope="col">Tata Ibadah</th>
                        @if ($navbars == StaticVariable::$navbarPengurusHarian || $navbars == StaticVariable::$navbarPendeta || $navbars == StaticVariable::$navbarPenatua)
                        <th scope="col">Pilihan</th>
                        @endif
                        <th scope="col">Jadwal Pelayanan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal_ibadah as $item)
                        <tr>
                            <td class="td1">{{ \Carbon\Carbon::parse($item['tanggal'])->isoFormat('YYYY-MM-DD') }}</td>
                            <td class="td1">{{ $item['waktu'] }}</td>
                            <td class="td1">{{ $item['name'] }}</td>
                            <td class="td1">{{ $item['jenis'] }}</td>
                            @if ($navbars == StaticVariable::$navbarPengurusHarian || $navbars == StaticVariable::$navbarPendeta || $navbars == StaticVariable::$navbarPenatua)
                            <td class="td1">{{ $item['jumlah_hadir'] }}</td>
                            @endif
                            <td class="td1">
                                @if ($item['tata_ibadah'] !== null)
                                    <a target="_BLANK"
                                        href="{{ $item['tata_ibadah'] }}">Lihat File</a>
                                @else 
                                <em>Tata Ibadah belum tersedia</em>
                                @endif
                            </td>
                            @if ($navbars == StaticVariable::$navbarPengurusHarian || $navbars == StaticVariable::$navbarPendeta || $navbars == StaticVariable::$navbarPenatua)
                            <td>
                                <a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) /pengurusharian/editjadwal/{{ $item['id'] }}
                                    @elseif ($navbars == StaticVariable::$navbarPendeta)
                                    /pendeta/editjadwal/{{ $item['id'] }}  @elseif ($navbars == StaticVariable::$navbarPenatua)
                                    /penatua/editjadwal/{{ $item['id'] }} @endif"
                                    class="btn btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>

                            </td>
                            @endif
                            <td>
                                @if ($jadwal_pelayanan->where('id_jadwal_ibadah', $item['id'])->count() > 0)
                                    <a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) /pengurusharian/jadwal/pelayanan/{{ $item['id'] }}
                                            @elseif ($navbars == StaticVariable::$navbarPendeta)
                                                /pendeta/jadwal/pelayanan/{{ $item['id'] }} @elseif ($navbars == StaticVariable::$navbarPenatua)
                                                /penatua/jadwal/pelayanan/{{ $item['id'] }} @else /jemaat/jadwal/pelayanan/{{ $item['id'] }} @endif"
                                        title="jadwal_pelayanan" class="btn btn-secondary"><i
                                        class="fa fa-eye"></i> Pelayanan</a>
                                        @if ($navbars == StaticVariable::$navbarPengurusHarian || $navbars == StaticVariable::$navbarPendeta || $navbars == StaticVariable::$navbarPenatua)
                                    <a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) /pengurusharian/jadwal/editpelayanan/{{ $item['id'] }}
                                            @elseif ($navbars == StaticVariable::$navbarPendeta)
                                                /pendeta/jadwal/editpelayanan/{{ $item['id'] }} @elseif ($navbars == StaticVariable::$navbarPenatua)
                                                /penatua/jadwal/editpelayanan/{{ $item['id'] }} @endif"
                                        title="Edit" class="btn btn-warning" title="Edit"><i class="fa fa-pencil"></i> Pelayanan</a>
                                        @endif
                                @else
                                @if ($navbars == StaticVariable::$navbarPengurusHarian || $navbars == StaticVariable::$navbarPendeta || $navbars == StaticVariable::$navbarPenatua)
                                    <a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) /pengurusharian/createpelayanan/{{ $item['id'] }}
                                            @elseif ($navbars == StaticVariable::$navbarPendeta)
                                                /pendeta/createpelayanan/{{ $item['id'] }} @elseif ($navbars == StaticVariable::$navbarPenatua)
                                                /penatua/createpelayanan/{{ $item['id'] }} @endif"
                                        title="jadwal_pelayanan" class="btn btn-success"><i
                                        class="fa fa-plus"></i> Pelayanan</a>
                                @else
                                <em>Pelayanan belum tersedia</em>
                                @endif
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#list').DataTable({
            "order": [
                [0, "desc"]
            ],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ Data jadwal ibadah per halaman",
                "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ada keuangan yang dapat ditampilkan",
                "infoFiltered": "(dari _MAX_ total Keuangan)",
                "search": "Cari :",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "",
                    "previous": ""
                },
            }
        });
    });
</script>
