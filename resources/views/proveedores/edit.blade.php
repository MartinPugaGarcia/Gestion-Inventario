@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')

<div class="container">
    <h3>Editar Proveedor</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5 row g-3" action="{{route('proveedores.update',$proveedore)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <label for="">Nombre</label>
            <input type="text" name="nombre" value="{{$proveedore->nombre}}" class="form-control bg-light shadow-sm @error('nombre') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el nombre del proveedor..."
            value="{{ old('nombre') }}">
        @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Empresa</label>
            <input type="text" name="empresa" value="{{$proveedore->empresa}}" class="form-control bg-light shadow-sm @error('empresa') is-invalid @else border-0 @enderror"
            placeholder="Ingresa el nombre de la empresa o marca..."
            value="{{ old('empresa') }}">
        @error('empresa')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-12">
            <label for="">Descripción</label>
            <textarea name="descripcion" id="" class="form-control-file bg-light shadow-sm @error('descripcion') is-invalid @else border-0 @enderror"
            placeholder="Ingresa una breve descripcion de los productos y servicios ofrecidos..."
            value="{{ old('descripcion') }}">{{$proveedore->descripcion}}</textarea>
        @error('descripcion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-12">
            <label for="">Catálogo de Productos</label>
            <input type="file" name="catalogo" value="{{$proveedore->catalogo}}" class="form-control-file bg-light shadow-sm @error('descripcion') is-invalid @else border-0 @enderror"
            value="{{ old('catalogo') }}">
            @error('catalogo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Teléfono</label>
            <input type="text" name="telefono" value="{{$proveedore->telefono}}"  class="form-control bg-light shadow-sm @error('telefono') is-invalid @else border-0 @enderror"
            placeholder="Ingresa numero telefonico de contacto..."
            value="{{ old('telefono') }}">
            @error('telefono')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="">Correo</label>
            <input type="text" name="correo" value="{{$proveedore->correo}}" class="form-control bg-light shadow-sm @error('correo') is-invalid @else border-0 @enderror"
            placeholder="Ingresa Correo electronico de contacto..."
            value="{{ old('correo') }}">
            @error('correo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="col-md-12">
            <label for="">Localización</label>
            <input type="text" name="localizacion" value="{{$proveedore->localizacion}}" class="form-control bg-light shadow-sm @error('localizacion') is-invalid @else border-0 @enderror"
            placeholder="Ingresa Domicilio de sucursal..."
            value="{{ old('localizacion') }}">
            @error('localizacion')
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
