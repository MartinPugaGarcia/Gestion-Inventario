<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materialep extends Model
{
    use HasFactory;
    protected $fillable=['id_producto','alumno','nombre','cantidad','docente','descripcion','fecha','hora','estado'];
}
