<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }
}
