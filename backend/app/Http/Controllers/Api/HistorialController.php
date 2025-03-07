<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function index()
    {
        $historial = Historial::with('ciudad')->get();
        return response()->json($historial);
    }

    public function store(Request $request)
    {
        $historial = new Historial();
        $historial->ciudad_id = $request->ciudad_id;
        $historial->presupuesto_cop = $request->presupuesto_cop;
        $historial->presupuesto_local = $request->presupuesto_local;
        $historial->tasa_cambio = $request->tasa_cambio;
        $historial->fecha_consulta = $request->fecha_consulta;
        $historial->save();
        return response()->json($historial);
    }

    public function show($id)
    {
        $historial = Historial::with('ciudad')->find($id);
        return response()->json($historial);
    }
}
