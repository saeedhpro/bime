<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    /** 
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('advertising_pays', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_product_advertising')->unsigned();
            $table->foreign('id_product_advertising')->references('id')->on('product_advertisings')->onDelete('cascade');
            $table->integer('day');
            $table->string('am_end');
            $table->integer('price');
            $table->text('img');
            $table->text('transactionId');
            $table->string('uuid');
            $table->string('referenceId');
            $table->integer('active_pay')->default(0);
            $table->integer('active')->default(0);
            $table->integer('active_show')->default(0);
            $table->string('updated_at');
            $table->string('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertising_pays');
    }
};
