<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF VISITAS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <header>
        <p class="text-center">LISTA DE VISITAS</p>
    </header>
    <div class="container">
        <!--<h4 class="text-center">TABLA DE visitaES</h4>-->
        <p class="text-center"><img src="{{asset('../resources/img/itsn.jpg')}}" width="40" height="60">
        <img src="{{asset('../resources/img/IAS.jpg')}}" width="80" height="80"></p>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NÚMERO DE CONTROL</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">MOTIVO VISITA</th>
                    <th scope="col">FECHA/HORA</th>
                </tr>
            </thead>
            <tbody>
                @foreach($visitas as $visita)
                <tr>
                    <th scope="row">{{ $visita->ncontrol }}</th>
                    <th scope="row">{{ $visita->nombre }}</th>
                    <th scope="row">{{ $visita->motivo }}</th>
                    <th scope="row">{{ $visita->fecha_hora }}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <footer>
        <p>Instituto Tecnologico Superior de Nochistlan</p>
    </footer>
</body>
</html>


<style type="text/css"> th { 
    font-size:10px; 
    padding:10px 5px;
                            } 
</style>

<style type="text/css"> @page { 
    margin: 0cm 0cm 0cm 0cm;
    font-size: 1em;
                            } 
</style>

<style type="text/css"> body { 
    margin: 3cm 2cm 2cm;
                            } 
</style>

<style type="text/css"> header { 
    position: fixed;
    top: 0cm;
    left: 0cm;
    right: 0cm;
    height: 1.5cm;
    font-size: 12px;
    background-color: #C7535C;
    color: white;
    text-align: center;
    line-height: 30px;
                            } 
</style>

<style type="text/css"> footer { 
    position: fixed;
    bottom: 0cm;
    left: 0cm;
    right: 0cm;
    height: 1.5cm;
    font-size: 10px;
    background-color: #CECECE;
    color: black;
    text-align: center;
    line-height: 35px;
                            } 
</style>

<style type="text/css"> img { 
    margin: 0cm 2.5cm;
                            } 
</style>
