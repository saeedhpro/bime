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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('number_days');
            $table->bigInteger('amount_1_day');
            $table->unsignedBigInteger('id_grops');
            $table->foreign('id_grops')->references('id')->on('grops')->onDelete('cascade');
            $table->longText('description');
            $table->integer('status');
            $table->integer('package_type');
            $table->string('created_at');
            $table->string('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
