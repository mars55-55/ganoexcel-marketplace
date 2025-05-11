<x-app-layout>
    <x-slot name="header">Carrito de Compras</x-slot>

    <div class="py-4 px-6">
        @if ($cartItems->isEmpty())
            <p>No tienes productos en tu carrito.</p>
        @else
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                        <th>Descuento</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td>{{ $item->producto->nombre }}</td>
                            <td>{{ $item->cantidad }}</td>
                            <td>${{ number_format($item->producto->precio_unitario, 2) }}</td>
                            <td>${{ number_format($item->cantidad * $item->producto->precio_unitario, 2) }}</td>
                            <td>${{ number_format($item->calcularDescuento(), 2) }}</td>
                            <td>${{ number_format(($item->cantidad * $item->producto->precio_unitario) - $item->calcularDescuento(), 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                <p><strong>Total:</strong> ${{ number_format($total, 2) }}</p>
                <p><strong>Descuento Total:</strong> ${{ number_format($descuentoTotal, 2) }}</p>
                <p><strong>Total con Descuento:</strong> ${{ number_format($totalConDescuento, 2) }}</p>
            </div>

            @if ($totalConDescuento > 500) {{-- Umbral para cotización personalizada --}}
                <div class="mt-6">
                    <h3 class="text-lg font-bold">Solicitar Cotización Personalizada</h3>
                    <form method="POST" action="{{ route('cotizacion.store') }}">
                        @csrf
                        <textarea name="mensaje" rows="4" class="w-full border rounded" placeholder="Escribe tu solicitud aquí..."></textarea>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Enviar Solicitud</button>
                    </form>
                </div>
            @endif

            <div class="mt-6">
                <h3 class="text-lg font-bold">Seleccionar Método de Envío</h3>
                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="metodo_envio" class="block text-sm font-medium text-gray-700">Método de Envío</label>
                        <select name="metodo_envio" id="metodo_envio" class="w-full border rounded" required>
                            @foreach ($metodosEnvio as $metodo)
                                <option value="{{ $metodo->id }}">
                                    {{ $metodo->nombre }} - ${{ number_format($metodo->costo, 2) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Mostrar el costo total con envío --}}
                    <div class="mb-4">
                        <p><strong>Total con Envío:</strong> ${{ number_format($totalConDescuento + $costoEnvio, 2) }}</p>
                    </div>

                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Pagar</button>
                </form>
            </div>
        @endif
    </div>
</x-app-layout>