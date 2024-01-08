<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Prestamo;
use App\Models\Instrumento;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //BUSCAR Y LISTAR PRESTAMOS INSTRUMENTOS
        $busqueda = $request->busqueda;
        $prestamos = Prestamo::where('nombre','LIKE','%'.$busqueda.'%')
                    ->orWhere('alumno','LIKE','%'.$busqueda.'%')
                    ->orWhere('nombre','LIKE','%'.$busqueda.'%')
                    ->orWhere('cantidad','LIKE','%'.$busqueda.'%')
                    ->orWhere('docente','LIKE','%'.$busqueda.'%')
                    ->orWhere('descripcion','LIKE','%'.$busqueda.'%')
                    ->orWhere('fecha','LIKE','%'.$busqueda.'%')
                    ->orWhere('hora','LIKE','%'.$busqueda.'%')
                    ->orWhere('estado','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(2);
        return view('prestamos.index',compact('prestamos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $instrumentos = Instrumento::all();

        return view('prestamos.create', compact('instrumentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // CREAR PRESTAMO INSTRUMENTO
        // dd($request->all());
        // $prestamo = Prestamo::create($request->all());
        $id = $request->nombre;
        $cantidad = $request->cantidad;
        $estado = $request->estado;
        $producto = Instrumento::where('id',$id)->first();
        $stock = Instrumento::where('id',$id)->pluck('cantidad')->first();
        $nombre = Instrumento::where('id',$id)->pluck('nombre')->first();
        if($cantidad<=$stock){
            if($estado=='1'){
                $entregado = 'entregado';
                Prestamo::create([
                    'id_producto' => $id,
                    'alumno' => $request->input('alumno'),
                    'nombre' => $nombre,
                    'cantidad' => $cantidad,
                    'docente' => $request->input('docente'),
                    'descripcion' => $request->input('descripcion'),
                    'fecha' => $request->input('fecha'),
                    'hora' => $request->input('hora'),
                    'estado' => $entregado,
                ]);
            }
            if($estado=='0'){
                $cantidad_actualizada = $stock - $cantidad;
                $producto->cantidad=$cantidad_actualizada;
                $producto->update();
                $pendiente = 'pendiente';
                Prestamo::create([
                    'id_producto' => $id,
                    'alumno' => $request->input('alumno'),
                    'nombre' => $nombre,
                    'cantidad' => $cantidad,
                    'docente' => $request->input('docente'),
                    'descripcion' => $request->input('descripcion'),
                    'fecha' => $request->input('fecha'),
                    'hora' => $request->input('hora'),
                    'estado' => $pendiente,

                ]);
            }

        }
        // dd($stock);
        return redirect()->route('prestamos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestamo $prestamo)
    {
        // VISUALIZAR PRESTAMO INSTRUMENTO
        return view('prestamos.show',compact('prestamo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamo $prestamo)
    {
        //
        return view('prestamos.edit',compact('prestamo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        //EDITAR PRESTAMO INSTRUMENTO
        // $prestamo->update($request->all());
        $id_prestamo = $request->id;
        $id = $request->id_producto;
        $cantidad = $request->cantidad;
        $estado = $request->estado;
        $producto = Instrumento::where('id',$id)->first();
        $stock = Instrumento::where('id',$id)->pluck('cantidad')->first();
        if($estado == '1'){
            $cantidad_actualizada = $stock + $cantidad;
            $producto->cantidad=$cantidad_actualizada;
            $producto->update();
            $nuevo_estado = 'entregado';
            DB::table('prestamos')
            ->where('id', $id_prestamo)
            ->update([
                'alumno' => $request->input('alumno'),
                'nombre' => $request->input('nombre'),
                'cantidad' => $request->input('cantidad'),
                'docente' => $request->input('docente'),
                'descripcion' => $request->input('descripcion'),
                'fecha' => $request->input('fecha'),
                'hora' => $request->input('hora'),
                'estado' => $nuevo_estado,
            ]);

        }
        if($estado == '0'){
            $cantidad_actualizada = $stock - $cantidad;
            $producto->cantidad=$cantidad_actualizada;
            $producto->update();
            $pendiente = 'pendiente';
            DB::table('prestamos')
            ->where('id',$id_prestamo)
            ->update([
                'alumno' => $request->input('alumno'),
                'nombre' => $request->input('nombre'),
                'cantidad' => $request->input('cantidad'),
                'docente' => $request->input('docente'),
                'descripcion' => $request->input('descripcion'),
                'fecha' => $request->input('fecha'),
                'hora' => $request->input('hora'),
                'estado' => $pendiente,
            ]);
        }
        return redirect()->route('prestamos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamo $prestamo)
    {
        // ELIMINAR PRESTAMO INSTRUMENTO
        $prestamo->delete();
        return redirect()->route('prestamos.index');
    }
}
