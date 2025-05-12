<x-app-layout>
    <x-slot name="header">Nuevo Producto</x-slot>

    <div class="py-4 px-6" style="background-color: #1e1e1e; color: #FFD700;">
        <form action="{{ route('distribuidor.productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="nombre" style="font-size: 1rem; font-weight: 600; color: #FFD700;">Nombre:</label>
            <input type="text" name="nombre" required class="w-full mb-2 border rounded" style="background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700;">

            <label for="descripcion" style="font-size: 1rem; font-weight: 600; color: #FFD700;">Descripción:</label>
            <textarea name="descripcion" class="w-full mb-2 border rounded" style="background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700;"></textarea>

            <label for="ingredientes" style="font-size: 1rem; font-weight: 600; color: #FFD700;">Ingredientes:</label>
            <textarea name="ingredientes" class="w-full mb-2 border rounded" style="background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700;"></textarea>

            <label for="beneficios" style="font-size: 1rem; font-weight: 600; color: #FFD700;">Beneficios:</label>
            <textarea name="beneficios" class="w-full mb-2 border rounded" style="background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700;"></textarea>

            <label for="precio_unitario" style="font-size: 1rem; font-weight: 600; color: #FFD700;">Precio Unitario:</label>
            <input type="number" name="precio_unitario" step="0.01" required class="w-full mb-2 border rounded" style="background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700;">

            <label for="precio_mayorista" style="font-size: 1rem; font-weight: 600; color: #FFD700;">Precio Mayorista:</label>
            <input type="number" name="precio_mayorista" step="0.01" class="w-full mb-2 border rounded" style="background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700;">

            <label for="categoria_id" style="font-size: 1rem; font-weight: 600; color: #FFD700;">Categoría Existente:</label>
            <select name="categoria_id" class="w-full mb-2 border rounded" style="background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700;">
                <option value="">Seleccionar una categoría</option>
                @foreach ($categorias as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                @endforeach
            </select>

            <label for="nueva_categoria" style="font-size: 1rem; font-weight: 600; color: #FFD700;">O Crear Nueva Categoría:</label>
            <input type="text" name="nueva_categoria" placeholder="Escribe una nueva categoría" class="w-full mb-2 border rounded" style="background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700;">

            <label for="imagen" style="font-size: 1rem; font-weight: 600; color: #FFD700;">Imagen:</label>
            <input type="file" name="imagen" class="w-full mb-4" style="background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700;">

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded" style="background-color: #FFD700; color: #1e1e1e; border: none; font-weight: 600;">
                Guardar
            </button>
        </form>
    </div>
</x-app-layout>
