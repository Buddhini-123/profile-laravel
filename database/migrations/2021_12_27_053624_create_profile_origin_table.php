<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileOriginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_origin', function (Blueprint $table) {
            $table->integer('id');
            $table->string('label_eng')->default('');
            $table->string('label_fre')->default('');
            $table->string('label_spa')->default('');
            $table->unsignedTinyInteger('display')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_origin');
    }
}
