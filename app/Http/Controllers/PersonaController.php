<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las personas
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personas.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos con mensajes personalizados
        $request->validate([
            'nombre' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/',
            'apellido' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
            'nombre.regex' => 'El nombre solo debe contener letras y espacios.',

            'apellido.required' => 'El apellido es obligatorio.',
            'apellido.string' => 'El apellido debe ser una cadena de texto.',
            'apellido.max' => 'El apellido no puede superar los 100 caracteres.',
            'apellido.regex' => 'El apellido solo debe contener letras y espacios.',
        ]);

        // Crear una nueva persona con los datos validados
        Persona::create($request->all());

        // Redirigir al listado de personas
        return redirect()->route('personas.index')->with('success', 'Persona creada exitosamente.');
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
    public function edit($idPersona)
    {
        // Buscar la persona por su ID
        $persona = Persona::findOrFail($idPersona);
        return view('personas.edit', compact('persona'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idPersona)
    {
        // Validar los datos con mensajes personalizados
        $request->validate([
            'nombre' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/',
            'apellido' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
            'nombre.regex' => 'El nombre solo debe contener letras y espacios.',

            'apellido.required' => 'El apellido es obligatorio.',
            'apellido.string' => 'El apellido debe ser una cadena de texto.',
            'apellido.max' => 'El apellido no puede superar los 100 caracteres.',
            'apellido.regex' => 'El apellido solo debe contener letras y espacios.',
        ]);

        // Buscar la persona por su ID
        $persona = Persona::findOrFail($idPersona);

        // Actualizar los datos de la persona
        $persona->update($request->all());

        // Redirigir al listado de personas
        return redirect()->route('personas.index')->with('success', 'Persona actualizada exitosamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idPersona)
    {
        // Buscar y eliminar la persona
        $persona = Persona::findOrFail($idPersona);
        $persona->delete();

        // Redirigir al listado de personas
        return redirect()->route('personas.index')->with('success', 'Persona eliminada exitosamente.');
    }
}
