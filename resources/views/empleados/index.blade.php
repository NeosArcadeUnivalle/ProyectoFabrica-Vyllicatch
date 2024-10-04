<h2>Lista de Empleados</h2>
<a href="{{ route('empleados.create') }}">Crear Nuevo Empleado</a>

@if ($message = Session::get('success'))
    <p>{{ $message }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Correo Electrónico</th>
            <th>Puesto</th>
            <th>Fecha de Contratación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
        <tr>
            <td>{{ $empleado->idEmpleado }}</td>
            <td>{{ $empleado->correoElectronico }}</td>
            <td>{{ $empleado->puesto }}</td>
            <td>{{ $empleado->fechaContratacion }}</td>
            <td>
                <a href="{{ route('empleados.edit', $empleado->idEmpleado) }}">Editar</a>
                <form action="{{ route('empleados.destroy', $empleado->idEmpleado) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>