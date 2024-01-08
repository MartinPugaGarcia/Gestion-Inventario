<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')
<h3 class="titulo">REACTIVOS</h3>
<div class="d-md-flex justify-content-md-end">
    <form action="{{route('reactivos.index')}}" method="GET">
        <div class="btn-group">
            <input type="text" name="busqueda" class="form-control">
            <input type="submit" value="buscar" class="btn btn-dark">
        </div>
    </form>
</div>

<div>
    <a href="{{ route('reactivos.create') }}" class="btn-sm btn-primary">Agregar</a>
    <a href="{{ route('descargarPDFReactivos') }}" class="btn-sm btn-danger">PDF</a>
    &nbsp;
</div>
<br>
    <table class="table-responsive">
        <thead class="table table-striped table-bordered table-dark">
            <td style="font-weight: bold;">ID</td>
            <td style="font-weight: bold;">NOMBRE</td>
            <td style="font-weight: bold;">INGREDIENTES</td>
            <td style="font-weight: bold;">DESCRIPCION</td>
            <td style="font-weight: bold;">HOJA DE SEGURIDAD</td>
            <td style="font-weight: bold;">CANTIDAD</td>
            <td style="font-weight: bold;">FECHA DE CADUCIDAD</td>
            <td style="font-weight: bold;">OPCIONES</td>
        </thead>
        <tbody class="table table-bordered table-secondary">
            @foreach ($reactivos as $reactivo)
                <tr>
                    <td>{{$reactivo->id}}</td>
                    <td style="font-weight: bold;">{{$reactivo->nombre}}</td>
                    <td>{{$reactivo->ingrediente}}</td>
                    <td>{{$reactivo->descripcion}}</td>
                    <td><form><p><a class="btn btn-dark" href="{{$reactivo->hojas}}"><i class="bi bi-filetype-pdf"></i></a></p></form></td>
                    <!--<td>{{$reactivo->hojas}}</td>-->
                    <!--class="text-justify"-->
                    <td style="text-align: center;">{{$reactivo->cantidad}}</td>
                    <td>{{$reactivo->fecha_caducidad}}</td>
                    <td class="btn btn-group">
                        <form><a class="btn btn-primary" href="{{route('reactivos.show',$reactivo)}}"><i class="bi bi-eye"></i></a></form>
                        <form><a class="btn btn-warning" href="{{route('reactivos.edit',$reactivo)}}"><i class="bi bi-pencil-square"></i></a></form>
                        <form action="{{route('reactivos.destroy', $reactivo)}}" method="POST" class="formEliminar">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit" value="Eliminar"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                 <td colspan="4">{{$reactivos->appends(['busqueda'=>$busqueda])}}</td>
            </tr>
        </tfoot>
    </table>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    (function (){
        'use strict'
        //debemos crear la clase formEliminar dentro del form del boton borrar
        //cada registro a eliminar esta contenido en un form
        var forms = document.querySelectorAll('.formEliminar')
        Array.prototype.slice.call(forms)
        .forEach(function (form){
            form.addEventListener('submit', function (event){
                event.preventDefault()
                event.stopPropagation()
                Swal.fire({
                    title: '¿Confirma eliminar el registro?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#C50000',
                    cancelButtonColor: '#000000',
                    confirmButtonText: 'Confirmar'
                }).then((result) => {
                    if(result.isConfirmed){
                        this.submit();
                        Swal.fire('Eliminado!', 'El registro ha sido eliminado exitosamente.', 
                        'success');
                    }
                })
            }, false)
        })
    })()
</script>

@endsection

<style type="text/css"> td { 
    font-size:12px; 
    padding:10px 5px;
                            } 
</style>

<style type="text/css"> thead { 
    text-align: center;
                            } 
</style>

<style type="text/css"> p { 
    text-align: center;
                            } 
</style>

<style type="text/css"> @font-face {
    font-family: 'TiltNeon-Regular-VariableFont_XROT,YROT.ttf';
    src:url(../resources/fonts/TiltNeon-Regular-VariableFont_XROT,YROT.ttf);
}
</style>

<style type="text/css"> .titulo { 
    font-family: 'TiltNeon-Regular-VariableFont_XROT,YROT.ttf';
                            } 
</style>

