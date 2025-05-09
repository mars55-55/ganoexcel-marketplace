<x-app-layout>
    <x-slot name="header">Mi Carrito</x-slot>

    <div class="py-6 px-6">
        @forelse ($carrito as $id => $item)
            <div class="mb-4 border-b pb-4 flex justify-between items-center">
                <div>
                    <strong>{{ $item['nombre'] }}</strong><br>
                    <small>Precio: ${{ number_format($item['precio']) }}</small><br>
                    <form action="{{ route('carrito.update', $id) }}" method="POST">
                        @csrf
                        <input type="number" name="cantidad" value="{{ $item['cantidad'] }}" class="w-16 border">
                        <button class="text-blue-500 ml-2">Actualizar</button>
                    </form>
                </div>
                <form action="{{ route('carrito.remove', $id) }}" method="POST">
                    @csrf
                    <button class="text-red-500">Eliminar</button>
                </form>
            </div>
        @empty
            <p>No hay productos en el carrito.</p>
        @endforelse

        <div class="mt-6">
            <h3 class="text-xl font-semibold">Total: ${{ number_format($total) }}</h3>
            <form action="{{ route('carrito.clear') }}" method="POST" class="mt-2">
                @csrf
                <button class="text-red-500">Vaciar Carrito</button>
            </form>
        </div>
    </div>
</x-app-layout>
