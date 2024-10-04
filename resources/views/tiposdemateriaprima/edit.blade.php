<h2>Editar Tipo de Materia Prima</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('tiposdemateriaprima.update', $tipomateriaprima->idTipoMateriaPrima) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre del Tipo de Materia Prima:</label>
    <input type="text" name="nombreTipoMateriaPrima" value="{{ $tipomateriaprima->nombreTipoMateriaPrima }}">

    <button type="submit">Actualizar</button>
</form>