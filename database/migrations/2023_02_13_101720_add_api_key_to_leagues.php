<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApiKeyToLeagues extends Migration
{

    public function up()
    {
        Schema::table('leagues', function (Blueprint $table) {
            $table->integer('api_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('leagues', function (Blueprint $table) {
            //
        });
    }
}
