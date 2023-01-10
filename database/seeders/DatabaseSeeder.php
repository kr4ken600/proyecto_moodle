<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['rol' => 'Administrador'],
            ['rol' => 'Docente'],
            ['rol' => 'Alumno'],
        ]);

        DB::table('docentes')->insert([
            'email' => 'josue@gmail.com',
            'nombre' => 'Josue',
            'apellido' => 'Rodriguez',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'id_role' => 2
        ]);

        DB::table('alumnos')->insert([
            'email' => 'yon@gmail.com',
            'nombre' => 'Yonatan',
            'apellido' => 'Ortiz',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'id_role' => 3
        ]);
    }
}
