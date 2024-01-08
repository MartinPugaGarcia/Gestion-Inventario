<?php

namespace App\Http\Controllers;

use App\Models\Mobiliario;
use Illuminate\Http\Request;

class MobiliarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $busqueda = $request->busqueda;
        $mobiliarios = Mobiliario::where('nombre','LIKE','%'.$busqueda.'%')
                    ->orWhere('codigo','LIKE','%'.$busqueda.'%')
                    ->orWhere('descripcion','LIKE','%'.$busqueda.'%')
                    ->orWhere('marca','LIKE','%'.$busqueda.'%')
                    ->orWhere('cantidad','LIKE','%'.$busqueda.'%')
                    ->orWhere('fecha_mantenimiento','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(2);
        return view('mobiliarios.index',compact('mobiliarios','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('mobiliarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //$mobiliario = Mobiliario::create($request->all());
        //return redirect()->route('mobiliarios.index');

        $request->validate([
            'nombre' => 'required|string',
            'codigo' => 'required|string',
            'descripcion' => 'required|string',
            'marca' => 'required|string',
            'cantidad' => 'required|integer',
            'fecha_mantenimiento' => 'required|date',
        ]);
            // Guardar los datos en la base de datos
            Mobiliario::create([
                'nombre' => $request->input('nombre'),
                'codigo' => $request->input('codigo'),
                'descripcion' => $request->input('descripcion'),
                'marca' =>  $request->input('marca'),// Guardar el nombre del archivo
                'cantidad' => $request->input('cantidad'),
                'fecha_mantenimiento' => $request->input('fecha_mantenimiento'),
            ]);
    
            return redirect()->route('mobiliarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mobiliario $mobiliario)
    {
        //
        return view('mobiliarios.show',compact('mobiliario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mobiliario $mobiliario)
    {
        //
        return view('mobiliarios.edit',compact('mobiliario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mobiliario $mobiliario)
    {
        //
        $mobiliario->update($request->all());
        return redirect()->route('mobiliarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobiliario $mobiliario)
    {
        //
        $mobiliario->delete();
        return redirect()->route('mobiliarios.index');
    }
}
