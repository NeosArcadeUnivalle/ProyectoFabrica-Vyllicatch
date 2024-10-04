<h2>Crear Nuevo Empleado</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('empleados.store') }}" method="POST">
    @csrf
    <label>Correo Electrónico:</label>
    <input type="email" name="correoElectronico" value="{{ old('correoElectronico') }}" required>
    
    <label>Contraseña:</label>
    <input type="password" name="password" value="{{ old('password') }}" required>

    <label>Puesto:</label>
    <input type="text" name="puesto" value="{{ old('puesto') }}" maxlength="50">

    <label>Fecha de Contratación:</label>
    <input type="date" name="fechaContratacion" value="{{ old('fechaContratacion') }}">

    <label>ID Persona:</label>
    <input type="number" name="idPersona" value="{{ old('idPersona') }}">

    <button type="submit">Guardar</button>
</form>
