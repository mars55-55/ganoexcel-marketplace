{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\distribuidor\compras\index.blade.php --}}
<x-app-layout>
    <x-slot name="header">Historial de Compras</x-slot>

    <div class="py-4 px-6">
        @if ($compras->isEmpty())
            <p>No tienes compras registradas.</p>
        @else
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Total</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $compra)
                        <tr>
                            <td>{{ $compra->producto->nombre }}</td>
                            <td>{{ $compra->cantidad }}</td>
                            <td>${{ number_format($compra->precio_total, 2) }}</td>
                            <td>{{ $compra->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $compras->links() }}
            </div>
        @endif
    </div>
</x-app-layout>