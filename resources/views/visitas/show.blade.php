@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')

<div class="container">
    <h3>Informacion de la visita</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5 row g-3">
    <!--<br>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$visita->id}}</label>
    <br>-->
    <div class="col-md-6">
    <label for="">Numero de control</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$visita->ncontrol}}</label>
    </div>
    <br>
    <div class="col-md-6">
    <label for="">Nombre del Alumno</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$visita->nombre}}</label>
    </div>
    <br>
    <div class="col-md-12">
    <label for="">Motivo de la visita</label>
    <textarea class="form-control bg-light shadow-sm border-0" for="">{{$visita->motivo}}</textarea>
    </div>
    <br>
    <div class="col-md-12">
    <label for="">Fecha y hora de la visita</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$visita->fecha_hora}}</label>
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