<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_type', function (Blueprint $table) {
            $table->integer('id');
            $table->string('abr', 4)->default('U');
            $table->string('label_eng', 100);
            $table->string('label_fre', 100);
            $table->string('label_spa', 100);
            $table->string('language', 100);
            $table->string('brochure', 200);
            $table->string('email', 100);
            $table->string('website', 200);
            $table->integer('nosort');
            $table->enum('display', ['N', 'Y'])->default('N');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_type');
    }
}
