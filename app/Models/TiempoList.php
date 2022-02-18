<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiempoList extends Model
{
    use HasFactory;

    protected $table = "tiempo";

    protected $fillable = [
        'id'
    ];

}
