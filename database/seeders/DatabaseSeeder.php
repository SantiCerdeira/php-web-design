<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(class:CategoriaSeeder::class);
        $this->call(class:UsuarioSeeder::class);
        $this->call(class:ArticulosTableSeeder::class);
        $this->call(class:ServiciosSeeder::class);
        $this->call(class:ComprasSeeder::class);
    }
}
