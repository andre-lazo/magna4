<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    public function index()
    {
        $evento=Evento::all();
        $evento=$evento->sortByDesc('id');

        return view('reservas.salon',['eventos'=>$evento]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $evento= Evento::findOrFail(Crypt::decrypt($id));
        $evento=$evento->sortByDesc('id');

        return view('reservas.view',['evento'=>$evento]);
    }

    public function edit(Evento $evento)
    {
        //
    }

    public function update(Request $request, Evento $evento)
    {
        //
    }

    public function destroy(Evento $evento)
    {
        //
    }
}
