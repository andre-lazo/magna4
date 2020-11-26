<?php

namespace App\Http\Controllers;
use App\Models\Campo;
use Illuminate\Http\Request;
use PDF;

class CamposController extends Controller
{
    public function index()
    {
        $campos = Campo::all();

        return view('campos.index', ['campos'=>$campos]);
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
        $campo->save();

        return redirect('campos');

        
    }

    public function show()
    {
        //RECOLECTAMOS TODA LA INFORMACION GUARDADA EN LA BASE DE DATOS
        $data['campos'] = Campo::all();
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
        //RECUPERAMO LOS ELEMENTOS EN EVENTOS
        $campos = Campo::findOrFail($id);
        //LUEGO DESTRUIMOS 
        Campo::destroy($id);
        //RETORNA QUE SE ELIMINA
        return response()->json($id);
    }
}
