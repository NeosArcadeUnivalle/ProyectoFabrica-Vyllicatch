<h2>Lista de Personas</h2>
<a href="{{ route('personas.create') }}">Crear Nueva Persona</a>

@if ($message = Session::get('success'))
    <p>{{ $message }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($personas as $persona)
        <tr>
            <td>{{ $persona->idPersona }}</td>
            <td>{{ $persona->nombre }}</td>
            <td>{{ $persona->apellido }}</td>
            <td>
                <a href="{{ route('personas.edit', $persona->idPersona) }}">Editar</a>
                <form action="{{ route('personas.destroy', $persona->idPersona) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
