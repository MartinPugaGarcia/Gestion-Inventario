@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')
 
<div class="container">
    <h3>Editar Visita</h3>
    <br>
    <form class="bg-white shadow rounded py-3 px-5" action="{{route('visitas.update',$visita)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Número de control</label>
            <input type="text" name="ncontrol" value="{{$visita->ncontrol}}" class="form-control bg-light shadow-sm @error('numero_control') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el numero de control..."
            value="{{ old('numero_control') }}">
        @error('numero_control')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="form-group">
            <label for="">Nombre completo</label>
            <input type="text" name="nombre" value="{{$visita->nombre}}" class="form-control bg-light shadow-sm @error('nombre') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el nombre completo del visitante..."
            value="{{ old('nombre') }}">
        @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="form-group">
            <label for="">Motivo de visita</label>
            <input type="text" name="motivo" value="{{$visita->motivo}}" class="form-control bg-light shadow-sm @error('motivo') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el motivo de la visita..."
            value="{{ old('motivo') }}">
        @error('motivo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="form-group">
            <label for="">Fecha y hora</label>
            <input type="datetime" name="fecha_hora" value="{{$visita->fecha_hora}}" class="form-control-file bg-light shadow-sm @error('fecha_hora') is-invalid @else border-0 @enderror"
            placeholder="Ingresa la fecha y hora..."
            value="{{ old('fecha_hora') }}">
        @error('fecha_hora')
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
<br>
<br>
@endsection

<style type="text/css"> label { 
    font-size:12; 
    padding:10px 5px;
    font-weight: bold
                            } 
</style>