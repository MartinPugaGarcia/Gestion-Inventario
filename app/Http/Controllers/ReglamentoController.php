<?php

namespace App\Http\Controllers;

use App\Models\Reglamento;
use Illuminate\Http\Request;

class ReglamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $busqueda = $request->busqueda;
        $reglamentos = Reglamento::where('nombre','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(2);
        return view('reglamentos.index',compact('reglamentos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('reglamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|string',
            'reglamento' => 'required|file|mimes:pdf',
        ]);
    
        if ($request->hasFile('reglamento')) {
            $pdf = $request->file('reglamento');
            $pdfName = time() . '_' . $pdf->getClientOriginalName();
            //$pdf->storeAs('public', $pdfName);
            $pdf->move(public_path(), $pdfName);
    
            // Guardar los datos en la base de datos
            Reglamento::create([
                'nombre' => $request->input('nombre'),
                'reglamento' => $pdfName, // Guardar el nombre del archivo
            ]);
    
            return redirect()->route('reglamentos.index')->with('success', 'Reglamento creado exitosamente.');
        }
    
        return back()->withInput()->withErrors(['reglamento' => 'No se pudo cargar la imágen.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reglamento $reglamento)
    {
        //
        return view('reglamentos.show',compact('reglamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reglamento $reglamento)
    {
        //
        return view('reglamentos.edit',compact('reglamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $regl = $request->all();

        $reglamento=Reglamento::FindOrFail($id);
        if($request->hasFile('reglamento')){
            unlink($reglamento->reglamento);
            $pdf=$request->file('reglamento');
            $pdfName=time().$pdf->getClientOriginalName();
            $pdf->move(public_path(),$pdfName);
            $regl['reglamento']="$pdfName";
        }

        $reglamento->update($regl);
        return redirect()->route('reglamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $data = Reglamento::FindOrFail($id);
        if(file_exists($data->reglamento) AND !empty($data->reglamento)){
            unlink($data->reglamento);
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
        return redirect()->route('reglamentos.index');
    }
}
