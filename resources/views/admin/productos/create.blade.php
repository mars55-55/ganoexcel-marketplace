{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\admin\productos\create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 600; font-size: 1.25rem; color: #1e1e1e;">
            Crear Producto
        </h2>
    </x-slot>

    <div style="padding: 1.5rem; background-color: #1e1e1e; color: #FFD700;">
        <form action="{{ route('admin.productos.store') }}" method="POST">
            @csrf
            <!-- Nombre del producto -->
            <div style="margin-bottom: 1rem;">
                <label for="nombre" style="display: block; font-size: 0.875rem; font-weight: 500; color: #FFD700; margin-bottom: 0.5rem;">Nombre</label>
                <input type="text" name="nombre" id="nombre"
                       style="width: 100%; padding: 0.5rem; background-color: #121212; color: #FFD700; border: 1px solid #FFD700; border-radius: 0.375rem;"
                       required>
            </div>

            <!-- Descripción -->
            <div style="margin-bottom: 1rem;">
                <label for="descripcion" style="display: block; font-size: 0.875rem; font-weight: 500; color: #FFD700; margin-bottom: 0.5rem;">Descripción</label>
                <textarea name="descripcion" id="descripcion"
                          style="width: 100%; padding: 0.5rem; background-color: #121212; color: #FFD700; border: 1px solid #FFD700; border-radius: 0.375rem;"></textarea>
            </div>

            <!-- Precio unitario -->
            <div style="margin-bottom: 1rem;">
                <label for="precio_unitario" style="display: block; font-size: 0.875rem; font-weight: 500; color: #FFD700; margin-bottom: 0.5rem;">Precio Unitario</label>
                <input type="number" name="precio_unitario" id="precio_unitario"
                       style="width: 100%; padding: 0.5rem; background-color: #121212; color: #FFD700; border: 1px solid #FFD700; border-radius: 0.375rem;"
                       required>
            </div>

            <!-- Categoría -->
            <div style="margin-bottom: 1rem;">
                <label for="categoria_id" style="display: block; font-size: 0.875rem; font-weight: 500; color: #FFD700; margin-bottom: 0.5rem;">Categoría</label>
                <select name="categoria_id" id="categoria_id"
                        style="width: 100%; padding: 0.5rem; background-color: #121212; color: #FFD700; border: 1px solid #FFD700; border-radius: 0.375rem;"
                        required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botón Guardar -->
            <div style="text-align: center;">
                <button type="submit"
                        style="background-color: #FFD700; color: #1e1e1e; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600; transition: background 0.3s;">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
