<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;

    protected $table = "convenio";

    protected $fillable = [
        'id',
        'con_nombre',
        'con_pais',
        'con_objetivo',
        'con_fecha_convenio'
    ];

}
