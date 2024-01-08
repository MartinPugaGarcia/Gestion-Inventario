<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{

    public function index(Request $request)
    {
        //
        $busqueda = $request->busqueda;
        $proveedores = Proveedor::where('nombre','LIKE','%'.$busqueda.'%')
                    ->orWhere('empresa','LIKE','%'.$busqueda.'%')
                    ->orWhere('descripcion','LIKE','%'.$busqueda.'%')
                    ->orWhere('telefono','LIKE','%'.$busqueda.'%')
                    ->orWhere('correo','LIKE','%'.$busqueda.'%')
                    ->orWhere('localizacion','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(2);
        return view('proveedores.index',compact('proveedores','busqueda'));
    }


    public function create()
    {
        //
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|string',
            'empresa' => 'required|string',
            'descripcion' => 'required|string',
            'catalogo' => 'required|file|mimes:pdf',
            'telefono' => 'required|string',
            'correo' => 'required|string',
            'localizacion' => 'required|string',
        ]);
    
        if ($request->hasFile('catalogo')) {
            $pdf = $request->file('catalogo');
            $pdfName = time() . '_' . $pdf->getClientOriginalName();
            //$pdf->storeAs('public', $pdfName);
            $pdf->move(public_path(), $pdfName);
    
            // Guardar los datos en la base de datos
            Proveedor::create([
                'nombre' => $request->input('nombre'),
                'empresa' => $request->input('empresa'),
                'descripcion' => $request->input('descripcion'),
                'catalogo' => $pdfName, // Guardar el nombre del archivo
                'telefono' => $request->input('telefono'),
                'correo' => $request->input('correo'),
                'localizacion' => $request->input('localizacion'),
            ]);
    
            return redirect()->route('proveedores.index')->with('success', 'Reactivo creado exitosamente.');
        }
    
        return back()->withInput()->withErrors(['catalogo' => 'No se pudo cargar el archivo PDF.']);
    }


    public function show(Proveedor $proveedore)
    {
        //
        return view('proveedores.show',compact('proveedore'));
    }


    public function edit(Proveedor $proveedore)
    {
        //
        return view('proveedores.edit',compact('proveedore'));
    }


    public function update(Request $request, $id)
    {
        //
        $proveedore= $request->all();
        $prov=Proveedor::FindOrFail($id);
        if($request->hasFile('catalogo')){
            unlink($prov->catalogo);
            $pdf=$request->file('catalogo');
            $pdfName=time().$pdf->getClientOriginalName();
            $pdf->move(public_path(),$pdfName);
            $proveedore['catalogo']="$pdfName";
        }

        $prov->update($proveedore);
        return redirect()->route('proveedores.index');
    }


    public function destroy($id)
    {
        //
        $data = Proveedor::FindOrFail($id);
        if(file_exists($data->catalogo) AND !empty($data->catalogo)){
            unlink($data->catalogo);
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
        return redirect()->route('proveedores.index');
    }
}
