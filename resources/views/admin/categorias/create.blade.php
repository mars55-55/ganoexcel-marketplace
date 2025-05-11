{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\admin\categorias\create.blade.php --}}
<x-app-layout>
    <x-slot name="header">Crear Categoría</x-slot>

    <div class="py-4 px-6">
        <form action="{{ route('admin.categorias.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="w-full border rounded" required>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Guardar</button>
        </form>
    </div>
</x-app-layout>