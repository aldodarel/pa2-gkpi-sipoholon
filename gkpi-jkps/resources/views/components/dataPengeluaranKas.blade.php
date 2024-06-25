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
    th, .td1 {
        white-space: normal !important;
        word-wrap: break-word;
    }
</style>
<div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
    <div class="col-12 mt-3">
        <div class="table-responsive-sm table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table table-bordered mb-0" id="list">
                <thead>
                    <tr>
                       
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama Kas</th>
                        <th scope="col">Nominal(Rp)</th>
                        <th scope="col">Keterangan</th>
                        @if ($navbars == StaticVariable::$navbarPengurusHarian || $navbars == StaticVariable::$navbarPendeta)
                        <th scope="col">Pilihan</th>
                        @endif
                    </tr>
                </thead>
                <tbody name="data" id="data">
                    @foreach ($pengeluaran as $keuangan)
                        <form action=""></form>
                        <tr>
                            <td class="td1">{{ \Carbon\Carbon::parse($keuangan->tanggal)->isoFormat('YYYY-MM-DD') }}</td>
                            <td class="td1">{{ $keuangan->kasKeuangan->first()->kas->nama_kas }}</td>
                            <td class="td1">{{ $keuangan->nominal }}</td>
                            <td class="td1">{{ $keuangan->keterangan }}</td>
                            @if ($navbars == StaticVariable::$navbarPengurusHarian || $navbars == StaticVariable::$navbarPendeta)
                            <td>
                                <div class="d-flex gap-3 flex-column flex-md-row">
                                    @if ($navbars == StaticVariable::$navbarPengurusHarian)
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Pengeluaran Kas"
                                            href="/pengurusharian/{{ StaticVariable::$user->nik }}/data/kas/pengeluaran/edit/{{ $keuangan->id }}"
                                            class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    @elseif($navbars == StaticVariable::$navbarPendeta)
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Pengeluaran Kas"
                                            href="/pendeta/{{ StaticVariable::$user->nik }}/data/kas/pengeluaran/edit/{{ $keuangan->id }}"
                                            class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    @endif
                                </div>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

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
                "lengthMenu": "Tampilkan _MENU_ Data Keuangan per halaman",
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
