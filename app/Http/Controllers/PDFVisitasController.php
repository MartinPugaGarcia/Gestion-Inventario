<?php

namespace App\Http\Controllers;

use App\Models\Visita;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFVisitasController extends Controller
{
    public function PDFVisitas(){
        $visitas = Visita::all();
        $pdf = \PDF::loadView('visitas/visitas', compact('visitas'));
        return $pdf->stream('visitas.pdf');
        //return $pdf->setPaper('a4', 'landscape')->stream('proveedors.pdf');
    }
}
