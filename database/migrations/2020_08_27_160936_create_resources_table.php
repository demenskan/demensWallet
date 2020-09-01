<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('owner_id');
            $table->string('resource_type_id');
            $table->string('icon_id');
            $table->string('alias');
            $table->string('currency_id');
            $table->timestamps();
        });
        DB::table('resources')->insert([
            'id' => '0000-0000-0000-0000-0000',
            'owner_id' => '0000-0000-0000-0000-0000',
            'resource_type_id' => 'WA',
            'icon_id' => 'wallet',
            'alias' => 'My Wallet',
            'currency_id' => 'MXN',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
