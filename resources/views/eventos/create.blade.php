@extends('navbar_user')
<style>
    body{
        background: url({{asset('img/entrada.jpeg')}}) no-repeat center center  fixed;
        font-family: 'Titillium Web', sans-serif;
        background-size: cover; 
       
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
    <div class="text-white ">
        <center><h1 class="pt-5 font-weight-bold">Horarios ya reservados
        </h1>
        @foreach ($arreglo as $evento)
        <p class="font-weight-bold">{{$evento->hora}}</p>
    @endforeach</center>
     <h3 class='text-center mb-2 font-weight-bold'>HORARIOS-CANCHA 2</h3>
                 
     <div id="horarios">
         <center>
        @if(!$hora1) <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 08 am - 09 am"> @endif
        @if (!$hora2)    <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 09 am - 10 am">@endif
        @if (!$hora3)    <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 10 am - 11 am"><br><br>@endif
        @if (!$hora4)    <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 11 am - 12 pm">@endif
        @if (!$hora5)     <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 12 pm - 13 pm">@endif
        @if (!$hora6)     <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 13 pm - 14 pm"><br><br>@endif
        @if (!$hora7)     <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 14 pm - 15 pm">@endif
        @if (!$hora8)    <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 15 pm - 16 pm">@endif
        @if (!$hora9)    <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 16 pm - 17 pm">@endif
        @if (!$hora10)    <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 17 pm - 18 pm">@endif
         </center>
     </div>
     {!! Form::open(['url' => 'eventos']) !!}
    {{Form::token()}}
         <div class="form-row" style="max-width:2000px; padding-left:440px">
           
             
             <div class="form-group col-md-6 text-center font-weight-bold">
                 <label>Hora</label>
                 <input readonly type="text" class="form-control" name="txtHora2" id="txtHora2" required>
                 <label>Cedula</label>
                 <input readonly type="text" class="form-control" name="cedula" id="cedula" value="{{Auth::user()->cedula}}" required>
                 <label>Usuario</label>
                 <input type="text" class="form-control" name="txtUsuario" id="txtUsuario" value="{{ Auth::user()->name }} {{ Auth::user()->apellido }}" readonly>
             
                     <label> Fecha: </label>
                     <input class="form-control" type="text" name="txtFecha" value="{{$fecha}}" id="txtFecha" readonly>
        
             </div>
            
            
             <div class="form-group mt-4">
             <label for="visitantes" class=" control-label" style="padding-left: 180px">Visitantes</label>
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
             
                 <div style="padding-left: 550px" >
                     <button type="submit" class="btn btn-primary">Guardar</button>
                     <button type="reset" class="btn btn-danger">Cancelar</button>
                 </div>
             
       </div>
       
       {!! Form::close() !!}
       
     
    </div>
@endsection