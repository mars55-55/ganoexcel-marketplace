<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class MarketplaceController extends Controller
{
    public function index(Request $request)
    {
        $role = Auth::check() ? Auth::user()->role : null;

        // Filtros básicos (puedes agregar más si lo necesitas)
        $query = Producto::with('categoria');

        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }
        if ($request->filled('categoria_id')) {
            $query->where('categoria_id', $request->categoria_id);
        }
        if ($request->filled('precio_min')) {
            $query->where('precio_unitario', '>=', $request->precio_min);
        }
        if ($request->filled('precio_max')) {
            $query->where('precio_unitario', '<=', $request->precio_max);
        }

        $productos = $query->paginate(12);
        $categorias = \App\Models\Categoria::all();

        // Pasar el rol a la vista para mostrar el precio adecuado
        return view('marketplace.index', compact('productos', 'categorias', 'role'));
    }
}