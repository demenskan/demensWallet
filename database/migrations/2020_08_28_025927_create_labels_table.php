<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labels', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('user_id');
            $table->string('name');
            $table->string('background_color')->nullable();
            $table->string('foreground_color')->nullable();
            $table->string('labelicon_id')->nullable();
            $table->timestamps();
        });
        DB::table('labels')->insert(
            [[
            'id' => '0000-0000-0000-0000-0000',
            'user_id' => '0000-0000-0000-0000-0000',
            'name' => 'viajes',
            'background_color' => '#dd00dd',
            'foreground_color' => '#445544',
            'labelicon_id' => 'fa-road'
            ],
            [
            'id' => '0000-0000-0000-0000-0001',
            'user_id' => '0000-0000-0000-0000-0000',
            'names' => 'comida',
            'background_color' => '#d299dd',
            'foreground_color' => '#425CFF',
            'labelicon_id' => 'fa-tint'
            ]]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labels');
    }
}
