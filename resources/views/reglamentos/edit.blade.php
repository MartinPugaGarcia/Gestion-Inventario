@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')
 
<div class="container">
    <h3>Editar Reglamento</h3>
    <br>
    <form class="bg-white shadow rounded py-3 px-5" action="{{route('reglamentos.update',$reglamento)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="nombre" value="{{$reglamento->nombre}}" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="">Reglamento</label>
            <input type="file" name="reglamento" value="{{$reglamento->reglamento}}" class="form-control-file">
        </div>
        <br>
        <div>
            <input type="submit" value="Guardar cambios..." class="btn-sm btn-dark btn-lg btn-block">
        </div>
    </form>
</div>
@endsection

<style type="text/css"> label { 
    font-size:12; 
    padding:10px 5px;
    font-weight: bold
                            } 
</style>