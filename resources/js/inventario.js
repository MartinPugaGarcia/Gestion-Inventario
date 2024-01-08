
document.addEventListener('DOMContentLoaded', function() {

    $('.clockpicker').clockpicker();

    let formulario = document.querySelector("#formularioPracticas");
    let btnGuardar = document.querySelector("#btnGuardar");
    let btnModificar = document.querySelector("#btnModificar");
    let btnEliminar = document.querySelector("#btnEliminar");
    var uid = document.getElementById("idusuario").value;

    var calendarEl = document.getElementById('inventario');
    var calendar = new FullCalendar.Calendar(calendarEl, {

      initialView: 'dayGridMonth',

      locale:"es",

      displayEventTime:false,
      headerToolbar:{
        left: 'prev, next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },

      // events: baseURL+"/practica/mostrar",
      eventSources:{
        url: baseURL+"/practica/mostrar",
        method:"POST",
        extraParams:{
            _token: formulario._token.value, 
        }
        },



      dateClick:function(info){
        formulario.reset();
        formulario.start.value=info.dateStr;
        btnGuardar.style.display='block';
        btnModificar.style.display='block';
        btnEliminar.style.display='block';
        $("#practica").modal("show");
      },
      eventClick:function (info) {

        var practica= info.event;
        console.log(practica);

        axios.post(baseURL+"/practica/editar/"+info.event.id).
    then(
        (respuesta) =>{
        formulario.idusuario.value=respuesta.data.idusuario;
        formulario.id.value= respuesta.data.id;
        formulario.title.value=respuesta.data.title;
        formulario.descripcion.value=respuesta.data.descripcion;
        formulario.aula.value=respuesta.data.aula;
        formulario.cantidadal.value=respuesta.data.cantidadal;
        formulario.grupo.value=respuesta.data.grupo;
        formulario.docente.value=respuesta.data.docente;
        formulario.start.value=respuesta.data.start;
        formulario.horainicio.value=respuesta.data.horainicio;
        formulario.horaterminacion.value=respuesta.data.horaterminacion;
        $("#practica").modal("show");
        console.log(formulario.idusuario.value);
            if(formulario.idusuario.value==uid){
                btnGuardar.style.display='block';
                btnModificar.style.display='block';
                btnEliminar.style.display='block';
            }
            else if(uid==3){
                btnGuardar.style.display='block';
                btnModificar.style.display='block';
                btnEliminar.style.display='block';
            }
            else{
                btnGuardar.style.display='none';
                btnModificar.style.display='none';
                btnEliminar.style.display='none';
            }
    }
    ).catch(
        error=>{
            if(error.response){
                console.log(error.response.data);
            }
        }
    )

      }


    });
    calendar.render();

    document.getElementById("btnGuardar").addEventListener("click",function(){
        enviarDatos("/practica/agregar");
   
    });

    document.getElementById("btnEliminar").addEventListener("click",function(){
        enviarDatos("/practica/borrar/"+formulario.id.value);
    });

    document.getElementById("btnModificar").addEventListener("click",function(){
        enviarDatos("/practica/actualizar/"+formulario.id.value);
    });



    function enviarDatos(url){
        const datos= new FormData(formulario);

        const nuevaURL = baseURL+url;
    
        axios.post(nuevaURL, datos).
        then(
            (respuesta) =>{
                calendar.refetchEvents();
            $("#practica").modal("hide");
        }
        ).catch(
            error=>{
                if(error.response){
                    console.log(error.response.data);}
            }
            )
    }
    
  });

  
