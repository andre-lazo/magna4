@extends('navbar_user')

@section('content')
<script>
    function click(){
        $('#seacrh').val("");
    }
</script>
    <h1 class="pt-5 text-center">SECCIÓN DE EMPRENDEDORES</h1>
    <center>
         <form class="form-inline ml-3 mb-5  " >
      
      <div class="input-group input-group-sm bg-secondary">
         
              <select class="form-control form-control-navbar" name="search"  >
                <option selected value="RESTAURANTE">RESTAURANTE</option>
            <option selected value="TECNOLOGIA">TECNOLOGÍA</option>
            <option selected value="ARTICULOS DE HOGAR">ARTÍCULOS DEL HOGAR</option>
            <option selected value="MINI MARKET">MINI MARKET</option>
            <option selected value="BISUTERÍA">BISUTERÍA</option>
            <option selected value="ROPA">ROPA</option>
            <option selected value="FARMACEUTICA">FARMACEUTICA</option>
            <option selected value="ENTRETENIMIENTO">ENTRETENIMIENTO</option>
            <option selected value="LIMPIEZA">LIMPIEZA</option>
            <option selected value="FITNEESS">FITNEESS</option>
            <option selected value="DEPORTE">DEPORTE</option>
            <option selected value="LICORERIA">LICORERÍA</option>
            <option selected value="BAZAR">BAZAR</option>
            <option selected value="ARTICULOS DE BELLEZA">ARTICULOS DE BELLEZA</option>
            <option selected value="SERVICIOS">SERVICIOS</option>
            <option selected value="MANO DE OBRA">MANO DE OBRA</option>
            <option selected value="" >Seleccione</option>
          </select>
          <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
              </button>
          </div>
          
      </div>
      <button class="btn btn-success ml-5" type="submit">
        Buscar
    </button>
      <button class="btn btn-primary ml-2" type="submit" onclick="click()">
        Cargar todo
    </button>
  </form>
    </center>
    <div class="d-flex flex-wrap justify-content-around  mt-5">
   
       @if (!sizeof($emprendedores)>0)
       <div class="col-xs-12 col-lg-4" style="float: right;">
        <div class="card" style="width:100%">
            <img src="{{asset('img/magna.jpeg')}}" width="100%" class="card-img-top" alt="">
            <div class="card-body">
             <a href="" class="card-title h5 text-dark" style="text-decoration: none;">TITULO: EJEMPLO DE PUBLICACION </a>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-danger float-right"><i class="far fa-trash-alt"></i> Eliminar</a>
              <a href="#" class="btn btn-primary float-right mr-3"><i class="far fa-edit"></i> Editar</a>
            </div>
          </div>
    </div>
