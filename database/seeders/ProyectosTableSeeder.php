<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;

class ProyectosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proyecto::create([
            'nombre' => 'Proyecto 1',
            'fecha_inicio' => now(),
            'estado' => 'En progreso',
            'responsable' => 'Responsable 1',
            'monto' => 1000.00
        ]);

        Proyecto::create([
            'nombre' => 'Proyecto 2',
            'fecha_inicio' => now(),
            'estado' => 'Finalizado',
            'responsable' => 'Responsable 2',
            'monto' => 2000.00
        ]);
    }
}

