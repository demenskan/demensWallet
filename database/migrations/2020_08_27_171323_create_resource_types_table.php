<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_types', function (Blueprint $table) {
            $table->string('id');
            $table->string('description');
            $table->timestamps();
        });
        DB::table('resource_types')->insert([
            [ 'id' => 'CA', 'description' => 'Cash' ],
            [ 'id' => 'BA', 'description' => 'Bank Account / Debit Card' ],
            [ 'id' => 'CC', 'description' => 'Credit Card' ],
            [ 'id' => 'LO', 'description' => 'Loan' ],
            [ 'id' => 'PA', 'description' => '(Passive Asset) Value' ],
            [ 'id' => 'EA', 'description' => 'Electronic Account (Paypal, BitCoin, etc)' ],
            [ 'id' => 'EW', 'description' => 'Electronic Wallet (Paypal, BitCoin, etc)' ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_types');
    }
}
