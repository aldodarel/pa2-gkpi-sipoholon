<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Jemaat;
use App\PelayanGereja;
use Illuminate\Contracts\Session\Session;
use StaticVariable;
use App\Sektor;
use App\Baptis;
use App\Models\Sidi;

class AuthController extends Controller
{
    //
    function index()
    {
        return view('Auth.index');
    }
    function logout(){
        session()->forget("Auth");
        return redirect()->route('home.index');
    }

    function login(Request $request)
    {
        $nik = $request->nik;
        $password = $request->password;
        $jemaat = Jemaat::where("username", $nik)->first();
        if ($jemaat) {
            // Will do authentication 
            if (password_verify($password, $jemaat->password)) {
                if ($jemaat->pelayanGereja) {
                    if ($jemaat->pelayanGereja->peran === "Pendeta"){
                        StaticVariable::$user = $jemaat;
                        session()->put('Auth', $jemaat);
                        return redirect()->route('pendeta.index');
                    }
                    if ($jemaat->pelayanGereja->peran === "Sekretaris" || $jemaat->pelayanGereja->peran === "Bendahara"){
                        StaticVariable::$user = $jemaat;
                        session()->put('Auth', $jemaat);
                        return redirect()->route('pengurusharian.index');
                    }
                    if ($jemaat->pelayanGereja->peran === "Penatua Aktif" || $jemaat->pelayanGereja->peran === "Calon Penatua Aktif"){
                        StaticVariable::$user = $jemaat;
                        session()->put('Auth', $jemaat);
                        return redirect()->route('penatua.index');
                    }


                    if ($jemaat->pelayanGereja->peran === "Tata Usaha"){
                        StaticVariable::$user = $jemaat;
                        session()->put('Auth', $jemaat);
                        return redirect()->route('tatausaha.index');
                    }
                    
                    if ($jemaat->pelayanGereja->peran === "Bendahara"){
                        StaticVariable::$user = $jemaat;
                        session()->put('Auth', $jemaat);
                        return redirect()->route('bendahara.index');
                    }
                    if ($jemaat->pelayanGereja->peran === "Sekretaris"){
                        StaticVariable::$user = $jemaat;
                        session()->put('Auth', $jemaat);
                        return redirect()->route('sekretaris.index');
                    }else {
                        StaticVariable::$user = $jemaat;
                        session()->put('Auth', $jemaat);
                        return redirect()->route('jemaat.index');
    
                    }
                } else {
                    StaticVariable::$user = $jemaat;
                    session()->put('Auth', $jemaat);
                    return redirect()->route('jemaat.index');

                }
            } else {
                return redirect()->back()->withErrors(["message" => "Password salah"])->withInput();
            }
        } else {
            return redirect()->back()->withErrors(["message" => "Username Tidak terdaftar"])->withInput();
        }
    }

    function registration(){
        return view('Auth.registration');
    }
    public function registrationConfirm(Request $request)
{
    $nomor_registrasi = $request->input('nomor_registrasi');

    // Periksa apakah nomor registrasi ada di tabel jemaat
    $jemaat = Jemaat::where('kode_registrasi', $nomor_registrasi)->first();

    if ($jemaat) {
        // Jika ada, periksa apakah username tidak NULL
        if (!is_null($jemaat->username)) {
            // Jika username tidak NULL, arahkan kembali dengan pesan error
            return redirect()->back()->withErrors(['message' => 'Nomor registrasi sudah digunakan.']);
        } else {
            // Jika username NULL, arahkan ke route 'auth.fillregistration'
            return redirect()->route('auth.fillregistration', ['no_reg' => $nomor_registrasi]);
        }
    } else {
        // Jika tidak ada, tampilkan pesan error
        return redirect()->back()->withErrors(['message' => 'Nomor registrasi tidak ditemukan.']);
    }
}
    function fillregistration($no_reg){
        return view('Auth.fillregistration', compact('no_reg'));
    }
    // function submitfillregistration(Request $request,$no_reg){
    
    //     // Cari data jemaat berdasarkan $no_reg
    //     $jemaat = Jemaat::where("kode_registrasi", $no_reg)->first();
    //     if($request->password != $request->confirm_password){
    //         return redirect()->back()->withErrors(['message' => 'Password dan konfirmasi password tidak sama.']);
    //     }else if ($jemaat) {
    //         // Perbarui username dan password jemaat
    //         $jemaat->username = $request->username;
    //         $jemaat->password = bcrypt($request->password);
    //         $jemaat->save();
    
