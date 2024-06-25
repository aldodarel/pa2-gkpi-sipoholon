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
                            <h2>Rancangan Program Kerja</h2>
                            <p>
                                Rancangan Program Kerja GKPI Jemaat Khusus Pasar Sipoholon memberikan gambaran menyeluruh tentang rencana dan tujuan program-program yang akan dilaksanakan oleh gereja dalam setiap tahun, memberi transparansi dan informasi yang jelas kepada jemaat mengenai berbagai kegiatan dan inisiatif yang direncanakan untuk mendukung pertumbuhan rohani, sosial, dan komunitas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="{{ route('home.index') }}">Home</a></li>
                        <li>Rancangan Program Kerja</li>
                    </ol>
                </div>
            </nav>
        </div>
        <!-- End Breadcrumbs -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing section-bg">
            <div class="section-header content">
                <h2>Rancangan Program Kerja GKPI Jemaat Khusus Pasar Sipoholon</h2>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        @foreach ($programkerja as $item)
                        <div class="ratio ratio-16x9">
                            <iframe src="{{ $item->lampiran }}" allowfullscreen></iframe>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- End Pricing Section -->
    </main>
    <!-- End #main -->
@endsection
