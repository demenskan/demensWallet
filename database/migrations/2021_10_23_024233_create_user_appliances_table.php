<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAppliancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_appliances', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('login_method')->nullable();
            $table->text('reason_to_use');
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
        Schema::dropIfExists('user_appliances');
    }
}
