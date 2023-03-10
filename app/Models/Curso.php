<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'id_docente');
    }

    public function practica()
    {
        return $this->hasMany(Practica::class, 'id_curso');
    }
}
