<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icons', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('filename')->unique;
            $table->enum('type', ['standard','custom']);
            $table->string('user_id')->nullable();
            $table->string('tag');
            $table->timestamps();
        });
        DB::table('icons')->insert([
            [ 'id' => '0000-0000-0000-0001', 'filename' => '002-wallet-1.png', 'type' => 'standard', 'user_id' => null, 'tag' => 'wallet 1' ],
            [ 'id' => '0000-0000-0000-0002', 'filename' => '001-wallet-2.png', 'type' => 'standard', 'user_id' => null, 'tag' => 'wallet 2 '],
            [ 'id' => '0000-0000-0000-0003', 'filename' => '003-wallet.png', 'type' => 'standard', 'user_id' => null, 'tag' => 'wallet 3' ],
            [ 'id' => '0000-0000-0000-0004', 'filename' => '004-money-3.png', 'type' => 'standard', 'user_id' => null, 'tag' => 'money' ],
            [ 'id' => '0000-0000-0000-0005', 'filename' => '005-money-2.png', 'type' => 'standard', 'user_id' => null, 'tag' => 'default'],
            [ 'id' => '0000-0000-0000-0006', 'filename' => '006-dollar-6.png', 'type' => 'standard', 'user_id' => null, 'tag' => 'dollar'],
            [ 'id' => '0000-0000-0000-0007', 'filename' => '007-pound-sterling-4.png', 'type' => 'standard', 'user_id' => null, 'tag' => 'pound' ],
            [ 'id' => '0000-0000-0000-0008', 'filename' => '012-money-bag-1.png' , 'type' => 'standard', 'user_id' => null, 'tag' => 'money bag' ],
            [ 'id' => '0000-0000-0000-0009', 'filename' => '028-credit-card-2.png', 'type' => 'standard', 'user_id' => null, 'tag' => 'credit card' ],
            [ 'id' => '0000-0000-0000-0010', 'filename' => 'bbva.png' , 'type' => 'standard', 'user_id' => null, 'tag' => 'bbva' ],
            [ 'id' => '0000-0000-0000-0011', 'filename' => 'santander.png', 'type' => 'standard', 'user_id' => null, 'tag' =>  'santander']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('icons');
    }
}
