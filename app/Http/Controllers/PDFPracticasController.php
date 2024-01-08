<?php

namespace App\Http\Controllers;

use App\Models\Practica;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFPracticasController extends Controller
{
    public function PDFPracticas(){
        $practicas = Practica::all();
        $pdf = \PDF::loadView('practica/practicas', compact('practicas'));
        return $pdf->stream('practicas.pdf');
        //return $pdf->setPaper('a4', 'landscape')->stream('proveedors.pdf');
    }
}
