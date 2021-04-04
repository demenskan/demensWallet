<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('resource_id');
            $table->string('alter_resource_id');
            $table->string('description')->nullable();
            $table->enum('type', ['IN', 'OUT']);
            $table->timestamps();
            $table->decimal('amount', 18, 6);
            $table->decimal('resultant_balance', 18, 6);
            $table->string('category_id')->nullable();
            $table->string('operator_id');      // ID de la persona que captura
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
