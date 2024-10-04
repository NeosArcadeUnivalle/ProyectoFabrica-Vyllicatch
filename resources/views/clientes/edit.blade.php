<h2>Editar Cliente</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('clientes.update', $cliente->idCliente) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Empresa:</label>
    <input type="text" name="empresa" value="{{ $cliente->empresa }}">
    
    <label>Teléfono:</label>
    <input type="text" name="telefono" value="{{ $cliente->telefono }}">

    <label>Correo Electrónico:</label>
    <input type="email" name="correoElectronico" value="{{ $cliente->correoElectronico }}">

    <label>ID Persona:</label>
    <input type="number" name="idPersona" value="{{ $cliente->idPersona }}">

    <button type="submit">Actualizar</button>
</form>
