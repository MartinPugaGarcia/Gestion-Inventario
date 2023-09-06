<?php

namespace App\Http\Controllers;

use App\Models\Practica;
use Illuminate\Http\Request;
use Auth;

use Carbon\Carbon;

class PracticaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $usuario= Auth::user()->id; 
        $practicas = Practica::where('idusuario',$usuario)->get();
        return view('practica.index', ['practicas' => $practicas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        request()->validate(Practica::$rules);
        $practica=Practica::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Practica $practica)
    {
        //
        $practica= Practica::all();
        return response()->json($practica);
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $practica = Practica::find($id);
        $practica->start=Carbon::createFromFormat('Y-m-d H:i:s', $practica->start)->format('Y-m-d');
        return response()->json($practica);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Practica $practica)
    {
        //
        request()->validate(Practica::$rules);
        $practica->update($request->all());
        return response()->json($practica);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $practica = Practica::find($id)->delete();
        return response()->json($practica);


    }
}
