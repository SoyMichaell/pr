<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = "docentes";

    protected $fillable = [
        'id','doc_tipo_documento','doc_numero_documento','doc_nombre','doc_apellido',
        'doc_telefono1','doc_telefono2','doc_correo_personal','doc_correo_institucional','doc_departamento',
        'doc_ciudad','doc_direccion','doc_estudios','doc_estudio_complementarios','doc_fecha_inicio_contra',
        'doc_fecha_fin_contra','doc_experiencia','doc_categoria','doc_becas','doc_reconocimiento',
        'doc_organos_colegiales','doc_asignaturas','doc_evaluacion_docente'
    ];

    public function programas(){
        return $this->hasMany(Programa::class, 'id');
    }

    public function tipodocumento(){
        return $this->belongsTo(TipoDocumento::class, 'doc_tipo_documento');
    }

    public function softwares(){
        return $this->hasMany(Software::class, 'id');
    }

    public function laboratorios(){
        return $this->hasMany(Laboratorio::class, 'id');
    }

    public function movilidad(){
        return $this->hasMany(Movilidad::class, 'id');
    }

    public function investigacion(){
        return $this->hasMany(Investigacion::class, 'id');
    }

}
