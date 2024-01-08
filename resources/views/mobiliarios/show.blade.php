@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')

<div class="container">
    <h3>Informacion del Mobiliario</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5 row g-3">
    <br>
    <!--<div class="col-md-12">
    <label class="form-control bg-light shadow-sm border-0" for="">{{$mobiliario->id}}</label>
    </div>
    <br>-->
    <div class="col-md-3">
    <label for="">Codigo del mobiliario</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$mobiliario->codigo}}</label>
    </div>
    <br>
    <div class="col-md-9">
    <label for="">Nombre del mobiliario</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$mobiliario->nombre}}</label>
    </div>
    <br>
    <div class="col-md-12">
    <label for="">Descripcion del mobiliario</label>
    <textarea class="form-control bg-light shadow-sm border-0" for="">{{$mobiliario->descripcion}}</textarea>
    </div>
    <br>
    <div class="col-md-4">
    <label for="">Marca del mobiliario</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$mobiliario->marca}}</label>
    </div>
    <br>
    <div class="col-md-4">
    <label for="">Cantidad de unidades del mobiliario</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$mobiliario->cantidad}}</label>
    </div>
    <br>
    <div class="col-md-4">
    <label for="">Fecha de mantenimiento del mobiliario</label>
    <label class="form-control bg-light shadow-sm border-0" for="">{{$mobiliario->fecha_mantenimiento}}</label>
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
