<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materiale;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFMaterialesController extends Controller
{
    //
    public function PDFMateriales(){
        $materiales = Materiale::all();
        $pdf = \PDF::loadView('materiales/materiales', compact('materiales'));
        return $pdf->stream('materiales.pdf');
        //return $pdf->setPaper('a4', 'landscape')->stream('materiales.pdf');
    }
}
