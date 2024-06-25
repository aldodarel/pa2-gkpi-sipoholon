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
</style>

<div class="col-9">
    <h2 class="text">Daftar Rancangan Program Kerja</h2>
</div>
<div class="col-12 shadow-sm rounded mt-3 bg-white p-3">

    <div class="col-12 mt-3">
        <div class="table-responsive-sm table-wrapper-scroll-y ">
            <table class="table table-bordered mb-0" id="list">
                <thead>
                    <tr>
                        <th scope="col">Tahun</th>
                        <th scope="col">Lampiran</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($program as $item)
                        <tr>
                            <td class="col-3">{{ $item['tahun'] }}</td>
                            <td class="col-2">
                                @if ($item['lampiran'] !== null)
                                    <a target="_BLANK" href="{{ $item['lampiran'] }}">Lihat
                                        File</a>
                                @endif
                            </td>
                            <td class="col-2">
                                <a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) /pengurusharian/{{ StaticVariable::$user->nik }}/editprogram/{{ $item['id'] }}
                                    @elseif ($navbars == StaticVariable::$navbarPendeta)
                                    /pendeta/editprogram/{{ $item['id'] }} @endif"
                                    class="btn btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
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
                "lengthMenu": "Tampilkan _MENU_ Data program kerja per halaman",
                "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ada program kerja yang dapat ditampilkan",
                "infoFiltered": "(dari _MAX_ total program kerja)",
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
