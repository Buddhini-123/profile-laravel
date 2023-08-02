<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMbMembershipCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mb_membership_category', function (Blueprint $table) {
            $table->string('id', 8)->primary();
            $table->integer('nbsort')->default(0);
            $table->string('label_eng')->default('');
            $table->string('label_fre')->default('');
            $table->string('label_spa')->default('');
            $table->string('short_name_eng', 50);
            $table->string('short_name_fre', 50);
            $table->string('short_name_spa', 50);
            $table->string('label_prn_eng');
            $table->string('label_prn_fre');
            $table->string('label_prn_spa');
            $table->set('type_of_category', ['Members', 'Subscribers', 'Agencies'])->nullable();
            $table->set('type_of_membership', ['Individuals', 'Associate members', 'Organisational members', 'Heritage Member'])->nullable();
            $table->char('ingenta_format', 1);
            $table->integer('quantity_paper_journal')->nullable();
            $table->integer('quantity_online_journal')->nullable();
            $table->unsignedInteger('journal')->default('0');
            $table->string('price_1year', 50)->default('');
            $table->string('price_2year', 50)->default('');
            $table->string('price_3year', 50)->default('');
            $table->string('cond', 20)->default('all-0-xxx-nochx');
            $table->unsignedTinyInteger('display')->default('1');
            $table->boolean('status')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mb_membership_category');
    }
}
