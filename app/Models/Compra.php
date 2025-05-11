<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'distribuidor_id',
        'producto_id',
        'cantidad',
        'precio_total',
    ];

    // Relación con el distribuidor
    public function distribuidor()
    {
        return $this->belongsTo(User::class, 'distribuidor_id');
    }

    // Relación con el producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