</div>
    @elseif(sizeof($emprendedores)>0)
    @if ($mano!=NULL)
    <h1 class="text-center">MANO DE OBRA</h1> 
    <div class="d-flex flex-wrap justify-content-around  mt-5">
    @foreach ($mano as $emprendedor)
    @include('emprendedores.modal_view')
       <div class="col-xs-12 col-lg-4" style="float: right;">
        <div class="card" style="width:100%">
            <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" width="100%" height="300px" class="card-img-top" alt="">
            <div class="card-body">
             <a href="" class="card-title h5 text-dark " style="text-decoration: none;">TITULO: {{$emprendedor->titulo}} </a><br><br>
              
             <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-{{$emprendedor->id}}"><i class="far fa-eye"> Leer mas</i></a>
             <a target="_blank" href="https://api.whatsapp.com/send?phone=+593{{$emprendedor->telefono}}&text=Hola,%20Quiero%20saber%20mas" class="btn btn-success float-right mr-3"><i class="far fa-envelope"> Escribanos</i></a>
            </div>
          </div>
    </div>
       @endforeach
    </div>
    @endif
    @if ($restaurante!=NULL)
    <h1 class="text-center">RESTAURANTE</h1> 

    <div class="d-flex flex-wrap justify-content-around  mt-5">
       @foreach ($restaurante as $emprendedor)
       @include('emprendedores.modal_view')
          <div class="col-xs-12 col-lg-4" style="float: right;">
           <div class="card" style="width:100%">
               <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" width="100%" height="300px" class="card-img-top" alt="">
               <div class="card-body">
                <a href="" class="card-title h5 text-dark " style="text-decoration: none;">TITULO: {{$emprendedor->titulo}} </a><br><br>
                 
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-{{$emprendedor->id}}"><i class="far fa-eye"> Leer mas</i></a>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+593{{$emprendedor->telefono}}&text=Hola,%20Quiero%20saber%20mas" class="btn btn-success float-right mr-3"><i class="far fa-envelope"> Escribanos</i></a>
               </div>
             </div>
       </div>
          @endforeach
    </div>
    @endif
    @if ($limpieza!=NULL)
    <h1 class="text-center">LIMPIEZA</h1> 

    <div class="d-flex flex-wrap justify-content-around  mt-5">
       @foreach ($limpieza as $emprendedor)
       @include('emprendedores.modal_view')
          <div class="col-xs-12 col-lg-4" style="float: right;">
           <div class="card" style="width:100%">
               <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" width="100%" height="300px" class="card-img-top" alt="">
               <div class="card-body">
                <a href="" class="card-title h5 text-dark " style="text-decoration: none;">TITULO: {{$emprendedor->titulo}} </a><br><br>
                 
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-{{$emprendedor->id}}"><i class="far fa-eye"> Leer mas</i></a>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+593{{$emprendedor->telefono}}&text=Hola,%20Quiero%20saber%20mas" class="btn btn-success float-right mr-3"><i class="far fa-envelope"> Escribanos</i></a>
               </div>
             </div>
       </div>
          @endforeach
    </div>
    @endif
    @if ($tecnologia!=NULL)
    <h1 class="text-center">TECNOLOGIA</h1> 
    <div class="d-flex flex-wrap justify-content-around  mt-5">
       @foreach ($tecnologia as $emprendedor)
       @include('emprendedores.modal_view')
          <div class="col-xs-12 col-lg-4" style="float: right;">
           <div class="card" style="width:100%">
               <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" width="100%" height="300px" class="card-img-top" alt="">
               <div class="card-body">
                <a href="" class="card-title h5 text-dark " style="text-decoration: none;">TITULO: {{$emprendedor->titulo}} </a><br><br>
                 
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-{{$emprendedor->id}}"><i class="far fa-eye"> Leer mas</i></a>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+593{{$emprendedor->telefono}}&text=Hola,%20Quiero%20saber%20mas" class="btn btn-success float-right mr-3"><i class="far fa-envelope"> Escribanos</i></a>
               </div>
             </div>
       </div>
          @endforeach
    </div>
    @endif
    @if ($articulos!=NULL)
    <h1 class="text-center">ARTICULOS DEL HOGAR</h1> 
    <div class="d-flex flex-wrap justify-content-around  mt-5">
       @foreach ($articulos as $emprendedor)
       @include('emprendedores.modal_view')
          <div class="col-xs-12 col-lg-4" style="float: right;">
           <div class="card" style="width:100%">
               <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" width="100%" height="300px" class="card-img-top" alt="">
               <div class="card-body">
                <a href="" class="card-title h5 text-dark " style="text-decoration: none;">TITULO: {{$emprendedor->titulo}} </a><br><br>
                 
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-{{$emprendedor->id}}"><i class="far fa-eye"> Leer mas</i></a>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+593{{$emprendedor->telefono}}&text=Hola,%20Quiero%20saber%20mas" class="btn btn-success float-right mr-3"><i class="far fa-envelope"> Escribanos</i></a>
               </div>
             </div>
       </div>
          @endforeach
    </div>
    @endif
    @if ($market!=NULL)
    <h1 class="text-center">MINI MARKET</h1> 
    <div class="d-flex flex-wrap justify-content-around  mt-5">
       @foreach ($market as $emprendedor)
       @include('emprendedores.modal_view')
          <div class="col-xs-12 col-lg-4" style="float: right;">
           <div class="card" style="width:100%">
               <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" width="100%" height="300px" class="card-img-top" alt="">
               <div class="card-body">
                <a href="" class="card-title h5 text-dark " style="text-decoration: none;">TITULO: {{$emprendedor->titulo}} </a><br><br>
                 
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-{{$emprendedor->id}}"><i class="far fa-eye"> Leer mas</i></a>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+593{{$emprendedor->telefono}}&text=Hola,%20Quiero%20saber%20mas" class="btn btn-success float-right mr-3"><i class="far fa-envelope"> Escribanos</i></a>
               </div>
             </div>
       </div>
          @endforeach
    </div>
    @endif
    @if ($ropa!=NULL)
    <h1 class="text-center">ROPA</h1> 
    <div class="d-flex flex-wrap justify-content-around  mt-5">
       @foreach ($ropa as $emprendedor)
       @include('emprendedores.modal_view')
          <div class="col-xs-12 col-lg-4" style="float: right;">
           <div class="card" style="width:100%">
               <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" width="100%" height="300px" class="card-img-top" alt="">
               <div class="card-body">
                <a href="" class="card-title h5 text-dark " style="text-decoration: none;">TITULO: {{$emprendedor->titulo}} </a><br><br>
                 
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-{{$emprendedor->id}}"><i class="far fa-eye"> Leer mas</i></a>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+593{{$emprendedor->telefono}}&text=Hola,%20Quiero%20saber%20mas" class="btn btn-success float-right mr-3"><i class="far fa-envelope"> Escribanos</i></a>
               </div>
             </div>
       </div>
          @endforeach
    </div>
    @endif
    @if ($farmacia!=NULL)
    <h1 class="text-center">FARMACIA</h1> 
    <div class="d-flex flex-wrap justify-content-around  mt-5">
       @foreach ($farmacia as $emprendedor)
       @include('emprendedores.modal_view')
          <div class="col-xs-12 col-lg-4" style="float: right;">
           <div class="card" style="width:100%">
               <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" width="100%" height="300px" class="card-img-top" alt="">
               <div class="card-body">
                <a href="" class="card-title h5 text-dark " style="text-decoration: none;">TITULO: {{$emprendedor->titulo}} </a><br><br>
                 
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-{{$emprendedor->id}}"><i class="far fa-eye"> Leer mas</i></a>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+593{{$emprendedor->telefono}}&text=Hola,%20Quiero%20saber%20mas" class="btn btn-success float-right mr-3"><i class="far fa-envelope"> Escribanos</i></a>
               </div>
             </div>
       </div>
          @endforeach
    </div>
    @endif
    @if ($entretenimiento!=NULL)
    <h1 class="text-center">ENTRETENIMIENTO</h1> 
    <div class="d-flex flex-wrap justify-content-around  mt-5">
       @foreach ($entretenimiento as $emprendedor)
       @include('emprendedores.modal_view')
          <div class="col-xs-12 col-lg-4" style="float: right;">
           <div class="card" style="width:100%">
               <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" width="100%" height="300px" class="card-img-top" alt="">
               <div class="card-body">
                <a href="" class="card-title h5 text-dark " style="text-decoration: none;">TITULO: {{$emprendedor->titulo}} </a><br><br>
                 
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-{{$emprendedor->id}}"><i class="far fa-eye"> Leer mas</i></a>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+593{{$emprendedor->telefono}}&text=Hola,%20Quiero%20saber%20mas" class="btn btn-success float-right mr-3"><i class="far fa-envelope"> Escribanos</i></a>
               </div>
             </div>
       </div>
          @endforeach
    </div>
    @endif
    @if ($fitneess!=NULL)
    <h1 class="text-center">FITNEES</h1> 
    <div class="d-flex flex-wrap justify-content-around  mt-5">
       @foreach ($fitnees as $emprendedor)
       @include('emprendedores.modal_view')
          <div class="col-xs-12 col-lg-4" style="float: right;">
           <div class="card" style="width:100%">
               <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" width="100%" height="300px" class="card-img-top" alt="">
               <div class="card-body">
                <a href="" class="card-title h5 text-dark " style="text-decoration: none;">TITULO: {{$emprendedor->titulo}} </a><br><br>
                 
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-{{$emprendedor->id}}"><i class="far fa-eye"> Leer mas</i></a>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+593{{$emprendedor->telefono}}&text=Hola,%20Quiero%20saber%20mas" class="btn btn-success float-right mr-3"><i class="far fa-envelope"> Escribanos</i></a>
               </div>
             </div>
       </div>
          @endforeach
    </div>
    @endif
    @if ($deporte!=NULL)
    <h1 class="text-center">DEPORTES</h1> 
    <div class="d-flex flex-wrap justify-content-around  mt-5">
       @foreach ($deporte as $emprendedor)
       @include('emprendedores.modal_view')
          <div class="col-xs-12 col-lg-4" style="float: right;">
           <div class="card" style="width:100%">
               <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" width="100%" height="300px" class="card-img-top" alt="">
               <div class="card-body">
                <a href="" class="card-title h5 text-dark " style="text-decoration: none;">TITULO: {{$emprendedor->titulo}} </a><br><br>
                 
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-{{$emprendedor->id}}"><i class="far fa-eye"> Leer mas</i></a>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+593{{$emprendedor->telefono}}&text=Hola,%20Quiero%20saber%20mas" class="btn btn-success float-right mr-3"><i class="far fa-envelope"> Escribanos</i></a>
               </div>
             </div>
       </div>
          @endforeach
    </div>
    @endif
    @if ($licorera!=NULL)
    <h1 class="text-center">LICORERIA</h1> 
    <div class="d-flex flex-wrap justify-content-around  mt-5">
       @foreach ($licorera as $emprendedor)
       @include('emprendedores.modal_view')
          <div class="col-xs-12 col-lg-4" style="float: right;">
           <div class="card" style="width:100%">
               <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" width="100%" height="300px" class="card-img-top" alt="">
               <div class="card-body">
                <a href="" class="card-title h5 text-dark " style="text-decoration: none;">TITULO: {{$emprendedor->titulo}} </a><br><br>
                 
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-{{$emprendedor->id}}"><i class="far fa-eye"> Leer mas</i></a>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+593{{$emprendedor->telefono}}&text=Hola,%20Quiero%20saber%20mas" class="btn btn-success float-right mr-3"><i class="far fa-envelope"> Escribanos</i></a>
               </div>
             </div>
       </div>
          @endforeach
    </div>
    @endif
    @if ($bazar!=NULL)
    <h1 class="text-center">BAZAR</h1> 
    <div class="d-flex flex-wrap justify-content-around  mt-5">
       @foreach ($bazar as $emprendedor)
       @include('emprendedores.modal_view')
          <div class="col-xs-12 col-lg-4" style="float: right;">
           <div class="card" style="width:100%">
               <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" width="100%" height="300px" class="card-img-top" alt="">
               <div class="card-body">
                <a href="" class="card-title h5 text-dark " style="text-decoration: none;">TITULO: {{$emprendedor->titulo}} </a><br><br>
                 
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-{{$emprendedor->id}}"><i class="far fa-eye"> Leer mas</i></a>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+593{{$emprendedor->telefono}}&text=Hola,%20Quiero%20saber%20mas" class="btn btn-success float-right mr-3"><i class="far fa-envelope"> Escribanos</i></a>
               </div>
             </div>
       </div>
          @endforeach
    </div>
    @endif
    @if ($belleza!=NULL)
    <h1 class="text-center">ARTICULOS DE BELLEZA</h1> 
    <div class="d-flex flex-wrap justify-content-around  mt-5">
       @foreach ($belleza as $emprendedor)
       @include('emprendedores.modal_view')
          <div class="col-xs-12 col-lg-4" style="float: right;">
           <div class="card" style="width:100%">
               <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" width="100%" height="300px" class="card-img-top" alt="">
               <div class="card-body">
                <a href="" class="card-title h5 text-dark " style="text-decoration: none;">TITULO: {{$emprendedor->titulo}} </a><br><br>
                 
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-{{$emprendedor->id}}"><i class="far fa-eye"> Leer mas</i></a>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+593{{$emprendedor->telefono}}&text=Hola,%20Quiero%20saber%20mas" class="btn btn-success float-right mr-3"><i class="far fa-envelope"> Escribanos</i></a>
               </div>
             </div>
       </div>
          @endforeach
    </div>
    @endif
    @if ($servicios!=NULL)
    <h1 class="text-center">SERVICIOS</h1> 
    <div class="d-flex flex-wrap justify-content-around  mt-5">
       @foreach ($servicios as $emprendedor)
       @include('emprendedores.modal_view')
          <div class="col-xs-12 col-lg-4" style="float: right;">
           <div class="card" style="width:100%">
               <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" width="100%" height="300px" class="card-img-top" alt="">
               <div class="card-body">
                <a href="" class="card-title h5 text-dark " style="text-decoration: none;">TITULO: {{$emprendedor->titulo}} </a><br><br>
                 
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-{{$emprendedor->id}}"><i class="far fa-eye"> Leer mas</i></a>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+593{{$emprendedor->telefono}}&text=Hola,%20Quiero%20saber%20mas" class="btn btn-success float-right mr-3"><i class="far fa-envelope"> Escribanos</i></a>
               </div>
             </div>
       </div>
          @endforeach
    </div>
    @endif
       @endif
       
       
       
   
@endsection