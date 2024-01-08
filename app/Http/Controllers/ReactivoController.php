<?php

namespace App\Http\Controllers;

use App\Models\Reactivo;
use Illuminate\Http\Request;
use DB;

class ReactivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $busqueda = $request->busqueda;
        $reactivos = Reactivo::where('nombre','LIKE','%'.$busqueda.'%')
                    ->orWhere('ingrediente','LIKE','%'.$busqueda.'%')
                    ->orWhere('descripcion','LIKE','%'.$busqueda.'%')
                    ->orWhere('hojas','LIKE','%'.$busqueda.'%')
                    ->orWhere('cantidad','LIKE','%'.$busqueda.'%')
                    ->orWhere('fecha_caducidad','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(2);
        return view('reactivos.index',compact('reactivos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('reactivos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //$reactivo = Reactivo::create($request->all());
        //return redirect()->route('reactivos.index');
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'ingrediente' => 'required|string',
            'hojas' => 'required|file|mimes:pdf',
            'cantidad' => 'required|integer',
            'fecha_caducidad' => 'required|date',
        ]);
    
        if ($request->hasFile('hojas')) {
            $pdf = $request->file('hojas');
            $pdfName = time() . '_' . $pdf->getClientOriginalName();
            //$pdf->storeAs('public', $pdfName);
            $pdf->move(public_path(), $pdfName);
    
            // Guardar los datos en la base de datos
            Reactivo::create([
                'nombre' => $request->input('nombre'),
                'descripcion' => $request->input('descripcion'),
                'ingrediente' => $request->input('ingrediente'),
                'hojas' => $pdfName, // Guardar el nombre del archivo
                'cantidad' => $request->input('cantidad'),
                'fecha_caducidad' => $request->input('fecha_caducidad'),
            ]);
    
            return redirect()->route('reactivos.index')->with('success', 'Reactivo creado exitosamente.');
        }
    
        return back()->withInput()->withErrors(['hojas' => 'No se pudo cargar el archivo PDF.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reactivo $reactivo)
    {
        //
        return view('reactivos.show',compact('reactivo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reactivo $reactivo)
    {
        //
        return view('reactivos.edit',compact('reactivo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    //public function update(Request $request, Reactivo $reactivo)
    {
        //$reactivo->update($request->all());
        //return redirect()->route('reactivos.index');

        $prod = $request->all();

        $reactivo=Reactivo::FindOrFail($id);
        if($request->hasFile('hojas')){
            unlink($reactivo->hojas);
            $pdf=$request->file('hojas');
            $pdfName=time().$pdf->getClientOriginalName();
            $pdf->move(public_path(),$pdfName);
            $prod['hojas']="$pdfName";
        }

        $reactivo->update($prod);
        return redirect()->route('reactivos.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    //public function destroy(Reactivo $reactivo)
    {
        //$reactivo->delete();
        //return redirect()->route('reactivos.index');
        $data = Reactivo::FindOrFail($id);
        if(file_exists($data->hojas) AND !empty($data->hojas)){
            unlink($data->hojas);
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
        return redirect()->route('reactivos.index');
    }
}
