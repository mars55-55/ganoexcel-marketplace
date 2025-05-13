{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\admin\usuarios\create.blade.php --}}
<x-app-layout>
    <x-slot name="header">Crear Usuario</x-slot>
    <div style="padding: 1.5rem;">
        <form method="POST" action="{{ route('admin.usuarios.store') }}">
            @csrf
            <div>
                <label>Nombre</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Rol</label>
                <select name="role" required>
                    <option value="admin">Admin</option>
                    <option value="distribuidor">Distribuidor</option>
                    <option value="cliente">Cliente</option>
                </select>
            </div>
            <div>
                <label>Contraseña</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label>Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" required>
            </div>
            <button type="submit" style="background: #FFD700; color: #1e1e1e; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600;">Guardar</button>
        </form>
    </div>
</x-app-layout>