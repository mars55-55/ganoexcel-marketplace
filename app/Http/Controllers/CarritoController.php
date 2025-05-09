<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index()
    {
        $carrito = session()->get('cart', []);
        $total = array_sum(array_map(fn($item) => $item['precio'] * $item['cantidad'], $carrito));
        return view('carrito.index', compact('carrito', 'total'));
    }

    public function add(Request $request, Producto $producto)
    {
        $carrito = session()->get('cart', []);
        $cantidad = $request->input('cantidad', 1);

        $precio = Auth::user()->role === 'distribuidor'
            ? $producto->precio_mayorista
            : $producto->precio_unitario;

        if (isset($carrito[$producto->id])) {
            $carrito[$producto->id]['cantidad'] += $cantidad;
        } else {
            $carrito[$producto->id] = [
                'nombre' => $producto->nombre,
                'cantidad' => $cantidad,
                'precio' => $precio,
                'imagen' => $producto->imagen,
            ];
        }

        session()->put('cart', $carrito);
        return redirect()->route('carrito.index')->with('success', 'Producto agregado al carrito.');
    }

    public function update(Request $request, $id)
    {
        $carrito = session()->get('cart', []);
        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] = $request->input('cantidad');
            session()->put('cart', $carrito);
        }
        return back();
    }

    public function remove($id)
    {
        $carrito = session()->get('cart', []);
        unset($carrito[$id]);
        session()->put('cart', $carrito);
        return back();
    }

    public function clear()
    {
        session()->forget('cart');
        return back();
    }
}