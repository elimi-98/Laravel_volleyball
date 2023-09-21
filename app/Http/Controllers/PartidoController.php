<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;
use App\Models\Equipo;

class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $partidos = Partido::all(); 
        return view('partido.index') ->with('partidos', $partidos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipos = Equipo::all(); 
        return view('partido.create', compact('equipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $partidos = new Partido();
       
        $partidos->equipo_local = $request ->get('equipo_local');
        $partidos->equipo_visitante = $request ->get('equipo_visitante');
        $partidos->ciudad = $request ->get('ciudad');
        $partidos->fecha = $request ->get('fecha');

         $partidos-> save(); 
        
        return redirect('/partido'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partido = Partido::find($id);
        $partido->delete();
        return redirect('/partido');
    }
}
