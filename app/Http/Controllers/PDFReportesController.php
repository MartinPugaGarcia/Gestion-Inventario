<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFReportesController extends Controller
{
    public function PDFReportes(){
        $reportes = Reporte::all();
        $pdf = \PDF::loadView('reportes/reportes', compact('reportes'));
        return $pdf->stream('reportes.pdf');
        //return $pdf->setPaper('a4', 'landscape')->stream('reportes.pdf');
    }
}
