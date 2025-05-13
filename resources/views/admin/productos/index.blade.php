{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\admin\productos\index.blade.php --}}
<x-app-layout>
    <x-slot name="header">Gestión de Productos</x-slot>

    <div style="padding: 1.5rem; background-color: #1e1e1e; color: #FFD700;">

        <div style="text-align: center; margin-bottom: 1rem;">
            <a href="{{ route('admin.productos.create') }}"
               style="background-color: #FFD700; color: #1e1e1e; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600; transition: background 0.3s;">
                + Nuevo Producto
            </a>
        </div>

        <div style="text-align: right; margin-bottom: 1rem;">
            <a href="{{ route('admin.productos.create') }}"
               style="background-color: transparent; color: #FFD700; border: 1px solid #FFD700; padding: 0.4rem 1rem; border-radius: 0.375rem; font-weight: 600; text-decoration: none; transition: background 0.3s;">
                Crear producto
            </a>
        </div>

        <table style="width: 100%; margin-top: 1rem; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="color: #FFD700; font-size: 1rem; text-align: center; padding: 0.5rem; border-bottom: 2px solid #FFD700;">Nombre</th>
                    <th style="color: #FFD700; font-size: 1rem; text-align: center; padding: 0.5rem; border-bottom: 2px solid #FFD700;">Categoría</th>
                    <th style="color: #FFD700; font-size: 1rem; text-align: center; padding: 0.5rem; border-bottom: 2px solid #FFD700;">Precio</th>
                    <th style="color: #FFD700; font-size: 1rem; text-align: center; padding: 0.5rem; border-bottom: 2px solid #FFD700;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td style="color: #FFD700; padding: 0.5rem; border-bottom: 1px solid #FFD700; text-align: center;">{{ $producto->nombre }}</td>
                        <td style="color: #FFD700; padding: 0.5rem; border-bottom: 1px solid #FFD700; text-align: center;">{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                        <td style="color: #FFD700; padding: 0.5rem; border-bottom: 1px solid #FFD700; text-align: center;">${{ number_format($producto->precio_unitario, 2) }}</td>
                        <td style="padding: 0.5rem; border-bottom: 1px solid #FFD700; text-align: center;">
                            <div style="display: inline-block; margin-right: 1rem;">
                                <a href="{{ route('admin.productos.edit', $producto) }}"
                                   style="background-color: #FFD700; color: #1e1e1e; padding: 0.3rem 0.6rem; border-radius: 0.375rem; font-weight: 600; text-decoration: none; transition: background 0.3s;">
                                    Editar
                                </a>
                            </div>
                            <div style="display: inline-block;">
                                <form action="{{ route('admin.productos.destroy', $producto) }}" method="POST" class="inline-block">
                                    @csrf @method('DELETE')
                                    <button type="submit" style="background-color: #FFD700; color: #1e1e1e; padding: 0.3rem 0.6rem; border-radius: 0.375rem; font-weight: 600; border: none; cursor: pointer; transition: background 0.3s;">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 1.5rem;">
            {{ $productos->links() }}
        </div>
    </div>
</x-app-layout>
