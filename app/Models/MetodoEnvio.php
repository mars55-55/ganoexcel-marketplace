<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoEnvio extends Model
{
    use HasFactory;
     protected $table = 'metodos_envio'; // Nombre de la tabla asociada

    protected $fillable = ['nombre', 'costo'];
}
