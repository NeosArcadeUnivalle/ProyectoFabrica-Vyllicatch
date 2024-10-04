<h2>Lista de Productos</h2>
<a href="{{ route('productos.create') }}">Crear Nuevo Producto</a>

@if ($message = Session::get('success'))
    <p>{{ $message }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre del Producto</th>
            <th>Cantidad Disponible</th>
            <th>Precio</th>
            <th>ID Tipo de Ladrillo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->idProducto }}</td>
            <td>{{ $producto->nombreProducto }}</td>
            <td>{{ $producto->cantidadDisponible }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->idTipoLadrillo }}</td>
            <td>
                <a href="{{ route('productos.edit', $producto->idProducto) }}">Editar</a>
                <form action="{{ route('productos.destroy', $producto->idProducto) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>