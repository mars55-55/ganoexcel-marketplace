{{-- filepath: c:\Users\marti\ganoexcel-marketplace\resources\views\admin\usuarios\index.blade.php --}}
<x-app-layout>
    <x-slot name="header">Gestión de Usuarios</x-slot>

    <div style="padding: 1.5rem; background-color: #1e1e1e; color: #FFD700;">

        <div style="text-align: center; margin-bottom: 1rem;">
            <a href="{{ route('admin.usuarios.create') }}"
               style="background-color: #FFD700; color: #1e1e1e; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600; transition: background 0.3s;">
                + Nuevo Usuario
            </a>
        </div>

        <table style="width: 100%; margin-top: 1rem; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="color: #FFD700; font-size: 1rem; text-align: center; padding: 0.5rem; border-bottom: 2px solid #FFD700;">Nombre</th>
                    <th style="color: #FFD700; font-size: 1rem; text-align: center; padding: 0.5rem; border-bottom: 2px solid #FFD700;">Email</th>
                    <th style="color: #FFD700; font-size: 1rem; text-align: center; padding: 0.5rem; border-bottom: 2px solid #FFD700;">Rol</th>
                    <th style="color: #FFD700; font-size: 1rem; text-align: center; padding: 0.5rem; border-bottom: 2px solid #FFD700;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td style="color: #FFD700; padding: 0.5rem; border-bottom: 1px solid #FFD700; text-align: center;">{{ $usuario->name }}</td>
                        <td style="color: #FFD700; padding: 0.5rem; border-bottom: 1px solid #FFD700; text-align: center;">{{ $usuario->email }}</td>
                        <td style="color: #FFD700; padding: 0.5rem; border-bottom: 1px solid #FFD700; text-align: center;">{{ $usuario->role }}</td>
                        <td style="padding: 0.5rem; border-bottom: 1px solid #FFD700; text-align: center;">
                            <div style="display: inline-block; margin-right: 0.5rem;">
                                <a href="{{ route('admin.usuarios.show', $usuario) }}"
                                   style="background-color: transparent; border: 1px solid #FFD700; color: #FFD700; padding: 0.3rem 0.6rem; border-radius: 0.375rem; font-weight: 600; text-decoration: none;">
                                    Ver
                                </a>
                            </div>
                            <div style="display: inline-block; margin-right: 0.5rem;">
                                <a href="{{ route('admin.usuarios.edit', $usuario) }}"
                                   style="background-color: #FFD700; color: #1e1e1e; padding: 0.3rem 0.6rem; border-radius: 0.375rem; font-weight: 600; text-decoration: none;">
                                    Editar
                                </a>
                            </div>
                            <div style="display: inline-block;">
                                <form action="{{ route('admin.usuarios.destroy', $usuario) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('¿Eliminar usuario?')"
                                            style="background-color: #FFD700; color: #1e1e1e; padding: 0.3rem 0.6rem; border-radius: 0.375rem; font-weight: 600; border: none; cursor: pointer;">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 1.5rem;">
            {{ $usuarios->links() }}
        </div>
    </div>
</x-app-layout>
