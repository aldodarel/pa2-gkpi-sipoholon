@extends('layouts.navbar')


@section('navbar')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row gy-4 d-flex justify-content-between">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h3 data-aos="fade-up">Selamat Datang di GKPI Jemaat Khusus Pasar Sipoholon!</h3>
                    <h6 data-aos="fade-up" data-aos-delay="100">
                        Gereja GKPI (Gereja Kristen Protestan Indonesia) Jemaat Khusus Pasar Sipoholon adalah sebuah organisasi kerohanian yang berdedikasi untuk melayani komunitas setempat dengan semangat kasih dan kebersamaan. GKPI Sipoholon Didirikan pada tahun 1995, gereja ini telah menjadi tempat bagi jemaat untuk berkumpul, beribadah, dan mendalami ajaran Kristus. Pada tahun 2017, Gereja GKPI Sipoholon memekarkan diri menjadi jemaat khusus pasar sipoholon di bawah naungan Resort Sipoholon, menandai langkah penting dalam pertumbuhan dan pengabdiannya kepada masyarakat. Melalui berbagai kegiatan rohani dan sosial, gereja ini terus berupaya untuk menjadi terang dan berkat bagi semua anggotanya serta lingkungan sekitar.
                    </h6>
                </div>

                {{-- <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <img src="assets/img/banner1.jpg" class="img-fluid mb-3 mb-lg-0"
                        alt="" />
                </div> --}}
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <main id="main">
        <section id="service" class="services pt-0">
            <div class="container pricing about" data-aos="fade-up">
                <div class="section-header content">
                    <h2>Renungan Harian</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <!-- CUSTOM BLOCKQUOTE -->
                        <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                            <div class="blockquote-custom-icon bg-utama shadow-sm">
                                <i class="fa fa-quote-left text-white"></i>
                            </div>
                            @foreach ($renungan1 as $item)
                                <h3 class="d-flex justify-content-center">{{ $item->title }}</h3>
                                <h5 class="d-flex justify-content-center">{{ $item->ayat }}</h5>
                                <p class="mb-0 mt-2 font-italic">
                                    @php
                                        $words = explode(' ', $item->isi);
                                        $trimmed = implode(' ', array_slice($words, 0,50));
                                        $remaining = implode(' ', array_slice($words, 50));
                                    @endphp
                                
                                    @if (count($words) > 50)
                                        {{ $trimmed }}...
                                        <a href="{{ route('home.renungan', ['id' => $item->id]) }}">Lihat Selengkapnya</a>
                                    @else
                                        "{{ $item->isi }}"
                                    @endif
                                </p>
                                <footer class="blockquote-foote pt-1 mt-1 border-top">
                                    <p class="font-small-3">
                                        <i class="bi bi-calendar-week"></i>
                                        {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM YYYY') }}
                                    </p>
                                </footer>
                        </blockquote>
                        <!-- END -->
                        <div class="mt-2 d-flex justify-content-end">
                            <a class="buy-btn" href="{{ route('home.renungan') }}">Lihat Lebih Banyak -></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <section id="minimal-statistics service">
                <div data-aos="fade-up">
                    <div class="about">
                        <div class="section-header content">
                            <h2>Data Statistik Jemaat</h2>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($datakeluargas as $datumkeluarga)
                            <div class="col-xl-4 col-md-12 mb-4" data-aos="fade-up" data-aos-delay="100">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between p-md-1">
                                            <div class="d-flex flex-row">
                                                <div>
                                                    <h4>{{ $datumkeluarga['name'] }}</h4>
                                                    <h5 class="mb-0">{{ $datumkeluarga['jumlah'] }}</h5>
                                                </div>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="{{ $datumkeluarga['icon'] }}"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>

        <section id="about" class="about pt-0">
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-lg-6 content pe-5">
                        <div class="section-header">
                            <h3>Tata Ibadah</h3>
                        </div>
                        <div class="card section-header">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Nama Ibadah</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jadwal_ibadah as $item)
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
                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a class="btn-tabel" href="{{ route('home.ibadah') }}">Lihat Lebih Banyak -></a>
                        </div>
                    </div>

                    <div class="col-lg-6 content ps-5">
                        <div class="section-header">
                            <h3>Jadwal Ibadah</h3>
                        </div>
                        <div class="card section-header">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Nama Ibadah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($jadwal_ibadah2) > 0)
                                            @foreach ($jadwal_ibadah2 as $item)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM YYYY') }}
                                                    </td>
                                                    <td>{{ $item['name'] }}</td>
                                                </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="2">
                                                    <p><em>Belum ada Jadwal Ibadah Terbaru</em></p>
                                                </td>
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
                    <div class="col-lg-6 content pe-5">
                        <div class="section-header">
                            <h3>Jadwal Kegiatan Pelayanan</h3>
                        </div>
                        <div class="card section-header">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Kegiatan</th>
                                                <th>Hari</th>
                                                <th>Pukul</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Les Alat Musik Organ</td>
                                                <td>Senin & Selasa</td>
                                                <td>16.00</td>
                                            </tr>
                                            <tr>
                                                <td>Partangiangan Sektor</td>
                                                <td>Rabu</td>
                                                <td>19.30</td>
                                            </tr>
                                            <tr>
                                                <td>Latihan Koor Ina Debora</td>
                                                <td>Kamis</td>
                                                <td>17.00</td>
                                            </tr>
                                            <tr>
                                                <td>Sermon Penatua (Sintua)</td>
                                                <td>Kamis</td>
                                                <td>19.00</td>
                                            </tr>
                                            <tr>
                                                <td>Latihan Koor Gemende</td>
                                                <td>Jumat</td>
                                                <td>19.30</td>
                                            </tr>
                                            <tr>
                                                <td>Sermon Guru Sekolah Minggu</td>
                                                <td>Sabtu</td>
                                                <td>18.00</td>
                                            </tr>
                                            <tr>
                                                <td>Latihan Koor PP dan Remaja</td>
                                                <td>Sabtu</td>
                                                <td>19.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 content ps-5">
                        <div class="section-header">
                            <h3>Sakramen</h3>
                        </div>
                        <div class="card section-header">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tanggal Sakramen</th>
                                                <th>Nama Sakramen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($sakramen) > 0)
                                                @foreach ($sakramen as $item)
                                                    <tr>
                                                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM YYYY') }}
                                                        </td>
                                                        <td>{{ $item['name'] }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="2">
                                                        <p><em>Belum ada Sakramen Terbaru</em></p>
                                                    </td>
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

        <section id="service" class="services about pt-0">
            <div class="container content" data-aos="fade-up">
                <div class="section-header">
                    <h2>Berita Terbaru Gereja</h2>
                </div>

                <div class="row gy-4">
                    @foreach($berita_gereja as $berita)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            {{-- <div class="card-img">
                                <img src={{ $berita->lampiran }}  alt="" class="img-fluid" />
                            </div> --}}
                            <div class="card-img" style="height: 300px;"> <!-- Atur tinggi sesuai kebutuhan -->
                                <img src="{{ $berita->lampiran }}" alt="" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;" />
                            </div>
                            <h3>
                                <a href="/detail{{$berita->id}}" class="stretched-link">{{ $berita->judul }}</a>
                            </h3>
                            <p>
                                @php
                                    $words = explode(' ', $berita->isi);
                                    $trimmed = implode(' ', array_slice($words, 0, 20));
                                    $remaining = implode(' ', array_slice($words, 20));
                                @endphp
                            
                                @if (count($words) > 20)
                                    {{ $trimmed }}...
                                    <a href="/detail{{$berita->id}}">Lihat Selengkapnya</a>
                                @else
                                    "{{ $berita->isi }}"
                                @endif
                            </p>
                            <hr class="p-0" />
                            <p class="font-small-3">
                                <i class="bi bi-calendar-week"></i> {{ \Carbon\Carbon::parse($berita->created_at)->isoFormat('D MMMM YYYY') }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Card Item -->
                </div>
                <div class="mt-2 d-flex justify-content-end">
                    <a class="btn-tabel" href="{{ route('home.berita') }}">Lihat Lebih Banyak -></a>
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->
@endsection
