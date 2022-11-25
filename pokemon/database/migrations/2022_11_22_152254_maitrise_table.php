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
        Schema::create('maitrise', function (Blueprint $table) {
            $table->engine = 'innoDB';
            $table->id();
            $table->foreignId('id_trainer')
                ->references('id')
                ->on('trainer')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('id_energy')
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
        Schema::dropIfExists('maitrise');
    }
};
