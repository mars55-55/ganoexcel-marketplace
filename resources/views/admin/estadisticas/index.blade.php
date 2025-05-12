<x-app-layout>
    <x-slot name="header">Estadísticas de Ventas</x-slot>

    <div class="py-6 px-4 bg-[#1e1e1e] text-[#FFD700] text-center">
        {{-- Ventas por mes --}}
        <h3 class="text-xl font-bold mb-4">Ventas por Mes</h3>

        <div class="flex justify-center mb-10">
            <table class="w-full max-w-4xl border-collapse">
                <thead>
                    <tr>
                        <th class="text-[#FFD700] text-base py-2 border-b-2 border-yellow-500">Mes</th>
                        <th class="text-[#FFD700] text-base py-2 border-b-2 border-yellow-500">Total Ventas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventasPorMes as $venta)
                        <tr class="text-[#FFD700]">
                            <td class="py-2 border-b border-yellow-500">{{ $venta->mes }}</td>
                            <td class="py-2 border-b border-yellow-500">${{ number_format($venta->total_ventas, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Productos más vendidos --}}
        <h3 class="text-xl font-bold mb-4">Productos Más Vendidos</h3>

        <div class="flex justify-center">
            <table class="w-full max-w-4xl border-collapse">
                <thead>
                    <tr>
                        <th class="text-[#FFD700] text-base py-2 border-b-2 border-yellow-500">Producto</th>
                        <th class="text-[#FFD700] text-base py-2 border-b-2 border-yellow-500">Total Vendido</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productosMasVendidos as $producto)
                        <tr class="text-[#FFD700]">
                            <td class="py-2 border-b border-yellow-500">{{ $producto->producto_id }}</td>
                            <td class="py-2 border-b border-yellow-500">{{ $producto->total_vendido }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
