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
        Schema::create('pokemon', function (Blueprint $table) {
            $table->engine = 'innoDB';
            $table->id();
            $table->string('name');
            $table->integer('pv_max');
            $table->integer('level');
            $table->integer('attack');
            $table->integer('special_attack');
            $table->integer('special_defense');
            $table->string('path');
            $table->foreignId('id_evolution')
                ->nullable()
                ->references('id')
                ->on('pokemon')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('energy_id')
                ->references('id')
                ->on('energy')
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
        Schema::dropIfExists('pokemon');
    }
};
