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
        Schema::create('pm_shows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('name_user');
            $table->foreign('name_user')->references('name')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('mobile_user');
            $table->foreign('mobile_user')->references('mobile')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_pm');
            $table->foreign('id_pm')->references('id')->on('pms')->onDelete('cascade');
            $table->string('updated_at');
            $table->string('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pm_shows');
    }
};
