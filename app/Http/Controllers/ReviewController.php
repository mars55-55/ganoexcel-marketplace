<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Producto $producto)
    {
        $request->validate([
            'comentario' => 'nullable|string|max:1000',
            'calificacion' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'producto_id' => $producto->id,
            'user_id' => Auth::id(),
            'comentario' => $request->comentario,
            'calificacion' => $request->calificacion,
        ]);

        return redirect()->route('distribuidor.productos.index')->with('success', 'Reseña enviada con éxito.');
    }
}
