<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('stadium');

            $table->unsignedBigInteger('player1_id');
            $table->unsignedBigInteger('player2_id');

            $table->unsignedBigInteger('league_id');

            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('player1_id')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('player2_id')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');


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
        Schema::dropIfExists('games');
    }
}
