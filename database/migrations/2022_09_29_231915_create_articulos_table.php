<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id(column: 'articulo_id');
            $table->string(column: 'titulo', length: 255);
            $table->text(column: 'descripcion')->nullable();
            $table->text(column: 'cuerpo');
            $table->string(column: 'portada', length: 255)->nullable();
            $table->string(column: 'portada_descripcion', length: 255)->nullable();
            $table->date(column: 'fecha_publicacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
};
