<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $table = 'historial';

    protected $primaryKey = 'historial_id';

    public $timestamps = false;

    protected $fillable = [
        'ciudad_id',
        'presupuesto_cop',
        'presupuesto_local',
        'tasa_cambio',
        'fecha_consulta',
        'clima'
    ];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id', 'ciudad_id');
    }
}
