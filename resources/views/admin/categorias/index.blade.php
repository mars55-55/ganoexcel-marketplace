{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\admin\categorias\index.blade.php --}}
<x-app-layout>
    <x-slot name="header">Gestión de Categorías</x-slot>

    <div class="py-4 px-6">
        <a href="{{ route('admin.categorias.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">+ Nueva Categoría</a>

        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nombre }}</td>
                        <td>
                            <a href="{{ route('admin.categorias.edit', $categoria) }}" class="text-blue-500">Editar</a>
                            <form action="{{ route('admin.categorias.destroy', $categoria) }}" method="POST" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $categorias->links() }}
        </div>
    </div>
</x-app-layout>