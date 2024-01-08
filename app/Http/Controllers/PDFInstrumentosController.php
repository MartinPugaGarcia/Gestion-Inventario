<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instrumento;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFInstrumentosController extends Controller
{
    //
    public function PDFInstrumentos(){
        $instrumentos = Instrumento::all();
        $pdf = \PDF::loadView('instrumentos/instrumentos', compact('instrumentos'));
        return $pdf->stream('instrumentos.pdf');
        //return $pdf->setPaper('a4', 'landscape')->stream('instrumentos.pdf');
    }
}
