@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')

<div class="container">
    <h3>Agregar Equipo</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5 row g-3" action="{{route('equipos.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <label for="">Nombre</label>
            <input type="text" name="nombre" class="form-control bg-light shadow-sm @error('nombre') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el nombre del equipo..."
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
            placeholder="Ingresa una breve descripcion del equipo..."
            value="{{ old('descripcion') }}"></textarea>
        @error('descripcion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Código</label>
            <input type="text" name="codigo" class="form-control bg-light shadow-sm @error('codigo') is-invalid @else border-0 @enderror"
            placeholder="Ingresa un codigo para el equipo..."
            value="{{ old('codigo') }}">
        @error('codigo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Marca</label>
            <input type="text" name="marca" class="form-control bg-light shadow-sm @error('marca') is-invalid @else border-0 @enderror"
            placeholder="Ingresa la marca del equipo..."
            value="{{ old('marca') }}">
        @error('marca')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-12">
            <label for="">Manual</label>
            <input type="file" name="manual" class="form-control-file bg-light shadow-sm @error('manual') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el manual del equipo..."
            value="{{ old('manual') }}">
        @error('manual')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Cantidad</label>
            <input type="number" name="cantidad" class="form-control bg-light shadow-sm @error('cantidad') is-invalid @else border-0 @enderror"
            placeholder="Ingresa la cantidad en stock del equipo..."
            value="{{ old('cantidad') }}">
        @error('cantidad')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Fecha de mantenimiento</label>
            <input type="date" name="fecha_mantenimiento" class="form-control bg-light shadow-sm @error('mantenimiento') is-invalid @else border-0 @enderror"
            placeholder="Ingresa la fecha de mantenimiento del equipo..."
            value="{{ old('mantenimiento') }}">
        @error('mantenimiento')
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
</form>
@endsection

<style type="text/css"> label { 
    font-size:12; 
    padding:10px 5px;
    font-weight: bold;
    color: #84C672;
                            } 
</style>