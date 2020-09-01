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
            $table->timestamps();
        });
        DB::table('resource_types')->insert([
            [ 'id' => 'CA' ],       // Cash
            [ 'id' => 'BA' ],       // Bank Account / Debit Card
            [ 'id' => 'CC' ],       // Credit Card
            [ 'id' => 'LO' ],       // Loan
            [ 'id' => 'PA' ],       // (Passive Asset) Value
            [ 'id' => 'EA' ],       // Electronic Account (Paypal, BitCoin, etc)
            [ 'id' => 'EW' ]        // Electronic Wallet (Paypal, BitCoin, etc)
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
