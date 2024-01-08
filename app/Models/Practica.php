<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    use HasFactory;

    static $rules=[
        'idusuario'=>'required',
        'title'=>'required',
        'descripcion'=>'required',
        'aula'=>'required',
        'cantidadal'=>'required',
        'grupo'=>'required',
        'docente'=>'required',
        'start'=>'required',
        'horainicio'=>'required',
        'horaterminacion'=>'required'
    ];

    protected $fillable=['idusuario','title','descripcion','aula','cantidadal','grupo','docente','start','horainicio','horaterminacion'];
}
