<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('generate-pdf', [App\Http\Controllers\PdfController::class, 'generatePdf'])->name('generate.pdf');
// Route::get('generate-pdf/{id_jadwal_ibadah}', [App\Http\Controllers\PdfController::class, 'generatePdf'])->name('generate.pdf');


// Pengunjung
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/tataibadah', 'HomeController@ibadah')->name('home.ibadah');
Route::get('/Renungan', 'HomeController@renungan')->name('home.renungan');
Route::get('/BeritaPengunjung', 'HomeController@getBerita')->name('home.berita');
Route::get('/detail{id}', 'HomeController@detailnews')->name('home.detailnews');
Route::get('/StrukturOrganisasi', 'HomeController@struktur')->name('home.struktur');
Route::get('/RancanganProgramKerja', 'HomeController@programkerja')->name('home.programkerja');
Route::get('/RancanganAnggaranBiaya', 'HomeController@anggaranbiaya')->name('home.anggaranbiaya');
Route::get('/Renungan/{id}', 'HomeController@getRenunganById')->name('home.detailrenungan');

Route::middleware(['beforeauth'])->group(function () {
    Route::get('/login', 'AuthController@index')->name('auth.index');
    Route::post('/login', 'AuthController@login')->name('auth.login');
    Route::get('/registration', 'AuthController@registration')->name('auth.registration');
    Route::post('/registrationconfirm', 'AuthController@registrationconfirm')->name('auth.registrationconfirm');
    Route::get('/fillregistration/{no_reg}', 'AuthController@fillregistration')->name('auth.fillregistration');
    Route::post('/fillregistration/{no_reg}', 'AuthController@submitfillregistration')->name('auth.registersubmit');
});
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/logout', 'AuthController@logout')->name('auth.logout');


    Route::prefix('jemaat')->group(function () {
        Route::get('/', 'JemaatController@index')->name('jemaat.index');
        Route::get('/detailstatistik/{name}', 'JemaatController@detailstatistik')->name('detailstatistik.page');
        Route::get('/{nik}/profile', 'JemaatController@profile')->name('jemaat.profile');
        Route::post('/{nik}/profile', 'JemaatController@konfirmasi')->name('jemaat.konfirmasi');
        Route::post('/{nik}/update', 'JemaatController@updatepassword')->name('jemaat.updatepassword');
        Route::post('{nik}/updatefotoprofile', 'JemaatController@updatefotoprofile')->name('jemaat.updateFotoProfil');
        Route::get("/data/jemaatulangtahun", 'JemaatController@datajemaatulangtahun')->name('jemaat.datajemaatulangtahun');
        Route::get("/data/persembahanibadah/pemasukan", 'JemaatController@pemasukanpersembahanibadah')->name('jemaat.dataPemasukanPersembahanIbadah');
        Route::get("/data/persembahanibadah/pengeluaran", 'JemaatController@pengeluaranpersembahanibadah')->name('jemaat.dataPengeluaranPersembahanIbadah');
        Route::get("/data/persembahanibadah/pembagian", 'JemaatController@pembagianpersembahanibadah')->name('jemaat.dataPembagianPersembahanIbadah');
        Route::get("/data/persembahanibadah/pembagian/{id}", 'JemaatController@detailpembagianpersembahanibadah')->name('jemaat.detaildataPembagianPersembahanIbadah');
        Route::get("/data/persembahandiakonia/pemasukan", 'JemaatController@pemasukanpersembahandiakonia')->name('jemaat.dataPemasukanPersembahanDiakonia');
        Route::get("/data/persembahandiakonia/pengeluaran", 'JemaatController@pengeluaranpersembahandiakonia')->name('jemaat.dataPengeluaranPersembahanDiakonia');
        Route::get("/data/persembahankhusus/pemasukan", 'JemaatController@pemasukanpersembahankhusus')->name('jemaat.datapemasukanpersembahanKhusus');
        Route::get("/data/persembahankhusus/pengeluaran", 'JemaatController@pengeluaranpersembahankhusus')->name('jemaat.datapengeluaranpersembahanKhusus');
        Route::get('/jadwal', 'JemaatController@showjadwal')->name('jemaat.jadwal');
        Route::get('/jadwal/pelayanan/{id}', 'JemaatController@detailpelayanan')->name('jemaat.detailpelayanan');
        Route::get("/data/keuangan/pengeluarankas", 'JemaatController@pengeluarankas')->name('jemaat.pengeluarankas');
    });
    Route::prefix('pendeta')->group(function () {
        Route::get('/', 'PendetaController@index')->name('pendeta.index');
        Route::get('/detailstatistik/{name}', 'PendetaController@detailstatistik')->name('pendeta.detailstatistik');
        Route::get('/{nik}/profile', 'PendetaController@profile')->name('pendeta.profile');
        Route::post('/{nik}/profile', 'PendetaController@konfirmasi')->name('pendeta.konfirmasi');
        Route::post('/{nik}/update', 'PendetaController@updatepassword')->name('pendeta.updatepassword');
        Route::post('{nik}/updatefotoprofile', 'PendetaController@updatefotoprofile')->name('pendeta.updateFotoProfil');

        Route::get("/data/keluarga", 'PendetaController@datakeluarga')->name('pendeta.datakeluarga');
        Route::get("/data/keluarga/tidakaktif", 'PendetaController@datakeluargatidakaktif')->name('pendeta.datakeluargatidakaktif');
        Route::get("/data/keluarga/add", 'PendetaController@formkeluarga')->name('pendeta.formkeluarga');
        Route::post("/data/keluarga/add", 'PendetaController@formkeluargaprocess')->name('pendeta.formkeluarga');
        Route::get("/data/keluarga/{id}", 'PendetaController@detailkeluarga')->name('pendeta.detailkeluarga');
        Route::get("/editdatakeluarga/{id}", 'PendetaController@editdatakeluarga')->name('pendeta.editdatakeluarga');
        Route::post('/editdatakeluarga/{id}', 'PendetaController@update')->name('pendeta.update');
        Route::get("/data/jemaat/add/{idKeluarga}", 'PendetaController@formjemaat')->name('pendeta.formjemaat');
        Route::post("/data/jemaat/add/{idKeluarga}", 'PendetaController@formjemaatprocess')->name('pendeta.formjemaat');
        Route::get("/data/jemaat/{nik}", "PendetaController@detailjemaat")->name("pendeta.detailjemaat");
        Route::get("/data/jemaatdetail/{idKeluarga}/{nik}", "PendetaController@detailjemaat2")->name("pendeta.detailjemaat2");
        Route::get("/data/jemaat", 'PendetaController@datajemaat')->name('pendeta.datajemaat');
        Route::get("/data/jemaatTidakaktif", 'PendetaController@datajemaattidakaktif')->name('pendeta.datajemaattidakaktif');

        Route::get("/data/jemaatulangtahun", 'PendetaController@datajemaatulangtahun')->name('pendeta.datajemaatulangtahun');
        Route::get("/data/jemaat/edit/{nik}", "PendetaController@editdetailjemaat")->name("pendeta.editdetailjemaat");
        Route::post("/data/jemaat/edit/{nik}", "PendetaController@updateJemaat")->name("pendeta.updateJemaat");
        Route::get("/data/jemaat/editdetail/{idKeluarga}/{nik}", "PendetaController@editdetailjemaat2")->name("pendeta.editdetailjemaat2");
        Route::post("/data/jemaat/editdetail/{idKeluarga}/{nik}", "PendetaController@updateJemaat2")->name("pendeta.updateJemaat2");
        Route::get("/data/jemaat/keluargabaru/{no_kk}/{id}", "PendetaController@keluargabaru")->name("pendeta.keluargabaru");
        Route::post("/data/jemaat/keluargabaru/{no_kk}/{id}", "PendetaController@storekeluargabaru")->name("pendeta.storekeluargabaru");
        // Route::get("/data/statistik", 'PendetaController@datastatistik')->name('pendeta.datastatistik');
        Route::get('/pelayangereja', 'PendetaController@pelayan')->name('pendeta.datapelayan');
        Route::get("/data/pelayan/add", 'PendetaController@formpelayan')->name('pendeta.formdatapelayan');
        Route::post("/data/pelayan/add", 'PendetaController@formpelayanprocess')->name('pendeta.formdatapelayan');
        Route::get("/data/pelayan/edit/{id}", 'PendetaController@editdatapelayan')->name('pendeta.editpelayan');
        Route::post('/{id_user}/data/pelayan/edit/{id}', 'PendetaController@updatedatapelayan')->name('pendeta.updatepelayan');
        Route::get('/renungan', 'PendetaController@showrenungan')->name('pendeta.renunganshow');
        Route::get('/renungan/{id}', 'PendetaController@detailrenungan')->name('pendeta.detailrenungan');
        Route::get('/{id_user}/tambah-renungan', 'PendetaController@createrenungan')->name('pendeta.createrenungan');
        Route::post("/{id_user}/tambah-renungan", 'PendetaController@storerenungan')->name('pendeta.storerenungan');
        Route::get('/{id_user}/editrenungan/{id}', 'PendetaController@editrenungan')->name('pendeta.editrenungan');
        Route::post('/{id_user}/editrenungan/{id}', 'PendetaController@updaterenungan')->name('pendeta.updaterenungan');
        Route::get('/jadwal', 'PendetaController@showjadwal')->name('pendeta.jadwal');
        Route::get('/tambah-jadwal', 'PendetaController@createjadwal')->name('pendeta.createjadwal');
        Route::post("/tambah-jadwal", 'PendetaController@storejadwal')->name('pendeta.storejadwal');
        Route::get("/editjadwal/{id}", 'PendetaController@editjadwal')->name('pendeta.editjadwal');
        Route::post('/editjadwal/{id}', 'PendetaController@updatejadwal')->name('pendeta.updatejadwal');
        Route::get("/detail/ibadah", 'PendetaController@detailtataibadah')->name('pendeta.detailibadah');
        Route::get('/createpelayanan/{id}', 'PendetaController@createpelayanan')->name('pendeta.createpelayanan');
        Route::post('/createpelayanan/{id}', 'PendetaController@storepelayanan')->name('pendeta.storepelayanan');
        Route::get('/pelayanan', 'PendetaController@showpelayanan')->name('pendeta.pelayanan');
        Route::post('/pelayanan', 'PendetaController@showpelayanan')->name('pendeta.getpelayanan');
        Route::get('/jadwal/editpelayanan/{id}', 'PendetaController@editpelayanan')->name('pendeta.editpelayanan');
        Route::post('/jadwal/editpelayanan/{id}', 'PendetaController@updatepelayanan')->name('pendeta.updatepelayanan');
        Route::get('/jadwal/pelayanan/{id}', 'PendetaController@detailpelayanan')->name('pendeta.detailpelayanan');
        Route::get('detailpelayanan/{id_jadwal_ibadah}/pdf', 'PendetaController@detailpelayanan')->name('pdf.detailpelayanan');

        Route::get("/tambah-tata", 'PendetaController@createtata')->name('pendeta.createtata');
        Route::post("/tambah-tata", 'PendetaController@tatastore')->name('pendeta.createtata');
        Route::get('/tataibadah/{id}', 'PendetaController@edittataibadah')->name('pendeta.edittataibadah');
        Route::post('/tataibadah/{id}', 'PendetaController@updatetataibadah')->name('pendeta.updaetataibadah');
        Route::get('/data/sektor/anggota', 'PendetaController@showsektoranggota')->name('pendeta.sektor');
        Route::post('/data/sektor/anggota', 'PendetaController@showsektoranggota')->name('pendeta.getsektor');
        Route::get('/data/sektor', 'PendetaController@showsektor')->name('pendeta.Sektor');
        Route::get('/editsektor/{id}', 'PendetaController@editsektor')->name('pendeta.editsektor');
        Route::post('/editsektor/{id}', 'PendetaController@updatesektor')->name('pendeta.updatesektor');
        Route::get('/data/sektor/add', 'PendetaController@createsektor')->name('pendeta.createsektor');
        Route::post('/data/sektor/add', 'PendetaController@storesektor')->name('pendeta.storesektor');
        Route::get('/programkerja', 'PendetaController@showprogramkerja')->name('pendeta.showprogramKerja');
        Route::get('/RAPB', 'PendetaController@showRAPB')->name('pendeta.showRAPB');
        Route::get('/tambah-program', 'PendetaController@createprogram')->name('pendeta.createprogram');
        Route::post('/{id_user}/tambah-program', 'PendetaController@storeprogram')->name('pendeta.storeprogram');
        Route::get('/{id_user}/editprogram/{id}', 'PendetaController@editprogram')->name('pendeta.editprogram');
        Route::post('/{id_user}/editprogram/{id}', 'PendetaController@updateprogram')->name('pendeta.updateprogram');
        Route::get('/berita', 'PendetaController@showberita')->name('pendeta.berita');
        Route::get('/detail-berita/{id}', 'PendetaController@detailberita')->name('pendeta.detailberita');
        Route::get('/{id_user}/tambah-berita', 'PendetaController@createberita')->name('pendeta.createberita');
        Route::post('/{id_user}/tambah-berita', 'PendetaController@storeberita')->name('pendeta.storeberita');
        Route::get('/{id_user}/ubah-berita/{id}', 'PendetaController@editberita')->name('pendeta.editberita');
        Route::post('/{id_user}/ubah-berita/{id}', 'PendetaController@updateberita')->name('pendeta.updateberita');
        Route::get("/data/persembahanibadah/pemasukan", 'PendetaController@pemasukanpersembahanibadah')->name('pendeta.dataPemasukanPersembahanIbadah');
        Route::get("/data/persembahanibadah/pengeluaran", 'PendetaController@pengeluaranpersembahanibadah')->name('pendeta.dataPengeluaranPersembahanIbadah');
        Route::get("/data/persembahanibadah/pembagian", 'PendetaController@pembagianpersembahanibadah')->name('pendeta.dataPembagianPersembahanIbadah');
        Route::get("/data/persembahanibadah/pembagian/{id}", 'PendetaController@detailpembagianpersembahanibadah')->name('pendeta.detaildataPembagianPersembahanIbadah');
        Route::get("/data/persembahandiakonia/pemasukan", 'PendetaController@pemasukanpersembahandiakonia')->name('pendeta.dataPemasukanPersembahanDiakonia');
        Route::get("/data/persembahandiakonia/pengeluaran", 'PendetaController@pengeluaranpersembahandiakonia')->name('pendeta.dataPengeluaranPersembahanDiakonia');
        Route::get("/data/persembahankhusus/pemasukan", 'PendetaController@pemasukanpersembahankhusus')->name('pendeta.datapemasukanpersembahanKhusus');
        Route::get("/data/persembahankhusus/pengeluaran", 'PendetaController@pengeluaranpersembahankhusus')->name('pendeta.datapengeluaranpersembahanKhusus');
        // Route::get("/data/persembahankhusus/pembagian", 'PendetaController@pembagianpersembahankhusus')->name('pendeta.datapembagianpersembahanKhusus');
        Route::get("/data/keuangan/nonaktif", 'PendetaController@index2')->name('pendeta.datakeuangannonaktif');
        Route::get("/data/keuangan/add", 'PendetaController@formkeuangan')->name('pendeta.formtambahkeuangan');
        Route::post("/{id_user}/data/keuangan/add", 'PendetaController@formkeuanganprocess')->name('pendeta.formtambahkeuangan');

        Route::get("/data/keuangan/pengeluarankas", 'PendetaController@pengeluarankas')->name('pendeta.pengeluarankas');
        Route::get("/{id_user}/data/kas/pengeluaran/edit/{id}", 'PendetaController@ubahpengeluarankas')->name('pendeta.ubahdataPengeluaranKas');
        Route::post("/{id_user}/data/kas/pengeluaran/edit/{id}", 'PendetaController@updatepengeluarankas')->name('pendeta.updatePengeluaranKas');

        Route::get("/{id_user}/data/persembahanibadah/pemasukan/edit/{id}", 'PendetaController@ubahpemasukanpersembahanibadah')->name('pendeta.ubahdataPemasukanPersembahanIbadah');
        Route::post("/{id_user}/data/persembahanibadah/pemasukan/edit/{id}", 'PendetaController@updatepemasukanpersembahanibadah')->name('pendeta.updatepemasukanpersembahanibadah');
        Route::get("/{id_user}/data/persembahanibadah/pengeluaran/edit/{id}", 'PendetaController@ubahpengeluaranpersembahanibadah')->name('pendeta.ubahdataPengeluaranPersembahanIbadah');
        Route::post("/{id_user}/data/persembahanibadah/pengeluaran/edit/{id}", 'PendetaController@updatepengeluaranpersembahanibadah')->name('pendeta.updatePengeluaranpersembahanibadah');
        Route::get("/{id_user}/data/persembahanibadah/pembagian/edit/{id}", 'PendetaController@ubahpembagianpersembahanibadah')->name('pendeta.ubahdataPembagianPersembahanIbadah');
        Route::put("/{id_user}/data/persembahanibadah/pembagian/edit/{id}", 'PendetaController@updatepembagianpersembahanibadah')->name('pendeta.updatePembagianpersembahanibadah');

        Route::get("/{id_user}/data/persembahanibadah/persentase/edit", 'PendetaController@ubahpembagianpersentase')->name('pendeta.ubahdataPembagianpersentase');
        Route::post("/{id_user}/data/persembahanibadah/persentase/edit", 'PendetaController@updatepembagianpersentase')->name('pendeta.updatePembagianpersentase');
        Route::get("/{id_user}/data/kas/add", 'PendetaController@formkas')->name('pendeta.formtambahkas');
        Route::post("/{id_user}/data/kas/add", 'PendetaController@formkasprocess')->name('pendeta.formproseskas');

        Route::get("/{id_user}/data/persembahandiakonia/pemasukan/edit/{id}", 'PendetaController@ubahpemasukanpersembahandiakonia')->name('pendeta.ubahdataPemasukanPersembahandiakonia');
        Route::post("/{id_user}/data/persembahandiakonia/pemasukan/edit/{id}", 'PendetaController@updatepemasukanpersembahandiakonia')->name('pendeta.updatepemasukanpersembahandiakonia');
        Route::get("/{id_user}/data/persembahandiakonia/pengeluaran/edit/{id}", 'PendetaController@ubahpengeluaranpersembahandiakonia')->name('pendeta.ubahdataPengeluaranPersembahandiakonia');
        Route::post("/{id_user}/data/persembahandiakonia/pengeluaran/edit/{id}", 'PendetaController@updatepengeluaranpersembahandiakonia')->name('pendeta.updatePengeluaranpersembahandiakonia');
        Route::get("/{id_user}/data/persembahankhusus/pemasukan/edit/{id}", 'PendetaController@ubahpemasukanpersembahankhusus')->name('pendeta.ubahdataPemasukanPersembahanKhusus');
        Route::post("/{id_user}/data/persembahankhusus/pemasukan/edit/{id}", 'PendetaController@updatepemasukanpersembahankhusus')->name('pendeta.updatepemasukanpersembahankhusus');
        Route::get("/{id_user}/data/persembahankhusus/pengeluaran/edit/{id}", 'PendetaController@ubahpengeluaranpersembahankhusus')->name('pendeta.ubahdataPengeluaranPersembahanKhusus');
        Route::post("/{id_user}/data/persembahankhusus/pengeluaran/edit/{id}", 'PendetaController@updatepengeluaranpersembahankhusus')->name('pendeta.updatePengeluaranpersembahankhusus');
    });

    Route::prefix('pengurusharian')->group(function () {
        Route::get('/', 'PengurusharianController@index')->name('pengurusharian.index');
        Route::get('/detailstatistik/{name}', 'PengurusharianController@detailstatistik')->name('pengurusharian.detailstatistik');
        Route::get('/{nik}/profile', 'PengurusharianController@profile')->name('pengurusharian.profile');
        Route::post('/{nik}/profile', 'PengurusharianController@konfirmasi')->name('pengurusharian.konfirmasi');
        // Route::get('/{nik}/ubahpassword', 'PendetaController@ubahpassword')->name('pengurusharian.ubahpassword');
        Route::post('/{nik}/update', 'PengurusharianController@updatepassword')->name('pengurusharian.updatepassword');
        Route::post('{nik}/updatefotoprofile', 'PengurusharianController@updatefotoprofile')->name('pengurusharian.updateFotoProfil');


        Route::get("/data/keluarga", 'PengurusharianController@datakeluarga')->name('pengurusharian.datakeluarga');
        Route::get("/data/keluarga/tidakaktif", 'PengurusharianController@datakeluargatidakaktif')->name('pengurusharian.datakeluargatidakaktif');
        Route::get("/data/keluarga/add", 'PengurusharianController@formkeluarga')->name('pengurusharian.formkeluarga');
        Route::post("/data/keluarga/add", 'PengurusharianController@formkeluargaprocess')->name('pengurusharian.formkeluarga');
        Route::get("/data/keluarga/{id}", 'PengurusharianController@detailkeluarga')->name('pengurusharian.detailkeluarga');
        Route::get("/editdatakeluarga/{id}", 'PengurusharianController@editdatakeluarga')->name('pengurusharian.editdatakeluarga');
        Route::post('/editdatakeluarga/{id}', 'PengurusharianController@update')->name('pengurusharian.update');
        Route::get("/data/jemaat/add/{idKeluarga}", 'PengurusharianController@formjemaat')->name('pengurusharian.formjemaat');
        Route::post("/data/jemaat/add/{idKeluarga}", 'PengurusharianController@formjemaatprocess')->name('pengurusharian.formjemaat');
        Route::get("/data/jemaat/{nik}", "PengurusharianController@detailjemaat")->name("pengurusharian.detailjemaat");
        Route::get("/data/jemaatdetail/{idKeluarga}/{nik}", "PengurusharianController@detailjemaat2")->name("pengurusharian.detailjemaat2");
        Route::get("/data/jemaat", 'PengurusharianController@datajemaat')->name('pengurusharian.datajemaat');
        Route::get("/data/jemaatTidakaktif", 'PengurusharianController@datajemaattidakaktif')->name('pengurusharian.datajemaattidakaktif');
        Route::get("/data/jemaatulangtahun", 'PengurusharianController@datajemaatulangtahun')->name('pengurusharian.datajemaatulangtahun');
        Route::get("/data/jemaat/edit/{nik}", "PengurusharianController@editdetailjemaat")->name("pengurusharian.editdetailjemaat");
        Route::post("/data/jemaat/edit/{nik}", "PengurusharianController@updateJemaat")->name("pengurusharian.updateJemaat");
        Route::get("/data/jemaat/editdetail/{idKeluarga}/{nik}", "PengurusharianController@editdetailjemaat2")->name("pengurusharian.editdetailjemaat2");
        Route::post("/data/jemaat/editdetail/{idKeluarga}/{nik}", "PengurusharianController@updateJemaat2")->name("pengurusharian.updateJemaat2");
        Route::get("/data/jemaat/keluargabaru/{no_kk}/{id}", "PengurusharianController@keluargabaru")->name("pengurusharian.keluargabaru");
        Route::post("/data/jemaat/keluargabaru/{no_kk}/{id}", "PengurusharianController@storekeluargabaru")->name("pengurusharian.storekeluargabaru");
        // Route::get("/data/statistik", 'PendetaController@datastatistik')->name('pengurusharian.datastatistik');
        Route::get('/pelayangereja', 'PengurusharianController@pelayan')->name('pengurusharian.datapelayan');
        Route::get("/data/pelayan/add", 'PengurusharianController@formpelayan')->name('pengurusharian.formdatapelayan');
        Route::post("/data/pelayan/add", 'PengurusharianController@formpelayanprocess')->name('pengurusharian.formdatapelayan');
        Route::get("/data/pelayan/edit/{id}", 'PengurusharianController@editdatapelayan')->name('pengurusharian.editpelayan');
        Route::post('/{id_user}/data/pelayan/edit/{id}', 'PengurusharianController@updatedatapelayan')->name('pengurusharian.updatepelayan');
        Route::get('/renungan', 'PengurusharianController@showrenungan')->name('pengurusharian.renunganshow');
        Route::get('/renungan/{id}', 'PengurusharianController@detailrenungan')->name('pengurusharian.detailrenungan');
        Route::get('/{id_user}/tambah-renungan', 'PengurusharianController@createrenungan')->name('pengurusharian.createrenungan');
        Route::post("/{id_user}/tambah-renungan", 'PengurusharianController@storerenungan')->name('pengurusharian.storerenungan');
        Route::get('/{id_user}/editrenungan/{id}', 'PengurusharianController@editrenungan')->name('pengurusharian.editrenungan');
        Route::post('/{id_user}/editrenungan/{id}', 'PengurusharianController@updaterenungan')->name('pengurusharian.updaterenungan');
        Route::get('/jadwal', 'PengurusharianController@showjadwal')->name('pengurusharian.jadwal');
        Route::get('/tambah-jadwal', 'PengurusharianController@createjadwal')->name('pengurusharian.createjadwal');
        Route::post("/tambah-jadwal", 'PengurusharianController@storejadwal')->name('pengurusharian.storejadwal');
        Route::get("/editjadwal/{id}", 'PengurusharianController@editjadwal')->name('pengurusharian.editjadwal');
        Route::post('/editjadwal/{id}', 'PengurusharianController@updatejadwal')->name('pengurusharian.updatejadwal');
        Route::get("/detail/ibadah", 'PengurusharianController@detailtataibadah')->name('pengurusharian.detailibadah');
        Route::get('/createpelayanan/{id}', 'PengurusharianController@createpelayanan')->name('pengurusharian.createpelayanan');
        Route::post('/createpelayanan/{id}', 'PengurusharianController@storepelayanan')->name('pengurusharian.storepelayanan');
        Route::get('/pelayanan', 'PengurusharianController@showpelayanan')->name('pengurusharian.pelayanan');
        Route::post('/pelayanan', 'PengurusharianController@showpelayanan')->name('pengurusharian.getpelayanan');
        Route::get('/jadwal/editpelayanan/{id}', 'PengurusharianController@editpelayanan')->name('pengurusharian.editpelayanan');
        Route::post('/jadwal/editpelayanan/{id}', 'PengurusharianController@updatepelayanan')->name('pengurusharian.updatepelayanan');
        Route::get('/jadwal/pelayanan/{id}', 'PengurusharianController@detailpelayanan')->name('pengurusharian.detailpelayanan');
        Route::get('detailpelayanan/{id_jadwal_ibadah}/pdf', 'PengurusharianController@detailpelayanan')->name('pdf.detailpelayanan');

        Route::get("/tambah-tata", 'PengurusharianController@createtata')->name('pengurusharian.createtata');
        Route::post("/tambah-tata", 'PengurusharianController@tatastore')->name('pengurusharian.createtata');
        Route::get('/tataibadah/{id}', 'PengurusharianController@edittataibadah')->name('pengurusharian.edittataibadah');
        Route::post('/tataibadah/{id}', 'PengurusharianController@updatetataibadah')->name('pengurusharian.updaetataibadah');
        Route::get('/data/sektor/anggota', 'PengurusharianController@showsektoranggota')->name('pengurusharian.sektor');
        Route::post('/data/sektor/anggota', 'PengurusharianController@showsektoranggota')->name('pengurusharian.getsektor');
        Route::get('/data/sektor', 'PengurusharianController@showsektor')->name('pengurusharian.Sektor');
        Route::get('/editsektor/{id}', 'PengurusharianController@editsektor')->name('pengurusharian.editsektor');
        Route::post('/editsektor/{id}', 'PengurusharianController@updatesektor')->name('pengurusharian.updatesektor');
        Route::get('/data/sektor/add', 'PengurusharianController@createsektor')->name('pengurusharian.createsektor');
        Route::post('/data/sektor/add', 'PengurusharianController@storesektor')->name('pengurusharian.storesektor');
        Route::get('/programkerja', 'PengurusharianController@showprogramkerja')->name('pengurusharian.showprogramKerja');
        Route::get('/RAPB', 'PengurusharianController@showRAPB')->name('pengurusharian.showRAPB');
        Route::get('/tambah-program', 'PengurusharianController@createprogram')->name('pengurusharian.createprogram');
        Route::post('{id_user}/tambah-program', 'PengurusharianController@storeprogram')->name('pengurusharian.storeprogram');
        Route::get('/{id_user}/editprogram/{id}', 'PengurusharianController@editprogram')->name('pengurusharian.editprogram');
        Route::post('/{id_user}/editprogram/{id}', 'PengurusharianController@updateprogram')->name('pengurusharian.updateprogram');
        Route::get('/berita', 'PengurusharianController@showberita')->name('pengurusharian.berita');
        Route::get('/detail-berita/{id}', 'PengurusharianController@detailberita')->name('pengurusharian.detailberita');
        Route::get('/{id_user}/tambah-berita', 'PengurusharianController@createberita')->name('pengurusharian.createberita');
        Route::post('/{id_user}/tambah-berita', 'PengurusharianController@storeberita')->name('pengurusharian.storeberita');
        Route::get('/{id_user}/ubah-berita/{id}', 'PengurusharianController@editberita')->name('pengurusharian.editberita');
        Route::post('/{id_user}/ubah-berita/{id}', 'PengurusharianController@updateberita')->name('pengurusharian.updateberita');
        Route::get("/data/persembahanibadah/pemasukan", 'PengurusharianController@pemasukanpersembahanibadah')->name('pengurusharian.dataPemasukanPersembahanIbadah');
        Route::get("/data/persembahanibadah/pengeluaran", 'PengurusharianController@pengeluaranpersembahanibadah')->name('pengurusharian.dataPengeluaranPersembahanIbadah');
        Route::get("/data/persembahanibadah/pembagian", 'PengurusharianController@pembagianpersembahanibadah')->name('pengurusharian.dataPembagianPersembahanIbadah');
        Route::get("/data/persembahanibadah/pembagian/{id}", 'PengurusharianController@detailpembagianpersembahanibadah')->name('pengurusharian.detaildataPembagianPersembahanIbadah');
        Route::get("/data/persembahandiakonia/pemasukan", 'PengurusharianController@pemasukanpersembahandiakonia')->name('pengurusharian.dataPemasukanPersembahanDiakonia');
        Route::get("/data/persembahandiakonia/pengeluaran", 'PengurusharianController@pengeluaranpersembahandiakonia')->name('pengurusharian.dataPengeluaranPersembahanDiakonia');
        Route::get("/data/persembahankhusus/pemasukan", 'PengurusharianController@pemasukanpersembahankhusus')->name('pengurusharian.datapemasukanpersembahanKhusus');
        Route::get("/data/persembahankhusus/pengeluaran", 'PengurusharianController@pengeluaranpersembahankhusus')->name('pengurusharian.datapengeluaranpersembahanKhusus');
        // Route::get("/data/persembahankhusus/pembagian", 'PendetaController@pembagianpersembahankhusus')->name('pengurusharian.datapembagianpersembahanKhusus');
        Route::get("/data/keuangan/nonaktif", 'PengurusharianController@index2')->name('pengurusharian.datakeuangannonaktif');
        Route::get("/data/keuangan/add", 'PengurusharianController@formkeuangan')->name('pengurusharian.formtambahkeuangan');
        Route::post("/{id_user}/data/keuangan/add", 'PengurusharianController@formkeuanganprocess')->name('pengurusharian.formproseskeuangan');

        // Route::get("/data/keuangan/pemasukankas", 'PengurusharianController@pemasukankas')->name('pengurusharian.pemasukankas');
        Route::get("/data/keuangan/pengeluarankas", 'PengurusharianController@pengeluarankas')->name('pengurusharian.pengeluarankas');
        Route::get("/{id_user}/data/kas/pengeluaran/edit/{id}", 'PengurusharianController@ubahpengeluarankas')->name('pengurusharian.ubahdataPengeluaranKas');
        Route::post("/{id_user}/data/kas/pengeluaran/edit/{id}", 'PengurusharianController@updatepengeluarankas')->name('pengurusharian.updatePengeluaranKas');

        Route::get("/{id_user}/data/persembahanibadah/pemasukan/edit/{id}", 'PengurusharianController@ubahpemasukanpersembahanibadah')->name('pengurusharian.ubahdataPemasukanPersembahanIbadah');
        Route::post("/{id_user}/data/persembahanibadah/pemasukan/edit/{id}", 'PengurusharianController@updatepemasukanpersembahanibadah')->name('pengurusharian.updatepemasukanpersembahanibadah');
        Route::get("/{id_user}/data/persembahanibadah/pengeluaran/edit/{id}", 'PengurusharianController@ubahpengeluaranpersembahanibadah')->name('pengurusharian.ubahdataPengeluaranPersembahanIbadah');
        Route::post("/{id_user}/data/persembahanibadah/pengeluaran/edit/{id}", 'PengurusharianController@updatepengeluaranpersembahanibadah')->name('pengurusharian.updatePengeluaranpersembahanibadah');
        Route::get("/{id_user}/data/persembahanibadah/pembagian/edit/{id}", 'PengurusharianController@ubahpembagianpersembahanibadah')->name('pengurusharian.ubahdataPembagianPersembahanIbadah');
        Route::put("/{id_user}/data/persembahanibadah/pembagian/edit/{id}", 'PengurusharianController@updatepembagianpersembahanibadah')->name('pengurusharian.updatePembagianpersembahanibadah');
        Route::get("/{id_user}/data/persembahanibadah/persentase/edit", 'PengurusharianController@ubahpembagianpersentase')->name('pengurusharian.ubahdataPembagianpersentase');
        Route::post("/{id_user}/data/persembahanibadah/persentase/edit", 'PengurusharianController@updatepembagianpersentase')->name('pengurusharian.updatePembagianpersentase');
        Route::get("/{id_user}/data/kas/add", 'PengurusharianController@formkas')->name('pengurusharian.formtambahkas');
        Route::post("/{id_user}/data/kas/add", 'PengurusharianController@formkasprocess')->name('pengurusharian.formproseskas');

        Route::get("/{id_user}/data/persembahandiakonia/pemasukan/edit/{id}", 'PengurusharianController@ubahpemasukanpersembahandiakonia')->name('pengurusharian.ubahdataPemasukanPersembahandiakonia');
        Route::post("/{id_user}/data/persembahandiakonia/pemasukan/edit/{id}", 'PengurusharianController@updatepemasukanpersembahandiakonia')->name('pengurusharian.updatepemasukanpersembahandiakonia');
        Route::get("/{id_user}/data/persembahandiakonia/pengeluaran/edit/{id}", 'PengurusharianController@ubahpengeluaranpersembahandiakonia')->name('pengurusharian.ubahdataPengeluaranPersembahandiakonia');
        Route::post("/{id_user}/data/persembahandiakonia/pengeluaran/edit/{id}", 'PengurusharianController@updatepengeluaranpersembahandiakonia')->name('pengurusharian.updatePengeluaranpersembahandiakonia');
        Route::get("/{id_user}/data/persembahankhusus/pemasukan/edit/{id}", 'PengurusharianController@ubahpemasukanpersembahankhusus')->name('pengurusharian.ubahdataPemasukanPersembahanKhusus');
        Route::post("/{id_user}/data/persembahankhusus/pemasukan/edit/{id}", 'PengurusharianController@updatepemasukanpersembahankhusus')->name('pengurusharian.updatepemasukanpersembahankhusus');
        Route::get("/{id_user}/data/persembahankhusus/pengeluaran/edit/{id}", 'PengurusharianController@ubahpengeluaranpersembahankhusus')->name('pengurusharian.ubahdataPengeluaranPersembahanKhusus');
        Route::post("/{id_user}/data/persembahankhusus/pengeluaran/edit/{id}", 'PengurusharianController@updatepengeluaranpersembahankhusus')->name('pengurusharian.updatePengeluaranpersembahankhusus');
    });

    Route::prefix('penatua')->group(function () {
        Route::get('/', 'PenatuaController@index')->name('penatua.index');
        Route::get('/detailstatistik/{name}', 'PenatuaController@detailstatistik')->name('penatua.detailstatistik');
        Route::get('/{nik}/profile', 'PenatuaController@profile')->name('penatua.profile');
        Route::post('/{nik}/profile', 'PenatuaController@konfirmasi')->name('penatua.konfirmasi');
        // Route::get('/{nik}/ubahpassword', 'PendetaController@ubahpassword')->name('penatua.ubahpassword');
        Route::post('/{nik}/update', 'PenatuaController@updatepassword')->name('penatua.updatepassword');
        Route::post('{nik}/updatefotoprofile', 'PenatuaController@updatefotoprofile')->name('penatua.updateFotoProfil');

        Route::get('/jadwal', 'PenatuaController@showjadwal')->name('penatua.jadwal');
        Route::get('/tambah-jadwal', 'PenatuaController@createjadwal')->name('penatua.createjadwal');
        Route::post("/tambah-jadwal", 'PenatuaController@storejadwal')->name('penatua.storejadwal');
        Route::get("/editjadwal/{id}", 'PenatuaController@editjadwal')->name('penatua.editjadwal');
        Route::post('/editjadwal/{id}', 'PenatuaController@updatejadwal')->name('penatua.updatejadwal');
        Route::get("/detail/ibadah", 'PenatuaController@detailtataibadah')->name('penatua.detailibadah');
        Route::get('/createpelayanan/{id}', 'PenatuaController@createpelayanan')->name('penatua.createpelayanan');
        Route::post('/createpelayanan/{id}', 'PenatuaController@storepelayanan')->name('penatua.storepelayanan');
        Route::get('/pelayanan', 'PenatuaController@showpelayanan')->name('penatua.pelayanan');
        Route::post('/pelayanan', 'PenatuaController@showpelayanan')->name('penatua.getpelayanan');
        Route::get('/jadwal/editpelayanan/{id}', 'PenatuaController@editpelayanan')->name('penatua.editpelayanan');
        Route::post('/jadwal/editpelayanan/{id}', 'PenatuaController@updatepelayanan')->name('penatua.updatepelayanan');
        Route::get('/jadwal/pelayanan/{id}', 'PenatuaController@detailpelayanan')->name('penatua.detailpelayanan');
        Route::get("/data/keluarga", 'PenatuaController@datakeluarga')->name('penatua.datakeluarga');
        Route::get("/data/keluarga/tidakaktif", 'PenatuaController@datakeluargatidakaktif')->name('penatua.datakeluargatidakaktif');
        Route::get("/data/keluarga/add", 'PenatuaController@formkeluarga')->name('penatua.formkeluarga');
        Route::post("/data/keluarga/add", 'PenatuaController@formkeluargaprocess')->name('penatua.formkeluarga');
        Route::get("/data/keluarga/{id}", 'PenatuaController@detailkeluarga')->name('penatua.detailkeluarga');
        Route::get("/editdatakeluarga/{id}", 'PenatuaController@editdatakeluarga')->name('penatua.editdatakeluarga');
        Route::post('/editdatakeluarga/{id}', 'PenatuaController@update')->name('penatua.update');
        Route::get("/data/jemaat/add/{idKeluarga}", 'PenatuaController@formjemaat')->name('penatua.formjemaat');
        Route::post("/data/jemaat/add/{idKeluarga}", 'PenatuaController@formjemaatprocess')->name('penatua.formjemaat');
        Route::get("/data/jemaat/{nik}", "PenatuaController@detailjemaat")->name("penatua.detailjemaat");
        Route::get("/data/jemaatdetail/{idKeluarga}/{nik}", "PenatuaController@detailjemaat2")->name("penatua.detailjemaat2");
        Route::get("/data/jemaat", 'PenatuaController@datajemaat')->name('penatua.datajemaat');
        Route::get("/data/jemaatTidakaktif", 'PenatuaController@datajemaattidakaktif')->name('penatua.datajemaattidakaktif');
        Route::get("/data/jemaatulangtahun", 'PenatuaController@datajemaatulangtahun')->name('penatua.datajemaatulangtahun');
        Route::get("/data/jemaat/edit/{nik}", "PenatuaController@editdetailjemaat")->name("penatua.editdetailjemaat");
        Route::post("/data/jemaat/edit/{nik}", "PenatuaController@updateJemaat")->name("penatua.updateJemaat");
        Route::get("/data/jemaat/editdetail/{idKeluarga}/{nik}", "PenatuaController@editdetailjemaat2")->name("penatua.editdetailjemaat2");
        Route::post("/data/jemaat/editdetail/{idKeluarga}/{nik}", "PenatuaController@updateJemaat2")->name("penatua.updateJemaat2");
        Route::get("/data/jemaat/keluargabaru/{no_kk}/{id}", "PenatuaController@keluargabaru")->name("penatua.keluargabaru");
        Route::post("/data/jemaat/keluargabaru/{no_kk}/{id}", "PenatuaController@storekeluargabaru")->name("penatua.storekeluargabaru");

        Route::get('/berita', 'PenatuaController@showberita')->name('penatua.berita');
        Route::get('/detail-berita/{id}', 'PenatuaController@detailberita')->name('penatua.detailberita');
        Route::get('/{id_user}/tambah-berita', 'PenatuaController@createberita')->name('penatua.createberita');
        Route::post('/{id_user}/tambah-berita', 'PenatuaController@storeberita')->name('penatua.storeberita');
        Route::get('/{id_user}/ubah-berita/{id}', 'PenatuaController@editberita')->name('penatua.editberita');
        Route::post('/{id_user}/ubah-berita/{id}', 'PenatuaController@updateberita')->name('penatua.updateberita');
        Route::get("/data/persembahanibadah/pemasukan", 'PenatuaController@pemasukanpersembahanibadah')->name('penatua.dataPemasukanPersembahanIbadah');
        Route::get("/data/persembahanibadah/pengeluaran", 'PenatuaController@pengeluaranpersembahanibadah')->name('penatua.dataPengeluaranPersembahanIbadah');
        Route::get("/data/persembahanibadah/pembagian", 'PenatuaController@pembagianpersembahanibadah')->name('penatua.dataPembagianPersembahanIbadah');
        Route::get("/data/persembahanibadah/pembagian/{id}", 'PenatuaController@detailpembagianpersembahanibadah')->name('penatua.detaildataPembagianPersembahanIbadah');
        Route::get("/data/persembahandiakonia/pemasukan", 'PenatuaController@pemasukanpersembahandiakonia')->name('penatua.dataPemasukanPersembahanDiakonia');
        Route::get("/data/persembahandiakonia/pengeluaran", 'PenatuaController@pengeluaranpersembahandiakonia')->name('penatua.dataPengeluaranPersembahanDiakonia');
        Route::get("/data/persembahankhusus/pemasukan", 'PenatuaController@pemasukanpersembahankhusus')->name('penatua.datapemasukanpersembahanKhusus');
        Route::get("/data/persembahankhusus/pengeluaran", 'PenatuaController@pengeluaranpersembahankhusus')->name('penatua.datapengeluaranpersembahanKhusus');
        Route::get("/data/keuangan/pengeluarankas", 'PenatuaController@pengeluarankas')->name('penatua.pengeluarankas');
    });
});
Route::fallback(function () {
    abort(404);
});
