@extends('navbar_user')
<style>
.mover{
  padding-left: 25%;
}
@media screen and (max-width:800px){
  .mover{
    padding-left: 0%;
  }
}
 </style>
<script>
    function cargar(){
       var hora;
        $(document).on('click', '.boton', function(){
               hora=$(this).val();
            $('#txtHora2').val(hora);
        });
    }
</script>
@section('content')
    <div class="row">
      <div class="col-lg-6 col-xs-12 pt-5 mt-5">
<img src="{{asset('img/pis.jpg')}}" width="100%" alt="">
      </div>
<div class="col-lg-6 col-xs-12">
  <div class=" ">
    <center><h1 class=" font-weight-bold pt-5">Horarios ya reservados
    </h1>
    @foreach ($arreglo as $evento)
    <p class="font-weight-bold">{{$evento->hora}}</p>
@endforeach</center>
 <h3 class='text-center mb-2 font-weight-bold pt-5'>HORARIOS-DISPONIBLES SALON DE EVENTOS </h3>
             
 <div id="horarios">
         <center>
        @if(!$hora1) <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4"     value=" 09 am - 14 pm"> @endif
        @if (!$hora2)    <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 15 pm - 20 pm">@endif
        @if (!$hora3)    <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 21 pm - 02 am"><br><br>@endif
         </center>
     </div> 
    {!! Form::open(['url' => 'eventos']) !!}
{{Form::token()}}
  <div>
       
         
      <div class="text-center font-weight-bold">
          <label>Hora</label>
          <input readonly type="text" class="form-control" name="txtHora2" id="txtHora2" required>
          <label>Cedula</label>
          <input readonly type="text" class="form-control" name="cedula" id="cedula" value="{{Auth::user()->cedula}}" required>
          <label>Usuario</label>
          <input type="text" class="form-control" name="txtUsuario" id="txtUsuario" value="{{ Auth::user()->name }} {{ Auth::user()->apellido }}" readonly>
      
              <label> Fecha: </label>
              <input class="form-control" type="text" name="txtFecha" value="{{$fecha}}" id="txtFecha" readonly>
 
  
      <div class="mb-5 mt-4">
      <label for="visitantes" class=" control-label">Visitantes</label>
  <div class="mover">
    <div class="row text-center mt-5">
      <div class="col-sm-4 ml-3">
      <label for="visitantes" class=" control-label ">Nombre</label>
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
      </div>    
        </div>
      
         <center>
          <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
    
         </center>
</div>
   
   {!! Form::close() !!}
   
 
</div>
</div>
    </div>
  
@endsection