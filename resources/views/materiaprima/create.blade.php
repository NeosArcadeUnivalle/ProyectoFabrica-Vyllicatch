<h2>Crear Nueva Materia Prima</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('materiaprima.store') }}" method="POST">
    @csrf
    <label>Nombre de la Materia Prima:</label>
    <input type="text" name="nombreMateriaPrima" value="{{ old('nombreMateriaPrima') }}">

    <label>Cantidad Disponible:</label>
    <input type="text" name="cantidadDisponible" value="{{ old('cantidadDisponible') }}">

    <label>Fecha Última Compra:</label>
    <input type="date" name="fechaUltimaCompra" value="{{ old('fechaUltimaCompra') }}">

    <label>ID Proveedor:</label>
    <input type="number" name="idProveedor" value="{{ old('idProveedor') }}">

    <label>ID Tipo de Materia Prima:</label>
    <input type="number" name="idTipoMateriaPrima" value="{{ old('idTipoMateriaPrima') }}">

    <button type="submit">Guardar</button>
</form>