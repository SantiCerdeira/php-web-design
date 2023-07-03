<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComprasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(table:'compras')->insert([
            [
                'compra_id'=>1,
                'servicio_id'=>1,
                'usuario_id'=>3,
                'total'=> 15000,
                'fecha'=> '2022-10-12',
                'estado'=>2,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'compra_id'=>2,
                'servicio_id'=>2,
                'usuario_id'=>3,
                'total'=> 85000,
                'fecha'=> '2022-10-14',
                'estado'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'compra_id'=>3,
                'servicio_id'=>1,
                'usuario_id'=>4,
                'total'=> 15000,
                'fecha'=> '2022-11-18',
                'estado'=>2,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'compra_id'=>4,
                'servicio_id'=>2,
                'usuario_id'=>4,
                'total'=> 85000,
                'fecha'=> '2022-12-5',
                'estado'=>2,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
