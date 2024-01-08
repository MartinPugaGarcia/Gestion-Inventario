@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')
<div class="container">
    <h3>Informacion del Prestamo Material</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5 row g-3">
    <br>
    <!--<div class="col-md-12">
    <label class="form-control" for="">{{$materialep->id}}</label>
    </div>
    <br>-->
    <div class="col-md-6">
    <label for="">Nombre del alumno que solicito el prestamo</label>
    <label class="form-control" for="">{{$materialep->alumno}}</label>
    </div>
    <br>
    <div class="col-md-6">
    <label for="">Material prestado</label>
    <label class="form-control"for="">{{$materialep->nombre}}</label>
    </div>
    <br>
    <div class="col-md-3">
    <label for="">Cantidad de unidades prestadas</label>
    <label class="form-control"for="">{{$materialep->cantidad}}</label>
    </div>
    <br>
    <div class="col-md-9">
    <label for="">Docente que autorizo el prestamo</label>
    <label class="form-control"for="">{{$materialep->docente}}</label>
    </div>
    <br>
    <div class="col-md-12">
    <label for="">Descripcion del prestamo</label>
    <textarea class="form-control"for="">{{$materialep->descripcion}}</textarea>
    </div>
    <br>
    <div class="col-md-6">
    <label for="">Fecha del prestamo</label>
    <label class="form-control"for="">{{$materialep->fecha}}</label>
    </div>
    <br>
    <div class="col-md-6">
    <label for="">Hora de la realizacion del prestamo</label>
    <label class="form-control"for="">{{$materialep->hora}}</label>
    </div>
    <br>
    <div class="col-md-12">
    <label for="">Estado de Entrega</label>
    <label class="form-control"for="">{{$materialep->estado}}</label>
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