<?php

namespace App\Http\Controllers;

use App\Models\Instrumento;
use Illuminate\Http\Request;

class InstrumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $busqueda = $request->busqueda;
        $instrumentos = Instrumento::where('nombre','LIKE','%'.$busqueda.'%')
                    ->orWhere('codigo','LIKE','%'.$busqueda.'%')
                    ->orWhere('descripcion','LIKE','%'.$busqueda.'%')
                    ->orWhere('marca','LIKE','%'.$busqueda.'%')
                    ->orWhere('cantidad','LIKE','%'.$busqueda.'%')
                    ->orWhere('fecha_mantenimiento','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(2);
        return view('instrumentos.index',compact('instrumentos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('instrumentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //$instrumento = Instrumento::create($request->all());
        //return redirect()->route('instrumentos.index');

        $request->validate([
            'nombre' => 'required|string',
            'codigo' => 'required|string',
            'descripcion' => 'required|string',
            'marca' => 'required|string',
            'cantidad' => 'required|integer',
            'fecha_mantenimiento' => 'required|date',
        ]);
            // Guardar los datos en la base de datos
            Instrumento::create([
                'nombre' => $request->input('nombre'),
                'codigo' => $request->input('codigo'),
                'descripcion' => $request->input('descripcion'),
                'marca' =>  $request->input('marca'),// Guardar el nombre del archivo
                'cantidad' => $request->input('cantidad'),
                'fecha_mantenimiento' => $request->input('fecha_mantenimiento'),
            ]);
    
            return redirect()->route('instrumentos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instrumento $instrumento)
    {
        //
        return view('instrumentos.show',compact('instrumento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instrumento $instrumento)
    {
        //
        return view('instrumentos.edit',compact('instrumento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instrumento $instrumento)
    {
        //
        $instrumento->update($request->all());
        return redirect()->route('instrumentos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instrumento $instrumento)
    {
        //
        $instrumento->delete();
        return redirect()->route('instrumentos.index');
    }
}
