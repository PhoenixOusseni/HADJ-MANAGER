<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nom' => 'OUEDRAOGO',
            'prenom' => 'Ousseni',
            'username' => 'ousseneoued',
            'email' => 'ousseneoued@gmail.com',
            'statut' => 'actif',
            'role_id' => '1',
            'telephone' => '01020304',
            'photo' => 'profil.png',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'nom' => 'Zoetaba',
            'prenom' => 'Elie',
            'username' => 'eliezoetaba',
            'email' => 'eliezoetaba@gmail.com',
            'statut' => 'actif',
            'role_id' => '1',
            'telephone' => '01020304',
            'photo' => 'profil.png',
            'password' => Hash::make('password'),
        ]);

        // DB::table('users')->insert([
        //     'nom' => 'Lynda',
        //     'prenom' => 'Damne',
        //     'username' => 'lynda',
        //     'email' => 'lynda@gmail.com',
        //     'statut' => 'actif',
        //     'role_id' => '1',
        //     'telephone' => '01020304',
        //     'photo' => 'profil.png',
        //     'agence_id' => '1',
        //     'password' => Hash::make('lynda@gmail.com'),
        // ]);
    }
}
