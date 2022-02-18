<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;

    protected $table = "tipo_documento";

    protected $fillable = [
        'id',
        'nombre',
        'abr'
    ];

    public function estudiantes(){
        return $this->hasMany(Estudiante::class, 'id');
    }

    public function docentes(){
        return $this->hasMany(Docente::class, 'id');
    }

    public function users(){
        return $this->hasMany(User::class, 'id');
    }

    public function directorexterno(){
        return $this->hasMany(DirectorExterno::class, 'id');
    }

}
