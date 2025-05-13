{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\admin\usuarios\show.blade.php --}}
<x-app-layout>
    <x-slot name="header">Detalle de Usuario</x-slot>
    <div style="padding: 1.5rem;">
        <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Rol:</strong> {{ $usuario->role }}</p>
        <a href="{{ route('admin.usuarios.edit', $usuario) }}" style="background: #FFD700; color: #1e1e1e; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600;">Editar</a>
        <a href="{{ route('admin.usuarios.index') }}" style="margin-left: 1rem;">Volver al listado</a>
    </div>
</x-app-layout>