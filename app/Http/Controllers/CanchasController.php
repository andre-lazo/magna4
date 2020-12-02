<?php

namespace App\Http\Controllers;
use App\Models\Cancha;
use Illuminate\Http\Request;
use PDF;

class CanchasController extends Controller
{
    public function index(Request $request)
    {
        $arreglo= Cancha::all();
        $canchas=array();
       foreach($arreglo as $item){
        if($item->cedula==$request->user()->cedula){
            array_push($canchas,$item);
        }
       }
        return view('canchas.index', ['canchas'=>$canchas]);
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
        $canchas=Cancha::all();
      foreach($canchas as $item){
          if($item->start==$hora. ' 00:00:00')
          {
            $a= new Cancha();
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
      return view('canchas.create',['arreglo'=>$arreglo,
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
          return redirect('/canchas')->with('warning','No puede reservar mas de dos veces en un dia esta locacion');
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
        $cancha = new Cancha();
        $cancha->title = "Reservado";
        $cancha->hora = request('txtHora2');
        $cancha->usuario =request('txtUsuario');
        $cancha->visi1 = request('visi1');
        $cancha->pare1 = request('parent1');
        $cancha->visi2 = request('visi2');
        $cancha->pare2 = request('parent2');
        $cancha->visi3 = request('visi3');
        $cancha->pare3 = request('parent3');
        $cancha->visi4 = request('visi4');
        $cancha->pare4 = request('parent4');
        $cancha->visi5 = request('visi5');
        $cancha->pare5 = request('parent5');
        $cancha->visi6 = request('visi6');
        $cancha->pare6 = request('parent6');
        $cancha->visi7 = request('visi7');
        $cancha->pare7 = request('parent7');
        $cancha->color = '#0000FF';
        $cancha->textColor = '#FFFFFF';
        $cancha->start = request('txtFecha');
        $cancha->end = request('txtFecha');
        $cancha->cedula=request('cedula');
        $cancha->save();

        return redirect('canchas')->with('success','Reservacion realizada con exito');
        
    }

    public function show(Request $request)
    {
        $arreglo= Cancha::all();
        $canchas=array();
       foreach($arreglo as $item){
        if($item->cedula==$request->user()->cedula){
            array_push($canchas,$item);
        }
       }
        $data['canchas'] =$canchas;
        return response()->json($data['canchas']);

    }


    public function downloadPDF($id){
        $cancha = Cancha::findOrFail($id);
        $pdf = PDF::loadView('eventos2', ['canchas'=>$cancha]);
        //dd($pdf); 
        //return $pdf->download('cedula2.pdf');
        return redirect('canchas');
    }

    public function edit($id)
    {
        $cancha = Cancha::findOrFail($id);
        $pdf = PDF::loadView('ReservacionCancha', ['canchas'=>$cancha]);
        //dd($pdf); 
        return $pdf->download('Reservacion-Cancha.pdf');
        //return redirect('eventos');
    }

 
    public function update(Request $request, $id)
    {
        $datosCancha = request()->except(['_token', '_method']);
        $respuesta = Cancha::where('id','=', $id)->update($datosCancha);    

        return response()->json($respuesta);
    }


    public function destroy($id)
    {
        //RECUPERAMO LOS ELEMENTOS EN EVENTOS
        $canchas = Cancha::findOrFail($id);
        //LUEGO DESTRUIMOS 
        Cancha::destroy($id);
        //RETORNA QUE SE ELIMINA
        return redirect('canchas')->with('success','Reservacion eliminada con exito');
    }

}
