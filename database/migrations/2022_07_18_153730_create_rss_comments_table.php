<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRssCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rss_comments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('comment');
            $table->string('user_name');
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('rss_id');
            $table->foreign('rss_id')->references('id')->on('rsses')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('rss_comments');
    }
}
