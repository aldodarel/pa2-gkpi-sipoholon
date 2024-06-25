<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css" />
<style type="text/css">
    .table-wrapper-scroll-x {
        overflow-x: auto;
    }

    th, td {
        white-space: normal !important;
        word-wrap: break-word;
    }
</style>

<div class="col-9">
    <h2 class="text">Daftar Berita Gereja</h2>
</div>
<div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
    <div class="d-flex">
        @if ($navbars == StaticVariable::$navbarPengurusHarian)
            <a href="/pengurusharian/{{ StaticVariable::$user->nik }}/tambah-berita" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Berita Ibadah</span>
            </a>
        @elseif($navbars == StaticVariable::$navbarPendeta)
            <a href="/pendeta/{{ StaticVariable::$user->nik }}/tambah-berita" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Berita Ibadah</span>
            </a>
        @elseif($navbars == StaticVariable::$navbarPenatua)
            <a href="/penatua/{{ StaticVariable::$user->nik }}/tambah-berita" class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Berita Ibadah</span>
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
                        <th scope="col">Gambar</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($berita_gereja as $item)
                        <tr>
                            <td class="td1">
                                @if ($item['created_at'] == $item['updated_at'])
                                    {{ \Carbon\Carbon::parse($item['created_at'])->isoFormat('YYYY-MM-DD') }}
                                @else
                                    {{ \Carbon\Carbon::parse($item['updated_at'])->isoFormat('YYYY-MM-DD') }}
                                @endif
                            </td>
                            <td class="td1">{{ $item['judul'] }}</td>
                            <td class="td1">
                                <img alt="" class="img-responsive img-fluid rounded" width="100" src="{{ asset($item->lampiran) }}">
                            </td>
                            <td>
                                <div class="d-flex gap-3 flex-column flex-md-row">
                                    @if ($navbars == StaticVariable::$navbarPengurusHarian)
                                        <a href="/pengurusharian/{{ StaticVariable::$user->nik }}/ubah-berita/{{ $item->id }}" data-toggle="tooltip" data-placement="bottom" class="btn btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="/pengurusharian/detail-berita/{{ $item->id }}" data-toggle="tooltip" data-placement="bottom" title="Lihat Data Berita" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                    @elseif($navbars == StaticVariable::$navbarPendeta)
                                        <a href="/pendeta/{{ StaticVariable::$user->nik }}/ubah-berita/{{ $item->id }}" data-toggle="tooltip" data-placement="bottom" class="btn btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="/pendeta/detail-berita/{{ $item->id }}" data-toggle="tooltip" data-placement="bottom" title="Lihat Data Berita" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                    @elseif($navbars == StaticVariable::$navbarPenatua)
                                        <a href="/penatua/{{ StaticVariable::$user->nik }}/ubah-berita/{{ $item->id }}" data-toggle="tooltip" data-placement="bottom" class="btn btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="/penatua/detail-berita/{{ $item->id }}" data-toggle="tooltip" data-placement="bottom" title="Lihat Data Berita" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
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
                [0, "desc"]
            ],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ Daftar berita per halaman",
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
