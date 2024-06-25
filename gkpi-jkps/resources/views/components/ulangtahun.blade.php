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
<div class="header-body text-left mt-3 mb-4">
    <div class="row justify-content">
        <div class="row col-lg-12 col-md-4 border-bottom">
            <div class="col-10">
                <h2 class="text">Selamat Ulang Tahun Bapak/ Ibu/ Saudara yang Berulang Tahun Minggu Ini</h2>
                <p class="text">Umur Panjang Ditangan KananNya Ditangan KiriNya Kekayaan dan Kehormatan Sampai Selamanya</p>
            </div>
        </div>
    </div>
</div>
    <div class="col-12 mt-3">
        <div class="table-responsive">
            <table class="table table-bordered mb-0" id="list">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Usia</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jemaats as $jemaat)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($jemaat->tanggal_ulang_tahun)->isoFormat('YYYY-MM-DD') }}</td>
                            <td class="td1">{{ $jemaat->name }}</td>
                            <td class="td1">{{ $jemaat->umur }} Tahun</td>
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
                "lengthMenu": "Tampilkan _MENU_ Data jemaat per halaman",
                "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ada jemaat yang dapat ditampilkan",
                "infoFiltered": "(dari _MAX_ total jemaat)",
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
