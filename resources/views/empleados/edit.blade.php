<h2>Editar Empleado</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('empleados.update', $empleado->idEmpleado) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Correo Electrónico:</label>
    <input type="email" name="correoElectronico" value="{{ $empleado->correoElectronico }}" required>
    
    <label>Contraseña:</label>
    <input type="password" name="password" value="{{ $empleado->password }}" required>
    
    <label>Puesto:</label>
    <input type="text" name="puesto" value="{{ $empleado->puesto }}" maxlength="50">

    <label>Fecha de Contratación:</label>
    <input type="date" name="fechaContratacion" value="{{ $empleado->fechaContratacion }}">

    <label>ID Persona:</label>
    <input type="number" name="idPersona" value="{{ $empleado->idPersona }}">

    <button type="submit">Actualizar</button>
</form>
