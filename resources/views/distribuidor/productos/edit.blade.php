<x-app-layout>
    <x-slot name="header">Editar Producto</x-slot>

    <div class="py-4 px-6">
        <form action="{{ route('distribuidor.productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <label>Nombre:</label>
            <input type="text" name="nombre" value="{{ $producto->nombre }}" required class="w-full mb-2 border rounded">

            <label>Descripción:</label>
            <textarea name="descripcion" class="w-full mb-2 border rounded">{{ $producto->descripcion }}</textarea>

            <label>Ingredientes:</label>
            <textarea name="ingredientes" class="w-full mb-2 border rounded">{{ $producto->ingredientes }}</textarea>

            <label>Beneficios:</label>
            <textarea name="beneficios" class="w-full mb-2 border rounded">{{ $producto->beneficios }}</textarea>

            <label>Precio Unitario:</label>
            <input type="number" name="precio_unitario" step="0.01" value="{{ $producto->precio_unitario }}" required class="w-full mb-2 border rounded">

            <label>Precio Mayorista:</label>
            <input type="number" name="precio_mayorista" step="0.01" value="{{ $producto->precio_mayorista }}" class="w-full mb-2 border rounded">

            <label>Categoría:</label>
            <select name="categoria_id" class="w-full mb-2 border rounded">
                @foreach ($categorias as $cat)
                    <option value="{{ $cat->id }}" @selected($producto->categoria_id === $cat->id)>{{ $cat->nombre }}</option>
                @endforeach
            </select>

            <label>Imagen:</label>
            @if ($producto->imagen)
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="imagen" class="h-20 mb-2">
            @endif
            <input type="file" name="imagen" class="w-full mb-4">

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
        </form>
    </div>
</x-app-layout>
