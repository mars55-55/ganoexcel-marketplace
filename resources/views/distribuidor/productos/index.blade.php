<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 600; font-size: 1.25rem; color: #1e1e1e;">
            Productos
        </h2>
    </x-slot>

    <div style="padding: 1.5rem; background-color: #1e1e1e; color: #FFD700;">
        @php
            $role = Auth::user()->role;
        @endphp

        {{-- Botón para distribuidores --}}
        @if ($role === 'distribuidor')
            <div style="text-align: center; margin-bottom: 1.5rem;">
                <a href="{{ route('distribuidor.productos.create') }}"
                   style="background-color: #FFD700; color: #000000; padding: 0.5rem 1.5rem; border-radius: 0.375rem; font-weight: 600; transition: background 0.3s;">
                    + Nuevo Producto
                </a>
            </div>
        @endif

        {{-- Filtros --}}
        <div style="margin-bottom: 2rem; background-color: #121212; padding: 1.5rem; border-radius: 0.75rem; border: 1px solid #FFD700;">
            <h3 style="text-align: center; font-size: 1.25rem; font-weight: bold; margin-bottom: 1rem;">Filtrar Productos</h3>
            <form method="GET" action="{{ route('distribuidor.productos.index') }}">
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <div style="flex: 1 1 30%;">
                        <label for="nombre" style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem;">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{ request('nombre') }}"
                               style="width: 100%; padding: 0.5rem; background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700; border-radius: 0.375rem;">
                    </div>
                    <div style="flex: 1 1 30%;">
                        <label for="categoria_id" style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem;">Categoría</label>
                        <select name="categoria_id" id="categoria_id"
                                style="width: 100%; padding: 0.5rem; background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700; border-radius: 0.375rem;">
                            <option value="">Todas</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1 1 30%; display: flex; gap: 0.5rem;">
                        <div style="flex: 1;">
                            <label for="precio_min" style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem;">Precio Mín</label>
                            <input type="number" name="precio_min" id="precio_min" value="{{ request('precio_min') }}"
                                   style="width: 100%; padding: 0.5rem; background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700; border-radius: 0.375rem;">
                        </div>
                        <div style="flex: 1;">
                            <label for="precio_max" style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem;">Precio Máx</label>
                            <input type="number" name="precio_max" id="precio_max" value="{{ request('precio_max') }}"
                                   style="width: 100%; padding: 0.5rem; background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700; border-radius: 0.375rem;">
                        </div>
                    </div>
                </div>

                <div style="text-align: center; margin-top: 1rem;">
                    <button type="submit"
                            style="background-color: #FFD700; color: #000000; padding: 0.5rem 1.5rem; border-radius: 0.375rem; font-weight: 600;">
                        Aplicar Filtros
                    </button>
                    <a href="{{ route('distribuidor.productos.index') }}"
                       style="margin-left: 1rem; color: #FFD700; text-decoration: underline;">
                        Limpiar Filtros
                    </a>
                </div>
            </form>
        </div>

        {{-- Lista de productos --}}
        <div style="display: flex; flex-wrap: wrap; gap: 1.5rem; justify-content: center;">
            @foreach ($productos as $producto)
                <div style="background-color: #121212; padding: 1rem; border-radius: 0.75rem; border: 1px solid #FFD700; width: 280px; flex: 0 0 auto; position: relative;">
                    {{-- Mostrar la imagen --}}
                    @if ($producto->imagen)
                        <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="imagen"
                            style="width: 100%; height: auto; border-radius: 0.75rem; object-fit: cover; margin-bottom: 1rem;">
                    @endif
                    <h3 style="font-size: 1.25rem; font-weight: bold;">{{ $producto->nombre }}</h3>
                    <p style="color: #FFA500;">{{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
                    <p>Precio: ${{ number_format($producto->precio_unitario, 2) }}</p>
                    <p style="color: #FFA500;">Calificación: 
                        @php
                            $promedio = $producto->reviews->avg('calificacion');
                        @endphp
                        {{ $promedio ? number_format($promedio, 1) . '/5' : 'Sin calificaciones' }}
                    </p>

                    {{-- Botón editar (visible para todos los distribuidores) --}}
                    @if ($role === 'distribuidor')
                        <div style="margin-top: 1rem; text-align: center;">
                            <a href="{{ route('distribuidor.productos.edit', $producto) }}"
                               style="background-color: #FFD700; color: #000000; padding: 0.6rem 1.5rem; border-radius: 0.5rem; font-weight: 700; display: inline-block; box-shadow: 0 4px 10px rgba(255, 215, 0, 0.3); transition: transform 0.2s, box-shadow 0.2s;"
                               onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 12px rgba(255, 215, 0, 0.4)';"
                               onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 10px rgba(255, 215, 0, 0.3)';">
                                ✏️ Editar Producto
                            </a>
                        </div>
                    @endif

                    {{-- Carrito (solo para clientes) --}}
                    @if ($role === 'cliente')
                        <form method="POST" action="{{ route('cart.store') }}" style="margin-top: 1rem;">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            <input type="number" name="cantidad" value="1" min="1"
                                style="width: 60px; padding: 0.3rem; border: 1px solid #FFD700; background-color: #1e1e1e; color: #FFD700; border-radius: 0.375rem;">
                            <button type="submit"
                                    style="margin-left: 0.5rem; background-color: #FFD700; color: #000000; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600;">
                                Añadir al Carrito
                            </button>
                        </form>
                    @endif
                    @if ($role === 'cliente')
                        <div style="margin-top: 1rem; text-align: center;">
                            <button type="button" onclick="mostrarFormularioResena({{ $producto->id }})"
                                    style="background-color: #FFD700; color: #000000; padding: 0.6rem 1.5rem; border-radius: 0.5rem; font-weight: 700; display: inline-block; box-shadow: 0 4px 10px rgba(255, 215, 0, 0.3); transition: transform 0.2s, box-shadow 0.2s;">
                                Deja tu Reseña
                            </button>
                        </div>
                    @endif

                    {{-- Formulario de reseña (oculto inicialmente) --}}
                    @if ($role === 'cliente')
                        <div id="formulario-resena-{{ $producto->id }}" style="display: none; margin-top: 2rem; padding: 1.5rem; background-color: #121212; border: 1px solid #FFD700; border-radius: 0.75rem;">
                            <h3 style="text-align: center; font-size: 1.25rem; font-weight: bold; margin-bottom: 1rem;">Deja una Reseña para "{{ $producto->nombre }}"</h3>
                            <form action="{{ route('reviews.store', $producto) }}" method="POST">
                                @csrf
                                <label for="calificacion" style="display: block; margin-bottom: 0.25rem;">Calificación</label>
                                <select name="calificacion" id="calificacion"
                                        style="width: 100%; margin-bottom: 1rem; padding: 0.5rem; background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700; border-radius: 0.375rem;">
                                    <option value="1">1 - Muy malo</option>
                                    <option value="2">2 - Malo</option>
                                    <option value="3">3 - Regular</option>
                                    <option value="4">4 - Bueno</option>
                                    <option value="5">5 - Excelente</option>
                                </select>

                                <label for="comentario" style="display: block; margin-bottom: 0.25rem;">Comentario</label>
                                <textarea name="comentario" id="comentario" rows="2"
                                          style="width: 100%; margin-bottom: 1rem; padding: 0.5rem; background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700; border-radius: 0.375rem;"></textarea>

                                <button type="submit"
                                        style="background-color: #FFD700; color: #000000; padding: 0.5rem 1.5rem; border-radius: 0.375rem; font-weight: 600;">
                                    Enviar Reseña
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>


        {{-- Paginación --}}
        <div style="text-align: center; margin-top: 2rem;">
            {{ $productos->links() }}
        </div>
    </div>
    <script>
    function mostrarFormularioResena(productoId) {
        document.querySelectorAll('.formulario-resena').forEach(el => el.style.display = 'none');
        const form = document.getElementById('formulario-resena-' + productoId);
        if (form) {
            form.style.display = 'block';
        }
    }
</script>
</x-app-layout>
