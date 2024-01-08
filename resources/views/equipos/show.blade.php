@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')
<div class="container">
    <h3>Informacion del Equipo</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5 row g-3">
    <br>
    <!--<div class="col-md-12">
    <label class="form-control bg-light shadow-sm border-0" for="">{{$equipo->id}}</label>
    </div>
    <br>-->
    <div class="col-md-3">
    <label for="">Codigo del equipo</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$equipo->codigo}}</label>
    </div>
    <br>
    <div class="col-md-9">
    <label for="">Nombre del equipo</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$equipo->nombre}}</label>
    </div>
    <br>
    <div class="col-md-12">
    <label for="">Descripcion del equipo</label>
    <textarea class="form-control bg-light shadow-sm border-0" for="">{{$equipo->descripcion}}</textarea>
    </div>
    <br>
    <div class="col-md-4">
    <label for="">Marca del equipo</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$equipo->marca}}</label>
    </div>
    <br>
    <div class="col-md-4">
    <label for="">Cantidad de unidades del equipo</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$equipo->cantidad}}</label>
    </div>
    <br>
    <div class="col-md-4">
    <label for="">Fecha de mantenimiento del equipo</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$equipo->fecha_mantenimiento}}</label>
    </div>
    <br>
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