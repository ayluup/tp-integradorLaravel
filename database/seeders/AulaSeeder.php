<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aula;

class AulaSeeder extends Seeder
{
    public function run()
    {
        Aula::create(['nombre_sala' => 'Laboratorio 1']);
        Aula::create(['nombre_sala' => 'Laboratorio 2']);
        Aula::create(['nombre_sala' => 'Biblioteca']);
        Aula::create(['nombre_sala' => 'Preceptoría']);
        Aula::create(['nombre_sala' => 'Aula de Usos Múltiples']);
    }
}