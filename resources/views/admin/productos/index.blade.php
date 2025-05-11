{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\admin\productos\index.blade.php --}}
<x-app-layout>
    <x-slot name="header">Gestión de Productos</x-slot>

    <div class="py-4 px-6">
        <a href="{{ route('admin.productos.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">+ Nuevo Producto</a>

        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                        <td>${{ number_format($producto->precio_unitario, 2) }}</td>
                        <td>
                            <a href="{{ route('admin.productos.edit', $producto) }}" class="text-blue-500">Editar</a>
                            <form action="{{ route('admin.productos.destroy', $producto) }}" method="POST" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $productos->links() }}
        </div>
    </div>
</x-app-layout>