<h2>Crear Nuevo Producto</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('productos.store') }}" method="POST">
    @csrf
    <label>Nombre del Producto:</label>
    <input type="text" name="nombreProducto" value="{{ old('nombreProducto') }}">
    
    <label>Cantidad Disponible:</label>
    <input type="number" name="cantidadDisponible" value="{{ old('cantidadDisponible') }}">

    <label>Precio:</label>
    <input type="text" name="precio" value="{{ old('precio') }}">

    <label>ID Tipo de Ladrillo:</label>
    <input type="number" name="idTipoLadrillo" value="{{ old('idTipoLadrillo') }}">

    <button type="submit">Guardar</button>
</form>