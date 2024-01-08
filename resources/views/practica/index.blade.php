<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

@extends('layouts.app')
@section('content')
<div class="row" style="margin:5px; ">

<div class="col-10">

    <div class="div-1" id="inventario" style="padding: 5px; border-radius: 4px; box-shadow: 1px 2px 2px 2px rgba(0,0,0,0.1);" ></div>
</div>

<div class="col-2">
    <div class="div-1" id="external-events" style="margin-bottom: 1em; height: 350px; overflow: auto; padding: 1em; border-radius: 4px; box-shadow: 0px 2px 2px 2px rgba(0,0,0,0.2);">
        <h4 class="text-center" style="border-bottom:solid 2px #eee;"><b>Mis Prácticas</b></h4>
        <div class="form-group" id="listaeventospredefinidos">
        @foreach ($practicas as $practica)
          <tr>
            <!--style="background-color: rgb(240, 240, 240); border-radius: 5px;"-->
            <td><b>{{$practica->title}}</b></td>
            <td>{{$practica->start}}</td>
            <td>{{$practica->horainicio}}</td>
            <br>
            <br>
          </tr>
        @endforeach
    </div>  
  </div>
  <a href="{{ route('descargarPDFPracticas') }}" class="btn btn-danger">IMPRIMIR PDF</a>
</div>



<!-- Modal -->
<div class="modal fade" id="practica" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos de la Práctica</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form action="" id="formularioPracticas">

        {!! csrf_field() !!}

        <div class="form-group d-none">
          <label for="id">ID</label>
          <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
        </div>

        <div class="form-group d-none">
          <label for="idusuario">ID usuario</label>
          <input type="text" class="form-control" name="idusuario" id="idusuario" aria-describedby="helpId" placeholder="" value="{{ Auth::user()->id }}">
        </div>
        

         <div class="form-group">
           <label for="title">Nombre</label>
           <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el nombre de la practica">
         </div>
        
         <div class="form-group">
           <label for="descripcion">Descripcion</label>
           <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="descripción de la práctica"></textarea>
         </div>

         <div class="form-group">
           <label for="aula">Aula</label>
           <input type="text" class="form-control" name="aula" id="aula" aria-describedby="helpId" placeholder="Aula">
         </div>

         <div class="form-group">
           <label for="cantidadal">Cantidad alumnos</label>
           <input type="text" class="form-control" name="cantidadal" id="cantidadal" aria-describedby="helpId" placeholder="cantidad alumnos">
         </div>

         <div class="form-group">
           <label for="grupo">Grupo</label>
           <input type="text" class="form-control" name="grupo" id="grupo" aria-describedby="helpId" placeholder="Grupo">
         </div>

         <div class="form-group">
           <label for="docente">Docente</label>
           <input type="text" class="form-control" name="docente" id="docente" aria-describedby="helpId" placeholder="nombre del docente">
         </div>

        <div class="form-group">
          <label for="start">Fecha</label>
          <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
        </div>



        <div class="form-group" id="horainicio">
            <label for="horainicio">Hora de inicio:</label>
            <div class="input-group clockpicker" data-autoclose="true">
                <input type="text" id="horainicio" name="horainicio" class="form-control" autocomplete="off">
            </div>
        </div>

        <div class="form-group" id="horaterminacion">
            <label for="horaterminacion">Hora de terminación:</label>
            <div class="input-group clockpicker" data-autoclose="true">
                <input type="text" id="horaterminacion" name="horaterminacion" class="form-control" autocomplete="off">
            </div>
        </div>


        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        </form>

      </div>
      <div class="modal-footer">

      <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
      <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
      <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@endsection

<style type="text/css"> .div-1 { 
    background-color: white;
                            } 
</style>
