@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')

<div class="container">
    <h3>Informacion del Reporte</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5 row g-3">
    <br>
    <!--<div class="col-md-12">
    <label class="form-control bg-light shadow-sm border-0" for="">{{$reporte->id}}</label>
    </div>
    <br>-->
    <div class="col-md-12">
    <label for="">Docente</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$reporte->docente}}</label>
    </div>
    <br>
    <div class="col-md-12">
    <label for="">Descripcion</label>
    <textarea class="form-control bg-light shadow-sm border-0" for="">{{$reporte->descripcion}}</textarea>
    </div>
    <br>
    <div class="col-md-12">
    <label for="">Tipo de Incidencia</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$reporte->tipo_incidente}}</label>
    </div>
    <br>
    <div class="col-md-6">
    <label for="">Fecha</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$reporte->fecha}}</label>
    </div>
    <br>
    <div class="col-md-6">
    <label for="">Hora</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$reporte->hora}}</label>
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