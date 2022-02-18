<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectorExterno extends Model
{
    use HasFactory;

    protected $table = "director_externo";

    protected $fillable = [
        'id',
        'dic_tipo_documento',
        'dic_numero_documento',
        'dic_nombre',
        'dic_apellido',
        'dic_telefono1',
        'dic_telefono2',
        'dic_correo_electronico',
        'dic_banco',
        'dic_numero_cuenta',
        'dic_departamento',
        'dic_ciudad'
    ];

    public function tipodocumento(){
        return $this->belongsTo(TipoDocumento::class, 'dic_tipo_documento');
    }

}
