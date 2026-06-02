<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    
     protected $table = 'alumnos';

    protected $fillable = [
        'nombres',
        'apellidos',
        'dni',
        'correo',
        'fecha_nacimiento',
        'telefono',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }

    public function cursos()
    {
        return $this->belongsToMany(
            Curso::class,
            'matriculas',
            'alumno_id',
            'curso_id'
        );
    }
}
