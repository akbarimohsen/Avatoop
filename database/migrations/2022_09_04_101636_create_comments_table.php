<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('created_at');
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('user_id');
<<<<<<< HEAD:database/migrations/2022_04_20_123426_create_comments_table.php
            $table->unsignedBigInteger('rss_id')->nullable();
            $table->unsignedBigInteger('news_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('rss_id')->references('id')->on('rsses')->onDelete('cascade')->onUpdate('cascade');

=======
            $table->unsignedBigInteger('news_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade')->onUpdate('cascade');
>>>>>>> f2322229f328c205d4101a6ae9e8d7edd29a7aad:database/migrations/2022_09_04_101636_create_comments_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
