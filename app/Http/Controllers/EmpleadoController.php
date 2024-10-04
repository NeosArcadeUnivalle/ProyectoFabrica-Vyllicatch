<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class EmpleadoController extends Controller
{
    // Método para mostrar la lista de empleados
    public function index()
    {
        $empleados = Empleado::all(); // Obtener todos los empleados
        return view('empleados.index', compact('empleados')); // Retornar la vista con los empleados
    }

    // Método para mostrar el formulario de creación
    public function create()
    {
        return view('empleados.create'); // Retornar la vista para crear empleado
    }

    // Método para guardar un nuevo empleado
    public function store(Request $request)
    {
        // Validar los campos del formulario
        $request->validate([
            'correoElectronico' => ['required', 'email', 'max:100', 'unique:empleados,correoElectronico', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/'], // Validación del dominio @gmail.com
            'password' => 'required|min:6|max:255',
            'puesto' => 'nullable|max:50',
            'fechaContratacion' => 'nullable|date',
            'idPersona' => 'nullable|integer',
        ]);
    
        // Crear un nuevo empleado con los datos validados
        Empleado::create([
            'correoElectronico' => $request->correoElectronico,
            'password' => Hash::make($request->password), // Encriptar la contraseña
            'puesto' => $request->puesto,
            'fechaContratacion' => $request->fechaContratacion,
            'idPersona' => $request->idPersona,
        ]);
    
        // Redirigir a la lista de empleados con un mensaje de éxito
        return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente.');
    }
    

    // Método para mostrar el formulario de edición
    public function edit($idEmpleado)
    {
        // Buscar el empleado por su ID
        $empleado = Empleado::findOrFail($idEmpleado);
        return view('empleados.edit', compact('empleado')); // Retornar la vista de edición
    }

    // Método para actualizar un empleado existente
    public function update(Request $request, $idEmpleado)
{
    // Validar los campos del formulario
    $request->validate([
        'correoElectronico' => ['required', 'email', 'max:100', 'unique:empleados,correoElectronico,' . $idEmpleado . ',idEmpleado', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/'], // Validación del dominio @gmail.com
        'password' => 'required|min:6|max:255',
        'puesto' => 'nullable|max:50',
        'fechaContratacion' => 'nullable|date',
        'idPersona' => 'nullable|integer',
    ]);

    // Buscar el empleado por su ID
    $empleado = Empleado::findOrFail($idEmpleado);

    // Actualizar los datos del empleado
    $empleado->update([
        'correoElectronico' => $request->correoElectronico,
        'password' => Hash::make($request->password), // Encriptar la nueva contraseña
        'puesto' => $request->puesto,
        'fechaContratacion' => $request->fechaContratacion,
        'idPersona' => $request->idPersona,
    ]);

    // Redirigir a la lista de empleados con un mensaje de éxito
    return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente.');
}


    // Método para eliminar un empleado
    public function destroy($idEmpleado)
    {
        // Buscar el empleado por su ID
        $empleado = Empleado::findOrFail($idEmpleado);

        // Eliminar el empleado
        $empleado->delete();

        // Redirigir a la lista de empleados con un mensaje de éxito
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado exitosamente.');
    }
}
