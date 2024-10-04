<h2>Crear Nuevo Tipo de Ladrillo</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('tiposladrillos.store') }}" method="POST">
    @csrf
    <label>Tipo de Ladrillo:</label>
    <input type="text" name="tipoLadrillo" value="{{ old('tipoLadrillo') }}">

    <button type="submit">Guardar</button>
</form>