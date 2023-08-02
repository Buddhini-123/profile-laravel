<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_settings', function (Blueprint $table) {
            $table->integer('settingsId')->primary();
            $table->integer('appId');
            $table->string('settingsIdentifier')->unique('settingsIdentifier');
            $table->string('value', 256);
            $table->string('details', 256)->nullable();
            $table->set('typeOfSettings', ['ALERT', 'INFO', 'TEXT', 'SCRIPT', 'PATH', 'COUNT', 'FLAG', 'DATE', 'CODE', 'TAG'])->default('TEXT');
            $table->timestamp('lastUpdate')->useCurrentOnUpdate()->nullable();
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
        Schema::dropIfExists('global_settings');
    }
}
