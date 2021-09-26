<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seeds', function (Blueprint $table) {
            $table->id();
            $table->string('seed_thumbnail')->nullable();
            $table->string('seed_name')->nullable();
            $table->string('seller_name')->nullable();
            $table->string('seller_whatsapp')->nullable();
            $table->string('seed_price')->nullable();
            $table->string('seed_stock')->nullable();
            $table->string('seed_age')->nullable();
            $table->string('seed_height')->nullable();
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
        Schema::dropIfExists('seeds');
    }
}
