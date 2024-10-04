<h2>Lista de Proveedores</h2>
<a href="{{ route('proveedores.create') }}">Crear Nuevo Proveedor</a>

@if ($message = Session::get('success'))
    <p>{{ $message }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre del Proveedor</th>
            <th>Teléfono</th>
            <th>Correo Electrónico</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proveedores as $proveedor)
        <tr>
            <td>{{ $proveedor->idProveedor }}</td>
            <td>{{ $proveedor->nombreProveedor }}</td>
            <td>{{ $proveedor->telefonoProveedor }}</td>
            <td>{{ $proveedor->correoElectronicoProveedor }}</td>
            <td>{{ $proveedor->direccionProveedor }}</td>
            <td>
                <a href="{{ route('proveedores.edit', $proveedor->idProveedor) }}">Editar</a>
                <form action="{{ route('proveedores.destroy', $proveedor->idProveedor) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>