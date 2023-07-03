<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(table:'categorias')->insert([
            [
                'categoria_id'=>1,
                'nombre'=>'Diseño gráfico',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'categoria_id'=>2,
                'nombre'=>'Diseño de interfaz',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'categoria_id'=>3,
                'nombre'=>'Experiencia de usuario',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'categoria_id'=>4,
                'nombre'=>'Marketing y ventas',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
