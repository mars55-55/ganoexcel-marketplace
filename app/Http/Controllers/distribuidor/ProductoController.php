<?php
namespace App\Http\Controllers\distribuidor;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        // Base query
        $query = Producto::with('categoria');

        // Filtrar por distribuidor si aplica
        if ($user->role === 'distribuidor') {
            $query->where('user_id', $user->id);
        }

        // Búsqueda por nombre
        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        // Filtrar por categoría
        if ($request->filled('categoria_id')) {
            $query->where('categoria_id', $request->categoria_id);
        }

        // Filtrar por rango de precios
        if ($request->filled('precio_min')) {
            $query->where('precio_unitario', '>=', $request->precio_min);
        }
        if ($request->filled('precio_max')) {
            $query->where('precio_unitario', '<=', $request->precio_max);
        }

        // Obtener productos paginados
        $productos = $query->paginate(10);

        // Obtener todas las categorías para el filtro
        $categorias = \App\Models\Categoria::all();

        return view('distribuidor.productos.index', compact('productos', 'categorias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('distribuidor.productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'ingredientes' => 'nullable|string',
            'beneficios' => 'nullable|string',
            'precio_unitario' => 'required|numeric|min:0',
            'precio_mayorista' => 'nullable|numeric|min:0',
            'categoria_id' => 'nullable|exists:categorias,id',
            'nueva_categoria' => 'nullable|string|max:255',
            'imagen' => 'nullable|image|max:2048',
        ]);

        // Crear una nueva categoría si se proporciona
        if ($request->filled('nueva_categoria')) {
            $categoria = Categoria::create([
                'nombre' => $request->nueva_categoria,
            ]);
            $request->merge(['categoria_id' => $categoria->id]);
        }

        // Crear el producto excluyendo `_token` y `nueva_categoria`
        $producto = Producto::create($request->except(['_token', 'nueva_categoria']));

        // Manejar la imagen si se sube
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('productos', 'public');
            $producto->update(['imagen' => $path]);
        }

        return redirect()->route('distribuidor.productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('distribuidor.productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'ingredientes' => 'nullable',
            'beneficios' => 'nullable',
            'precio_unitario' => 'required|numeric',
            'precio_mayorista' => 'nullable|numeric',
            'imagen' => 'nullable|image',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        $producto->update($data);
        return redirect()->route('distribuidor.productos.index')->with('success', 'Producto actualizado.');
    }

    public function destroy(Producto $producto)
    {
        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }
        $producto->delete();
        return redirect()->route('distribuidor.productos.index')->with('success', 'Producto eliminado.');
    }
}