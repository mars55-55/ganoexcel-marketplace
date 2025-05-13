<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'producto_id',
        'cantidad',
    ];

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function calcularDescuento()
    {
        $cantidadParaDescuento = 10; // Número mínimo de unidades para activar el descuento
        $descuentoPorUnidad = 0.1; // 10% de descuento

        if ($this->cantidad > $cantidadParaDescuento) {
            return $this->cantidad * $this->producto->precio_unitario * $descuentoPorUnidad;
        }

        return 0; // Sin descuento si no se supera el umbral
    }
}

// Ejemplo de modelo Compra/Order
protected $fillable = [
    'user_id',
    'total',
    'direccion_envio',
    'metodo_pago',
    'estado', // pendiente, pagado, enviado, etc.
    // otros campos necesarios
];
