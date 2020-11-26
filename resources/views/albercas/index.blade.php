@extends('navbar_user')
<style>
  body{
    padding-top: 100px;
  }
</style>
@section('scripts')
    <link rel="stylesheet" href="{{asset('fullcalendar/core/main.css')}}">
    <link rel="stylesheet" href="{{asset('fullcalendar/daygrid/main.css')}}">
    <link rel="stylesheet" href="{{asset('fullcalendar/list/main.css')}}">
    <link rel="stylesheet" href="{{asset('fullcalendar/timegrid/main.css')}}">


    <script src="{{asset('fullcalendar/core/main.js')}}" defer></script>
    <script src="{{asset('fullcalendar/interaction/main.js')}}" defer></script>
    <script src="{{asset('fullcalendar/daygrid/main.js')}}" defer></script>
    <script src="{{asset('fullcalendar/list/main.js')}}" defer></script>
    <script src="{{asset('fullcalendar/timegrid /main.js')}}" defer></script>
    <script>
        var url_="{{url('/albercas')}}";
        var url_show="{{url('/albercas/show')}}"; 
    </script>
    <script src="{{asset('js/alberca.js')}}" defer></script>
 
@endsection

@section('content')
<style>


	.modal{
      
        position: absolute;
        top: 5%;
    
		left:25%;

       
    
        
       
       
        
        
    }
	

	
</style>

<div class=" modal fade  "  id="norm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
  <div class="modal-dialog  modal-xl " >
  <div class="modal-body ">
  

				<div class="row flex-wrap">
			
		<div class="col-xs-6 col-lg-5 flex-wrap" style="background-color:#FE1713; border-radius: 6%;">
	<center>	<h2  class="mt-2" style=" font-family: Verdana; font-weight:550;color:white;"> NORMAS SANITARIAS <h2> </center>
	<center>  <h5 style=" font-family: Verdana; color:#FEC504;">COVID - 19  </h5> </center>
	<div class=" ml-2 mr-2 mb-4 Flex-wrap" style="background-color:white;  border-radius: 6%;">
		

	
	<div class="row  container " >
              <div class="col-xs-1 col-lg-3 mt-4 mb-2 ml-4 mr-4 Flex-wrap ">
                <img src="{{asset('img/mascarilla.jpeg')}}"width="100px" height="100px" style="border-radius: 50%;" >
			<center>	<div class="section mt-2  "   style="background-color: #3734AE  ; color:white; font-size:8pt; width:100px; height:33px "> USO OBLIGATORIO DE MASCARILLA</div> </center>
			  </div>
			  
              <div class="col-xs-1 col-lg-3 mt-4 mb-2 mr-4 Flex-wrap">
                <img src="{{asset('img/distancia.jpeg')}}"width="100px" height="100px" style="border-radius: 50%;">
				<center>	<div class="section mt-2  "  style="background-color:#3734AE; color:white; font-size:8pt; width:100px; height:33px  "> RESPETE LA DISTANCIA DE 2 METROS</div> </center>
			  </div>
			  
              <div class="col-xs-1 col-lg-3 mt-4 mb-2 flex-wrap">
                <img src="{{asset('img/gel.jpeg')}}"width="100px" height="100px" style="border-radius: 50%;" > 
				<center>	<div class="section mt-2  "  style="background-color:#3734AE; color:white; font-size:8pt; width:100px; height:33px   "> UTILICE ALCOHOL  ANTIBACTERIAL </div> </center>
			  </div>
			  </div>



			  <div class="row mt-5 container "  >
			  <div class="col-xs-1 col-lg-3  mb-2 ml-4 mr-4 Flex-wrap ">
              
			  <img src="{{asset('img/mano.jpeg')}}"width="100px" height="100px" style="border-radius: 50%;" >
			  <center>	<div class="section mt-2  "  style="background-color:#FE1713 ; color:white; font-size:8pt; width:100px; height:33px   "> EVITE EL CONTACTO FÍSICO </div> </center>
			
			  
			 </div>
			<div class="col-xs-1 col-lg-3  mb-2 mr-4 flex-wrap ">
                <img src="{{asset('img/cara.jpeg')}}" width="100px" height="100px" style="border-radius: 50%;">
            	<center>	<div class="section mt-2  "  style="background-color: #FE1713 ; color:white; font-size:8pt; width:100px; height:33px   "> EVITE TOCARSE LA CARA </div> </center>
			  
             
			  </div>
			
			  <div class="col-xs-1 col-lg-3 flex-wrap " >
              
			  <img src="{{asset('img/escupir.jpeg')}}"width="100px" height="100px" style="border-radius: 50%;" >
			  <center>	<div class="section mt-2  "  style="background-color: #FE1713 ; color:white; font-size:8pt; width:100px; height:33px   "> PROHIBIDO ESCUPIR </div> </center>
			 
			
			</div>
			</div>
			<div class="row  container " >
			<div class="col-xs-1 col-lg-2 mt-2 mb-2 ml-5 mr-3 Flex-wrap ">
               
			  </div>
			  
              <div class="col-xs-1 col-lg-2 mt-3 mb-3 mr-2 Flex-wrap">
                <img src="{{asset('img/magna.jpeg')}}" width="75px" height="60px" >
  </div>
			  
              <div class="col-xs-1 col-lg-2 mt-4 mb-2  flex-wrap">
			  <img src="{{asset('img/covid-19.png')}}" width="75px" height="45px" >
			  
			  </div>

			</div>
			</div>
			


				</div>
				</div>
				</div>
				</div>
        </div>
        











