@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')

<div class="container">
    <h3>Informacion del procedimiento</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5">
    <label for="">Nombre del Procedimiento</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$procedimiento->nombre}}</label>
    <br>
    <label for="">Procedimiento (Archivo pdf)</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$procedimiento->procedimiento}}</label>
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