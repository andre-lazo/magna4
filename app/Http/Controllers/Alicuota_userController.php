<?php

namespace App\Http\Controllers;
use App\Models\Alicuota;
use Illuminate\Http\Request;

class Alicuota_userController extends Controller
{
   
    
    public function index(Request $request)
    {
       $datos=Alicuota::all();
        $alicuotas=array();
        foreach ($datos as $dato) {
            if($dato->cedula==$request->user()->cedula){
                array_push($alicuotas,$dato);
            }
        }
        if($alicuotas==null){
            return redirect('index')->with('success','Sin registro de alicuotas');
        }
       else{
        return view('user_cliente.alicuota',['alicuotas'=>$alicuotas]);
       }
       return null;
    }

   
}
