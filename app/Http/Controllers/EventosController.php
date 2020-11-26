<?php

namespace App\Http\Controllers;
use App\Models\Evento;
use Illuminate\Http\Request;
use PDF;

class EventosController extends Controller
{
    
    public function index()
    {
        $eventos = Evento::all();

        return view('eventos.index', ['eventos'=>$eventos]);
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
        $evento->save();

        return redirect('eventos');

        
    }

    public function show()
    {
        //RECOLECTAMOS TODA LA INFORMACION GUARDADA EN LA BASE DE DATOS
        $data['eventos'] = Evento::all();
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
        return response()->json($id);
    }
}
