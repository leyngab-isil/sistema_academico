<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
     protected $table = 'horarios';

    protected $fillable = [
        'curso_id',
        'dia_semana',
        'hora_inicio',
        'hora_fin',
        'aula',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
