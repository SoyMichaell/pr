<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModalidadGrado extends Model
{
    use HasFactory;

    protected $table = "modalidad_grado";

    protected $fillable = [
        'id',
        'mod_nombre'
    ];


}
