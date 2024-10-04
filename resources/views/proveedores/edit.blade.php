<h2>Editar Proveedor</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('proveedores.update', $proveedor->idProveedor) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre del Proveedor:</label>
    <input type="text" name="nombreProveedor" value="{{ $proveedor->nombreProveedor }}">

    <label>Teléfono:</label>
    <input type="text" name="telefonoProveedor" value="{{ $proveedor->telefonoProveedor }}">

    <label>Correo Electrónico:</label>
    <input type="email" name="correoElectronicoProveedor" value="{{ $proveedor->correoElectronicoProveedor }}">

    <label>Dirección:</label>
    <input type="text" name="direccionProveedor" value="{{ $proveedor->direccionProveedor }}">

    <button type="submit">Actualizar</button>
</form>