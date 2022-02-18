<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = "municipios";

    protected $fillable = [
        'id',
        'mun_nombre',
        'mun_departamento'
    ];

    public function investigacion(){
        return $this->hasMany(Investigacion::class, 'id');
    }

}
