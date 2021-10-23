<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('login_method')->nullable();
            $table->text('avatar')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('profile', ['AO', 'SU']);
            $table->string('language_id');
            $table->string('currency_id');
            //https://www.webdew.com/blog/login-with-google-in-laravel
            $table->string('google_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
            'id' => '0000-0000-0000-0000-0000',
            'first_name' => 'Administrator',
            'last_name' => 'Perron',
            'email' => 'admin@localhost',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret  
            'profile' => 'SU',
            'language_id' => 'en',
            'currency_id' => 'USD',
        ],
        [
            'id' => '0000-0000-0000-0000-0001',
            'first_name' => 'Godo',
            'last_name' => 'Godinez',
            'email' => 'godinez@localhost',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret  
            'profile' => 'AO',
            'language_id' => 'en',
            'currency_id' => 'USD',
        ]
    
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
