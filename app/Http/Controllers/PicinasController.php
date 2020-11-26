<?php

namespace App\Http\Controllers;
use App\Models\Picina;
use Illuminate\Http\Request;
use PDF;

class PicinasController extends Controller
{
    public function index()
    {
        $picinas = Picina::all();

        return view('picinas.index', ['picinas'=>$picinas]);
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
        $picina = new Picina();
        $picina->title = request('txtHora2');
        $picina->hora = request('txtHora2');
        $picina->usuario =request('txtUsuario');
        $picina->visi1 = request('visi1');
        $picina->pare1 = request('parent1');
        $picina->visi2 = request('visi2');
        $picina->pare2 = request('parent2');
        $picina->visi3 = request('visi3');
        $picina->pare3 = request('parent3');
        $picina->visi4 = request('visi4');
        $picina->pare4 = request('parent4');
        $picina->visi5 = request('visi5');
        $picina->pare5 = request('parent5');
        $picina->visi6 = request('visi6');
        $picina->pare6 = request('parent6');
        $picina->visi7 = request('visi7');
        $picina->pare7 = request('parent7');
        $picina->color = '#00FF00';
        $picina->textColor = '#FFFFFF';
        $picina->start = request('txtFecha');
        $picina->end = request('txtFecha');
        $picina->save();

        return view('picinas.index');

        
    }

    public function show()
    {
        //RECOLECTAMOS TODA LA INFORMACION GUARDADA EN LA BASE DE DATOS
        $data['picinas'] = Picina::all();
        return response()->json($data['picinas']);
    }


    public function downloadPDF($id){
        $picina = Picina::findOrFail($id);
        $pdf = PDF::loadView('eventos2', ['canchas'=>$picina]);
        //dd($pdf); 
        //return $pdf->download('cedula2.pdf');
        return redirect('canchas');
    }

    public function edit($id)
    {
        $picina = Picina::findOrFail($id);
        $pdf = PDF::loadView('ReservacionPiscina', ['picina'=>$picina]);
        //dd($pdf); 
        return $pdf->download('Reservacion-Piscina.pdf');
        //return redirect('eventos');
    }

 
    public function update(Request $request, $id)
    {
        $datosPicina = request()->except(['_token', '_method']);
        $respuesta = Picina::where('id','=', $id)->update($datosPicina);    

        return response()->json($respuesta);
    }


    public function destroy($id)
    {
        //RECUPERAMO LOS ELEMENTOS EN EVENTOS
        $picinas = Picina::findOrFail($id);
        //LUEGO DESTRUIMOS 
        Picina::destroy($id);
        //RETORNA QUE SE ELIMINA
        return response()->json($id);
    }
}
