<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'ingredientes',
        'beneficios',
        'precio_unitario',
        'precio_mayorista',
        'categoria_id',
        'imagen',
    ];

    // Relación: Un producto pertenece a una categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    // Relación: Un producto tiene muchas reseñas
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
