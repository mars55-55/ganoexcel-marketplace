<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 600; font-size: 1.25rem; color: #1e1e1e;">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

  

    <div style="padding: 48px 0; background-color: #1e1e1e;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 24px;">
           
              @php
                $user = Auth::user();
                $role = $user ? $user->role : null;
            @endphp
            @if ($role === 'admin')
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
                    @foreach ([
                        ['title' => 'Gestionar Productos', 'desc' => 'Crea, edita o elimina productos disponibles en la tienda.', 'route' => route('admin.productos.index'), 'button' => 'Ir a Productos'],
                        ['title' => 'Ver Estadísticas', 'desc' => 'Consulta el comportamiento de ventas y registros del sistema.', 'route' => route('admin.estadisticas.index'), 'button' => 'Ver Estadísticas'],
                        ['title' => 'Gestionar Categorías', 'desc' => 'Organiza los productos por categorías para facilitar la búsqueda.', 'route' => route('admin.categorias.index'), 'button' => 'Ver Categorías'],
                        ['title' => 'Gestionar Usuarios', 'desc' => 'Administra los usuarios registrados en la plataforma.', 'route' => route('admin.usuarios.index'), 'button' => 'Ver Usuarios'],
                        ['title' => 'Gestionar cotizaciones', 'desc' => 'Administra las cotizaciones en la plataforma.', 'route' => route('admin.cotizaciones'), 'button' => 'Ver Usuarios'],
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
                   @php
                        $cards = [
                             ['title' => 'Carrito de Compras', 'desc' => 'Administra los productos que has añadido a tu carrito.', 'route' => route('cart.index'), 'button' => 'Ir al Carrito'],
                            ['title' => 'Historial de Compras', 'desc' => 'Consulta tu historial de compras y ventas.', 'route' => route('distribuidor.compras.index'), 'button' => 'Ver Historial'],
                            ['title' => 'Marketplace', 'desc' => 'Accede al marketplace y consulta precios mayoristas.', 'route' => route('marketplace.index'), 'button' => 'Ir al Marketplace'],
                        ];
                    @endphp

                    @foreach ($cards as $card)
                        <div style="background-color: #1e1e1e; color: white; padding: 24px; border-radius: 16px; border: 1px solid #FFD700; box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
                            <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 8px;">{{ $card['title'] }}</h3>
                            <p style="margin-bottom: 16px;">{{ $card['desc'] }}</p>
                            <a href="{{ $card['route'] }}" style="background-color: #FFD700; color: #1e1e1e; padding: 8px 16px; border-radius: 6px; font-weight: 600; text-decoration: none;">{{ $card['button'] }}</a>
                        </div>
                    @endforeach
                </div>
            @elseif ($role === 'cliente')
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
                    @foreach ([
                        ['title' => 'Comprar Productos', 'desc' => 'Explora nuestro catálogo y compra productos saludables.', 'route' => route('productos.index'), 'button' => 'Ver Productos'],
                        ['title' => 'Carrito de Compras', 'desc' => 'Administra los productos que has añadido a tu carrito.', 'route' => route('cart.index'), 'button' => 'Ir al Carrito'],
                        ['title' => 'Marketplace', 'desc' => 'Descubre todos los productos disponibles.', 'route' => route('marketplace.index'), 'button' => 'Ir al Marketplace'],
                    ] as $card)
                        <div style="background-color: #1e1e1e; color: white; padding: 24px; border-radius: 16px; border: 1px solid #FFD700; box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
                            <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 8px;">{{ $card['title'] }}</h3>
                            <p style="margin-bottom: 16px;">{{ $card['desc'] }}</p>
                            <a href="{{ $card['route'] }}" style="background-color: #FFD700; color: #1e1e1e; padding: 8px 16px; border-radius: 6px; font-weight: 600; text-decoration: none;">{{ $card['button'] }}</a>
                        </div>
                    @endforeach
                </div>
            @else
                <div style="color: #FFD700; text-align: center; margin-top: 2rem;">
                    Debes iniciar sesión para ver el contenido del dashboard.
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
