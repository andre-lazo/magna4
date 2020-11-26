<?php

namespace App\Http\Controllers;
use App\Models\Alberca;
use Illuminate\Http\Request;
use PDF;

class AlbercasController extends Controller
{
    public function index()
    {
        $albercas = Alberca::all();

        return view('albercas.index', ['albercas'=>$albercas]);
    }

    
    public function create()
    {
        //
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
        $alberca->save();

        return redirect('albercas')->with('success','Reservacion realizada con exito');

        
    }

    public function show()
    {
        //RECOLECTAMOS TODA LA INFORMACION GUARDADA EN LA BASE DE DATOS
        $data['albercas'] = Alberca::all();
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
        return response()->json($id);
    }
}
