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

{{-- <section class="mb-5">
    <div class="row">
        <div class="col-md">
            <div class="header-body text-left mb-4">
                <div class="row justify-content">
                    <div class="row col-lg-12 col-md-4 border-bottom">
                        <div class="col-9">
                            <h2 class="text">Daftar Renungan Harian</h2>
                        </div>
                        <div class="col-12 p-3">
                            <div class="col-12 shadow-sm rounded bg-white p-3">
                                <div class="col-12">
                                    <div class="table-responsive-sm">
                                        <table class="table table-bordered" id="list">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Judul</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Ayat</th>
                                                    <th scope="col">Pilihan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($renungan as $item)
                                                    <tr>
                                                        <td class="col-3">{{ $item['title'] }}</td>
                                                        <td class="col-2">{{ $item['tanggal'] }}</td>
                                                        <td class="col-2">{{ $item['ayat'] }}</td>
                                                        <td class="col-2">
                                                            <a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) /pengurusharian/editrenungan/{{ $item['id'] }}
                                                                @elseif ($navbars == StaticVariable::$navbarPendeta)
                                                                    /pendeta/editrenungan/{{ $item['id'] }} @endif"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<div class="col-9">
    <h2 class="text">Daftar Renungan Harian</h2>
</div>
<div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
    <div class="d-flex">
        @if ($navbars == StaticVariable::$navbarPengurusHarian)
            <a href="/pengurusharian/{{ StaticVariable::$user->nik }}/tambah-renungan" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Renungan</span>
            </a>
        @elseif($navbars == StaticVariable::$navbarPendeta)
            <a href="/pendeta/{{ StaticVariable::$user->nik }}/tambah-renungan" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Renungan</span>
            </a>
        @elseif($navbars == StaticVariable::$navbarPenatua)
            <a href="/penatua/{{ StaticVariable::$user->nik }}/tambah-renungan" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Renungan</span>
            </a>
        @endif
    </div>

    <div class="col-12 mt-3">
        <div class="table-responsive">
            <table class="table table-bordered mb-0" id="list">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Ayat</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($renungan as $item)
                        <tr>
                            <td class="td1">{{ \Carbon\Carbon::parse($item['tanggal'])->isoFormat('YYYY-MM-DD') }}</td>
                            <td class="td1">{{ $item['title'] }}</td>
                            <td class="td1">{{ $item['ayat'] }}</td>
                            <td>
                                <a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) /pengurusharian/{{ StaticVariable::$user->nik }}/editrenungan/{{ $item['id'] }}
                                    @elseif ($navbars == StaticVariable::$navbarPendeta)
                                        /pendeta/{{ StaticVariable::$user->nik }}/editrenungan/{{ $item['id'] }} @endif"
                                    class="btn btn-warning "
                                    title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href= "@if ($navbars == StaticVariable::$navbarPengurusHarian) /pengurusharian/renungan/{{ $item->id }} 
                                        @elseif ($navbars == StaticVariable::$navbarPendeta) /pendeta/renungan/{{ $item->id }} @endif" 
                                        data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Renungan" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
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
                "lengthMenu": "Tampilkan _MENU_ Data renungan per halaman",
                "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ada renungan yang dapat ditampilkan",
                "infoFiltered": "(dari _MAX_ total renungan)",
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
