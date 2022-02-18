<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movilidad extends Model
{
    use HasFactory;

    protected $table = "movilidad";

    protected $fillable = [
        'id',
        'mov_fecha_movilidad',
        'mov_id_docente',
        'mov_id_estudiante',
        'mov_tipo',
        'mov_evento',
        'mov_ciudad_pais'
    ];

    public function docentes(){
        return $this->belongsTo(Docente::class, 'mov_id_docente');
    }

    public function estudiantes(){
        return $this->belongsTo(Estudiante::class, 'mov_id_estudiante');
    }

}
