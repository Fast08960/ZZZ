<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studys extends Model
{
    use HasFactory;
    protected $table = 'studys';


    protected $fillable = [
        'id_basicos',
        'titulo',
        'entidad_educativa',
        'fecha_terminacion',
    ];
}
