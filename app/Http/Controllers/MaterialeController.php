<?php

namespace App\Http\Controllers;

use App\Models\Materiale;
use Illuminate\Http\Request;

class MaterialeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $busqueda = $request->busqueda;
        $materiales = Materiale::where('nombre','LIKE','%'.$busqueda.'%')
                    ->orWhere('codigo','LIKE','%'.$busqueda.'%')
                    ->orWhere('descripcion','LIKE','%'.$busqueda.'%')
                    ->orWhere('marca','LIKE','%'.$busqueda.'%')
                    ->orWhere('cantidad','LIKE','%'.$busqueda.'%')
                    ->orWhere('fecha_mantenimiento','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(2);
        return view('materiales.index',compact('materiales','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('materiales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //$materiale = Materiale::create($request->all());
        //return redirect()->route('materiales.index');

        $request->validate([
            'nombre' => 'required|string',
            'codigo' => 'required|string',
            'descripcion' => 'required|string',
            'marca' => 'required|string',
            'cantidad' => 'required|integer',
            'fecha_mantenimiento' => 'required|date',
        ]);
            // Guardar los datos en la base de datos
            Materiale::create([
                'nombre' => $request->input('nombre'),
                'codigo' => $request->input('codigo'),
                'descripcion' => $request->input('descripcion'),
                'marca' =>  $request->input('marca'),// Guardar el nombre del archivo
                'cantidad' => $request->input('cantidad'),
                'fecha_mantenimiento' => $request->input('fecha_mantenimiento'),
            ]);
    
            return redirect()->route('materiales.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materiale $materiale)
    {
        //
        return view('materiales.show',compact('materiale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materiale $materiale)
    {
        //
        return view('materiales.edit',compact('materiale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materiale $materiale)
    {
        //
        $materiale->update($request->all());
        return redirect()->route('materiales.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materiale $materiale)
    {
        //
        $materiale->delete();
        return redirect()->route('materiales.index');
    }
}
