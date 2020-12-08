<?php

namespace App\Http\Controllers;
use App\Models\Evento;
use Illuminate\Http\Request;
use PDF;

class EventosController extends Controller
{
    
    public function index(Request $request)
    {
        $eventos= Evento::all()->where('cedula','=',$request->user()->cedula);   ;
       
        return view('eventos.index', ['eventos'=>$eventos]);
    }

    
    public function create(Request $request)
    {
        $bool1=false;   
        $bool2=false;   
        $bool3=false;   
        $arreglo= array();
        $hora=$request->get('txtFecha');
        $eventos=Evento::all();
      foreach($eventos as $item){
          if($item->start==$hora. ' 00:00:00')
          {
            $a= new Evento();
            $a=$item;
            array_push($arreglo,$a);
            if($a->hora=='09 am - 14 pm'){$bool1=true;}
            if($a->hora=='15 pm - 20 pm'){$bool2=true;}
            if($a->hora=='21 pm - 02 am'){$bool3=true;}
          }
      }
      
      $i=0;
    foreach($arreglo as $item){
        if($item->cedula==$request->user()->cedula){
            $i++;
        }
    }
    $todo=false;
    if($bool1==true&&$bool2==true&&$bool3==true){
        $todo=true;
    }
      if(!$todo){
        if($i<1){
            return view('eventos.create',['arreglo'=>$arreglo,
            'hora1'=>$bool1,
            'hora2'=>$bool2,
            'hora3'=>$bool3,
            'fecha'=>$hora
            ]);
          }else{
                return redirect('/eventos')->with('warning','No puede reservar mas de una vez en un dia esta locacion');
            }
      }else{
        return redirect('/eventos')->with('warning','Lo sentimos no quedan horas disponibles para reservar en este dia');
      }
    }

  
    public function store(Request $request)
    {
        //Enviamos toda informacion menos token y method
        /*$datosEvento = request()->except(['_token', '_method']);
        //INSERTAMOSA LA BASE DE DATOS
        
        evento::insert($datosEvento);
        print_r($datosEvento);
        /*
        $event = new Evento();
        $event->usuario = $request->input('txtUsuario');
        $event->save();
        return view('/eventos');*/
        $this->validate(request(),['hora'=>['required']]);

        $evento = new Evento();
        $evento->title =request('hora');
        $evento->hora = request('hora');
        $evento->usuario =request('txtUsuario');
        $evento->visi1 = request('visi1');
        $evento->pare1 = request('parent1');
        $evento->visi2 = request('visi2');
        $evento->pare2 = request('parent2');
        $evento->visi3 = request('visi3');
        $evento->pare3 = request('parent3');
        $evento->visi4 = request('visi4');
        $evento->pare4 = request('parent4');
        $evento->visi5 = request('visi5');
        $evento->pare5 = request('parent5');
        $evento->visi6 = request('visi6');
        $evento->pare6 = request('parent6');
        $evento->visi7 = request('visi7');
        $evento->pare7 = request('parent7');
        $evento->color = '#0000FF';
        $evento->textColor = '#FFFFFF';
        $evento->start = request('txtFecha');
        $evento->end = request('txtFecha');
        $evento->cedula=request('cedula');
        $evento->save();

        return redirect('eventos')->with('success','Reservacion realizada con exito');

        
    }

    public function show(Request $request)
    {
        $eventos= Evento::all();
      
        $data['eventos'] =$eventos;
        return response()->json($data['eventos']);
    }


    public function downloadPDF($id){
        $evento = Evento::findOrFail($id);
        $pdf = PDF::loadView('eventos2', ['eventos'=>$evento]);
        //dd($pdf); 
        //return $pdf->download('cedula2.pdf');
        return redirect('eventos');
    }

    public function edit($id,Request $request)
    {
        $alberca = Evento::findOrFail($id);
        list($manzana,$villa)= explode("-",$request->user()->residencia_id,2);
        $cedula=$request->user()->cedula;
        $locacion='Salon de Eventos';
        $pdf = PDF::loadView('Reservaciones', ['albercas'=>$alberca,'manzana'=>$manzana,'villa'=>$villa,
        'cedula'=>$cedula,
        'locacion'=>$locacion]);  return $pdf->download('Reservacion.pdf');
    }

 
    public function update(Request $request, $id)
    {
        $datosEvento = request()->except(['_token', '_method']);
        $respuesta = Evento::where('id','=', $id)->update($datosEvento);    

        return response()->json($respuesta);
    }


    public function destroy($id)
    {
        //RECUPERAMO LOS ELEMENTOS EN EVENTOS
        $eventos = Evento::findOrFail($id);
        //LUEGO DESTRUIMOS 
        Evento::destroy($id);
        //RETORNA QUE SE ELIMINA
        return redirect('eventos')->with('success','Reservacion eliminada con exito');
    }
}
