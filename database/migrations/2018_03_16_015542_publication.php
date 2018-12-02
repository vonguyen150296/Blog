<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Publication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('titreSansAccent');
            $table->text('resume');
            $table->longtext('contenu');
            $table->string('image');
            $table->integer('important');
            $table->integer('nombreVue')->default(0);
            $table->integer('idTypeDePublication')->unsigned();
            $table->foreign('idTypeDePublication')->references('id')->on('typeDePublication')->onDelete('cascade');
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
        Schema::dropIfExists('publication');
    }
}
