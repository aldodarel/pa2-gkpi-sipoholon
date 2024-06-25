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
                            <h2>Renungan Harian</h2>
                            <p>
                                Renungan Harian GKPI Sipoholon adalah sumber inspirasi dan pembaruan spiritual bagi jemaat Gereja Kristen Protestan Indonesia di Sipoholon. Tujuan renungan ini adalah agar memperkuat iman dan memperdalam hubungan pembaca dengan Tuhan. Selamat membaca dan merenungkan. Tuhan memberkati.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="{{ route('home.index') }}">Home</a></li>
                        <li>Renungan Harian</li>
                    </ol>
                </div>
            </nav>
        </div>
        <!-- End Breadcrumbs -->

        <section id="service" class="services pt-0">
            <div class="container pricing about" data-aos="fade-up">
                <div class="section-header content">
                    <h2>Renungan Harian Terbaru</h2>
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
                                    "{{ $item->isi }}"
                                </p>
                                <footer class="blockquote-foote pt-1 mt-1 border-top">
                                    <p class="font-small-3">
                                        <i class="bi bi-calendar-week"></i>
                                        {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM YYYY') }}
                                    </p>
                                </footer>
                        </blockquote>
                        <!-- END -->
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container card shadow py-3">
                <table id="example" class="table table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Ayat Renungan</th>
                            <th>Judul Renungan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($renungan as $item)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('YYYY-MM-DD') }}</td>
                                <td>{{ $item->ayat }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <a href="#" class="icon-btn lihat-btn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $item->id }}"><i class="bi bi-eye"></i>
                                        Lihat</a>
                                </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        @foreach ($renungan as $item)
            <!-- Modal -->
    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="d-flex justify-content-center">{{ $item->title }}</h4>
                    <h5 class="d-flex justify-content-center">{{ $item->ayat }}</h5>
                    <div class="scrollable-content">
                        <p class="mb-0 mt-2 font-italic">
                            "{{ $item->isi }}"
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="font-small-3">
                        <i class="bi bi-calendar-week"></i>
                        {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM YYYY') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- End Frequently Asked Questions Section -->
</main>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const lihatButtons = document.querySelectorAll('.lihat-btn');
        lihatButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const modalId = button.getAttribute('data-bs-target');
                const itemId = modalId.split('#exampleModal')[1];
                const modalTitleId = `#exampleModalLabel${itemId}`;
                const modalTitle = document.querySelector(modalTitleId);
                modalTitle.textContent = "Modal title"; // You can customize the modal title here
            });
        });
    });
</script>

<style>
.scrollable-content {
    max-height: 300px; /* Adjust the maximum height as needed */
    overflow-y: auto;
}
</style>

    <!-- End #main -->
@endsection
