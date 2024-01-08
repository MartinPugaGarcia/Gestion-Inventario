@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')
  
<div class="container">
    <h3>Editar Prestamo Instrumento</h3>
    <br>
    <br>
    <form class="bg-white shadow rounded py-3 px-5 row g-3" action="{{route('prestamos.update',$prestamo)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <label for="">Alumno</label>
            <input type="text" name="id" value="{{$prestamo->id}}" class="form-control" hidden>
            <input type="text" name="alumno" value="{{$prestamo->alumno}}" class="form-control bg-light shadow-sm"
            placeholder="Ingresa el nombre del Alumno que solicita el prestamo...">
        </div>
        <div class="col-md-6">
            <label for="">Nombre</label>
            <input type="text" name="" value="{{$prestamo->nombre}}" class="form-control" disabled>
            <input type="text" name="nombre" value="{{$prestamo->nombre}}" class="form-control" hidden>
            <input type="text" name="id_producto" value="{{$prestamo->id_producto}}" class="form-control" hidden>
        </div>
        <div class="col-md-6">
            <label for="">Cantidad</label>
            <input type="text" name="" value="{{$prestamo->cantidad}}" class="form-control" disabled >
            <input type="text" name="cantidad" value="{{$prestamo->cantidad}}" class="form-control" hidden >
        </div>
        <div class="col-md-6">
            <label for="">Docente</label>
            <input type="text" name="docente" value="{{$prestamo->docente}}" class="form-control bg-light shadow-sm"
            placeholder="Ingresa el nombre del docente que autoriza el prestamo...">
        </div>
        <div class="col-md-12">
            <label for="">Descripción</label>
            <input type="text" name="descripcion" value="{{$prestamo->descripcion}}" class="form-control bg-light shadow-sm"
            placeholder="Ingresa una breve descripcion del motivo del prestamo...">
        </div>
        <div class="col-md-6">
            <label for="">Fecha</label>
            <input type="date" name="fecha" value="{{$prestamo->fecha}}"  class="form-control">
        </div>
        <div class="col-md-6">
            <label for="">Hora</label>
            <input type="time" name="hora" value="{{$prestamo->hora}}" class="form-control">
        </div>
        <div class="col-md-12">
            <label for="">Estado del Prestamo</label>
            <select name="estado" id="estado" class="input-group">
            <option value="{{$prestamo->estado}}">--{{$prestamo->estado}}--</option>
            <option value="1">entregado</option>
            <option value="0">pendiente</option>
            </select>
            <br>
        </div>
        <div>
            <input type="submit" value="Guardar cambios..." class="btn-sm btn-dark btn-lg btn-block">
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
    color: #D9B346;
                            } 
</style>