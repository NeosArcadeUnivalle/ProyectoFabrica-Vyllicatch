<h2>Editar Tipo de Ladrillo</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('tiposladrillos.update', $tipoladrillo->idTipoLadrillos) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Tipo de Ladrillo:</label>
    <input type="text" name="tipoLadrillo" value="{{ $tipoladrillo->tipoLadrillo }}">

    <button type="submit">Actualizar</button>
</form>