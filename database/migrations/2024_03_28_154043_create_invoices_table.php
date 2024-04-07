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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_grop');
            $table->foreign('id_grop')->references('id')->on('grop')->onDelete('cascade');
            $table->text('title');
            $table->text('text');
            $table->integer('price');
            $table->string('am_start');
            $table->string('am_end');
            $table->integer('daily_fine_amount');
            $table->integer('fixed_penalty_amount');
            $table->string('number');
            $table->string('created_at');
            $table->string('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
