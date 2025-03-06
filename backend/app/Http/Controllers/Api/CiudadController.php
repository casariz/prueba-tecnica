<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Ciudad;

class CiudadController extends Controller
{
    // Método para obtener todas las ciudades
    public function index()
    {
        $ciudades = Ciudad::all();
        return response()->json($ciudades);
    }

    // Método para obtener el clima de una ciudad
    public function obtenerClima($ciudad_id)
    {
        // Busca la ciudad; se usa findOrFail para lanzar una excepción si no existe
        $ciudad = Ciudad::findOrFail($ciudad_id);

        // Realiza una petición HTTP GET a la API de WeatherAPI
        $response = Http::get('http://api.weatherapi.com/v1/current.json', [
            'key' => env('API_KEY_CLIMAS'),
            'q' => $ciudad->nombre,
            'aqi' => 'no'
        ]);

        // Retorna la respuesta en formato JSON
        return response()->json($response->json());
    }
}
