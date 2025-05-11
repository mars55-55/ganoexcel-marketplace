<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    public function index()
    {
        $ventasPorMes = Compra::select(
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('SUM(precio_total) as total_ventas')
        )->groupBy('mes')->get();

        $productosMasVendidos = Compra::select(
            'producto_id',
            DB::raw('SUM(cantidad) as total_vendido')
        )->groupBy('producto_id')->orderByDesc('total_vendido')->take(5)->get();

        return view('admin.estadisticas.index', compact('ventasPorMes', 'productosMasVendidos'));
    }
}
