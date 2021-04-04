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
            $table->id();
            $table->string('filename')->unique;
            $table->string('tag')->unique;
            $table->timestamps();
        });
        DB::table('icons')->insert([
            [ 'id' => 1, 'filename' => '002-wallet-1.png', 'tag' => 'wallet 1' ],
            [ 'id' => 2, 'filename' => '001-wallet-2.png', 'tag' => 'wallet 2 '],
            [ 'id' => 3, 'filename' => '003-wallet.png', 'tag' => 'wallet 3' ],
            [ 'id' => 4, 'filename' => '004-money-3.png', 'tag' => 'money' ],
            [ 'id' => 5, 'filename' => '005-money-2.png', 'tag' => 'money 2'],
            [ 'id' => 6, 'filename' => '006-dollar-6.png', 'tag' => 'dollar'],
            [ 'id' => 7, 'filename' => '007-pound-sterling-4.png', 'tag' => 'pound' ],
            [ 'id' => 8, 'filename' => '012-money-bag-1.png' , 'tag' => 'money bag' ],
            [ 'id' => 9, 'filename' => '028-credit-card-2.png', 'tag' => 'credit card' ],
            [ 'id' => 10, 'filename' => 'bbva.png' , 'tag' => 'bbva' ],
            [ 'id' => 11, 'filename' => 'santander.png', 'tag' =>  'santander']
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