<div clas="row">
    <div class="col"></div>
    <div class="col-8">
        <div id="calendar"></div>
    </div>
    <div class="col"></div>
</div>
<div class="table-wrapper-scroll-y my-custom-scrollbar row container mt-5">
<table class="table table-bordered table-striped mb-0 table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col text-center">Id</th>
      <center><th scope="col ">Usuario</th></center>
      <th scope="col text-center">Horario</th>
      <th scope="col text-center">Fecha</th>
      <th scope="col text-center">Exportar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($albercas as $alberca)
    <tr>
      <th scope="row">{{$alberca->id}}</th>
      <td>{{$alberca->usuario}}</td>
      <td>{{$alberca->hora}}</td>
      <td>{{$alberca->start}}</td>
      <td class="text-center"><a href="{{route('albercas.edit',$alberca->id)}}" class="btn btn-success"><i class="far fa-eye"></i>Pdf</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<!--MODAL-->
{!! Form::open(['url' => 'albercas']) !!}
{{Form::token()}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Reservacion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="d-none">
                ID:
            <input type="text" name="txtId" id="txtId" value="1"><br>
            FECHA:
            <input type="text" name="txtFech" id="txtFech"><br>
            </div>

            <div>       
				<h3 class='text-center mb-2'>HORARIOS-PISCINAS</h3>
                
                    <div id="horarios">
                        <center>
                        <a id='boton1' href="#" class='btn btn-primary mr-4'>08 am - 09 am</a>
                        <a id='boton2' href="#" class='btn btn-primary mr-4'>09 am - 10 am</a>
                        <a id='boton3' href="#" class='btn btn-primary mr-4'>10 am - 11 am</a><br><br>
                        <a id='boton4' href="#" class='btn btn-primary mr-4'>11 am - 12 pm</a>
                        <a id='boton5' href="#" class='btn btn-primary mr-4'>12 pm - 13 pm</a>
                        <a id='boton6' href="#" class='btn btn-primary mr-4'>14 pm - 15 pm</a><br><br>
                        <a id='boton7' href="#" class='btn btn-primary mr-4'>15 pm - 16 pm</a>
                        <a id='boton8' href="#" class='btn btn-primary mr-4'>16 pm - 17 pm</a>
                        <a id='boton9' href="#" class='btn btn-primary mr-4'>17 pm - 18 pm</a><br><br>
                        </center>
					</div>
            </div>
        
            <div class="form-row">
                    <!--<div class="form-group col-md-8 d-none">
                        <label> TITULO: </label>
                        <input type="text" class="form-control" name="txtTitulo" id="txtTitulo">
                    </div>-->
                    <div class="form-group col-md-4 d-none">
                        <label>Hora</label>
                        <input readonly type="text" min="07:00" max="19:00" step="600" class="form-control" name="txtHora" id="txtHora">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Hora</label>
                        <input readonly type="text" class="form-control" name="txtHora2" id="txtHora2">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Usuario</label>
                        <input type="text" class="form-control" name="txtUsuario" id="txtUsuario" value="{{ Auth::user()->name }} {{ Auth::user()->apellido }}" readonly>
                    </div>
                    <!--<div class="form-group col-md-12 d-none">
                        <label>DESCRIPCION</label>
                        <textarea class="form-control"   name="txtDescripcion" id="txtDescripcion"
                        cols="30" rows="3"></textarea>
                    </div>-->
                    <div class="form-group">
                    <label for="visitantes" class=" control-label">Visitantes</label>
                    <div class="row">
                    <div class="col-sm-4 ml-3">
                    <label for="visitantes" class=" control-label">Nombre</label>
                    </div>
                    <div class="col-sm-4">
                    <label for="visitantes" class=" control-label">Parentezco</label>
                    </div><br>
                    <div class="col-sm-4 ml-3">
                      <input type="text" name="visi1" class="form-control" id="visi1" placeholder="Nombre">
                    </div>
                    <div class="col-sm-4">
                      <input type="text" name="parent1" class="form-control" id="parent1" placeholder="Parentezco">
                    </div><br><br>
                    </div>
                    <div class="row">
                    <div class="col-sm-4 ml-3">
                      <input type="text" name="visi2" class="form-control" id="visi2" placeholder="Nombre">
                    </div>
                    <div class="col-sm-4">
                      <input type="text" name="parent2" class="form-control" id="parent2" placeholder="Parentezco">
                    </div><br><br>
                    </div>
                    <div class="row">
                    <div class="col-sm-4 ml-3">
                      <input type="text" name="visi3" class="form-control" id="visi3" placeholder="Nombre">
                    </div>
                    <div class="col-sm-4">
                      <input type="text" name="parent3" class="form-control" id="parent3" placeholder="Parentezco">
                    </div><br><br>
                    </div>
                    <div class="row">
                    <div class="col-sm-4 ml-3">
                      <input type="text" name="visi4" class="form-control" id="visi4" placeholder="Nombre">
                    </div>
                    <div class="col-sm-4">
                      <input type="text" name="parent4" class="form-control" id="parent4" placeholder="Parentezco">
                    </div><br><br>
                    </div>
                    <div class="row">
                    <div class="col-sm-4 ml-3">
                      <input type="text" name="visi5" class="form-control" id="visi5" placeholder="Nombre">
                    </div>
                    <div class="col-sm-4">
                      <input type="text" name="parent5" class="form-control" id="parent5" placeholder="Parentezco">
                    </div><br><br>
                    </div>
                    <div class="row">
                    <div class="col-sm-4 ml-3">
                      <input type="text" name="visi6" class="form-control" id="visi6" placeholder="Nombre">
                    </div>
                    <div class="col-sm-4">
                      <input type="text" name="parent6" class="form-control" id="parent6" placeholder="Parentezco">
                    </div><br><br>
                    </div>
                    <div class="row">
                    <div class="col-sm-4 ml-3">
                      <input type="text" name="visi7" class="form-control" id="visi7" placeholder="Nombre">
                    </div>
                    <div class="col-sm-4">
                      <input type="text" name="parent7" class="form-control" id="parent7" placeholder="Parentezco">
                    </div>
                    </div>
                    </div>    
                      </div>
                      <div class="form-group col-md-8">
                                  <label> Fecha: </label>
                                  <input class="form-control" type="text" name="txtFecha" id="txtFecha" readonly>
                      </div>
              </div>
        <div class="modal-footer">
          <div id="Agregar">
            <button type="submit" id="btnAgregar"  class="btn btn-success">Agregar</button>
          </div>
            <!--<button id='btnModificar' class="btn btn-warning">Modificar</button>-->  
          <div id="Eliminar"> 
            <a id='btnEliminar' href="#" class='btn btn-danger mr-1'>Eliminar</a>
          </div>
            <!--button id='btnEliminar' class="btn btn-danger">Eliminar</button>-->
          <div id="Cancelar">
            <button id='btnCancelar' data-dismiss="modal" class="btn btn-primary">Cancelar</button>
          </div>
            
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
 $(function(){
  $("#norm").modal();
 });
</script>
  {!! Form::close() !!}     

@endsection