{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\admin\categorias\edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 600; font-size: 1.25rem; color: #1e1e1e;">
            Editar Categoría
        </h2>
    </x-slot>

    <div style="padding: 1.5rem; background-color: #1e1e1e; color: #FFD700; display: flex; justify-content: center;">
        <form action="{{ route('admin.categorias.update', $categoria) }}" method="POST" style="width: 100%; max-width: 400px;">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 1rem;">
                <label for="nombre"
                       style="display: block; font-size: 0.875rem; font-weight: 500; color: #FFD700; margin-bottom: 0.5rem;">
                    Nombre
                </label>
                <input type="text" name="nombre" id="nombre"
                       value="{{ $categoria->nombre }}"
                       style="width: 100%; padding: 0.5rem; background-color: #121212; color: #FFD700; border: 1px solid #FFD700; border-radius: 0.375rem;"
                       required>
            </div>

            <div style="text-align: center;">
                <button type="submit"
                        style="background-color: #FFD700; color: #1e1e1e; padding: 0.5rem 1.5rem; border-radius: 0.375rem; font-weight: 600; transition: background 0.3s;">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
