<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'ciudades';

    protected $primaryKey = 'ciudad_id';

    public $timestamps = false; 

    protected $fillable = [
        'nombre',
    ];
}