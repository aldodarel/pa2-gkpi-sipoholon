<?php

namespace App\Http\Controllers;

use App\jadwal_ibadah;
use App\Jemaat;
use App\Renungan;
use App\Keluarga;
use App\PelayanGereja;
use App\KeluargaJemaat;
use App\tata_ibadah;
use App\Sektor;
use App\Baptis;
use App\Models\Sidi;
use App\Jadwal_Pelayanan;
use App\Program;
use App\BeritaGereja;
use App\Keuangan;
use App\PersembahanKhusus;
use App\Kas;
use App\KasKeuangan;
use App\Pelayan_PersembahanIbadah;
use App\Pelayan_PersembahanKhusus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Dompdf\Dompdf;



class JemaatController extends Controller
{
    //
    function index(Request $request)
    {
        $datakeluarga = [
            [
                "name" => "Jumlah Keluarga",
                "jumlah" => Keluarga::all()->where("status", "Aktif")->count(),
                "color" => "bg-success",
                "icon" => "bi bi-people-fill font-utama fa-3x"
            ],
            [
                "name" => "Jumlah Pemuda Pemudi",
                "jumlah" => Jemaat::all()->where("status_pernikahan", "Belum Menikah")->where("status_gereja", "Aktif")->count(),
                "color" => "bg-info",
                "icon" => "bi bi-person-fill font-utama fa-3x"
            ],
            [
                "name" => "Jumlah Laki-laki(AMA)",
                "jumlah" => Jemaat::all()->where("jenis_kelamin", "Laki-laki")->where("status_pernikahan", "Menikah")->where("status_gereja", "Aktif")->count(),
                "color" => "bg-primary",
                "icon" => "bi bi-gender-male font-utama fa-3x"
            ],
            [
                "name" => "Jumlah Perempuan(INA)",
                "jumlah" => Jemaat::all()->where("jenis_kelamin", "Perempuan")->where("status_pernikahan", "Menikah")->where("status_gereja", "Aktif")->count(),
                "color" => "bg-pink",
                "icon" => "bi bi-gender-female font-utama fa-3x"
            ],
            [
                "name" => "Jumlah Jemaat Aktif",
                "jumlah" => Jemaat::all()->where("status_gereja", "Aktif")->count(),
                "color" => "bg-warning",
                "icon" => "bi bi-person-check-fill font-utama fa-3x"
            ],
            [
                "name" => "Jumlah Jemaat Tidak Aktif",
                "jumlah" => Jemaat::all()->where("status_gereja", "Pindah", "Meninggal")->count(),
                "color" => "bg-danger",
                "icon" => "bi bi-gender-female font-utama fa-3x"
            ],
        ];

        $sektor = \App\Sektor::all();
        $categories = [];
        $dataSeries = [];

        foreach ($sektor as $si) {
            $categories[] = $si->nama;
            $dataSeries[] = Keluarga::where("id_sektor", $si->id)->where("status", "Aktif")->count();
        }

        return view("Jemaat.index", [
            "datakeluargas" => $datakeluarga,
            "categories" => $categories,
            "dataSeries" => $dataSeries
        ]);
    }

    function detailstatistik($name){
        if($name == "Jumlah+Keluarga"){
            $keluarga = Keluarga::with('sektor')->where('status', 'Aktif')->get();
            return view('Jemaat.datakeluarga', [
                "keluargas" => $keluarga
        ]);
        } else if($name == "Jumlah+Jemaat+Aktif"){
            $jemaat = Jemaat::where('status_gereja', 'Aktif')->get();
            return view('Jemaat.datajemaat', [
            "jemaats" => $jemaat
        ]);
        } else if($name == "Jumlah+Jemaat+Tidak+Aktif"){
            $jemaat = Jemaat::where('status_gereja', '!=', 'Aktif')->get();
            return view('Jemaat.datajemaattidakaktif', [
            "jemaats" => $jemaat
        ]);
        } else if($name == "Jumlah+Pemuda+Pemudi"){
            $jemaat = Jemaat::where('status_gereja', 'Aktif')->where('status_pernikahan','Belum Menikah')->get();
            return view('Jemaat.datajemaat', [
            "jemaats" => $jemaat
        ]);
        }  else if($name == "Jumlah+Laki-laki(AMA)"){
            $jemaat = Jemaat::where('status_gereja', 'Aktif')->where('status_pernikahan','Menikah')->where('jenis_kelamin','Laki-laki')->get();
            return view('Jemaat.datajemaat', [
            "jemaats" => $jemaat
        ]);
        } else if($name == "Jumlah+Perempuan(INA)"){
            $jemaat = Jemaat::where('status_gereja', 'Aktif')->where('status_pernikahan','Menikah')->where('jenis_kelamin','Perempuan')->get();
            return view('Jemaat.datajemaat', [
            "jemaats" => $jemaat
        ]);
        }
    }


    function datakeluarga(Request $request)
    {
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with('sektor')->where('status', 'Aktif')->get();
        return view('Jemaat.datakeluarga', [
            "keluargas" => $keluarga
        ]);
    }
    function datakeluargatidakaktif(Request $request)
    {
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with('sektor')->where('status', '!=', 'Aktif')->get();
        return view('Jemaat.datakeluargatidakaktif', [
            "keluargas" => $keluarga
        ]);
    }

    function formkeluarga()
    {
        $sektors = Sektor::get();
        return view("Jemaat.formkeluarga", ['sektors' => $sektors]);
    }
    function formkeluargaprocess(Request $request)
    {
        $arrName = [];
        $invalidExtensions = [];
    
        if ($request->hasFile("lampiran")) {
            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $files = $request->file('lampiran');
    
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
    
                if (in_array($extension, $allowedfileExtension)) {
                    $name = time() . "-" . md5(rand()) . '.' . $extension;
                    $file->move(public_path('lampiran/keluarga/'), $name);
                    $arrName[] = 'lampiran/keluarga/' . $name;
                }else {
                    $invalidExtensions[] = $extension;
                }
            }
            if (!empty($invalidExtensions)) {
                $invalidExtensionsString = implode(', ', $invalidExtensions);
                return redirect()->back()->with('error', 'Ekstensi file ' . $invalidExtensionsString. ' tidak diperbolehkan !' );
            }
        }
        $fileName = implode("#", $arrName);
    
        $validatedData = $request->validate([
            'no_kk' => ['required'],
            'nama_keluarga' => ['required'],
            'alamat' => ['required'],
            'tanggal_nikah' => ['required'],
            'lampiran' => ['nullable'],
            'sektor_id' => ['required']
        ]);
    
        // Cek apakah no_kk sudah terdaftar
        if (Keluarga::where('no_kk', $validatedData['no_kk'])->exists()) {
            return redirect()->back()->with('error', 'Nomor Kartu Keluarga sudah terdaftar!');
        }
    
        $keluarga = new Keluarga();
        $keluarga->no_kk = $validatedData['no_kk'];
        $keluarga->nama_keluarga = $validatedData['nama_keluarga'];
        $keluarga->alamat = $validatedData['alamat'];
        $keluarga->tanggal_nikah = $validatedData['tanggal_nikah'];
        $keluarga->id_sektor = $validatedData['sektor_id'];
        $keluarga->lampiran = $fileName;
    
        if (!$keluarga->save()) {
            foreach ($arrName as $path) {
                if (file_exists(public_path($path))) {
                    unlink(public_path($path));
                }
            }
            return redirect()->back()->with('error', 'Data Keluarga Gagal Disimpan!');
        }
    
