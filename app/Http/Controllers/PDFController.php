<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function PDFProveedors(){
        $proveedors = Proveedor::all();
        $pdf = \PDF::loadView('proveedores/proveedors', compact('proveedors'));
        return $pdf->stream('proveedors.pdf');
        //return $pdf->setPaper('a4', 'landscape')->stream('proveedors.pdf');
    }
}
