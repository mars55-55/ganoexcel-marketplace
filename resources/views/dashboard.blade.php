<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @php
                $role = Auth::user()->role;
            @endphp

            @if ($role === 'admin')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-bold mb-2">Panel de Administrador</h3>
                    <p>Desde aquí puedes gestionar productos, usuarios y ver estadísticas.</p>
                </div>
            @elseif ($role === 'distribuidor')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-bold mb-2">Panel de Distribuidor</h3>
                    <p>Aquí puedes ver tus compras, gestionar tus pedidos, productos y comisiones.</p>
                    <div class="mt-4">
                        <a href="{{ route('distribuidor.productos.index') }}" class="text-blue-500 hover:underline">
                            Gestionar Productos
                        </a>
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-bold mb-2">Panel de Cliente</h3>
                    <p>Bienvenido. Aquí podrás comprar productos saludables y seguir tus pedidos.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
