<h2>Crear Nueva Persona</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('personas.store') }}" method="POST">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre') }}">
    
    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" value="{{ old('apellido') }}">
    
    <button type="submit">Guardar</button>
</form>
