<h2>Lista de Clientes</h2>
<a href="{{ route('clientes.create') }}">Crear Nuevo Cliente</a>

@if ($message = Session::get('success'))
    <p>{{ $message }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Empresa</th>
            <th>Teléfono</th>
            <th>Correo Electrónico</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->idCliente }}</td>
            <td>{{ $cliente->empresa }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>{{ $cliente->correoElectronico }}</td>
            <td>
                <a href="{{ route('clientes.edit', $cliente->idCliente) }}">Editar</a>
                <form action="{{ route('clientes.destroy', $cliente->idCliente) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>