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
    .my-custom-scrollbar {
        position: relative;
        height: 500px;
        overflow: auto;
    }

    .table-wrapper-scroll-y {
        display: block;
    }
</style>
{{-- <section class="mb-5">
    <div class="row">
        <div class="col-md">
            <div class="header-body text-left mb-4">
                <div class="row justify-content">
                    <div class="row col-lg-12 col-md-4 border-bottom">
                        <div class="col-9">
                            <h2 class="text">Daftar Sektor</h2>
                        </div>
                        <div class="col-12 p-3">
                            <div class="col-12 shadow-sm rounded bg-white p-3">
                                <div class="col-12">
                                    <div class="table-responsive-sm">
                                        <table class="table table-bordered" id="list">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Keterangan</th>
                                                    <th scope="col">Pilihan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sektors as $index => $item)
                                                    <tr>
                                                        <td class="col-3">{{ $index + 1 }}</td>
                                                        <td class="col-2">{{ $item['nama'] }}</td>
                                                        <td class="col-2">{{ $item['keterangan'] }}</td>
                                                        <td class="col-2">
                                                            <a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) /pengurusharian/editsektor/{{ $item['id'] }}
                                                                @elseif ($navbars == StaticVariable::$navbarPendeta)
                                                                    /pendeta/editsektor/{{ $item['id'] }} @endif"
                                                                class="btn btn-sm btn-warning hapus-data col-5"
                                                                title="Edit" style="color: white;">Ubah</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
</section> --}}

<div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
    {{-- @if ($massages = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $massages }}
        </div>
    @endif --}}

    {{-- <div class="col-2 d-flex">
            <a href="/pendeta/data/keuangan/add"  class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Data Keuangan</span>
            </a>
        </div> --}}
    <div class="d-flex">
        @if ($navbars == StaticVariable::$navbarPengurusHarian)
            <a href="/pengurusharian/data/sektor/add" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Data Sektor</span>
            </a>
        @elseif($navbars == StaticVariable::$navbarPendeta)
            <a href="/pendeta/data/sektor/add" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Data Sektor</span>
            </a>
        @elseif($navbars == StaticVariable::$navbarPenatua)
            <a href="/penatua/data/sektor/add" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Data Sektor</span>
            </a>
        @endif
    </div>
    <div class="col-12 mt-3">
        <div class="table-responsive-sm table-wrapper-scroll-y">
            <table class="table table-bordered mb-0" id="list">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sektors as $index => $item)
                        <tr>
                            <td>{{ $item['nama'] }}</td>
                            <td>{{ $item['keterangan'] }}</td>
                            <td>
                                <div class="d-flex gap-3 flex-column flex-md-row">
                                <a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) /pengurusharian/editsektor/{{ $item['id'] }}
                                    @elseif ($navbars == StaticVariable::$navbarPendeta)
                                        /pendeta/editsektor/{{ $item['id'] }} @endif"
                                    class="btn btn-warning"
                                    title="Edit"><i class="fa fa-pencil"></i></a>
                                </div>
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
                [0, "asc"]
            ],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ Data Sektor per halaman",
                "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ada sektor yang dapat ditampilkan",
                "infoFiltered": "(dari _MAX_ total sektor)",
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
