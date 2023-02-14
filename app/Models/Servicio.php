<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'imagen',
        'tipo_servicio',
        'fecha_inicio',
        'fecha_fin',
        'observaciones',
    ];

    public static $rules = [
        'state' => 'required|in:1,2'
    ];

    public function clientes(){
        return $this->belongsToMany(Cliente::class, 'cliente_servicio');
    }
}