        return redirect()->route('jemaat.datakeluarga')->with('success', 'Data Keluarga Berhasil Disimpan!');
    }
    

    function detailkeluarga(Request $request, $id)
    {
        // $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->where('no_kk', $id)->first();
        $keluarga = Keluarga::with('sektor')->where('no_kk', $id)->first();
        // echo ($keluarga);
        $lampiran = explode("#", $keluarga['lampiran']);
        $jemaat = DB::select('
        SELECT j.*, jk.status
        FROM jemaat j 
        INNER JOIN jemaat_keluarga jk ON j.nik = jk.nik 
        WHERE jk.no_kk = ? 
        AND jk.status_anggota = "Aktif"
    ', [$id]);

        return view('Jemaat.detailkeluarga', ["keluarga" => $keluarga, 'lampiran' => $lampiran,  'jemaats' => $jemaat]);
    }
    

    public function keluargabaru($no_kk, $id)
    {
        $keluarga = Keluarga::all()->where('no_kk', '!=', $no_kk)->where('status', 'Aktif');
        $jemaat = Jemaat::where('nik', $id)->first();
        return view('Jemaat.formkeluargabaru', compact('keluarga', 'no_kk', 'jemaat'));
    }
    public function storekeluargabaru(Request $request, $no_kk,$id)
    {

        //validasi
        $jemaat_keluarga = $request->validate([
            'no_kk'     => ['required'],
            'posisi_di_keluarga'    => ['required']
        ]);

        DB::table('jemaat_keluarga')->where('nik', $id)->update([
            'status_anggota' => 'Nonaktif'
        ]);

        $jemaat_keluarga = new KeluargaJemaat();
        $jemaat_keluarga->nik = $id;
        $jemaat_keluarga->no_kk = $request->no_kk;
        $jemaat_keluarga->status = $request->posisi_di_keluarga;
        $jemaat_keluarga->save();


        return redirect("pendeta/data/keluarga/$request->no_kk")->with('success', 'Data Keluarga Berhasil Disimpan!');
    }
    public function editdatakeluarga(Request $request, $id)
    {
        $keluarga = Keluarga::with('sektor')->where('no_kk', $id)->first();
        // echo ($keluarga);
        $sektors = Sektor::get();
        $lampiran = explode("#", $keluarga['lampiran']);
        return view('Jemaat.editdatakeluarga', ["keluarga" => $keluarga, 'lampiran' => $lampiran, 'sektors' => $sektors]);
    }
    public function update(Request $request, $id)
{
    $no_kk = $request->no_kk;
    $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->where('no_kk', $no_kk)->first();
    $arrName = [];
    $invalidExtensions = [];

    if ($request->hasFile("lampiran")) {
        $allowedfileExtension = ['jpg', 'png', 'jpeg'];
        $files = $request->file('lampiran');

        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();

            if (in_array($extension, $allowedfileExtension)) {
                $str = rand();
                $result = md5($str);
                $name = time() . "-" . $result . '.' . $extension;
                $file->move(public_path() . '/lampiran/keluarga/', $name);
                array_push($arrName, '/lampiran/keluarga/' . $name);
            } else {
                $invalidExtensions[] = $extension;
            }
        }

        if (!empty($invalidExtensions)) {
            $invalidExtensionsString = implode(', ', $invalidExtensions);
            return redirect()->back()->with('error', 'Ekstensi file '. $invalidExtensionsString .' tidak diperbolehkan');
        }

        $fileName = join("#", $arrName);
    } else {
        $fileName = $keluarga['lampiran'];
    }

    // Data dari request
    $newData = [
        'no_kk' => $request->no_kk,
        'nama_keluarga' => $request->nama_keluarga,
        'tanggal_nikah' => $request->tanggal_nikah,
        'alamat' => $request->alamat,
        'status' => $request->status,
        'lampiran' => $fileName,
        'id_sektor' => $request->sektor_id
    ];

    // Data yang ada di database
    $currentData = [
        'no_kk' => $keluarga->no_kk,
        'nama_keluarga' => $keluarga->nama_keluarga,
        'tanggal_nikah' => $keluarga->tanggal_nikah,
        'alamat' => $keluarga->alamat,
        'status' => $keluarga->status,
        'lampiran' => $keluarga->lampiran,
        'id_sektor' => $keluarga->id_sektor
    ];

    // Bandingkan data baru dengan data yang ada
    if ($newData == $currentData) {
        return redirect()->route('jemaat.datakeluarga')->with('warning', 'Tidak ada perubahan pada data Keluarga!');
    } elseif (Keluarga::where('no_kk', $no_kk)->where('no_kk', '!=', $id)->exists()) {
        return redirect()->back()->with('error', 'Nomor Kartu Keluarga sudah terdaftar!');
    }

    // Update data jika berbeda
    DB::table('keluarga')->where('no_kk', $no_kk)->update($newData);

    return redirect()->route('jemaat.datakeluarga')->with('success', 'Data Keluarga Berhasil Diubah!');
}


    function datajemaat()
    {
        $jemaat = Jemaat::where('status_gereja', 'Aktif')->get();
        return view('Jemaat.datajemaat', [
            "jemaats" => $jemaat
        ]);
    }
    function datajemaattidakaktif()
    {
        $jemaat = Jemaat::where('status_gereja', '!=', 'Aktif')->get();
        return view('Jemaat.datajemaattidakaktif', [
            "jemaats" => $jemaat
        ]);
    }

    function datajemaatulangtahun()
{
    // Mengambil data jemaat yang statusnya Aktif
    $jemaat = Jemaat::where('status_gereja', 'Aktif')->get();

    // Mendapatkan tanggal hari Senin dan akhir minggu (Minggu) dari minggu ini
    $monday = Carbon::now()->startOfWeek(Carbon::MONDAY);
    $sunday = $monday->copy()->endOfWeek(Carbon::SUNDAY);

    // Menyiapkan array untuk jemaat yang berulang tahun dalam minggu ini
    $ulangTahunMingguIni = [];

    // Menambahkan informasi umur dan mengecek apakah ulang tahun dalam minggu ini
    foreach ($jemaat as $person) {
        // Menghitung umur
        $birthdate = Carbon::parse($person->tanggal_lahir);
        $person->umur = $monday->diffInYears($birthdate);

        // Mendapatkan tanggal ulang tahun tahun ini
        $ulangTahunTahunIni = Carbon::createFromDate($monday->year, $birthdate->month, $birthdate->day);

        // Mengecek apakah ulang tahun dalam minggu ini
        if ($ulangTahunTahunIni->between($monday, $sunday)) {
            $person->tanggal_ulang_tahun = $ulangTahunTahunIni->format('d-m-Y');
            $ulangTahunMingguIni[] = $person;
        }
    }

    return view('Jemaat.ulangtahun', [
        "jemaats" => $ulangTahunMingguIni
    ]);
}

    function formjemaat(Request $request, $idKeluarga)
    {
        $keluarga = Keluarga::where('no_kk', $idKeluarga)->first();

        return view('Jemaat.formjemaat', ['keluarga' => $keluarga]);
    }

    // function formjemaatprocess(Request $request, $idKeluarga)
    // {
    //     $arrName = [];
    //     $arrNameProfile = [];
    //     $arrNameBaptis = [];
    //     $arrNameSidi = [];
    //     $profile = "profile/default.png";

    //     // lampiran jemaat
    //     if ($request->hasFile("lampiran")) {

    //         $allowedfileExtension = ['jpg', 'png','jpeg'];
    //         $files = $request->file('lampiran');
    //         foreach ($files as $file) {
    //             $extension = $file->getClientOriginalExtension();

    //             if (in_array($extension, $allowedfileExtension)) {
    //                 $str = rand();
    //                 $result = md5($str);
    //                 $name = time() . "-" . $result . '.' . $extension;
    //                 $file->move(public_path() . '/lampiran/jemaat/', $name);
    //                 array_push($arrName, '/lampiran/jemaat/' . $name);
    //             }
    //         }
    //     }

    //     $fileName = join("#", $arrName);

    //     // lampiran Baptis

    //     if ($request->hasFile("surat_baptis")) {

    //         $allowedfileExtension = ['jpg', 'png','jpeg'];
    //         $files = $request->file('surat_baptis');
    //         foreach ($files as $file) {
    //             $extension = $file->getClientOriginalExtension();

    //             if (in_array($extension, $allowedfileExtension)) {
    //                 $str = rand();
    //                 $result = md5($str);
    //                 $name = time() . "-" . $result . '.' . $extension;
    //                 $file->move(public_path() . '/lampiran/baptis/', $name);
    //                 array_push($arrNameBaptis, '/lampiran/baptis/' . $name);
    //             }
    //         }
    //     }

    //     $fileNameBaptis = join("#", $arrNameBaptis);

    //     // lampiran Sidi

    //     if ($request->hasFile("surat_sidi")) {

    //         $allowedfileExtension = ['jpg', 'png','jpeg'];
    //         $files = $request->file('surat_sidi');
    //         foreach ($files as $file) {
    //             $extension = $file->getClientOriginalExtension();

    //             if (in_array($extension, $allowedfileExtension)) {
    //                 $str = rand();
    //                 $result = md5($str);
    //                 $name = time() . "-" . $result . '.' . $extension;
    //                 $file->move(public_path() . '/lampiran/sidi/', $name);
    //                 array_push($arrNameSidi, '/lampiran/sidi/' . $name);
    //             }
    //         }
    //     }

    //     $fileNameSidi = join("#", $arrNameSidi);

    //     //profile

    //     if ($request->hasFile("profile")) {

    //         $allowedfileExtension = ['jpg', 'png', 'jpeg'];
    //         $files = $request->file('profile');
    //         foreach ($files as $file) {
    //             $extension = $file->getClientOriginalExtension();

    //             if (in_array($extension, $allowedfileExtension)) {
    //                 $str = rand();
    //                 $result = md5($str);
    //                 $name = time() . "-" . $result . '.' . $extension;
    //                 $file->move(public_path() . '/profile/jemaat/', $name);
    //                 array_push($arrNameProfile, '/profile/jemaat/' . $name);
    //             }
    //         }
    //     }

    //     $fileNameProfile = join("#", $arrNameProfile);


    //     //validasi
    //     $jemaat = $request->validate([
    //         'nik'     => ['required'],
    //         'name'    => ['required'],
    //         'username'    => ['required'],
    //         'alamat'    => ['required'],
    //         'tempat_lahir'    => ['required'],
    //         'tanggal_lahir'    => ['required'],
    //         // 'tanggal_baptis'    => ['required'],
    //         // 'tanggal_sidih'    => ['required'],
    //         'profile'    =>  ['nullable'],
    //         'lampiran'    => ['required'],
    //         'no_telepon' => ['nullable']
    //     ]);

    //     // Validasi unik untuk nik, nomor surat baptis, dan nomor surat sidi
    // if (Jemaat::where('nik', $request->nik)->exists()) {
    //     return redirect()->back()->with('error', 'NIK sudah terdaftar!');
    // }

    // if (Baptis::where('no_surat_baptis', $request->nomor_surat_baptis)->exists()) {
    //     return redirect()->back()->with('error', 'Nomor surat baptis sudah terdaftar!');
    // }

    // if (Sidi::where('no_surat_sidi', $request->nomor_surat_sidi)->exists()) {
    //     return redirect()->back()->with('error', 'Nomor surat sidi sudah terdaftar!');
    // }

    //     $jemaat = new Jemaat();
    //     $jemaat->nik = $request->nik;
    //     $jemaat->name = $request->name;
    //     $jemaat->username = $request->username;
    //     $jemaat->jenis_kelamin = $request->jenis_kelamin;
    //     echo ($request->jenis_kelamin);
    //     $jemaat->password = '$2a$12$ibEFposc7rVfMv7zeMVJuO.OGRprwyDhcWnFMx1kbvpGCQum1Yapm';
    //     $jemaat->alamat = $request->alamat;
    //     $jemaat->alamat = $request->alamat;
    //     $jemaat->tempat_lahir = $request->tempat_lahir;
    //     $jemaat->tanggal_lahir = $request->tanggal_lahir;
    //     $jemaat->status_gereja = $request->status;
    //     $jemaat->status_pernikahan = $request->status_pernikahan;
    //     // $jemaat->tanggal_baptis = $request->tanggal_baptis;
    //     // $jemaat->tanggal_sidih = $request->tanggal_sidih;
    //     $jemaat->baptis = $request->baptis;
    //     echo ($request->baptis);
    //     $jemaat->sidi = $request->sidi;
    //     echo ($request->sidi);
    //     $jemaat->profile = $fileNameProfile;
    //     $jemaat->lampiran = $fileName;
    //     $jemaat->no_telepon = $request->no_telepon;

    //     $lampiran = explode("#", $fileName);


    //     if (!$jemaat->save()) {
    //         // unlink(public_path() . $profile);
    //         // foreach ($lampiran as $l) {
    //         //     unlink(public_path() . $l);
    //         if (count($arrName) > 1) {
    //             foreach ($arrName as $path) {
    //                 unlink(public_path() . $path);
    //             }
    //         }
    //         if (count($arrNameProfile) > 1) {
    //             foreach ($arrNameProfile as $path) {
    //                 unlink(public_path() . $path);
    //             }
    //         }
    //     } else {
    //         $jemaat_keluarga = new KeluargaJemaat();
    //         $jemaat_keluarga->nik = $request->nik;
    //         $jemaat_keluarga->no_kk = $idKeluarga;
    //         $jemaat_keluarga->status = $request->posisi_di_keluarga;
    //         $baptis = new Baptis();
    //         $baptis->tgl_baptis = $request->tanggal_baptis;
    //         $baptis->nama_pendeta_baptis =  $request->nama_pendeta;
    //         $baptis->no_surat_baptis = $request->nomor_surat_baptis;
    //         $baptis->file_surat_baptis = $fileNameBaptis;
    //         $baptis->nik = $request->nik;
    //         $sidi = new Sidi();
    //         $sidi->tgl_sidi = $request->tanggal_sidi;
    //         $sidi->nama_pendeta_sidi =  $request->nama_pendeta_sidi;
    //         $sidi->no_surat_sidi = $request->nomor_surat_sidi;
    //         $sidi->file_surat_sidi = $fileNameSidi;
    //         $sidi->nik = $request->nik;



    //         if (!$baptis->save() || !$jemaat_keluarga->save() || !$sidi->save()) {
    //             Jemaat::where("nik", $request->nik)->delete();
    //             unlink(public_path() . $profile);
    //             foreach ($lampiran as $l) {
    //                 unlink(public_path() . $l);
    //             }
    //         }

    //         return redirect('/pendeta/data/keluarga/' . $idKeluarga);
    //     }
    // }

    public function formjemaatprocess(Request $request, $idKeluarga)
{
    $arrName = [];
    $arrNameProfile = [];
    $arrNameBaptis = [];
    $arrNameSidi = [];
    $profile = "profile/default.png";

    // Variabel untuk menampung pesan error
    $errorMessages = [];

    // Fungsi untuk memproses file
    function processFile($files, $allowedExtensions, $destinationPath, &$arrName, &$errorMessages) {
        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            if (in_array($extension, $allowedExtensions)) {
                $str = rand();
                $result = md5($str);
                $name = time() . "-" . $result . '.' . $extension;
                $file->move(public_path() . $destinationPath, $name);
                array_push($arrName, $destinationPath . '/' . $name);
            } else {
                array_push($errorMessages, 'Ekstensi file ' . $extension . ' tidak diperbolehkan. Hanya ekstensi ' . implode(', ', $allowedExtensions) . ' yang diperbolehkan.');
            }
        }
    }

    // lampiran jemaat
    if ($request->hasFile("lampiran")) {
        $allowedfileExtension = ['jpg', 'png', 'jpeg'];
        processFile($request->file('lampiran'), $allowedfileExtension, '/lampiran/jemaat', $arrName, $errorMessages);
    }

    $fileName = join("#", $arrName);

    // lampiran Baptis
    if ($request->hasFile("surat_baptis")) {
        $allowedfileExtension = ['jpg', 'png', 'jpeg'];
        processFile($request->file('surat_baptis'), $allowedfileExtension, '/lampiran/baptis', $arrNameBaptis, $errorMessages);
    }

    $fileNameBaptis = join("#", $arrNameBaptis);

    // lampiran Sidi
    if ($request->hasFile("surat_sidi")) {
        $allowedfileExtension = ['jpg', 'png', 'jpeg'];
        processFile($request->file('surat_sidi'), $allowedfileExtension, '/lampiran/sidi', $arrNameSidi, $errorMessages);
    }

    $fileNameSidi = join("#", $arrNameSidi);

    // profile
    if ($request->hasFile("profile")) {
        $allowedfileExtension = ['jpg', 'png', 'jpeg'];
        processFile($request->file('profile'), $allowedfileExtension, '/profile/jemaat', $arrNameProfile, $errorMessages);
    }

    $fileNameProfile = join("#", $arrNameProfile);

    // Jika ada pesan error, kembalikan ke halaman sebelumnya dengan pesan error
    if (!empty($errorMessages)) {
        return redirect()->back()->with('error', implode('<br>', $errorMessages));
    }

    // validasi
    $jemaat = $request->validate([
        'nik'     => ['required'],
        'name'    => ['required'],
        'username'    => ['required'],
        'alamat'    => ['required'],
        'tempat_lahir'    => ['required'],
        'tanggal_lahir'    => ['required'],
        // 'tanggal_baptis'    => ['required'],
        // 'tanggal_sidih'    => ['required'],
        'profile'    =>  ['nullable'],
        'no_telepon' => ['nullable']
    ]);

    // Validasi unik untuk nik, nomor surat baptis, dan nomor surat sidi
    if (Jemaat::where('nik', $request->nik)->exists()) {
        return redirect()->back()->with('error', 'NIK sudah terdaftar!');
    }

    if (Baptis::where('no_surat_baptis', $request->nomor_surat_baptis)->exists()) {
        return redirect()->back()->with('error', 'Nomor surat baptis sudah terdaftar!');
    }

    if (Sidi::where('no_surat_sidi', $request->nomor_surat_sidi)->exists()) {
        return redirect()->back()->with('error', 'Nomor surat sidi sudah terdaftar!');
    }

    $jemaat = new Jemaat();
    $jemaat->nik = $request->nik;
    $jemaat->name = $request->name;
    $jemaat->username = $request->username;
    $jemaat->jenis_kelamin = $request->jenis_kelamin;
    echo ($request->jenis_kelamin);
    $jemaat->password = '$2a$12$ibEFposc7rVfMv7zeMVJuO.OGRprwyDhcWnFMx1kbvpGCQum1Yapm';
    $jemaat->alamat = $request->alamat;
    $jemaat->tempat_lahir = $request->tempat_lahir;
    $jemaat->tanggal_lahir = $request->tanggal_lahir;
    $jemaat->status_gereja = $request->status;
    $jemaat->status_pernikahan = $request->status_pernikahan;
    $jemaat->baptis = $request->baptis;
    echo ($request->baptis);
    $jemaat->sidi = $request->sidi;
    echo ($request->sidi);
    $jemaat->profile = $fileNameProfile;
    $jemaat->lampiran = $fileName;
    $jemaat->no_telepon = $request->no_telepon;

    $lampiran = explode("#", $fileName);

    if (!$jemaat->save()) {
        if (count($arrName) > 1) {
            foreach ($arrName as $path) {
                unlink(public_path() . $path);
            }
        }
        if (count($arrNameProfile) > 1) {
            foreach ($arrNameProfile as $path) {
                unlink(public_path() . $path);
            }
        }
    } else {
        $jemaat_keluarga = new KeluargaJemaat();
        $jemaat_keluarga->nik = $request->nik;
        $jemaat_keluarga->no_kk = $idKeluarga;
        $jemaat_keluarga->status = $request->posisi_di_keluarga;
        $baptis = new Baptis();
        $baptis->tgl_baptis = $request->tanggal_baptis;
        $baptis->nama_pendeta_baptis =  $request->nama_pendeta;
        $baptis->no_surat_baptis = $request->nomor_surat_baptis;
        $baptis->file_surat_baptis = $fileNameBaptis;
        $baptis->nik = $request->nik;
        $sidi = new Sidi();
        $sidi->tgl_sidi = $request->tanggal_sidi;
        $sidi->nama_pendeta_sidi =  $request->nama_pendeta_sidi;
        $sidi->no_surat_sidi = $request->nomor_surat_sidi;
        $sidi->file_surat_sidi = $fileNameSidi;
        $sidi->nik = $request->nik;

        if (!$baptis->save() || !$jemaat_keluarga->save() || !$sidi->save()) {
            Jemaat::where("nik", $request->nik)->delete();
            unlink(public_path() . $profile);
            foreach ($lampiran as $l) {
                unlink(public_path() . $l);
            }
        }

        return redirect('/pendeta/data/keluarga/' . $idKeluarga)->with('success', 'Data Jemaat Berhasil Disimpan!');
    }
}

    function datastatistik()
    {
        $datastatistik = [
            [
                "name" => "JUMLAH JEMAAT",
                "jumlah" => Jemaat::count(),
                "color" => "bg-success",
            ],
            [
                "name" => "JUMLAH JEMAAT SEKTOR OKULI",
                "jumlah" => Jemaat::all()->where("sektor_id", "1")->count(),
                "color" => "bg-warning",
            ],
            [
                "name" => "JUMLAH JEMAAT SEKTOR LETARE",
                "jumlah" => Jemaat::all()->where("sektor_id", "2")->count(),
                "color" => "bg-warning",
            ],
            [
                "name" => "JUMLAH JEMAAT SEKTOR JOSUA",
                "jumlah" => Jemaat::all()->where("sektor_id", "3")->count(),
                "color" => "bg-warning",
            ],
            [
                "name" => "JUMLAH JEMAAT SEKTOR AEK JORDAN",
                "jumlah" => Jemaat::all()->where("sektor_id", "4")->count(),
                "color" => "bg-warning",
            ],
            [
                "name" => "JUMLAH JEMAAT SEKTOR ESTOMIHI",
                "jumlah" => Jemaat::all()->where("sektor_id", "5")->count(),
                "color" => "bg-warning",
            ],
            [
                "name" => "JUMLAH JEMAAT SEKTOR ROGATE",
                "jumlah" => Jemaat::all()->where("sektor_id", "6")->count(),
                "color" => "bg-warning",
            ],
            [
                "name" => "JUMLAH JEMAAT SEKTOR SION",
                "jumlah" => Jemaat::all()->where("sektor_id", "7")->count(),
                "color" => "bg-warning",
            ],
        ];

        $sektor = \App\Sektor::all();

        //Data Untuk Grafik
        $categories = [];

        foreach ($sektor as $si) {
            $categories[] = $si->nama;
        }

        // Change this pagination if you want to increase pagination
        $keluargas = Keluarga::paginate(10);
        return view('Jemaat.datastatistik', [
            "datajemaats" => $datastatistik,
            "keluargas" => $keluargas,
            "categories" =>  $categories
        ]);
    }
    // function detailjemaat($nik){
    //     $jemaat = Jemaat::where("nik", $nik)->first();
    //     $baptis= Baptis::where("nik", $nik)->first();
    //     $sidi= Sidi::where("nik", $nik)->first();
    //     $lampiran = explode("#", $jemaat['lampiran']);
    //     $file_surat_baptis = $baptis ? explode("#", $baptis['file_surat_baptis']) : [];
    //     $file_surat_sidi = $sidi ? explode("#", $sidi['file_surat_sidi']) : [];
    //     return view('Jemaat.detailjemaat', ['jemaat'=> $jemaat,'lampiran'=> $lampiran, 'baptis'=>$baptis, 'sidi'=>$sidi, 'file_surat_baptis'=>$file_surat_baptis, 'file_surat_sidi'=>$file_surat_sidi]);
    // }

    function detailjemaat($nik)
    {
        // Cari data jemaat berdasarkan NIK
        $jemaat = Jemaat::where("nik", $nik)->first();
        $baptis = Baptis::where("nik", $nik)->first();
        $sidi = Sidi::where("nik", $nik)->first();

        // Pastikan $jemaat tidak null sebelum mencoba mengakses 'lampiran'
        $lampiran = $jemaat ? explode("#", $jemaat['lampiran']) : [];
        $file_surat_baptis = $baptis ? explode("#", $baptis['file_surat_baptis']) : [];
        $file_surat_sidi = $sidi ? explode("#", $sidi['file_surat_sidi']) : [];

        return view('Jemaat.detailjemaat', [
            'jemaat' => $jemaat,
            'lampiran' => $lampiran,
            'baptis' => $baptis,
            'sidi' => $sidi,
            'file_surat_baptis' => $file_surat_baptis,
            'file_surat_sidi' => $file_surat_sidi
        ]);
    }

    function detailjemaat2($idKeluarga,$nik)
    {
        // Cari data jemaat berdasarkan NIK
        $jemaat = Jemaat::where("nik", $nik)->first();
        $baptis = Baptis::where("nik", $nik)->first();
        $sidi = Sidi::where("nik", $nik)->first();

        // Pastikan $jemaat tidak null sebelum mencoba mengakses 'lampiran'
        $lampiran = $jemaat ? explode("#", $jemaat['lampiran']) : [];
        $file_surat_baptis = $baptis ? explode("#", $baptis['file_surat_baptis']) : [];
        $file_surat_sidi = $sidi ? explode("#", $sidi['file_surat_sidi']) : [];

        return view('Jemaat.detailjemaat', [
            'jemaat' => $jemaat,
            'lampiran' => $lampiran,
            'baptis' => $baptis,
            'sidi' => $sidi,
            'file_surat_baptis' => $file_surat_baptis,
            'file_surat_sidi' => $file_surat_sidi,
            'idKeluarga' => $idKeluarga
        ]);
    }


    function editdetailjemaat($nik)
    {
        // $baptis= Baptis::where("id_baptis", 1)->first();
        $jemaat = Jemaat::where("nik", $nik)->first();
        $baptis = Baptis::where("nik", $nik)->first();
        $sidi = Sidi::where("nik", $nik)->first();
        $sektors = Sektor::get();
        $lampiran = explode("#", $jemaat['lampiran']);
        $file_surat_baptis = $baptis ? explode("#", $baptis['file_surat_baptis']) : [];
        $file_surat_sidi = $sidi ? explode("#", $sidi['file_surat_sidi']) : [];
        return view('Jemaat.editdatajemaat', ['jemaat' => $jemaat, 'lampiran' => $lampiran, 'baptis' => $baptis, 'sidi' => $sidi, 'file_surat_baptis' => $file_surat_baptis, 'file_surat_sidi' => $file_surat_sidi, 'sektors' => $sektors]);
    }

    function editdetailjemaat2($idKeluarga,$nik)
    {
        // $baptis= Baptis::where("id_baptis", 1)->first();
        $jemaat = Jemaat::where("nik", $nik)->first();
        $baptis = Baptis::where("nik", $nik)->first();
        $sidi = Sidi::where("nik", $nik)->first();
        $sektors = Sektor::get();
        $lampiran = explode("#", $jemaat['lampiran']);
        $file_surat_baptis = $baptis ? explode("#", $baptis['file_surat_baptis']) : [];
        $file_surat_sidi = $sidi ? explode("#", $sidi['file_surat_sidi']) : [];
        return view('Jemaat.editdatajemaat', ['jemaat' => $jemaat, 'lampiran' => $lampiran, 'baptis' => $baptis, 'sidi' => $sidi, 'file_surat_baptis' => $file_surat_baptis, 'file_surat_sidi' => $file_surat_sidi, 'sektors' => $sektors,'idKeluarga'=>$idKeluarga]);
    }
    // function updateJemaat(Request $request) {
    //     $nik = $request->nik;
    //     $jemaat = Jemaat::where("nik", $nik)->first();
    //     $baptis= Baptis::where("nik", $nik)->first();
    //     $sidi= Sidi::where("nik", $nik)->first();
    
    //     $arrName = [];
    //     $arrNameBaptis = [];
    //     $arrNameSidi = [];
    
    //     // Definisikan ekstensi file yang diizinkan
    //     $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
    
    //     // Penanganan lampiran jemaat
    //     if ($request->hasFile("lampiran")) {
    //         $files = $request->file('lampiran');
    //         foreach ($files as $file) {
    //             $extension = $file->getClientOriginalExtension();
    //             if (in_array($extension, $allowedfileExtension)) {
    //                 $str = rand();
    //                 $result = md5($str);
    //                 $name = time() . "-" . $result . '.' . $extension;
    //                 $file->move(public_path() . '/lampiran/jemaat/', $name);
    //                 array_push($arrName, '/lampiran/jemaat/' . $name);
    //             }
    //         }
    //         $fileName = join("#", $arrName);
    //     } else {
    //         $fileName = $jemaat['lampiran'];
    //     }
    //     // Validasi unik untuk nik, nomor surat baptis, dan nomor surat sidi
    // if (Jemaat::where('nik', $request->nik)->exists()) {
    //     return redirect()->back()->with('error', 'NIK sudah terdaftar!');
    // }

    // if (Baptis::where('no_surat_baptis', $request->nomor_surat_baptis)->exists()) {
    //     return redirect()->back()->with('error', 'Nomor surat baptis sudah terdaftar!');
    // }

    // if (Sidi::where('no_surat_sidi', $request->nomor_surat_sidi)->exists()) {
    //     return redirect()->back()->with('error', 'Nomor surat sidi sudah terdaftar!');
    // }
    
    //     // Update tabel jemaat
    //     DB::table('jemaat')->where('nik', $nik)->update([
    //         'nik' => $request->nik,
    //         'name' => $request->name,
    //         'jenis_kelamin' => $request->jenis_kelamin,
    //         'alamat' => $request->alamat,
    //         'status_gereja' => $request->status,
    //         'status_pernikahan' => $request->status_pernikahan,
    //         'tempat_lahir' => $request->tempat_lahir,
    //         'baptis' => $request->baptis,
    //         'sidi' => $request->sidi,
    //         'no_telepon' => $request->no_telepon,
    //         'lampiran' => $fileName,
    //     ]);
    
    //     // Update file surat baptis jika ada
    //     if ($request->baptis == 'Ya') {
    //         if ($request->hasFile("file_surat_baptis")) {
    //             $files = $request->file('file_surat_baptis');
    //             $arrNameBaptis = [];
    //             foreach ($files as $file) {
    //                 $extension = $file->getClientOriginalExtension();
    //                 if (in_array($extension, $allowedfileExtension)) {
    //                     $str = rand();
    //                     $result = md5($str);
    //                     $name = time() . "-" . $result . '.' . $extension;
    //                     $file->move(public_path() . '/lampiran/baptis/', $name);
    //                     array_push($arrNameBaptis, '/lampiran/baptis/' . $name);
    //                 }
    //             }
    //             $fileNameBaptis = join("#", $arrNameBaptis);
    //         } else {
    //             $fileNameBaptis = $baptis['file_surat_baptis'];
    //         }
    
    //         DB::table('baptis')->updateOrInsert(
    //             ['nik' => $nik],
    //             [
    //                 'tgl_baptis' => $request->tgl_baptis,
    //                 'nama_pendeta_baptis' => $request->nama_pendeta_baptis,
    //                 'no_surat_baptis' => $request->no_surat_baptis,
    //                 'file_surat_baptis' => $fileNameBaptis
    //             ]
    //         );
    //     } else {
    //         DB::table('baptis')->where('nik', $nik)->delete();
    //     }
    
    //     // Update file surat sidi jika ada
    //     if ($request->sidi == 'Ya') {
    //         if ($request->hasFile("file_surat_sidi")) {
    //             $files = $request->file('file_surat_sidi');
    //             $arrNameSidi = [];
    //             foreach ($files as $file) {
    //                 $extension = $file->getClientOriginalExtension();
    //                 if (in_array($extension, $allowedfileExtension)) {
    //                     $str = rand();
    //                     $result = md5($str);
    //                     $name = time() . "-" . $result . '.' . $extension;
    //                     $file->move(public_path() . '/lampiran/sidi/', $name);
    //                     array_push($arrNameSidi, '/lampiran/sidi/' . $name);
    //                 }
    //             }
    //             $fileNameSidi = join("#", $arrNameSidi);
    //         } else {
    //             $fileNameSidi = $sidi['file_surat_sidi'];
    //         }
    
    //         DB::table('sidi')->updateOrInsert(
    //             ['nik' => $nik],
    //             [
    //                 'tgl_sidi' => $request->tgl_sidi,
    //                 'nama_pendeta_sidi' => $request->nama_pendeta_sidi,
    //                 'no_surat_sidi' => $request->no_surat_sidi,
    //                 'file_surat_sidi' => $fileNameSidi
    //             ]
    //         );
    //     } else {
    //         DB::table('sidi')->where('nik', $nik)->delete();
    //     }
    
    //     return back()->with('success', 'Data Jemaat Sudah Berhasil Diubah');
    // }

    // function updateJemaat(Request $request, $nik) {
    //     $jemaat = Jemaat::where("nik", $nik)->first();
    //     $baptis = Baptis::where("nik", $nik)->first();
    //     $sidi = Sidi::where("nik", $nik)->first();
    
    //     $arrName = [];
    //     $arrNameBaptis = [];
    //     $arrNameSidi = [];
    
    //     // Definisikan ekstensi file yang diizinkan
    //     $allowedfileExtension = ['jpg', 'png', 'jpeg'];
    
    //     // Penanganan lampiran jemaat
    //     if ($request->hasFile("lampiran")) {
    //         $files = $request->file('lampiran');
    //         foreach ($files as $file) {
    //             $extension = $file->getClientOriginalExtension();
    //             if (in_array($extension, $allowedfileExtension)) {
    //                 $str = rand();
    //                 $result = md5($str);
    //                 $name = time() . "-" . $result . '.' . $extension;
    //                 $file->move(public_path() . '/lampiran/jemaat/', $name);
    //                 array_push($arrName, '/lampiran/jemaat/' . $name);
    //             }
    //         }
    //         $fileName = join("#", $arrName);
    //     } else {
    //         $fileName = $jemaat['lampiran'];
    //     }
    
    //     // Data dari request
    //     $newJemaatData = [
    //         'nik' => $request->nik,
    //         'name' => $request->name,
    //         'jenis_kelamin' => $request->jenis_kelamin,
    //         'alamat' => $request->alamat,
    //         'status_gereja' => $request->status,
    //         'status_pernikahan' => $request->status_pernikahan,
    //         'tempat_lahir' => $request->tempat_lahir,
    //         'baptis' => $request->baptis,
    //         'sidi' => $request->sidi,
    //         'no_telepon' => $request->no_telepon,
    //         'lampiran' => $fileName,
    //     ];
    
    //     $currentJemaatData = [
    //         'nik' => $jemaat->nik,
    //         'name' => $jemaat->name,
    //         'jenis_kelamin' => $jemaat->jenis_kelamin,
    //         'alamat' => $jemaat->alamat,
    //         'status_gereja' => $jemaat->status_gereja,
    //         'status_pernikahan' => $jemaat->status_pernikahan,
    //         'tempat_lahir' => $jemaat->tempat_lahir,
    //         'baptis' => $jemaat->baptis,
    //         'sidi' => $jemaat->sidi,
    //         'no_telepon' => $jemaat->no_telepon,
    //         'lampiran' => $jemaat->lampiran,
    //     ];
    
    //     // Update file surat baptis jika ada
    //     if ($request->baptis == 'Ya') {
    //         if ($request->hasFile("file_surat_baptis")) {
    //             $files = $request->file('file_surat_baptis');
    //             foreach ($files as $file) {
    //                 $extension = $file->getClientOriginalExtension();
    //                 if (in_array($extension, $allowedfileExtension)) {
    //                     $str = rand();
    //                     $result = md5($str);
    //                     $name = time() . "-" . $result . '.' . $extension;
    //                     $file->move(public_path() . '/lampiran/baptis/', $name);
    //                     array_push($arrNameBaptis, '/lampiran/baptis/' . $name);
    //                 }
    //             }
    //             $fileNameBaptis = join("#", $arrNameBaptis);
    //         } else {
    //             $fileNameBaptis = $baptis['file_surat_baptis'] ?? null;
    //         }
    
    //         $newBaptisData = [
    //             'tgl_baptis' => $request->tgl_baptis,
    //             'nama_pendeta_baptis' => $request->nama_pendeta_baptis,
    //             'no_surat_baptis' => $request->no_surat_baptis,
    //             'file_surat_baptis' => $fileNameBaptis
    //         ];
    
    //         $currentBaptisData = [
    //             'tgl_baptis' => $baptis->tgl_baptis ?? null,
    //             'nama_pendeta_baptis' => $baptis->nama_pendeta_baptis ?? null,
    //             'no_surat_baptis' => $baptis->no_surat_baptis ?? null,
    //             'file_surat_baptis' => $baptis->file_surat_baptis ?? null
    //         ];
    //     } else {
    //         $newBaptisData = [];
    //         $currentBaptisData = [];
    //     }
    
    //     // Update file surat sidi jika ada
    //     if ($request->sidi == 'Ya') {
    //         if ($request->hasFile("file_surat_sidi")) {
    //             $files = $request->file('file_surat_sidi');
    //             foreach ($files as $file) {
    //                 $extension = $file->getClientOriginalExtension();
    //                 if (in_array($extension, $allowedfileExtension)) {
    //                     $str = rand();
    //                     $result = md5($str);
    //                     $name = time() . "-" . $result . '.' . $extension;
    //                     $file->move(public_path() . '/lampiran/sidi/', $name);
    //                     array_push($arrNameSidi, '/lampiran/sidi/' . $name);
    //                 }
    //             }
    //             $fileNameSidi = join("#", $arrNameSidi);
    //         } else {
    //             $fileNameSidi = $sidi['file_surat_sidi'] ?? null;
    //         }
    
    //         $newSidiData = [
    //             'tgl_sidi' => $request->tgl_sidi,
    //             'nama_pendeta_sidi' => $request->nama_pendeta_sidi,
    //             'no_surat_sidi' => $request->no_surat_sidi,
    //             'file_surat_sidi' => $fileNameSidi
    //         ];
    
    //         $currentSidiData = [
    //             'tgl_sidi' => $sidi->tgl_sidi ?? null,
    //             'nama_pendeta_sidi' => $sidi->nama_pendeta_sidi ?? null,
    //             'no_surat_sidi' => $sidi->no_surat_sidi ?? null,
    //             'file_surat_sidi' => $sidi->file_surat_sidi ?? null
    //         ];
    //     } else {
    //         $newSidiData = [];
    //         $currentSidiData = [];
    //     }
    
    //     // Bandingkan semua data
    //     if ($newJemaatData == $currentJemaatData && $newBaptisData == $currentBaptisData && $newSidiData == $currentSidiData) {
    //         return redirect()->back()->with('warning', 'Tidak ada perubahan pada data Jemaat, Baptis, atau Sidi!');
    //     }
    
    //     // Pengecekan keberadaan data yang sudah ada
    //     if (Jemaat::where('nik', $request->nik)->where('nik', '!=', $nik)->exists()) {
    //         return redirect()->back()->with('error', 'NIK sudah terdaftar!');
    //     }
    //     if ($request->baptis == 'Ya' && Baptis::where('no_surat_baptis', $request->no_surat_baptis)->where('nik', '!=', $nik)->exists()) {
    //         return redirect()->back()->with('error', 'Nomor surat baptis sudah terdaftar!');
    //     }
    //     if ($request->sidi == 'Ya' && Sidi::where('no_surat_sidi', $request->no_surat_sidi)->where('nik', '!=', $nik)->exists()) {
    //         return redirect()->back()->with('error', 'Nomor surat sidi sudah terdaftar!');
    //     }
    
    //     // Update tabel jemaat
    //     DB::table('jemaat')->where('nik', $nik)->update($newJemaatData);
    
    //     // Update data baptis jika diperlukan
    //     if ($request->baptis == 'Ya') {
    //         DB::table('baptis')->updateOrInsert(
    //             ['nik' => $nik],
    //             $newBaptisData
    //         );
    //     } else {
    //         DB::table('baptis')->where('nik', $nik)->delete();
    //     }
    
    //     // Update data sidi jika diperlukan
    //     if ($request->sidi == 'Ya') {
    //         DB::table('sidi')->updateOrInsert(
    //             ['nik' => $nik],
    //             $newSidiData
    //         );
    //     } else {
    //         DB::table('sidi')->where('nik', $nik)->delete();
    //     }
    
    //     return back()->with('success', 'Data Jemaat Berhasil Diubah');
    // }

    function updateJemaat(Request $request, $nik) {
        // Retrieve existing data
        $jemaat = Jemaat::where("nik", $nik)->first();
        $baptis = Baptis::where("nik", $nik)->first();
        $sidi = Sidi::where("nik", $nik)->first();
    
        if (!$jemaat) {
            return redirect()->back()->with('error', 'Jemaat tidak ditemukan!');
        }
    
        // Initialize arrays for file names
        $allowedfileExtension = ['jpg', 'png', 'jpeg'];
        $fileName = $this->handleFileUpload($request, 'lampiran', 'jemaat', $allowedfileExtension, $jemaat->lampiran);
        $fileNameBaptis = $request->baptis == 'Ya' ? $this->handleFileUpload($request, 'file_surat_baptis', 'baptis', $allowedfileExtension, $baptis->file_surat_baptis ?? null) : null;
        $fileNameSidi = $request->sidi == 'Ya' ? $this->handleFileUpload($request, 'file_surat_sidi', 'sidi', $allowedfileExtension, $sidi->file_surat_sidi ?? null) : null;
    
        // New data arrays
        $newJemaatData = [
            'nik' => $request->nik,
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'status_gereja' => $request->status,
            'status_pernikahan' => $request->status_pernikahan,
            'tempat_lahir' => $request->tempat_lahir,
            'baptis' => $request->baptis,
            'sidi' => $request->sidi,
            'no_telepon' => $request->no_telepon,
            'lampiran' => $fileName,
        ];
    
        $newBaptisData = $request->baptis == 'Ya' ? [
            'tgl_baptis' => $request->tgl_baptis,
            'nama_pendeta_baptis' => $request->nama_pendeta_baptis,
            'no_surat_baptis' => $request->no_surat_baptis,
            'file_surat_baptis' => $fileNameBaptis,
        ] : null;
    
        $newSidiData = $request->sidi == 'Ya' ? [
            'tgl_sidi' => $request->tgl_sidi,
            'nama_pendeta_sidi' => $request->nama_pendeta_sidi,
            'no_surat_sidi' => $request->no_surat_sidi,
            'file_surat_sidi' => $fileNameSidi,
        ] : null;
    
        // Check if there are changes in Jemaat data
        if ($newJemaatData == $jemaat->toArray() && ($newBaptisData == $baptis->toArray() ?? []) && ($newSidiData == $sidi->toArray() ?? [])) {
            return redirect()->back()->with('warning', 'Tidak ada perubahan pada data Jemaat, Baptis, atau Sidi!');
        }
    
        // Ensure NIK uniqueness
        if (Jemaat::where('nik', $request->nik)->where('nik', '!=', $nik)->exists()) {
            return redirect()->back()->with('error', 'NIK sudah terdaftar!');
        }
        if ($request->baptis == 'Ya' && Baptis::where('no_surat_baptis', $request->no_surat_baptis)->where('nik', '!=', $nik)->exists()) {
            return redirect()->back()->with('error', 'Nomor surat baptis sudah terdaftar!');
        }
        if ($request->sidi == 'Ya' && Sidi::where('no_surat_sidi', $request->no_surat_sidi)->where('nik', '!=', $nik)->exists()) {
            return redirect()->back()->with('error', 'Nomor surat sidi sudah terdaftar!');
        }
    
        // Update Jemaat data
        $jemaat->update($newJemaatData);
    
        // Update Baptis data
        if ($request->baptis == 'Ya') {
            if ($baptis) {
                $baptis->update($newBaptisData);
            } else {
                Baptis::create(array_merge(['nik' => $nik], $newBaptisData));
            }
        } else {
            Baptis::where('nik', $nik)->delete();
        }
    
        // Update Sidi data
        if ($request->sidi == 'Ya') {
            if ($sidi) {
                $sidi->update($newSidiData);
            } else {
                Sidi::create(array_merge(['nik' => $nik], $newSidiData));
            }
        } else {
            Sidi::where('nik', $nik)->delete();
        }
    
        return back()->with('success', 'Data Jemaat Berhasil Diubah');
    }
    
    function handleFileUpload(Request $request, $inputName, $folder, $allowedExtensions, $defaultValue) {
        if ($request->hasFile($inputName)) {
            $files = $request->file($inputName);
            $arrName = [];
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                if (in_array($extension, $allowedExtensions)) {
                    $str = rand();
                    $result = md5($str);
                    $name = time() . "-" . $result . '.' . $extension;
                    $file->move(public_path() . "/lampiran/{$folder}/", $name);
                    array_push($arrName, "/lampiran/{$folder}/" . $name);
                }
            }
            return join("#", $arrName);
        }
        return $defaultValue;
    }
    function updateJemaat2(Request $request, $idKeluarga, $nik) {
        // Retrieve existing data
        $jemaat = Jemaat::where("nik", $nik)->first();
        $baptis = Baptis::where("nik", $nik)->first();
        $sidi = Sidi::where("nik", $nik)->first();
    
        if (!$jemaat) {
            return redirect()->back()->with('error', 'Jemaat tidak ditemukan!');
        }
    
        // Initialize arrays for file names
        $allowedfileExtension = ['jpg', 'png', 'jpeg'];
        $fileName = $this->handleFileUpload($request, 'lampiran', 'jemaat', $allowedfileExtension, $jemaat->lampiran);
        $fileNameBaptis = $request->baptis == 'Ya' ? $this->handleFileUpload($request, 'file_surat_baptis', 'baptis', $allowedfileExtension, $baptis->file_surat_baptis ?? null) : null;
        $fileNameSidi = $request->sidi == 'Ya' ? $this->handleFileUpload($request, 'file_surat_sidi', 'sidi', $allowedfileExtension, $sidi->file_surat_sidi ?? null) : null;
    
        // New data arrays
        $newJemaatData = [
            'nik' => $request->nik,
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'status_gereja' => $request->status,
            'status_pernikahan' => $request->status_pernikahan,
            'tempat_lahir' => $request->tempat_lahir,
            'baptis' => $request->baptis,
            'sidi' => $request->sidi,
            'no_telepon' => $request->no_telepon,
            'lampiran' => $fileName,
        ];
    
        $newBaptisData = $request->baptis == 'Ya' ? [
            'tgl_baptis' => $request->tgl_baptis,
            'nama_pendeta_baptis' => $request->nama_pendeta_baptis,
            'no_surat_baptis' => $request->no_surat_baptis,
            'file_surat_baptis' => $fileNameBaptis,
        ] : null;
    
        $newSidiData = $request->sidi == 'Ya' ? [
            'tgl_sidi' => $request->tgl_sidi,
            'nama_pendeta_sidi' => $request->nama_pendeta_sidi,
            'no_surat_sidi' => $request->no_surat_sidi,
            'file_surat_sidi' => $fileNameSidi,
        ] : null;
    
        // Check if there are changes in Jemaat data
        if ($newJemaatData == $jemaat->toArray() && ($newBaptisData == $baptis->toArray() ?? []) && ($newSidiData == $sidi->toArray() ?? [])) {
            return redirect()->back()->with('warning', 'Tidak ada perubahan pada data Jemaat, Baptis, atau Sidi!');
        }
    
        // Ensure NIK uniqueness
        if (Jemaat::where('nik', $request->nik)->where('nik', '!=', $nik)->exists()) {
            return redirect()->back()->with('error', 'NIK sudah terdaftar!');
        }
        if ($request->baptis == 'Ya' && Baptis::where('no_surat_baptis', $request->no_surat_baptis)->where('nik', '!=', $nik)->exists()) {
            return redirect()->back()->with('error', 'Nomor surat baptis sudah terdaftar!');
        }
        if ($request->sidi == 'Ya' && Sidi::where('no_surat_sidi', $request->no_surat_sidi)->where('nik', '!=', $nik)->exists()) {
            return redirect()->back()->with('error', 'Nomor surat sidi sudah terdaftar!');
        }
    
        // Update Jemaat data
        $jemaat->update($newJemaatData);
    
        // Update Baptis data
        if ($request->baptis == 'Ya') {
            if ($baptis) {
                $baptis->update($newBaptisData);
            } else {
                Baptis::create(array_merge(['nik' => $nik], $newBaptisData));
            }
        } else {
            Baptis::where('nik', $nik)->delete();
        }
    
        // Update Sidi data
        if ($request->sidi == 'Ya') {
            if ($sidi) {
                $sidi->update($newSidiData);
            } else {
                Sidi::create(array_merge(['nik' => $nik], $newSidiData));
            }
        } else {
            Sidi::where('nik', $nik)->delete();
        }
    
        return back()->with('success', 'Data Jemaat Berhasil Diubah');
    }
    
    // function updateJemaat2(Request $request, $idKeluarga,$nik) {
    //     $jemaat = Jemaat::where("nik", $nik)->first();
    //     $baptis = Baptis::where("nik", $nik)->first();
    //     $sidi = Sidi::where("nik", $nik)->first();
    
    //     $arrName = [];
    //     $arrNameBaptis = [];
    //     $arrNameSidi = [];
    
    //     // Definisikan ekstensi file yang diizinkan
    //     $allowedfileExtension = ['jpg', 'png', 'jpeg'];
    
    //     // Penanganan lampiran jemaat
    //     if ($request->hasFile("lampiran")) {
    //         $files = $request->file('lampiran');
    //         foreach ($files as $file) {
    //             $extension = $file->getClientOriginalExtension();
    //             if (in_array($extension, $allowedfileExtension)) {
    //                 $str = rand();
    //                 $result = md5($str);
    //                 $name = time() . "-" . $result . '.' . $extension;
    //                 $file->move(public_path() . '/lampiran/jemaat/', $name);
    //                 array_push($arrName, '/lampiran/jemaat/' . $name);
    //             }
    //         }
    //         $fileName = join("#", $arrName);
    //     } else {
    //         $fileName = $jemaat['lampiran'];
    //     }
    
    //     // Data dari request
    //     $newJemaatData = [
    //         'nik' => $request->nik,
    //         'name' => $request->name,
    //         'jenis_kelamin' => $request->jenis_kelamin,
    //         'alamat' => $request->alamat,
    //         'status_gereja' => $request->status,
    //         'status_pernikahan' => $request->status_pernikahan,
    //         'tempat_lahir' => $request->tempat_lahir,
    //         'baptis' => $request->baptis,
    //         'sidi' => $request->sidi,
    //         'no_telepon' => $request->no_telepon,
    //         'lampiran' => $fileName,
    //     ];
    
    //     $currentJemaatData = [
    //         'nik' => $jemaat->nik,
    //         'name' => $jemaat->name,
    //         'jenis_kelamin' => $jemaat->jenis_kelamin,
    //         'alamat' => $jemaat->alamat,
    //         'status_gereja' => $jemaat->status_gereja,
    //         'status_pernikahan' => $jemaat->status_pernikahan,
    //         'tempat_lahir' => $jemaat->tempat_lahir,
    //         'baptis' => $jemaat->baptis,
    //         'sidi' => $jemaat->sidi,
    //         'no_telepon' => $jemaat->no_telepon,
    //         'lampiran' => $jemaat->lampiran,
    //     ];
    
    //     // Update file surat baptis jika ada
    //     if ($request->baptis == 'Ya') {
    //         if ($request->hasFile("file_surat_baptis")) {
    //             $files = $request->file('file_surat_baptis');
    //             foreach ($files as $file) {
    //                 $extension = $file->getClientOriginalExtension();
    //                 if (in_array($extension, $allowedfileExtension)) {
    //                     $str = rand();
    //                     $result = md5($str);
    //                     $name = time() . "-" . $result . '.' . $extension;
    //                     $file->move(public_path() . '/lampiran/baptis/', $name);
    //                     array_push($arrNameBaptis, '/lampiran/baptis/' . $name);
    //                 }
    //             }
    //             $fileNameBaptis = join("#", $arrNameBaptis);
    //         } else {
    //             $fileNameBaptis = $baptis['file_surat_baptis'] ?? null;
    //         }
    
    //         $newBaptisData = [
    //             'tgl_baptis' => $request->tgl_baptis,
    //             'nama_pendeta_baptis' => $request->nama_pendeta_baptis,
    //             'no_surat_baptis' => $request->no_surat_baptis,
    //             'file_surat_baptis' => $fileNameBaptis
    //         ];
    
    //         $currentBaptisData = [
    //             'tgl_baptis' => $baptis->tgl_baptis ?? null,
    //             'nama_pendeta_baptis' => $baptis->nama_pendeta_baptis ?? null,
    //             'no_surat_baptis' => $baptis->no_surat_baptis ?? null,
    //             'file_surat_baptis' => $baptis->file_surat_baptis ?? null
    //         ];
    //     } else {
    //         $newBaptisData = [];
    //         $currentBaptisData = [];
    //     }
    
    //     // Update file surat sidi jika ada
    //     if ($request->sidi == 'Ya') {
    //         if ($request->hasFile("file_surat_sidi")) {
    //             $files = $request->file('file_surat_sidi');
    //             foreach ($files as $file) {
    //                 $extension = $file->getClientOriginalExtension();
    //                 if (in_array($extension, $allowedfileExtension)) {
    //                     $str = rand();
    //                     $result = md5($str);
    //                     $name = time() . "-" . $result . '.' . $extension;
    //                     $file->move(public_path() . '/lampiran/sidi/', $name);
    //                     array_push($arrNameSidi, '/lampiran/sidi/' . $name);
    //                 }
    //             }
    //             $fileNameSidi = join("#", $arrNameSidi);
    //         } else {
    //             $fileNameSidi = $sidi['file_surat_sidi'] ?? null;
    //         }
    
    //         $newSidiData = [
    //             'tgl_sidi' => $request->tgl_sidi,
    //             'nama_pendeta_sidi' => $request->nama_pendeta_sidi,
    //             'no_surat_sidi' => $request->no_surat_sidi,
    //             'file_surat_sidi' => $fileNameSidi
    //         ];
    
    //         $currentSidiData = [
    //             'tgl_sidi' => $sidi->tgl_sidi ?? null,
    //             'nama_pendeta_sidi' => $sidi->nama_pendeta_sidi ?? null,
    //             'no_surat_sidi' => $sidi->no_surat_sidi ?? null,
    //             'file_surat_sidi' => $sidi->file_surat_sidi ?? null
    //         ];
    //     } else {
    //         $newSidiData = [];
    //         $currentSidiData = [];
    //     }
    
    //     // Bandingkan semua data
    //     if ($newJemaatData == $currentJemaatData && $newBaptisData == $currentBaptisData && $newSidiData == $currentSidiData) {
    //         return redirect()->back()->with('warning', 'Tidak ada perubahan pada data Jemaat, Baptis, atau Sidi!');
    //     }
    
    //     // Pengecekan keberadaan data yang sudah ada
    //     if (Jemaat::where('nik', $request->nik)->where('nik', '!=', $nik)->exists()) {
    //         return redirect()->back()->with('error', 'NIK sudah terdaftar!');
    //     }
    //     if ($request->baptis == 'Ya' && Baptis::where('no_surat_baptis', $request->no_surat_baptis)->where('nik', '!=', $nik)->exists()) {
    //         return redirect()->back()->with('error', 'Nomor surat baptis sudah terdaftar!');
    //     }
    //     if ($request->sidi == 'Ya' && Sidi::where('no_surat_sidi', $request->no_surat_sidi)->where('nik', '!=', $nik)->exists()) {
    //         return redirect()->back()->with('error', 'Nomor surat sidi sudah terdaftar!');
    //     }
    
    //     // Update tabel jemaat
    //     DB::table('jemaat')->where('nik', $nik)->update($newJemaatData);
    
    //     // Update data baptis jika diperlukan
    //     if ($request->baptis == 'Ya') {
    //         DB::table('baptis')->updateOrInsert(
    //             ['nik' => $nik],
    //             $newBaptisData
    //         );
    //     } else {
    //         DB::table('baptis')->where('nik', $nik)->delete();
    //     }
    
    //     // Update data sidi jika diperlukan
    //     if ($request->sidi == 'Ya') {
    //         DB::table('sidi')->updateOrInsert(
    //             ['nik' => $nik],
    //             $newSidiData
    //         );
    //     } else {
    //         DB::table('sidi')->where('nik', $nik)->delete();
    //     }
    
    //     return back()->with('success', 'Data Jemaat Berhasil Diubah');
    // }
    
    
  
    public function showsektoranggota()
    {
        $sektors = Sektor::get();
        // Inisialisasi $jemaat dengan nilai kosong
        $jemaat = [];

        // Cek apakah sektor_id diset dalam permintaan
        if (request()->has('sektor_id')) {

            // Jika sektor_id diset, gunakan nilainya untuk mengambil data jemaat
            $sektor_id = request()->sektor_id;
            // Save sektor_id to session
            session(['sektor_id' => $sektor_id]);
            // Mengambil data keluarga berdasarkan id_sektor
            $keluargas = Keluarga::where('id_sektor', $sektor_id)->where('status', 'Aktif')->pluck('no_kk');

            // Mengambil nik dari jemaat yang berhubungan dengan keluarga dan peran sebagai Penatua
            $niks = Jemaat::whereHas('keluargaJemaat', function ($query) use ($keluargas) {
                $query->whereIn('no_kk', $keluargas);
            })->whereHas('pelayanGereja', function ($query) {
                $query->where('peran', 'Penatua Aktif');
            })->pluck('nik');

            // Mengambil data jemaat berdasarkan nik yang didapatkan
            $jemaats = Jemaat::whereIn('nik', $niks)->get();
            // $jemaat1 = Jemaat::where('sektor_id',$sektor_id )
            //                 ->where('sektor_role', 'Penanggung Jawab')
            //                 ->get();
            $keluarga = Keluarga::where('id_sektor', $sektor_id)
                ->where('status', 'Aktif')
                ->get();
        } else {
            $sektor_id = Sektor::min('id');
            // Save sektor_id to session
            session(['sektor_id' => $sektor_id]);
            // Mengambil data keluarga berdasarkan id_sektor
            $keluargas = Keluarga::where('id_sektor', $sektor_id)->where('status', 'Aktif')->pluck('no_kk');

            // Mengambil nik dari jemaat yang berhubungan dengan keluarga dan peran sebagai Penatua
            $niks = Jemaat::whereHas('keluargaJemaat', function ($query) use ($keluargas) {
                $query->whereIn('no_kk', $keluargas);
            })->whereHas('pelayanGereja', function ($query) {
                $query->where('peran', 'Penatua Aktif');
            })->pluck('nik');

            // Mengambil data jemaat berdasarkan nik yang didapatkan
            $jemaats = Jemaat::whereIn('nik', $niks)->get();
            // $jemaat1 = Jemaat::where('sektor_id',$sektor_id )
            // ->where('sektor_role', 'Penanggung Jawab')
            // ->get();
            $keluarga = Keluarga::where('id_sektor', $sektor_id)
                ->where('status', 'Aktif')
                ->get();
        }

        return view('Jemaat.sektorshowanggota', compact('sektors', 'jemaats', 'keluarga'));
    }

    public function createsektor()
    {
        return view('Jemaat.createsektor');
    }
    public function storesektor(Request $request)
    {
        // Validasi manual untuk mengecek apakah nama sektor sudah ada di database
        if (Sektor::where('nama', $request->nama)->exists()) {
            return redirect()->back()->with('error', 'Nama sektor sudah terdaftar!');
        }
        $data = $request->validate([
            'nama'     => ['required'],
            'keterangan'    => ['nullable']
        ]);

        Sektor::create($data);

        return redirect()->route('jemaat.sektor')->with('success', 'Sektor berhasil ditambahkan!');
    }

    public function showsektor()
    {
        $sektors = Sektor::get();
        return view('Jemaat.sektorshow', compact('sektors'));
    }


    public function editsektor($id)
    { 
        $sektor = DB::table('sektor')
            ->where('id', $id)
            ->get();
        return view('Jemaat.editsektor', ['sektor' => $sektor]);
    }

    function updatesektor(Request $request)
    {
        $id = $request->id;
        $sektor = DB::table('sektor')->where('id', $id)->first();
    
        // Validasi unik untuk nama sektor dengan pengecualian entri yang sedang diubah
        if (DB::table('sektor')->where('nama', $request->nama)->where('id', '!=', $id)->exists()) {
            return redirect()->back()->with('error', 'Nama Sektor sudah terdaftar!');
        }
    
        // Data baru dari request
        $newData = [
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ];
    
        // Data saat ini dari database
        $currentData = [
            'nama' => $sektor->nama,
            'keterangan' => $sektor->keterangan
        ];
    
        // Bandingkan data baru dengan data yang ada
        if ($newData == $currentData) {
            return redirect()->route('jemaat.Sektor')->with('warning', 'Tidak ada perubahan pada data Sektor!');
        }
    
        // Update data sektor di database
        DB::table('sektor')->where('id', $id)->update($newData);
    
        return redirect()->route('jemaat.Sektor')->with('success', 'Data Sektor Sudah Berhasil Diubah');
    }
    


    // PELAYAN

    function pelayan()
    {
        $pelayan = PelayanGereja::with(['jemaat', 'jemaat.sektor'])->get();
        return view('Jemaat.datapelayan', [
            "pelayanas" => $pelayan
        ]);
    }
    function formpelayan(Request $request)
    {
        $jemaat = Jemaat::all()->where('status_gereja', 'Aktif');
        return view('Jemaat.formdatapelayan', compact('jemaat'));
    }
    function formpelayanprocess(Request $request)
{
    // Validasi manual untuk mengecek apakah kombinasi nik dan peran sudah ada di database
    if (PelayanGereja::where('nik', $request->nik)->where('peran', $request->peran)->exists()) {
        return redirect()->back()->with('error', 'NIK dan peran tersebut sudah terdaftar!');
    }

    $arrName = [];

    $pelayanas = new PelayanGereja();
    $pelayanas->nik = $request->nik;
    $pelayanas->peran = $request->peran;
    $pelayanas->tanggal_terima_jabatan = $request->tanggal_terima_jabatan;
    $pelayanas->tanggal_akhir_jabatan = $request->tanggal_akhir_jabatan;

    if (!$pelayanas->save()) {
        if (count($arrName) > 1) {
            foreach ($arrName as $path) {
                if (file_exists(public_path($path))) {
                    unlink(public_path($path));
                }
            }
        }
        return redirect()->back()->with('error', 'Data Pelayan Gagal Disimpan!');
    }

    return redirect('/pendeta/pelayangereja')->with('success', 'Data Pelayan Berhasil Disimpan!');
}


    public function editdatapelayan($id)
    {
        $jemaat = Jemaat::all()->where('status_gereja', 'Aktif');
        $pelayan = PelayanGereja::with(['jemaat', 'jemaat.sektor'])->where('id', $id)->first();
        // echo ($keluarga);

        return view('Jemaat.editpelayan', [
            "pelayanas" => $pelayan
        ], compact('jemaat'));
    }
    function updatedatapelayan(Request $request, $id)
{
    // Ambil data pelayan saat ini dari database
    $pelayan = DB::table('pelayan_gereja')->where('id', $id)->first();

    // Data baru dari request
    $newData = [
        'nik' => $request->nik,
        'peran' => $request->peran,
        'tanggal_terima_jabatan' => $request->tanggal_terima_jabatan,
        'tanggal_akhir_jabatan' => $request->tanggal_akhir_jabatan,
    ];

    // Data saat ini dari database
    $currentData = [
        'nik' => $pelayan->nik,
        'peran' => $pelayan->peran,
        'tanggal_terima_jabatan' => $pelayan->tanggal_terima_jabatan,
        'tanggal_akhir_jabatan' => $pelayan->tanggal_akhir_jabatan,
    ];

    // Bandingkan data baru dengan data yang ada
    if ($newData == $currentData) {
        return redirect('pendeta/pelayangereja')->with('warning', 'Tidak ada perubahan pada data Pelayan Gereja!');
    }

    // Validasi unik untuk NIK dan peran dengan pengecualian entri yang sedang diubah
    if (DB::table('pelayan_gereja')->where('nik', $request->nik)->where('peran', $request->peran)->where('id', '!=', $id)->exists()) {
        return redirect()->back()->with('error', 'NIK dan Peran sudah terdaftar!');
    }

    // Update data pelayan di database
    DB::table('pelayan_gereja')->where('id', $id)->update($newData);

    return redirect('pendeta/pelayangereja')->with('success', 'Data Pelayan Sudah Berhasil Diubah');
}






    // RENUNGAN 
    public function showrenungan()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(100)->get();
        $renungan = Renungan::latest()->take(10)->get();


        return view('Jemaat.renunganshow', compact('jadwal_ibadah', 'renungan'));
    }
    public function detailrenungan($id)
    {
        $renungan = Renungan::where("id", $id)->first();
        return view('Jemaat.detailrenungan', compact( 'renungan'));
    }
    public function createrenungan()
    {
        return view('Jemaat.createrenungan');
    }
    public function storerenungan(Request $request)
{
    // Validasi input
    $data = $request->validate([
        'tanggal' => ['required', 'date'],
        'title' => ['required', 'string', 'max:255'],
        'isi' => ['required'],
        'ayat' => ['required', 'string', 'max:255'],
    ]);

    // Periksa apakah tanggal sudah ada di database
    if (Renungan::where('tanggal', $request->tanggal)->exists()) {
        return redirect()->back()->with('error', 'Renungan dengan tanggal ini sudah ada!');
    }

    // Simpan data baru ke database
    Renungan::create($data);

    return redirect()->route('jemaat.renunganshow')->with('success', 'Renungan berhasil ditambahkan!');
}

    public function editrenungan($id)
    {
        $renungan = DB::table('renungan')
            ->where('id', $id)
            ->get();
        return view('Jemaat.editrenungan', ['renungan' => $renungan]);
    }
    public function updaterenungan(Request $request)
{
    $id = $request->id;

    // Ambil data renungan saat ini dari database
    $renungan = DB::table('renungan')->where('id', $id)->first();

    // Data baru dari request
    $newData = [
        'tanggal' => $request->tanggal,
        'title' => $request->title,
        'isi' => $request->isi,
        'ayat' => $request->ayat,
    ];

    // Data saat ini dari database
    $currentData = [
        'tanggal' => $renungan->tanggal,
        'title' => $renungan->title,
        'isi' => $renungan->isi,
        'ayat' => $renungan->ayat,
    ];

    // Bandingkan data baru dengan data yang ada
    if ($newData == $currentData) {
        return redirect()->route('jemaat.renunganshow')->with('warning', 'Tidak ada perubahan pada data Renungan!');
    }

    // Validasi unik untuk tanggal dengan pengecualian entri yang sedang diubah
    if (DB::table('renungan')->where('tanggal', $request->tanggal)->where('id', '!=', $id)->exists()) {
        return redirect()->back()->with('error', 'Renungan dengan tanggal ini sudah ada!');
    }

    // Update data renungan di database
    DB::table('renungan')->where('id', $id)->update($newData);

    return redirect()->route('jemaat.renunganshow')->with('success', 'Renungan Sudah Berhasil Diubah');
}


    // JADWAL IBADAH
    public function showjadwal()
    {
        $jadwal_ibadah = Jadwal_Ibadah::latest()->take(100)->get();
        $jadwal_pelayanan = Jadwal_Pelayanan::latest()->get();
        return view('Jemaat.jadwal', compact('jadwal_ibadah', 'jadwal_pelayanan'));
    }

    public function createjadwal()
    {
        return view('Jemaat.createjadwal');
    }
    public function storejadwal(Request $request)
{
    // Validasi manual untuk mengecek apakah kombinasi tanggal dan waktu sudah ada di database
    if (jadwal_ibadah::where('tanggal', $request->tanggal)->where('waktu', $request->waktu)->exists()) {
        return redirect()->back()->with('error', 'Tanggal dan waktu tersebut sudah terdaftar!');
    }

    $arrName = [];
    $invalidExtensions = [];

    if ($request->hasFile('lampiran')) {
        foreach ($request->file('lampiran') as $file) {
            $extension = $file->getClientOriginalExtension();

            if ($extension === 'pdf') {
                $str = rand();
                $result = md5($str);
                $name = time() . "-" . $result . '.' . $extension;
                $file->move(public_path() . '/lampiran/tataibadah/', $name);
                array_push($arrName, '/lampiran/tataibadah/' . $name);
            } else {
                $invalidExtensions[] = $extension;
            }
        }

        if (!empty($invalidExtensions)) {
            $invalidExtensionsString = implode(', ', $invalidExtensions);
            return redirect()->back()->with('error', 'Ekstensi file '. $invalidExtensionsString .' tidak diperbolehkan');
        }
    }

    $fileName = empty($arrName) ? NULL : join("#", $arrName);

    $jadwal_ibadah = $request->validate([
        'name' => ['required'],
        'tanggal' => ['required'],
        'waktu' => ['required'],
        'jenis' => ['required'],
        'jumlah_hadir' => ['nullable'],
    ]);

    $jadwal_ibadah = new jadwal_ibadah();
    $jadwal_ibadah->name = $request->name;
    $jadwal_ibadah->tanggal = $request->tanggal;
    $jadwal_ibadah->waktu = $request->waktu;
    $jadwal_ibadah->jenis = $request->jenis;
    $jadwal_ibadah->jumlah_hadir = $request->jumlah_hadir;
    $jadwal_ibadah->tata_ibadah = $fileName;

    if (!$jadwal_ibadah->save()) {
        foreach ($arrName as $path) {
            if (file_exists(public_path($path))) {
                unlink(public_path($path));
            }
        }
        return redirect()->back()->with('error', 'Data Jadwal Ibadah Gagal Disimpan!');
    }

    return redirect()->route('jemaat.jadwal')->with('success', 'Jadwal ibadah berhasil ditambahkan!');
}



    public function editjadwal($id)
    {

        $jadwal_ibadah = jadwal_ibadah::where('id', $id)->first();

        $lampiran = explode("#", $jadwal_ibadah['tata_ibadah']);
        return view('Jemaat.editjadwal', ['jadwal_ibadah' => $jadwal_ibadah, 'lampiran' => $lampiran]);
    }
    public function updatejadwal(Request $request)
{
    $id = $request->id;
    $jadwal_ibadah = DB::table('jadwal_ibadah')->where('id', $id)->first();
    $arrName = [];
    $invalidExtensions = [];

    if ($request->hasFile('lampiran')) {
        foreach ($request->file('lampiran') as $file) {
            $extension = $file->getClientOriginalExtension();

            if ($extension === 'pdf') {
                $str = rand();
                $result = md5($str);
                $name = time() . "-" . $result . '.' . $extension;
                $file->move(public_path() . '/lampiran/tataibadah/', $name);
                array_push($arrName, '/lampiran/tataibadah/' . $name);
            } else {
                $invalidExtensions[] = $extension;
            }
        }

        if (!empty($invalidExtensions)) {
            $invalidExtensionsString = implode(', ', $invalidExtensions);
            return redirect()->back()->with('error', 'Ekstensi file '. $invalidExtensionsString .' tidak diperbolehkan');
        }

        $fileName = join("#", $arrName);
    } else {
        $fileName = $jadwal_ibadah->tata_ibadah;
    }

    // Data baru dari request
    $newData = [
        'name' => $request->name,
        'tanggal' => $request->tanggal,
        'waktu' => $request->waktu,
        'jenis' => $request->jenis,
        'jumlah_hadir' => $request->jumlah_hadir,
        'tata_ibadah' => $fileName
    ];

    // Data saat ini dari database
    $currentData = [
        'name' => $jadwal_ibadah->name,
        'tanggal' => $jadwal_ibadah->tanggal,
        'waktu' => $jadwal_ibadah->waktu,
        'jenis' => $jadwal_ibadah->jenis,
        'jumlah_hadir' => $jadwal_ibadah->jumlah_hadir,
        'tata_ibadah' => $jadwal_ibadah->tata_ibadah
    ];

    // Bandingkan data baru dengan data yang ada
    if ($newData == $currentData) {
        return redirect()->route('jemaat.jadwal')->with('warning', 'Tidak ada perubahan pada data Jadwal Ibadah!');
    }

    // Validasi unik untuk kombinasi tanggal dan waktu dengan pengecualian entri yang sedang diubah
    if (DB::table('jadwal_ibadah')->where('tanggal', $request->tanggal)->where('waktu', $request->waktu)->where('id', '!=', $id)->exists()) {
        return redirect()->back()->with('error', 'Jadwal Ibadah dengan tanggal dan waktu ini sudah ada!');
    }

    // Update data jadwal ibadah di database
    DB::table('jadwal_ibadah')->where('id', $id)->update($newData);

    return redirect()->route('jemaat.jadwal')->with('success', 'Jadwal Ibadah Sudah Berhasil Diubah');
}


    // JADWAL PELAYANAN
    // public function showpelayanan(Request $request)
    // {
    //     $pelayans = PelayanGereja::with('jemaat')
    //         ->whereNull('tanggal_akhir_jabatan')
    //         ->get();
    //     $jadwalIbadah = [];
    //     $jadwalPelayanan = collect();

    //     // Cek apakah id_pelayan sudah disimpan dalam session
    //     if ($request->has('id_pelayan')) {
    //         $id_pelayan = $request->id_pelayan;
    //         session(['id_pelayan' => $id_pelayan]);
    //     } else {
    //         // Ambil id paling rendah dari PelayanGereja jika id_pelayan tidak ada
    //         $id_pelayan = PelayanGereja::min('id');
    //         session(['id_pelayan' => $id_pelayan]);
    //     }

    //     // Ambil data pelayan yang dipilih beserta data jemaat terkait
    //     $pelayan = PelayanGereja::with('jemaat')->findOrFail($id_pelayan);

    //     // Cek apakah tahun dipilih
    //     if ($request->has('tahun')) {
    //         $tahun = $request->tahun;
    //         session(['tahun' => $tahun]);
    //     } else {
    //         // Gunakan tahun saat ini jika tahun tidak dipilih
    //         $tahun = now()->year;
    //         session(['tahun' => $tahun]);
    //     }

    //     // Ambil jadwal pelayanan yang terkait dengan pelayan yang dipilih dan filter berdasarkan tahun
    //     $jadwalPelayanan = Jadwal_Pelayanan::where('id_pelayan', $id_pelayan)
    //         ->whereHas('jadwalIbadah', function($query) use ($tahun) {
    //             $query->whereYear('tanggal', $tahun);
    //         })
    //         ->get();

    //     // Inisialisasi array untuk menyimpan data jadwal ibadah
    //     foreach ($jadwalPelayanan as $jadwal) {
    //         $jadwalIbadah[] = $jadwal->jadwalIbadah;
    //     }

    //     // Return view dengan data yang diperlukan
    //     return view('Jemaat.pelayanan', compact('pelayan', 'pelayans', 'jadwalPelayanan', 'jadwalIbadah'));
    // }
    public function showpelayanan(Request $request)
    {
        $pelayans = PelayanGereja::with('jemaat')
            ->whereNull('tanggal_akhir_jabatan')
            ->get();
        $jadwalIbadah = [];
        $jadwalPelayanan = collect();

        if ($request->has('id_pelayan')) {
            $id_pelayan = $request->id_pelayan;
            session(['id_pelayan' => $id_pelayan]);
        } else {
            $id_pelayan = PelayanGereja::min('id');
            session(['id_pelayan' => $id_pelayan]);
        }

        $pelayan = PelayanGereja::with('jemaat')->findOrFail($id_pelayan);

        if ($request->has('tahun')) {
            $tahun = $request->tahun;
            session(['tahun' => $tahun]);
        } else {
            $tahun = now()->year;
            session(['tahun' => $tahun]);
        }

        $jadwalPelayanan = Jadwal_Pelayanan::where('id_pelayan', $id_pelayan)
            ->whereHas('jadwalIbadah', function ($query) use ($tahun) {
                $query->whereYear('tanggal', $tahun);
            })
            ->get();

        foreach ($jadwalPelayanan as $jadwal) {
            $jadwalIbadah[] = $jadwal->jadwalIbadah;
        }

        $jumlahPelayanan = $jadwalPelayanan->count();

        return view('Jemaat.pelayanan', compact('pelayan', 'pelayans', 'jadwalPelayanan', 'jadwalIbadah', 'jumlahPelayanan'));
    }



    public function createpelayanan()
    {
        $pelayan_gereja = PelayanGereja::with('jemaat')->get();
        return view('Jemaat.createpelayanan', compact('pelayan_gereja'));
    }

    // public function storepelayanan(Request $request, $id_jadwal_ibadah)
    // {
    //     $status_pelayanan = $request->status_pelayanan; // Mendapatkan array dari status pelayanan
    //     $id_pelayan = $request->id_pelayan; // Mendapatkan array dari id pelayan

    //     // Memastikan jumlah status pelayanan dan id pelayan sama
    //     if (count($status_pelayanan) == count($id_pelayan)) {
    //         // Lakukan loop untuk menyimpan data dari kedua select box
    //         for ($i = 0; $i < count($status_pelayanan); $i++) {
    //             $data['status_pelayanan'] = $status_pelayanan[$i];
    //             $data['id_pelayan'] = $id_pelayan[$i];
    //             $data['id_jadwal_ibadah'] = $id_jadwal_ibadah; // Set the id_jadwal_ibadah from the parameter

    //             Jadwal_Pelayanan::create($data);
    //         }

    //         return redirect()->route('jemaat.jadwal')->with('success','Jadwal pelayanan berhasil ditambahkan!');
    //     } else {
    //         // Jika jumlah status pelayanan dan id pelayan tidak sama, kembalikan dengan pesan kesalahan
    //         return redirect()->back()->with('error','Jumlah status pelayanan dan id pelayan tidak cocok!');
    //     }
    // }

    public function storepelayanan(Request $request, $id_jadwal_ibadah)
    {
        $status_pelayanan = $request->status_pelayanan; // Mendapatkan array dari status pelayanan
        $id_pelayan = $request->id_pelayan; // Mendapatkan array dari id pelayan

        // Array untuk menyimpan data yang akan disimpan ke database
        $dataToInsert = [];

        // Lakukan loop untuk menyimpan data dari kedua select box
        for ($i = 0; $i < count($status_pelayanan); $i++) {
            // Hanya jika ada id_pelayan yang dipilih
            if ($id_pelayan[$i]) {
                $data['status_pelayanan'] = $status_pelayanan[$i];
                $data['id_pelayan'] = $id_pelayan[$i];
                $data['id_jadwal_ibadah'] = $id_jadwal_ibadah; // Set the id_jadwal_ibadah from the parameter

                $dataToInsert[] = $data;
            }
        }

        // Insert data ke database hanya jika ada data yang akan disimpan
        if (!empty($dataToInsert)) {
            Jadwal_Pelayanan::insert($dataToInsert);
            return redirect()->route('jemaat.jadwal')->with('success', 'Jadwal pelayanan berhasil ditambahkan!');
        } else {
            // Jika tidak ada data yang akan disimpan, kembalikan dengan pesan kesalahan
            return redirect()->back()->with('error', 'Tidak ada data yang dipilih untuk disimpan!');
        }
    }

    function detailpelayanan(Request $request, $id_jadwal_ibadah)
    {
        // Array status_pelayanan yang ingin dicari
        $status_pelayanan = ['Pengkotbah', 'Liturgis', 'Warta Jemaat', 'Doa Syafaat', 'Song Leader', 'Pemusik', 'Liturgis Sekolah Minggu'];
        $persembahan = ['Pengumpul Persembahan 1', 'Pengumpul Persembahan 2', 'Pengumpul Persembahan 3', 'Pengumpul Persembahan 4'];
        $penerima_tamu = ['Penerima Tamu 1', 'Penerima Tamu 2', 'Penerima Tamu 3'];

        // Inisialisasi array untuk menyimpan hasil pencarian
        $results = [];
        $results_persembahan = [];
        $results_penerima_tamu = [];

        // Lakukan pencarian untuk setiap status_pelayanan
        foreach ($status_pelayanan as $status) {
            $result = PelayanGereja::whereExists(function ($query) use ($id_jadwal_ibadah, $status) {
                $query->select(DB::raw(1))
                    ->from('jadwal_pelayanan')
                    ->whereColumn('pelayan_gereja.id', 'jadwal_pelayanan.id_pelayan')
                    ->where('id_jadwal_ibadah', $id_jadwal_ibadah)
                    ->where('status_pelayanan', $status);
            })
                ->with('jemaat')
                ->get();

            // Simpan hasil pencarian ke dalam array
            $results[$status] = $result;
        }

        foreach ($persembahan as $status) {
            $result_persembahan = PelayanGereja::whereExists(function ($query) use ($id_jadwal_ibadah, $status) {
                $query->select(DB::raw(1))
                    ->from('jadwal_pelayanan')
                    ->whereColumn('pelayan_gereja.id', 'jadwal_pelayanan.id_pelayan')
                    ->where('id_jadwal_ibadah', $id_jadwal_ibadah)
                    ->where('status_pelayanan', $status);
            })
                ->with('jemaat')
                ->get();

            // Simpan hasil pencarian ke dalam array
            $results_persembahan[$status] = $result_persembahan;
        }

        foreach ($penerima_tamu as $status) {
            $result_penerima_tamu = PelayanGereja::whereExists(function ($query) use ($id_jadwal_ibadah, $status) {
                $query->select(DB::raw(1))
                    ->from('jadwal_pelayanan')
                    ->whereColumn('pelayan_gereja.id', 'jadwal_pelayanan.id_pelayan')
                    ->where('id_jadwal_ibadah', $id_jadwal_ibadah)
                    ->where('status_pelayanan', $status);
            })
                ->with('jemaat')
                ->get();

            // Simpan hasil pencarian ke dalam array
            $results_penerima_tamu[$status] = $result_penerima_tamu;
        }

        // Pass both arrays to the view
        return view('Jemaat.detailpelayanan', ['status_pelayanan' => $status_pelayanan, 'persembahan' => $persembahan, 'penerima_tamu' => $penerima_tamu, 'results' => $results, 'results_persembahan' => $results_persembahan, 'results_penerima_tamu' => $results_penerima_tamu]);
    }





    public function editpelayanan($id_jadwal_ibadah)
    {
        $pelayan_gereja = PelayanGereja::with('jemaat')->get();
        $status_pelayanan = ['Pengkotbah', 'Liturgis', 'Doa Syafaat', 'Warta Jemaat', 'Pengumpul Persembahan 1', 'Penerima Tamu 1', 'Pengumpul Persembahan 2', 'Penerima Tamu 2', 'Pengumpul Persembahan 3', 'Penerima Tamu 3', 'Pengumpul Persembahan 4', 'Pemusik', 'Song Leader',  'Liturgis Sekolah Minggu'];

        $results = [];
        foreach ($status_pelayanan as $status) {
            $result = PelayanGereja::whereExists(function ($query) use ($id_jadwal_ibadah, $status) {
                $query->select(DB::raw(1))
                    ->from('jadwal_pelayanan')
                    ->whereColumn('pelayan_gereja.id', 'jadwal_pelayanan.id_pelayan')
                    ->where('id_jadwal_ibadah', $id_jadwal_ibadah)
                    ->where('status_pelayanan', $status);
            })
                ->with('jemaat')
                ->get();

            $results[$status] = $result;
        }

        return view('Jemaat.editpelayanan', [
            'pelayan_gereja' => $pelayan_gereja,
            'status_pelayanan' => $status_pelayanan,
            'results' => $results,
            'id_jadwal_ibadah' => $id_jadwal_ibadah // Pastikan ini dikirim ke view
        ]);
    }

    // public function editpelayanan($id_jadwal_ibadah){
    //     $pelayan_gereja = PelayanGereja::with('jemaat')->get();
    //      // Array status_pelayanan yang ingin dicari
    //      $status_pelayanan = ['Pengkotbah', 'Liturgis', 'Doa Syafaat', 'Warta Jemaat','Pengumpul Persembahan 1','Penerima Tamu 1', 'Pengumpul Persembahan 2','Penerima Tamu 2','Pengumpul Persembahan 3','Penerima Tamu 3','Pengumpul Persembahan 4', 'Pemusik','Song Leader',  'Liturgis Sekolah Minggu'];

    //      // Inisialisasi array untuk menyimpan hasil pencarian
    //      $results = [];

    //      // Lakukan pencarian untuk setiap status_pelayanan
    //      foreach ($status_pelayanan as $status) {
    //          $result = PelayanGereja::whereExists(function ($query) use ($id_jadwal_ibadah, $status) {
    //                  $query->select(DB::raw(1))
    //                        ->from('jadwal_pelayanan')
    //                        ->whereColumn('pelayan_gereja.id', 'jadwal_pelayanan.id_pelayan')
    //                        ->where('id_jadwal_ibadah', $id_jadwal_ibadah)
    //                        ->where('status_pelayanan', $status);
    //              })
    //              ->with('jemaat')
    //              ->get();

    //          // Simpan hasil pencarian ke dalam array
    //          $results[$status] = $result;
    //      }

    //      // Pass both arrays to the view
    //      return view('Jemaat.editpelayanan', ['pelayan_gereja' => $pelayan_gereja, 'status_pelayanan' => $status_pelayanan,'results' => $results]);
    //             // return view('Jemaat.editpelayanan', compact('pelayan_gereja'));
    // }

    public function updatepelayanan(Request $request, $id_jadwal_ibadah)
{
    // Log data request yang masuk
    Log::info('Data Request:', $request->all());

    // Ambil data input dari form
    $id_pelayan = $request->input('id_pelayan');
    $status_pelayanan = $request->input('status_pelayanan');

    // Log data input yang diproses
    Log::info('Data Diproses:', ['id_pelayan' => $id_pelayan, 'status_pelayanan' => $status_pelayanan]);

    // Pastikan terdapat id_pelayan yang dipilih sebelum memproses
    if (!empty($id_pelayan)) {
        // Loop melalui setiap status_pelayanan yang dikirimkan
        foreach ($status_pelayanan as $key => $status) {
            // Periksa apakah id_pelayan dan status_pelayanan sesuai
            if (isset($id_pelayan[$key]) && isset($status_pelayanan[$key])) {
                // Temukan atau buat entri jadwal_pelayanan yang sesuai dengan id_jadwal_ibadah dan status_pelayanan
                $jadwalPelayanan = Jadwal_Pelayanan::updateOrCreate(
                    ['id_jadwal_ibadah' => $id_jadwal_ibadah, 'status_pelayanan' => $status],
                    ['id_pelayan' => $id_pelayan[$key]]
                );

                // Log proses perubahan atau penambahan data
                if ($jadwalPelayanan->wasRecentlyCreated) {
                    Log::info('Membuat Jadwal Pelayanan Baru:', ['id' => $id_pelayan[$key], 'status' => $status]);
                } else {
                    Log::info('Memperbarui Id Pelayan:', ['id' => $id_pelayan[$key], 'status' => $status]);
                }
            } else {
                Log::warning('Data id_pelayan atau status_pelayanan tidak lengkap. Melewati data ini.');
            }
        }
    } else {
        Log::info('Tidak ada data id_pelayan yang valid. Melewati proses pembaruan.');
    }

    // Log sebelum melakukan redirect
    Log::info('Pembaruan Selesai. Mengarahkan ke halaman detail.');

    // Redirect ke halaman sebelumnya atau halaman sukses
    return redirect("pendeta/jadwal/pelayanan/. $id_jadwal_ibadah")->with('success', 'Data pelayanan berhasil diperbarui.');
}



    




    // public function updatepelayanan(Request $request, $id){
    //     // Memperbarui jadwal pelayanan berdasarkan ID jadwal ibadah
    //     foreach ($request->status_pelayanan as $key => $status) {
    //         // Perbarui record yang sesuai berdasarkan status pelayanan
    //         DB::table('jadwal_pelayanan')
    //             ->where('id_jadwal_ibadah', $id)
    //             ->where('status_pelayanan', $status)
    //             ->update([
    //                 'id_pelayan' => $request->id_pelayan[$key]
    //             ]);
    //     }

    //     // Redirect kembali dengan pesan sukses
    //     return redirect()->route('jemaat.detailpelayanan', ['id' => $id])->with('success', 'Jadwal Pelayanan Sudah Berhasil Diubah');
    // }

    // TATA IBADAH
    function detailtataibadah()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(100)->get();
        $tata_ibadah = tata_ibadah::latest()->take(10)->get();
        $renungan = Renungan::latest()->take(10)->get();
        return view('Jemaat.detailibadah', compact('jadwal_ibadah', 'tata_ibadah', 'renungan'));
    }
    public function createtata()
    {

        $jadwal_ibadahs = jadwal_ibadah::whereNull('tata_ibadah')->latest()->get();
        return view('Jemaat.createtata', compact('jadwal_ibadahs'));
    }
    function formibadah(Request $request)
    {

        return view("Jemaat.tambahibadah");
    }

    function tatastore(Request $request)
    {

        $arrName = [];

        if ($request->hasFile('lampiran')) {
            foreach ($request->file('lampiran') as $file) {
                $str = rand();
                $result = md5($str);
                $extension = $file->getClientOriginalExtension();
                $name = time() . "-" . $result . '.' . $extension;
                $file->move(public_path() . '/lampiran/tataibadah/', $name);
                array_push($arrName, '/lampiran/tataibadah/' . $name);
            }
        }
        $fileName = join("#", $arrName);

        $ibadah = new tata_ibadah();
        $ibadah->nama = $request->nama;
        // $ibadah->tanggal = $request->tanggal;
        $ibadah->lampiran = $fileName;

        if (!$ibadah->save()) {
            foreach ($arrName as $l) {
                unlink(public_path() . $l);
            }
        }
        return redirect()->route('jemaat.detailibadah')->with('success', 'Tata Ibadah Sudah Berhasil Ditambahkan');
    }
    public function edittataibadah($id)
    {
        $tata_ibadah = DB::table('tata_ibadah')
            ->where('id', $id)
            ->get();
        return view('Jemaat.edittataibadah', ['tata_ibadah' => $tata_ibadah]);
    }
    function updatetataibadah(Request $request)
    {
        $id = $request->id;
        DB::table('tata_ibadah')->where('id', $id)->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal
        ]);
        return redirect()->route('jemaat.detailibadah')->with('success', 'Tata Ibadah Sudah Berhasil Diubah');
    }
    //PROGRAM

    public function showprogramkerja()
    {
        $program = Program::where('jenis_program', 'Rancangan Program Kerja')->latest()->get();
        return view('Jemaat.programkerja', compact('program'));
    }
    public function showRAPB()
    {
        $program = Program::where('jenis_program', 'Rancangan Anggaran Penerimaan dan Belanja')->latest()->get();
        return view('Jemaat.RAPB', compact('program'));
    }
    public function createprogram()
    {
        return view('Jemaat.createprogram');
    }
    public function storeprogram(Request $request)
{
    // Validasi manual untuk mengecek apakah tahun sudah ada di database
    if (Program::where('tahun', $request->tahun)->where('jenis_program', $request->jenis_program)->exists()) {
        return redirect()->back()->with('error', 'Kombinasi tahun dan jenis program tersebut sudah terdaftar!');
    }

    $arrName = [];

    if ($request->hasFile('lampiran')) {
        $allowedExtensions = ['pdf']; // Ekstensi file yang diperbolehkan
        $invalidExtensions = [];
        foreach ($request->file('lampiran') as $file) {
            $extension = $file->getClientOriginalExtension();
            if (!in_array($extension, $allowedExtensions)) {
                $invalidExtensions[] = $extension;
                continue; // Lewati file yang memiliki ekstensi yang tidak diperbolehkan
            }
            $str = rand();
            $result = md5($str);
            $name = time() . "-" . $result . '.' . $extension;
            $file->move(public_path() . '/lampiran/program/', $name);
            array_push($arrName, '/lampiran/program/' . $name);
        }
        if (!empty($invalidExtensions)) {
            $invalidExtensionsString = implode(', ', $invalidExtensions);
            return redirect()->back()->with('error', 'Ekstensi file ' . $invalidExtensionsString . ' tidak diperbolehkan');
        }
    } else {
        return redirect()->back()->with('error', 'Lampiran tidak boleh kosong');
    }

    $fileName = join("#", $arrName);
    $programData = $request->validate([
        'jenis_program' => ['required'],
        'tahun' => ['required'],
    ]);

    $program = new Program();
    $program->jenis_program = $programData['jenis_program'];
    $program->tahun = $programData['tahun'];
    $program->lampiran = $fileName;

    if (!$program->save()) {
        foreach ($arrName as $l) {
            if (file_exists(public_path($l))) {
                unlink(public_path($l));
            }
        }
        return redirect()->back()->with('error', 'Data Program Gagal Disimpan!');
    }

    // Penentuan arah redirect berdasarkan jenis_program yang baru saja dimasukkan
    if ($request->jenis_program == 'Rancangan Program Kerja') {
        return redirect()->route('jemaat.showprogramKerja')->with('success', 'Program Kerja berhasil ditambahkan!');
    } elseif ($request->jenis_program == 'Rancangan Anggaran Penerimaan dan Belanja') {
        return redirect()->route('jemaat.showRAPB')->with('success', 'Rancangan Anggaran Penerimaan dan Belanja berhasil ditambahkan!');
    }
}



    public function editprogram($id)
    {
        $program = Program::where('id', $id)->first();

        $lampiran = explode("#", $program['lampiran']);
        return view('Jemaat.editprogram', ['program' => $program, 'lampiran' => $lampiran]);
    }
    public function updateprogram(Request $request, $id)
{
    $program = Program::where('id', $id)->first();
    $arrName = [];

    if ($request->hasFile('lampiran')) {
        foreach ($request->file('lampiran') as $file) {
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'pdf') {
                return redirect()->back()->with('error', 'Hanya file PDF yang diperbolehkan untuk lampiran');
            }

            $str = rand();
            $result = md5($str);
            $name = time() . "-" . $result . '.' . $extension;
            $file->move(public_path() . '/lampiran/program/', $name);
            array_push($arrName, '/lampiran/program/' . $name);
        }
        $fileName = join("#", $arrName);
    } else {
        $fileName = $program->lampiran;
    }
    // Data baru dari request
    $newData = [
        'tahun' => $request->tahun,
        'jenis_program' => $request->jenis_program,
        'lampiran' => $fileName
    ];

    // Data saat ini dari database
    $currentData = [
        'tahun' => $program->tahun,
        'jenis_program' => $program->jenis_program,
        'lampiran' => $program->lampiran
    ];

    // Bandingkan data baru dengan data yang ada
    if ($newData == $currentData) {
        if ($program->jenis_program == 'Rancangan Program Kerja') {
            return redirect()->route('jemaat.showprogramKerja')->with('warning', 'Tidak ada perubahan pada data Program!');
        } elseif ($program->jenis_program == 'Rancangan Anggaran Penerimaan dan Belanja') {
            return redirect()->route('jemaat.showRAPB')->with('warning', 'Tidak ada perubahan pada data Program!');
        }
    }

    // Validasi unik untuk kombinasi tahun dan jenis_program dengan pengecualian entri yang sedang diubah
    if (Program::where('tahun', $request->tahun)->where('jenis_program', $request->jenis_program)->where('id', '!=', $id)->exists()) {
        return redirect()->back()->with('error', 'Program dengan tahun dan jenis program ini sudah ada!');
    }

    // Update data program di database
    DB::table('program')->where('id', $id)->update($newData);

    // Penentuan arah redirect berdasarkan jenis_program yang baru saja dimasukkan
    if ($request->jenis_program == 'Rancangan Program Kerja') {
        return redirect()->route('jemaat.showprogramKerja')->with('success', 'Program Kerja berhasil diubah!');
    } elseif ($request->jenis_program == 'Rancangan Anggaran Penerimaan dan Belanja') {
        return redirect()->route('jemaat.showRAPB')->with('success', 'Rancangan Anggaran Penerimaan dan Belanja berhasil diubah!');
    }
}


    // BERITA GEREJA
    public function showberita()
    {
        $berita_gereja = BeritaGereja::latest()->take(10)->get();

        return view('Jemaat.databerita', compact('berita_gereja'));
    }

    public function detailberita($id)
    {
        $berita_gereja = BeritaGereja::where("id", $id)->first();

        return view('Jemaat.detailberita', compact('berita_gereja'));
    }
    public function createberita()
    {
        return view('Jemaat.createberita');
    }

    public function storeberita(Request $request)
{
    // Validasi manual untuk mengecek apakah judul sudah ada di database
    if (BeritaGereja::where('judul', $request->judul)->exists()) {
        return redirect()->back()->with('error', 'Judul tersebut sudah terdaftar!');
    }

    // Validasi data yang diterima dari form
    $data = $request->validate([
        'judul' => ['required'],
        'isi' => ['required'],
        'lampiran' => ['required'], // Pastikan lampiran adalah gambar
    ]);

    // Daftar ekstensi yang diizinkan
    $allowedExtensions = ['png', 'jpg', 'jpeg'];

    // Memeriksa apakah ada file yang diunggah
    if ($request->hasFile('lampiran')) {
        // Mengambil file yang diunggah
        $file = $request->file('lampiran');

        // Mendapatkan ekstensi file
        $extension = $file->getClientOriginalExtension();

        // Memeriksa apakah ekstensi file sesuai dengan yang diizinkan
        if (!in_array($extension, $allowedExtensions)) {
            $invalidExtensionsString = implode(', ', $allowedExtensions);
            return redirect()->back()->with('error', 'Ekstensi file ' . $extension . ' tidak diperbolehkan.');
        }

        // Mendefinisikan path tujuan penyimpanan
        $destinationPath = public_path('lampiran/berita');

        // Menghasilkan nama file yang unik
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Memindahkan file ke folder yang ditentukan dengan nama yang unik
        $file->move($destinationPath, $fileName);

        // Menyimpan path ke file di database
        $data['lampiran'] = '/lampiran/berita/' . $fileName;
    }

    // Membuat entri baru di database menggunakan model BeritaGereja
    BeritaGereja::create($data);

    // Redirect kembali dengan pesan sukses
    return redirect()->route('jemaat.berita')->with('success', 'Berita berhasil ditambahkan');
}


    public function editberita($id)
    {
        $berita_gereja = DB::table('berita_gereja')
            ->where('id', $id)
            ->get();
        return view('Jemaat.editberita', ['berita_gereja' => $berita_gereja]);
    }

    public function updateberita(Request $request)
{
    // Temukan berita yang akan diperbarui
    $berita = BeritaGereja::find($request->id);

    // Data baru dari request
    $newData = [
        'judul' => $request->judul,
        'isi' => $request->isi,
    ];

    // Data saat ini dari database
    $currentData = [
        'judul' => $berita->judul,
        'isi' => $berita->isi,
    ];

    // Bandingkan data baru dengan data yang ada
    if ($newData == $currentData && !$request->hasFile('lampiran')) {
        return redirect()->route('jemaat.berita')->with('warning', 'Tidak ada perubahan pada data Berita!');
    }

    // Validasi unik untuk judul dengan pengecualian entri yang sedang diubah
    if (BeritaGereja::where('judul', $request->judul)->where('id', '!=', $request->id)->exists()) {
        return redirect()->back()->with('error', 'Judul berita sudah ada!');
    }

    // Daftar ekstensi yang diizinkan
    $allowedExtensions = ['png', 'jpg', 'jpeg'];

    // Jika ada file lampiran yang diunggah
    if ($request->hasFile('lampiran')) {
        // Mengambil file yang diunggah
        $file = $request->file('lampiran');

        // Mendapatkan ekstensi file
        $extension = $file->getClientOriginalExtension();

        // Memeriksa apakah ekstensi file sesuai dengan yang diizinkan
        if (!in_array($extension, $allowedExtensions)) {
            $invalidExtensionsString = implode(', ', $allowedExtensions);
            return redirect()->back()->with('error', 'Ekstensi file ' . $extension . ' tidak diperbolehkan.');
        }

        // Mendefinisikan path tujuan penyimpanan
        $destinationPath = public_path('lampiran/berita');

        // Menghasilkan nama file yang unik
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Memindahkan file ke folder yang ditentukan dengan nama yang unik
        $file->move($destinationPath, $fileName);

        // Hapus file lampiran yang lama jika ada
        if ($berita->lampiran) {
            unlink(public_path($berita->lampiran));
        }

        // Perbarui atribut 'lampiran' di database dengan path file yang baru
        $berita->lampiran = '/lampiran/berita/' . $fileName;
    }

    // Update atribut lainnya jika diperlukan
    $berita->judul = $request->judul;
    $berita->isi = $request->isi;
    $berita->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('jemaat.berita')->with('success', 'Berita berhasil diubah');
}



   // KEUANGAN
   public function pemasukanpersembahanibadah()
   {
       $pemasukan = Keuangan::all()->where('kategori', 'Persembahan')->whereIn('jenis_keuangan', ['Pemasukan', 'Pembagian']);
       return view('Jemaat.dataPemasukanPersembahanIbadah', compact('pemasukan'));
   }

   public function pengeluaranpersembahanibadah()
   {
       $pengeluaran = Keuangan::all()->where('kategori', 'Persembahan')->where('jenis_keuangan', 'Pengeluaran');
       return view('Jemaat.dataPengeluaranPersembahanIbadah', compact('pengeluaran'));
   }
   public function pembagianpersembahanibadah()
   {
       $kas = Kas::all();
       return view('Jemaat.dataPembagianPersembahanIbadah', compact('kas'));
   }
   public function detailpembagianpersembahanibadah($id)
   {
       $persembahan = Keuangan::with('kasKeuangan')->findOrFail($id);
       $kasList = Kas::all(); // Ambil semua data kas
       return view('Jemaat.detailpembagianpersembahanibadah', compact('persembahan', 'kasList'));
   }

   public function pemasukanpersembahandiakonia()
   {
       $pemasukan = Keuangan::all()->where('kategori', 'Diakoni Sosial')->where('jenis_keuangan', 'Pemasukan');
       return view('Jemaat.dataPemasukanPersembahanDiakonia', compact('pemasukan'));
   }
   public function pengeluaranpersembahandiakonia()
   {
       $pengeluaran = Keuangan::all()->where('kategori', 'Diakoni Sosial')->where('jenis_keuangan', 'Pengeluaran');
       return view('Jemaat.dataPengeluaranPersembahanDiakonia', compact('pengeluaran'));
   }

   public function pemasukanpersembahankhusus()
   {
       $datakeuangan = PersembahanKhusus::all()->where('jenis_keuangan', 'Pemasukan');
       return view('Jemaat.dataPemasukanpersembahankhusus', compact('datakeuangan'));
   }
   public function pengeluaranpersembahankhusus()
   {
       $datakeuangan = PersembahanKhusus::all()->where('jenis_keuangan', 'Pengeluaran');
       return view('Jemaat.dataPengeluaranpersembahankhusus', compact('datakeuangan'));
   }

   //KAS
   public function pengeluarankas()
{
   $pengeluaran = Keuangan::where('kategori', 'Kas')
   ->where('jenis_keuangan', 'Pengeluaran')
   ->with('kasKeuangan.kas') // Eager load kasKeuangan dan kemudian kas
   ->get();
   return view('Jemaat.dataPengeluaranKas', compact('pengeluaran'));
}

