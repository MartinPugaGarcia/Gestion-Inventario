@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')
 
<div class="container">
    <h3>Editar Reactivo</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5 row g-3" action="{{route('reactivos.update',$reactivo)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <label for="">Nombre</label>
            <input type="text" name="nombre" value="{{$reactivo->nombre}}" class="form-control bg-light shadow-sm @error('nombre') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el nombre del reactivo..."
            value="{{ old('nombre') }}">
        @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-12">
            <label for="">Descripción</label>
            <textarea name="descripcion" id="" class="form-control bg-light shadow-sm @error('descripcion') is-invalid @else border-0 @enderror"
            placeholder="Ingresa una breve descripcion del reactivo..."
            value="{{ old('descripcion') }}">{{$reactivo->descripcion}}</textarea>
        @error('descripcion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-12">
            <label for="">Ingredientes</label>
            <textarea name="ingrediente" class="form-control bg-light shadow-sm @error('descripcion') is-invalid @else border-0 @enderror"
            placeholder="Ingresa una breve descripcion de los ingredientes que componen el reactivo..."
            value="{{ old('descripcion') }}">{{$reactivo->ingrediente}}</textarea>
        @error('descripcion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-12">
            <label for="">Hojas</label>
            <input type="file" name="hojas" value="{{$reactivo->hojas}}"  class="form-control-file bg-light shadow-sm @error('hojas') is-invalid @else border-0 @enderror"
            placeholder="Ingresa las hojas de seguridad del reactivo..."
            value="{{ old('hojas') }}">
        @error('hojas')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Cantidad</label>
            <input type="number" name="cantidad" value="{{$reactivo->cantidad}}" class="form-control bg-light shadow-sm @error('cantidad') is-invalid @else border-0 @enderror"
            placeholder="Ingresa la cantidad disponible del reactivo..."
            value="{{ old('cantidad') }}">
        @error('cantidad')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Fecha de caducidad</label>
            <input type="date" name="fecha_caducidad" value="{{$reactivo->fecha_caducidad}}" class="form-control bg-light shadow-sm @error('caducidad') is-invalid @else border-0 @enderror"
            placeholder="Ingresa la fecha de caducidad del reactivo..."
            value="{{ old('caducidad') }}">
        @error('caducidad')
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
    font-weight: bold;
    color: #D9B346;
                            } 
</style>