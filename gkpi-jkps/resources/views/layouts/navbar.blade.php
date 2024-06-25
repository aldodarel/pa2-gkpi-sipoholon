<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>GKPI Sipoholon</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon" />
    {{-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" /> --}}

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet" />

    <!-- CSS LINK -->

    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css" />

    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css" />
    <!-- <link
      rel="stylesheet"
      type="text/css"
      href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css"
    /> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet" />
    <!-- DataTable CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css"
    />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="assets/img/logo.png" alt="" />
                <h1>
                    GKPI Jemaat Khusus <br />
                    Pasar Sipoholon
                </h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{ route('home.index') }}" class="{{ $title === 'index' ? 'active' : '' }}">Beranda</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="{{ $title === 'ibadah' ? 'active' : '' }}"><span>Data Gereja</span>
                            <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="{{ route('home.ibadah') }}">Tata Ibadah</a></li>
                            <li><a href="{{ route('home.berita') }}">Berita Gereja</a></li>
                            {{-- <li><a href="#">Statistik Ibadah</a></li>
                            <li><a href="#">Statistik Keuangan</a></li> --}}
                        </ul>
                    </li>
                    <li><a href="{{ route('home.renungan') }}"
                            class="{{ $title === 'renungan' ? 'active' : '' }}">Renungan Harian</a></li>
                    <li class="dropdown">
                        <a href="#" class="{{ $title === 'tentang' ? 'active' : '' }}"><span>Tentang Gereja</span>
                            <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li>
                                <a href="{{ route('home.struktur') }}">Struktur Organisasi</a>
                            </li>
                            <li>
                                <a href="{{ route('home.programkerja') }}">Rancangan Program Kerja</a>
                            </li>
                            <li><a href="{{ route('home.anggaranbiaya') }}">Rancangan Anggaran Penerimaan dan
                                    Belanja</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="get-a-quote" href="{{ route('auth.index') }}">Masuk</a>
                    </li>
                </ul>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    @yield('navbar')

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container">
          <div class="row gy-1 footer-info">
            <div class="col-lg-4 logo">
              <img src="assets/img/logo.png" alt="" class="img-fluid" />
            </div>
  
            <div class="col-lg-4 footer-contact">
              <h4>GKPI Sipoholon</h4>
              <p class="pe-5">
                <i class="bi bi-geo-alt-fill"></i>
                Jl. Tarutung No.73, Lobusingkam, Kec. Sipoholon, Kabupaten
                Tapanuli Utara, Sumatera Utara 22452
              </p>
            </div>
  
            <div class="col-lg-4 footer-contact">
              <h4>Hubungi Kami</h4>
              <p>
                <i class="bi bi-person-fill"></i> Pdt. Marganda Parulian Siregar,
                S.Th <br />
                <i class="bi bi-telephone-fill"></i> +62 823-7009-0087<br />
                <i class="bi bi-whatsapp"></i> +62 823-7009-0087<br />
              </p>
            </div>
          </div>
        </div>
  
        <div class="container mt-4">
          <div class="copyright">
            &copy; Copyright <strong><span>GKPI Sipoholon</span></strong
            >. All Rights Reserved
          </div>
        </div>
      </footer>
    <!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- DataTable JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function () {
          $("#example").DataTable({
            "order": [
                [0, "desc"]
            ],
          });
        });
      </script>
</body>

</html>
