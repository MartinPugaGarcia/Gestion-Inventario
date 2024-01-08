<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')
<h3 class="titulo">MATERIALES</h3>
<div class="d-md-flex justify-content-md-end">
    <form action="{{route('materiales.index')}}" method="GET">
        <div class="btn-group">
            <input type="text" name="busqueda" class="form-control">
            <input type="submit" value="Buscar" class="btn btn-dark">
        </div>
    </form>
</div>

<div>
    <a href="{{ route('materiales.create') }}" class="btn-sm btn-primary">Agregar</a>
    <a href="{{ route('descargarPDFMateriales') }}" class="btn-sm btn-danger">PDF</a>
    &nbsp;
</div>
<br>
    <table class="table-responsive">
    <thead class="table table-striped table-bordered table-dark">
        <!--<thead class="table table-striped table-bordered">-->
            <td style="font-weight: bold;">ID</td>
            <td style="font-weight: bold;">CODIGO</td>
            <td style="font-weight: bold;">NOMBRE</td>
            <td style="font-weight: bold;">DESCRIPCION</td>
            <td style="font-weight: bold;">MARCA/MODELO</td>
            <td style="font-weight: bold;">CANTIDAD</td>
            <td style="font-weight: bold;">FECHA DE MANTENIMIENTO</td>
            <td style="font-weight: bold;">OPCIONES</td>
        </thead>
        <tbody class="table table-bordered table-secondary">
        <!--<tbody class="table table-bordered">-->
            @foreach ($materiales as $materiale)
                <tr>
                    <td>{{$materiale->id}}</td>
                    <td>{{$materiale->codigo}}</td>
                    <td style="font-weight: bold;">{{$materiale->nombre}}</td>
                    <td>{{$materiale->descripcion}}</td>
                    <td>{{$materiale->marca}}</td>
                    <td style="text-align: center;">{{$materiale->cantidad}}</td>
                    <td>{{$materiale->fecha_mantenimiento}}</td>
                    <td class="btn btn-group">
                        <form><a class="btn btn-primary" href="{{route('materiales.show',$materiale)}}"><i class="bi bi-eye"></i></a></form>
                        <form><a class="btn btn-warning" href="{{route('materiales.edit',$materiale)}}"><i class="bi bi-pencil-square"></i></a></form>
                        <form action="{{route('materiales.destroy', $materiale)}}" method="POST" class="formEliminar">
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
                 <td colspan="4">{{$materiales->appends(['busqueda'=>$busqueda])}}</td>
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

<style type="text/css"> @font-face {
    font-family: 'TiltNeon-Regular-VariableFont_XROT,YROT.ttf';
    src:url(../resources/fonts/TiltNeon-Regular-VariableFont_XROT,YROT.ttf);
}
</style>

<style type="text/css"> .titulo { 
    font-family: 'TiltNeon-Regular-VariableFont_XROT,YROT.ttf';
                            } 
</style>