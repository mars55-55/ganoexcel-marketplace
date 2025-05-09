<x-app-layout>
    <x-slot name="header">Productos</x-slot>

    <div class="py-4 px-6">
        <a href="{{ route('distribuidor.productos.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">+ Nuevo Producto</a>

        <ul class="mt-4">
            @foreach ($productos as $producto)
                <li class="py-2 border-b flex justify-between items-center">
                    <span>{{ $producto->nombre }} ({{ $producto->categoria->nombre }})</span>
                    <div>
                        <a href="{{ route('distribuidor.productos.edit', $producto) }}" class="text-blue-500">Editar</a>
                        <form action="{{ route('distribuidor.productos.destroy', $producto) }}" method="POST" class="inline-block ml-2">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