// tambah keuangan

   function formkeuangan(Request $request)
   {
       $kas  = Kas::all();
       $keluarga = Keluarga::all()->where('status', 'Aktif');
       return view('Jemaat.formtambahkeuangan', compact('keluarga', 'kas'));
   }

   function formkeuanganprocess(Request $request, $id_user)
   {
       if ($request->kategori == 'Persembahan' && $request->jenis_keuangan == 'Pemasukan') {

       $keuangan = new Keuangan();
       $keuangan->kategori = $request->kategori;
       $keuangan->keterangan = $request->keterangan;
       $keuangan->jenis_keuangan = $request->jenis_keuangan;
       $keuangan->tanggal = $request->tanggal;
       $keuangan->nominal = $request->nominal;
       $keuangan->save();

       // Ambil id dari data keuangan yang baru saja disimpan
       $id_keuangan = $keuangan->id;
       
       // Ambil id_pelayan dari jemaat
       $jemaat = Jemaat::where('nik', $id_user)->first();
       $id_pelayan = $jemaat->pelayanGereja->id;

       // Simpan data ke tabel program_pelayan
       Pelayan_PersembahanIbadah::create([
           'id_persembahan' => $keuangan->id,
           'id_pelayan' => $id_pelayan,
       ]);

       // Ambil daftar kas dengan persentase pembagian dari database
       $kases = Kas::where('pembagian','!=',0)->orWhereNull('pembagian')->get();


       // Bagi nominal berdasarkan persentase pembagian
       foreach ($kases as $kas) {
           $id_kas = $kas->id;
           $persentase = $kas->pembagian; // persentase pembagian

           // Hitung nominal berdasarkan persentase
           $nominal_bagian = $request->nominal * ($persentase / 100);

           // Simpan ke KasKeuangan
           $kas_keuangan = new KasKeuangan();
           $kas_keuangan->id_kas = $id_kas;
           $kas_keuangan->id_keuangan = $id_keuangan;
           $kas_keuangan->nominal = $nominal_bagian;
           $kas_keuangan->pembagian = $persentase;
           $kas_keuangan->save();
       }

       return redirect()->route('jemaat.dataPemasukanPersembahanIbadah');
   } else if ( ($request->kategori != 'Ucapan Syukur' || $request->kategori != 'Persembahan Bulanan' || $request->kategori != 'Diakoni Sosial') && $request->jenis_keuangan == 'Pengeluaran') {
       $keuangan = new Keuangan();
       $keuangan->kategori = "Kas";
       $keuangan->keterangan = $request->keterangan;
       $keuangan->jenis_keuangan = $request->jenis_keuangan;
       $keuangan->tanggal = $request->tanggal;
       $keuangan->nominal = $request->nominal;
       $keuangan->save();

       // Ambil id dari data keuangan yang baru saja disimpan
       $id_keuangan = $keuangan->id;
       
       // Ambil id_pelayan dari jemaat
       $jemaat = Jemaat::where('nik', $id_user)->first();
       $id_pelayan = $jemaat->pelayanGereja->id;

       // Simpan data ke tabel program_pelayan
       Pelayan_PersembahanIbadah::create([
           'id_persembahan' => $keuangan->id,
           'id_pelayan' => $id_pelayan,
       ]);

       // Simpan ke KasKeuangan
       $kas_keuangan = new KasKeuangan();
       $kas_keuangan->id_kas = $request->kategori;
       $kas_keuangan->id_keuangan = $id_keuangan;
       $kas_keuangan->nominal =  $request->nominal;
       $kas_keuangan->pembagian = 0;
       $kas_keuangan->save();

       return redirect()->route('jemaat.pengeluarankas');

   }else if ($request->kategori == 'Persembahan' && $request->jenis_keuangan != 'Pemasukan') {
           $keuangan = new Keuangan();
           $keuangan->kategori = $request->kategori;
           $keuangan->keterangan = $request->keterangan;
           $keuangan->jenis_keuangan = $request->jenis_keuangan;
           $keuangan->tanggal = $request->tanggal;
           $keuangan->nominal = $request->nominal;
           $keuangan->save();

           // Ambil id_pelayan dari jemaat
           $jemaat = Jemaat::where('nik', $id_user)->first();
           $id_pelayan = $jemaat->pelayanGereja->id;

           // Simpan data ke tabel program_pelayan
           Pelayan_PersembahanIbadah::create([
               'id_persembahan' => $keuangan->id,
               'id_pelayan' => $id_pelayan,
           ]);


           if ($request->jenis_keuangan == 'Pemasukan') {
               return redirect()->route('jemaat.dataPemasukanPersembahanIbadah');
           } else {
               return redirect()->route('jemaat.dataPengeluaranPersembahanIbadah');
           }
       } else if ($request->kategori == 'Persembahan Bulanan' || $request->kategori == 'Ucapan Syukur') {
           $keuangan = new PersembahanKhusus();
           $keuangan->kategori = $request->kategori;
           $keuangan->jenis_keuangan = $request->jenis_keuangan;
           $keuangan->tanggal = $request->tanggal;
           $keuangan->nominal = $request->nominal;
           $keuangan->keterangan = $request->keterangan;
           $keuangan->no_kk = $request->no_kk;
           $keuangan->save();

           // Ambil id_pelayan dari jemaat
           $jemaat = Jemaat::where('nik', $id_user)->first();
           $id_pelayan = $jemaat->pelayanGereja->id;

           // Simpan data ke tabel program_pelayan
           Pelayan_PersembahanKhusus::create([
               'id_persembahankhusus' => $keuangan->id,
               'id_pelayan' => $id_pelayan,
           ]);


           if ($request->jenis_keuangan == 'Pemasukan') {
               return redirect()->route('jemaat.datapemasukanpersembahanKhusus');
           } else {
               return redirect()->route('jemaat.datapengeluaranpersembahanKhusus');
           }
       } else if ($request->kategori == 'Diakoni Sosial') {
           $keuangan = new Keuangan();
           $keuangan->kategori = $request->kategori;
           $keuangan->keterangan = $request->keterangan;
           $keuangan->jenis_keuangan = $request->jenis_keuangan;
           $keuangan->tanggal = $request->tanggal;
           $keuangan->nominal = $request->nominal;
           $keuangan->save();

           // Ambil id_pelayan dari jemaat
           $jemaat = Jemaat::where('nik', $id_user)->first();
           $id_pelayan = $jemaat->pelayanGereja->id;

           // Simpan data ke tabel program_pelayan
           Pelayan_PersembahanIbadah::create([
               'id_persembahan' => $keuangan->id,
               'id_pelayan' => $id_pelayan,
           ]);


           if ($request->jenis_keuangan == 'Pemasukan') {
               return redirect()->route('jemaat.dataPemasukanPersembahanDiakonia');
           } else {
               return redirect()->route('jemaat.dataPengeluaranPersembahanDiakonia');
           }
           return redirect()->route('jemaat.datapersembahanUmum');
       }
   }

   //EDIT KEUANGAN
   public function ubahpengeluarankas($id_user,$id)
   {
       $pengeluaran = Keuangan::where('kategori', 'Kas')
       ->where('jenis_keuangan', 'Pengeluaran')
       ->where('id', $id)
       ->with('kasKeuangan.kas') // Eager load kasKeuangan dan kemudian kas
       ->get();

       $kas  = Kas::all();
   return view('Jemaat.editdataPengeluaranKas', compact('pengeluaran', 'kas'));
   }

   public function updatepengeluarankas(Request $request, $id_user, $id)
{
   // Validasi input
   $request->validate([
       'kategori' => 'required|exists:kas,id',
       'keterangan' => 'required|string|max:255',
       'tanggal' => 'required|date',
       'nominal' => 'required|numeric|min:1',
   ]);

   // Cari data keuangan berdasarkan ID
   $keuangan = Keuangan::find($id);
   if (!$keuangan) {
       return redirect()->route('jemaat.pengeluarankas')->with('error', 'Data tidak ditemukan');
   }

   // Data baru dari request
   $newData = [
       'keterangan' => $request->keterangan,
       'tanggal' => $request->tanggal,
       'nominal' => $request->nominal,
   ];

   // Update data keuangan
   $keuangan->update($newData);

   // Ambil entry lama dari kas_keuangan berdasarkan id_keuangan
   $kasKeuangan = KasKeuangan::where('id_keuangan', $id)->first();

   if ($kasKeuangan) {
       // Simpan id_kas dari entry lama
       $currentIdKas = $kasKeuangan->id_kas;

       // Hapus entry lama di kas_keuangan
       KasKeuangan::where('id_keuangan', $id)
           ->where('id_kas', $currentIdKas)
           ->delete();
   }

   // Buat entry baru di kas_keuangan
   KasKeuangan::create([
       'id_kas' => $request->kategori,
       'id_keuangan' => $id,
       'nominal' => $request->nominal,
       'pembagian' => 0,
   ]);

   // Ambil id_pelayan dari jemaat
   $jemaat = Jemaat::where('nik', $id_user)->first();
   $id_pelayan = $jemaat->pelayanGereja->id ?? null;

   if ($id_pelayan) {
       $currentTimestamp = now();

       // Cek apakah entry sudah ada di Pelayan_PersembahanIbadah
       $pelayanPersembahanIbadah = Pelayan_PersembahanIbadah::where('id_persembahan', $id)
           ->where('id_pelayan', $id_pelayan)
           ->first();

       if ($pelayanPersembahanIbadah) {
           $pelayanPersembahanIbadah->update([
               'updated_at' => $currentTimestamp,
           ]);
       } else {
           Pelayan_PersembahanIbadah::create([
               'id_persembahan' => $id,
               'id_pelayan' => $id_pelayan,
           ]);
       }
   }

   return redirect()->route('jemaat.pengeluarankas')->with('success', 'Data berhasil diperbarui');
}



   

