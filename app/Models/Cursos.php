<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $table = 'cursos';

    protected $fillable = [
        'nombre_curso',
        'descripcion',
        'creditos',
    ];

    public function horarios()
    {
        return $this->hasMany(Horarios::class);
    }

    public function matriculas()
    {
        return $this->hasMany(Matriculas::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(
            Alumnos::class,
            'matriculas',
            'curso_id',
            'alumno_id'
        );
    }

    public function profesores()
    {
        return $this->belongsToMany(
            Profesores::class,
            'curso_profesor',
            'curso_id',
            'profesor_id'
        );
    }
}
