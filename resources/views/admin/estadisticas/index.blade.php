<x-app-layout>
    <div class="py-6 px-4 bg-[#1e1e1e] text-[#FFD700] text-center">
        {{-- Ganancias por mes --}}
        <h3 class="text-xl font-bold mb-4">Ganancias por Mes</h3>
        <div class="flex justify-center mb-10">
            <table class="w-full max-w-4xl border-collapse">
                <thead>
                    <tr>
                        <th class="text-[#FFD700] py-2 border-b-2 border-yellow-500">Mes</th>
                        <th class="text-[#FFD700] py-2 border-b-2 border-yellow-500">Total Ganancias</th>
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
                        <tr class="text-[#FFD700]">
                            <td class="py-2 border-b border-yellow-500">{{ $meses[$g->mes_num] }} {{ $g->anio }}</td>
                            <td class="py-2 border-b border-yellow-500">${{ number_format($g->total_ganancias, 2) }}</td>
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
                        <th class="text-[#FFD700] py-2 border-b-2 border-yellow-500">Producto</th>
                        <th class="text-[#FFD700] py-2 border-b-2 border-yellow-500">Total Vendido</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productosMasVendidos as $producto)
                        <tr class="text-[#FFD700]">
                            <td class="py-2 border-b border-yellow-500">{{ $producto->nombre }}</td>
                            <td class="py-2 border-b border-yellow-500">{{ $producto->total_vendido }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
