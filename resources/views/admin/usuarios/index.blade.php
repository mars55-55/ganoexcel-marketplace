{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\admin\usuarios\index.blade.php --}}
<x-app-layout>
    <x-slot name="header">Usuarios</x-slot>
    <div style="padding: 1.5rem;">
        <a href="{{ route('admin.usuarios.create') }}" style="background: #FFD700; color: #1e1e1e; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600;">+ Nuevo Usuario</a>
        <table style="width:100%; margin-top:1rem;">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->role }}</td>
                        <td>
                            <a href="{{ route('admin.usuarios.show', $usuario) }}">Ver</a> |
                            <a href="{{ route('admin.usuarios.edit', $usuario) }}">Editar</a> |
                            <form action="{{ route('admin.usuarios.destroy', $usuario) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Eliminar usuario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="margin-top:1rem;">
            {{ $usuarios->links() }}
        </div>
    </div>
</x-app-layout>