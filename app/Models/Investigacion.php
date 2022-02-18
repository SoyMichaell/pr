<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigacion extends Model
{
    use HasFactory;
    protected $table = "investigacion";

    protected $fillable = [
        'id','inv_titulo_proyecto',
        'inv_grupo_semillero','inv_director',
        'inv_sede','inv_programa',
        'inv_estado_proyecto','inv_fecha_inicio'
    ];

    public function docentes(){
        return $this->belongsTo(Docente::class, 'inv_director');
    }

    public function sedes(){
        return $this->belongsTo(Municipio::class, 'inv_sede');
    }

    public function programas(){
        return $this->belongsTo(Programa::class, 'inv_programa');
    }

}
