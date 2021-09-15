<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('group');
            $table->string('key');
            $table->string('value');
            $table->timestamps();
        });
        /*
         * this migration doesnt have a use yet
        DB::table('resource_types')->insert([
            [
                'id' => '0000-0000-0000-0000-0000',
                'group' => '',
                'user_id' => '0000-0000-0000-0000-0000'
                'key'   => 'LANGUAGE',
                'value' => 'EN'
            ],
         */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
