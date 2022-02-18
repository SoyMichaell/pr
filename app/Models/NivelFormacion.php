<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelFormacion extends Model
{
    use HasFactory;

    protected $table = "nivelformacion";

    protected $fillable = [
        'id',
        'niv_nombre',
    ];

    public function programas(){
        return $this->hasMany(Programa::class, 'id');
    }

}
