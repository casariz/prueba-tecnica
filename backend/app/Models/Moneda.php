<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    use HasFactory;

    protected $table = 'monedas';

    protected $primaryKey = 'moneda_id';

    public $timestamps = false; 

    protected $fillable = [
        'nombre',
    ];
}
