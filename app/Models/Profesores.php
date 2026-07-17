<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesores extends Model
{
    protected $table = 'profesores';

    protected $fillable = [
        'nombres',
        'apellidos',
        'especialidad',
        'correo',
        'telefono',
    ];

    // public function cursos()
    // {
    //     return $this->belongsToMany(
    //         Cursos::class,
    //         'curso_profesor',
    //         'profesor_id',
    //         'curso_id'
    //     );
    // }

}
