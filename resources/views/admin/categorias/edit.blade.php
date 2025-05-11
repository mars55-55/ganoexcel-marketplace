{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\admin\categorias\edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">Editar Categoría</x-slot>

    <div class="py-4 px-6">
        <form action="{{ route('admin.categorias.update', $categoria) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="w-full border rounded" value="{{ $categoria->nombre }}" required>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
        </form>
    </div>
</x-app-layout>