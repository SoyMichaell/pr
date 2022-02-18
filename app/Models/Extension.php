<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    use HasFactory;

    protected $table = "extension";

    protected $fillable = [
        'id',
        'ext_nombre',
        'ext_tipo_evento',
        'ext_fecha_realizacion',
        'ext_publico_objeto',
        'ext_ponentes',
        'ext_pais',
        'ext_participantes',
        'ext_img'
    ];

}
