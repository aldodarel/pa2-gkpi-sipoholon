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
            <a href="/pengurusharian/data/pelayan/add" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Pelayan</span>
            </a>
        @elseif($navbars == StaticVariable::$navbarPendeta)
            <a href="/pendeta/data/pelayan/add" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Pelayan</span>
            </a>
        @elseif($navbars == StaticVariable::$navbarPenatua)
            <a href="/penatua/data/pelayan/add" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Pelayan</span>
            </a>
        @endif
    </div>

    <div class="col-12 mt-3">
        <div class="table-responsive">
            <table class="table table-bordered mb-0" id="list">
                <thead>
                    <tr>
                        <th scope="col">No NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Peran</th>
                        <th scope="col">Terima Jabatan</th>
                        <th scope="col">Akhir Jabatan</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelayanas as $pelayan)
                        <tr>
                            <td class="td1">{{ $pelayan['nik'] }}</td>
                            <td class="td1">{{ $pelayan->jemaat->name }}</td>
                            <td class="td1">{{ $pelayan['peran'] }}</a></td>
                            <td class="td1">{{ $pelayan['tanggal_terima_jabatan'] }}</td>
                            <td class="td1">{{ $pelayan['tanggal_akhir_jabatan'] }}</td>
                            <td>
                                <div class="d-flex gap-3 flex-column flex-md-row">
                                    @if ($navbars == StaticVariable::$navbarPengurusHarian)
                                        <a href="/pengurusharian/data/pelayan/edit/{{ $pelayan['id'] }}"
                                            data-toggle="tooltip" data-placement="bottom"
                                            title="Edit Data Pelayan" class="btn btn-warning"><i
                                                class="fa fa-pencil"></i></a>
                                    @elseif($navbars == StaticVariable::$navbarPendeta)
                                        <a href="/pendeta/data/pelayan/edit/{{ $pelayan['id'] }}"
                                            data-toggle="tooltip" data-placement="bottom"
                                            title="Edit Data Pelayan" class="btn btn-warning"><i
                                                class="fa fa-pencil"></i></a>
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

<script>
    $(document).ready(function() {
        $('#list').DataTable({
            "order": [
                [3, "desc"]
            ],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ Data pelayan per halaman",
                "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ada pelayan yang dapat ditampilkan",
                "infoFiltered": "(dari _MAX_ total pelayan)",
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
@include('sweetalert::alert')
