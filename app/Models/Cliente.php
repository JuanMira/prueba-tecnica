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
        'imagen'
    ];


    
    /**
     * * Relacion uno a muchos de las observaciones respectivas a cada cliente
     */        

    public function observations(){
        return $this->hasMany(Obersvacion::class);
    }
}
