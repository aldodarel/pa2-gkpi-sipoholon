-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 03:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `baptis`
--

CREATE TABLE `baptis` (
  `id_baptis` int(11) NOT NULL,
  `tgl_baptis` date DEFAULT NULL,
  `nama_pendeta_baptis` varchar(255) DEFAULT NULL,
  `no_surat_baptis` varchar(255) DEFAULT NULL,
  `file_surat_baptis` varchar(500) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `nik` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baptis`
--

INSERT INTO `baptis` (`id_baptis`, `tgl_baptis`, `nama_pendeta_baptis`, `no_surat_baptis`, `file_surat_baptis`, `created_at`, `updated_at`, `nik`) VALUES
(1, '1993-11-10', 'Pdt. Sahat Sitompul', '03/SB/GKPI/1993', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_1'),
(32, '1985-02-15', 'Marganda Siregar', '03/SB/GKPI/1985', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_12'),
(33, '1985-02-16', 'Marganda Siregar', '05/SB/GKPI/1985', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_13'),
(34, '1980-02-14', 'Marganda Siregar', '06/SB/GKPI/1980', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_14'),
(35, '1981-08-12', 'Marganda Siregar', '06/SB/GKPI/1981', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_15'),
(36, '1982-04-18', 'Marganda Siregar', '07/SB/GKPI/1982', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_16'),
(37, '1984-11-05', 'Marganda Siregar', '08/SB/GKPI/1984', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_17'),
(38, '2000-04-15', 'Marganda Siregar', '10/SB/GKPI/2000', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_18'),
(39, '2001-07-05', 'Marganda Siregar', '12/SB/GKPI/2001', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_20'),
(40, '2004-12-04', 'Marganda Siregar', '19/SB/GKPI/2004', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_19'),
(41, '1984-04-07', 'Marganda Siregar', '21/SB/GKPI/1984', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_21'),
(42, '1979-07-05', 'Marganda Siregar', '22/SB/GKPI/1979', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_22'),
(44, '2024-06-05', 'Marganda Siregar', '044', '/lampiran/baptis/1717488616-a1032b2389c8181f05149cf6188f9abd.jpeg', '2024-06-04', '2024-06-04', 'GKPI_JKPS_91'),
(46, '2017-01-05', 'Pdt. Marganda Siregar', '37/SB/GKPI/2017', '/lampiran/baptis/1717713870-c8d893debc616fe24de1ae5215378c5a.jpg', '2024-06-07', '2024-06-07', 'GKPI_JKPS_23');

-- --------------------------------------------------------

--
-- Table structure for table `berita_gereja`
--

CREATE TABLE `berita_gereja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `lampiran` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(16) DEFAULT NULL,
  `updated_by` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita_gereja`
--

INSERT INTO `berita_gereja` (`id`, `judul`, `isi`, `lampiran`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Pembinaan Penatua Dan Memaknai Pelayanan Klinik Pastoral GKPI Jemaat Khusus Sipoholon', '1. Program dan Keberangkatan\r\n\r\nSebuah program yang tertunda tetapi tetap terlaksana dalam mewujudkan serta mencapai tujuan Renstra GKPI. Seluruh Penatua GKPI Sipoholon mengadakan retreat dan pembinaan bagi Penatua dan Calon Penatua. Maka di tahun 2023 ini seksi kerohanian telah menetapkan pembinaan bagi para Penatua dan Calon Penatua untuk menambah wawasan, menjalin keakraban sesama pelayan, memahami tugas pelayanan dan memaknai pelananan klinik pastoral dalam kepenatuaan. Seharusnya jika ditilik dari program Pimpinan Sinode dalam renstra GKPI, harusnya kegiatan Pelayanan Pastoral dilaksanakan tahun 2022. Tetapi itu bukan sebuah penghalang untuk meningkatkan penatalayanan dan mencapai tujuan pelayanan, serta mendapat bimbingan, ilmu, serta mencerminkan pelayan Yesus Kristus. Adapun renstra GKPI dalam Road Map GKPI tahun 2022, ialah:\r\n\r\n1. Pelatihan program konseling kepada Pendeta, Penatua, Diakones dan Evangelis\r\n\r\n2. Menerapkan program-program pastoral yang sudah disiapkan jemaat masing-masing\r\n\r\n3. Meningkatkan kapasitas para pendeta, penatua, evangelis, diakones dan majelis jemaat dalam pelayanan pastoral.\r\n\r\nRangkaian kegiatan retreat dan pembinaan Penatua dan Calon Penatua dimulai dari tanggal 16-18 Juni 2023 tepatnya di Parbaba – Pangururan, Kabupaten Samosir yang dipimpin oleh Pdt Agustina Br Tambunan, STh sebagai pendeta jemaat di GKPI Sipoholon Medan. Keberangkatan rombongan penatua dan calon penatua dari Medan menuju Samosir via tele pukul 24.00 usai sermon, dan doa keberangkatan pun dipimpin oleh Pdt Agustina Br Tambunan STh. Tiba di Sibeabea pukul 07.00 Wib, maka rombongan peserta pembinaan melaksanakan ibadah singkat pagi Sabtu 17 juni 2023 yang dipimpin oleh Pdt A Br Tambunan. Usai ibadah singkat, maka seluruh peserta pembinaan sarapan pagi, dan dilanjutkan dengan menikmati ciptaan Tuhan disekitar wisata Sibeabea Samosir. Setelah melintasi destinasi Sibeabea, semua rombongan menuju penginapan Parbaba, hingga tiba disana untuk menimati makan siang di Home Stay Lasfayer.\r\n\r\n2. Pembinaan Penatua dan Calon Penatua Oleh : Pdt Marganda Siregar\r\n\r\nDalam rangkaian kegiatan pembinaan penatua, pukul 15.00 wib peserta dan Narasumber dari Kadep Pastorat GKPI yaitu Pdt Marganda Siregar , MM, MTh memulai acara yang dinanti-nanti. Didalam pembinaan itu, Kadep Pastorat menjelaskan terlebih dahulu arti dan defenisi dari Penatua menurut alkitab. Dikatakan didalam Perjanjian Lama, Penatua menurut alkitab perjanjian lama ialah Zaken atau Zakenim = Janggut, yang berjanggut, lelaki tua. Tua-tua Israel (Kel. 24; Bil.11). Pdt Dr Teddy P Sihombing menjelaskan, karakteristik dari Lelaki tua yang dimaksud ialah: Keluarganya baik, dermawan, kejujuran dan moral/etis yang dikenal sangat baik, pengetahuan (praktik dalam keagamaan, adat, dan sejarah) dan terampil berpidato. Dengan catatan, tetapi tidak semua lelaki tua menjadi “tua-tua”. Sedangkan dalam perkembangan selanjutnya dalam Perjanjian Baru, penatua itu dikatakan dalam Bahasa Yunani, presbyteros: Lebih tua, Dewasa, Bijaksana, orang baik dan tidak tercela.', '/lampiran/berita/1716722878_imagesgkpi1.png', '2024-05-26 11:27:58', '2024-05-26 11:27:58', NULL, NULL),
(2, 'KUNJUNGAN KASIH DAN RETREAT PP/REMAJA GKPI JEMAAT  SIPOHOLON', 'Sehubungan dengan program kerja PP/Remaja GKPI Jemaat Khusus Sipoholon yang telah di sah-kan dalam rapat sidang majelis , yaitu program Kunjungan Kasih dan Retreat PP/Remaja GKPI Jemaat Khusus Sipoholon ke GKPI JK Maranatha Tambunan, Balige . Dan nama kegiatan ini pun disepakati menjadi “Kunjungan Kasih dan Retreat PP/Remaja GKPI Jemaat Khusus Sipoholon ke GKPI JK Maranatha Tambunan” dengan Thema Bersatu Melayani Dalam Kasih (Kisah Para Rasul 4:32) dan sub Thema: Melalui kegiatan Kunjungan Kasih dan Retreat ini kiranya PP/Remaja GKPI Jemaat Khusus Sipoholon semakin Bersatu, sehati dan sepikir dalam pelayanannya, serta mampu menunjukkan kasih dalam perbuatan sehari-hari. Maksud dari kegiatan ini ialah untuk meningkatkan kekompakan dan kasih di dalam pelayanan Muda-mudi orang kristen sehingga semakin bersatu hati untuk menunaikan tugas dan panggilanNya. Sementara tujuan kegiatan ini adalah meningkatkan kekompakan atau mempererat tali kasih serta kekariban satu sama lain dalam Persekutuan PP/Remaja GKPI JK Jemaat Khusus Sipoholon maupun PP/Remaja JK Maranatha Tambunan, membina hubungan dan kepribadian yang baik antar PP/Remaja sehingga sehati sepikir juga bertumbuh bersama di dalam pelayanan gereja, dan membangun jiwa rohani atau iman setiap PP/Remaja gereja sehingga dapat menunjukkan Kasih Kristus di dalam kehidupan sehari-hari.', '/lampiran/berita/1716723358_imagesgkpi3.jpg', '2024-05-26 11:35:58', '2024-05-26 11:35:58', NULL, NULL),
(3, 'ACARA BINCANG-BINCANG DENGAN KETUA UMUM PGI TOPIK : “KONTEKS, TANTANGAN ERTA PERAN GEREJA DAN KEKRISTENAN DI INDONESIA : PERSPEKTIF PGI”', 'Memahami tugas dan tanggung jawab gereja bagi bangsa dan negara merupakan perkara yang menantang bagi orang Kristen di segala zaman dan sekaligus menjadi hal yang tidak mudah ditangkap dan dirumuskan karena melibatkan pemikiran para tokoh gereja yang senantiasa berkembang.  Meskipun demikian wacana ini perlu senantiasa dihadirkan bagi umat Tuhan terkhusus bagi warga jemaat GKPI.  Hal ini pula yang mendorong Pendeta GKPI Resort Medan Barat, Pdt. Dr. Jhon P.E. Simorangkir, untuk menginisiasi acara Bincang-Bincang Dengan Ketua Umum PGI, Pdt. Gomar Gultom, M.Th, di Lantai 3 Gedung Multifungsi GKPI Medan Kota, Jln. Sriwijaya No. 9 Medan.\r\n\r\nAcara yang diadakan juga secara live streaming ini, dihadiri secara langsung oleh 102 orang peserta yang meliputi warga jemaat, penatua, penasihat, anggota Majelis Sinode dari GKPI Medan Kota, GKPI Telaga Sari, GKPI Marturia Muliorejo dan para undangan: Sekjen GKPI Pdt. Humala Lumban Tobing, M.Th, Korwil GKPI Wilayah I Pdt. Waldemar S. Simanjuntak, M.Th, Korwil GKPI Wilayah II Pdt. Pardi M. Silalahi, M.Th, dan Ketua Lembaga Institut Andar Sutan GKPI Dr. Drs. Victor Lumbanraja, MAP. MSP (sebagai moderator).', '/lampiran/berita/1716723577_imagesgkpi4.png', '2024-05-26 11:39:37', '2024-05-26 11:39:37', NULL, NULL),
(4, 'Grand Opening English Sunday Worship At GKPI Jemaat Khusus Sipoholon', 'Sambutan dari Pimpinan GKPI Bapak Sekjend GKPI juga menyemangati penulis untuk melakukannya dengan lebih baik lagi ke depan, karena GKPI Gang Sado akan menjadi barometer untuk English Sunday Worship di GKPI. Sesuai dengan thema , Mencintai Hukum Tuhan (Love God’s Law), Bapak Sekjend GKPI mengajak jemaat GKPI Gang Sado, menjadi pelaku-pelaku Hukum Taurat dalam hidup sehari-dari dengan melakukan Hukum Kasih (menjauhi dosa dan melakukan kebenaran) seperti yang diajarkan oleh Yesus Kristus bagi setiap orang yang percaya.\r\n\r\nMengenang semangat teman-teman para misionaris di GoDucate lloilo Phillipines yang selalu sibuk menggunakan tehnologi untuk memberitakan Injil ke seluruh dunia, penulis merasa apa yang dilakukan oleh penulis, belum ada apa-apanya. Tetapi bagi penulis, paling tidak, sudah dimulainya new step for the next step for preaching the Gospel to the whole world. Untuk langkah kedua, perlu langkah pertama. Penulis sudah memulainya dan melanjutkan demi kemuliaan Allah. Our duty as Christians, just share the Gospel in to the world, just lets God do the rest. It can make the evangelical explosition.', '/lampiran/berita/1716723744_imagesgkpi5.jpeg', '2024-05-26 11:42:24', '2024-05-26 11:42:24', NULL, NULL),
(5, 'HARI KEBANGUNAN & WISATA ROHANI “KAUM LANSIA” GKPI SIPOHOLON', 'satu-satu keluarga duduk bersama/berdampingan. Dan juga selama satu bulan, seluruh keluarga jemaat membuat Mezbah/ Ibadah keluarga di rumah masing-masing, yang bahan renungannya sudah disiapkan  panitia dalam bentuk Buku Panduan dan panitia menyediakan tempat persembahan berbentuk celengan untuk masing-masing keluarga. Hasil celengan ini sebagai Aksi Sosial GKPI Sipoholon, yang pada tahun ini diperuntukkan membantu Rumah Lansia.\r\n\r\nSelama bulan keluarga juga dilaksanakan beberapa lomba yang bertemakan “kebersamaan”, seperti Lomba Estafet kelereng, pesertanya satu tim terdiri dari beberapa keluarga dengan perserta 15-20 orang per tim, lalu ada lomba suami Merias Istri, ada juga lomba Suami Merayu Istri, dan ada lomba Foto Keluarga yang di upload di akun Instagram GKPI Sipoholon. Tujuan lomba-lomba ini untuk mempererat hubungan suami-istri, anak-anak dan keluarga. Panitia juga membuat beberapa perlombaan, aksi donor darah, cek kesehatan, seminar tentang Diabetesmelitus dan seminar dengan konsep kekeluargaan. Ada juga seminar tentang hubungan suami-istri, dan hubungan orangtua ke anak (Parenting). Seminar ini disambut dengan baik oleh Jemaat GKPI Sipoholon, dan berjalan cukup baik. Harapannya dengan dilaksanakannya seminar tersebut, bisa meningkatkan keharmonisan hubungan suami-istri dan anak-anak.', '/lampiran/berita/1716724230_imagesgkpi6.jpg', '2024-05-26 11:50:30', '2024-05-26 11:50:30', NULL, NULL),
(6, 'PESTA KEBANGUNAN PEMUDA/PEMUDI-REMAJA GKPI', 'Pak Kadep menegaskan bahwa Gereja TIDAK MELARANG anak-anak muda Kristen untuk bermedsos. Justru, Allah adalah Sumber Teknologi (Am. 1:7), sumber semuanya itu. Bahkan Firman Tuhan di Pengkhotbah 11:9 menyerukan agar anak-anak muda bersukaria di masa mudanya. ‘Tetapi’, kata pak Kadep, ‘JANGAN DIPERHAMBA MEDIA SOSIAL/TEKNOLOGI’. Pak Kadep mendasarkan pada 1 Korintus. 6:12 ‘Segala sesuatu halal bagiku, tetapi bukan semuanya berguna. Segala sesuatu halal bagiku, tetapi aku tidak membiarkan diriku diperhamba apapun’. ‘Sehingga’, kata pak Kadep, ‘Marilah kita memakai medsos bukan justru menjauhkan kita dari sesama kita, tetapi sebaliknya harus semakin meningkatkan kepedsos kita kepada sesama kita manusia’. ‘Sebagaimana perintah Tuhan Yesus’, kata pak Kadep mengakhiri sessionnya: ‘Inilah perintah-Ku, yaitu supaya kamu saling mengasihi, seperti Aku telah mengasihi kamu’ (Yoh. 15:12).            \r\n\r\nSetelah pak Kadep melakukan pemaparan, dibukalah sesi dialog, yaitu tanya-jawab. Ada beberapa orang yang bertanya, tetapi cukup dua yang kami jelaskan disini. Pertama, bernama Sinta Ambarita, dari GKPI Ambarita Pasar. Dia bertanya: ‘Amang, banyak sekali PP-R masa kini yang memiliki sifat introvert (tertutup), yang salah satunya adalah tidak mampu mengekspresikan dirinya dalam hubungannya dengan sesamanya di dunia nyata. Tetapi sebaliknya, jika di dunia maya, banyak yang bisa berekspresi, bahkan bersifat ekstrovert (terbuka) dan menjalin hubungan yang baik dengan teman-temannya di medsos. Bagaimanakah pandangan amang terhadap sikap dan perilaku tersebut? Baikkah demikian amang?’ Pak Kadep segera menjawab pertanyaan dari Sinta, katanya: ‘Tidak baik, jika introvert di dunia nyata, sebaliknya menjadi ekstrovert justru di dunia maya. Itu menunjukkan efek negatif medsos telah merusak mental kita. Fakta itu semakin menampakkan bahwa dunia maya sudah jauh lebih asyik dibandingkan dunia nyata. Hal seperti ini jangan dibiarkan, karena jika berlarut, maka akan tumbuh menjadi orang yang tidak pede di depan banyak orang. Oleh karenanya, kuasai medsos yang di hp androidkita itu, jangan biarkan kita dikuasai. Dimulai dari rutinitas keseharian kita, bahwsanya jangan lagi sedikit-sedikit pegang hp,  sedikit-sedikit pegang hp. Pergilah ke luar rumah, ikuti lebih banyak kegiatan face to face di sekolah, di desa, atau dimana saja bersama dengan teman-temanmu. Perbanyak kegiatan olahraga dan seni seperti bernyanyi dan bermain musik. Bahkan yang tidak kalah penting, ikuti kegiatan sosial, seperti mengunjungi teman yang sakit dan bergotong royong membersihkan lingkungan kampung atau Gereja kita masing-masing. Itu semua kita lakukan agar jangan ada lagi diantara kita yang hidupnya berketergantungan dengan medsos yang di hp android kita itu. Rajai dirimu, biar Tuhan yang bertakhta. Nyatakan kepedsos yang sebenarnya di dunia nyata, bukan di dunia maya’.', '/lampiran/berita/1716724380_imagesgkpi7.png', '2024-05-26 11:53:00', '2024-06-02 15:05:21', NULL, NULL),
(7, 'Departemen Diakonat GKPI', 'GKPI terpanggil untuk berkontribusi menciptakan lingkungan hidup yang baik. Di era industrialisasi ini, isu lingkungan menjadi isu global. Kerusakan lingkungan akan menjadi bencana bagi kehidupan umat manusia. Salah satu yang menyebabkan kerusakan lingkungan adalah masalah sampah. Sampah dihasilkan oleh masyarakat setiap hari. Aktivitas dapur setiap hari menyumbang limbah yang signifikan. Sampah dapur bisa berupa sisa-sisa makanan dan sayuran, kemasan plastik, sisa minyak goreng dan lain-lain. Sampah lain yang setiap harinya ada misalnya barang bekas, besi/logam yang tidak terpakai dan sebagainya. Sampah yang muncul setiap hari jika tidak dikelola dengan baik akan menjadi masalah di lingkungan tempat tinggal. Efek buruk yang diakibatkannya sangat kompleks, antara lain menyebabkan pencemaran lingkungan, menurunkan nilai estetika lingkungan dan menimbulkan ketidaknyamanan.', '/lampiran/berita/1716724465_imagesgkpi8.jpg', '2024-05-26 11:54:25', '2024-05-26 11:54:25', NULL, NULL),
(8, 'IBADAH SYUKUR/ PEMBUKAAN SERMON PERDANA PENATUA', 'Puji syukur kepada Tuhan, Ibadah Syukur/ Pembukaan Sermon Perdana Penatua GKPI Sipoholon , sekaligus dilaksanakan Sosialisasi Renstra Tahun 2023 dengan tema : Penatua, Majelis dalam peranan dan tanggung jawabnya dalam memperhatikan dan memedulikan jemaat-jemaat dengan pembicara GKPI Sipoholon (Pdt. Marganda Siregar). Pada ibadah tersebut dihadiri oleh Majelis Jemaat, PHJ/Penatua/Calon Penatua dan Penatua Emeritus. Berikut ini beberapa moment yg di dokumentasikan saat acara berlangsung.', '/lampiran/berita/1716724642_imagesgkpi9.png', '2024-05-26 11:57:22', '2024-05-26 11:57:22', NULL, NULL),
(12, 'Pernikahan Aldo Darel dan Lucintaa', 'Pernikahan dilakukan digereja dengan didampingi bapak presiden Jokowidodo. Pernikahan yang diberkati Tuhan.', '/lampiran/berita/1717581916_file_example_PNG_1MB.png', '2024-06-05 10:05:16', '2024-06-06 10:34:53', NULL, NULL),
(15, 'GKPI Sipoholon Gelar Perayaan Paskah dengan Semangat Kebersamaan', 'Sipoholon, 20 April 2024 - Gereja Kristen Protestan Indonesia (GKPI) Sipoholon menggelar perayaan Paskah yang penuh semangat kebersamaan dan kekeluargaan pada hari Minggu, 20 April 2024. Acara ini dihadiri oleh ratusan jemaat yang berkumpul untuk merayakan kebangkitan Yesus Kristus.\r\n\r\nPerayaan dimulai dengan kebaktian yang dipimpin oleh Pdt. Dr. Jonathan Simanjuntak, yang menyampaikan khotbah dengan tema \"Bangkit dan Hidup dalam Kasih Kristus\". Dalam khotbahnya, Pdt. Dr. Jonathan menekankan pentingnya hidup dalam kasih dan saling mendukung antar sesama jemaat, serta mengajak seluruh jemaat untuk menjadi saksi kasih Kristus dalam kehidupan sehari-hari.\r\n\r\nSetelah kebaktian, acara dilanjutkan dengan berbagai kegiatan seperti paduan suara dari anak-anak Sekolah Minggu, penampilan drama tentang kebangkitan Yesus yang dibawakan oleh remaja gereja, serta lomba mencari telur Paskah yang diikuti oleh anak-anak. Kegiatan ini berlangsung dengan meriah dan penuh keceriaan, menciptakan suasana hangat dan penuh kasih di antara para jemaat.\r\n\r\nTidak hanya itu, GKPI Sipoholon juga mengadakan bakti sosial dengan memberikan bantuan sembako kepada keluarga kurang mampu di sekitar wilayah Sipoholon. Ketua Panitia Perayaan Paskah, Bapak Martua Siregar, menyampaikan bahwa kegiatan ini merupakan wujud nyata dari kasih Kristus yang harus diwujudkan dalam tindakan nyata di tengah masyarakat.\r\n\r\n\"Saya sangat bersyukur melihat antusiasme dan kebersamaan jemaat dalam perayaan Paskah tahun ini. Semoga semangat kebangkitan Yesus Kristus selalu menginspirasi kita untuk terus berbagi kasih dan berbuat baik kepada sesama,\" ujar Bapak Martua.\r\n\r\nPerayaan Paskah di GKPI Sipoholon tahun ini berjalan dengan lancar dan sukses berkat kerja keras panitia dan partisipasi aktif dari seluruh jemaat. Semangat kebersamaan dan kasih Kristus yang terpancar dalam setiap kegiatan diharapkan dapat terus berlanjut dan menjadi inspirasi bagi seluruh jemaat dalam menjalani kehidupan sehari-hari.', '/lampiran/berita/1717675532_IMG-20230409-WA0233.jpg', '2024-06-06 10:26:42', '2024-06-06 12:05:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `berita_pelayan`
--

CREATE TABLE `berita_pelayan` (
  `id_berita` bigint(20) UNSIGNED NOT NULL,
  `id_pelayan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita_pelayan`
--

INSERT INTO `berita_pelayan` (`id_berita`, `id_pelayan`, `created_at`, `updated_at`) VALUES
(12, 11, '2024-06-06 10:34:53', '2024-06-06 10:34:53'),
(15, 11, '2024-06-06 10:26:42', '2024-06-06 12:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ibadah`
--

CREATE TABLE `jadwal_ibadah` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `jenis` enum('Mingguan','Sektor','Situasional','Dukacita','Sakramen') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(16) DEFAULT NULL,
  `updated_by` varchar(16) DEFAULT NULL,
  `jumlah_hadir` int(11) DEFAULT NULL,
  `tata_ibadah` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_ibadah`
--

INSERT INTO `jadwal_ibadah` (`id`, `name`, `tanggal`, `waktu`, `jenis`, `created_at`, `updated_at`, `created_by`, `updated_by`, `jumlah_hadir`, `tata_ibadah`) VALUES
(1, 'Ibadah Pemuda/Pemudii', '2022-04-14', '12:01:00', 'Mingguan', '2022-04-14 17:00:00', '2022-04-15 17:00:00', '1234567890123456', '1234567890123456', 100, '/lampiran/tataibadah/1714900724-35483bb792e49589425cf592c192c590.jpg'),
(2, 'Ibadah Paskah', '2024-04-09', '05:00:00', 'Situasional', '2024-04-29 13:28:59', '2024-04-29 13:28:59', NULL, NULL, 126, '/lampiran/tataibadah/1714960316-d0fde79fc2a670818b14400d9ae7d212.pdf'),
(3, 'Ibadah Natal', '2024-12-25', '23:00:00', 'Situasional', '2024-05-01 14:40:14', '2024-05-01 14:40:14', NULL, NULL, NULL, '/lampiran/tataibadah/1717328302-6dd5909e2ceed2bb14d3cf12a2af4ff6.pdf'),
(4, 'Ibadah Sukacita', '2024-05-05', '23:00:00', 'Mingguan', '2024-05-05 04:02:45', '2024-05-05 04:02:45', NULL, NULL, NULL, '/lampiran/tataibadah/1714881765-4bcfdc034f4dacccbba37308abad87b0.png'),
(5, 'Naik Sidi', '2024-06-11', '23:00:00', 'Sakramen', '2024-05-09 14:13:28', '2024-05-09 14:13:28', NULL, NULL, NULL, NULL),
(6, 'Ibadah Kenaikan Tuhan Yesus', '2024-06-01', '11:43:00', 'Situasional', '2024-05-25 17:43:21', '2024-05-25 17:43:21', NULL, NULL, NULL, NULL),
(8, 'Ibadah Pemberkatan Nikah', '2024-06-02', '09:30:00', 'Situasional', '2024-06-01 11:51:56', '2024-06-01 11:51:56', NULL, NULL, NULL, NULL),
(9, 'Ibadah III minggu setelah trinitas', '2024-06-10', '11:00:00', 'Mingguan', '2024-06-05 09:56:06', '2024-06-05 09:56:06', NULL, NULL, NULL, '/lampiran/tataibadah/1717581671-21a0d9e80dff7636ed7110ea7cd7aa8f.pdf'),
(10, 'Ibadah Ibadah Sabtu', '2024-06-09', '15:00:00', 'Mingguan', '2024-06-06 14:36:40', '2024-06-06 14:36:40', NULL, NULL, 15, '/lampiran/tataibadah/1717684664-648ffc00e8ecbec594d8eb4bce49b61f.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelayanan`
--

CREATE TABLE `jadwal_pelayanan` (
  `id` int(11) NOT NULL,
  `status_pelayanan` enum('Pengkotbah','Liturgis','Doa Syafaat','Warta Jemaat','Pengumpul Persembahan 1','Pengumpul Persembahan 2','Pengumpul Persembahan 3','Pengumpul Persembahan 4','Penerima Tamu 1','Penerima Tamu 2','Penerima Tamu 3','Song Leader','Pemusik','Liturgis Sekolah Minggu') DEFAULT NULL,
  `id_pelayan` int(11) NOT NULL,
  `id_jadwal_ibadah` int(11) UNSIGNED NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_pelayanan`
--

INSERT INTO `jadwal_pelayanan` (`id`, `status_pelayanan`, `id_pelayan`, `id_jadwal_ibadah`, `updated_at`, `created_at`) VALUES
(4, 'Pengkotbah', 1, 9, '2024-06-05 09:56:56', NULL),
(5, 'Liturgis', 18, 9, '2024-06-05 10:00:09', NULL),
(6, 'Doa Syafaat', 6, 9, '2024-06-05 10:17:51', NULL),
(7, 'Warta Jemaat', 14, 9, '2024-06-05 09:56:56', NULL),
(8, 'Pengumpul Persembahan 1', 9, 9, '2024-06-05 09:56:56', NULL),
(9, 'Penerima Tamu 1', 10, 9, '2024-06-05 09:56:56', NULL),
(10, 'Pengumpul Persembahan 2', 12, 9, '2024-06-05 09:56:56', NULL),
(11, 'Penerima Tamu 2', 11, 9, '2024-06-05 09:56:56', NULL),
(12, 'Pengumpul Persembahan 3', 13, 9, '2024-06-05 09:56:56', NULL),
(13, 'Penerima Tamu 3', 15, 9, '2024-06-05 09:56:56', NULL),
(14, 'Pengumpul Persembahan 4', 17, 9, '2024-06-05 09:56:56', NULL),
(15, 'Pemusik', 16, 9, '2024-06-05 09:56:56', NULL),
(16, 'Song Leader', 7, 9, '2024-06-05 09:57:37', NULL),
(17, 'Liturgis Sekolah Minggu', 20, 9, '2024-06-05 09:57:13', NULL),
(18, 'Pengkotbah', 1, 10, '2024-06-06 14:38:56', NULL),
(19, 'Doa Syafaat', 17, 10, '2024-06-06 14:38:56', NULL),
(20, 'Pengumpul Persembahan 1', 16, 10, '2024-06-06 14:38:56', NULL),
(21, 'Pengumpul Persembahan 2', 7, 10, '2024-06-06 14:38:56', NULL),
(22, 'Penerima Tamu 2', 13, 10, '2024-06-06 14:38:56', NULL),
(23, 'Pengumpul Persembahan 3', 12, 10, '2024-06-06 14:38:56', NULL),
(24, 'Penerima Tamu 3', 8, 10, '2024-06-06 14:38:56', NULL),
(25, 'Pengumpul Persembahan 4', 9, 10, '2024-06-06 14:38:56', NULL),
(26, 'Pemusik', 10, 10, '2024-06-06 14:38:56', NULL),
(27, 'Song Leader', 14, 10, '2024-06-06 14:38:56', NULL),
(28, 'Liturgis Sekolah Minggu', 6, 10, '2024-06-06 14:38:56', NULL),
(29, 'Liturgis', 11, 10, '2024-06-06 14:39:38', '2024-06-06 21:39:38'),
(30, 'Warta Jemaat', 15, 10, '2024-06-06 14:39:38', '2024-06-06 21:39:38'),
(31, 'Penerima Tamu 1', 18, 10, '2024-06-06 14:39:38', '2024-06-06 21:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `jemaat`
--

CREATE TABLE `jemaat` (
  `nik` varchar(16) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `status_gereja` enum('Aktif','Meninggal','Pindah') NOT NULL,
  `status_pernikahan` enum('Menikah','Belum Menikah','Cerai Mati') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `baptis` enum('Ya','Tidak') DEFAULT 'Ya',
  `sidi` enum('Ya','Tidak') DEFAULT NULL,
  `profile` varchar(255) NOT NULL DEFAULT '/profile/default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lampiran` text DEFAULT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `kode_registrasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jemaat`
--

INSERT INTO `jemaat` (`nik`, `username`, `name`, `jenis_kelamin`, `password`, `alamat`, `tempat_lahir`, `status_gereja`, `status_pernikahan`, `tanggal_lahir`, `baptis`, `sidi`, `profile`, `created_at`, `updated_at`, `lampiran`, `no_telepon`, `kode_registrasi`) VALUES
('1234567890123456', 'dirgos', 'Pdt. Dirgos Lumban Tobing, M.Th', 'Laki-laki', '$2y$10$bKhaxZNZwMLYCCfgwKKGE.bD3kW21ShAwZ604/i8/bV23R2GWqxam', 'Tarutung Kota', 'Tarutung Kota', 'Aktif', 'Menikah', '1968-01-01', 'Tidak', 'Tidak', 'profile/default.png', NULL, NULL, NULL, '', 1),
('GKPI_JKPS_1', 'Pdt. Marganda Siregar', 'Marganda Parulian Siregar', 'Laki-laki', '$2a$12$ibEFposc7rVfMv7zeMVJuO.OGRprwyDhcWnFMx1kbvpGCQum1Yapm', 'Jl. Tarutung No.73, Lobusingkam, Kec. Sipoholon', 'Sipoholon', 'Aktif', 'Menikah', '1993-10-10', 'Ya', 'Tidak', '/profile/jemaat/1717717452_GKPI_JKPS_1.jpg', '2024-06-03 23:45:54', '2024-06-06 23:44:12', '', '082370090087', 2),
('GKPI_JKPS_10', NULL, 'Torkisss', 'Laki-laki', NULL, 'Tarutung', 'Tarutung Kota', 'Aktif', 'Belum Menikah', '2024-05-11', 'Tidak', 'Tidak', '/profile/jemaat/1715315432-af63717accd64a20ac39073892271145.jpg', '2024-05-10 04:30:32', '2024-06-05 22:57:49', '/lampiran/jemaat/1715315432-fac620d3991712ee235dec5ee636ed37.pdf', '082274336547', 3),
('GKPI_JKPS_11', 'test_jemaat', 'JOVITA GURNING', 'Perempuan', '$2a$12$ibEFposc7rVfMv7zeMVJuO.OGRprwyDhcWnFMx1kbvpGCQum1Yapm', 'Jl. Merdeka No. 76 Parapat', 'Parapat', 'Aktif', 'Belum Menikah', '2006-01-09', 'Ya', 'Tidak', '/profile/jemaat/1715604587-075a164bf41ade19918340e28b5935dc.png', '2024-05-13 12:49:47', '2024-06-03 23:18:43', '/lampiran/jemaat/1715604587-441e4720271f2783198d0bf79040f792.pdf', '0821635629069', 4),
('GKPI_JKPS_12', 'J.C.A.Sinaga', 'Pnt. J.C.A. Sinaga, M. Pd', 'Laki-laki', '$2y$10$THHoCg/bUCC0zZ2e1cFEuuHZ22iU2mEbXj77iQZMMNEsSdNEJHzqW', 'Sipoholon', 'Sipoholon', 'Aktif', 'Menikah', '1972-06-12', 'Ya', 'Tidak', '/profile/jemaat/1718071329_GKPI_JKPS_12.jpg', '2024-06-04 01:57:42', '2024-06-11 02:02:09', '', '08592859386', 5),
('GKPI_JKPS_13', 'user2', 'Pnt. R. Br. Manalu', 'Perempuan', '$2a$12$ibEFposc7rVfMv7zeMVJuO.OGRprwyDhcWnFMx1kbvpGCQum1Yapm', 'Sipoholon', 'Sipoholon', 'Aktif', 'Menikah', '1984-07-16', 'Ya', 'Ya', '/profile/jemaat/default.png', '2024-06-04 02:01:50', '2024-06-04 02:01:50', '', '086924786930', 6),
('GKPI_JKPS_14', 'user3', 'Pnt. J.R. Panggabean', 'Laki-laki', '$2a$12$ibEFposc7rVfMv7zeMVJuO.OGRprwyDhcWnFMx1kbvpGCQum1Yapm', 'Sipoholon', 'Sipoholon', 'Aktif', 'Menikah', '1979-09-05', 'Ya', 'Ya', '/profile/jemaat/default.png', '2024-06-04 02:30:07', '2024-06-04 02:30:07', '', '082940185948', 7),
('GKPI_JKPS_15', 'user6', 'C. Pnt. S. Br. Nababan', 'Perempuan', '$2a$12$ibEFposc7rVfMv7zeMVJuO.OGRprwyDhcWnFMx1kbvpGCQum1Yapm', 'Sipoholon', 'Sipoholon', 'Aktif', 'Menikah', '1980-04-19', 'Ya', 'Ya', '/profile/jemaat/default.png', '2024-06-04 02:31:55', '2024-06-04 02:31:55', '', '0814628592056', 8),
('GKPI_JKPS_16', 'user6', 'Alfonso Situmeang', 'Laki-laki', '$2a$12$ibEFposc7rVfMv7zeMVJuO.OGRprwyDhcWnFMx1kbvpGCQum1Yapm', 'Sipoholon', 'Sipoholon', 'Aktif', 'Menikah', '1981-02-05', 'Ya', 'Ya', '/profile/jemaat/default.png', '2024-06-04 02:34:15', '2024-06-04 02:34:15', '', '0819572850197', 9),
('GKPI_JKPS_17', 'user8', 'Jenny Br. Simorangkir, S. Pd', 'Perempuan', '$2a$12$ibEFposc7rVfMv7zeMVJuO.OGRprwyDhcWnFMx1kbvpGCQum1Yapm', 'Sipoholon', 'Sipoholon', 'Aktif', 'Menikah', '1983-05-07', 'Ya', 'Ya', '/profile/jemaat/default.png', '2024-06-04 02:36:42', '2024-06-04 02:36:42', '', '0816285927591', 10),
('GKPI_JKPS_18', 'user9', 'Ferdinan Simanungkalit', 'Laki-laki', '$2a$12$ibEFposc7rVfMv7zeMVJuO.OGRprwyDhcWnFMx1kbvpGCQum1Yapm', 'Sipoholon', 'Sipoholon', 'Aktif', 'Belum Menikah', '1999-02-05', 'Ya', 'Ya', '/profile/jemaat/default.png', '2024-06-04 02:46:27', '2024-06-04 02:46:27', '', '0812395182510', 11),
('GKPI_JKPS_19', 'user13', 'Haposan Aritonang', 'Laki-laki', '$2a$12$ibEFposc7rVfMv7zeMVJuO.OGRprwyDhcWnFMx1kbvpGCQum1Yapm', 'Sipoholon', 'Sipoholon', 'Aktif', 'Belum Menikah', '2002-08-04', 'Ya', 'Ya', '/profile/jemaat/default.png', '2024-06-04 02:53:12', '2024-06-04 02:53:12', '', '0841245712512', 12),
('GKPI_JKPS_2', 'jeremi', 'Jeremi Septian Manalu', 'Laki-laki', '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG', 'Laguboti', 'Balige', 'Aktif', 'Belum Menikah', '2007-02-21', 'Tidak', 'Ya', 'profile/default.png', '2024-04-22 14:17:14', '2024-06-03 23:13:39', '', '082272743312', 13),
('GKPI_JKPS_20', 'user12', 'Sanni Br. Situmeang', 'Perempuan', '$2a$12$ibEFposc7rVfMv7zeMVJuO.OGRprwyDhcWnFMx1kbvpGCQum1Yapm', 'Sipoholon', 'Sipoholon', 'Aktif', 'Belum Menikah', '2000-12-04', 'Ya', 'Ya', '/profile/jemaat/default.png', '2024-06-04 02:49:34', '2024-06-04 02:49:34', '', '0812581257982', 14),
('GKPI_JKPS_21', 'user21', 'Tonni Manaris Simangunsong', 'Laki-laki', '$2a$12$ibEFposc7rVfMv7zeMVJuO.OGRprwyDhcWnFMx1kbvpGCQum1Yapm', 'Sipoholon', 'Sipoholon', 'Aktif', 'Menikah', '1972-07-04', 'Ya', 'Ya', '/profile/jemaat/default.png', '2024-06-04 03:02:05', '2024-06-04 03:02:05', '', '0814275192850', 15),
('GKPI_JKPS_22', 'user22', 'Sorta Br. Nababan (Op. Marta)', 'Perempuan', '$2a$12$ibEFposc7rVfMv7zeMVJuO.OGRprwyDhcWnFMx1kbvpGCQum1Yapm', 'Sipoholon', 'Sipoholon', 'Aktif', 'Menikah', '1975-05-07', 'Ya', 'Ya', '/profile/jemaat/default.png', '2024-06-04 03:09:31', '2024-06-04 03:09:31', '', '0812598121251', 16),
('GKPI_JKPS_23', 'user23', 'Pnt. H. Panggabean', 'Laki-laki', '$2a$12$ibEFposc7rVfMv7zeMVJuO.OGRprwyDhcWnFMx1kbvpGCQum1Yapm', 'Sipoholon', 'Sipoholon', 'Aktif', 'Menikah', '1979-05-09', 'Ya', 'Tidak', '/profile/jemaat/default.png', '2024-06-04 03:20:55', '2024-06-06 21:46:41', '', '081259125812', 17),
('GKPI_JKPS_25', NULL, 'JOVITA SIMANULLANG', 'Perempuan', NULL, 'Balige', 'Parapat', 'Aktif', 'Menikah', '2004-02-17', 'Tidak', 'Tidak', '/profile/jemaat/default.png', '2024-06-07 01:34:12', '2024-06-07 01:34:32', '', '082272743312', 27),
('GKPI_JKPS_26', NULL, 'Syahrial Sitorus', 'Laki-laki', NULL, 'Balige', 'Balige', 'Aktif', 'Belum Menikah', '2005-06-05', 'Tidak', 'Tidak', '/profile/jemaat/default.png', '2024-06-07 01:35:50', '2024-06-07 01:35:50', '', '082272743317', 28),
('GKPI_JKPS_3', 'monica', 'monica manalu', 'Perempuan', '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG', 'laguboti', 'Balige', 'Aktif', 'Belum Menikah', '2024-04-03', 'Ya', 'Ya', 'profile/default.png', '2024-04-23 08:29:17', '2024-04-23 08:29:17', '', '082272743311', 18),
('GKPI_JKPS_4', 'lek', 'laek', 'Laki-laki', '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG', 'Laguboti', 'Balige', 'Aktif', 'Belum Menikah', '2024-04-22', 'Ya', 'Tidak', 'profile/default.png', '2024-04-23 12:31:39', '2024-04-23 12:31:39', '', '082272743318', 19),
('GKPI_JKPS_5', 'dan', 'daniel', 'Laki-laki', '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG', 'laguboti', 'Balige', 'Aktif', 'Belum Menikah', '2024-04-23', 'Ya', 'Ya', 'profile/default.png', '2024-04-24 05:00:56', '2024-04-24 05:00:56', '', '082272743317', 20),
('GKPI_JKPS_7', 'anita', 'csc', 'Laki-laki', '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG', 'csacscadc', 'Balige', 'Aktif', 'Belum Menikah', '2024-04-10', 'Ya', 'Ya', 'profile/default.png', '2024-04-24 09:14:33', '2024-04-24 09:14:33', '', '082272743311', 21),
('GKPI_JKPS_8', 'if422008', 'Torkisss', 'Laki-laki', '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG', 'Tarutung', 'Tarutung Kota', 'Aktif', 'Belum Menikah', '2024-04-18', 'Tidak', 'Tidak', '/profile/jemaat/1714103141-2826d6f8e42c5b04234351bce24e0044.jpg', '2024-04-26 03:45:41', '2024-04-26 03:45:41', '/lampiran/jemaat/1714103141-ab4645019a248084d037ba54851c4f7d.jpg', '082274336547', 22),
('GKPI_JKPS_9', 'mutiaraa', 'admin', 'Laki-laki', '$2y$10$ruIzYAWULZbNFPV5Fvhpg.VuzdEdLxFAOwFgo6aNf2jthyeNjkCR2', 'vvwsfvsrv', 'Balige', 'Aktif', 'Belum Menikah', '2024-05-09', 'Tidak', 'Tidak', '/profile/jemaat/1715304930-168b17951b9cd976b79836c081cef252.jpg', '2024-05-10 01:35:30', '2024-06-03 05:35:36', '/lampiran/jemaat/1715304930-74024f9dcbccace241440149c9b15723.jpg', '082272743313', 23),
('GKPI_JKPS_90', 'silaban', 'Silaban', 'Perempuan', '$2y$10$4ugTzGF20B.GomUU4MYfteTIZBO5BzpudQw4dX0fxh5WNGWKx3nsO', 'Jl. Tarutung No.73, Lobusingkam, Kec. Sipoholon', 'Balige', 'Aktif', 'Menikah', '1992-02-18', 'Tidak', 'Tidak', '/profile/jemaat/default.png', '2024-06-04 00:00:49', '2024-06-05 10:14:25', '', '082272743312', 24),
('GKPI_JKPS_91', 'user91', 'Aldo Darel', 'Laki-laki', '$2y$10$PSjrRQIjH0DH8oEGSJ77/OMXYQKBSy58mGxxkNOTAJW3gTOQjhVOm', 'Sipoholon', 'Sipoholon', 'Aktif', 'Belum Menikah', '2004-06-05', 'Ya', 'Tidak', '/profile/jemaat/default.png', '2024-06-04 07:27:21', '2024-06-05 22:58:12', '', '082163562906', 25),
('GKPI_JKPS_92', NULL, 'Maria', 'Perempuan', NULL, 'Sipoholon', 'Sipoholon', 'Aktif', 'Belum Menikah', '2004-06-04', 'Tidak', 'Tidak', '/profile/jemaat/default.png', '2024-06-05 14:13:29', '2024-06-06 21:27:58', '', '082163562907', 26);

-- --------------------------------------------------------

--
-- Table structure for table `jemaat_keluarga`
--

CREATE TABLE `jemaat_keluarga` (
  `nik` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `status` enum('Suami','Istri','Anak') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_anggota` enum('Nonaktif','Aktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jemaat_keluarga`
--

INSERT INTO `jemaat_keluarga` (`nik`, `no_kk`, `status`, `created_at`, `updated_at`, `status_anggota`) VALUES
('GKPI_JKPS_1', 'GKPI_JKPS_KK_1', 'Suami', '2024-06-03 23:45:54', '2024-06-03 23:45:54', 'Aktif'),
('GKPI_JKPS_12', 'GKPI_JKPS_KK_2', 'Suami', '2024-06-04 01:57:42', '2024-06-04 01:57:42', 'Aktif'),
('GKPI_JKPS_13', 'GKPI_JKPS_KK_2', 'Istri', '2024-06-04 02:01:50', '2024-06-04 02:01:50', 'Aktif'),
('GKPI_JKPS_14', 'GKPI_JKPS_KK_3', 'Suami', '2024-06-04 02:30:07', '2024-06-04 02:30:07', 'Aktif'),
('GKPI_JKPS_15', 'GKPI_JKPS_KK_3', 'Istri', '2024-06-04 02:31:55', '2024-06-04 02:31:55', 'Aktif'),
('GKPI_JKPS_16', 'GKPI_JKPS_KK_4', 'Suami', '2024-06-04 02:34:15', '2024-06-04 02:34:15', 'Aktif'),
('GKPI_JKPS_17', 'GKPI_JKPS_KK_4', 'Istri', '2024-06-04 02:36:42', '2024-06-04 02:36:42', 'Aktif'),
('GKPI_JKPS_18', 'GKPI_JKPS_KK_2', 'Anak', '2024-06-04 02:46:27', '2024-06-04 02:46:27', 'Aktif'),
('GKPI_JKPS_19', 'GKPI_JKPS_KK_4', 'Anak', '2024-06-04 02:53:12', '2024-06-04 02:53:12', 'Aktif'),
('GKPI_JKPS_20', 'GKPI_JKPS_KK_3', 'Anak', '2024-06-04 02:49:34', '2024-06-04 02:49:34', 'Aktif'),
('GKPI_JKPS_21', 'GKPI_JKPS_KK_5', 'Suami', '2024-06-04 03:02:05', '2024-06-04 03:02:05', 'Aktif'),
('GKPI_JKPS_22', 'GKPI_JKPS_KK_5', 'Istri', '2024-06-04 03:09:32', '2024-06-04 03:09:32', 'Aktif'),
('GKPI_JKPS_23', 'GKPI_JKPS_KK_7', 'Suami', '2024-06-04 03:20:55', '2024-06-04 03:20:55', 'Aktif'),
('GKPI_JKPS_25', 'GKPI_JKPS_8', 'Istri', '2024-06-07 01:34:12', '2024-06-07 01:34:12', 'Aktif'),
('GKPI_JKPS_26', 'GKPI_JKPS_8', 'Anak', '2024-06-07 01:35:50', '2024-06-07 01:35:50', 'Nonaktif'),
('GKPI_JKPS_26', 'GKPI_JKPS_KK_9', 'Suami', '2024-06-07 01:37:32', '2024-06-07 01:37:32', 'Aktif'),
('GKPI_JKPS_90', 'GKPI_JKPS_KK_1', 'Istri', '2024-06-04 00:00:49', '2024-06-04 00:00:49', 'Aktif'),
('GKPI_JKPS_91', 'GKPI_JKPS_KK_1', 'Anak', '2024-06-04 07:27:21', '2024-06-04 07:27:21', 'Aktif'),
('GKPI_JKPS_92', 'GKPI_JKPS_KK_7', 'Anak', '2024-06-05 14:13:29', '2024-06-05 14:13:29', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_kas` varchar(100) NOT NULL,
  `pembagian` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id`, `nama_kas`, `pembagian`, `created_at`, `updated_at`) VALUES
(1, 'Kas Pelayanan Gereja', 20, NULL, '2024-06-11 01:54:49'),
(2, 'Kas Kantor Sinode', 30, NULL, '2024-06-11 12:58:47'),
(3, 'Kas Sarana dan Prasarana', 25, NULL, NULL),
(4, 'Kas Pembangunan', 25, NULL, NULL),
(5, 'test', 0, '2024-06-10 16:06:15', '2024-06-11 12:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `kas_keuangan`
--

CREATE TABLE `kas_keuangan` (
  `id_kas` int(11) UNSIGNED NOT NULL,
  `id_keuangan` bigint(20) UNSIGNED NOT NULL,
  `nominal` double DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pembagian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kas_keuangan`
--

INSERT INTO `kas_keuangan` (`id_kas`, `id_keuangan`, `nominal`, `updated_at`, `created_at`, `pembagian`) VALUES
(1, 36, 390000, '2024-06-06 14:34:09', '2024-06-06 14:34:09', NULL),
(1, 39, 70000, '2024-06-05 10:58:58', '2024-06-05 10:58:58', NULL),
(1, 40, 70000, '2024-06-05 11:00:32', '2024-06-05 11:00:32', NULL),
(1, 41, 4500000, '2024-06-10 11:48:24', '2024-06-10 11:48:24', 30),
(1, 43, 20000, '2024-06-06 14:24:54', '2024-06-06 14:24:54', NULL),
(1, 45, 90000, '2024-06-07 01:39:23', '2024-06-07 01:39:23', NULL),
(1, 47, 135000, '2024-06-10 05:04:09', '2024-06-10 05:04:09', NULL),
(1, 48, 240000, '2024-06-10 11:46:38', '2024-06-10 06:45:17', 30),
(1, 49, 24000, '2024-06-11 03:47:42', '2024-06-11 03:47:42', 20),
(1, 52, 40000, '2024-06-11 12:59:45', '2024-06-11 12:59:09', 20),
(2, 36, 45000, '2024-06-06 14:34:09', '2024-06-06 14:34:09', NULL),
(2, 39, 15000, '2024-06-05 10:58:58', '2024-06-05 10:58:58', NULL),
(2, 40, 15000, '2024-06-05 11:00:32', '2024-06-05 11:00:32', NULL),
(2, 41, 1500000, '2024-06-10 11:48:24', '2024-06-10 11:48:24', 10),
(2, 43, 20000, '2024-06-06 14:24:54', '2024-06-06 14:24:54', NULL),
(2, 45, 20000, '2024-06-07 01:39:23', '2024-06-07 01:39:23', NULL),
(2, 47, 135000, '2024-06-10 05:04:09', '2024-06-10 05:04:09', NULL),
(2, 48, 160000, '2024-06-10 11:46:38', '2024-06-10 06:45:17', 20),
(2, 49, 24000, '2024-06-11 03:47:42', '2024-06-11 03:47:42', 20),
(2, 52, 60000, '2024-06-11 12:59:45', '2024-06-11 12:59:09', 30),
(3, 36, 10000, '2024-06-06 14:34:09', '2024-06-06 14:34:09', NULL),
(3, 39, 80000, '2024-06-05 10:58:58', '2024-06-05 10:58:58', NULL),
(3, 40, 80000, '2024-06-05 11:00:32', '2024-06-05 11:00:32', NULL),
(3, 41, 7500000, '2024-06-10 11:48:24', '2024-06-10 11:48:24', 50),
(3, 43, 20000, '2024-06-06 14:24:54', '2024-06-06 14:24:54', NULL),
(3, 45, 30000, '2024-06-07 01:39:23', '2024-06-07 01:39:23', NULL),
(3, 47, 135000, '2024-06-10 05:04:09', '2024-06-10 05:04:09', NULL),
(3, 48, 320000, '2024-06-11 01:56:04', '2024-06-10 06:45:17', 40),
(3, 49, 30000, '2024-06-11 03:47:42', '2024-06-11 03:47:42', 25),
(3, 51, 100000, '2024-06-11 08:55:04', '2024-06-11 08:55:04', 0),
(3, 52, 50000, '2024-06-11 12:59:45', '2024-06-11 12:59:09', 25),
(4, 36, 75000, '2024-06-06 14:34:09', '2024-06-06 14:34:09', NULL),
(4, 41, 1500000, '2024-06-10 11:48:24', '2024-06-10 11:48:24', 10),
(4, 43, 20000, '2024-06-06 14:24:54', '2024-06-06 14:24:54', NULL),
(4, 45, 20000, '2024-06-07 01:39:23', '2024-06-07 01:39:23', NULL),
(4, 47, 135000, '2024-06-10 05:04:09', '2024-06-10 05:04:09', NULL),
(4, 48, 0, '2024-06-10 16:11:40', '2024-06-10 06:45:17', 0),
(4, 49, 30000, '2024-06-11 03:47:42', '2024-06-11 03:47:42', 25),
(4, 52, 50000, '2024-06-11 12:59:45', '2024-06-11 12:59:09', 25),
(5, 48, 80000, '2024-06-11 01:56:04', '2024-06-10 16:11:40', 10),
(5, 49, 12000, '2024-06-11 03:47:42', '2024-06-11 03:47:42', 10),
(5, 52, 0, '2024-06-11 12:59:45', '2024-06-11 12:59:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `no_kk` varchar(16) NOT NULL,
  `nama_keluarga` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` enum('Aktif','Pindah','Nonaktif') NOT NULL DEFAULT 'Aktif',
  `tanggal_nikah` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lampiran` text DEFAULT NULL,
  `id_sektor` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`no_kk`, `nama_keluarga`, `alamat`, `status`, `tanggal_nikah`, `created_at`, `updated_at`, `lampiran`, `id_sektor`) VALUES
('GKPI_JKPS_8', 'Ama. Marihot Sitorus/ Br. Pakpahan', 'Sipaholon', 'Aktif', '2024-06-07', '2024-06-07 01:30:04', '2024-06-07 01:30:04', '', 2),
('GKPI_JKPS_KK_1', 'Ama Pdt.Marganda Siregar/ Br. Silaban', 'Jl. Tarutung No.73, Lobusingkam, Kec. Sipoholon', 'Aktif', '2022-05-05', '2024-06-03 23:28:03', '2024-06-03 23:28:03', '', 1),
('GKPI_JKPS_KK_2', 'Ama Pnt. J.C.A. Sinaga, M. Pd/Br.Manalu', 'Sipoholon', 'Aktif', '1992-11-17', '2024-06-04 01:47:23', '2024-06-04 01:47:23', 'lampiran/keluarga/1717465643-b56db20902130d225569273c2c76838d.jpg', 1),
('GKPI_JKPS_KK_3', 'Ama Pnt. J.R. Panggabean/Br.Nababan', 'Sipoholon', 'Aktif', '1996-06-17', '2024-06-04 01:48:26', '2024-06-04 01:48:26', '', 2),
('GKPI_JKPS_KK_4', 'Ama Alfonso Situmeang/Br.Simorangkir', 'Sipoholon', 'Aktif', '1993-01-10', '2024-06-04 01:49:44', '2024-06-04 01:49:44', '', 3),
('GKPI_JKPS_KK_5', 'Ama Tonni Manaris Simangunsong/Br.Nababan', 'Sipoholon', 'Aktif', '1995-07-04', '2024-06-04 02:59:07', '2024-06-04 02:59:07', '', 2),
('GKPI_JKPS_KK_6', 'Ama. Pnt. L. Pakpahan/ Br. Hutauruk', 'Sipoholon', 'Aktif', '1998-07-05', '2024-06-06 12:08:58', '2024-06-06 12:08:58', '', 2),
('GKPI_JKPS_KK_7', 'Ama Pnt. H. Panggabean/Br.Purba', 'Sipoholon', 'Aktif', '1992-09-04', '2024-06-04 03:18:06', '2024-06-04 03:18:06', '', 1),
('GKPI_JKPS_KK_9', 'Ama. Syahrial Sitorus/ Br. Pakpahan', 'Balige', 'Aktif', '2024-06-07', '2024-06-07 01:36:58', '2024-06-07 01:36:58', 'lampiran/keluarga/1717724218-9f1c2c376c8d0354b21ca5afbdd5a325.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` enum('Persembahan','Diakoni Sosial','Kas') NOT NULL,
  `keterangan` text NOT NULL,
  `jenis_keuangan` enum('Pengeluaran','Pemasukan','Pembagian') NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(16) DEFAULT NULL,
  `updated_by` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id`, `kategori`, `keterangan`, `jenis_keuangan`, `tanggal`, `nominal`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(34, 'Diakoni Sosial', 'Bantuan Ke Pasar Tarutung', 'Pemasukan', '2024-06-02', 1500000, '2024-06-04 03:29:20', '2024-06-04 03:29:20', NULL, NULL),
(35, 'Persembahan', 'Sekolah Minggu', 'Pemasukan', '2024-06-05', 50000, '2024-06-05 09:44:57', '2024-06-06 11:37:27', NULL, NULL),
(36, 'Persembahan', 'Ina Debora', 'Pembagian', '2024-06-05', 520000, '2024-06-05 09:46:12', '2024-06-06 14:34:09', NULL, NULL),
(37, 'Persembahan', 'Minggu Umum', 'Pengeluaran', '2024-06-05', 500000, '2024-06-05 09:46:57', '2024-06-05 09:46:57', NULL, NULL),
(38, 'Diakoni Sosial', 'sumbangan', 'Pemasukan', '2024-06-05', 90000000, '2024-06-05 09:49:16', '2024-06-05 09:49:16', NULL, NULL),
(39, 'Persembahan', 'Minggu Umum', 'Pembagian', '2024-06-05', 165000, '2024-06-05 10:58:57', '2024-06-05 10:58:57', NULL, NULL),
(40, 'Persembahan', 'Minggu Umum', 'Pembagian', '2024-06-05', 165000, '2024-06-05 11:00:32', '2024-06-05 11:00:32', NULL, NULL),
(41, 'Persembahan', 'Ina Debora', 'Pemasukan', '2024-06-05', 15000000, '2024-06-06 11:07:23', '2024-06-06 14:25:47', NULL, NULL),
(42, 'Persembahan', 'Sekolah Minggu', 'Pemasukan', '2024-06-04', 30000, '2024-06-06 14:23:31', '2024-06-06 14:23:31', NULL, NULL),
(43, 'Persembahan', 'Sekolah Minggu', 'Pembagian', '2024-06-04', 80000, '2024-06-06 14:24:54', '2024-06-06 14:24:54', NULL, NULL),
(44, 'Persembahan', 'Sekolah Minggu', 'Pemasukan', '2024-06-07', 90000, '2024-06-07 01:38:21', '2024-06-07 01:38:21', NULL, NULL),
(45, 'Persembahan', 'Ina Debora', 'Pembagian', '2024-06-07', 160000, '2024-06-07 01:39:03', '2024-06-07 01:39:23', NULL, NULL),
(46, 'Persembahan', 'Minggu Umum', 'Pemasukan', '2024-06-09', 1200000, '2024-06-10 04:57:18', '2024-06-10 04:57:18', NULL, NULL),
(47, 'Persembahan', 'Ina Debora', 'Pemasukan', '2024-06-05', 540000, '2024-06-10 05:04:09', '2024-06-10 05:04:09', NULL, NULL),
(48, 'Persembahan', 'Sekolah Minggu', 'Pemasukan', '2024-06-10', 800000, '2024-06-10 06:45:17', '2024-06-10 11:46:38', NULL, NULL),
(49, 'Persembahan', 'Ina Debora', 'Pemasukan', '2024-06-10', 120000, '2024-06-11 03:47:42', '2024-06-11 03:47:42', NULL, NULL),
(50, 'Diakoni Sosial', 'Berdukacita', 'Pemasukan', '2024-06-11', 500000, '2024-06-11 03:53:20', '2024-06-11 03:53:20', NULL, NULL),
(51, 'Kas', 'Penyerahan ke kantor sinode', 'Pengeluaran', '2024-06-10', 100000, '2024-06-11 04:50:01', '2024-06-11 08:55:04', NULL, NULL),
(52, 'Persembahan', 'Partangiangan PP dan Remaja', 'Pemasukan', '2024-06-10', 200000, '2024-06-11 12:59:09', '2024-06-11 12:59:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_04_14_135757_create_jemaat', 1),
(2, '2022_04_14_140941_create_keluarga', 1),
(3, '2022_04_14_141339_create_pelayan_gereja', 1),
(4, '2022_04_14_142700_create_keuangan', 1),
(5, '2022_04_14_143049_create_jadwal_ibadah', 1),
(6, '2022_04_14_143304_create_tata_ibadah', 1),
(7, '2022_04_14_143436_create_warta_jemaat', 1),
(8, '2022_04_14_143610_create_renungan', 1),
(9, '2022_04_14_143721_create_kegiatan', 1),
(10, '2022_04_14_143904_create_sektor', 1),
(11, '2022_04_14_144640_add_lampiran_to_jemaat_table', 1),
(12, '2022_04_14_144750_add_lampiran_to_keluarga_table', 1),
(13, '2022_04_14_144904_create_jemaat_keluarga', 1),
(14, '2022_04_15_215311_add_foreign_key_jemaat_to_sektor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelayan_gereja`
--

CREATE TABLE `pelayan_gereja` (
  `nik` varchar(16) NOT NULL,
  `peran` enum('Pendeta','Sekretaris','Bendahara','Penatua Aktif','Pelayan Ibadah','Tata Usaha','Seksi Pelayanan Rohani','Seksi Pekabaran Injil','Seksi Diakoni Sosial','Seksi Musik/Nyanyian/Koor','Seksi Sekolah Minggu','Seksi Pemuda/i (PP)','Pengawas Harta Benda','Penasehat Jemaat','Calon Penatua Aktif','Seksi Remaja','Seksi Perempuan','Seksi Pria','Seksi Lansia','Seksi Kesehatan','Seksi Pendidikan','Seksi Sarana dan Prasarana','Seksi Usaha/Pengembangan Sumber Daya') NOT NULL,
  `tanggal_terima_jabatan` date NOT NULL,
  `tanggal_akhir_jabatan` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelayan_gereja`
--

INSERT INTO `pelayan_gereja` (`nik`, `peran`, `tanggal_terima_jabatan`, `tanggal_akhir_jabatan`, `created_at`, `updated_at`, `id`) VALUES
('GKPI_JKPS_1', 'Pendeta', '2022-02-15', NULL, '2024-06-03 23:50:14', '2024-06-03 23:50:14', 1),
('GKPI_JKPS_13', 'Seksi Pelayanan Rohani', '2024-06-04', '2024-06-12', '2024-06-04 02:02:22', '2024-06-04 02:02:22', 6),
('GKPI_JKPS_14', 'Bendahara', '2024-06-04', NULL, '2024-06-04 02:38:27', '2024-06-04 02:38:27', 7),
('GKPI_JKPS_15', 'Seksi Pekabaran Injil', '2024-06-04', NULL, '2024-06-04 02:38:58', '2024-06-04 02:38:58', 8),
('GKPI_JKPS_16', 'Seksi Remaja', '2024-06-04', NULL, '2024-06-04 02:39:39', '2024-06-04 02:39:39', 9),
('GKPI_JKPS_17', 'Seksi Musik/Nyanyian/Koor', '2024-06-04', NULL, '2024-06-04 02:40:13', '2024-06-04 02:40:13', 10),
('GKPI_JKPS_12', 'Sekretaris', '2024-06-04', '2024-06-13', '2024-06-04 02:42:38', '2024-06-04 02:42:38', 11),
('GKPI_JKPS_18', 'Seksi Pemuda/i (PP)', '2024-06-04', NULL, '2024-06-04 02:55:13', '2024-06-04 02:55:13', 12),
('GKPI_JKPS_20', 'Seksi Perempuan', '2024-06-04', NULL, '2024-06-04 02:55:44', '2024-06-04 02:55:44', 13),
('GKPI_JKPS_19', 'Seksi Pria', '2024-06-04', NULL, '2024-06-04 02:56:15', '2024-06-04 02:56:15', 14),
('GKPI_JKPS_21', 'Pengawas Harta Benda', '2024-06-04', NULL, '2024-06-04 03:10:37', '2024-06-04 03:10:37', 15),
('GKPI_JKPS_22', 'Penasehat Jemaat', '2024-06-04', NULL, '2024-06-04 03:11:03', '2024-06-04 03:11:03', 16),
('GKPI_JKPS_23', 'Penatua Aktif', '2024-06-04', NULL, '2024-06-04 03:21:36', '2024-06-04 03:21:36', 17),
('GKPI_JKPS_12', 'Penatua Aktif', '2024-06-04', NULL, '2024-06-04 06:19:37', '2024-06-04 06:19:37', 18),
('GKPI_JKPS_17', 'Penatua Aktif', '2024-06-04', NULL, '2024-06-05 09:53:02', '2024-06-05 09:53:02', 20),
('GKPI_JKPS_25', 'Penasehat Jemaat', '2024-06-11', NULL, '2024-06-07 01:40:23', '2024-06-07 01:40:23', 21),
('GKPI_JKPS_26', 'Calon Penatua Aktif', '2024-06-07', NULL, '2024-06-07 02:22:01', '2024-06-07 02:22:01', 22);

-- --------------------------------------------------------

--
-- Table structure for table `pelayan_persembahanibadah`
--

CREATE TABLE `pelayan_persembahanibadah` (
  `id_persembahan` bigint(20) UNSIGNED NOT NULL,
  `id_pelayan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelayan_persembahanibadah`
--

INSERT INTO `pelayan_persembahanibadah` (`id_persembahan`, `id_pelayan`, `created_at`, `updated_at`) VALUES
(36, 11, '2024-06-06 14:33:23', '2024-06-06 14:34:09'),
(41, 11, '2024-06-06 14:25:47', '2024-06-10 11:48:24'),
(42, 11, '2024-06-06 14:23:31', '2024-06-06 14:23:31'),
(43, 11, '2024-06-06 14:24:54', '2024-06-06 14:24:54'),
(44, 11, '2024-06-07 01:38:21', '2024-06-07 01:38:21'),
(45, 11, '2024-06-07 01:39:03', '2024-06-07 01:39:23'),
(46, 11, '2024-06-10 04:57:18', '2024-06-10 04:57:18'),
(47, 11, '2024-06-10 05:04:09', '2024-06-10 05:04:09'),
(48, 11, '2024-06-10 06:45:17', '2024-06-11 01:56:04'),
(49, 11, '2024-06-11 03:47:42', '2024-06-11 03:47:42'),
(50, 11, '2024-06-11 03:53:20', '2024-06-11 03:53:20'),
(51, 11, '2024-06-11 04:50:01', '2024-06-11 04:50:01'),
(52, 11, '2024-06-11 12:59:09', '2024-06-11 12:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `pelayan_persembahankhusus`
--

CREATE TABLE `pelayan_persembahankhusus` (
  `id_persembahankhusus` int(11) NOT NULL,
  `id_pelayan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelayan_persembahankhusus`
--

INSERT INTO `pelayan_persembahankhusus` (`id_persembahankhusus`, `id_pelayan`, `created_at`, `updated_at`) VALUES
(16, 11, '2024-06-06 11:11:15', '2024-06-06 11:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `persembahan_khusus`
--

CREATE TABLE `persembahan_khusus` (
  `id` int(11) NOT NULL,
  `kategori` enum('Persembahan Bulanan','Ucapan Syukur') NOT NULL,
  `jenis_keuangan` enum('Pengeluaran','Pemasukan','Pembagian') NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_kk` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `persembahan_khusus`
--

INSERT INTO `persembahan_khusus` (`id`, `kategori`, `jenis_keuangan`, `tanggal`, `nominal`, `created_at`, `updated_at`, `no_kk`, `keterangan`) VALUES
(13, 'Persembahan Bulanan', 'Pemasukan', '2024-06-02', 300000, '2024-06-04 03:28:12', '2024-06-04 03:28:12', 'GKPI_JKPS_KK_2', 'sumbangan'),
(14, 'Ucapan Syukur', 'Pemasukan', '2024-06-04', 2000000000, '2024-06-05 09:48:13', '2024-06-05 09:48:13', 'GKPI_JKPS_KK_2', 'Lahiran anak pertama'),
(15, 'Ucapan Syukur', 'Pengeluaran', '2024-06-05', 800000, '2024-06-05 09:48:57', '2024-06-05 09:48:57', 'GKPI_JKPS_KK_2', 'sumbangan'),
(16, 'Ucapan Syukur', 'Pemasukan', '2024-06-06', 8000000, '2024-06-06 11:11:15', '2024-06-06 11:11:15', 'GKPI_JKPS_KK_2', 'Lahiran anak kedua');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `jenis_program` enum('Rancangan Program Kerja','Rancangan Anggaran Penerimaan dan Belanja') NOT NULL,
  `tahun` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `lampiran` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `jenis_program`, `tahun`, `created_at`, `updated_at`, `lampiran`) VALUES
(2, 'Rancangan Anggaran Penerimaan dan Belanja', 2024, '2024-06-06 10:13:04', '2024-05-05 22:40:46', '/lampiran/program/1715260099-a2bec97867783541c349a6c3fcc370ad.pdf'),
(3, 'Rancangan Program Kerja', 2024, '2024-06-06 11:46:47', '2024-05-09 11:51:48', '/lampiran/program/1717674407-ffa4e3e423724c82d9ca8dfe5ec6d11c.pdf'),
(5, 'Rancangan Program Kerja', 2022, '2024-06-06 10:12:10', '2024-06-01 11:31:37', '/lampiran/program/1717338669-4345b26ab386b404c5b50b2dffe736cc.pdf'),
(9, 'Rancangan Program Kerja', 2023, '2024-06-06 10:12:22', '2024-06-06 09:50:53', '/lampiran/program/1717667453-981ad29a58c37343b707271fbe7f051c.pdf'),
(10, 'Rancangan Program Kerja', 2017, '2024-06-07 02:27:28', '2024-06-07 02:27:28', '/lampiran/program/1717727248-2b81cc66c959130dd80d79b4ac6c5e1c.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `program_pelayan`
--

CREATE TABLE `program_pelayan` (
  `id_program` int(11) NOT NULL,
  `id_pelayan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_pelayan`
--

INSERT INTO `program_pelayan` (`id_program`, `id_pelayan`, `created_at`, `updated_at`) VALUES
(2, 11, '2024-06-06 10:12:56', '2024-06-06 10:13:04'),
(3, 11, '2024-06-06 11:46:47', '2024-06-06 11:46:47'),
(5, 11, '2024-06-06 10:12:10', '2024-06-06 10:12:10'),
(9, 11, '2024-06-06 09:50:53', '2024-06-06 10:12:22'),
(10, 11, '2024-06-07 02:27:28', '2024-06-07 02:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `renungan`
--

CREATE TABLE `renungan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `ayat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(16) DEFAULT NULL,
  `updated_by` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `renungan`
--

INSERT INTO `renungan` (`id`, `tanggal`, `title`, `isi`, `ayat`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '2022-05-21', 'Harapan jadi Bumerang', 'Ia mempersembahkan korban kepada para allah orang Damsyik yang telah mengalahkan dia. Pikirnya: \"Yang membantu raja-raja orang Aram adalah para allah mereka; kepada merekalah aku akan mempersembahkan korban, supaya mereka membantu aku juga.', '2 Tawarikh 28:23', '2022-05-19 08:20:05', '2022-05-19 08:20:05', NULL, NULL),
(2, '2022-05-20', 'Tetaplah Berdoa', 'Satu hal yang paling tidak kita sukai dalam hidup ini adalah menunggu. Terlebih lagi kalau harus menunggu dalam ketidakpastian. Ibarat berjalan dengan mata tertutup, situasi yang tak pasti membuat kita tidak bisa mengontrol apa yang bakal terjadi.', '1 Tesalonika 5 :12', '2022-05-20 19:44:13', '2022-05-20 19:44:13', NULL, NULL),
(3, '2022-06-05', 'Perkumpulan bangsa untuk mendengarkan', 'Yakni hari itu ketika engkau berdiri di hadapan TUHAN, Allahmu, di Horeb,  waktu TUHAN berfirman kepadaku: Suruhlah bangsa itu berkumpul kepada-Ku,  maka Aku akan memberi mereka mendengar segala perkataan-Ku', 'Ulangan 4 : 12', '2022-05-25 14:58:03', '2022-05-25 14:58:03', NULL, NULL),
(11, '2024-06-06', 'Pertobatan orang benar', 'Bertobatlah', '1 Yohanes 2 : 12', '2024-06-06 04:38:40', '2024-06-06 04:38:40', NULL, NULL),
(12, '2024-06-07', 'Berita Injil', 'Kabarkanlah berita injil', 'Roma 2:13', '2024-06-06 08:18:21', '2024-06-06 08:18:21', NULL, NULL),
(13, '2024-06-04', 'Pemotong Keramik', 'Sambil menunggu proses pemasangan batu nisan dikerjakan, perhatian saya mendadak tertuju pada seseorang yang sedang memotong keramik supaya bisa pas dipasang untuk memperindah pusara. \"Kok bisa lurus ya, meskipun tanpa penggaris atau sejenisnya?\" gumam saya sambil terheran-heran. Maklum, saya sendiri yakin takkan bisa melakukan pemotongan yang presisi tanpa alat bantu. Akhirnya, saya menyadari bahwa ada faktor penentu yang membedakan saya dengan orang yang sedang memotong keramik tadi, yakni pengalaman!\r\n\r\nTeori untuk mengerjakan sesuatu memang penting untuk dipelajari, juga dipahami sejelas mungkin. Namun, sehebat apa pun teori dipahami atau dikuasai, tanpa pernah dipraktikkan dalam kehidupan nyata maka semuanya akan sia-sia. Hanya teori yang dipraktikkan secara nyata, dalam durasi tertentu akan membuat seseorang menjadi berpengalaman. Dalam dunia kerja, durasi dalam mengerjakan sesuatu diyakini berbanding lurus dengan tingkat keahlian seorang pekerja, asalkan dikerjakan dengan sungguh-sungguh.\r\n\r\nNamun, sayang sekali, tak jarang ada orang yang cepat merasa puas dan tak lagi mengembangkan keahliannya. Alhasil, pekerjaan yang seharusnya dapat dikerjakannya dengan semakin ahli, mulai mengalami kemunduran hingga akhirnya kalah dalam persaingan. Bukankah besi juga tetap terjaga ketajamannya karena secara kontinu diasah dengan besi lainnya? Jadi, mengapa terkadang kita mudah menyerah dan merasa tak ada gunanya mengasah keahlian, yang sebenarnya dapat membuat kita semakin ahli dalam bidang apa pun?', 'Amsal 27:17', '2024-06-06 11:53:51', '2024-06-06 11:53:51', NULL, NULL),
(14, '2024-06-03', 'BUKAN KEKURANGAN', 'Adakah manusia yang tidak memiliki kekurangan? Setiap manusia pasti memiliki kekurangan, oleh karena itu sering kali manusia mendambakan kesempurnaan dalam hidupnya, supaya dapat menutupi kekurangannya. Akan tetapi, alih-alih mencapai kesempurnaan, kekurangan kita justru semakin bertambah karena kita tidak bisa melihat diri kita sendiri. Daripada menyikapi setiap kekurangan kita, kita justru semakin tergoda untuk mencari kesempurnaan diri, karena kita merasa bahwa kita lebih baik dari orang lain.\r\n\r\nBangsa Israel sendiri adalah bangsa yang terkecil bila dibandingkan dengan lawan-lawannya. Hal itu jelas menjadi kekurangan mereka karena besarnya sebuah bangsa, dapat menentukan hasil peperangan pada saat itu. Tetapi Allah tidak melihat hal itu sebagai kekurangan mereka. Allah melihat bangsa Israel sebagai bangsa yang dikasihi-Nya. Pada titik inilah bangsa Israel diingatkan oleh Allah, bahwa hanya karena kasih-Nya, maka mereka mampu menghalau bangsa-bangsa yang lebih besar. Oleh karena kasih Allah pada umat-Nya itulah, maka bangsa Israel harus tetap setia kepada Allah, dan tidak tergoda dengan hal-hal yang menggoda kemanusiaan mereka yang tidak sempurna.\r\n\r\nDalam menjalani hidup, sering kali kita hanya fokus pada kekurangan kita, dan dengan berbagai cara kita berusaha untuk menutupi kekurangan kita. Kita lupa bahwa sejatinya kita memang makhluk dengan kekurangan, dan ada Allah yang mengasihi kita. Oleh karena itu, sudah seharusnya kita menjalani hidup dengan tetap setia pada Allah, karena kita dimampukan di dalam-Nya.', 'Ulangan 7:7', '2024-06-06 11:54:42', '2024-06-06 11:54:42', NULL, NULL),
(15, '2024-06-02', 'UNTUK MENDATANGKAN BERKAT', 'Lewat jalan yang luar biasa, Yusuf menjadi raja muda di Mesir, orang paling berkuasa di Mesir selain Firaun. “Kepada perintahmu seluruh rakyatku akan taat … dengan tidak setahumu, seorang pun tidak boleh bergerak di seluruh tanah Mesir,” kata Firaun kepada Yusuf (ay. 40, 44). Alangkah besar kekuasaan yang ada di tangan Yusuf. Jika Yusuf mau, pasti tak sulit bagi Yusuf untuk menyalahgunakan kekuasaan yang sangat besar itu.\r\n\r\nTetapi, Yusuf tidak mau melakukan itu. Hal yang dia lakukan adalah bekerja keras. Dia meninggalkan istana, dan mengelilingi seluruh tanah Mesir (ay. 46b). Untuk apa? Melakukan semua hal yang perlu dilakukan untuk menyelamatkan Mesir dari bencana yang akan menimpa (ay. 48, 49). Dan ternyata kemudian, bangsa-bangsa lain pun ikut terselamatkan.\r\n\r\nAnda lihat? Kekuasaan yang besar tidak membuat Yusuf kehilangan integritas moral. Yusuf tidak mau warna dirinya ditentukan oleh kekuasaan. Dialah yang menentukan warna kekuasaan itu, bukan sebaliknya. Kekuasaan yang besar tidak membuatnya menjadi monster yang melahap segalanya, tetapi dia jadikan sebagai alat yang efektif untuk melayani dan membawa berkat bagi semua.\r\n\r\nDalam hidup, kekuasaan mewujud dalam banyak rupa: jabatan, kekayaan, massa pendukung, sumber daya, kekuatan fisik, dan banyak lagi. Dengan kekuasaan, orang bisa memaksakan kehendak. Tetapi, Yusuf memberi teladan bahwa—jika kita mau—kita bisa memilih untuk menjadikan kekuasaan sebagai alat yang efektif untuk melayani dan mendatangkan berkat bagi semua.', 'Kejadian 41:46b', '2024-06-06 11:55:43', '2024-06-06 11:55:43', NULL, NULL),
(16, '2024-06-01', 'Anak yang Dewasa', 'Berita kedatangan Yesus yang membebaskan umat dari belenggu tak juga membuat orang Yahudi memerdekakan diri dari Taurat. Karena itu Paulus menggambarkan mereka ibarat anak yang belum dewasa. Mereka lebih senang berada dalam kegelapan, menjadi hamba yang harus tunduk pada perintah Allah tanpa benar-benar mengetahui alasan dibaliknya. Padahal, mereka semestinya hidup di bawah Injil, kasih karunia yang jauh lebih terang dan memerdekakan. Oleh-Nya, mereka diangkat menjadi anak-anak Allah yang dewasa, yang berhak menjadi ahli waris dalam kerajaan-Nya.\r\n\r\nIman kepada Yesus Kristus memungkinkan orang percaya diangkat menjadi anak-anak-Nya. Dengan berserah kepada Roh Kudus kita dapat mengambil sifat seperti Yesus Kristus, menjadi serupa dengan-Nya. Kita boleh menyebut Allah sebagai Bapa. Kita juga berhak menjadi pewaris seluruh kekayaan Kristus. Kita dijadikan-Nya anak-anak yang merdeka. Kewargaan kita terjamin di surga karena kita adalah anak perjanjian.\r\n\r\nNamun demikian, perlu kita garis bawahi bahwa pewaris kerajaan surga adalah anak-anak yang dewasa. Bukan seperti anak-anak kecil yang hanya tahu merengek dan meminta kepada orang tuanya, anak-anak yang dewasa mengerti akan tugas tanggung jawab mereka. Lagi pula, Alkitab mencatat bahwa yang disebut sebagai anak-anak Allah adalah mereka yang membawa damai (Mat. 5:9), mengasihi musuh (Luk. 6:35), percaya dalam nama-Nya (Yoh. 1:12), beriman dalam Yesus Kristus (Gal. 3:26), berbuat kebenaran dan mengasihi saudara (1Yoh. 3:10).', 'Galatia 4:7', '2024-06-06 11:57:34', '2024-06-06 11:57:34', NULL, NULL),
(17, '2023-06-13', 'DIPELIHARA DALAM KEKUATAN ALLAH', 'Sebagai seorang anak, tak ada yang lebih menenangkan hati kecuali kita memahami bahwa ada orang tua yang sanggup memelihara kehidupan keluarga. Adanya keyakinan bahwa jerih lelah orang tua juga akan tersalurkan untuk pemenuhan kebutuhan, tentu akan mengurangi beban psikologis sehingga anak dapat berfokus untuk menyiapkan masa depannya dengan menuntut ilmu atau bekerja ketika sudah tiba waktunya mencari nafkah. Bagaimana dengan pemeliharaan dari Allah yang berlaku bagi orang-orang percaya?\r\n\r\nKetika Petrus menuliskan tentang pemeliharaan dalam kekuatan Allah, kebenaran itu tak hanya dalam urusan keselamatan jiwa dan iman kepada Kristus sampai akhir zaman, tetapi menyangkut pula soal pemeliharaan dalam kehidupan keseharian. Kalau seorang percaya meyakini dirinya dipelihara dalam kekuatan Allah, seharusnya tak ada lagi yang perlu ditakutkan. Topangan tangan kasih Allah akan memampukan kita untuk setia dalam iman kepada Kristus sampai akhir hayat. Kita pun dapat lebih tenang dalam menjalani hidup karena pemeliharaan Allah melampaui apa pun yang sanggup kita upayakan demi pemenuhan kebutuhan hidup.\r\n\r\nSama seperti ketenangan yang dirasakan seorang anak karena pemeliharaan orang tuanya, maka sebagai orang percaya seharusnya kita pun dapat menjalani hidup dengan tenang karena janji pemeliharaan-Nya atas kita. Pribadi yang tak pernah terlelap, pemilik kekuatan tanpa batas, dan Pribadi yang tak pernah kehabisan cara untuk menolong dan memberkati umat-Nya. Percayakah kita akan kebenaran yang menenteramkan ini?', '1 Petrus 1:5', '2024-06-06 11:58:35', '2024-06-06 11:58:35', NULL, NULL),
(18, '2024-05-31', 'INGATAN PENGHASIL SUKACITA', 'Hanya dengan mengingat nama seseorang kita dapat memberikan beragam respons. Ada nama yang mungkin meninggalkan sakit hati, kebencian, kepahitan, atau rasa kecewa bagi kita. Namun, ada juga nama yang menghangatkan hati atau membawa sukacita bagi kita. Kesan-kesan itu tentunya tidak muncul tanpa alasan, melainkan berasal dari jejak-jejak yang mereka tinggalkan sebelumnya.\r\n\r\nKetika Rasul Paulus mengingat jemaat di kota Filipi, hatinya dipenuhi syukur. Tiap kali ia berdoa bagi mereka, ia bersukacita (ay. 4). Ia juga sangat merindukan mereka (ay. 8). Alasannya ialah karena mereka memiliki persekutuan yang erat dalam Kristus sejak mereka mendengar Injil dan terus bertumbuh di dalamnya (ay. 5). Mereka juga tak henti-hentinya menunjukkan kasih dengan mendukung pelayanan Paulus, termasuk ketika ia dipenjarakan karena Kristus (ay. 7). Dukungan itu juga ditunjukkan dengan mengirimkan uang untuk mendukung pelayanan Paulus (Flp. 4:15-18), bahkan mereka secara khusus mengutus Epafroditus untuk melayani keperluan Paulus (Flp. 2:25-30). Tak heran jika sang rasul berkata, \"Kamu ada di dalam hatiku\" (ay. 7).\r\n\r\nKira-kira, kesan apakah yang kita tinggalkan dalam kehidupan orang-orang? Apakah nama kita membangkitkan syukur dan sukacita di hati mereka? Ataukah sebaliknya? Selagi Tuhan memberi kita anugerah kehidupan, kita masih dapat melakukan berbagai perbuatan kasih, yang kelak akan meninggalkan jejak-jejak yang mendatangkan sukacita dalam hidup banyak orang. Seperti itulah seharusnya kehidupan yang dijalani oleh setiap orang yang percaya kepada Kristus.', 'Filipi 1:3', '2024-06-06 12:02:43', '2024-06-06 12:02:43', NULL, NULL),
(19, '2024-05-30', 'ALLAH YANG SEPERTI ITU', '\"Jika Engkau dapat …,\" begitu kata pria itu kepada Tuhan. Pria itu tampak berharap pada Tuhan, tetapi dia tidak yakin bahwa Tuhan akan bisa menolongnya. Pria itu seperti sekadar mencoba siapa tahu Tuhan dapat menyembuhkan anaknya. Tampak jelas bahwa pria itu tidak memercayai Tuhan dengan keteguhan iman seperti yang Tuhan kehendaki.\r\n\r\nNamun, amatlah mengherankan bahwa meski demikian—meskipun pria itu tidak memercayai Tuhan dengan iman seperti yang Tuhan kehendaki—Tuhan ternyata tetap berbelaskasihan dan berkenan menolong.\r\n\r\nApa yang kita lihat di sana?\r\n\r\nLagi-lagi, kita melihat betapa pertolongan Tuhan, apa pun bentuknya, diberikan kepada kita bukan berdasarkan aspek apa pun yang ada pada kita, melainkan semata-mata karena belas kasih dan kemurahan Tuhan. Bukan percaya kita (aspek dalam diri kita, sesuatu dari kita) yang menolong kita, melainkan kasih Tuhan yang begitu besar, kasih tanpa syarat, yang memberikan anugerah kepada orang yang baik maupun yang jahat, kepada orang yang benar maupun yang tidak benar (Mat. 5:45).\r\n\r\nJika demikian, apakah kita tak usah beriman kepada Tuhan? Sama sekali bukan begitu! Namun, justru kepada Allah yang mengasihi semua orang tanpa syarat itu, kepada Allah yang tetap mengasihi semua orang entah orang itu percaya atau tidak percaya, entah orang itu baik atau jahat, kepada Allah yang seperti itulah kita ingin memercayakan hidup dan berserah diri, kepada Allah yang seperti itulah kita ingin bersyukur dengan segenap hati, segenap diri, seumur hidup kita.', 'Markus 9:22b', '2024-06-06 12:03:45', '2024-06-06 12:03:45', NULL, NULL),
(20, '2024-05-29', 'PEMBAYAR UTANG', 'Bila kita memiliki utang dan ada yang bersedia menanggungnya, niscaya kita akan sangat berterima kasih kepadanya. Bayangkan, kalau utang kita sangat besar sehingga kita tidak dapat membayarnya, ketika ada yang menyediakan diri membayarkan seluruh utang kita, kita mungkin bahkan rela mengabdi padanya. Sebaliknya, saya juga pernah menyaksikan orang yang masuk tahanan karena utang dan utangnya ditanggung oleh saudara jauhnya, yang bersangkutan tetap menganggap bahwa dirinyalah yang berjasa.\r\n\r\nYesaya menggambarkan Kristus sebagai pembayar utang nyawa kita, tetapi dengan cara yang sangat menyakitkan. Penderitaan Kristus digambarkan secara luar biasa dalam Yesaya 53. Begitu dramatis, tetapi puitis dan indah. Yang menarik, Yesaya memulai pasal ini dengan pertanyaan, \"Siapakah yang percaya kepada berita yang kami dengar …?\" (ay. 1). Begitu menderitanya Juru Selamat kita sehingga sulit untuk memercayai gambaran Yesaya ini. Kristus tidak melawan ketika dinista, dianiaya, dan dibunuh dengan cara yang teramat keji. \"Seperti anak domba yang dibawa ke pembantaian\" (ay. 7). Dia disejajarkan dengan penjahat demi menanggung dosa, penyakit akibat dosa, dan kesengsaraan kita.\r\n\r\nYang percaya kepada Kristus harus memperlihatkan respons yang tepat atas penderitaan yang pernah Ia alami. Sebab, pada dasarnya kita adalah orang-orang berutang yang tidak mungkin sanggup melunasinya sendiri. Sepatutnyalah kita mengabdi kepada-Nya yang telah membayar utang dosa kita dengan segenap hati.', 'Yesaya 53:4', '2024-06-06 12:04:28', '2024-06-06 12:04:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `renungan_pelayan`
--

CREATE TABLE `renungan_pelayan` (
  `id_renungan` bigint(20) UNSIGNED NOT NULL,
  `id_pelayan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `renungan_pelayan`
--

INSERT INTO `renungan_pelayan` (`id_renungan`, `id_pelayan`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-06-06 06:11:45', '2024-06-06 06:11:45'),
(1, 11, '2024-06-06 06:32:22', '2024-06-06 07:41:13'),
(2, 1, '2024-06-06 06:06:00', '2024-06-06 07:48:16'),
(3, 1, '2024-06-06 06:11:20', '2024-06-06 06:11:20'),
(3, 11, '2024-06-06 07:04:37', '2024-06-06 07:04:37'),
(11, 1, '2024-06-06 04:38:40', '2024-06-06 06:10:18'),
(11, 11, '2024-06-06 06:29:59', '2024-06-06 06:29:59'),
(12, 1, '2024-06-06 08:18:21', '2024-06-06 08:18:21'),
(13, 11, '2024-06-06 11:53:51', '2024-06-06 11:53:51'),
(14, 11, '2024-06-06 11:54:43', '2024-06-06 11:54:43'),
(15, 11, '2024-06-06 11:55:43', '2024-06-06 11:55:43'),
(16, 11, '2024-06-06 11:57:34', '2024-06-06 11:57:34'),
(17, 11, '2024-06-06 11:58:35', '2024-06-06 11:58:35'),
(18, 11, '2024-06-06 12:02:44', '2024-06-06 12:02:44'),
(19, 11, '2024-06-06 12:03:45', '2024-06-06 12:03:45'),
(20, 11, '2024-06-06 12:04:28', '2024-06-06 12:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `sektor`
--

CREATE TABLE `sektor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sektor`
--

INSERT INTO `sektor` (`id`, `nama`, `created_at`, `updated_at`, `keterangan`) VALUES
(1, 'Sektor I', NULL, NULL, 'Daerah Parluasan sampai Parlindungan Sipoholon'),
(2, 'Sektor II', NULL, NULL, 'Daerah Pardede sampai Parsilangan'),
(3, 'Sektor III', NULL, NULL, 'Daerah Tapian Nauli sampai Hutahuruk');

-- --------------------------------------------------------

--
-- Table structure for table `sidi`
--

CREATE TABLE `sidi` (
  `id_sidi` int(11) NOT NULL,
  `tgl_sidi` date DEFAULT NULL,
  `nama_pendeta_sidi` varchar(255) DEFAULT NULL,
  `no_surat_sidi` varchar(255) DEFAULT NULL,
  `file_surat_sidi` varchar(500) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `nik` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sidi`
--

INSERT INTO `sidi` (`id_sidi`, `tgl_sidi`, `nama_pendeta_sidi`, `no_surat_sidi`, `file_surat_sidi`, `created_at`, `updated_at`, `nik`) VALUES
(1, '2024-06-05', 'ccsdcsa', '987654321', '/lampiran/sidi/1717456460-c6fd81e13e541963bb286d819d24ae3a.png', '2024-06-04', '2024-06-04', 'GKPI_JKPS_2'),
(27, '1986-02-18', 'Marganda Siregar', '05/SS/GKPI/1985', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_13'),
(28, '1981-02-18', 'Marganda Siregar', '06/SS/GKPI/1980', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_14'),
(29, '1982-09-12', 'Marganda Siregar', '06/SB/GKPI/1981', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_15'),
(30, '1983-03-12', 'Marganda Siregar', '07/SB/GKPI/1982', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_16'),
(31, '1985-02-19', 'Marganda Siregar', '08/SS/GKPI/1984', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_17'),
(32, '2001-12-04', 'Marganda Siregar', '10/SS/GKPI/2000', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_18'),
(33, '2002-02-05', 'Marganda Siregar', '12/SS/GKPI/2002', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_20'),
(34, '2005-12-04', 'Marganda Siregar', '19/SS/GKPI/2005', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_19'),
(35, '1985-07-05', 'Marganda Siregar', '21/SS/GKPI/1985', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_21'),
(36, '1980-07-05', 'Marganda Siregar', '22/SS/GKPI/1979', '', '2024-06-04', '2024-06-04', 'GKPI_JKPS_22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baptis`
--
ALTER TABLE `baptis`
  ADD PRIMARY KEY (`id_baptis`),
  ADD UNIQUE KEY `unique_no_surat_baptis` (`no_surat_baptis`),
  ADD KEY `fk_nik_jemaat` (`nik`);

--
-- Indexes for table `berita_gereja`
--
ALTER TABLE `berita_gereja`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_judul` (`judul`),
  ADD KEY `warta_jemaat_created_by_foreign` (`created_by`),
  ADD KEY `warta_jemaat_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `berita_pelayan`
--
ALTER TABLE `berita_pelayan`
  ADD PRIMARY KEY (`id_berita`,`id_pelayan`),
  ADD KEY `fk_pelayan_berita` (`id_pelayan`);

--
-- Indexes for table `jadwal_ibadah`
--
ALTER TABLE `jadwal_ibadah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_ibadah_created_by_foreign` (`created_by`),
  ADD KEY `jadwal_ibadah_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `jadwal_pelayanan`
--
ALTER TABLE `jadwal_pelayanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ibadah_jadwal` (`id_jadwal_ibadah`),
  ADD KEY `fk_ibadah_pelayan` (`id_pelayan`);

--
-- Indexes for table `jemaat`
--
ALTER TABLE `jemaat`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `kode_registrasi` (`kode_registrasi`);

--
-- Indexes for table `jemaat_keluarga`
--
ALTER TABLE `jemaat_keluarga`
  ADD PRIMARY KEY (`nik`,`no_kk`),
  ADD KEY `jemaat_keluarga_no_kk_foreign` (`no_kk`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kas_keuangan`
--
ALTER TABLE `kas_keuangan`
  ADD PRIMARY KEY (`id_kas`,`id_keuangan`),
  ADD KEY `fk_keuangan` (`id_keuangan`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`no_kk`),
  ADD KEY `fk_sektor` (`id_sektor`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keuangan_created_by_foreign` (`created_by`),
  ADD KEY `keuangan_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelayan_gereja`
--
ALTER TABLE `pelayan_gereja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nik_pelayan` (`nik`);

--
-- Indexes for table `pelayan_persembahanibadah`
--
ALTER TABLE `pelayan_persembahanibadah`
  ADD PRIMARY KEY (`id_persembahan`,`id_pelayan`),
  ADD KEY `fk_PersembahanIbadah_pelayan` (`id_pelayan`);

--
-- Indexes for table `pelayan_persembahankhusus`
--
ALTER TABLE `pelayan_persembahankhusus`
  ADD PRIMARY KEY (`id_persembahankhusus`,`id_pelayan`),
  ADD KEY `fk_pelayan_persembahankhusus` (`id_pelayan`);

--
-- Indexes for table `persembahan_khusus`
--
ALTER TABLE `persembahan_khusus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_no_kk` (`no_kk`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_pelayan`
--
ALTER TABLE `program_pelayan`
  ADD PRIMARY KEY (`id_program`,`id_pelayan`),
  ADD KEY `fk_pelayan` (`id_pelayan`);

--
-- Indexes for table `renungan`
--
ALTER TABLE `renungan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_tanggal` (`tanggal`),
  ADD KEY `renungan_created_by_foreign` (`created_by`),
  ADD KEY `renungan_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `renungan_pelayan`
--
ALTER TABLE `renungan_pelayan`
  ADD PRIMARY KEY (`id_renungan`,`id_pelayan`),
  ADD KEY `fk_pelayann` (`id_pelayan`);

--
-- Indexes for table `sektor`
--
ALTER TABLE `sektor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqe_name` (`nama`);

--
-- Indexes for table `sidi`
--
ALTER TABLE `sidi`
  ADD PRIMARY KEY (`id_sidi`),
  ADD UNIQUE KEY `unique_no_surat_sidi` (`no_surat_sidi`),
  ADD KEY `fk_jemaat_nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baptis`
--
ALTER TABLE `baptis`
  MODIFY `id_baptis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `berita_gereja`
--
ALTER TABLE `berita_gereja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jadwal_ibadah`
--
ALTER TABLE `jadwal_ibadah`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jadwal_pelayanan`
--
ALTER TABLE `jadwal_pelayanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `jemaat`
--
ALTER TABLE `jemaat`
  MODIFY `kode_registrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pelayan_gereja`
--
ALTER TABLE `pelayan_gereja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `persembahan_khusus`
--
ALTER TABLE `persembahan_khusus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `renungan`
--
ALTER TABLE `renungan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sektor`
--
ALTER TABLE `sektor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sidi`
--
ALTER TABLE `sidi`
  MODIFY `id_sidi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baptis`
--
ALTER TABLE `baptis`
  ADD CONSTRAINT `fk_nik_jemaat` FOREIGN KEY (`nik`) REFERENCES `jemaat` (`nik`) ON DELETE CASCADE;

--
-- Constraints for table `berita_pelayan`
--
ALTER TABLE `berita_pelayan`
  ADD CONSTRAINT `fk_berita_gereja` FOREIGN KEY (`id_berita`) REFERENCES `berita_gereja` (`id`),
  ADD CONSTRAINT `fk_pelayan_berita` FOREIGN KEY (`id_pelayan`) REFERENCES `pelayan_gereja` (`id`);

--
-- Constraints for table `jadwal_ibadah`
--
ALTER TABLE `jadwal_ibadah`
  ADD CONSTRAINT `jadwal_ibadah_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `jemaat` (`nik`),
  ADD CONSTRAINT `jadwal_ibadah_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `jemaat` (`nik`);

--
-- Constraints for table `jadwal_pelayanan`
--
ALTER TABLE `jadwal_pelayanan`
  ADD CONSTRAINT `fk_ibadah_jadwal` FOREIGN KEY (`id_jadwal_ibadah`) REFERENCES `jadwal_ibadah` (`id`),
  ADD CONSTRAINT `fk_ibadah_pelayan` FOREIGN KEY (`id_pelayan`) REFERENCES `pelayan_gereja` (`id`);

--
-- Constraints for table `jemaat_keluarga`
--
ALTER TABLE `jemaat_keluarga`
  ADD CONSTRAINT `jemaat_keluarga_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `jemaat` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jemaat_keluarga_no_kk_foreign` FOREIGN KEY (`no_kk`) REFERENCES `keluarga` (`no_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kas_keuangan`
--
ALTER TABLE `kas_keuangan`
  ADD CONSTRAINT `fk_kas` FOREIGN KEY (`id_kas`) REFERENCES `kas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keuangan` FOREIGN KEY (`id_keuangan`) REFERENCES `keuangan` (`id`);

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `fk_sektor` FOREIGN KEY (`id_sektor`) REFERENCES `sektor` (`id`);

--
-- Constraints for table `pelayan_gereja`
--
ALTER TABLE `pelayan_gereja`
  ADD CONSTRAINT `fk_nik_pelayan` FOREIGN KEY (`nik`) REFERENCES `jemaat` (`nik`);

--
-- Constraints for table `pelayan_persembahanibadah`
--
ALTER TABLE `pelayan_persembahanibadah`
  ADD CONSTRAINT `fk_PersembahanIbadah_pelayan` FOREIGN KEY (`id_pelayan`) REFERENCES `pelayan_gereja` (`id`),
  ADD CONSTRAINT `fk_persembahanibadh` FOREIGN KEY (`id_persembahan`) REFERENCES `keuangan` (`id`);

--
-- Constraints for table `pelayan_persembahankhusus`
--
ALTER TABLE `pelayan_persembahankhusus`
  ADD CONSTRAINT `fk_pelayan_persembahankhusus` FOREIGN KEY (`id_pelayan`) REFERENCES `pelayan_gereja` (`id`),
  ADD CONSTRAINT `fk_persembahankhusus` FOREIGN KEY (`id_persembahankhusus`) REFERENCES `persembahan_khusus` (`id`);

--
-- Constraints for table `persembahan_khusus`
--
ALTER TABLE `persembahan_khusus`
  ADD CONSTRAINT `fk_no_kk` FOREIGN KEY (`no_kk`) REFERENCES `keluarga` (`no_kk`);

--
-- Constraints for table `program_pelayan`
--
ALTER TABLE `program_pelayan`
  ADD CONSTRAINT `fk_pelayan` FOREIGN KEY (`id_pelayan`) REFERENCES `pelayan_gereja` (`id`),
  ADD CONSTRAINT `fk_program` FOREIGN KEY (`id_program`) REFERENCES `program` (`id`);

--
-- Constraints for table `renungan_pelayan`
--
ALTER TABLE `renungan_pelayan`
  ADD CONSTRAINT `fk_pelayann` FOREIGN KEY (`id_pelayan`) REFERENCES `pelayan_gereja` (`id`),
  ADD CONSTRAINT `fk_renungan` FOREIGN KEY (`id_renungan`) REFERENCES `renungan` (`id`);

--
-- Constraints for table `sidi`
--
ALTER TABLE `sidi`
  ADD CONSTRAINT `fk_jemaat_nik` FOREIGN KEY (`nik`) REFERENCES `jemaat` (`nik`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
