<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicDates extends Model
{
    use HasFactory;
    protected $table = 'basic_dates';


    protected $fillable = [
        'cedula',
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
        'telefono',
        'direccion',
        'correo',
        'genero',
        'nacionalidad',
        'estado_civil',
        'fecha_nacimiento',
        'rh',
    ];
}
