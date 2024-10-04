<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'empresa' => 'required|max:100',
            'telefono' => 'required|max:20',
            'correoElectronico' => 'required|email|max:100',
            'idPersona' => 'nullable|integer',
        ]);

        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
    }

    public function edit($idCliente)
    {
        $cliente = Cliente::findOrFail($idCliente);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $idCliente)
    {
        $request->validate([
            'empresa' => 'required|max:100',
            'telefono' => 'required|max:20',
            'correoElectronico' => 'required|email|max:100',
            'idPersona' => 'nullable|integer',
        ]);

        $cliente = Cliente::findOrFail($idCliente);
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy($idCliente)
    {
        $cliente = Cliente::findOrFail($idCliente);
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}