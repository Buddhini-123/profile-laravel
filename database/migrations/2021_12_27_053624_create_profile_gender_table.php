<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileGenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_gender', function (Blueprint $table) {
            $table->char('id', 1)->default('');
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
        Schema::dropIfExists('profile_gender');
    }
}
