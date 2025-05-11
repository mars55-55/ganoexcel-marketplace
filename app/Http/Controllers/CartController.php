<?php

namespace App\Http\Controllers;
use App\Models\CartItem;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cotizacion;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CartController extends Controller
{
    use AuthorizesRequests;
    // Mostrar el carrito del usuario
    public function index()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->with('producto')->get();

        $total = 0;
        $descuentoTotal = 0;

        foreach ($cartItems as $item) {
            $subtotal = $item->cantidad * $item->producto->precio_unitario;
            $descuento = $item->calcularDescuento();

            $total += $subtotal;
            $descuentoTotal += $descuento;
        }

        $totalConDescuento = $total - $descuentoTotal;

        return view('cart.index', compact('cartItems', 'total', 'descuentoTotal', 'totalConDescuento'));
    }

    // Agregar un producto al carrito
    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'producto_id' => $request->producto_id,
            ],
            [
                'cantidad' => $request->cantidad,
            ]
        );

        return redirect()->route('cart.index')->with('success', 'Producto añadido al carrito.');
    }

    // Eliminar un producto del carrito
    public function destroy(CartItem $cartItem)
    {
        $this->authorize('delete', $cartItem);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito.');
    }

    public function solicitarCotizacion(Request $request)
    {
        $request->validate([
            'mensaje' => 'required|string|max:1000',
        ]);

        // Aquí puedes enviar un correo o guardar la solicitud en la base de datos
        // Ejemplo: Guardar en la base de datos
        \App\Models\Cotizacion::create([
            'user_id' => Auth::id(),
            'mensaje' => $request->mensaje,
        ]);

        return redirect()->route('cart.index')->with('success', 'Tu solicitud de cotización ha sido enviada.');
    }
}
