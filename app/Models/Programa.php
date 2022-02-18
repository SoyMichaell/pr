<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;

    protected $table = "programas";

    protected $fillable = [
        'id','pro_estado_programa','pro_departamento','pro_municipio','pro_facultad','pro_nombre',
        'pro_titulo','pro_codigosnies','pro_resolucion','pro_fecha_ult',
        'pro_fecha_prox','pro_nivel_formacion','pro_programa_ciclos','pro_metodologia',
        'pro_duraccion','pro_periodo','pro_norma','pro_director_programa'
    ];

    public function directorprograma(){
        return $this->belongsTo(Docente::class, 'pro_director_programa');
    }

    public function niveles(){
        return $this->belongsTo(NivelFormacion::class, 'pro_nivel_formacion');
    }

    public function pruebassaber(){
        return $this->belongsTo(PruebasSaber::class, 'id');
    }

    public function laboratorios(){
        return $this->hasMany(Laboratorio::class, 'id');
    }

    public function investigacion(){
        return $this->hasMany(Investigacion::class, 'id');
    }

    public function estudiantes(){
        return $this->hasMany(Estudiante::class, 'id');
    }

}
