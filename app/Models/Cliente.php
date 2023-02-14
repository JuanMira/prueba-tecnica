<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',        
        'cedula',
        'email',
        'telefono',
        'observaciones'
    ];

    protected $nullable = [
        'imagen',
        'observaciones'
    ];


    
    /**
     * * Relacion uno a muchos de los servicios respectivos para cada cliente
     */        

    public function servicios(){
        return $this->belongsToMany(Servicio::class, 'cliente_servicio');
    }
}
