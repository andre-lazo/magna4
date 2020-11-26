<?php

namespace App\Http\Controllers;
use App\Models\Cancha;
use Illuminate\Http\Request;
use PDF;

class CanchasController extends Controller
{
    public function index()
    {
        $canchas = Cancha::all();

        return view('canchas.index', ['canchas'=>$canchas]);
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
        $cancha->save();

        return redirect('canchas');

        
    }

    public function show()
    {
        //RECOLECTAMOS TODA LA INFORMACION GUARDADA EN LA BASE DE DATOS
        $data['canchas'] = Cancha::all();
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
        return response()->json($id);
    }

}
