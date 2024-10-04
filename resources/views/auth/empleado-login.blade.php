<h2>Iniciar Sesión - Empleados</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('empleado.login') }}" method="POST">
    @csrf
    <label for="correoElectronico">Correo Electrónico:</label>
    <input type="email" name="correoElectronico" value="{{ old('correoElectronico') }}">

    <label for="password">Contraseña:</label>
    <input type="password" name="password">

    <button type="submit">Iniciar Sesión</button>
</form>