<x-app-layout>
    <x-slot name="header">Productos</x-slot>

    <div class="py-4 px-6">
        @php
            $role = Auth::user()->role;
        @endphp

        {{-- Mostrar botón de "Nuevo Producto" solo para distribuidores --}}
        @if ($role === 'distribuidor')
            <a href="{{ route('distribuidor.productos.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">+ Nuevo Producto</a>
        @endif

        {{-- Formulario de búsqueda y filtros --}}
        <form method="GET" action="{{ route('distribuidor.productos.index') }}" class="mt-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                {{-- Búsqueda por nombre --}}
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Buscar por Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="{{ request('nombre') }}" class="w-full border rounded">
                </div>

                {{-- Filtrar por categoría --}}
                <div>
                    <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                    <select name="categoria_id" id="categoria_id" class="w-full border rounded">
                        <option value="">Todas</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Filtrar por rango de precios --}}
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label for="precio_min" class="block text-sm font-medium text-gray-700">Precio Mínimo</label>
                        <input type="number" name="precio_min" id="precio_min" value="{{ request('precio_min') }}" class="w-full border rounded">
                    </div>
                    <div>
                        <label for="precio_max" class="block text-sm font-medium text-gray-700">Precio Máximo</label>
                        <input type="number" name="precio_max" id="precio_max" value="{{ request('precio_max') }}" class="w-full border rounded">
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Aplicar Filtros</button>
                <a href="{{ route('distribuidor.productos.index') }}" class="text-gray-500 hover:underline ml-4">Limpiar Filtros</a>
            </div>
        </form>

        {{-- Lista de productos --}}
        <ul class="mt-4">
            @foreach ($productos as $producto)
                <li class="py-2 border-b">
                    <div>
                        <h3 class="font-bold">{{ $producto->nombre }}</h3>
                        <p class="text-sm text-gray-600">{{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
                        <p class="text-sm text-gray-600">Precio: ${{ number_format($producto->precio_unitario, 2) }}</p>

                        {{-- Mostrar calificación promedio --}}
                        <p class="text-sm text-yellow-500">
                            Calificación: 
                            @php
                                $promedio = $producto->reviews->avg('calificacion');
                            @endphp
                            {{ $promedio ? number_format($promedio, 1) : 'Sin calificaciones' }}
                        </p>

                        {{-- Mostrar reseñas --}}
                        <h4 class="font-bold mt-2">Reseñas:</h4>
                        <ul class="ml-4">
                            @foreach ($producto->reviews as $review)
                                <li class="text-sm">
                                    <strong>{{ $review->user->name }}:</strong> 
                                    {{ $review->comentario ?? 'Sin comentario' }} 
                                    ({{ $review->calificacion }}/5)
                                </li>
                            @endforeach
                        </ul>

                        {{-- Opciones para distribuidores --}}
                        @if ($role === 'distribuidor')
                            <a href="{{ route('distribuidor.productos.edit', $producto) }}" class="text-blue-500">Editar</a>
                            <form action="{{ route('distribuidor.productos.destroy', $producto) }}" method="POST" class="inline-block ml-2">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500">Eliminar</button>
                            </form>
                        @endif

                        {{-- Opciones para clientes --}}
                        @if ($role === 'cliente')
                            <form method="POST" action="{{ route('cart.store') }}" class="inline-block">
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                <input type="number" name="cantidad" value="1" min="1" class="w-16 border rounded">
                                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Añadir al Carrito</button>
                            </form>

                            {{-- Formulario para agregar una reseña --}}
                            <form action="{{ route('reviews.store', $producto) }}" method="POST" class="mt-2">
                                @csrf
                                <label for="calificacion" class="block text-sm font-medium text-gray-700">Calificación</label>
                                <select name="calificacion" id="calificacion" class="w-full border rounded mb-2">
                                    <option value="1">1 - Muy malo</option>
                                    <option value="2">2 - Malo</option>
                                    <option value="3">3 - Regular</option>
                                    <option value="4">4 - Bueno</option>
                                    <option value="5">5 - Excelente</option>
                                </select>

                                <label for="comentario" class="block text-sm font-medium text-gray-700">Comentario</label>
                                <textarea name="comentario" id="comentario" rows="2" class="w-full border rounded mb-2"></textarea>

                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Enviar Reseña</button>
                            </form>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>

        {{-- Paginación --}}
        <div class="mt-4">
            {{ $productos->links() }}
        </div>
    </div>

    {{-- Historial de compras para distribuidores --}}
    @if ($role === 'distribuidor')
        <div class="mt-4">
            <a href="{{ route('distribuidor.compras.index') }}" class="text-blue-500 hover:underline">
                Ver Historial de Compras
            </a>
        </div>
    @endif
</x-app-layout>
