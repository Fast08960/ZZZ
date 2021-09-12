<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorksJobs extends Model
{
    use HasFactory;
    protected $table = 'work_jobs';


    protected $fillable = [
        'id_basicos',
        'empresa',
        'cargo',
        'fecha_inicio',
        'fecha_terminacion',
    ];
}
