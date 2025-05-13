{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\marketplace\index.blade.php --}}
<x-app-layout>
    <x-slot name="header">Marketplace</x-slot>

    <div style="padding: 2rem; background-color: #1e1e1e; color: #FFD700;">
        <div style="display: flex; justify-content: flex-end; margin-bottom: 1.5rem;">
            <a href="{{ route('cart.index') }}"
               style="background-color: #FFD700; color: #1e1e1e; padding: 0.6rem 1.5rem; border-radius: 0.5rem; font-weight: 700; text-decoration: none;">
                🛒 Ir al Carrito
            </a>
        </div>
        <h2 style="font-size: 2rem; font-weight: bold; margin-bottom: 2rem;">Productos Disponibles</h2>
        <div style="display: flex; flex-wrap: wrap; gap: 2rem;">
            @foreach ($productos as $producto)
                <div style="background-color: #121212; border: 1px solid #FFD700; border-radius: 1rem; padding: 1.5rem; width: 300px;">
                    @if ($producto->imagen)
                        <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="imagen"
                             style="width: 100%; height: 180px; object-fit: cover; border-radius: 0.75rem; margin-bottom: 1rem;">
                    @endif
                    <h3 style="font-size: 1.25rem; font-weight: bold;">{{ $producto->nombre }}</h3>
                    <p style="color: #FFA500;">{{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
                    
                    @if ($role === 'distribuidor')
                        <p>Precio al por mayor: <span style="color: #FFD700;">${{ number_format($producto->precio_mayorista, 2) }}</span></p>
                        <p style="font-size: 0.9rem; color: #aaa;">(Precio unitario: ${{ number_format($producto->precio_unitario, 2) }})</p>
                    @else
                        <p>Precio unitario: <span style="color: #FFD700;">${{ number_format($producto->precio_unitario, 2) }}</span></p>
                    @endif

                    <div style="margin-top: 1rem;">
                        @if ($role === 'distribuidor')
                            <a href="{{ route('distribuidor.productos.edit', $producto) }}" class="bg-yellow-400 text-black px-4 py-2 rounded">Editar</a>
                        @elseif ($role === 'cliente')
                            <form method="POST" action="{{ route('cart.store') }}">
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                <input type="number" name="cantidad" value="1" min="1" class="w-16 border rounded">
                                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Añadir al Carrito</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $productos->links() }}
        </div>
    </div>
</x-app-layout>