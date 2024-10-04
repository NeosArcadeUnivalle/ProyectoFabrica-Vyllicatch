<?php

namespace App\Http\Controllers;

use App\Models\TipoLadrillo;
use Illuminate\Http\Request;

class TipoLadrilloController extends Controller
{
    public function index()
    {
        // Obtener todos los tipos de ladrillo
        $tiposladrillos = TipoLadrillo::all();
        return view('tiposladrillos.index', compact('tiposladrillos'));
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo tipo de ladrillo
        return view('tiposladrillos.create');
    }

    public function store(Request $request)
    {
        // Validar los datos con mensajes personalizados
        $request->validate([
            'tipoLadrillo' => 'required|string|max:45|regex:/^[a-zA-Z\s]+$/',
        ], [
            'tipoLadrillo.required' => 'El nombre del tipo de ladrillo es obligatorio.',
            'tipoLadrillo.string' => 'El tipo de ladrillo debe ser una cadena de texto.',
            'tipoLadrillo.max' => 'El tipo de ladrillo no puede exceder los 45 caracteres.',
            'tipoLadrillo.regex' => 'El tipo de ladrillo solo debe contener letras y espacios.',
        ]);

        // Crear un nuevo tipo de ladrillo
        TipoLadrillo::create($request->all());

        // Redirigir al listado de tipos de ladrillo
        return redirect()->route('tiposladrillos.index')->with('success', 'Tipo de ladrillo creado exitosamente.');
    }

    public function edit($idTipoLadrillos)
    {
        // Buscar el tipo de ladrillo por su ID
        $tipoladrillo = TipoLadrillo::findOrFail($idTipoLadrillos);
        return view('tiposladrillos.edit', compact('tipoladrillo'));
    }

    public function update(Request $request, $idTipoLadrillos)
    {
        // Validar los datos con mensajes personalizados
        $request->validate([
            'tipoLadrillo' => 'required|string|max:45|regex:/^[a-zA-Z\s]+$/',
        ], [
            'tipoLadrillo.required' => 'El nombre del tipo de ladrillo es obligatorio.',
            'tipoLadrillo.string' => 'El tipo de ladrillo debe ser una cadena de texto.',
            'tipoLadrillo.max' => 'El tipo de ladrillo no puede exceder los 45 caracteres.',
            'tipoLadrillo.regex' => 'El tipo de ladrillo solo debe contener letras y espacios.',
        ]);

        // Actualizar el tipo de ladrillo
        $tipoladrillo = TipoLadrillo::findOrFail($idTipoLadrillos);
        $tipoladrillo->update($request->all());

        // Redirigir al listado de tipos de ladrillo
        return redirect()->route('tiposladrillos.index')->with('success', 'Tipo de ladrillo actualizado exitosamente.');
    }

    public function destroy($idTipoLadrillos)
    {
        // Buscar y eliminar el tipo de ladrillo
        $tipoladrillo = TipoLadrillo::findOrFail($idTipoLadrillos);
        $tipoladrillo->delete();

        // Redirigir al listado de tipos de ladrillo
        return redirect()->route('tiposladrillos.index')->with('success', 'Tipo de ladrillo eliminado exitosamente.');
    }
}
