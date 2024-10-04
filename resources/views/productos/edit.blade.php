<h2>Editar Producto</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('productos.update', $producto->idProducto) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre del Producto:</label>
    <input type="text" name="nombreProducto" value="{{ $producto->nombreProducto }}">
    
    <label>Cantidad Disponible:</label>
    <input type="number" name="cantidadDisponible" value="{{ $producto->cantidadDisponible }}">

    <label>Precio:</label>
    <input type="text" name="precio" value="{{ $producto->precio }}">

    <label>ID Tipo de Ladrillo:</label>
    <input type="number" name="idTipoLadrillo" value="{{ $producto->idTipoLadrillo }}">

    <button type="submit">Actualizar</button>
</form>