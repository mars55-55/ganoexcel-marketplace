<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cotizacion;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    public function index()
    {
        $cotizaciones = Cotizacion::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.cotizaciones', compact('cotizaciones'));
    }

    public function update(Request $request, Cotizacion $cotizacion)
    {
        $request->validate([
            'estado' => 'required|in:aceptada,rechazada',
        ]);
        $cotizacion->estado = $request->estado;
        $cotizacion->save();

        return response()->json([
            'success' => true,
            'message' => 'Cotización actualizada correctamente.'
        ]);
    }
}
