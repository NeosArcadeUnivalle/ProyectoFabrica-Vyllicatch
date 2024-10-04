<h2>Crear Nuevo Cliente</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('clientes.store') }}" method="POST">
    @csrf
    <label>Empresa:</label>
    <input type="text" name="empresa" value="{{ old('empresa') }}">
    
    <label>Teléfono:</label>
    <input type="text" name="telefono" value="{{ old('telefono') }}">

    <label>Correo Electrónico:</label>
    <input type="email" name="correoElectronico" value="{{ old('correoElectronico') }}">

    <label>ID Persona:</label>
    <input type="number" name="idPersona" value="{{ old('idPersona') }}">

    <button type="submit">Guardar</button>
</form>