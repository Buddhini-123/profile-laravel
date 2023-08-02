<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMbCategoryGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mb_category_group', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name', 128);
            $table->text('display_name');
            $table->string('description', 1024);
            $table->boolean('status')->default(true);
            $table->integer('order_id');
            $table->dateTime('date_created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mb_category_group');
    }
}
