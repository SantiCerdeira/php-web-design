<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(table:'usuarios')->insert([
            [
                'usuario_id'=>1,
                'email'=>'pepegomez@gmail.com',
                'nombre'=>'Pepe',
                'apellido'=>'Gomez',
                'password'=> \Hash::make(value:'pepe1234'),
                'rol' => 1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'usuario_id'=>2,
                'email'=>'martinperez@gmail.com',
                'nombre'=>'Martin',
                'apellido'=>'Perez',
                'password'=> \Hash::make(value:'martin1234'),
                'rol' => 1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'usuario_id'=>3,
                'email'=>'santimartinez@gmail.com',
                'nombre'=>'Santi',
                'apellido'=>'Martinez',
                'password'=> \Hash::make(value:'santi1234'),
                'rol' => 2,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'usuario_id'=>4,
                'email'=>'alejandrogonzalez@gmail.com',
                'nombre'=>'Alejandro',
                'apellido'=>'Gonzalez',
                'password'=> \Hash::make(value:'alejandro1234'),
                'rol' => 2,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