public function ubahpemasukanpersembahanibadah($id_user, $id)
{
   // Ambil data keuangan berdasarkan ID dengan relasi ke kasKeuangan
   $keuangan = Keuangan::with('kasKeuangan')->findOrFail($id);
   // Ambil semua data kas
   $kasList = Kas::all();

   // Membuat kunci kombinasi dari id_keuangan dan id_kas
   // Membuat kunci kombinasi dari id_keuangan dan id_kas
   $kases = $keuangan->kasKeuangan->mapWithKeys(function($item) use ($keuangan) {
       return [$keuangan->id . '_' . $item->id_kas => $item];
   });


   // Debugging untuk memastikan data yang diambil benar
   // dd($keuangan, $kasList, $kases); 

   return view('Jemaat.formubahpersembahanibadah', [
       'keuangan' => $keuangan,
       'kasList' => $kasList,
       'kases' => $kases
   ]);
}


public function updatepemasukanpersembahanibadah(Request $request, $id_user, $id)
{
   // Validasi input
   $request->validate([
       'keterangan' => 'required|string|max:255',
       'tanggal' => 'required|date',
       'nominal' => 'required|numeric|min:0',
   ]);

   // Cari data keuangan berdasarkan ID
   $keuangan = Keuangan::with('kasKeuangan')->findOrFail($id);

   // Data baru dari request
   $newData = [
       'keterangan' => $request->keterangan,
       'tanggal' => $request->tanggal,
       'nominal' => $request->nominal,
   ];

   $hasChanges = false; // Flag untuk melacak perubahan

   // Bandingkan data baru dengan data yang ada
   foreach ($newData as $key => $value) {
       if ($keuangan->$key != $value) {
           $hasChanges = true;
           $keuangan->$key = $value;
       }
   }

   // Simpan perubahan ke data keuangan
   if ($hasChanges) {
       $keuangan->save();
   }

   // Ambil id_pelayan dari jemaat
   $jemaat = Jemaat::where('nik', $id_user)->first();
   $id_pelayan = $jemaat->pelayanGereja->id;

   $currentTimestamp = Carbon::now();
   // Cek apakah entry sudah ada di Pelayan_PersembahanIbadah
   $pelayanPersembahanIbadah = Pelayan_PersembahanIbadah::where('id_persembahan', $id)->where('id_pelayan', $id_pelayan)->first();

   if ($pelayanPersembahanIbadah) {
       // Jika sudah ada, update waktu updated_at secara langsung
       Pelayan_PersembahanIbadah::where('id_persembahan', $id)
           ->where('id_pelayan', $id_pelayan)
           ->update([
               'updated_at' => $currentTimestamp
               // tambahkan kolom-kolom lain yang ingin diupdate beserta nilainya di sini
           ]);
   } else {
       // Jika belum ada, buat entri baru
       Pelayan_PersembahanIbadah::create([
           'id_persembahan' => $id,
           'id_pelayan' => $id_pelayan,
       ]);
   }

   // Proses Kas data
   $kasInput = $request->input('kas', []);
   
   // Debug untuk melihat data yang diterima dari form
   // dd($kasInput); // Ini akan menghentikan eksekusi dan menampilkan data kas yang diterima

   foreach ($kasInput as $id_kas => $persentase) {
       // Hitung nominal berdasarkan persentase
       $nominal_bagian = $keuangan->nominal * ($persentase / 100);

       // Cek apakah data dengan id_kas dan id_keuangan sudah ada di tabel KasKeuangan
       $kasKeuangan = KasKeuangan::where('id_kas', $id_kas)
                                 ->where('id_keuangan', $id)
                                 ->first();

       // Debug untuk melihat data yang ditemukan di database
       // dd($kasKeuangan); // Ini akan menghentikan eksekusi dan menampilkan data yang ditemukan di database

       if ($kasKeuangan) {
           // Jika data sudah ada, perbarui
           if ($kasKeuangan->nominal != $nominal_bagian || $kasKeuangan->pembagian != $persentase) {
               KasKeuangan::where('id_kas', $id_kas)
                   ->where('id_keuangan', $id)
                   ->update([
                       'nominal' => $nominal_bagian,
                       'pembagian' => $persentase,
                       'updated_at' => Carbon::now()
                   ]);
               $hasChanges = true;
           }
       } else {
           // Jika data tidak ada, buat data baru
           KasKeuangan::create([
               'id_kas' => $id_kas,
               'id_keuangan' => $id,
               'nominal' => $nominal_bagian,
               'pembagian' => $persentase
           ]);
           $hasChanges = true;
       }
   }

   if (!$hasChanges) {
       return redirect()->route('jemaat.dataPemasukanPersembahanIbadah')->with('warning', 'Tidak ada perubahan pada data Pemasukan Persembahan Ibadah!');
   }

   return redirect()->route('jemaat.dataPemasukanPersembahanIbadah')->with('success', 'Data berhasil diperbarui');
}
   public function formkas($id_user)
   {
   return view('Jemaat.formtambahkas');
   }

   public function formkasprocess(Request $request, $id_user)
   {
       // // Validasi input
       // $request->validate([
       //     'nama_kas' => 'required|string|max:255', // Sesuaikan dengan aturan validasi yang diperlukan
       // ]);
   
       try {
           // Buat objek baru Kas
           $kas = new Kas();
           
           // Set nilai nama_kas dari input form
           $kas->nama_kas = $request->nama_kas;
   
           // Simpan ke database
           $kas->save();
   
           // Jika berhasil, kembalikan ke halaman yang sesuai
           return redirect()->route('jemaat.dataPembagianPersembahanIbadah')->with('success', 'Data kas berhasil ditambahkan');
       } catch (\Exception $e) {
           // Jika terjadi kesalahan, tangani di sini
           return redirect()->back()->with('error', 'Gagal menambahkan data kas. ' . $e->getMessage());
       }
   }
   

