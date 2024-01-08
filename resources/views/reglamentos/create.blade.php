@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')
    
<div class="container">
    <h3>Agregar Reglamento</h3>
    <br>
    <form class="bg-white shadow rounded py-3 px-5" action="{{route('reglamentos.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="nombre" class="form-control bg-light shadow-sm @error('nombre') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el nombre del instrumento..."
            value="{{ old('nombre') }}">
        @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="form-group">
            <label for="">Reglamento</label>
            <input type="file" name="reglamento" class="form-control-file bg-light shadow-sm @error('reglamento') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el reglamento general..."
            value="{{ old('reglamento') }}">
        @error('reglamento')
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