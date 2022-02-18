<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;

    protected $table = "trabajo_grado";

    protected $fillable = [
        'id',
        'tra_fecha_ejecuccion',
        'tra_nombre',
        'tra_id_estudiante',
        'tra_director',
        'tra_jurado',
        'tra_fecha_inicio',
        'tra_fecha_fin',
        'tra_documento'
    ];

}
