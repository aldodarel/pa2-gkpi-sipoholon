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
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> --}}
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- <div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
        <div class="col-12 mt-3">
            <div class="table-responsive-sm">
                <table class="table table-bordered" id="list">
                    <thead>
                        <th style="width: 130px;">NIK</th>
                        <th style="min-width: 140px;">Nama</th>
                        <th class="col-3">Alamat</th>
                        <th class="col-3">Status</th>
                        <th>Pilihan</th>
                    </thead>
                    <tbody>
                        @foreach ($jemaats as $jemaat)
                            <tr>
                                <td>
                                    {{ $jemaat['nik'] }}
                                </td>
                                <td>
                                    {{ $jemaat->name }}</a>
                                </td>
                                <td>
                                    {{ $jemaat['alamat'] }}
                                </td>
                                <td>
                                    {{ $jemaat['status_gereja'] }}
                                </td>
                                <td>
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                        @if ($navbars == StaticVariable::$navbarPengurusHarian)
                                            <a href="/pengurusharian/data/jemaat/edit/{{ $jemaat->nik }}"
                                                data-toggle="tooltip" data-placement="bottom" title="Edit Data Jemaat"
                                                class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="/pengurusharian/data/jemaat/{{ $jemaat->nik }}"
                                                data-toggle="tooltip" data-placement="bottom" title="Lihat Data Jemaat"
                                                class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                        @elseif($navbars == StaticVariable::$navbarPendeta)
                                            <a href="/pendeta/data/jemaat/edit/{{ $jemaat->nik }}"
                                                data-toggle="tooltip" data-placement="bottom" title="Edit Data Jemaat"
                                                class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="/pendeta/data/jemaat/{{ $jemaat->nik }}" data-toggle="tooltip"
                                                data-placement="bottom" title="Lihat Data Jemaat"
                                                class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                            <a href="/pendeta/data/jemaat/keluargabaru/{{ $jemaat->nik }}" class="btn btn-secondary" onclick="confirmAddition(event)"><i class="fa fa-users"></i></a>
                                        @elseif($navbars == StaticVariable::$navbarPenatua)
                                            <a href="/penatua/data/jemaat/edit/{{ $jemaat->nik }}"
                                                data-toggle="tooltip" data-placement="bottom" title="Edit Data Jemaat"
                                                class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="/penatua/data/jemaat/{{ $jemaat->nik }}" data-toggle="tooltip"
                                                data-placement="bottom" title="Lihat Data Jemaat"
                                                class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                            <a href="/penatua/data/jemaat/keluargabaru/{{ $jemaat->nik }}" class="btn btn-secondary" onclick="confirmAddition(event)"><i class="fa fa-users"></i></a>
                                        @elseif($navbars == StaticVariable::$navbarJemaat)
                                            <a href="/jemaat/data/jemaat/{{ $jemaat->nik }}" data-toggle="tooltip"
                                                data-placement="bottom" title="Lihat Data Jemaat"
                                                class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $jemaats->links() }}
        </div>
    </div> --}}

<div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
    <div class="col-12 mt-3">
        <div class="table-responsive">
            <table class="table table-bordered mb-0" id="list">
                <thead>
                    <tr>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jemaats as $jemaat)
                            <tr>
                                <td class="td1">
                                    {{ $jemaat['nik'] }}
                                </td>
                                <td class="td1">
                                    {{ $jemaat->name }}</a>
                                </td>
                                <td class="td1">
                                    {{ $jemaat['alamat'] }}
                                </td>
                                <td class="td1">
                                    {{ $jemaat['status_gereja'] }}
                                </td>
                                <td>
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                        @if ($navbars == StaticVariable::$navbarPengurusHarian)
                                            <a href="/pengurusharian/data/jemaat/edit/{{ $jemaat->nik }}"
                                                data-toggle="tooltip" data-placement="bottom" title="Edit Data Jemaat"
                                                class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="/pengurusharian/data/jemaat/{{ $jemaat->nik }}"
                                                data-toggle="tooltip" data-placement="bottom" title="Lihat Data Jemaat"
                                                class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                        @elseif($navbars == StaticVariable::$navbarPendeta)
                                            <a href="/pendeta/data/jemaat/edit/{{ $jemaat->nik }}"
                                                data-toggle="tooltip" data-placement="bottom" title="Edit Data Jemaat"
                                                class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="/pendeta/data/jemaat/{{ $jemaat->nik }}" data-toggle="tooltip"
                                                data-placement="bottom" title="Lihat Data Jemaat"
                                                class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                            {{-- <a href="/pendeta/data/jemaat/keluargabaru/{{ $jemaat->nik }}" class="btn btn-secondary" onclick="confirmAddition(event)"><i class="fa fa-users"></i></a> --}}
                                        @elseif($navbars == StaticVariable::$navbarPenatua)
                                            <a href="/penatua/data/jemaat/edit/{{ $jemaat->nik }}"
                                                data-toggle="tooltip" data-placement="bottom" title="Edit Data Jemaat"
                                                class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="/penatua/data/jemaat/{{ $jemaat->nik }}" data-toggle="tooltip"
                                                data-placement="bottom" title="Lihat Data Jemaat"
                                                class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                            {{-- <a href="/penatua/data/jemaat/keluargabaru/{{ $jemaat->nik }}" class="btn btn-secondary" onclick="confirmAddition(event)"><i class="fa fa-users"></i></a> --}}
                                        @elseif($navbars == StaticVariable::$navbarJemaat)
                                            <a href="/jemaat/data/jemaat/{{ $jemaat->nik }}" data-toggle="tooltip"
                                                data-placement="bottom" title="Lihat Data Jemaat"
                                                class="btn btn-secondary"><i class="fa fa-eye"></i></a>
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
    function confirmAddition(event) {
        event.preventDefault();
        const url = event.currentTarget.href;
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda ingin menambah keluarga baru dari jemaat ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, tambah!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>
