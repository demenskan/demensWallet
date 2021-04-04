<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('parent_id')->nullable();
            $table->string('user_id');
            $table->string('name');
            $table->enum('type', ['IN','OUT']);
            $table->timestamps();
        });
        DB::table('categories')->insert(
            [[
                'id' => '0000-0000-0000-0000-0000',
                'parent_id' => Null,
                'user_id' => '0000-0000-0000-0000-0000',
                'name' => 'Rent',
                'type' => 'OUT',
            ],
            [
                'id' => '0000-0000-0000-0000-0001',
                'parent_id' => Null,
                'user_id' => '0000-0000-0000-0000-0000',
                'name' => 'Wage',
                'type' => 'IN',
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
        Schema::dropIfExists('categories');
    }
}
