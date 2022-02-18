<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    use HasFactory;

    protected $table = "uso_laboratorio";

    protected $fillable = [
        'id',
        'lab_nombre',
        'lab_lugar',
        'lab_id_docente',
        'lab_caracteristicas',
        'lab_fecha_laboratorio',
        'lab_id_programa'
    ];

    public function docentes(){
        return $this->belongsTo(Docente::class, 'lab_id_docente');
    }

    public function programas(){
        return $this->belongsTo(Programa::class, 'lab_id_programa');
    }

}
