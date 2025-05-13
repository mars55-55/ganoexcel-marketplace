<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Producto;

class EstadisticasController extends Controller
{
    public function index()
    {
        // Ganancias por mes
        $gananciasPorMes = \DB::table('pedido_producto')
            ->selectRaw('YEAR(created_at) as anio, MONTH(created_at) as mes_num, SUM(precio_unitario * cantidad) as total_ganancias')
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->orderByRaw('anio, mes_num')
            ->get();

        // Productos más vendidos
        $productosMasVendidos = \DB::table('pedido_producto')
            ->join('productos', 'pedido_producto.producto_id', '=', 'productos.id')
            ->select('productos.nombre', \DB::raw('SUM(pedido_producto.cantidad) as total_vendido'))
            ->groupBy('productos.nombre')
            ->orderByDesc('total_vendido')
            ->get();

        return view('admin.estadisticas.index', compact('gananciasPorMes', 'productosMasVendidos'));
    }
}
