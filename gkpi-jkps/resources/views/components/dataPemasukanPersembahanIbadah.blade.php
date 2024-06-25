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
    th, .td1 {
        white-space: normal !important;
        word-wrap: break-word;
    }
</style>
<div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
    <div class="col-12 mt-3">
        <div class="table-responsive">
            <table class="table table-bordered mb-0" id="list">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nominal(Rp)</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody name="data" id="data">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($pemasukan as $keuangan)
                        <form action=""></form>
                        <tr>
                            <td class="td1">{{ \Carbon\Carbon::parse($keuangan->tanggal)->isoFormat('YYYY-MM-DD') }}</td>
                            <td class="td1">{{ $keuangan->nominal }}</td>
                            <td class="td1">{{ $keuangan->keterangan }}</td>
                            <td>
                                <div class="d-flex gap-3 flex-column flex-md-row">
                                    @if ($navbars == StaticVariable::$navbarPengurusHarian)
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Keuangan"
                                            href="/pengurusharian/{{ StaticVariable::$user->nik }}/data/persembahanibadah/pemasukan/edit/{{ $keuangan->id }}"
                                            class="btn btn-warning"><i class="fa fa-edit"></i></a>  
                                        <a href="/pengurusharian/data/persembahanibadah/pembagian/{{ $keuangan->id }}" 
                                            data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Pembagian" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                    @elseif($navbars == StaticVariable::$navbarPendeta)
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Keuangan"
                                            href="/pendeta/{{ StaticVariable::$user->nik }}/data/persembahanibadah/pemasukan/edit/{{ $keuangan->id }}"
                                            class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="/pendeta/data/persembahanibadah/pembagian/{{ $keuangan->id }}" 
                                                data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Pembagian" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                    @elseif($navbars == StaticVariable::$navbarPenatua)
                                    <a href="/penatua/data/persembahanibadah/pembagian/{{ $keuangan->id }}" 
                                        data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Pembagian" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                    @elseif($navbars == StaticVariable::$navbarJemaat)
                                        <a href="/jemaat/data/persembahanibadah/pembagian/{{ $keuangan->id }}" 
                                            data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Pembagian" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
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
