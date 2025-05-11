{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\admin\estadisticas\index.blade.php --}}
<x-app-layout>
    <x-slot name="header">Estadísticas de Ventas</x-slot>

    <div class="py-4 px-6">
        <h3 class="text-lg font-bold mb-4">Ventas por Mes</h3>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th>Mes</th>
                    <th>Total Ventas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventasPorMes as $venta)
                    <tr>
                        <td>{{ $venta->mes }}</td>
                        <td>${{ number_format($venta->total_ventas, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3 class="text-lg font-bold mt-6 mb-4">Productos Más Vendidos</h3>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Total Vendido</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productosMasVendidos as $producto)
                    <tr>
                        <td>{{ $producto->producto_id }}</td>
                        <td>{{ $producto->total_vendido }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>