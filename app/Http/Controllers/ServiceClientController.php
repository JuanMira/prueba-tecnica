<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServiceClientController extends Controller
{
    //
    public function store(Request $request)
    {
        try {
            $client = Cliente::find($request->cliente_id);
            $service = Servicio::find($request->servicio_id);
            error_log($service);

            $result =  $client->servicios()->attach($service->id);
            error_log($result);
            return null;    
        } catch (\Throwable $th) {
            throw $th;
        }
        

    }
}