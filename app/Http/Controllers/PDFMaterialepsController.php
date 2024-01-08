<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materialep;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFMaterialepsController extends Controller
{
    //
    public function PDFMaterialeps(){
        $materialeps = Materialep::all();
        $pdf = \PDF::loadView('materialeps/materialeps', compact('materialeps'));
        return $pdf->stream('materialeps.pdf');
        //return $pdf->setPaper('a4', 'landscape')->stream('materiales.pdf');
    }
}
