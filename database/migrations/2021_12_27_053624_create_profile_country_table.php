<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_country', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->char('code_ISO', 3)->default('');
            $table->string('alpha3_code_ISO', 3);
            $table->string('region', 4)->nullable();
            $table->string('label_eng', 55)->default('');
            $table->integer('phonecode')->nullable();
            $table->string('label_fre', 55)->default('');
            $table->string('label_spa', 55)->default('');
            $table->string('nationality', 256);
            $table->integer('world_bank')->default(21);
            $table->string('world_bank_income_group', 20)->nullable();
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
        Schema::dropIfExists('profile_country');
    }
}
