@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')

<div class="container">
    <h3>Informacion del Reactivo</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5 row g-3">
    <br>
    <!--<div class="col-md-12">
    <label class="form-control bg-light shadow-sm border-0" for="">{{$reactivo->id}}</label>
    </div>
    <br>-->
    <div class="col-md-12">
    <label for="">Ingredientes del Reactivo (componentes)</label>
    <textarea class="form-control bg-light shadow-sm border-0" for="">{{$reactivo->ingrediente}}</textarea>
    </div>
    <br>
    <div class="col-md-12">
    <label for="">Nombre del reactivo</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$reactivo->nombre}}</label>
    </div>
    <br>
    <div class="col-md-12">
    <label for="">Descripcion del uso del reactivo</label>
    <textarea class="form-control bg-light shadow-sm border-0" for="">{{$reactivo->descripcion}}</textarea>
    </div>
    <br>
    <div class="col-md-12">
    <label for="">Hoja de seguridad (Archivo pdf)</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$reactivo->hojas}}</label>
    </div>
    <br>
    <div class="col-md-6">
    <label for="">Cantidad de unidades del Reactivo</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$reactivo->cantidad}}</label>
    </div>
    <br>
    <div class="col-md-6">
    <label for="">Fecha de caducidad del reactivo</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$reactivo->fecha_caducidad}}</label>
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