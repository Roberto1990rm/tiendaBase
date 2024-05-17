<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Crear un usuario administrador
        User::create([
            'name' => 'Admin Rober',
            'email' => 'robertoramirezmoreno@gmail.com',
            'password' => bcrypt('Kain1994!!!'), // Cambia esto por una contraseña segura
            'is_admin' => true,
        ]);
    }
}
