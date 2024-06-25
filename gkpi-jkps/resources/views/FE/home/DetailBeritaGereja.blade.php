@extends('layouts.navbar')

@section('navbar')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
        <div
            class="page-header d-flex align-items-center"
            style="
            background-image: url('assets/img/1200px-GKPI_Jemaat_Khusus_Pasar_Sipoholon.jpg');
            "
        >
            <div class="container position-relative"></div>
        </div>
        <nav>
            <div class="container">
            <ol>
                <li><a href="{{ route('home.index') }}">Home</a></li>
                <li><a href="{{ route('home.berita') }}">Berita Gereja</a></li>
                <li>Detail Berita</li>
            </ol>
            </div>
        </nav>
        </div>
        <!-- End Breadcrumbs -->

        <!-- ======= Service Details Section ======= -->
        <section id="service-details" class="service-details">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
            <div class="col-lg-8">
                <h3>
                    {{$berita->judul}}
                </h3> 
                <ul>
                    <li>
                        <i class="bi bi-calendar-week"></i>
                        <span>{{ \Carbon\Carbon::parse($berita->created_at)->isoFormat('D MMMM YYYY') }}</span>
                    </li>
                    </ul>
                <img
                src="{{ $berita->lampiran }}"
                alt=""
                class="img-fluid services-img"
                />
                <p>
                    {{ $berita->isi }}
                </p>
            </div>

            <div class="col-lg-4">
                <div class="berita-header">
                <h4>Berita Terbaru lainnya</h4>
                </div>

                <div class="services-list">
                    @foreach ($berita_lainnya as $lainnya)
                    <div>
                        <a href="/detail{{ $lainnya->id }}">{{ $lainnya->judul }}</a>
                        <p>{{ \Carbon\Carbon::parse($lainnya->created_at)->isoFormat('D MMMM YYYY') }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
        </section>
        <!-- End Service Details Section -->
    </main>
    <!-- End #main -->
@endsection