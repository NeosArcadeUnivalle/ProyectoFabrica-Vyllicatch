<h2>Crear Nuevo Proveedor</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('proveedores.store') }}" method="POST">
    @csrf
    <label>Nombre del Proveedor:</label>
    <input type="text" name="nombreProveedor" value="{{ old('nombreProveedor') }}">

    <label>Teléfono:</label>
    <input type="text" name="telefonoProveedor" value="{{ old('telefonoProveedor') }}">

    <label>Correo Electrónico:</label>
    <input type="email" name="correoElectronicoProveedor" value="{{ old('correoElectronicoProveedor') }}">

    <label>Dirección:</label>
    <input type="text" name="direccionProveedor" value="{{ old('direccionProveedor') }}">

    <button type="submit">Guardar</button>
</form>