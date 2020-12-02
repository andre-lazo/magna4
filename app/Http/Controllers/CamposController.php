<?php

namespace App\Http\Controllers;
use App\Models\Campo;
use Illuminate\Http\Request;
use PDF;

class CamposController extends Controller
{
    /*public function index()
    {
        $campos = Campo::all();

        return view('campos.index', ['campos'=>$campos]);
    }*/
    public function index(Request $request)
    {
       
        $arreglo= Campo::all();
        $campos=array();
       foreach($arreglo as $item){
        if($item->cedula==$request->user()->cedula){
            array_push($campos,$item);
        }
       }
        return view('campos.index', ['campos'=>$campos]);
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
        $campos=Campo::all();
      foreach($campos as $item){
          if($item->start==$hora. ' 00:00:00')
          {
            $a= new Campo();
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
      return view('campos.create',['arreglo'=>$arreglo,
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
          return redirect('/campos')->with('warning','No puede reservar mas de dos veces en un dia esta locacion');
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
        $campo = new Campo();
        $campo->title = "Reservado";
        $campo->hora = request('txtHora2');
        $campo->usuario =request('txtUsuario');
        $campo->visi1 = request('visi1');
        $campo->pare1 = request('parent1');
        $campo->visi2 = request('visi2');
        $campo->pare2 = request('parent2');
        $campo->visi3 = request('visi3');
        $campo->pare3 = request('parent3');
        $campo->visi4 = request('visi4');
        $campo->pare4 = request('parent4');
        $campo->visi5 = request('visi5');
        $campo->pare5 = request('parent5');
        $campo->visi6 = request('visi6');
        $campo->pare6 = request('parent6');
        $campo->visi7 = request('visi7');
        $campo->pare7 = request('parent7');
        $campo->color = '#0000FF';
        $campo->textColor = '#FFFFFF';
        $campo->start = request('txtFecha');
        $campo->end = request('txtFecha');
        $campo->cedula=request('cedula');
        $campo->save();

        return redirect('campos')->with('success','Reservacion realizada con exito');
        
    }

    public function show(Request $request)
    {
        //RECOLECTAMOS TODA LA INFORMACION GUARDADA EN LA BASE DE DATOS
        $arreglo= Campo::all();
        $campos=array();
       foreach($arreglo as $item){
        if($item->cedula==$request->user()->cedula){
            array_push($campos,$item);
        }
       }
        $data['campos'] =$campos;
        return response()->json($data['campos']);
    }


    public function downloadPDF($id){
        $campos = Campo::findOrFail($id);
        $pdf = PDF::loadView('eventos2', ['canchas'=>$campos]);
        //dd($pdf); 
        //return $pdf->download('cedula2.pdf');
        return redirect('campos');
    }

    public function edit($id)
    {
        $campos = Campo::findOrFail($id);
        $pdf = PDF::loadView('ReservacionCampo', ['campos'=>$campos]);
        //dd($pdf); 
        return $pdf->download('Reservacion-Cancha-2.pdf');
        //return redirect('eventos');
    }

 
    public function update(Request $request, $id)
    {
        $datosCampo = request()->except(['_token', '_method']);
        $respuesta = Campo::where('id','=', $id)->update($datosCampo);    

        return response()->json($respuesta);
    }


    public function destroy($id)
    {
        $campos = Campo::findOrFail($id);
        //LUEGO DESTRUIMOS 
        Campo::destroy($id);
        //RETORNA QUE SE ELIMINA
        return redirect('campos')->with('success','Reservacion eliminada con exito');
    }
}
