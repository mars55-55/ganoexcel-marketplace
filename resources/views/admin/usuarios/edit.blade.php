{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\admin\usuarios\edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">Editar Usuario</x-slot>
    <div style="padding: 1.5rem;">
        <form method="POST" action="{{ route('admin.usuarios.update', $usuario) }}">
            @csrf
            @method('PUT')
            <div>
                <label>Nombre</label>
                <input type="text" name="name" value="{{ $usuario->name }}" required>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" value="{{ $usuario->email }}" required>
            </div>
            <div>
                <label>Rol</label>
                <select name="role" required>
                    <option value="admin" @if($usuario->role == 'admin') selected @endif>Admin</option>
                    <option value="distribuidor" @if($usuario->role == 'distribuidor') selected @endif>Distribuidor</option>
                    <option value="cliente" @if($usuario->role == 'cliente') selected @endif>Cliente</option>
                </select>
            </div>
            <div>
                <label>Nueva Contraseña (opcional)</label>
                <input type="password" name="password">
            </div>
            <div>
                <label>Confirmar Contraseña</label>
                <input type="password" name="password_confirmation">
            </div>
            <button type="submit" style="background: #FFD700; color: #1e1e1e; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600;">Actualizar</button>
        </form>
    </div>
</x-app-layout>