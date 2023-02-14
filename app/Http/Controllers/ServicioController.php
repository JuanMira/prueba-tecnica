<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Route;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // peticion de todos los servicios existentens en la base de datos
        $services = Servicio::all();        
        return Inertia::render('Servicios/Index', [
            'services' => $services,
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
        return Inertia::render('Servicios/Create');
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
        try {
            $validated = $request->validate([
                'nombre' => 'required|string|min:6',
                'tipo_servicio' => 'required',
                'fecha_inicio' => 'required',
                'fecha_fin' => 'required',
                'observaciones' => 'required|string|max:255',
            ]);

            Servicio::create($validated);
            return redirect(route('servicio.index'));
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        //
        return Inertia::render('Servicios/Edit', [
            'service' => $servicio,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicio)
    {
        //
        //$this->authorize('update', $servicio);
        $validated = $request->validate([
            'nombre' => 'required|string|min:6',
            'tipo_servicio' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'observaciones' => 'required|string|max:255',
        ]);

        $servicio->update($validated);
        return redirect(route('servicio.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        //
        $servicio->delete();
        return redirect(route('servicio.index'));
    }
}