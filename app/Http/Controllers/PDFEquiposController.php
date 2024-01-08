<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFEquiposController extends Controller
{
    //
    public function PDFEquipos(){
        $equipos = Equipo::all();
        $pdf = \PDF::loadView('equipos/equipos', compact('equipos'));
        return $pdf->stream('equipos.pdf');
        //return $pdf->setPaper('a4', 'landscape')->stream('equipos.pdf');
    }
}
