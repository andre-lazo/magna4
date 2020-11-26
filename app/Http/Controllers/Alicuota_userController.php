<?php

namespace App\Http\Controllers;
use App\Models\Alicuota;
use Illuminate\Http\Request;

class Alicuota_userController extends Controller
{
   
    
    public function index(Request $request)
    {
       
        $alicuotas=Alicuota::where('cedula','=',$request->user()->cedula)->first();
        if($alicuotas==null){
            return redirect('index')->with('success','Sin registro de alicuotas');
        }
       else{
        return view('user_cliente.alicuota',['alicuota'=>$alicuotas]);
       }
       return null;
    }

   
}
