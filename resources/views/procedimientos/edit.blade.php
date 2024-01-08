@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')
 
<div class="container">
    <h3>Editar Procedimiento</h3>
    <br>
    <form class="bg-white shadow rounded py-3 px-5" action="{{route('procedimientos.update',$procedimiento)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="nombre" value="{{$procedimiento->nombre}}" class="form-control bg-light shadow-sm @error('nombre') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el nombre del instrumento..."
            value="{{ old('nombre') }}">
        @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="form-group">
            <label for="">Procedimiento</label>
            <input type="file" name="procedimiento" value="{{$procedimiento->procedimiento}}"  class="form-control-file bg-light shadow-sm @error('procedimiento') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el procedimiento..."
            value="{{ old('procedimiento') }}">
        @error('procedimiento')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
        <br>
        <div class="form-group">
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