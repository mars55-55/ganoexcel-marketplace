{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\admin\usuarios\show.blade.php --}}
<x-app-layout>
    <x-slot name="header">Detalle de Usuario</x-slot>

    <div class="py-4 px-6" style="background-color: #1e1e1e; color: #FFD700;">
        <p style="font-size: 1rem; font-weight: 600;"><strong>Nombre:</strong> {{ $usuario->name }}</p>
        <p style="font-size: 1rem; font-weight: 600;"><strong>Email:</strong> {{ $usuario->email }}</p>
        <p style="font-size: 1rem; font-weight: 600;"><strong>Rol:</strong> {{ $usuario->role }}</p>

        <div class="mt-4">
            <a href="{{ route('admin.usuarios.edit', $usuario) }}"
               style="background-color: #FFD700; color: #1e1e1e; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600; text-decoration: none;">
                Editar
            </a>

            <a href="{{ route('admin.usuarios.index') }}"
               style="margin-left: 1rem; color: #FFD700; text-decoration: underline;">
                Volver al listado
            </a>
        </div>
    </div>
</x-app-layout>
