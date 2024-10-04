<?php

namespace App\Http\Controllers;

use App\Models\MateriaPrima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MateriaPrimaController extends Controller
{
    public function index()
    {
        // Obtener toda la materia prima
        $materiaprima = MateriaPrima::all();
        return view('materiaprima.index', compact('materiaprima'));
    }

    public function create()
    {
        // Mostrar el formulario para crear nueva materia prima
        return view('materiaprima.create');
    }

    public function store(Request $request)
    {
        // Validar los datos con mensajes personalizados
        $request->validate([
            'nombreMateriaPrima' => 'required|max:100',
            'cantidadDisponible' => 'required|integer|min:0',
            'fechaUltimaCompra' => 'required|date',
            'idProveedor' => 'nullable|integer|exists:proveedores,idProveedor', // Validación que el proveedor exista
            'idTipoMateriaPrima' => 'nullable|integer|exists:tiposdemateriaprima,idTipoMateriaPrima', // Validación que el tipo exista
        ], [
            'nombreMateriaPrima.required' => 'El nombre de la materia prima es obligatorio.',
            'nombreMateriaPrima.max' => 'El nombre de la materia prima no puede superar los 100 caracteres.',
            'cantidadDisponible.required' => 'La cantidad disponible es obligatoria.',
            'cantidadDisponible.numeric' => 'La cantidad disponible debe ser un número.',
            'cantidadDisponible.min' => 'La cantidad disponible debe ser un número positivo.',
            'fechaUltimaCompra.required' => 'La fecha de la última compra es obligatoria.',
            'fechaUltimaCompra.date' => 'La fecha de la última compra debe ser una fecha válida.',
            'idProveedor.exists' => 'El proveedor seleccionado no es válido.',
            'idTipoMateriaPrima.exists' => 'El tipo de materia prima seleccionado no es válido.',
        ]);

        // Crear nueva materia prima
        MateriaPrima::create($request->all());

        // Redirigir al listado de materia prima
        return redirect()->route('materiaprima.index')->with('success', 'Materia prima creada exitosamente.');
    }

    public function edit($idMaterial)
    {
        // Buscar la materia prima por su ID
        $materiaprima = MateriaPrima::findOrFail($idMaterial);
        return view('materiaprima.edit', compact('materiaprima'));
    }

    public function update(Request $request, $idMaterial)
    {
        // Validar los datos con mensajes personalizados
        $request->validate([
            'nombreMateriaPrima' => 'required|max:100',
            'cantidadDisponible' => 'required|integer|min:0',
            'fechaUltimaCompra' => 'required|date',
            'idProveedor' => 'nullable|integer|exists:proveedores,idProveedor', // Validación que el proveedor exista
            'idTipoMateriaPrima' => 'nullable|integer|exists:tiposdemateriaprima,idTipoMateriaPrima', // Validación que el tipo exista
        ], [
            'nombreMateriaPrima.required' => 'El nombre de la materia prima es obligatorio.',
            'nombreMateriaPrima.max' => 'El nombre de la materia prima no puede superar los 100 caracteres.',
            'cantidadDisponible.required' => 'La cantidad disponible es obligatoria.',
            'cantidadDisponible.numeric' => 'La cantidad disponible debe ser un número.',
            'cantidadDisponible.min' => 'La cantidad disponible debe ser un número positivo.',
            'fechaUltimaCompra.required' => 'La fecha de la última compra es obligatoria.',
            'fechaUltimaCompra.date' => 'La fecha de la última compra debe ser una fecha válida.',
            'idProveedor.exists' => 'El proveedor seleccionado no es válido.',
            'idTipoMateriaPrima.exists' => 'El tipo de materia prima seleccionado no es válido.',
        ]);

        // Actualizar la materia prima
        $materiaprima = MateriaPrima::findOrFail($idMaterial);
        $materiaprima->update($request->all());

        // Redirigir al listado de materia prima
        return redirect()->route('materiaprima.index')->with('success', 'Materia prima actualizada exitosamente.');
    }

    public function destroy($idMaterial)
    {
        // Buscar y eliminar la materia prima
        $materiaprima = MateriaPrima::findOrFail($idMaterial);
        $materiaprima->delete();

        // Redirigir al listado de materia prima
        return redirect()->route('materiaprima.index')->with('success', 'Materia prima eliminada exitosamente.');
    }
}
