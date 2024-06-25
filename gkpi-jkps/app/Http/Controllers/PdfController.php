<?php

namespace App\Http\Controllers;

use App\Models\Jadwal_Pelayanan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $detailpelayanan = Jadwal_Pelayanan::all();
        $data = [
            'tanggal' => date('d-m-Y H:i:s'), // Tanggal dan waktu pencetakan
            'detailpelayanan' => $detailpelayanan, // Data dari database
        ];
        $pdf = Pdf::loadView('Jemaat/generate-detailpelayanan-pdf', $data);
        return $pdf->download('detailpelayanan.pdf');
    }
}
