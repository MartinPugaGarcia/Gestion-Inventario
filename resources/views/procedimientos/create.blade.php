@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')
 
<div class="container">
    <h3>Agregar Procedimiento</h3>
    <br>
    <form class="bg-white shadow rounded py-3 px-5" action="{{route('procedimientos.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="nombre" class="form-control bg-light shadow-sm @error('nombre') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el nombre del instrumento..."
            value="{{ old('nombre') }}"></input>
        @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
        
        <div class="form-group">
            <label for="">Procedimiento</label>
            <input type="file" name="procedimiento" class="form-control-file bg-light shadow-sm @error('procedimiento') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el procedimiento..."
            value="{{ old('procedimiento') }}"></input>
        @error('procedimiento')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
        <br>
        <div>
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
    font-weight: bold
                            } 
</style>