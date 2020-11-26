<script>
 

  function solonum(e){
            key=e.keyCode || e.which;
            teclado=String.fromCharCode(key);
            numero="0123456789.";
            especiales="8-37-38-46";
            teclado_especial=false;
            for (var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;break;
                }
            }
            if(numero.indexOf(teclado)==-1 && !teclado_especial){
              return false;
            }
           
           
        }
        function sololetra(e){
            key=e.keyCode || e.which;
            teclado=String.fromCharCode(key).toLowerCase();
            letras = "abcdefghijklmnopqrstuvwxyz ";
            especiales = "8-37-38-46-164";
            teclado_especial=false;
            for (var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;break;
                }
            }
            if(letras.indexOf(teclado)==-1 && !teclado_especial){
                return false;
            }
        }   
</script>



<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header bg-danger text-white">
    <h5 class="modal-title" id="exampleModalLabel">NUEVO REGISTRO</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    
    {!! Form::open(['url' => '/alicuota']) !!}
    
    {{ Form::token() }}
    
      <div class="form-group">
        <label for="recipient-name" class="col-form-label">Residencia:</label>
        <select name="residencia" class="form-control">
          @foreach ($residencias as $residencia)
          <option value="{{$residencia->residencia_id}}">{{$residencia->residencia_id}}</option>
          @endforeach
        </select>
        <label for="message-text" class="col-form-label">Propietario:</label>
        <select name="propietario" class="form-control">
          @foreach ($usuarios as $usuario)
          <option value="{{$usuario->name}}-{{$usuario->apellido}}-{{$usuario->cedula}}">{{$usuario->name}}-{{$usuario->apellido}}-{{$usuario->cedula}}</option>
          @endforeach
        </select>
        <label for="message-text" class="col-form-label">Fecha inicio:</label>
        <input type="date" name="fecha_inicio"  class="form-control" id="recipient-name">
        <label for="message-text" class="col-form-label">Fecha fin:</label>
        <input type="date"  name="fecha_fin" class="form-control" id="recipient-name">
        <label for="message-text" class="col-form-label">Cuotas totales:</label>
        <input type="text" name="cuotas_totales" onkeypress=" return solonum(event)" class="form-control" id="recipient-name">
        <label for="message-text" class="col-form-label">Valor total:</label>
        <input type="text" name="valor_total" onkeypress=" return solonum(event)" class="form-control" id="recipient-name">
        <label for="message-text" class="col-form-label">Cuotas pagadas:</label>
        <input type="text" name="cuotas_pagadas" onkeypress=" return solonum(event)" class="form-control" id="recipient-name">
        <label for="message-text" class="col-form-label">Valor pagado:</label>
        <input type="text" name="valor_pagado" onkeypress=" return solonum(event)" class="form-control" id="recipient-name">
        <label for="message-text" class="col-form-label">Cuotas adeudadas:</label>
        <input type="text" name="cuotas_adeudadas" onkeypress=" return solonum(event)" class="form-control" id="recipient-name">
        <label for="message-text" class="col-form-label">Valor Adeudado:</label>
        <input type="text" name="valor_adeudado" onkeypress=" return solonum(event)" class="form-control" id="recipient-name">
      </div>
    
   
    
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-danger">Guardar</button>
    </div>
    </div>
    </div>
    </div>
    {!! Form::close() !!}