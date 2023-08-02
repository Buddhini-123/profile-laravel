<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMbCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mb_category', function (Blueprint $table) {
            $table->string('id', 8)->default('')->primary();
            $table->integer('nbsort')->default(0);
            $table->integer('quantity_paper_journal')->nullable();
            $table->integer('group_id');
            $table->unsignedTinyInteger('status')->default('1');
            $table->string('label_eng')->default('');
            $table->set('world_bank_rank', ['L', 'LM', 'UM', 'H'])->nullable();
            $table->string('label_fre')->default('');
            $table->string('label_spa')->default('');
            $table->string('short_name_eng');
            $table->string('short_name_fre');
            $table->string('short_name_spa');
            $table->set('type_of_category', ['Members', 'Subscribers', 'Agencies'])->nullable();
            $table->set('type_of_membership', ['Individuals', 'Associate members', 'Organisational members', 'Heritage Member', 'Organisational', 'Heritage', 'Associate'])->nullable();
            $table->set('payment_plan', ['Calendar', 'Anniversary', 'ProRata'])->nullable();
            $table->string('label_prn_eng', 50);
            $table->string('label_prn_fre', 50);
            $table->string('label_prn_spa', 50);
            $table->string('price_1year', 50)->default('');
            $table->string('price_2year', 50)->default('');
            $table->string('price_3year', 50)->default('');
            $table->integer('affiliate')->nullable();
            $table->string('affiliate_membership', 5)->nullable();
            $table->integer('grace_period')->nullable()->default(6);
            $table->integer('om_action_count')->nullable();
            $table->boolean('custom_price')->default(false);
            $table->char('ingenta_format', 1);
            $table->integer('quantity_online_journal')->nullable();
            $table->unsignedInteger('journal')->default('0');
            $table->string('description')->nullable();
            $table->char('display_online', 3)->default('U');
            $table->char('display_imger', 1);
            $table->string('cond', 20)->default('all-0-xxx-nochx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mb_category');
    }
}
