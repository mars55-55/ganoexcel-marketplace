{{-- filepath: resources/views/admin/cotizaciones/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 600; font-size: 1.5rem; color: #1e1e1e; text-align:center; background:#b08d1a; padding:1rem;">
            Cotizaciones
        </h2>
    </x-slot>
    <div style="padding: 2rem; background: #1e1e1e;">
        <table id="cotizaciones-table" style="width:100%; color:#fff; background:#222; border:1px solid #FFD700;">
            <thead>
                <tr style="background:#FFD700; color:#222;">
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Mensaje</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cotizaciones as $cotizacion)
                    <tr id="cotizacion-{{ $cotizacion->id }}">
                        <td>{{ $cotizacion->id }}</td>
                        <td>{{ $cotizacion->user->name }}</td>
                        <td>{{ $cotizacion->mensaje }}</td>
                        <td class="estado">{{ ucfirst($cotizacion->estado) }}</td>
                        <td>
                            @if ($cotizacion->estado === 'pendiente')
                                <button onclick="actualizarCotizacion({{ $cotizacion->id }}, 'aceptada')" style="background:#4caf50; color:#fff; border:none; padding:6px 12px; border-radius:4px; margin-right:4px;">Aceptar</button>
                                <button onclick="actualizarCotizacion({{ $cotizacion->id }}, 'rechazada')" style="background:#e53935; color:#fff; border:none; padding:6px 12px; border-radius:4px;">Rechazar</button>
                            @else
                                <span>{{ ucfirst($cotizacion->estado) }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="cotizacion-msg" style="margin-top:1rem; color:#FFD700;"></div>
    </div>
    <script>
        function actualizarCotizacion(id, estado) {
            if (!confirm('¿Estás seguro de ' + (estado === 'aceptada' ? 'aceptar' : 'rechazar') + ' esta cotización?')) return;
            fetch(`/admin/cotizaciones/${id}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ estado })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const row = document.getElementById('cotizacion-' + id);
                    row.querySelector('.estado').innerText = estado.charAt(0).toUpperCase() + estado.slice(1);
                    row.querySelector('td:last-child').innerHTML = `<span>${estado.charAt(0).toUpperCase() + estado.slice(1)}</span>`;
                    document.getElementById('cotizacion-msg').innerText = data.message;
                } else {
                    document.getElementById('cotizacion-msg').innerText = 'Error al actualizar la cotización.';
                }
            })
            .catch(() => {
                document.getElementById('cotizacion-msg').innerText = 'Error de conexión.';
            });
        }
    </script>
</x-app-layout>