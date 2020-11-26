<?php

namespace App\Http\Controllers;

use App\Models\Alicuota;
use Illuminate\Http\Request;
use App\Models\Residencia;
use App\Models\User;
class AlicuotaController extends Controller
{
    public function __construct(){
         
        $this->middleware('auth');
     }
    public function index()
    {
        $alicuota=Alicuota::all();
        $residencia=Residencia::all();
        $usuario=User::all();
        return \view('alicuotas.index',['alicuotas'=>$alicuota,'residencias'=>$residencia,'usuarios'=>$usuario]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       list($nombre,$apellido,$cedula)= explode("-",$request->get('propietario'),3);
        $alicuota= new Alicuota();
        $alicuota->nombre=$nombre;
        $alicuota->apellido=$apellido;
        $alicuota->cedula=$cedula;
        $alicuota->cod_MnzV=$request->get('residencia');
        $alicuota->fecha_inicio=$request->get('fecha_inicio');
        $alicuota->fecha_final=$request->get('fecha_fin');
        $alicuota->cuotas_totales=$request->get('cuotas_totales');
        $alicuota->valor_total=$request->get('valor_total');
        $alicuota->cuotas_pagadas=$request->get('cuotas_pagadas');
        $alicuota->valor_pagado=$request->get('valor_pagado');
        $alicuota->cuotas_adeudadas=$request->get('cuotas_adeudadas');
        $alicuota->valor_adeudado=$request->get('valor_adeudado');
        $alicuota->save();
        return \redirect('alicuota')->with('success','Alicuota de '.$alicuota->nombre.' registrada correctamente');

    }

    public function show($id)
    {
        $alicuota=Alicuota::findOrFail($id);
        return view('alicuotas.view',['alicuota'=>$alicuota]);

    }

    public function edit( $id)
    { $residencia=Residencia::all();
        $usuario=User::all();
        $alicuota=Alicuota::findOrFail($id);
        return view('alicuotas.edit',['alicuota'=>$alicuota,'residencias'=>$residencia,'usuarios'=>$usuario]);
    }


    public function update(Request $request,  $id)
    {
        list($nombre,$apellido,$cedula)= explode("-",$request->get('propietario'),3);
        $alicuota= Alicuota::findOrFail($id); 
        $alicuota->nombre=$nombre;
        $alicuota->apellido=$apellido;
        $alicuota->cedula=$cedula;
        $alicuota->cod_MnzV=$request->get('residencia');
        $alicuota->fecha_inicio=$request->get('fecha_inicio');
        $alicuota->fecha_final=$request->get('fecha_fin');
        $alicuota->cuotas_totales=$request->get('cuotas_totales');
        $alicuota->valor_total=$request->get('valor_total');
        $alicuota->cuotas_pagadas=$request->get('cuotas_pagadas');
        $alicuota->valor_pagado=$request->get('valor_pagado');
        $alicuota->cuotas_adeudadas=$request->get('cuotas_adeudadas');
        $alicuota->valor_adeudado=$request->get('valor_adeudado');
        $alicuota->update();
        return \redirect('alicuota')->with('success','Alicuota de '.$alicuota->nombre.' actualizada correctamente');

    }

    /**
     * Remove the specified resource from storage.  
     *
     * @param  \App\Models\Alicuota  $alicuota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alicuota $alicuota)
    {
        //
    }
}
