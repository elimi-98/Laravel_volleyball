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
        $request->validate([
            'equipo_local' => 'required',
            'equipo_visitante' => 'required|different:equipo_local',
            'fecha' => 'required',
            'hora' => 'required',
        ]);
        
        $partido = new Partido();
    
        
        $equipoLocalId = $request->input('equipo_local');
        
        
        $equipoLocal = Equipo::find($equipoLocalId);
        $ciudad = $equipoLocal->ciudad;
        
        
        $partido->equipo_local = $equipoLocalId;
        $partido->equipo_visitante = $request->input('equipo_visitante');
        $partido->ciudad = $ciudad; // Asignar la ciudad obtenida
        $partido->fecha = $request->input('fecha');
        $partido->hora = $request->input('hora');

    
        $partido->save();

        return redirect('/partido'); 
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $partido = Partido::find($id); 
        return view('partido.show', compact('partido'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $partido = Partido::find($id);
        $equipos = Equipo::all(); 
       /* return view('partido.edit')->with('partido', $partido);*/
        return view('partido.edit', compact('partido', 'equipos')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   

        $request->validate([
            'equipo_local'=> 'required',
            'equipo_visitante'=> 'required|different:equipo_local',
            'fecha' => 'required',
            'hora'=> 'required',
        ]); 

        $partido = Partido::find($id);
       
        $partido->equipo_local = $request ->get('equipo_local');
        $partido->equipo_visitante = $request ->get('equipo_visitante');

        $equipo_local = Equipo::find($request->get('equipo_local'));
        $partido->ciudad = $equipo_local->ciudad;

        $partido->fecha = $request ->get('fecha');
        $partido->hora = $request ->get('hora');


         $partido-> save(); 
        
        return redirect('/partido'); 
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
