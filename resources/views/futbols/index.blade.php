@extends('navbar_user')

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
       
        var url_show="{{url('/futbols/show')}}"; 
    </script>
    <script src="{{asset('js/calendar.js')}}" defer></script>
 
@endsection

@section('content')
<style>

body{
  padding-top: 100px;
}
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
      <th scope="col text-center">Eliminar</th>

    </tr>
  </thead>
  <tbody>
    @foreach($futbols as $futbol)
    @include('futbols.model_delete')
    <tr>
      <th scope="row">{{$futbol->id}}</th>
      <td>{{$futbol->usuario}}</td>
      <td>{{$futbol->hora}}</td>
      <td>{{$futbol->start}}</td>
      <td class="text-center"><a href="{{route('futbols.edit',$futbol->id)}}" class="btn btn-success"><i class="far fa-eye"></i>Pdf</a></td>
      <td class="text-center"><button type="button" class=" btn btn-outline-danger" data-toggle="modal" data-target="#modalEliminar-{{$futbol->id}}"><i class="far fa-trash-alt"></i> Eliminar</button></td>


    </tr>
    @endforeach
  </tbody>
</table>
</div>
<!--MODAL-->
<form action="{{route('futbols.create')}}">
  @csrf
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Reservacion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="row mt-5">
                    <div class="col-sm-6 ml-5">
                    <center><h5 class="mb-5">¿Desea hacer la reservacion en la siguiente fecha?</h5></center>
                    </div>
                    <div class="col-sm-4">
                    <center><input class="form-control" type="text" name="txtFecha" id="txtFecha" readonly></center>
                    </div><br>
        </div>
        <div class="modal-footer">
          <div id="Agregar">
            <button type="submit" id="btnAgregar"  class="btn btn-success">Agregar</button>
          </div>
            <!--<button id='btnModificar' class="btn btn-warning">Modificar</button>-->  
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
</form>   

@endsection