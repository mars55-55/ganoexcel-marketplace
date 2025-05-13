{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\admin\usuarios\create.blade.php --}}
<x-app-layout>
    <x-slot name="header">Crear Usuario</x-slot>

    <div class="py-4 px-6" style="background-color: #1e1e1e; color: #FFD700;">
        <form method="POST" action="{{ route('admin.usuarios.store') }}">
            @csrf

            <label for="name" style="font-size: 1rem; font-weight: 600; color: #FFD700;">Nombre:</label>
            <input type="text" name="name" required class="w-full mb-2 border rounded"
                   style="background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700;">

            <label for="email" style="font-size: 1rem; font-weight: 600; color: #FFD700;">Email:</label>
            <input type="email" name="email" required class="w-full mb-2 border rounded"
                   style="background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700;">

            <label for="role" style="font-size: 1rem; font-weight: 600; color: #FFD700;">Rol:</label>
            <select name="role" required class="w-full mb-2 border rounded"
                    style="background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700;">
                <option value="admin">Admin</option>
                <option value="distribuidor">Distribuidor</option>
                <option value="cliente">Cliente</option>
            </select>

            <label for="password" style="font-size: 1rem; font-weight: 600; color: #FFD700;">Contraseña:</label>
            <input type="password" name="password" required class="w-full mb-2 border rounded"
                   style="background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700;">

            <label for="password_confirmation" style="font-size: 1rem; font-weight: 600; color: #FFD700;">Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" required class="w-full mb-4 border rounded"
                   style="background-color: #1e1e1e; color: #FFD700; border: 1px solid #FFD700;">

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded"
                    style="background-color: #FFD700; color: #1e1e1e; border: none; font-weight: 600;">
                Guardar
            </button>
        </form>
    </div>
</x-app-layout>
