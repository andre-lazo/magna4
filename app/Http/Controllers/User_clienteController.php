<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
class User_clienteController extends Controller
{


    public function show($id)
    {
        $user=User::findOrFail(Crypt::decrypt($id));
        return \view('user_cliente.profile',['user'=>$user]);

    }
}
