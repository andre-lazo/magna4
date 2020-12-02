<?php

namespace App\Http\Controllers;
use App\Models\Alberca;
use Illuminate\Http\Request;
use PDF;

class AlbercasController extends Controller
{
    public function index(Request $request)
    {
       
        $arreglo= Alberca::all();
        $albercas=array();
       foreach($arreglo as $item){
        if($item->cedula==$request->user()->cedula){
            array_push($albercas,$item);
        }
       }
        return view('albercas.index', ['albercas'=>$albercas]);
    }

    
    public function create(Request $request)
    {   $bool1=false;   
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
        $albercas=Alberca::all();
      foreach($albercas as $item){
          if($item->start==$hora. ' 00:00:00')
          {
            $a= new Alberca();
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
      return view('albercas.create',['arreglo'=>$arreglo,
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
          return redirect('/albercas')->with('warning','No puede reservar mas de dos veces en un dia esta locacion');
      }
    }

  
    public function store()
    {
       
        $alberca = new Alberca();
        $alberca->title = "Reservado";
        $alberca->hora = request('txtHora2');
        $alberca->usuario =request('txtUsuario');
        $alberca->visi1 = request('visi1');
        $alberca->pare1 = request('parent1');
        $alberca->visi2 = request('visi2');
        $alberca->pare2 = request('parent2');
        $alberca->visi3 = request('visi3');
        $alberca->pare3 = request('parent3');
        $alberca->visi4 = request('visi4');
        $alberca->pare4 = request('parent4');
        $alberca->visi5 = request('visi5');
        $alberca->pare5 = request('parent5');
        $alberca->visi6 = request('visi6');
        $alberca->pare6 = request('parent6');
        $alberca->visi7 = request('visi7');
        $alberca->pare7 = request('parent7');
        $alberca->color = '#0000FF';
        $alberca->textColor = '#FFFFFF';
        $alberca->start = request('txtFecha');
        $alberca->end = request('txtFecha');
        $alberca->cedula=request('cedula');
        $alberca->save();

        return redirect('albercas')->with('success','Reservacion realizada con exito');

        
    }

    public function show(Request $request)
    {
        $arreglo= Alberca::all();
        $albercas=array();
       foreach($arreglo as $item){
        if($item->cedula==$request->user()->cedula){
            array_push($albercas,$item);
        }
       }
        $data['albercas'] =$albercas;
        return response()->json($data['albercas']);

         
      
    }
   


    public function downloadPDF($id){
        $alberca = Alberca::findOrFail($id);
        $pdf = PDF::loadView('eventos2', ['albercas'=>$alberca]);
        //dd($pdf); 
        //return $pdf->download('cedula2.pdf');
        return redirect('albercas');
    }

    public function edit($id)
    {
        $alberca = Alberca::findOrFail($id);
        $pdf = PDF::loadView('ReservacionPiscina', ['albercas'=>$alberca]);
        //dd($pdf); 
        return $pdf->download('Reservacion-Piscina.pdf');
        //return redirect('eventos');
    }

 
    public function update(Request $request, $id)
    {
        $datosAlberca = request()->except(['_token', '_method']);
        $respuesta = Alberca::where('id','=', $id)->update($datosAlberca);    

        return response()->json($respuesta);
    }


    public function destroy($id)
    {
        //RECUPERAMO LOS ELEMENTOS EN EVENTOS
        $albercas = Alberca::findOrFail($id);
        //LUEGO DESTRUIMOS 
        Alberca::destroy($id);
        //RETORNA QUE SE ELIMINA
        return redirect('albercas')->with('success','Reservacion eliminada con exito');
    }
}
