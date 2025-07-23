<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('agences')->insert([
            'code' => 'AGENCE-001',
            'libelle' => 'Agence X',
            'email' => 'ousseneoued@gmail.com',
            'telephone' => '61346554',
            'siege' => 'OUAGADOUGOU',
        ]);
    }
}
