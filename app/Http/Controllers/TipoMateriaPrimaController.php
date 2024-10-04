<?php

namespace App\Http\Controllers;

use App\Models\TipoMateriaPrima;
use Illuminate\Http\Request;

class TipoMateriaPrimaController extends Controller
{
    public function index()
    {
        // Obtener todos los tipos de materia prima
        $tiposdemateriaprima = TipoMateriaPrima::all();
        return view('tiposdemateriaprima.index', compact('tiposdemateriaprima'));
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo tipo de materia prima
        return view('tiposdemateriaprima.create');
    }

    public function store(Request $request)
    {
        // Validar los datos con mensajes personalizados
        $request->validate([
            'nombreTipoMateriaPrima' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/',
        ], [
            'nombreTipoMateriaPrima.required' => 'El nombre del tipo de materia prima es obligatorio.',
            'nombreTipoMateriaPrima.string' => 'El nombre del tipo de materia prima debe ser una cadena de texto.',
            'nombreTipoMateriaPrima.max' => 'El nombre del tipo de materia prima no puede exceder los 100 caracteres.',
            'nombreTipoMateriaPrima.regex' => 'El nombre del tipo de materia prima solo debe contener letras y espacios.',
        ]);

        // Crear un nuevo tipo de materia prima
        TipoMateriaPrima::create($request->all());

        // Redirigir al listado de tipos de materia prima
        return redirect()->route('tiposdemateriaprima.index')->with('success', 'Tipo de materia prima creado exitosamente.');
    }

    public function edit($idTipoMateriaPrima)
    {
        // Buscar el tipo de materia prima por su ID
        $tipomateriaprima = TipoMateriaPrima::findOrFail($idTipoMateriaPrima);
        return view('tiposdemateriaprima.edit', compact('tipomateriaprima'));
    }

    public function update(Request $request, $idTipoMateriaPrima)
    {
        // Validar los datos con mensajes personalizados
        $request->validate([
            'nombreTipoMateriaPrima' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/',
        ], [
            'nombreTipoMateriaPrima.required' => 'El nombre del tipo de materia prima es obligatorio.',
            'nombreTipoMateriaPrima.string' => 'El nombre del tipo de materia prima debe ser una cadena de texto.',
            'nombreTipoMateriaPrima.max' => 'El nombre del tipo de materia prima no puede exceder los 100 caracteres.',
            'nombreTipoMateriaPrima.regex' => 'El nombre del tipo de materia prima solo debe contener letras y espacios.',
        ]);

        // Actualizar el tipo de materia prima
        $tipomateriaprima = TipoMateriaPrima::findOrFail($idTipoMateriaPrima);
        $tipomateriaprima->update($request->all());

        // Redirigir al listado de tipos de materia prima
        return redirect()->route('tiposdemateriaprima.index')->with('success', 'Tipo de materia prima actualizado exitosamente.');
    }

    public function destroy($idTipoMateriaPrima)
    {
        // Buscar y eliminar el tipo de materia prima
        $tipomateriaprima = TipoMateriaPrima::findOrFail($idTipoMateriaPrima);
        $tipomateriaprima->delete();

        // Redirigir al listado de tipos de materia prima
        return redirect()->route('tiposdemateriaprima.index')->with('success', 'Tipo de materia prima eliminado exitosamente.');
    }
}
