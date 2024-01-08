@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')
 
<div class="container">
    <h3>Editar Instrumento</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5 row g-3" action="{{route('instrumentos.update',$instrumento)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <label for="">Nombre</label>
            <input type="text" name="nombre" value="{{$instrumento->nombre}}" class="form-control bg-light shadow-sm @error('nombre') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el nombre del instrumento..."
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
            placeholder="Ingresa una breve descripcion del instrumento..."
            value="{{ old('descripcion') }}">{{$instrumento->descripcion}}</textarea>
        @error('descripcion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Código</label>
            <input type="text" name="codigo" value="{{$instrumento->codigo}}" class="form-control bg-light shadow-sm @error('codigo') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el codigo del instrumento..."
            value="{{ old('codigo') }}">
        @error('codigo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Marca</label>
            <input type="text" name="marca" value="{{$instrumento->marca}}" class="form-control bg-light shadow-sm @error('marca') is-invalid @else border-0 @enderror"
            placeholder="Ingresa la marca del instrumento..."
            value="{{ old('marca') }}">
        @error('marca')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Cantidad</label>
            <input type="number" name="cantidad" value="{{$instrumento->cantidad}}" class="form-control bg-light shadow-sm @error('cantidad') is-invalid @else border-0 @enderror"
            placeholder="Ingresa la cantidad en stock disponible del instrumento..."
            value="{{ old('cantidad') }}">
        @error('cantidad')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
         
        <div class="col-md-6">
            <label for="">Fecha de mantenimiento</label>
            <input type="date" name="fecha_mantenimiento" value="{{$instrumento->fecha_mantenimiento}}" class="form-control bg-light shadow-sm @error('mantenimiento') is-invalid @else border-0 @enderror"
            placeholder="Ingresa la fecha de mantenimiento del instrumento..."
            value="{{ old('mantenimiento') }}">
        @error('mantenimiento')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="form-group">
            <input type="submit" value="Guardar cambios..." class="btn-sm btn-dark btn-lg btn-block">
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
    color: #D9B346;
                            } 
</style>