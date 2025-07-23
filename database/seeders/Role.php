<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'nom' => 'SuperAdmin',
            'slug' => 'superadmin',
        ]);

        DB::table('roles')->insert([
            'nom' => 'Administrateur',
            'slug' => 'administrateur',
        ]);

        DB::table('roles')->insert([
            'nom' => "AdministrateurAgence",
            'slug' => 'administrateur_agence',
        ]);
    }
}
