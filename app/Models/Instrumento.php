<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    use HasFactory;
    protected $fillable=['nombre','descripcion','codigo','marca','cantidad','fecha_mantenimiento'];
}
