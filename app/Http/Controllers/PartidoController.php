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
        // Validación de los datos del formulario aquí...

        // Crear una nueva instancia de Partido
        $partido = new Partido();
    
        // Obtener el ID del equipo local desde la solicitud
        $equipoLocalId = $request->input('equipo_local');
        
        // Usar la relación para obtener el equipo local y su ciudad
        $equipoLocal = Equipo::find($equipoLocalId);
        $ciudad = $equipoLocal->ciudad;
        
        // Asignar los valores al partido
        $partido->equipo_local = $equipoLocalId;
        $partido->equipo_visitante = $request->input('equipo_visitante');
        $partido->ciudad = $ciudad; // Asignar la ciudad obtenida
        $partido->fecha = $request->input('fecha');
        $partido->hora = $request->input('hora');

        
        // Otras asignaciones de campos si es necesario...
        
        // Guardar el partido
        $partido->save();

        // Redireccionar a la página de partidos
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
