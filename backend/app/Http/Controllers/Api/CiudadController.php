<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Ciudad;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudades = Ciudad::all();
        return response()->json($ciudades);
    }


    /**
     * Muestra el clima de la ciudad seleccionada.
     *
     * @param  int  $ciudad_id
     * @return \Illuminate\Http\Response
     */
    public function obtenerClima($ciudad_id)
    {
        $ciudad = Ciudad::find($ciudad_id);
        $response = Http::get('http://api.weatherapi.com/v1/current.json', [
            'key' => env('API_KEY_CLIMAS'),
            'q' => $ciudad->nombre,
            'aqi' => 'no'
        ]);
        return response()->json($response->json());
    }
}
