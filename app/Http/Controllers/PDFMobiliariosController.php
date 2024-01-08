<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobiliario;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFMobiliariosController extends Controller
{
    //
    public function PDFMobiliarios(){
        $mobiliarios = Mobiliario::all();
        $pdf = \PDF::loadView('mobiliarios/mobiliarios', compact('mobiliarios'));
        return $pdf->stream('mobiliarios.pdf');
        //return $pdf->setPaper('a4', 'landscape')->stream('mobiliarios.pdf');
    }
}
