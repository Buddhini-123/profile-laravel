<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMbScientificSectionOrgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mb_scientific_section_org', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('code', 10);
            $table->string('parent_code', 10);
            $table->string('abr', 10)->default('');
            $table->string('parent', 10)->nullable();
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
        Schema::dropIfExists('mb_scientific_section_org');
    }
}
