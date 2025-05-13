<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $categorias = [
    ['nombre' => 'Bebidas Energéticas'],
    ['nombre' => 'Infusiones y Tés Naturales'],
    ['nombre' => 'Respiratorios Naturales'],
    ['nombre' => 'Suplementos Alimenticios'],
    ['nombre' => 'Aseo e Higiene Personal'],
];


        DB::table('categorias')->insert($categorias);
    }
}
