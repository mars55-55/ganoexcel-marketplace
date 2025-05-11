{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\checkout\index.blade.php --}}
<x-app-layout>
    <x-slot name="header">Pago</x-slot>

    <div class="py-4 px-6">
        <h3 class="text-lg font-bold mb-4">Detalles del Pago</h3>

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="card_number" class="block text-sm font-medium text-gray-700">Número de Tarjeta</label>
                <input type="text" name="card_number" id="card_number" class="w-full border rounded" placeholder="1234 5678 9012 3456" required>
            </div>

            <div class="mb-4">
                <label for="card_name" class="block text-sm font-medium text-gray-700">Nombre en la Tarjeta</label>
                <input type="text" name="card_name" id="card_name" class="w-full border rounded" placeholder="Juan Pérez" required>
            </div>

            <div class="mb-4">
                <label for="expiry_date" class="block text-sm font-medium text-gray-700">Fecha de Expiración</label>
                <input type="text" name="expiry_date" id="expiry_date" class="w-full border rounded" placeholder="MM/YY" required>
            </div>

            <div class="mb-4">
                <label for="cvv" class="block text-sm font-medium text-gray-700">CVV</label>
                <input type="text" name="cvv" id="cvv" class="w-full border rounded" placeholder="123" required>
            </div>

            <div class="mb-4">
                <p><strong>Total a Pagar:</strong> ${{ number_format($total, 2) }}</p>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Pagar</button>
        </form>
    </div>
</x-app-layout>