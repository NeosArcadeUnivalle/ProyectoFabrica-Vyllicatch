<h2>Lista de Tipos de Materia Prima</h2>
<a href="{{ route('tiposdemateriaprima.create') }}">Crear Nuevo Tipo de Materia Prima</a>

@if ($message = Session::get('success'))
    <p>{{ $message }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre del Tipo de Materia Prima</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tiposdemateriaprima as $tipomateriaprima)
        <tr>
            <td>{{ $tipomateriaprima->idTipoMateriaPrima }}</td>
            <td>{{ $tipomateriaprima->nombreTipoMateriaPrima }}</td>
            <td>
                <a href="{{ route('tiposdemateriaprima.edit', $tipomateriaprima->idTipoMateriaPrima) }}">Editar</a>
                <form action="{{ route('tiposdemateriaprima.destroy', $tipomateriaprima->idTipoMateriaPrima) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>