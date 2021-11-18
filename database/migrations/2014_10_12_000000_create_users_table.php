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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('image')->default('assets/images/faces/face8.jpg');
            $table->boolean('is_super_admin')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->boolean('can_change_nfts')->default(false);
            $table->boolean('can_change_coins')->default(false);
            $table->boolean('can_change_exchanges')->default(false);
            $table->boolean('can_manage_bookings')->default(false);
            $table->boolean('can_manage_slots')->default(false);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
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
