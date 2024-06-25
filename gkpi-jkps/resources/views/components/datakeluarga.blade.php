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
    .table-wrapper-scroll-y {
        display: block;
    }

    th, .td1 {
        white-space: normal !important;
        word-wrap: break-word;
    }
</style>
<div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
    <div class="d-flex">
        @if ($navbars == StaticVariable::$navbarPengurusHarian)
            <a href="/pengurusharian/data/keluarga/add" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Data Keluarga</span>
            </a>
        @elseif($navbars == StaticVariable::$navbarPendeta)
            <a href="/pendeta/data/keluarga/add" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Data Keluarga</span>
            </a>
        @elseif($navbars == StaticVariable::$navbarPenatua)
            <a href="/penatua/data/keluarga/add" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Data Keluarga</span>
            </a>
        @endif
    </div>
    <div class="col-12 mt-3">
        <div class="table-responsive">
            <table class="table table-bordered mb-0" id="list">
                <thead>
                    <tr>
                        <th scope="col">No KK</th>
                        <th scope="col">Nama Keluarga</th>
                        <th scope="col">Sektor</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody name="data" id="data">
                    @foreach ($keluargas as $keluarga)
                        <tr>
                            <td class="td1">{{ $keluarga['no_kk'] }}</td>
                            <td class="td1">{{ $keluarga['nama_keluarga'] }}</a></td>
                            <td class="td1">{{ $keluarga->sektor->nama }}</td>
                            <td>
                                <div class="d-flex gap-3 flex-column flex-md-row">
                                    @if ($navbars == StaticVariable::$navbarPengurusHarian)
                                        <a href="/pengurusharian/editdatakeluarga/{{ $keluarga['no_kk'] }}"
                                            data-toggle="tooltip" data-placement="bottom" title="Edit Data Keluarga"
                                            class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                        <a href="/pengurusharian/data/keluarga/{{ $keluarga['no_kk'] }}"
                                            data-toggle="tooltip" data-placement="bottom"
                                            title="Lihat Data Keluarga" class="btn btn-secondary"><i
                                                class="fa fa-eye"></i></a>
                                    @elseif($navbars == StaticVariable::$navbarPendeta)
                                        <a href="/pendeta/editdatakeluarga/{{ $keluarga['no_kk'] }}"
                                            data-toggle="tooltip" data-placement="bottom" title="Edit Data Keluarga"
                                            class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                        <a href="/pendeta/data/keluarga/{{ $keluarga['no_kk'] }}"
                                            data-toggle="tooltip" data-placement="bottom"
                                            title="Lihat Data Keluarga" class="btn btn-secondary"><i
                                                class="fa fa-eye"></i></a>
                                    @elseif($navbars == StaticVariable::$navbarPenatua)
                                        <a href="/penatua/editdatakeluarga/{{ $keluarga['no_kk'] }}"
                                            data-toggle="tooltip" data-placement="bottom" title="Edit Data Keluarga"
                                            class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                        <a href="/penatua/data/keluarga/{{ $keluarga['no_kk'] }}"
                                            data-toggle="tooltip" data-placement="bottom"
                                            title="Lihat Data Keluarga" class="btn btn-secondary"><i
                                                class="fa fa-eye"></i></a>
                                    @elseif($navbars == StaticVariable::$navbarJemaat)
                                        <a href="/jemaat/data/keluarga/{{ $keluarga['no_kk'] }}"
                                            data-toggle="tooltip" data-placement="bottom"
                                            title="Lihat Data Keluarga" class="btn btn-secondary"><i
                                                class="fa fa-eye"></i></a>
                                    @endif
                                </div>
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
    $(document).ready(function() {
        $('#list').DataTable({
            "order": [
                [0, "desc"]
            ],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ Data Keluarga per halaman",
                "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ada Keluarga yang dapat ditampilkan",
                "infoFiltered": "(dari _MAX_ total keluarga)",
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
