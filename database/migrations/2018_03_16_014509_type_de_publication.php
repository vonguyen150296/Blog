<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TypeDePublication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typeDePublication', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCategorie')->unsigned();
            $table->foreign('idCategorie')->references('id')->on('Categorie')->onDelete('cascade');
            $table->string('nom');
            $table->string('nomSansAccent');
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
        Schema::dropIfExists('typeDePublication');
    }
}
