@extends('layouts.navbar')

@section('navbar')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center"
                style="
          background-image: url('assets/img/1200px-GKPI_Jemaat_Khusus_Pasar_Sipoholon.jpg');
        ">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Tata Ibadah</h2>
                            <p>
                                Tata ibadah di Gereja Jemaat Khusus Pasar Sipoholon dirancang untuk memuliakan Tuhan dan memperdalam iman jemaat. Tata ibadah pada gereja ini terdiri dari tata ibadah minggu, tata ibadah minggu, tata ibadah sektor, tata ibadah situasional, dan tata ibadah dukacita.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="{{ route('home.index') }}">Home</a></li>
                        <li>Tata Ibadah</li>
                    </ol>
                </div>
            </nav>
        </div>
        <!-- End Breadcrumbs -->

        <section id="about" class="about pt-0">
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-lg-12 content pr-5">
                        <div class="section-header">
                            <h3>Tata Ibadah Minggu</h3>
                        </div>
                        <div class="card section-header">
                            <div class="card-body p-0">
                                <div class="table-responsive" style="position: relative">
                                    <table class="table table-striped mb-0">
                                        <thead style="background-color: #002d72">
                                            <tr>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Nama Ibadah</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($mingguan) > 0)
                                                @foreach ($mingguan as $item)
                                                    <tr>
                                                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM YYYY') }}
                                                        </td>
                                                        <td>{{ $item['name'] }}</td>
                                                        <td>
                                                            <a class="btn-tabel" target="_BLANK"
                                                                href="{{ $item['tata_ibadah'] }}">Lihat File</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <p><em>Belum ada Tata Ibadah</em></p>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="about" class="about pt-0">
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-lg-12 content pr-5">
                        <div class="section-header">
                            <h3>Tata Ibadah Sektor</h3>
                        </div>
                        <div class="card section-header">
                            <div class="card-body p-0">
                                <div class="table-responsive" style="position: relative">
                                    <table class="table table-striped mb-0">
                                        <thead style="background-color: #002d72">
                                            <tr>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Nama Ibadah</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($sektor) > 0)
                                                @foreach ($sektor as $item)
                                                    <tr>
                                                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM YYYY') }}
                                                        </td>
                                                        <td>{{ $item['name'] }}</td>
                                                        <td>
                                                            <a class="btn-tabel" target="_BLANK"
                                                                href="{{ $item['tata_ibadah'] }}">Lihat File</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <p><em>Belum ada Tata Ibadah</em></p>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="about pt-0">
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-lg-12 content pr-5">
                        <div class="section-header">
                            <h3>Tata Ibadah Situasional</h3>
                        </div>
                        <div class="card section-header">
                            <div class="card-body p-0">
                                <div class="table-responsive" style="position: relative">
                                    <table class="table table-striped mb-0">
                                        <thead style="background-color: #002d72">
                                            <tr>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Nama Ibadah</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($situasional) > 0)
                                                @foreach ($situasional as $item)
                                                    <tr>
                                                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM YYYY') }}
                                                        </td>
                                                        <td>{{ $item['name'] }}</td>
                                                        <td>
                                                            <a class="btn-tabel" target="_BLANK"
                                                                href="{{ $item['tata_ibadah'] }}">Lihat File</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <p><em>Belum ada Tata Ibadah</em></p>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="about pt-0">
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-lg-12 content pr-5">
                        <div class="section-header">
                            <h3>Tata Ibadah Dukacita</h3>
                        </div>
                        <div class="card section-header">
                            <div class="card-body p-0">
                                <div class="table-responsive" style="position: relative">
                                    <table class="table table-striped mb-0">
                                        <thead style="background-color: #002d72">
                                            <tr>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Nama Ibadah</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($dukacita) > 0)
                                                @foreach ($dukacita as $item)
                                                    <tr>
                                                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM YYYY') }}
                                                        </td>
                                                        <td>{{ $item['name'] }}</td>
                                                        <td>
                                                            <a class="btn-tabel" target="_BLANK"
                                                                href="{{ $item['tata_ibadah'] }}">Lihat File</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <p><em>Belum ada Tata Ibadah</em></p>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Frequently Asked Questions Section -->
    </main>
    <!-- End #main -->
@endsection
