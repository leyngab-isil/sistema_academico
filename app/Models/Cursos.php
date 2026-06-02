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
        return $this->hasMany(Horario::class);
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(
            Alumno::class,
            'matriculas',
            'curso_id',
            'alumno_id'
        );
    }

    public function profesores()
    {
        return $this->belongsToMany(
            Profesor::class,
            'curso_profesor',
            'curso_id',
            'profesor_id'
        );
    }
}
