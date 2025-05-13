<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 600; font-size: 1.25rem; color: #1e1e1e;">
            Editar Producto
        </h2>
    </x-slot>

    <div style="padding: 1.5rem; background-color: #1e1e1e; color: #FFD700;">
        <form action="{{ route('distribuidor.productos.update', $producto) }}" method="POST" enctype="multipart/form-data"
              style="background-color: #121212; padding: 1.5rem; border-radius: 0.75rem; border: 1px solid #FFD700;">
            @csrf
            @method('PUT')

            <label for="nombre" style="display: block; margin-bottom: 0.25rem;">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" required
                   style="width: 100%; margin-bottom: 1rem; padding: 0.5rem; background-color: #1e1e1e; color: #FFD700;
                          border: 1px solid #FFD700; border-radius: 0.375rem;">

            <label for="descripcion" style="display: block; margin-bottom: 0.25rem;">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="2"
                      style="width: 100%; margin-bottom: 1rem; padding: 0.5rem; background-color: #1e1e1e;
                             color: #FFD700; border: 1px solid #FFD700; border-radius: 0.375rem;">{{ $producto->descripcion }}</textarea>

            <label for="ingredientes" style="display: block; margin-bottom: 0.25rem;">Ingredientes:</label>
            <textarea name="ingredientes" id="ingredientes" rows="2"
                      style="width: 100%; margin-bottom: 1rem; padding: 0.5rem; background-color: #1e1e1e;
                             color: #FFD700; border: 1px solid #FFD700; border-radius: 0.375rem;">{{ $producto->ingredientes }}</textarea>

            <label for="beneficios" style="display: block; margin-bottom: 0.25rem;">Beneficios:</label>
            <textarea name="beneficios" id="beneficios" rows="2"
                      style="width: 100%; margin-bottom: 1rem; padding: 0.5rem; background-color: #1e1e1e;
                             color: #FFD700; border: 1px solid #FFD700; border-radius: 0.375rem;">{{ $producto->beneficios }}</textarea>

            <label for="precio_unitario" style="display: block; margin-bottom: 0.25rem;">Precio Unitario:</label>
            <input type="number" name="precio_unitario" id="precio_unitario" step="0.01" value="{{ $producto->precio_unitario }}" required
                   style="width: 100%; margin-bottom: 1rem; padding: 0.5rem; background-color: #1e1e1e;
                          color: #FFD700; border: 1px solid #FFD700; border-radius: 0.375rem;">

            <label for="precio_mayorista" style="display: block; margin-bottom: 0.25rem;">Precio Mayorista:</label>
            <input type="number" name="precio_mayorista" id="precio_mayorista" step="0.01" value="{{ $producto->precio_mayorista }}"
                   style="width: 100%; margin-bottom: 1rem; padding: 0.5rem; background-color: #1e1e1e;
                          color: #FFD700; border: 1px solid #FFD700; border-radius: 0.375rem;">

            <label for="categoria_id" style="display: block; margin-bottom: 0.25rem;">Categoría:</label>
            <select name="categoria_id" id="categoria_id"
                    style="width: 100%; margin-bottom: 1rem; padding: 0.5rem; background-color: #1e1e1e;
                           color: #FFD700; border: 1px solid #FFD700; border-radius: 0.375rem;">
                @foreach ($categorias as $cat)
                    <option value="{{ $cat->id }}" @selected($producto->categoria_id === $cat->id)>{{ $cat->nombre }}</option>
                @endforeach
            </select>

            <label for="imagen" style="display: block; margin-bottom: 0.25rem;">Imagen:</label>
            @if ($producto->imagen)
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="imagen" style="height: 80px; margin-bottom: 1rem;">
            @endif
            <input type="file" name="imagen" id="imagen"
                   style="width: 100%; margin-bottom: 1.5rem; color: #FFD700;">

            <button type="submit"
                    style="background-color: #FFD700; color: #000000; padding: 0.5rem 1.5rem;
                           border-radius: 0.375rem; font-weight: 600;">
                Actualizar
            </button>
        </form>
    </div>
</x-app-layout>
