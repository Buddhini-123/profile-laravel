<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileJobCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_job_category', function (Blueprint $table) {
            $table->integer('id', true)->comment('15/06/09:  nouvelles entrees et traductions - structure maintenue a l\'identique');
            $table->string('label_eng');
            $table->string('label_fre');
            $table->string('label_spa');
            $table->tinyInteger('display');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_job_category');
    }
}
