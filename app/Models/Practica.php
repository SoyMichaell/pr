<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    use HasFactory;

    protected $table = "practicas";

    protected $fillable = [
        'id',
        'pra_id_estudiante',
        'pra_razon_social',
        'pra_nit_empresa',
        'pra_telefono',
        'pra_direccion',
        'pra_fecha_inicio',
        'pra_fecha_fin'
    ];

    public function estudiantes(){
        return $this->belongsTo(Estudiante::class, 'pra_id_estudiante');
    }

}
