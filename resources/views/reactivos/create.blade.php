@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')
 
<div class="container">
    <h3>Agregar Reactivo</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5 row g-3" action="{{route('reactivos.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <label for="">Nombre</label>
            <input type="text" name="nombre" class="form-control bg-light shadow-sm @error('nombre') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el nombre del Reactivo..."
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
            value="{{ old('descripcion') }}"></textarea>
        @error('descripcion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-12">
            <label for="">Ingredientes</label>
            <textarea name="ingrediente" class="form-control bg-light shadow-sm @error('ingrediente') is-invalid @else border-0 @enderror"
            placeholder="Ingresa los ingredientes que componen al reactivo..."
            value="{{ old('ingrediente') }}"></textarea>
        @error('ingrediente')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-12">
            <label for="">hojas</label>
            <input type="file" name="hojas" class="form-control-file bg-light shadow-sm @error('hojas') is-invalid @else border-0 @enderror"
            placeholder="Ingresa la hoja de seguridad del reactivo..."
            value="{{ old('hojas') }}">
        @error('hojas')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Cantidad</label>
            <input type="text" name="cantidad" class="form-control bg-light shadow-sm @error('cantidad') is-invalid @else border-0 @enderror"
            placeholder="Ingresa la cantidad de reactivo en stock disponible..."
            value="{{ old('cantidad') }}">
        @error('cantidad')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Fecha de caducidad</label>
            <input type="date" name="fecha_caducidad" class="form-control bg-light shadow-sm @error('caducidad') is-invalid @else border-0 @enderror"
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
            <input type="submit" value="GUARDAR" class="btn-sm btn-dark btn-lg btn-block">
        </div>
    </form>
</div>
<br>
<br>
@endsection

<style type="text/css"> label { 
    font-size:12; 
    padding:10px 5px;
    font-weight: bold;
    color: #84C672;
                            } 
</style>