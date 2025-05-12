<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 600; font-size: 1.25rem; color: #1e1e1e;">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div style="padding: 48px 0; background-color: #1e1e1e;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 24px;">
            @php
                $role = Auth::user()->role;
            @endphp

            @if ($role === 'admin')
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
                    <!-- Recuadro Genérico -->
                    @foreach ([
                        ['title' => 'Gestionar Productos', 'desc' => 'Crea, edita o elimina productos disponibles en la tienda.', 'route' => route('admin.productos.index'), 'button' => 'Ir a Productos'],
                        ['title' => 'Ver Estadísticas', 'desc' => 'Consulta el comportamiento de ventas y registros del sistema.', 'route' => route('admin.estadisticas.index'), 'button' => 'Ver Estadísticas'],
                        ['title' => 'Gestionar Categorías', 'desc' => 'Organiza los productos por categorías para facilitar la búsqueda.', 'route' => route('admin.categorias.index'), 'button' => 'Ver Categorías'],
                    ] as $card)
                        <div style="background-color: #1e1e1e; color: white; padding: 24px; border-radius: 16px; border: 1px solid #FFD700; box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
                            <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 8px;">{{ $card['title'] }}</h3>
                            <p style="margin-bottom: 16px;">{{ $card['desc'] }}</p>
                            <a href="{{ $card['route'] }}" style="background-color: #FFD700; color: #1e1e1e; padding: 8px 16px; border-radius: 6px; font-weight: 600; text-decoration: none;">{{ $card['button'] }}</a>
                        </div>
                    @endforeach
                </div>

            @elseif ($role === 'distribuidor')
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
                    <div style="background-color: #1e1e1e; color: white; padding: 24px; border-radius: 16px; border: 1px solid #FFD700; box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
                        <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 8px;">Mis Productos</h3>
                        <p style="margin-bottom: 16px;">Visualiza tus productos, pedidos y ganancias como distribuidor.</p>
                        <a href="{{ route('distribuidor.productos.index') }}" style="background-color: #FFD700; color: #1e1e1e; padding: 8px 16px; border-radius: 6px; font-weight: 600; text-decoration: none;">Gestionar Productos</a>
                    </div>
                </div>

            @else
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
                    @foreach ([
                        ['title' => 'Comprar Productos', 'desc' => 'Explora nuestro catálogo y compra productos saludables.', 'route' => route('productos.index'), 'button' => 'Ver Productos'],
                        ['title' => 'Carrito de Compras', 'desc' => 'Administra los productos que has añadido a tu carrito.', 'route' => route('cart.index'), 'button' => 'Ir al Carrito'],
                    ] as $card)
                        <div style="background-color: #1e1e1e; color: white; padding: 24px; border-radius: 16px; border: 1px solid #FFD700; box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
                            <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 8px;">{{ $card['title'] }}</h3>
                            <p style="margin-bottom: 16px;">{{ $card['desc'] }}</p>
                            <a href="{{ $card['route'] }}" style="background-color: #FFD700; color: #1e1e1e; padding: 8px 16px; border-radius: 6px; font-weight: 600; text-decoration: none;">{{ $card['button'] }}</a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
