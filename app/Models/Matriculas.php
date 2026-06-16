<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matriculas extends Model
{
    protected $table = 'matriculas';

    protected $fillable = [
        'alumno_id',
        'curso_id',
        'fecha_matricula',
    ];

    protected $casts = [
        'fecha_matricula' => 'date',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumnos::class);
    }

    public function curso()
    {
        return $this->belongsTo(Cursos::class);
    }
}
