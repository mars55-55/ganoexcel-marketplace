<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::where('distribuidor_id', Auth::id())->with('producto')->paginate(10);

        return view('distribuidor.compras.index', compact('compras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = \App\Models\Producto::find($request->producto_id);
        $cantidad = $request->cantidad;

        // Aplicar descuento si se compran más de 20 unidades
        $precioUnitario = $producto->precio_unitario;
        if ($cantidad > 20) {
            $precioUnitario *= 0.9; // 10% de descuento
        }

        $precioTotal = $cantidad * $precioUnitario;

        Compra::create([
            'distribuidor_id' => Auth::id(),
            'producto_id' => $producto->id,
            'cantidad' => $cantidad,
            'precio_total' => $precioTotal,
        ]);

        return redirect()->route('compras.index')->with('success', 'Compra registrada con éxito.');
    }
}