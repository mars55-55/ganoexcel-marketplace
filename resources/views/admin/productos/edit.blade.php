{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\admin\productos\edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">Editar Producto</x-slot>

    <div class="py-4 px-6">
        <form action="{{ route('admin.productos.update', $producto) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="w-full border rounded" value="{{ $producto->nombre }}" required>
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="w-full border rounded">{{ $producto->descripcion }}</textarea>
            </div>

            <div class="mb-4">
                <label for="precio_unitario" class="block text-sm font-medium text-gray-700">Precio Unitario</label>
                <input type="number" name="precio_unitario" id="precio_unitario" class="w-full border rounded" value="{{ $producto->precio_unitario }}" required>
            </div>

            <div class="mb-4">
                <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select name="categoria_id" id="categoria_id" class="w-full border rounded" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
        </form>
    </div>
</x-app-layout>