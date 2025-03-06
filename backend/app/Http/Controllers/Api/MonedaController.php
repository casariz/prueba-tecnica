<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use App\Models\Moneda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MonedaController extends Controller
{
    // Método para obtener todas las monedas
    public function index()
    {
        $monedas = Moneda::all();
        return response()->json($monedas);
    }

    // Método para obtener el cambio de un pais/ciudad
    public function obtenerCambio($ciudad_id)
    {
        // Busca la ciudad; se usa findOrFail para lanzar una excepción si no existe
        $ciudad = Ciudad::findOrFail($ciudad_id);

        // Accede a la relación definida en el modelo Ciudad (por ejemplo, public function moneda())
        $acronimo = $ciudad->moneda->acronimo;

        // Obtiene la API key desde el archivo .env
        $apiKey = env('API_KEY_MONEDAS');

        // Construye la URL de la API utilizando la API key y el acrónimo
        $url = "http://v6.exchangerate-api.com/v6/{$apiKey}/latest/{$acronimo}";

        // Realiza la petición HTTP GET a la API sin verificar el certificado SSL
        $response = Http::withoutVerifying()->get($url);

        // Retorna la respuesta en formato JSON
        return response()->json($response->json());
    }
}
