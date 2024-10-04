<h2>Lista de Materia Prima</h2>
<a href="{{ route('materiaprima.create') }}">Crear Nueva Materia Prima</a>

@if ($message = Session::get('success'))
    <p>{{ $message }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre de la Materia Prima</th>
            <th>Cantidad Disponible</th>
            <th>Fecha Última Compra</th>
            <th>ID Proveedor</th>
            <th>ID Tipo de Materia Prima</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($materiaprima as $materia)
        <tr>
            <td>{{ $materia->idMaterial }}</td>
            <td>{{ $materia->nombreMateriaPrima }}</td>
            <td>{{ $materia->cantidadDisponible }}</td>
            <td>{{ $materia->fechaUltimaCompra }}</td>
            <td>{{ $materia->idProveedor }}</td>
            <td>{{ $materia->idTipoMateriaPrima }}</td>
            <td>
                <a href="{{ route('materiaprima.edit', $materia->idMaterial) }}">Editar</a>
                <form action="{{ route('materiaprima.destroy', $materia->idMaterial) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>