<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboardcards', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('user_id');
            $table->enum('type', ['PIE', 'BAR', 'MSG', 'PRG']);
            $table->string('resource_id')->  nullable();
            $table->smallInteger('order');
            $table->string('size');
            $table->string('extra_parameters');
            $table->timestamps();
        });
        DB::table('dashboardcards')->insert([
            'id' => '0000-0000-0000-0000-0001',
            'user_id' => '0000-0000-0000-0000-0000',
            'type' => 'BAR',
            'resource_id' => '0000-0000-0000-0000-0000',
            'order' => 0,
            'size' => 'M',
            'extra_parameters' => '-6m',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dashboardcards');
    }
}
