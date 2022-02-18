<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = "estudiantes";

    protected $fillable = [
        'id','estu_programa','estu_tipo_documento','estu_numero_documento','estu_nombre',
        'estu_apellido','estu_telefono1','estu_telefono2','estu_direccion','estu_correo',
        'estu_estrato','estu_departamento','estu_municipio','estu_fecha_nacimiento','estu_ingreso',
        'estu_ult_periodo','estu_semestre','estu_financiamiento','estu_beca','estu_estado',
        'estu_matricula','estu_pga','estu_grado','estu_reconocimiento','estu_egresado'
    ];

    public function tipodocumento(){
        return $this->belongsTo(TipoDocumento::class, 'estu_tipo_documento');
    }

    public function programas(){
        return $this->belongsTo(Programa::class, 'estu_programa');
    }

    public function pruebassaaber(){
        return $this->hasMany(PruebasSaber::class, 'id');
    }

    public function practicas(){
        return $this->hasMany(Practica::class, 'id');
    }

    public function movilidad(){
        return $this->hasMany(Movilidad::class, 'id');
    }

    public function egresado(){
        return $this->hasMany(Egresado::class, 'id');
    }
}
