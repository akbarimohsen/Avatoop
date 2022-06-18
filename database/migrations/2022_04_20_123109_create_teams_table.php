<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('logo');
            $table->text('description');
            $table->integer('score_count')->default(0);
            $table->float('score')->default(0);
            $table->integer('likes_count')->default(0);

            $table->unsignedBigInteger('league_id');
            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('teams');
    }
}
