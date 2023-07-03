<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(table:'servicios')->insert([
            [
                'servicio_id'=>1,
                'nombre'=>'Asesoría básica',
                'precio'=>15000,
                'descripcion'=> 'Esta asesoría consta de un video grabado de 20 minutos en el que uno de nuestros trabajadores revisa tu sitio y va comentando todas las correcciones que deberían ser hechas para mejorar la experiencia de los usuarios en tu sitio.',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'servicio_id'=>2,
                'nombre'=>'Asesoría en vivo',
                'precio'=>85000,
                'descripcion'=> 'Esta asesoría consta de una reunión virtual con 3 integrantes de nuestro equipo que puede durar hasta 3 horas y en la que ellos te ayudarán de manera práctica realizando los cambios necesarios directamente sobre tu sitio mientras tú hablas con ellos.',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
