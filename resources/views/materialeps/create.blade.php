@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')
    
<div class="container">
    <h3>Agregar Prestamo de Material</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5 row g-3" action="{{route('materialeps.store')}}" method="POST">
        @csrf
        <div class="col-md-6">
            <label for="">Alumno</label>
            <input type="text" name="alumno" class="form-control bg-light shadow-sm"
            placeholder="Ingresa el nombre del Alumno que solicita el prestamo...">
        </div>
        <div class="col-md-6">
            <label for="">Material Prestado</label>
            <select name="nombre" id="instrumento" class="form-control bg-light shadow-sm">
            <option value="">-- Escoja el material --</option>
                @foreach ($materiales as $materiale)
                    <option value="{{ $materiale['id'] }}" >{{$materiale['nombre']}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="">Cantidad</label>
            <input type="number" name="cantidad" class="form-control bg-light shadow-sm"
            placeholder="Ingresa la cantidad del unidades prestadas...">
        </div>
        <div class="col-md-6">
            <label for="">Docente</label>
            <input type="text" name="docente" class="form-control bg-light shadow-sm"
            placeholder="Ingresa el nombre del docente que autoriza el prestamo...">
        </div>
        <div class="col-md-12">
            <label for="">Descripción</label>
            <textarea type="text" name="descripcion" class="form-control bg-light shadow-sm"
            placeholder="Ingresa una breve descripcion del motivo del prestamo..."></textarea>
        </div>
        <div class="col-md-6">
            <label for="">Fecha</label>
            <input type="date" name="fecha" class="form-control bg-light shadow-sm">
        </div>
        <div class="col-md-6">
            <label for="">Hora</label>
            <div class="input-group clockpicker" data-autoclose="true">
                <input type="time" id="hora" name="hora" class="form-control bg-light shadow-sm" autocomplete="off">
            </div>
        </div>
        
        <div class="col-md-12">
            <label for="">Estado</label>
            <select name="estado" id="estado" class="input-group">
            <option value="">--Escoja el estado</option>
            <option value="1">entregado</option>
            <option value="0">pendiente</option>
            </select>
            <br>
        </div>
        <div>
            <input type="submit" value="GUARDAR" class="btn-sm btn-dark btn-lg btn-block">
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
    color: #84C672;
    } 
</style>