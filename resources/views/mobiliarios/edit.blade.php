@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')

<div class="container">
    <h3>Editar Mobiliario</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5 row g-3" action="{{route('mobiliarios.update',$mobiliario)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <label for="">Nombre</label>
            <input type="text" name="nombre" value="{{$mobiliario->nombre}}" class="form-control bg-light shadow-sm @error('nombre') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el nombre del mobiliario..."
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
            placeholder="Ingresa una breve descripcion del mobiliario..."
            value="{{ old('descripcion') }}">{{$mobiliario->descripcion}}</textarea>
        @error('descripcion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Código</label>
            <input type="text" name="codigo" value="{{$mobiliario->codigo}}" class="form-control bg-light shadow-sm @error('codigo') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el codigo del mobiliario..."
            value="{{ old('codigo') }}">
        @error('codigo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Marca</label>
            <input type="text" name="marca" value="{{$mobiliario->marca}}" class="form-control bg-light shadow-sm @error('marca') is-invalid @else border-0 @enderror"
            placeholder="Ingresa la marca del mobiliario..."
            value="{{ old('marca') }}">
        @error('marca')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Cantidad</label>
            <input type="number" name="cantidad" value="{{$mobiliario->cantidad}}" class="form-control bg-light shadow-sm @error('cantidad') is-invalid @else border-0 @enderror"
            placeholder="Ingresa la cantidad del mobiliario..."
            value="{{ old('cantidad') }}">
        @error('cantidad')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Fecha de mantenimiento</label>
            <input type="date" name="fecha_mantenimiento" value="{{$mobiliario->fecha_mantenimiento}}" class="form-control bg-light shadow-sm @error('mantenimiento') is-invalid @else border-0 @enderror"
            placeholder="Ingresa la fecha de mantenimiento del mobiliario..."
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
@endsection

<style type="text/css"> label { 
    font-size:12; 
    padding:10px 5px;
    font-weight: bold;
    color: #D9B346;
                            } 
</style>