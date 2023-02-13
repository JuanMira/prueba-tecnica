<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'imagen',
        'cedula',
        'correo',
        'telefono',
        'observaciones'
    ];
    
    /**
     * * Relacion uno a muchos de las observaciones respectivas a cada cliente
     */        

    public function observations(){
        return $this->hasMany(Obersvacion::class);
    }
}
