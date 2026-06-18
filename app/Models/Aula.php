<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_sala'];

    // Un aula tiene muchos equipos
    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}