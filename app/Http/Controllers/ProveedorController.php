<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        // Obtener todos los proveedores
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo proveedor
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        // Validar los datos con mensajes personalizados
        $request->validate([
            'nombreProveedor' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/',
            'telefonoProveedor' => 'nullable|string|max:20|regex:/^\+?[0-9\s]+$/',
            'correoElectronicoProveedor' => 'nullable|email|max:100',
            'direccionProveedor' => 'nullable|string|max:255',
        ], [
            'nombreProveedor.required' => 'El nombre del proveedor es obligatorio.',
            'nombreProveedor.string' => 'El nombre del proveedor debe ser una cadena de texto.',
            'nombreProveedor.max' => 'El nombre del proveedor no puede exceder los 100 caracteres.',
            'nombreProveedor.regex' => 'El nombre del proveedor solo debe contener letras y espacios.',

            'telefonoProveedor.string' => 'El teléfono debe ser una cadena de texto.',
            'telefonoProveedor.max' => 'El teléfono no puede exceder los 20 caracteres.',
            'telefonoProveedor.regex' => 'El teléfono solo puede contener números y el símbolo "+" opcionalmente.',

            'correoElectronicoProveedor.email' => 'El correo electrónico debe ser una dirección válida.',
            'correoElectronicoProveedor.max' => 'El correo electrónico no puede exceder los 100 caracteres.',

            'direccionProveedor.string' => 'La dirección debe ser una cadena de texto.',
            'direccionProveedor.max' => 'La dirección no puede exceder los 255 caracteres.',
        ]);

        // Crear un nuevo proveedor
        Proveedor::create($request->all());

        // Redirigir al listado de proveedores
        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado exitosamente.');
    }

    public function edit($idProveedor)
    {
        // Buscar el proveedor por su ID
        $proveedor = Proveedor::findOrFail($idProveedor);
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, $idProveedor)
    {
        // Validar los datos con mensajes personalizados
        $request->validate([
            'nombreProveedor' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/',
            'telefonoProveedor' => 'nullable|string|max:20|regex:/^\+?[0-9\s]+$/',
            'correoElectronicoProveedor' => 'nullable|email|max:100',
            'direccionProveedor' => 'nullable|string|max:255',
        ], [
            'nombreProveedor.required' => 'El nombre del proveedor es obligatorio.',
            'nombreProveedor.string' => 'El nombre del proveedor debe ser una cadena de texto.',
            'nombreProveedor.max' => 'El nombre del proveedor no puede exceder los 100 caracteres.',
            'nombreProveedor.regex' => 'El nombre del proveedor solo debe contener letras y espacios.',

            'telefonoProveedor.string' => 'El teléfono debe ser una cadena de texto.',
            'telefonoProveedor.max' => 'El teléfono no puede exceder los 20 caracteres.',
            'telefonoProveedor.regex' => 'El teléfono solo puede contener números y el símbolo "+" opcionalmente.',

            'correoElectronicoProveedor.email' => 'El correo electrónico debe ser una dirección válida.',
            'correoElectronicoProveedor.max' => 'El correo electrónico no puede exceder los 100 caracteres.',

            'direccionProveedor.string' => 'La dirección debe ser una cadena de texto.',
            'direccionProveedor.max' => 'La dirección no puede exceder los 255 caracteres.',
        ]);

        // Actualizar el proveedor
        $proveedor = Proveedor::findOrFail($idProveedor);
        $proveedor->update($request->all());

        // Redirigir al listado de proveedores
        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado exitosamente.');
    }

    public function destroy($idProveedor)
    {
        // Buscar y eliminar el proveedor
        $proveedor = Proveedor::findOrFail($idProveedor);
        $proveedor->delete();

        // Redirigir al listado de proveedores
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado exitosamente.');
    }
}
