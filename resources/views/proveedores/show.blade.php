@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')
<div class="container">
    <h3>Informacion del Proveedor</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5 row g-3">
    <!--<div class="col-md-12">
    <label class="form-control bg-light shadow-sm border-0" for="">{{$proveedore->id}}</label>
    </div>
    <br>-->
    <div class="col-md-6">
    <label for="">Nombre del Proveedor</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$proveedore->nombre}}</label>
    </div>
    <br>
    <div class="col-md-6">
    <label for="">Nombre de la empresa o marca</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$proveedore->empresa}}</label>
    </div>
    <br>
    <div class="col-md-12">
    <label for="">Descripcion de los productos y servicios que ofrece el proveedor</label>
    <textarea class="form-control bg-light shadow-sm border-0" for="">{{$proveedore->descripcion}}</textarea>
    </div>
    <br>
    <div class="col-md-12">
    <label for="">Catalogo de productos (Archivo pdf)</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$proveedore->catalogo}}</label>
    </div>
    <br>
    <div class="col-md-6">
    <label for="">Numero de telefono de contacto del proveedor</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$proveedore->telefono}}</label>
    </div>
    <br>
    <div class="col-md-6">
    <label for="">Correo electronico de contacto del proveedor</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$proveedore->correo}}</label>
    </div>
    <br>
    <div class="col-md-12">
    <label for="">Localizacion de sucursal mas cercana</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$proveedore->localizacion}}</label>
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
    color: #395791;
    } 
</style>