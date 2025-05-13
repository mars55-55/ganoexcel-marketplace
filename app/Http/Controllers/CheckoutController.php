<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodoEnvio;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Compra;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->with('producto')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'El carrito está vacío.');
        }

        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->cantidad * $item->producto->precio_unitario;
        }

        $metodosEnvio = MetodoEnvio::all();

        return view('checkout.index', compact('cartItems', 'total', 'metodosEnvio'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'metodo_envio' => 'required|exists:metodos_envio,id',
             'direccion' => 'required|string|max:255', // Validar la dirección
        ]);

        $metodoEnvio = MetodoEnvio::find($request->metodo_envio);
        $cartItems = CartItem::where('user_id', Auth::id())->with('producto')->get();

        $total = 0;
          foreach ($cartItems as $item) {
        $subtotal = $item->cantidad * $item->producto->precio_unitario;
        $total += $subtotal;

        Compra::create([
            'distribuidor_id' => Auth::id(), // ID del usuario autenticado
            'producto_id' => $item->producto->id,
            'cantidad' => $item->cantidad,
            'precio_total' => $subtotal,
        ]);
    }
        // Capturar la dirección
        $direccion = $request->direccion;
        $totalConEnvio = $total + $metodoEnvio->costo;

        // Vaciar el carrito
        CartItem::where('user_id', Auth::id())->delete();

        // Enviar correo de confirmación
        Mail::to(Auth::user()->email)->send(new \App\Mail\PedidoConfirmado($cartItems, $totalConEnvio, $metodoEnvio, $direccion));

        return redirect()->route('cart.index')->with('success', 'Pedido realizado con éxito. Revisa tu correo para más detalles.');
    }
}
