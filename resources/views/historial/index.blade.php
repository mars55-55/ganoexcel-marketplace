<x-app-layout>
    <x-slot name="header" style="font-weight: 600; font-size: 1.25rem; color: #FFD700;">
        Historial de Compras
    </x-slot>

    <div class="py-4 px-6" style="background-color: #1e1e1e; color: #FFD700;">
        @if ($compras->isEmpty())
            <p>No tienes compras registradas.</p>
        @else
            <table class="table-auto w-full" style="border-collapse: collapse;">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Producto</th>
                        <th class="px-4 py-2 text-left">Cantidad</th>
                        <th class="px-4 py-2 text-left">Precio Total</th>
                        <th class="px-4 py-2 text-left">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $compra)
                        <tr style="border-bottom: 1px solid #FFD700;">
                            <td class="px-4 py-2">{{ $compra->producto->nombre }}</td>
                            <td class="px-4 py-2">{{ $compra->cantidad }}</td>
                            <td class="px-4 py-2">${{ number_format($compra->precio_total, 2) }}</td>
                            <td class="px-4 py-2">{{ $compra->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4" style="text-align: center;">
                {{ $compras->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
