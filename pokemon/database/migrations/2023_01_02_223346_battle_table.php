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
        Schema::create('battle', function (Blueprint $table) {
            $table->engine = 'innoDB';
            $table->id();
            $table->foreignId('id_joueur_1')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('id_joueur_2')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('id_first')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('id_pokemon_J1_1')
                ->references('id')
                ->on('pokemon')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('id_pokemon_J1_2')
                ->references('id')
                ->on('pokemon')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('id_pokemon_J1_3')
                ->references('id')
                ->on('pokemon')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('id_pokemon_J2_1')
                ->references('id')
                ->on('pokemon')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('id_pokemon_J2_2')
                ->references('id')
                ->on('pokemon')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('id_pokemon_J2_3')
                ->references('id')
                ->on('pokemon')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('gagnant')
                ->nullable()
                ->references('id')
                ->on('pokemon')
                ->onUpdate('cascade')
                ->onDelete('restrict');
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
        //
    }
};
