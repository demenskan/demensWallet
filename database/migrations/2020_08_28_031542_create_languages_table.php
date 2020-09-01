<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->string('id');
            $table->string('flag_icon');
            $table->string('original_name');
            $table->string('english_name');
            $table->timestamps();
        });
        DB::table('languages')->insert([
            ['id' => 'EN', 'flag_icon' => 'england', 'original_name' => 'English', 'english_name' => 'English' ],
            ['id' => 'ES', 'flag_icon' => 'spain', 'original_name' => 'Español', 'english_name' => 'Spanish' ],
            ['id' => 'FR', 'flag_icon' => 'france', 'original_name' => 'Francais', 'english_name' => 'French' ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
