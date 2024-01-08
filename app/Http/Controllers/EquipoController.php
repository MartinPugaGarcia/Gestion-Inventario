<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $busqueda = $request->busqueda;
        $equipos = Equipo::where('nombre','LIKE','%'.$busqueda.'%')
                    ->orWhere('codigo','LIKE','%'.$busqueda.'%')
                    ->orWhere('descripcion','LIKE','%'.$busqueda.'%')
                    ->orWhere('marca','LIKE','%'.$busqueda.'%')
                    ->orWhere('cantidad','LIKE','%'.$busqueda.'%')
                    ->orWhere('fecha_mantenimiento','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(2);
        return view('equipos.index',compact('equipos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|string',
            'codigo' => 'required|string',
            'descripcion' => 'required|string',
            'marca' => 'required|string',
            'manual' => 'required|file|mimes:pdf',
            'cantidad' => 'required|integer',
            'fecha_mantenimiento' => 'required|date',
        ]);
    
        if ($request->hasFile('manual')) {
            $pdf = $request->file('manual');
            $pdfName = time() . '_' . $pdf->getClientOriginalName();
            //$pdf->storeAs('public', $pdfName);
            $pdf->move(public_path(), $pdfName);
    
            // Guardar los datos en la base de datos
            Equipo::create([
                'nombre' => $request->input('nombre'),
                'codigo' => $request->input('codigo'),
                'descripcion' => $request->input('descripcion'),
                'marca' =>  $request->input('marca'),// Guardar el nombre del archivo
                'manual' => $pdfName,
                'cantidad' => $request->input('cantidad'),
                'fecha_mantenimiento' => $request->input('fecha_mantenimiento'),
            ]);
    
            return redirect()->route('equipos.index')->with('success', 'Equipo creado exitosamente.');
        }
    
        return back()->withInput()->withErrors(['manual' => 'No se pudo cargar el archivo PDF.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipo $equipo)
    {
        //
        return view('equipos.show',compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo)
    {
        //
        return view('equipos.edit',compact('equipo'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $equipo = $request->all();
        $equi=Equipo::FindOrFail($id);
        if($request->hasFile('manual')){
            unlink($equi->manual);
            $pdf=$request->file('manual');
            $pdfName=time().$pdf->getClientOriginalName();
            $pdf->move(public_path(),$pdfName);
            $equipo['manual']="$pdfName";
        }

        $equi->update($equipo);
        return redirect()->route('equipos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy($id)
    {
        //
        $data = Equipo::FindOrFail($id);
        if(file_exists($data->manual) AND !empty($data->manual)){
            unlink($data->manual);
        }
        try{
            $data->delete();
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }
        if($bug==0){
            echo "success";
        }else{
            echo "error";
        }
        return redirect()->route('equipos.index');
    }
}
