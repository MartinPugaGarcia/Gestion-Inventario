<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $busqueda = $request->busqueda;
        $reportes = Reporte::where('docente','LIKE','%'.$busqueda.'%')
                    ->orWhere('descripcion','LIKE','%'.$busqueda.'%')
                    ->orWhere('fecha','LIKE','%'.$busqueda.'%')
                    ->orWhere('hora','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(2);
        return view('reportes.index',compact('reportes','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('reportes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'docente' => 'required|string',
            'descripcion' => 'required|string',
            'tipo_incidente' => 'required|string',
            'fecha' => 'required|date',
        ]);
            // Guardar los datos en la base de datos
            Reporte::create([
                'docente' => $request->input('docente'),
                'descripcion' => $request->input('descripcion'),
                'tipo_incidente' => $request->input('tipo_incidente'),
                'fecha' => $request->input('fecha'),
                'hora' => $request->input('hora'),
            ]);
    
            return redirect()->route('reportes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reporte $reporte)
    {
        //
        return view('reportes.show',compact('reporte'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reporte $reporte)
    {
        //
        return view('reportes.edit',compact('reporte'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reporte $reporte)
    {
        //
        $reporte->update($request->all());
        return redirect()->route('reportes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reporte $reporte)
    {
        //
        $reporte->delete();
        return redirect()->route('reportes.index');
    }
}
