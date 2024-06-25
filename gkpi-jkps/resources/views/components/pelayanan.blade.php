<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

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


<section class="mb-5">
    <div class="row">
        <div class="col-md">
            <div class="header-body text-left mb-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-4 col-md-4">
                        <h2 class="text">Daftar Pelayanan</h2>
                    </div>
                    <div class="col-lg-12 col-md-4">
                        <div class="form-group mt-3 col-6">
                            <form action="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.getpelayanan') }}
                            @elseif ($navbars == StaticVariable::$navbarPendeta)
                            {{ route('pendeta.getpelayanan') }}  @elseif ($navbars == StaticVariable::$navbarPenatua)
                            {{ route('penatua.getpelayanan') }} @endif"
                            method="POST">
                            @csrf
                                <div class="form-group col-12 col-md-6 mt-3">
                                    <label class="form-control-label" for="nama_pelayan">Nama Pelayan</label>
                                    <select name="id_pelayan" id="id_pelayan" class="form-control">
                                        @foreach ($pelayans as $item)
                                        <option value="{{ $item->id }}" {{ (session('id_pelayan') == $item->id) ? 'selected' : '' }}>
                                            {{ $item->jemaat->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('#id_pelayan').select2();
                                        });
                                    </script>
                                </div>
                                <div class="form-group col-12 col-md-6 mt-3">
                                    <label class="form-control-label" for="tahun">Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror">
                                        <option disabled selected>Pilih Tahun</option>
                                        @for ($year = 2024; $year <= now()->year; $year++)
                                            <option value="{{ $year }}" {{ (session('tahun') == $year) ? 'selected' : '' }}>{{ $year }}</option>
                                        @endfor
                                    </select>
                                    @error('tahun')
                                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                                    @enderror
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('#tahun').select2();
                                        });
                                    </script>
                                </div>
                                <div class="form-group col-12 col-md-6 mt-3">
                                    <button type="submit" class="btn btn-primary" name="submit" value="cari">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 p-3">
                <div class="col-12 shadow-sm rounded bg-white p-3">
                    <div class="col-12 mt-3">
                            <!-- Tampilkan jumlah pelayanan di bagian atas tabel -->
                        <div class="col-12 mb-4">
                            <h4>Jumlah Pelayanan: {{ $jumlahPelayanan }}</h4>
                        </div>  
                        <div class="table-responsive">
                            <table class="table table-bordered" id="jemaat_table">
                                <thead>
                                    <tr>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Nama Ibadah</th>
                                        <th scope="col">Status Pelayanan</th>
                                    </tr>
                                </thead>
                                <tbody id="jemaat_table_body">
                                    @foreach ($jadwalPelayanan as $index => $pelayanan)
                                        <tr>
                                            <td class="td1">
                                                @if ($pelayanan && is_object($pelayanan->jadwalIbadah))
                                                    {{ \Carbon\Carbon::parse($pelayanan->jadwalIbadah->tanggal)->isoFormat('YYYY-MM-DD') }}
                                                @else
                                                    Tanggal Tidak Tersedia
                                                @endif
                                            </td>
                                            <td class="td1">
                                                @if ($pelayanan && is_object($pelayanan->jadwalIbadah))
                                                    {{ $pelayanan->jadwalIbadah->name }}
                                                @else
                                                    Nama Ibadah Tidak Tersedia
                                                @endif
                                            </td>
                                            <td class="td1">{{ $pelayanan->status_pelayanan }}</td>
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

<script src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>  
<script>
    $(document).ready(function() {
        $('#jemaat_table').DataTable({
            "order": [
                [0, "desc"]
            ],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ Data Jadwal Pelayanan per Halaman",
                "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ada jadwal pelayanan yang dapat ditampilkan",
                "infoFiltered": "(dari _MAX_ total jadwal pelayanan)",
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
{{-- @endsection --}}

