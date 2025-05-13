<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodoEnvioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $metodosEnvio = [
            ['nombre' => 'Envío Estándar', 'costo' => 5000],
            ['nombre' => 'Envío Express', 'costo' => 10000],
           
        ];

        DB::table('metodos_envio')->insert($metodosEnvio);
    }
}
