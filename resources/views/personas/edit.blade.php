<h2>Editar Persona</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('personas.update', $persona->idPersona) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="{{ $persona->nombre }}">
    
    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" value="{{ $persona->apellido }}">
    
    <button type="submit">Actualizar</button>
</form>
