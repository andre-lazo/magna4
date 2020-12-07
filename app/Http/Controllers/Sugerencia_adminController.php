<?php

namespace App\Http\Controllers;
use App\Models\Sugerencia;

use Illuminate\Http\Request;

class Sugerencia_adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('search'));
            $sugerencias=Sugerencia::where('nombre','LIKE','%'.$query.'%')->orderby('id','asc')
            ->simplepaginate(5);
            return \view('sugerencias.index_admin',['sugerencias'=>$sugerencias]);
        }else{
            $sugerencias=Sugerencia::all();
            return \view('sugerencias.index_admin',['sugerencias'=>$sugerencias]);
        }
     
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sugerencia=Sugerencia::findOrFail($id);
        $sugerencia->estado=$request->get('estado');
        $sugerencia->update();
        return \redirect('/sugerencia');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
