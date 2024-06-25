<!-- Icons -->
<link href="{{ asset('/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
<link href="{{ asset('/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css" />
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<style type="text/css">
    .table-wrapper-scroll-y {
        display: block;
    }

    th, .td1 {
        white-space: normal !important;
        word-wrap: break-word;
    }
</style>

<section class="mb-5">
    <div class="row">
        <div class="col-md">
            <div class="header-body text-left mb-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-4 col-md-4">
                        <h2 class="text">Daftar Sektor</h2>
                    </div>
                    <div class="col-lg-12 col-md-4">
                        <div class="form-group mt-3 col-6">
                            <form
                                action="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.getsektor') }}
                        @elseif ($navbars == StaticVariable::$navbarPendeta)
                            {{ route('pendeta.getsektor') }} @endif"
                                method="POST">
                                @csrf
                                <div class="form-group col-12 col-md-6 mt-3">
                                <label class="form-control-label" for="nama_sektor">Nama Sektor</label>
                                <select name="sektor_id" id="sektor_id" class="form-control" onchange="this.form.submit()">
                                    @foreach ($sektors as $sektor)
                                        <option value="{{ $sektor->id }}"
                                            {{ (session('sektor_id') == $sektor->id) ? 'selected' : '' }}>
                                            {{ $sektor->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                {{-- <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#sektor_id').select2();
                                    });
                                </script> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 p-3">
                <div class="col-12 shadow-sm rounded bg-white p-3">
                    <div class="col-12">
                        <div class="col-12 mb-4">
                            <h2>Penatua</h2>
                        </div>  
                        <div class="table-responsive">
                            <table class="table table-bordered" id="jemaat_table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Nomor Telepon</th>
                                    </tr>
                                </thead>
                                <tbody id="jemaat_table_body">
                                    @foreach ($jemaats as $index => $data)
                                        <tr data-sektor="{{ $data->sektor_id }}" class="sektor-{{ $data->sektor_id }}">
                                            <td class="td1">{{ $index + 1 }}</td>
                                            <td class="td1">{{ $data->name }}</td>
                                            <td class="td1">{{ $data->alamat }}</td>
                                            <td class="td1">{{ $data->no_telepon }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 p-3">
                <div class="col-12 shadow-sm rounded bg-white p-3">
                    <div class="col-12">
                        <div class="col-12 mb-4">
                            <h2>Keluarga</h2>
                        </div>  
                        <div class="table-responsive">
                            <table class="table table-bordered" id="jemaat_table2">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Alamat</th>
                                    </tr>
                                </thead>
                                <tbody id="jemaat_table_body2">
                                    @foreach ($keluarga as $index => $data)
                                        <tr data-sektor="{{ $data->id_sektor }}"
                                            class="sektor-{{ $data->id_sektor }}">
                                            <td class="td1">{{ $index + 1 }}</td>
                                            <td class="td1">{{ $data->nama_keluarga }}</td>
                                            <td class="td1">{{ $data->alamat }}</td>
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
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#jemaat_table').DataTable({
            "order": [
                [0, "asc"]
            ],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ Data Penatua Sektor per Halaman",
                "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ada penatua yang dapat ditampilkan",
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
    $(document).ready(function() {
        $('#jemaat_table2').DataTable({
            "order": [
                [0, "asc"]
            ],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ Data Keluarga per Halaman",
                "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ada keluarga yang dapat ditampilkan",
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
