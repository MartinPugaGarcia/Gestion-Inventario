@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')

<div class="container">
    <h3>Agregar Reporte de Incidencia</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5 row g-3" action="{{route('reportes.store')}}" method="POST">
        @csrf
        <div class="col-md-12">
            <label for="">Docente</label>
            <input type="text" name="docente" class="form-control bg-light shadow-sm @error('docente') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el nombre del docente..."
            value="{{ old('docente') }}">
        @error('docente')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-12">
            <label for="">Descripción</label>
            <textarea name="descripcion" id="" class="form-control bg-light shadow-sm @error('descripcion') is-invalid @else border-0 @enderror"
            placeholder="Ingresa una breve descripcion del incidente..."
            value="{{ old('descripcion') }}"></textarea>
        @error('descripcion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-12">
            <label for="">Tipo de Incidencia</label>
            <input type="text" name="tipo_incidente" class="form-control bg-light shadow-sm @error('tipo_incidente') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el tipo de incidencia..."
            value="{{ old('tipo_incidente') }}">
        @error('tipo_incidente')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">fecha</label>
            <input type="date" name="fecha" class="form-control bg-light shadow-sm @error('fecha') is-invalid @else border-0 @enderror"
            placeholder="Ingresa la fecha..."
            value="{{ old('fecha') }}">
        @error('fecha')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">hora</label>
            <div class="input-group clockpicker" data-autoclose="true">
            <input type="time" name="hora" class="form-control bg-light shadow-sm @error('hora') is-invalid @else border-0 @enderror"
            placeholder="Ingresa la hora..."
            value="{{ old('hora') }}">
        @error('hora')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <br>
        </div>
        </div>
        
        <div class="form-group">
        <br>
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