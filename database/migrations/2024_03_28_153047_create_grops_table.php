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
        Schema::create('grops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('am');
            $table->string('top');
            $table->string('bottom');
            $table->integer('type')->default(0);
            $table->string('typeNumber');
            $table->string('img1');
            $table->string('img2');
            $table->string('code');
            $table->char('checkboxName')->default(1);
            $table->char('active_pay')->default(1);
            $table->string('created_at');
            $table->string('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grops');
    }
};
