@extends('layouts.plantilla')
@extends('layouts.app')
@section('contenido')
    
<div class="container">
    <h3>Agregar Visita</h3>
    <br>
    <form class="bg-white shadow rounded py-3 px-5" action="{{route('visitas.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Numero de control</label>
            <input type="text" name="ncontrol" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Nombre completo</label>
            <input type="text" name="nombre" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Motivo de visita</label>
            <input type="text" name="motivo" class="form-control">
        </div>
        <br>
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
    font-weight: bold
                            } 
</style>
