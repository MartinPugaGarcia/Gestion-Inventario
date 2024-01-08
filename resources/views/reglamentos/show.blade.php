@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')

<div class="container">
    <h3>Informacion del Reglamento</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5">
    <!--<label class="form-control" for="">{{$reglamento->id}}</label>-->
    <label for="">Nombre del Reglamento</label>
    <label class="form-control bg-light shadow-sm border-0"for="">{{$reglamento->nombre}}</label>
    <br>
    <label for="">Reglamento (archivo pdf)</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$reglamento->reglamento}}</label>
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