<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obersvacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'observacion',
    ];

    public function cliente(){
        $this->belongsTo(Cliente::class);
    }
}
