<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // consultar todos los datos de cliente existentes
        $clients = Cliente::all();

        return Inertia::render('Clientes/Index' ,[
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('Clientes/Create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nombre' => 'required|string|min:6',
            'cedula' => 'required|numeric|integer',
            'email' => 'required|string|email',
            'telefono' => 'required|numeric|integer',
        ]);        

        Cliente::create($validated);
        return redirect(route('cliente.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //

        // metodo para mostrar un solo cliente
        $services = Servicio::all();
        
        //para obtener todos los servicios de un cliente especifico
        $client = Cliente::with('servicios')
            ->where('id','=', $cliente->id)
            ->get()
            ->first();

        return Inertia::render("Clientes/Cliente", [
            'client' => $client,
            'services' => $services,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
        return Inertia::render('Clientes/Edit', [
            'client' => $cliente
        ]);
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
        $validated = $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|string|email',
            'cedula' => 'required|numeric',
            'telefono' => 'required|numeric'
        ]);
        try {
            $cliente->update($validated);
            return redirect(route('cliente.index'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //              
        $cliente->delete();
        return redirect(route('cliente.index'));
    }
}
