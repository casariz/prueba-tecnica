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

        $nombre_moneda = $ciudad->moneda->nombre;
        $simbolo = $ciudad->moneda->simbolo;
        $acronimo_moneda = $ciudad->moneda->acronimo;

        // Obtiene la API key desde el archivo .env
        $apiKey = env('API_KEY_MONEDAS');

        // Construye la URL de la API utilizando la API key y el acrónimo
        $url = "http://v6.exchangerate-api.com/v6/{$apiKey}/latest/COP";

        // Realiza la petición HTTP GET a la API sin verificar el certificado SSL
        $response = Http::withoutVerifying()->get($url);

        $data = $response->json();
    
        // Extrae la tasa de cambio usando el acrónimo de la moneda
        $tasa_cambio = isset($data['conversion_rates'][$acronimo_moneda])
            ? $data['conversion_rates'][$acronimo_moneda]
            : null;
    
        // Retorna los datos en formato JSON
        return response()->json([
            'tasa_cambio'    => $tasa_cambio,
            'simbolo_moneda' => $simbolo,
            'nombre_moneda'  => $nombre_moneda,
        ]);
    }
}
