<?php

namespace App\Http\Controllers;

use App\Models\Visita;
use Illuminate\Http\Request;

class VisitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $busqueda = $request->busqueda;
        $visitas = Visita::where('ncontrol','LIKE','%'.$busqueda.'%')
                    ->orWhere('nombre','LIKE','%'.$busqueda.'%')
                    ->orWhere('motivo','LIKE','%'.$busqueda.'%')
                    ->orWhere('fecha_hora','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(2);
        return view('visitas.index',compact('visitas','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('visitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Visita::create([
            'ncontrol' => $request->input('ncontrol'),
            'nombre' => $request->input('nombre'),
            'motivo' => $request->input('motivo'),
            'fecha_hora' => $request->fecha_hora = now(),
        ]);
        return redirect()->route('visitas.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visita $visita)
    {
        //
        return view('visitas.show',compact('visita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visita $visita)
    {
        //
        return view('visitas.edit',compact('visita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visita $visita)
    {
        //
        $visita->update($request->all());
        return redirect()->route('visitas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visita $visita)
    {
        //
        $visita->delete();
        return redirect()->route('visitas.index');
    }
}
