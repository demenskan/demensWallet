<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->string('id');
            $table->string('full_name');
            $table->string('symbol_entity');   //Can be a character or a HTML entity or UNICODE
            $table->smallInteger('decimals');       //amount of decimals managed. (USD=2, BitCoin=6)
            $table->string('flag_icon');
        });
        DB::table('currencies')->insert([
            ['id' => 'USD', 'full_name' => 'US Dollars', 'symbol_entity' => '$', 'decimals' => 2, 'flag_icon' => 'USA' ],
            ['id' => 'MXN', 'full_name' => 'Mexico Pesos', 'symbol_entity' => '$', 'decimals' => 2, 'flag_icon' => 'MEX' ],
            ['id' => 'EUR', 'full_name' => 'Euros', 'symbol_entity' => '&euro;', 'decimals' => 2, 'flag_icon' => 'EU' ],
            ['id' => 'BIT', 'full_name' => 'BitCoins', 'symbol_entity' => '&bitcoin;', 'decimals' => 6, 'flag_icon' => 'BIT' ]
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}
