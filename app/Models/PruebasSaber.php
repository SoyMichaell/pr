<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebasSaber extends Model
{
    use HasFactory;

    protected $table = "pruebas_saber";

    protected $fillable = [
        'id',
        'pr_id_estudiante',
        'pr_codigo_prueba',
        'pr_fecha_presentacion',
        'pr_programa',
        'pr_sede',
        'pr_grupo_referencial'
    ];

    public function estudiantes(){
        return $this->belongsTo(Estudiante::class, 'pr_id_estudiante');
    }

    public function programas(){
        return $this->belongsTo(Programa::class, 'pr_id_programa');
    }


}
