<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserFormEdit;
use App\Models\User;
use App\Models\Residencia;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
     public function __construct(){
         
        $this->middleware('auth');
     }
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('search'));
            $users=User::where('name','LIKE','%'.$query.'%')->orderby('id','asc')
            ->simplepaginate(5);
            return view('users.index',['users'=>$users,'search'=>$query]);
        }
    }

  
    public function create()
    {
        $residencia=Residencia::all();
        return \view('users.create',['residencias'=>$residencia]);
    }

  
    public function store(UserFormRequest $request)
    {
        $usuario= new User();
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password= bcrypt($request->get('password'));
        $usuario->cedula=$request->get('cedula');
        $usuario->residencia_id=$request->get('residencia');
        $usuario->apellido=$request->get('apellido');
        $usuario->rol=$request->get('rol');
        if($request->hasFile('imagen'))
        {

            $file=$request->imagen;
            $file->move(public_path() . '/img',$file->getClientOriginalName());
            $usuario->imagen=$file->getClientOriginalName();
        }
        $usuario->save();
        $usuario->assignRole($request->get($usuario->rol));
       
        return redirect('/user')->with('success','Usuario '.$usuario->name.' Registrado correctamente');
    }

    public function show($id)
    {
        $user=User::findOrFail(Crypt::decrypt($id));
        return \view('users.view',['user'=>$user]);

    }

   
    public function edit($id)
    {
        $residencia=Residencia::all();
        return view('users.edit',['user'=> User::findOrFail($id),'residencias'=>$residencia]);
    }

    
    public function update(UserFormEdit $request, $id)
    {
        $this->validate(request(),['email'=>['required','email','max:255','unique:users,email,'.$id]]);
        $this->validate(request(),['cedula'=>['required','max:10','min:10','unique:users,cedula,'.$id]]);
        $usuario=User::findOrFail($id); 
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->cedula=$request->get('cedula');
        $usuario->residencia_id=$request->get('residencia');
        $usuario->apellido=$request->get('apellido');
        $usuario->update();
        return redirect('/user')->with('success','Usuario '.$usuario->name.' Actualizado correctamente');
    }

    
    public function destroy($id)
    {
        $usuario=User::findOrFail($id);
        $usuario->delete();
        return redirect('user')->with('success','Usuario '.$usuario->name.' Borrado correctamente');
    }
}
