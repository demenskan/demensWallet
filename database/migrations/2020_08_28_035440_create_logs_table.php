<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->uuid('id');
            $table->enum('type', [
                'AUTH_ERROR', 'AUTH_SUCCESS', 'NEW_TRANSACTION', 'UPDT_TRANSACTION', 
                'UPDT_PASSWORD', 'NEW_RESOURCE', 'UPDT_RESOURCE'
            ]);
            $table->string('user_id')->nullable();
            $table->string('resource_id')->nullable();
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
