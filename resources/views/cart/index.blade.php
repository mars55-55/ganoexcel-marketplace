<x-app-layout>
    <x-slot name="header">Carrito de Compras</x-slot>

    <style>
        .bg-negro {
            background-color: #000000;
        }

        .text-dorado {
            color: #FFD700;
        }

        .border-dorado {
            border-color: #FFD700;
        }

        .bg-dorado {
            background-color: #FFD700;
        }

        .text-black {
            color: #000000;
        }

        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .table-container {
            overflow-x: auto;
        }

        select, textarea, input[type="text"] {
            background-color: #000000;
            color: #FFD700;
            border: 1px solid #FFD700;
            padding: 8px;
            border-radius: 4px;
        }

        select:focus, textarea:focus, input[type="text"]:focus {
            outline-color: #FFD700;
        }

        option {
            background-color: #000000;
            color: #FFD700;
        }

        select option:hover {
            background-color: #444444;
        }

        textarea::placeholder {
            color: #FFD700;
        }

        input::placeholder {
            color: #FFD700;
        }

        table {
            width: 100%;
            text-align: center;
        }

        th, td {
            padding: 10px;
            border: 1px solid #FFD700;
            text-align: center;
        }

        th {
            background-color: #000000;
            color: #FFD700;
        }

        td {
            background-color: #000000;
            color: #FFD700;
        }
    </style>

    <div class="py-4 px-6 centered">
        @if ($cartItems && $cartItems->isEmpty())
            <p>No tienes productos en tu carrito.</p>
        @else
            <div class="table-container w-full max-w-4xl">
                <table class="table-auto w-full border border-dorado">
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
            </div>

            <div class="mt-4 text-white">
                <p><strong>Total:</strong> ${{ isset($total) ? number_format($total, 2) : '0.00' }}</p>
                <p><strong>Descuento Total:</strong> ${{ isset($descuentoTotal) ? number_format($descuentoTotal, 2) : '0.00' }}</p>
                <p><strong>Total con Descuento:</strong> ${{ isset($totalConDescuento) ? number_format($totalConDescuento, 2) : '0.00' }}</p>
            </div>

            @if (isset($totalConDescuento) && $totalConDescuento > 500)
                <div class="mt-6 centered">
                    <h3 class="text-lg font-bold text-white">Solicitar Cotización Personalizada</h3>
                    <form method="POST" action="{{ route('cotizacion.store') }}">
                        @csrf
                        <textarea name="mensaje" rows="4" class="w-full border rounded text-dorado" placeholder="Escribe tu solicitud aquí..."></textarea>
                        <button type="submit" class="bg-dorado text-black px-4 py-2 rounded mt-2">Enviar Solicitud</button>
                    </form>
                </div>
            @endif

            <div class="mt-6 centered">
                <h3 class="text-lg font-bold text-white">Seleccionar Método de Pago</h3>
                <form action="{{ route('checkout.store') }}" method="POST" class="w-full max-w-xs">
                    @csrf

                    <div class="mb-4">
                        <label for="metodo_pago" class="block text-sm font-medium text-white">Método de Pago</label>
                        <select name="metodo_pago" id="metodo_pago" class="w-full border rounded text-dorado" required>
                            <option value="efectivo">Efectivo</option>
                            <option value="nequi">Nequi</option>
                            <option value="daviplata">Daviplata</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <p><strong>Total con Descuento:</strong> ${{ isset($totalConDescuento) ? number_format($totalConDescuento, 2) : '0.00' }}</p>
                    </div>

                    <button type="submit" class="bg-dorado text-black px-4 py-2 rounded">Pagar</button>
                </form>
            </div>
        @endif
    </div>
</x-app-layout>
