<?php

namespace App\Http\Controllers;
use App\Models\Evento;
use Illuminate\Http\Request;
use PDF;

class EventosController extends Controller
{
    
    public function index(Request $request)
    {
        $arreglo= Evento::all();
        $eventos=array();
       foreach($arreglo as $item){
        if($item->cedula==$request->user()->cedula){
            array_push($eventos,$item);
        }
       }
        return view('eventos.index', ['eventos'=>$eventos]);
    }

    
    public function create(Request $request)
    {
        $bool1=false;   
        $bool2=false;   
        $bool3=false;   
        $bool4=false;   
        $bool5=false;   
        $bool6=false;   
        $bool7=false;   
        $bool8=false;   
        $bool9=false;   
        $bool10=false;   
        $arreglo= array();
        $hora=$request->get('txtFecha');
        $eventos=Evento::all();
      foreach($eventos as $item){
          if($item->start==$hora. ' 00:00:00')
          {
            $a= new Evento();
            $a=$item;
            array_push($arreglo,$a);
            if($a->hora=='17 pm - 18 pm'){$bool10=true;}
            if($a->hora=='08 am - 09 am'){$bool1=true;}
            if($a->hora=='09 am - 10 am'){$bool2=true;}
            if($a->hora=='10 am - 11 am'){$bool3=true;}
            if($a->hora=='11 am - 12 pm'){$bool4=true;}
            if($a->hora=='12 pm - 13 pm'){$bool5=true;}
            if($a->hora=='13 pm - 14 pm'){$bool6=true;}
            if($a->hora=='14 pm - 15 pm'){$bool7=true;}
            if($a->hora=='15 pm - 16 pm'){$bool8=true;}
            if($a->hora=='16 pm - 17 pm'){$bool9=true;}
          }
      }
      
      $i=0;
    foreach($arreglo as $item){
        if($item->cedula==$request->user()->cedula){
            $i++;
        }
    }
      if($i<2){
      return view('eventos.create',['arreglo'=>$arreglo,
      'hora1'=>$bool1,
      'hora2'=>$bool2,
      'hora3'=>$bool3,
      'hora4'=>$bool4,
      'hora5'=>$bool5,
      'hora6'=>$bool6,
      'hora7'=>$bool7,
      'hora8'=>$bool8,
      'hora9'=>$bool9,
      'hora10'=>$bool10,
      'fecha'=>$hora
      ]);
    }else{
          return redirect('/eventos')->with('warning','No puede reservar mas de dos veces en un dia esta locacion');
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
        $evento = new Evento();
        $evento->title = "Reservado";
        $evento->hora = request('txtHora2');
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
        $arreglo= Evento::all();
        $eventos=array();
       foreach($arreglo as $item){
        if($item->cedula==$request->user()->cedula){
            array_push($eventos,$item);
        }
       }
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

    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        $pdf = PDF::loadView('ReservacionSalonEventos', ['eventos'=>$evento]);
        //dd($pdf); 
        return $pdf->download('Reservacion-Salon-Eventos.pdf');
        //return redirect('eventos');
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
