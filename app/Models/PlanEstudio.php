<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PlanEstudio extends Model
{
    use HasFactory;

    protected $table = "programas_plan_estudio";

    protected $fillable = [
        'id',
        'pp_id_programa',
        'pp_nombre',
        'pp_creditos',
        'pp_asignaturas',
        'pp_estado'
    ];
}
