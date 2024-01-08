<?php

namespace App\Http\Controllers;

use App\Models\Procedimiento;
use Illuminate\Http\Request;

class ProcedimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $busqueda = $request->busqueda;
        $procedimientos = Procedimiento::where('nombre','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(2);
        return view('procedimientos.index',compact('procedimientos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('procedimientos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|string',
            'procedimiento' => 'required|file',
        ]);
    
        if ($request->hasFile('procedimiento')) {
            $pdf = $request->file('procedimiento');
            $pdfName = time() . '_' . $pdf->getClientOriginalName();
            //$pdf->storeAs('public', $pdfName);
            $pdf->move(public_path(), $pdfName);
    
            // Guardar los datos en la base de datos
            Procedimiento::create([
                'nombre' => $request->input('nombre'),
                'procedimiento' => $pdfName, // Guardar el nombre del archivo
            ]);
    
            return redirect()->route('procedimientos.index')->with('success', 'Procedimiento creado exitosamente.');
        }
    
        return back()->withInput()->withErrors(['procedimiento' => 'No se pudo cargar la imágen.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Procedimiento $procedimiento)
    {
        //
        return view('procedimientos.show',compact('procedimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Procedimiento $procedimiento)
    {
        //
        return view('procedimientos.edit',compact('procedimiento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $proc = $request->all();

        $procedimiento=Procedimiento::FindOrFail($id);
        if($request->hasFile('procedimiento')){
            unlink($procedimiento->procedimiento);
            $pdf=$request->file('procedimiento');
            $pdfName=time().$pdf->getClientOriginalName();
            $pdf->move(public_path(),$pdfName);
            $proc['procedimiento']="$pdfName";
        }

        $procedimiento->update($proc);
        return redirect()->route('procedimientos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $data = Procedimiento::FindOrFail($id);
        if(file_exists($data->procedimiento) AND !empty($data->procedimiento)){
            unlink($data->procedimiento);
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
        return redirect()->route('procedimientos.index');
    }
}
