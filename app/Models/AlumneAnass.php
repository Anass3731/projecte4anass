<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumneAnass extends Model
{
    protected $table = 'alumne_anass';

    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'edad',
    ];
}