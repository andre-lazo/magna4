<?php

namespace App\Http\Controllers;
use App\Models\Futbol;
use Illuminate\Http\Request;
use PDF;

class FutbolsController extends Controller
{
    public function index(Request $request)
    {
       
        $arreglo= Futbol::all();
        $futbols=array();
       foreach($arreglo as $item){
        if($item->cedula==$request->user()->cedula){
            array_push($futbols,$item);
        }
       }
        return view('futbols.index', ['futbols'=>$futbols]);
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
        $futbols=Futbol::all();
      foreach($futbols as $item){
          if($item->start==$hora. ' 00:00:00')
          {
            $a= new Futbol();
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
      return view('futbols.create',['arreglo'=>$arreglo,
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
          return redirect('/futbols')->with('warning','No puede reservar mas de dos veces en un dia esta locacion');
      }
    }

  
    public function store()
    {
       
        $futbol = new Futbol();
        $futbol->title = "Reservado";
        $futbol->hora = request('txtHora2');
        $futbol->usuario =request('txtUsuario');
        $futbol->visi1 = request('visi1');
        $futbol->pare1 = request('parent1');
        $futbol->visi2 = request('visi2');
        $futbol->pare2 = request('parent2');
        $futbol->visi3 = request('visi3');
        $futbol->pare3 = request('parent3');
        $futbol->visi4 = request('visi4');
        $futbol->pare4 = request('parent4');
        $futbol->visi5 = request('visi5');
        $futbol->pare5 = request('parent5');
        $futbol->visi6 = request('visi6');
        $futbol->pare6 = request('parent6');
        $futbol->visi7 = request('visi7');
        $futbol->pare7 = request('parent7');
        $futbol->color = '#0000FF';
        $futbol->textColor = '#FFFFFF';
        $futbol->start = request('txtFecha');
        $futbol->end = request('txtFecha');
        $futbol->cedula=request('cedula');
        $futbol->save();

        return redirect('futbols')->with('success','Reservacion realizada con exito');

        
    }

    public function show(Request $request)
    {
        $arreglo= Futbol::all();
        $futbols=array();
       foreach($arreglo as $item){
        if($item->cedula==$request->user()->cedula){
            array_push($futbols,$item);
        }
       }
        $data['futbols'] =$futbols;
        return response()->json($data['futbols']);

         
      
    }
   


    public function downloadPDF($id){
        $futbol = Futbol::findOrFail($id);
        $pdf = PDF::loadView('eventos2', ['futbols'=>$futbol]);
        //dd($pdf); 
        //return $pdf->download('cedula2.pdf');
        return redirect('albercas');
    }

    public function edit($id)
    {
        $futbol = Futbol::findOrFail($id);
        $pdf = PDF::loadView('ReservacionCesped', ['futbols'=>$futbol]);
        //dd($pdf); 
        return $pdf->download('Reservacion-Cesped.pdf');
        //return redirect('eventos');
    }

 
    public function update(Request $request, $id)
    {
        $datosFutbol = request()->except(['_token', '_method']);
        $respuesta = Futbol::where('id','=', $id)->update($datosFutbol);    

        return response()->json($respuesta);
    }


    public function destroy($id)
    {
        //RECUPERAMO LOS ELEMENTOS EN EVENTOS
        $futbols = Futbol::findOrFail($id);
        //LUEGO DESTRUIMOS 
        Futbol::destroy($id);
        //RETORNA QUE SE ELIMINA
        return redirect('futbols')->with('success','Reservacion eliminada con exito');
    }
}
