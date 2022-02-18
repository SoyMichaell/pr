<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedAcademica extends Model
{
    use HasFactory;

    protected $table = "redes_academicas";

    protected $fillable = [
        'id',
        'red_nombre',
        'red_accion',
        'red_fecha_afiliacion',
        'red_programa',
    ];

}
