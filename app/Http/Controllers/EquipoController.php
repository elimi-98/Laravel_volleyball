<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo; 
use Illuminate\Support\Facades\Auth;

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

        $request->validate([
            'nombre'=> 'required|max:20',
            'ciudad'=> 'required|max:20',
            'jugadores'=> 'required|integer|min:5|max:20',
            'division'=> 'required|integer|min:1|max:10',
        ]); 
      
    // Verificar si el usuario está autenticado.
        if (Auth::check()) {
            // Obtener el usuario autenticado actualmente.
            $user = Auth::user(); // Utilizar Auth::user() para obtener el usuario autenticado.

            // Crear un nuevo equipo y asignar valores.
            $equipo = new Equipo();
            $equipo->nombre = $request->input('nombre');
            $equipo->ciudad = $request->input('ciudad');
            $equipo->jugadores = $request->input('jugadores');
            $equipo->division = $request->input('division');

            // Asignar el ID del usuario al campo user_id.
            $equipo->user_id = $user->id;

            // Guardar el equipo.
            $equipo->save();

            // Redireccionar o mostrar un mensaje de éxito.
            return redirect('/equipo')->with('success', 'Equipo creado exitosamente');
        } else {
            // Manejar el caso en el que el usuario no esté autenticado.
            return redirect('/login')->with('error', 'Debes iniciar sesión para crear un equipo');
        }
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

        $request->validate([
            'nombre'=> 'required|max:20',
            'ciudad'=> 'required|max:20',
            'jugadores'=> 'required|integer|max:20',
            'division'=> 'required|integer|max:10',
        ]); 

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
