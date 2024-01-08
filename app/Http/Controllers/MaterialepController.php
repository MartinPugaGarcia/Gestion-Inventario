<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Materialep;
use App\Models\Materiale;
use Illuminate\Http\Request;

class MaterialepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $busqueda = $request->busqueda;
        $materialep = Materialep::where('nombre','LIKE','%'.$busqueda.'%')
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
        return view('materialeps.index',compact('materialep','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $materiales = Materiale::all();

        return view('materialeps.create', compact('materiales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $id = $request->nombre;
        $cantidad = $request->cantidad;
        $estado = $request->estado;
        $producto = Materiale::where('id',$id)->first();
        $stock = Materiale::where('id',$id)->pluck('cantidad')->first();
        $nombre = Materiale::where('id',$id)->pluck('nombre')->first();
        if($cantidad<=$stock){
            if($estado=='1'){
                $entregado = 'entregado';
                Materialep::create([
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
                Materialep::create([
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


        return redirect()->route('materialeps.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materialep $materialep)
    {
        //
        return view('materialeps.show',compact('materialep'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materialep $materialep)
    {
        //
        return view('materialeps.edit',compact('materialep'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materialep $materialep)
    {
        //
        $id_materialep = $request->id;
        $id = $request->id_producto;
        $cantidad = $request->cantidad;
        $estado = $request->estado;
        $producto = Materiale::where('id',$id)->first();
        $stock = Materiale::where('id',$id)->pluck('cantidad')->first();
        if($estado == '1'){
            $cantidad_actualizada = $stock + $cantidad;
            $producto->cantidad=$cantidad_actualizada;
            $producto->update();
            $nuevo_estado = 'entregado';
            DB::table('materialeps')
            ->where('id', $id_materialep)
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
            DB::table('materialeps')
            ->where('id', $id_materialep)
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

        


        return redirect()->route('materialeps.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materialep $materialep)
    {
        //
        $materialep->delete();
        return redirect()->route('materialeps.index');
    }
}
