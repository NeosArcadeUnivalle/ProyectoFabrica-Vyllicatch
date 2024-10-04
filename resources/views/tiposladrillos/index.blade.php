<h2>Lista de Tipos de Ladrillo</h2>
<a href="{{ route('tiposladrillos.create') }}">Crear Nuevo Tipo de Ladrillo</a>

@if ($message = Session::get('success'))
    <p>{{ $message }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo de Ladrillo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tiposladrillos as $tipoladrillo)
        <tr>
            <td>{{ $tipoladrillo->idTipoLadrillos }}</td>
            <td>{{ $tipoladrillo->tipoLadrillo }}</td>
            <td>
                <a href="{{ route('tiposladrillos.edit', $tipoladrillo->idTipoLadrillos) }}">Editar</a>
                <form action="{{ route('tiposladrillos.destroy', $tipoladrillo->idTipoLadrillos) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>