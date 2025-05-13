<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $fillable = [
        'user_id',
        'mensaje',
        'estado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
