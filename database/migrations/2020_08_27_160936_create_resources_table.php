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
            $table->decimal('balance', 18, 6);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
        DB::table('resources')->insert(
            [[
            'id' => '0000-0000-0000-0000-0000',
            'owner_id' => '0000-0000-0000-0000-0000',
            'resource_type_id' => 'CA',
            'icon_id' => '0000-0000-0000-0001',
            'alias' => 'My Wallet (Cash)',
            'balance' => 0,
            'currency_id' => 'MXN',
            ],
            [
            'id' => '0000-0000-0000-0000-0001',
            'owner_id' => '0000-0000-0000-0000-0000',
            'resource_type_id' => 'BA',
            'icon_id' => '0000-0000-0000-0009',
            'alias' => 'My Bank Account',
            'balance' => 0,
            'currency_id' => 'MXN',
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
        Schema::dropIfExists('resources');
    }
}
