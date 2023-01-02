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
        Schema::create('tour', function (Blueprint $table) {
            $table->engine = 'innoDB';
            $table->id();
            $table->foreignId('id_battle')
                ->references('id')
                ->on('battle')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('id_action')
                ->references('id')
                ->on('battle')
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
