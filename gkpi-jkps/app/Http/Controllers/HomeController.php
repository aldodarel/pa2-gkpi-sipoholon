<?php

namespace App\Http\Controllers;

use App\jadwal_ibadah;
use App\WartaJemaat;
use App\Jemaat;
use App\Renungan;
use App\Keluarga;
use App\Tataibadah;
use Carbon\Carbon;
use App\Program;
use App\PelayanGereja;
use App\BeritaGereja;

use Illuminate\Http\Request;

class HomeController extends Controller
{
        public function index()
    {
        // $jadwal_ibadah = jadwal_ibadah::latest()->take(5)->get(); 
        $jadwal_ibadah = jadwal_ibadah::whereNotNull('tata_ibadah')
        ->orderBy('tanggal', 'desc')
        ->take(5)
        ->get();

        // Tentukan tanggal 7 hari yang lalu
        $tanggal_awal = Carbon::now()->subDays(7)->startOfDay();

        // Tentukan tanggal hari ini
        $tanggal_akhir = Carbon::now()->endOfDay();

        // Ambil jadwal ibadah dari 7 hari yang lalu sampai hari ini
        $jadwal_ibadah2 = jadwal_ibadah::where('jenis', '!=', 'Sakramen')->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir])->get();

        $tahun_sekarang = Carbon::now()->year; // Ambil tahun sekarang

        $sakramen = jadwal_ibadah::where('jenis', 'Sakramen')
        ->whereYear('tanggal', $tahun_sekarang)
        ->orderByDesc('tanggal')
        ->get();
        if ($sakramen->isEmpty()) {
            $sakramen = jadwal_ibadah::where('jenis', 'Sakramen')
                ->whereYear('tanggal', '<', $tahun_sekarang)
                ->orderByDesc('tanggal')
                ->get();
        }

        $renungan = Renungan::latest()->take(3)->get();
        $renungan1 = Renungan::whereDate('tanggal', '<=', now())->latest()->take(1)->get();
        $berita_gereja = BeritaGereja::latest()->take(3)->get(); 

        
        $datakeluarga = [
            [
                "name"=> "Jumlah Keluarga",
                "jumlah"=> Keluarga::all()->where("status", "Aktif")->count(),
                "color"=> "bg-success",
                "icon"=> "bi bi-people-fill font-utama fa-3x"
            ],
            [
                "name"=> "Jumlah Pemuda Pemudi",
                "jumlah"=> Jemaat::all()->where("status_pernikahan", "Belum Menikah")->where("status_gereja", "Aktif")->count(),
                "color"=> "bg-info",
                "icon"=> "bi bi-person-fill font-utama fa-3x"
            ],
            [
                "name"=> "Jumlah Laki-laki(AMA)",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Laki-laki")->where("status_pernikahan", "Menikah")->where("status_gereja", "Aktif")->count(),
                "color"=> "bg-primary",
                "icon"=> "bi bi-gender-male font-utama fa-3x"
            ],
            [
                "name"=> "Jumlah Perempuan(INA)",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Perempuan")->where("status_pernikahan", "Menikah")->where("status_gereja", "Aktif")->count(),
                "color"=> "bg-pink",
                "icon"=> "bi bi-gender-female font-utama fa-3x"
            ],
            [
                "name"=> "Jumlah Jemaat Aktif",
                "jumlah"=> Jemaat::all()->where("status_gereja", "Aktif")->count(),
                "color"=> "bg-warning",
                "icon"=> "bi bi-person-check-fill font-utama fa-3x"
            ],
            [
                "name" => "Jumlah Jemaat Tidak Aktif",
                "jumlah" => Jemaat::whereIn("status_gereja", ["Pindah", "Meninggal"])->count(),
                "color" => "bg-danger",
                "icon" => "bi bi-gender-female font-utama fa-3x"
            ],
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(1);
        return view('FE.home.index', compact('jadwal_ibadah','jadwal_ibadah2','renungan', 'renungan1', 'sakramen','berita_gereja'), [
            "datakeluargas"=> $datakeluarga,
            "keluargas" => $keluarga,
            "title" => "index"
        ]);
    }

    function ibadah()  {
        $mingguan = jadwal_ibadah::whereNotNull('tata_ibadah')->orderBy('tanggal', 'desc')->where('jenis', 'Mingguan')->take(5)->get();
        $sektor = jadwal_ibadah::whereNotNull('tata_ibadah')->orderBy('tanggal', 'desc')->where('jenis', 'Sektor')->take(5)->get();
        $situasional = jadwal_ibadah::whereNotNull('tata_ibadah')->orderBy('tanggal', 'desc')->where('jenis', 'Situasional')->take(5)->get();
        $dukacita = jadwal_ibadah::whereNotNull('tata_ibadah')->orderBy('tanggal', 'desc')->where('jenis', 'Dukacita')->take(5)->get();
        return view('FE.home.tataibadah',compact('mingguan', 'sektor','situasional','dukacita'),[
            "title" => "ibadah"
        ]);
    }

    function renungan() {
        $renungan = Renungan::whereDate('tanggal', '<=', now())->latest()->take(15)->get();
        $renungan1 = Renungan::whereDate('tanggal', '<=', now())->latest()->take(1)->get();
        return view('FE.home.renungan',compact('renungan', 'renungan1'),[
            "title" => "renungan"
        ]);
    }
     // Metode untuk memuat data renungan berdasarkan ID
     public function getRenunganById($id)
     {
         $renungan = Renungan::findOrFail($id); // Mengambil data renungan berdasarkan ID yang diberikan
         return response()->json($renungan); // Mengembalikan data dalam format JSON
     }

     function struktur() {
        $pelayan = PelayanGereja::with(['jemaat'])->whereNull('tanggal_akhir_jabatan')->get();
        // $pelayan = PelayanGereja::with(['jemaat', 'jemaat.sektor'])->paginate(10);
        return view('FE.home.struktur', [
            "pelayan" => $pelayan,
            'title' => 'tentang'
        ]);
    }
    

    function programkerja() {
        // Dapatkan tahun ini atau tahun paling dekat dengan tahun ini
        $currentYear = Carbon::now()->year;

        $programkerja = Program::where('jenis_program', 'Rancangan Program Kerja')
            ->where('tahun', '<=', $currentYear) // Ambil tahun yang lebih kecil atau sama dengan tahun ini
            ->orderBy('tahun', 'desc') // Urutkan secara menurun berdasarkan tahun
            ->take(1) // Ambil hanya satu record
            ->get(); // Eksekusi kueri dan ambil hasilnya
        // $programkerja = Program::where('jenis_program', 'Rancangan Program Kerja')->get();
        return view('FE.home.programkerja',compact('programkerja'),[
            "title" => "tentang"
        ]);
    }

    function anggaranbiaya() {
        // Dapatkan tahun ini atau tahun paling dekat dengan tahun ini
        $currentYear = Carbon::now()->year;

        $anggaranbiaya = Program::where('jenis_program', 'Rancangan Anggaran Penerimaan dan Belanja')
            ->where('tahun', '<=', $currentYear) // Ambil tahun yang lebih kecil atau sama dengan tahun ini
            ->orderBy('tahun', 'desc') // Urutkan secara menurun berdasarkan tahun
            ->take(1) // Ambil hanya satu record
            ->get(); // Eksekusi kueri dan ambil hasilnya
        // $programkerja = Program::where('jenis_program', 'Rancangan Program Kerja')->get();
        return view('FE.home.anggaranbiaya',compact('anggaranbiaya'),[
            "title" => "tentang"
        ]);
    }

    // Berita gereja

    // public function showberita()
    // {
    //     $berita_gereja = BeritaGereja::latest()->take(3)->get(); 

    //     return view('Pendeta.databerita', compact('berita_gereja'));
    // }
    function getBerita (){
        $berita = BeritaGereja::orderBy('id', 'desc')->paginate(7);
        return view('FE.home.beritagereja',compact('berita'),[
            "title" => "ibadah"
        ]);
    }
    function detailnews ($id){
        $berita = BeritaGereja::find($id);
        $berita_lainnya = BeritaGereja::where('id', '!=', $id)->orderBy('id', 'desc')->paginate(6);
        return view('FE.home.DetailBeritaGereja',compact('berita', 'berita_lainnya'),[
            "title" => "ibadah"
        ]);
    }

    // function detailnews (){
    //     $berita = BeritaGereja::orderBy('id', 'desc')->paginate(7);
    //     return view('FE.home.beritagereja',compact('berita'),[
    //         "title" => "ibadah"
    //     ]);
    // }

    function dashboardjemaat(Request $request)
    {
        $datakeluarga = [
            [
                "name"=> "JUMLAH KELUARGA",
                "jumlah"=> Keluarga::count(),
                "color"=> "bg-success",
            ],
            [
                "name"=> "JUMLAH JEMAAT",
                "jumlah"=> Jemaat::all()->count(),
                "color"=> "bg-info",
            ],
            [
                "name"=> "JUMLAH LAKI LAKI",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Laki-laki")->count(),
                "color"=> "bg-primary",
            ],
            [
                "name"=> "JUMLAH PEREMPUAN",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Perempuan")->count(),
                "color"=> "bg-pink",
            ],
            [
                "name"=> "JUMLAH JEMAAT AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Aktif")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT TIDAK AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Pindah", "Meninggal")->count(),
                "color"=> "bg-danger",
            ]
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(1);
        return view('Home.jemaat', [
            "datakeluargas"=> $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }

    function dashboard(Request $request)
    {
        $datakeluarga = [
            [
                "name" => "JUMLAH KELUARGA",
                "jumlah" => Keluarga::count(),
                "color" => "bg-primary",
                "icon" => "fa-users",
            ],
            [
                "name" => "JUMLAH JEMAAT",
                "jumlah" => Jemaat::all()->count(),
                "color" => "bg-primary",
                "icon" => "fa-user",
            ],
            [
                "name" => "JUMLAH LAKI LAKI",
                "jumlah" => Jemaat::all()->where("jenis_kelamin", "Laki-laki")->count(),
                "color" => "bg-info",
                "icon" => "fa-male",
            ],
            [
                "name" => "JUMLAH PEREMPUAN",
                "jumlah" => Jemaat::all()->where("jenis_kelamin", "Perempuan")->count(),
                "color" => "bg-pink",
                "icon" => "fa-female",
            ],
            [
                "name" => "JUMLAH JEMAAT AKTIF",
                "jumlah" => Jemaat::all()->where("status", "Aktif")->count(),
                "color" => "bg-success",
                "icon" => "fa-user",
            ],
            [
                "name" => "JUMLAH JEMAAT TIDAK AKTIF",
                "jumlah" => Jemaat::all()->where("status", "Pindah", "Meninggal")->count(),
                "color" => "bg-danger",
                "icon" => "fa-user-times",
            ],
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(1);
        return view('Home.index', [
            "datakeluargas"=> $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }

    function dashboardpengurusharian(Request $request)
    {
        $datakeluarga = [
            [
                "name" => "JUMLAH KELUARGA",
                "jumlah" => Keluarga::count(),
                "color" => "bg-primary",
                "icon" => "fa-users",
            ],
            [
                "name" => "JUMLAH JEMAAT",
                "jumlah" => Jemaat::all()->count(),
                "color" => "bg-primary",
                "icon" => "fa-user",
            ],
            [
                "name" => "JUMLAH LAKI LAKI",
                "jumlah" => Jemaat::all()->where("jenis_kelamin", "Laki-laki")->count(),
                "color" => "bg-info",
                "icon" => "fa-male",
            ],
            [
                "name" => "JUMLAH PEREMPUAN",
                "jumlah" => Jemaat::all()->where("jenis_kelamin", "Perempuan")->count(),
                "color" => "bg-pink",
                "icon" => "fa-female",
            ],
            [
                "name" => "JUMLAH JEMAAT AKTIF",
                "jumlah" => Jemaat::all()->where("status", "Aktif")->count(),
                "color" => "bg-success",
                "icon" => "fa-user",
            ],
            [
                "name" => "JUMLAH JEMAAT TIDAK AKTIF",
                "jumlah" => Jemaat::all()->where("status", "Pindah", "Meninggal")->count(),
                "color" => "bg-danger",
                "icon" => "fa-user-times",
            ],
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(1);
        return view('Home.pengurusharian', [
            "datakeluargas"=> $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }
    function dashboardTatausaha(Request $request)
    {
        $datakeluarga = [
            [
                "name"=> "JUMLAH KELUARGA",
                "jumlah"=> Keluarga::count(),
                "color"=> "bg-success",
            ],
            [
                "name"=> "JUMLAH JEMAAT",
                "jumlah"=> Jemaat::all()->count(),
                "color"=> "bg-info",
            ],
            [
                "name"=> "JUMLAH LAKI LAKI",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Laki-laki")->count(),
                "color"=> "bg-primary",
            ],
            [
                "name"=> "JUMLAH PEREMPUAN",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Perempuan")->count(),
                "color"=> "bg-pink",
            ],
            [
                "name"=> "JUMLAH JEMAAT AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Aktif")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT TIDAK AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Pindah", "Meninggal")->count(),
                "color"=> "bg-danger",
            ]
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(1);
        return view('Home.tatausaha', [
            "datakeluargas"=> $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }
    function dashboardpenatua(Request $request)
    {
        $datakeluarga = [
            [
                "name"=> "JUMLAH KELUARGA",
                "jumlah"=> Keluarga::count(),
                "color"=> "bg-success",
            ],
            [
                "name"=> "JUMLAH JEMAAT",
                "jumlah"=> Jemaat::all()->count(),
                "color"=> "bg-info",
            ],
            [
                "name"=> "JUMLAH LAKI LAKI",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Laki-laki")->count(),
                "color"=> "bg-primary",
            ],
            [
                "name"=> "JUMLAH PEREMPUAN",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Perempuan")->count(),
                "color"=> "bg-pink",
            ],
            [
                "name"=> "JUMLAH JEMAAT AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Aktif")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT TIDAK AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Pindah", "Meninggal")->count(),
                "color"=> "bg-danger",
            ]
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(1);
        return view('Home.penatua', [
            "datakeluargas"=> $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }
    function dashboardbendahara(Request $request)
    {
        $datakeluarga = [
            [
                "name"=> "JUMLAH KELUARGA",
                "jumlah"=> Keluarga::count(),
                "color"=> "bg-success",
            ],
            [
                "name"=> "JUMLAH JEMAAT",
                "jumlah"=> Jemaat::all()->count(),
                "color"=> "bg-info",
            ],
            [
                "name"=> "JUMLAH LAKI LAKI",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Laki-laki")->count(),
                "color"=> "bg-primary",
            ],
            [
                "name"=> "JUMLAH PEREMPUAN",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Perempuan")->count(),
                "color"=> "bg-pink",
            ],
            [
                "name"=> "JUMLAH JEMAAT AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Aktif")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT TIDAK AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Pindah", "Meninggal")->count(),
                "color"=> "bg-danger",
            ]
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(1);
        return view('Home.bendahara', [
            "datakeluargas"=> $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }
    function dashboardsekretaris(Request $request)
    {
        $datakeluarga = [
            [
                "name"=> "JUMLAH KELUARGA",
                "jumlah"=> Keluarga::count(),
                "color"=> "bg-success",
            ],
            [
                "name"=> "JUMLAH LAKI LAKI",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Laki-laki")->count(),
                "color"=> "bg-primary",
            ],
            [
                "name"=> "JUMLAH PEREMPUAN",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Perempuan")->count(),
                "color"=> "bg-info",
            ],
            [
                "name"=> "JUMLAH JEMAAT AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Aktif")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT TIDAK AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Aktif")->count(),
                "color"=> "bg-danger",
            ],
            [
                "name"=> "JUMLAH JEMAAT MENIKAH",
                "jumlah"=> Jemaat::all()->where("status_pernikahan", "Menikah")->count(),
                "color"=> "bg-secondary",
            ],
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(1);
        return view('Home.sekretaris', [
            "datakeluargas"=> $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }
    
}