<?php

namespace App\Http\Middleware;

use Closure;
use StaticVariable;

class BeforeAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->get('Auth', null) !== null) {
            $jemaat = session()->get('Auth', null);
            if ($jemaat->pelayanGereja) {
                if ($jemaat->pelayanGereja->peran === "Pendeta") {
                    return redirect()->route('pendeta.index');
                }
                if ($jemaat->pelayanGereja->peran === "Tata Usaha") {
                    return redirect()->route('tatausaha.index');
                }
                if ($jemaat->pelayanGereja->peran === "Penatua") {
                    return redirect()->route('penatua.index');
                }
                if ($jemaat->pelayanGereja->peran === "Sekretaris Jemaat") {
                    return redirect()->route('sekretaris.index');
                }
                if ($jemaat->pelayanGereja->peran === "Bendahara Jemaat") {
                    return redirect()->route('bendahara.index');
                }
                if ($jemaat) {
                    return redirect()->route('jemaat.index');
                }
            } else {
                return redirect()->route('home.index');
            }
        } else {
            StaticVariable::$user = null;
        }
        return $next($request);
    }
}

// class BeforeAuth
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure  $next
//      * @return mixed
//      */
//     public function handle($request, Closure $next)
//     {
//         // Periksa apakah pengguna sudah login
//         if ($request->session()->has('Auth')) {
//             $jemaat = $request->session()->get('Auth');

//             // Periksa URL yang sedang diakses oleh pengguna
//             $currentUrl = $request->path();

//             // Periksa peran pengguna dan arahkan mereka ke URL yang sesuai
//             switch ($jemaat->pelayanGereja->peran) {
//                 case 'Pendeta':
//                     if ($currentUrl !== 'pendeta') {
//                         return redirect()->route('pendeta.index');
//                     }
//                     break;
//                 case 'Tata Usaha':
//                     if ($currentUrl !== 'tatausaha') {
//                         return redirect()->route('tatausaha.index');
//                     }
//                     break;
//                 case 'Penatua':
//                     if ($currentUrl !== 'penatua') {
//                         return redirect()->route('penatua.index');
//                     }
//                     break;
//                 case 'Sekretaris Jemaat':
//                     if ($currentUrl !== 'sekretaris') {
//                         return redirect()->route('sekretaris.index');
//                     }
//                     break;
//                 case 'Bendahara Jemaat':
//                     if ($currentUrl !== 'bendahara') {
//                         return redirect()->route('bendahara.index');
//                     }
//                     break;
//                 default:
//                     if ($currentUrl !== 'jemaat') {
//                         return redirect()->route('jemaat.index');
//                     }
//             }
//         }

//         // Jika pengguna belum login, lanjutkan permintaan
//         return $next($request);
//     }
// }
