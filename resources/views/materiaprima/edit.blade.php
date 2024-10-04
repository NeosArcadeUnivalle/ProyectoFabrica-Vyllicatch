<h2>Editar Materia Prima</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('materiaprima.update', $materiaprima->idMaterial) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre de la Materia Prima:</label>
    <input type="text" name="nombreMateriaPrima" value="{{ $materiaprima->nombreMateriaPrima }}">
    
    <label>Cantidad Disponible:</label>
    <input type="text" name="cantidadDisponible" value="{{ $materiaprima->cantidadDisponible }}">

    <label>Fecha Última Compra:</label>
    <input type="date" name="fechaUltimaCompra" value="{{ $materiaprima->fechaUltimaCompra }}">

    <label>ID Proveedor:</label>
    <input type="number" name="idProveedor" value="{{ $materiaprima->idProveedor }}">

    <label>ID Tipo de Materia Prima:</label>
    <input type="number" name="idTipoMateriaPrima" value="{{ $materiaprima->idTipoMateriaPrima }}">

    <button type="submit">Actualizar</button>
</form>