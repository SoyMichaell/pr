<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaCiclo extends Model
{
    use HasFactory;

    protected $table = "programa_ciclos";

    protected $fillable = [
        'id',
        'prc_nombre'
    ];

}
