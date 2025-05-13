<x-app-layout>
    <div class="py-6 px-4 bg-[#1e1e1e] text-[#FFD700]">
        {{-- Ganancias por mes --}}
        <div class="text-center mb-12">
            <h3 class="text-2xl font-bold mb-6">Ganancias por Mes</h3>
            <div class="overflow-x-auto">
                <table class="w-full max-w-4xl mx-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="py-3 border-b-2 border-yellow-500 text-left">Mes</th>
                            <th class="py-3 border-b-2 border-yellow-500 text-left">Total Ganancias</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $meses = [
                                1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
                                5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
                                9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
                            ];
                        @endphp
                        @foreach ($gananciasPorMes as $g)
                            <tr>
                                <td class="py-2 border-b border-yellow-500">{{ $meses[$g->mes_num] }} {{ $g->anio }}</td>
                                <td class="py-2 border-b border-yellow-500">${{ number_format($g->total_ganancias, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Productos más vendidos --}}
        <div class="text-center">
            <h3 class="text-2xl font-bold mb-6">Productos Más Vendidos</h3>
            <div class="overflow-x-auto">
                <table class="w-full max-w-4xl mx-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="py-3 border-b-2 border-yellow-500 text-left">Producto</th>
                            <th class="py-3 border-b-2 border-yellow-500 text-left">Total Vendido</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productosMasVendidos as $producto)
                            <tr>
                                <td class="py-2 border-b border-yellow-500">{{ $producto->nombre }}</td>
                                <td class="py-2 border-b border-yellow-500">{{ $producto->total_vendido }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
