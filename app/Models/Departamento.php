<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = "departamentos";

    protected $fillable = [
        'id',
        'dep_nombre',
        'dep_status'
    ];

}