public function ubahpembagianpersentase($id_user)
   {
   // Ambil semua data kas
   $kasList = Kas::all();

   // Debugging untuk memastikan data yang diambil benar
   // dd($kasList); 

   return view('Jemaat.formubahPersentase', [
       'kasList' => $kasList,
   ]);
   }


   public function updatepembagianpersentase(Request $request, $id_user)
   {
       try {
           // Validasi data yang dikirim dari formulir
           // $request->validate([
           //     'kas' => 'required|array', // Kas harus berupa array
           //     'kas.*' => 'required|numeric|min:0|max:100', // Setiap nilai kas harus numeric antara 0 dan 100
           // ]);
   
           // Loop melalui data kas yang dikirim dari formulir
           foreach ($request->kas as $id_kas => $persentase) {
               // Ambil data kas berdasarkan ID
               $kas = Kas::findOrFail($id_kas);
   
               // Update persentase pembagian untuk kas tertentu
               $kas->pembagian = $persentase;
   
               // Simpan perubahan
               $kas->save();
           }
   
           // Redirect dengan pesan sukses jika berhasil
           return redirect()->route('jemaat.dataPembagianPersembahanIbadah')->with('success', 'Pembagian persentase berhasil diperbarui');
       } catch (\Exception $e) {
           // Redirect dengan pesan error jika terjadi kesalahan
           return redirect()->back()->with('error', 'Gagal memperbarui pembagian persentase. ' . $e->getMessage());
       }
   }
   



   public function ubahpengeluaranpersembahanibadah($id_user,$id)
   {
       $keuangan = DB::table('keuangan')->where('id', $id)->get();
       return view('Jemaat.formubahpersembahanibadah', ['keuangan' => $keuangan]);
   }

   public function updatepengeluaranpersembahanibadah(Request $request, $id_user,$id)
{
   // Validasi input
   $request->validate([
       'keterangan' => 'required|string|max:255',
       'tanggal' => 'required|date',
       'nominal' => 'required|numeric',
   ]);

   // Cari data keuangan berdasarkan ID
   $keuangan = Keuangan::find($id);
   if (!$keuangan) {
       return redirect()->route('jemaat.dataPengeluaranPersembahanIbadah')->with('error', 'Data tidak ditemukan');
   }

   // Data baru dari request
   $newData = [
       'keterangan' => $request->keterangan,
       'tanggal' => $request->tanggal,
       'nominal' => $request->nominal,
   ];

   // Data saat ini dari database
   $currentData = [
       'keterangan' => $keuangan->keterangan,
       'tanggal' => $keuangan->tanggal,
       'nominal' => $keuangan->nominal,
   ];

   // Bandingkan data baru dengan data yang ada
   if ($newData == $currentData) {
       return redirect()->route('jemaat.dataPengeluaranPersembahanIbadah')->with('warning', 'Tidak ada perubahan pada data Pengeluaran Persembahan Ibadah!');
   }

   // Update hanya kolom yang relevan
   $keuangan->keterangan = $request->keterangan;
   $keuangan->tanggal = $request->tanggal;
   $keuangan->nominal = $request->nominal;
   $keuangan->save();
   // Ambil id_pelayan dari jemaat
  $jemaat = Jemaat::where('nik', $id_user)->first();
  $id_pelayan = $jemaat->pelayanGereja->id;

  $currentTimestamp = Carbon::now();
  // Cek apakah entry sudah ada di renungan_pelayan 
  $pelayanPersembahanIbadah = Pelayan_PersembahanIbadah::where('id_persembahan', $id)->where('id_pelayan', $id_pelayan)->first();

  if ($pelayanPersembahanIbadah) {
   // Jika sudah ada, update waktu updated_at secara langsung
   Pelayan_PersembahanIbadah::where('id_persembahan', $id)
               ->where('id_pelayan', $id_pelayan)
               ->update([
                   'updated_at' => $currentTimestamp
                   // tambahkan kolom-kolom lain yang ingin diupdate beserta nilainya di sini
               ]);
} else {
   // Jika belum ada, buat entri baru
   Pelayan_PersembahanIbadah::create([
       'id_persembahan' => $id,
       'id_pelayan' => $id_pelayan,
   ]);
}

   return redirect()->route('jemaat.dataPengeluaranPersembahanIbadah')->with('success', 'Data berhasil diperbarui');
}


   //EDIT PERSEMBAHAN DIAKONIA

   public function ubahpemasukanpersembahandiakonia($id_user,$id)
   {
       $keuangan = DB::table('keuangan')->where('id', $id)->get();
       return view('Jemaat.formubahpersembahandiakoni', ['keuangan' => $keuangan]);
   }

   public function updatepemasukanpersembahandiakonia(Request $request,$id_user, $id)
{
   // Validasi input
   $request->validate([
       'keterangan' => 'required|string|max:255',
       'tanggal' => 'required|date',
       'nominal' => 'required|numeric',
   ]);

   // Cari data keuangan berdasarkan ID
   $keuangan = Keuangan::find($id);
   if (!$keuangan) {
       return redirect()->route('jemaat.dataPemasukanPersembahanDiakonia')->with('error', 'Data tidak ditemukan');
   }

   // Data baru dari request
   $newData = [
       'keterangan' => $request->keterangan,
       'tanggal' => $request->tanggal,
       'nominal' => $request->nominal,
   ];

   // Data saat ini dari database
   $currentData = [
       'keterangan' => $keuangan->keterangan,
       'tanggal' => $keuangan->tanggal,
       'nominal' => $keuangan->nominal,
   ];

   // Bandingkan data baru dengan data yang ada
   if ($newData == $currentData) {
       return redirect()->route('jemaat.dataPemasukanPersembahanDiakonia')->with('warning', 'Tidak ada perubahan pada data Pemasukan Persembahan Diakonia!');
   }

   // Update hanya kolom yang relevan
   $keuangan->keterangan = $request->keterangan;
   $keuangan->tanggal = $request->tanggal;
   $keuangan->nominal = $request->nominal;
   $keuangan->save();

   // Ambil id_pelayan dari jemaat
  $jemaat = Jemaat::where('nik', $id_user)->first();
  $id_pelayan = $jemaat->pelayanGereja->id;

  $currentTimestamp = Carbon::now();
  // Cek apakah entry sudah ada di renungan_pelayan 
  $pelayanPersembahanIbadah = Pelayan_PersembahanIbadah::where('id_persembahan', $id)->where('id_pelayan', $id_pelayan)->first();

  if ($pelayanPersembahanIbadah) {
   // Jika sudah ada, update waktu updated_at secara langsung
   Pelayan_PersembahanIbadah::where('id_persembahan', $id)
               ->where('id_pelayan', $id_pelayan)
               ->update([
                   'updated_at' => $currentTimestamp
                   // tambahkan kolom-kolom lain yang ingin diupdate beserta nilainya di sini
               ]);
} else {
   // Jika belum ada, buat entri baru
   Pelayan_PersembahanIbadah::create([
       'id_persembahan' => $id,
       'id_pelayan' => $id_pelayan,
   ]);
}

   return redirect()->route('jemaat.dataPemasukanPersembahanDiakonia')->with('success', 'Data berhasil diperbarui');
}


   public function ubahpengeluaranpersembahandiakonia($id_user,$id)
   {
       $keuangan = DB::table('keuangan')->where('id', $id)->get();
       return view('Jemaat.formubahpersembahandiakoni', ['keuangan' => $keuangan]);
   }

   public function updatepengeluaranpersembahandiakonia(Request $request, $id_user,$id)
{
   // Cari data keuangan berdasarkan ID
   $keuangan = Keuangan::find($id);
   if (!$keuangan) {
       return redirect()->route('jemaat.dataPengeluaranPersembahanDiakonia')->with('error', 'Data tidak ditemukan');
   }

   // Data baru dari request
   $newData = [
       'keterangan' => $request->keterangan,
       'tanggal' => $request->tanggal,
       'nominal' => $request->nominal,
   ];

   // Data saat ini dari database
   $currentData = [
       'keterangan' => $keuangan->keterangan,
       'tanggal' => $keuangan->tanggal,
       'nominal' => $keuangan->nominal,
   ];

   // Bandingkan data baru dengan data yang ada
   if ($newData == $currentData) {
       return redirect()->route('jemaat.dataPengeluaranPersembahanDiakonia')->with('warning', 'Tidak ada perubahan pada data Pengeluaran Persembahan Diakonia!');
   }

   // Validasi input
   $request->validate([
       'keterangan' => 'required|string|max:255',
       'tanggal' => 'required|date',
       'nominal' => 'required|numeric',
   ]);

   // Update hanya kolom yang relevan
   $keuangan->keterangan = $request->input('keterangan');
   $keuangan->tanggal = $request->input('tanggal');
   $keuangan->nominal = $request->input('nominal');
   $keuangan->save();
   // Ambil id_pelayan dari jemaat
  $jemaat = Jemaat::where('nik', $id_user)->first();
  $id_pelayan = $jemaat->pelayanGereja->id;

  $currentTimestamp = Carbon::now();
  // Cek apakah entry sudah ada di renungan_pelayan 
  $pelayanPersembahanIbadah = Pelayan_PersembahanIbadah::where('id_persembahan', $id)->where('id_pelayan', $id_pelayan)->first();

  if ($pelayanPersembahanIbadah) {
   // Jika sudah ada, update waktu updated_at secara langsung
   Pelayan_PersembahanIbadah::where('id_persembahan', $id)
               ->where('id_pelayan', $id_pelayan)
               ->update([
                   'updated_at' => $currentTimestamp
                   // tambahkan kolom-kolom lain yang ingin diupdate beserta nilainya di sini
               ]);
} else {
   // Jika belum ada, buat entri baru
   Pelayan_PersembahanIbadah::create([
       'id_persembahan' => $id,
       'id_pelayan' => $id_pelayan,
   ]);
}

   return redirect()->route('jemaat.dataPengeluaranPersembahanDiakonia')->with('success', 'Data berhasil diperbarui');
}


   //EDIT PERSEMBAHAN KHUSUS
   public function ubahpemasukanpersembahankhusus($id_user,$id)
   {
       // $keuangan = DB::table('persembahan_khusus')->where('id', $id)->get();
       $keuangan = PersembahanKhusus::with('keluarga')->find($id);
       $keluarga = Keluarga::where('status', 'Aktif')->get();
       return view('Jemaat.formubahpersembahankhusus', compact('keluarga', 'keuangan'));
   }

   public function updatepemasukanpersembahankhusus(Request $request, $id_user,$id)
{
   // Cari data keuangan berdasarkan ID
   $keuangan = PersembahanKhusus::find($id);
   if (!$keuangan) {
       return redirect()->route('jemaat.datapemasukanpersembahanKhusus')->with('error', 'Data tidak ditemukan');
   }

   // Data baru dari request
   $newData = [
       'no_kk' => $request->no_kk,
       'keterangan' => $request->keterangan,
       'tanggal' => $request->tanggal,
       'nominal' => $request->nominal,
   ];

   // Data saat ini dari database
   $currentData = [
       'no_kk' => $keuangan->no_kk,
       'keterangan' => $keuangan->keterangan,
       'tanggal' => $keuangan->tanggal,
       'nominal' => $keuangan->nominal,
   ];

   // Bandingkan data baru dengan data yang ada
   if ($newData == $currentData) {
       return redirect()->route('jemaat.datapemasukanpersembahanKhusus')->with('warning', 'Tidak ada perubahan pada data Pemasukan Persembahan Khusus!');
   }

   // Validasi input
   $request->validate([
       'no_kk' => 'required',
       'keterangan' => 'required|string|max:255',
       'tanggal' => 'required|date',
       'nominal' => 'required|numeric',
   ]);

   // Update hanya kolom yang relevan
   $keuangan->no_kk =  $request->no_kk;
   $keuangan->keterangan = $request->input('keterangan');
   $keuangan->tanggal = $request->input('tanggal');
   $keuangan->nominal = $request->input('nominal');
   $keuangan->save();

   // Ambil id_pelayan dari jemaat
  $jemaat = Jemaat::where('nik', $id_user)->first();
  $id_pelayan = $jemaat->pelayanGereja->id;

  $currentTimestamp = Carbon::now();
  // Cek apakah entry sudah ada di renungan_pelayan 
  $pelayanPersembahanKhusus = Pelayan_PersembahanKhusus::where('id_persembahankhusus', $id)->where('id_pelayan', $id_pelayan)->first();

  if ($pelayanPersembahanKhusus) {
   // Jika sudah ada, update waktu updated_at secara langsung
   Pelayan_PersembahanKhusus::where('id_persembahankhusus', $id)
               ->where('id_pelayan', $id_pelayan)
               ->update([
                   'updated_at' => $currentTimestamp
                   // tambahkan kolom-kolom lain yang ingin diupdate beserta nilainya di sini
               ]);
} else {
   // Jika belum ada, buat entri baru
   Pelayan_PersembahanKhusus::create([
       'id_persembahankhusus' => $id,
       'id_pelayan' => $id_pelayan,
   ]);
}

   return redirect()->route('jemaat.datapemasukanpersembahanKhusus')->with('success', 'Data berhasil diperbarui');
}


   public function ubahpengeluaranpersembahankhusus($id_user,$id)
   {
       // $keuangan = DB::table('persembahan_khusus')->where('id', $id)->get();
       $keuangan = PersembahanKhusus::with('keluarga')->find($id);
       $keluarga = Keluarga::where('status', 'Aktif')->get();
       return view('Jemaat.formubahpersembahankhusus', compact('keluarga', 'keuangan'));
   }

   public function updatepengeluaranpersembahankhusus(Request $request,$id_user, $id)
{
   // Validasi input
   $request->validate([
       'keterangan' => 'required|string|max:255',
       'tanggal' => 'required|date',
       'nominal' => 'required|numeric',
   ]);

   // Cari data keuangan berdasarkan ID
   $keuangan = PersembahanKhusus::find($id);
   if (!$keuangan) {
       return redirect()->route('jemaat.datapengeluaranpersembahanKhusus')->with('error', 'Data tidak ditemukan');
   }

   // Data baru dari request
   $newData = [
       'keterangan' => $request->keterangan,
       'tanggal' => $request->tanggal,
       'nominal' => $request->nominal,
   ];

   // Data saat ini dari database
   $currentData = [
       'keterangan' => $keuangan->keterangan,
       'tanggal' => $keuangan->tanggal,
       'nominal' => $keuangan->nominal,
   ];

   // Bandingkan data baru dengan data yang ada
   if ($newData == $currentData) {
       return redirect()->route('jemaat.datapengeluaranpersembahanKhusus')->with('warning', 'Tidak ada perubahan pada data Pengeluaran Persembahan Khusus!');
   }

   // Update hanya kolom yang relevan
   $keuangan->keterangan = $request->input('keterangan');
   $keuangan->tanggal = $request->input('tanggal');
   $keuangan->nominal = $request->input('nominal');
   $keuangan->save();

   // Ambil id_pelayan dari jemaat
  $jemaat = Jemaat::where('nik', $id_user)->first();
  $id_pelayan = $jemaat->pelayanGereja->id;

  $currentTimestamp = Carbon::now();
  // Cek apakah entry sudah ada di renungan_pelayan 
  $pelayanPersembahanKhusus = Pelayan_PersembahanKhusus::where('id_persembahankhusus', $id)->where('id_pelayan', $id_pelayan)->first();

  if ($pelayanPersembahanKhusus) {
   // Jika sudah ada, update waktu updated_at secara langsung
   Pelayan_PersembahanKhusus::where('id_persembahankhusus', $id)
               ->where('id_pelayan', $id_pelayan)
               ->update([
                   'updated_at' => $currentTimestamp
                   // tambahkan kolom-kolom lain yang ingin diupdate beserta nilainya di sini
               ]);
} else {
   // Jika belum ada, buat entri baru
   Pelayan_PersembahanKhusus::create([
       'id_persembahankhusus' => $id,
       'id_pelayan' => $id_pelayan,
   ]);
}

   return redirect()->route('jemaat.datapengeluaranpersembahanKhusus')->with('success', 'Data berhasil diperbarui');
}

   public function ubahpembagianpersembahanibadah($id_user,$id)
   {
       $keuangan = Kas::findOrFail($id);

       return view('Jemaat.formubahPembagianpersembahanibadah', compact('keuangan'));
   }

   public function updatepembagianpersembahanibadah( Request $request, $id_user, $id)
   {
       // $request->validate([
       //     'nama_kas' => 'required', // Sesuaikan dengan aturan validasi yang diperlukan
       // ]);
   
       try {
           // Update data kas berdasarkan ID
           Kas::where('id', $id)
               ->update([
                   'nama_kas' => $request->nama_kas,
               ]);
   
           // Jika ingin mengembalikan respons berhasil
           return redirect()->route('jemaat.dataPembagianPersembahanIbadah')->with('success', 'Data kas berhasil diupdate');
   
       } catch (\Exception $e) {
           // Jika terjadi kesalahan, tangani di sini
           return redirect()->back()->with('error', 'Gagal memperbarui data kas. ' . $e->getMessage());
       }
   }



    public function profile($nik){
        $baptis= Baptis::where("nik", $nik)->first();
        $jemaat = Jemaat::where('nik',$nik)->first();
        $sidi= Sidi::where("nik", $nik)->first();
        $sektors = Sektor::get();
        $lampiran = explode("#", $jemaat['lampiran']);
        $file_surat_baptis = $baptis ? explode("#", $baptis['file_surat_baptis']) : [];
        $file_surat_sidi = $sidi ? explode("#", $sidi['file_surat_sidi']) : [];
        return view('Jemaat.profile', ['jemaat'=> $jemaat,'lampiran'=> $lampiran, 'baptis'=>$baptis, 'sidi'=>$sidi, 'file_surat_baptis'=>$file_surat_baptis, 'file_surat_sidi'=>$file_surat_sidi, 'sektors' => $sektors]);
    }

    public function konfirmasi(Request $request, $nik)
{
    $username = $request->username;
    $password = $request->password;
    $jemaat = Jemaat::where("username", $username)->first();

    if ($jemaat) {
        if (password_verify($password, $jemaat->password)) {
            return redirect()->back()->with('modal', 'updateUsernamePasswordModal');
        } else {
            return redirect()->back()->with([
                'error' => 'Password salah',
                'modal' => 'ubahKataSandiModal'
            ]);
        }
    }
}

