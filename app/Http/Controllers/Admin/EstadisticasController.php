<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EstadisticasController extends Controller
{
    public function index()
    {
        // Ganancias por mes basadas en la tabla `compras`
        $gananciasPorMes = DB::table('compras')
            ->selectRaw('YEAR(created_at) as anio, MONTH(created_at) as mes_num, SUM(precio_total) as total_ganancias')
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->orderByRaw('anio, mes_num')
            ->get();

        // Productos más vendidos basados en la tabla `compras`
        $productosMasVendidos = DB::table('compras')
            ->join('productos', 'compras.producto_id', '=', 'productos.id')
            ->select('productos.nombre', DB::raw('SUM(compras.cantidad) as total_vendido'))
            ->groupBy('productos.nombre')
            ->orderByDesc('total_vendido')
            ->get();

        return view('admin.estadisticas.index', compact('gananciasPorMes', 'productosMasVendidos'));
    }
}
