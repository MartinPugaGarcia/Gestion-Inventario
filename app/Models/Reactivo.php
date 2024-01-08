<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reactivo extends Model
{
    use HasFactory;
    protected $fillable=['nombre','descripcion','ingrediente','hojas','cantidad','fecha_caducidad'];
}
