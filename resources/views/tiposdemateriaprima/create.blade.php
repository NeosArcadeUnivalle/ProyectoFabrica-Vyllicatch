<h2>Crear Nuevo Tipo de Materia Prima</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('tiposdemateriaprima.store') }}" method="POST">
    @csrf
    <label>Nombre del Tipo de Materia Prima:</label>
    <input type="text" name="nombreTipoMateriaPrima" value="{{ old('nombreTipoMateriaPrima') }}">

    <button type="submit">Guardar</button>
</form>