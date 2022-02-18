<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;

    protected $table = "software";

    protected $fillable = [
        'id',
        'sof_nombre',
        'sof_desarrollador',
        'sof_numero_licencia',
        'sof_adquisicion_licencia',
        'sof_vencimiento_licencia',
        'sof_id_docente'
    ];

    public function docentes(){
        return $this->belongsTo(Docente::class, 'sof_id_docente');
    }

}
