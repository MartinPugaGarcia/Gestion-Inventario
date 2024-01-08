<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reactivo;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFReactivosController extends Controller
{
    //
    public function PDFReactivos(){
        $reactivos = Reactivo::all();
        $pdf = \PDF::loadView('reactivos/reactivos', compact('reactivos'));
        return $pdf->stream('reactivos.pdf');
        //return $pdf->setPaper('a4', 'landscape')->stream('reactivos.pdf');
    }
}
