<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    //
    public function index()
    {        
        $clients = Cliente::with('servicios')
        ->get();        
        return Inertia::render('Welcome', [
            'clients' => $clients
        ]);
    }

    public function show(Cliente $cliente)
    {
        //para obtener todos los servicios de un cliente especifico               
    }
}