public function updatepassword(Request $request, $nik)
{
    $jemaat = Jemaat::where("nik", $nik)->first();
    if ($jemaat) {
        $jemaat->username = $request->newUsername;
        $jemaat->password = bcrypt($request->newPassword);
        $jemaat->save();

        return redirect()->back()->with('success', 'Username and password updated successfully')->with('modal', 'updateUsernamePasswordModal');
    }

    return redirect()->back()->with('error', 'Failed to update username and password')->with('modal', 'updateUsernamePasswordModal');
}

public function updatefotoprofile(Request $request, $nik)
{
    // Validasi file upload
    $request->validate([
        'fotoProfilBaru' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ], [
        'fotoProfilBaru.image' => 'File yang diunggah harus berupa gambar',
        'fotoProfilBaru.mimes' => 'Ekstensi file yang diperbolehkan adalah PNG, JPG, JPEG',
        'fotoProfilBaru.max' => 'Ukuran file maksimal adalah 2MB',
    ]);

    // Dapatkan jemaat berdasarkan NIK
    $jemaat = Jemaat::where('nik', $nik)->first();

    if (!$jemaat) {
        return redirect()->back()->with('error', 'Jemaat tidak ditemukan');
    }

    // Upload file
    if ($request->hasFile('fotoProfilBaru')) {
        $file = $request->file('fotoProfilBaru');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '_' . $nik . '.' . $extension;
        $destinationPath = '/profile/jemaat';

        // Simpan file ke dalam folder tujuan
        $file->move(public_path($destinationPath), $filename);

        // Hapus foto profil lama jika ada
        if ($jemaat->profile && Storage::exists($jemaat->profile)) {
            Storage::delete($jemaat->profile);
        }

        // Simpan path foto profil baru
        $jemaat->profile = $destinationPath . '/' . $filename;
        $jemaat->save();

        return redirect()->back()->with('success', 'Foto profil berhasil diubah');
    }

    return redirect()->back()->with('error', 'Gagal mengupload foto profil');
}
}
