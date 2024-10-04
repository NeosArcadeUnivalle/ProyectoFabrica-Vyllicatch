<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductoController extends Controller
{
    public function index()
    {
        // Obtener todos los productos
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo producto
        return view('productos.create');
    }

    public function store(Request $request)
    {
        // Validar los datos con mensajes personalizados
        $request->validate([
            'nombreProducto' => 'required|string|max:100|regex:/^[a-zA-Z0-9\s]+$/',
            'cantidadDisponible' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'idTipoLadrillo' => 'required|integer|exists:tiposladrillos,idTipoLadrillos',
        ], [
            'nombreProducto.required' => 'El nombre del producto es obligatorio.',
            'nombreProducto.string' => 'El nombre del producto debe ser una cadena de texto.',
            'nombreProducto.max' => 'El nombre del producto no puede exceder los 100 caracteres.',
            'nombreProducto.regex' => 'El nombre del producto solo debe contener letras, números y espacios.',

            'cantidadDisponible.required' => 'La cantidad disponible es obligatoria.',
            'cantidadDisponible.integer' => 'La cantidad disponible debe ser un número entero.',
            'cantidadDisponible.min' => 'La cantidad disponible debe ser mayor o igual a 0.',

            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un valor numérico.',
            'precio.min' => 'El precio debe ser un número mayor o igual a 0.',

            'idTipoLadrillo.required' => 'El tipo de ladrillo es obligatorio.',
            'idTipoLadrillo.integer' => 'El tipo de ladrillo debe ser un número entero válido.',
            'idTipoLadrillo.exists' => 'El tipo de ladrillo seleccionado no es válido.',
        ]);

        // Crear un nuevo producto
        Producto::create($request->all());

        // Redirigir al listado de productos
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit($idProducto)
    {
        // Buscar el producto por su ID
        $producto = Producto::findOrFail($idProducto);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $idProducto)
    {
        // Validar los datos con mensajes personalizados
        $request->validate([
            'nombreProducto' => 'required|string|max:100|regex:/^[a-zA-Z0-9\s]+$/',
            'cantidadDisponible' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'idTipoLadrillo' => 'required|integer|exists:tiposladrillos,idTipoLadrillos',
        ], [
            'nombreProducto.required' => 'El nombre del producto es obligatorio.',
            'nombreProducto.string' => 'El nombre del producto debe ser una cadena de texto.',
            'nombreProducto.max' => 'El nombre del producto no puede exceder los 100 caracteres.',
            'nombreProducto.regex' => 'El nombre del producto solo debe contener letras, números y espacios.',

            'cantidadDisponible.required' => 'La cantidad disponible es obligatoria.',
            'cantidadDisponible.integer' => 'La cantidad disponible debe ser un número entero.',
            'cantidadDisponible.min' => 'La cantidad disponible debe ser mayor o igual a 0.',

            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un valor numérico.',
            'precio.min' => 'El precio debe ser un número mayor o igual a 0.',

            'idTipoLadrillo.required' => 'El tipo de ladrillo es obligatorio.',
            'idTipoLadrillo.integer' => 'El tipo de ladrillo debe ser un número entero válido.',
            'idTipoLadrillo.exists' => 'El tipo de ladrillo seleccionado no es válido.',
        ]);

        // Actualizar el producto
        $producto = Producto::findOrFail($idProducto);
        $producto->update($request->all());

        // Redirigir al listado de productos
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($idProducto)
    {
        // Buscar y eliminar el producto
        $producto = Producto::findOrFail($idProducto);
        $producto->delete();

        // Redirigir al listado de productos
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
