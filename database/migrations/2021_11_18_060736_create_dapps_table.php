<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dapps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->decimal('volume');
            $table->decimal('market_cap');
            $table->integer('traders');
            $table->decimal('flor_price');
            $table->decimal('sales_price');
            $table->decimal('average_price');
            $table->string('chain');
            $table->string('website');
            $table->string('telegram');
            $table->string('redit');
            $table->string('twitter');
            $table->boolean('is_active')->default(false);
            $table->boolean('is_promoted')->default(false);
            $table->dateTime('launch_date');
            $table->integer('votes')->default(null);
            $table->text('description');
            $table->decimal('rating')->default(null);
            $table->boolean('is_nft')->default(false);
            $table->boolean('is_coin')->default(false);
            $table->boolean('is_dex')->default(false);
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
        Schema::dropIfExists('dapps');
    }
}
