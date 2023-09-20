<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo; 

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = Equipo::all(); 
        return view('equipo.index')->with('equipos', $equipos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        
        return view('equipo.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $equipos = new Equipo();

        $equipos->nombre = $request->get('nombre');
        $equipos->ciudad = $request->get('ciudad');
        $equipos->jugadores = $request->get('jugadores');
        $equipos->division = $request->get('division');
        $equipos->user_id = $request->input('user_id');
        $equipos->save(); 

        return redirect('/equipo');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $equipo = Equipo::find($id); 
        return view('equipo.show', compact('equipo'));
        //return view('equipos.show', ['equipo' => $equipo]);//

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $equipo = Equipo::find($id); 
        return view('equipo.edit')->with('equipo', $equipo); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $equipo = Equipo::find($id); 

        $equipo->nombre = $request->get('nombre');
        $equipo->ciudad = $request->get('ciudad');
        $equipo->jugadores = $request->get('jugadores');
        $equipo->division = $request->get('division');

        $equipo->save(); 

        return redirect('/equipo');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $equipo = Equipo::find($id);
        $equipo->delete();
        return redirect('/equipo');
    }
}