    //         // Alihkan ke halaman login
    //         return redirect()->route('auth.login')->with('success', 'Registrasi Berhasil. Silakan login dengan akun baru Anda.');
    //     } else {
    //         // Jika jemaat tidak ditemukan, tampilkan pesan kesalahan
    //         return redirect()->back()->withErrors(['message' => 'Terjadi kesalahan saat registrasi.']);
    //     }
    // }

    function submitfillregistration(Request $request, $no_reg)
{
    // Cari data jemaat berdasarkan $no_reg
    $jemaat = Jemaat::where("kode_registrasi", $no_reg)->first();

    // Periksa apakah password dan konfirmasi password tidak sama
    if ($request->password != $request->confirm_password) {
        return redirect()->back()->withErrors(['message' => 'Password dan konfirmasi password tidak sama.']);
    } else {
        // Periksa apakah kombinasi username dan password sudah ada
        $existingUser = Jemaat::where('username', $request->username)
                            ->where('password', bcrypt($request->password))
                            ->first();
        
        if ($existingUser) {
            return redirect()->back()->withErrors(['message' => 'Username dan password sudah terdaftar.']);
        }

        // Jika jemaat ditemukan, perbarui username dan password jemaat
        if ($jemaat) {
            $jemaat->username = $request->username;
            $jemaat->password = bcrypt($request->password);
            $jemaat->save();

            // Alihkan ke halaman login
            return redirect()->route('auth.login')->with('success', 'Registrasi Berhasil. Silakan login dengan akun baru Anda.');
        } else {
            // Jika jemaat tidak ditemukan, tampilkan pesan kesalahan
            return redirect()->back()->withErrors(['message' => 'Terjadi kesalahan saat registrasi.']);
        }
    }
}


    public function profile($nik){
        
        $jemaat = Jemaat::where('nik',$nik)->first();
        //dd($profile);
        
        return view('jemaat.profile', ['jemaat'=>$jemaat]);
    }
    public function profilebenda($nik){
        
        $jemaat = Jemaat::where('nik',$nik)->first();
        //dd($profile);
        
        return view('jemaat.profilebenda', ['jemaat'=>$jemaat]);
    }
    public function editprofile(Request $request, $nik){
        $nik = $request->nik;
        $namafile = 'profile/default.png';
        if ($request->hasFile('profile')){
            $file = $request->file("profile");
            $extension = $file->getClientOriginalExtension();
            $str = rand();
            $result = md5($str);
            $name = time() . "-" . $result . '.' . $extension;
            $request->file('profile')->move('profile/', $name , $request->file('profile')->getClientOriginalName());
            $namafile = $request->file('profile')->getClientOriginalName();
            
        }
        $jemaat = DB::table('jemaat')->where('nik', $nik)->update([
                
            'nik' => $request->nik,
            'name' => $request->name,
            'username' => $request->username,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'status_pernikahan' => $request->status_pernikahan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_baptis' => $request->tanggal_baptis,
            'tanggal_sidih' => $request->tanggal_sidih,
            'sektor_role' => $request->sektor_role,
            'profile' => $namafile
        ]);
        return back()->with('success', 'Profil Sudah Berhasil Diubah');
    }
    public function profilejemaat($nik){
        
        $jemaat = Jemaat::where('nik',$nik)->first();
        //dd($profile);
        
        return view('jemaat.profilejemaat', ['jemaat'=>$jemaat]);
    }
    public function profilependeta($nik){
        $baptis= Baptis::where("nik", $nik)->first();
        $jemaat = Jemaat::where('nik',$nik)->first();
        $sidi= Sidi::where("nik", $nik)->first();
        $sektors = Sektor::get();
        $lampiran = explode("#", $jemaat['lampiran']);
        $file_surat_baptis = $baptis ? explode("#", $baptis['file_surat_baptis']) : [];
        $file_surat_sidi = $sidi ? explode("#", $sidi['file_surat_sidi']) : [];
        return view('jemaat.profilependeta', ['jemaat'=> $jemaat,'lampiran'=> $lampiran, 'baptis'=>$baptis, 'sidi'=>$sidi, 'file_surat_baptis'=>$file_surat_baptis, 'file_surat_sidi'=>$file_surat_sidi, 'sektors' => $sektors]);
    }
    public function profilesekretaris($nik){
        
        $jemaat = Jemaat::where('nik',$nik)->first();
        //dd($profile);
        
        return view('jemaat.profilesekre', ['jemaat'=>$jemaat]);
    }
    public function profilepenatua($nik){
        
        $jemaat = Jemaat::where('nik',$nik)->first();
        //dd($profile);
        
        return view('jemaat.profilepenatua', ['jemaat'=>$jemaat]);
    }
}
