document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        //PARA QUE EL CALENDARIO INICIE EN UNA FECHA ELEGIDA
      defaultDate: new Date(2020,10,16), 
      plugins: [ 'dayGrid', 'interaction', 'timeGrid', 'list' ],
      //ESTO ES PARA MOSTRAR LA VISTA SEGUN POR SEMANA, MES O POR DIA
      /*defaultView: 'timeGridWeek'*/
      header:{
          left: 'prev, next today',
          center: 'title',
          right:''
      },
      //ESTO ES PARA AGREGAR UN BOTON EN LA CABECERA POR SI DESEAS PONER ALGO COMO LAS REGLAS
      customButtons:{
          Miboton:{
              text: "Boton",
              click: function(){
                  alert("Hola gilson!");
                  //EL TOGGLE HACE QUE EL MODAL SE MUESTRE SI ESTA OCULTO
                  $('#exampleModal').modal('toggle');
              }
          }
      },
      //ESTO ES PARA CUANDO HAGAS CLICK ES UNA FECHA SE PRESENTE UN MODAL
      dateClick:function(info){
          limpiarFormulario();
          //ASIGNAMOS AL CAMPO FECHA EL VALOR DE FECHA OBTENIDO MEDIANTE dateStr
          $('#txtFecha').val(info.dateStr);


          //ESTO ES PARA DESACTIVAR LOS BOTONES MENOS EL DE AGREGAR   
          $("#horarios").show();
          $('#Eliminar').hide();
          $('#Agregar').show();
          //$('#btnAgregar').prop('disabled', false);
          //$('#btnModificar').prop('disabled', true);
          //$('#btnEliminar').prop('disabled', true);
          $('#visi1').prop('disabled', false);
          $('#parent1').prop('disabled', false);
          $('#visi2').prop('disabled', false);
          $('#parent2').prop('disabled', false);
          $('#visi3').prop('disabled', false);
          $('#parent3').prop('disabled', false);
          $('#visi4').prop('disabled', false);
          $('#parent4').prop('disabled', false);
          $('#visi5').prop('disabled', false);
          $('#parent5').prop('disabled', false);
          $('#visi6').prop('disabled', false);
          $('#parent6').prop('disabled', false);
          $('#visi7').prop('disabled', false);
          $('#parent7').prop('disabled', false);
        //VALIDAR FECHA
            //FECHA 1
            var fec1 = document.getElementById("txtFecha").value;	
            console.log(fec1);
            //FECHA 2
            var date = new Date();
            var yyyy = date.getFullYear().toString();
            var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
            var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
            var fec2 = yyyy+"-"+mm+"-"+dd;
            console.log(fec2);
            if(fec1>=fec2){
            $('#exampleModal').modal();
            }else{
                alert('Por favor seleccionar una fecha actual o mayor.');
            }
        //FIN VALIDACION FECHA
        
          //ESTO ES PARA AGREGAR UN EVENTO SOLO AL DAR CLICK CON LOS DATOS QUE PASAMOS COMO PARAMETROS
          //calendar.addEvent({title:'Evento x', date:info.dateStr});
      },
      
      eventClick:function(info){
        //EN ESTA SECCION CARGAMOS LOS DATOS DE LA BASE DE DATOS AL MODAL PARA QUE SE VEAN AL ABRIR EL
        //EVENTO DADO.

          //ESTO ES PARA DESACTIVAR SOLO EL BOTON DE AGREGAR MENOS ELIMINAR Y CANCELAR
          
         // $('#btnAgregar').prop('disabled', true);
          //$('#btnModificar').prop('disabled', false);
          $("#horarios").hide();
          $('#Agregar').hide();
          $('#Eliminar').show();
          //$('#btnEliminar').prop('disabled', false);
          $('#boton1').prop('disabled', true);
          $('#visi1').prop('disabled', true);
          $('#parent1').prop('disabled', true);
          $('#visi2').prop('disabled', true);
          $('#parent2').prop('disabled', true);
          $('#visi3').prop('disabled', true);
          $('#parent3').prop('disabled', true);
          $('#visi4').prop('disabled', true);
          $('#parent4').prop('disabled', true);
          $('#visi5').prop('disabled', true);
          $('#parent5').prop('disabled', true);
          $('#visi6').prop('disabled', true);
          $('#parent6').prop('disabled', true);
          $('#visi7').prop('disabled', true);
          $('#parent7').prop('disabled', true);
          
          
          
          $('#txtId').val(info.event.id);
          $('#txtTitulo').val(info.event.title);
          
          //RECUPERAMOS INFORMACION DE FECHA Y HORA
          mes= (info.event.start.getMonth()+1);
          dia= (info.event.start.getDate());
          anio= (info.event.start.getFullYear());
          
          //PARA AGREGAR 0 POR EJEMPLO '09' EN VES DE '9'
          mes = (mes<10)?"0"+mes:mes;
          dia = (dia<10)?"0"+dia:dia;
          //ESTO ES PARA EL MANEJO DE HORAS 
          minutos = info.event.start.getMinutes();
          hora = info.event.start.getHours();
          minutos = (minutos<10)?"0"+minutos:minutos;
          hora = (hora<10)?"0"+hora:hora;

          horario= (hora+":"+minutos);

          $('#txtFecha').val(anio+"-"+mes+"-"+dia);
          $('#txtHora').val(horario);
          $('#txtColor').val(info.event.backgroundColor);
          //USAMOS ASI PORQUE DESCRIPCION NO ES UNA INFORMACION ESTANDAR SINO DADA POR NOSOTROS
          //$('#txtDescripcion').val(info.event.extendedProps.descripcion);
          $('#txtUsuario').val(info.event.extendedProps.usuario);
          $('#txtHora2').val(info.event.extendedProps.hora);
          $('#visi1').val(info.event.extendedProps.visi1);
          $('#parent1').val(info.event.extendedProps.pare1);
          $('#visi2').val(info.event.extendedProps.visi2);
          $('#parent2').val(info.event.extendedProps.pare2);
          $('#visi3').val(info.event.extendedProps.visi3);
          $('#parent3').val(info.event.extendedProps.pare3);
          $('#visi4').val(info.event.extendedProps.visi4);
          $('#parent4').val(info.event.extendedProps.pare4);
          $('#visi5').val(info.event.extendedProps.visi5);
          $('#parent5').val(info.event.extendedProps.pare5);
          $('#visi6').val(info.event.extendedProps.visi6);
          $('#parent6').val(info.event.extendedProps.pare6);
          $('#visi7').val(info.event.extendedProps.visi7);
          $('#parent7').val(info.event.extendedProps.pare7);

          $('#exampleModal').modal();

      },
      
      //AQUI MANDAMOS LA URL DE EVENTOS PARA QUE SE VEA EL EVENTO GUARDADO EN LA BASE DE DATOS
      events: url_show

    });
    calendar.setOption('locale','Es');
    calendar.render();
    //AGREGAMOS LA FUNCION AGREGAR AL BOTON AGREGAR
    /*$('#btnAgregar').click(function(){
      ObjEvento = recolectarDatosGUI("POST");
      
        EnviarInformacion('',ObjEvento);
      
    });*/
    //ELIMINAR UN EVENTO
    $('#btnEliminar').click(function(){
      ObjEvento = recolectarDatosGUI("DELETE");
      EnviarInformacion('/'+$('#txtId').val(), ObjEvento);
    });
    $('#btnVer').click(function(){
        $('#exampleModal').modal();
    });
    
    //MODIFICAR UN EVENTO
    $('#btnModificar').click(function(){
        //CON PATCH NOS PERMITE INGESAR AL METODO UDATE DEL CONTROLADOR
      ObjEvento = recolectarDatosGUI('PATCH');
      EnviarInformacion('/'+$('#txtId').val(), ObjEvento);
    });
    //CON ESTA FUNCION RECUPERAMOS LOS DATOS INGRESADOS POR LOS TXT
    function recolectarDatosGUI(method){
        nuevoEvento =  {
          id:$('#txtId').val(),
          title:$('#txtHora2').val(),
          hora: $('#txtHora2').val(),
          usuario: $('#txtUsuario').val(),
          visi1: $('#visi1').val(),
          pare1: $('#parent1').val(),
          visi2: $('#visi2').val(),
          pare2: $('#parent2').val(),
          visi3: $('#visi3').val(),
          pare3: $('#parent3').val(),
          visi4: $('#visi4').val(),
          pare4: $('#parent4').val(),
          visi5: $('#visi5').val(),
          pare5: $('#parent5').val(),
          visi6: $('#visi6').val(),
          pare6: $('#parent6').val(),
          visi7: $('#visi7').val(),
          pare7: $('#parent7').val(),
          //descripcion:$('#txtDescripcion').val(),
          color: '#0000FF',
          textColor:'#FFFFFF',
          start:$('#txtFecha').val()+" "+$('#txtHora').val(),
          end:$('#txtFecha').val()+" "+$('#txtHora').val(),
          '_token': $("meta[name='csrf-token']").attr("content"),
          '_method': method
        }
        console.log(nuevoEvento);
          return (nuevoEvento);
    }
    //HACEMOS UA FUNCION AJAX PARA ENVIAR EL EVENTO
    function EnviarInformacion(accion, objEvento){
        $.ajax({
            type: "POST",
            url: url_+accion,
            data: objEvento,
            success: function(msg){
                //console.log(msg);
                $('#exampleModal').modal('toggle');
                calendar.refetchEvents();
              },
            error: function(){alert('Hay un error');}
        });
    }
    //LIMPIAMOSEL FORMULARIO PARA QUE NO SE QUEDE AL DAR EN EL EVENTO
    function limpiarFormulario(){
          $('#txtId').val('');
          //$('#txtUsuario').val('{{ Auth::user()->name }} {{ Auth::user()->apellido }}');
          
          $('#txtHora2').val('');
          $('#txtFecha').val('');
          $('#txtHora').val('-');
          $('#txtColor').val('');
          //$('#txtDescripcion').val('');
          $('#visi1').val('-');
          $('#visi2').val('-');
          $('#visi3').val('-');
          $('#visi4').val('-');
          $('#visi5').val('-');
          $('#visi6').val('-');
          $('#visi7').val('-');
          $('#parent1').val('-');
          $('#parent2').val('-');
          $('#parent3').val('-');
          $('#parent4').val('-');
          $('#parent5').val('-');
          $('#parent6').val('-');
          $('#parent7').val('-');
    }
    
  });
  document.getElementById("boton1").onclick = function(){
    document.getElementById("txtHora2").value = "08 am - 09 am";
}
document.getElementById("boton2").onclick = function(){
    document.getElementById("txtHora2").value = "09 am - 10 am";
}
document.getElementById("boton3").onclick = function(){
    document.getElementById("txtHora2").value = "10 am - 11 am";
}
document.getElementById("boton4").onclick = function(){
    document.getElementById("txtHora2").value = "11 am - 12 pm";
}
document.getElementById("boton5").onclick = function(){
    document.getElementById("txtHora2").value = "12 pm - 13 pm";
}
document.getElementById("boton6").onclick = function(){
    document.getElementById("txtHora2").value = "14 pm - 15 pm";
}
document.getElementById("boton7").onclick = function(){
    document.getElementById("txtHora2").value = "15 pm - 16 pm";
}
document.getElementById("boton8").onclick = function(){
    document.getElementById("txtHora2").value = "16 pm - 17 pm";
}
document.getElementById("boton9").onclick = function(){
    document.getElementById("txtHora2").value = "17 pm - 18 pm";
}
document.getElementById("guarda").onclick = function(){
    alert('Guardado Exitosamente.');
}