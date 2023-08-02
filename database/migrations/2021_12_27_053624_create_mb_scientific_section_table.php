<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMbScientificSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mb_scientific_section', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('code', 10);
            $table->integer('vote_quota')->nullable();
            $table->string('parent_code', 10);
            $table->string('abr', 10)->default('');
            $table->string('ss_code', 10);
            $table->string('ss_parent', 10);
            $table->string('ss_full_code', 10);
            $table->string('label_eng')->default('');
            $table->string('label_fre')->default('');
            $table->string('label_spa')->default('');
            $table->string('type_of_section', 4)->default('OSc');
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
        Schema::dropIfExists('mb_scientific_section');
    }
}
