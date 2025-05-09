<x-app-layout>
    <x-slot name="header">Nuevo Producto</x-slot>

    <div class="py-4 px-6">
        <form action="{{ route('distribuidor.productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>Nombre:</label>
            <input type="text" name="nombre" required class="w-full mb-2 border rounded">

            <label>Descripción:</label>
            <textarea name="descripcion" class="w-full mb-2 border rounded"></textarea>

            <label>Ingredientes:</label>
            <textarea name="ingredientes" class="w-full mb-2 border rounded"></textarea>

            <label>Beneficios:</label>
            <textarea name="beneficios" class="w-full mb-2 border rounded"></textarea>

            <label>Precio Unitario:</label>
            <input type="number" name="precio_unitario" step="0.01" required class="w-full mb-2 border rounded">

            <label>Precio Mayorista:</label>
            <input type="number" name="precio_mayorista" step="0.01" class="w-full mb-2 border rounded">

            <label>Categoría Existente:</label>
            <select name="categoria_id" class="w-full mb-2 border rounded">
                <option value="">Seleccionar una categoría</option>
                @foreach ($categorias as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                @endforeach
            </select>

            <label>O Crear Nueva Categoría:</label>
            <input type="text" name="nueva_categoria" placeholder="Escribe una nueva categoría" class="w-full mb-2 border rounded">

            <label>Imagen:</label>
            <input type="file" name="imagen" class="w-full mb-4">

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Guardar</button>
        </form>
    </div>
</x-app-layout>
