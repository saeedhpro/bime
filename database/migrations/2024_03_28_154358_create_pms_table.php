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
        Schema::create('pms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_grop');
            $table->foreign('id_grop')->references('id')->on('grops')->onDelete('cascade');
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->text('title');
            $table->text('img');
            $table->text('text');
            $table->timestamps();
            $table->timestamp('date_end_show');
            $table->integer('created_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pms');
    }
};
