<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFPrestamosController extends Controller
{
    public function PDFPrestamos(){
        $prestamos = Prestamo::all();
        $pdf = \PDF::loadView('prestamos/prestamos', compact('prestamos'));
        return $pdf->stream('prestamos.pdf');
        //return $pdf->setPaper('a4', 'landscape')->stream('proveedors.pdf');
    }
}
