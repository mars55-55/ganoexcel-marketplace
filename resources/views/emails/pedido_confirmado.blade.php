{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\emails\pedido_confirmado.blade.php --}}
<h1>Confirmación de Pedido</h1>
<p>Gracias por tu compra. Aquí están los detalles de tu pedido:</p>

<ul>
    @foreach ($cartItems as $item)
        <li>{{ $item->producto->nombre }} - {{ $item->cantidad }} unidades - ${{ number_format($item->cantidad * $item->producto->precio_unitario, 2) }}</li>
    @endforeach
</ul>

<p><strong>Método de Envío:</strong> {{ $metodoEnvio->nombre }}</p>
<p><strong>Costo de Envío:</strong> ${{ number_format($metodoEnvio->costo, 2) }}</p>
<p><strong>Dirección de Envío:</strong> {{ $direccion }}</p>
<p><strong>Total:</strong> ${{ number_format($total, 2) }}</p>