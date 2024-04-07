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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_grop');
            $table->foreign('id_grop')->references('id')->on('grops')->onDelete('cascade');
            $table->unsignedBigInteger('id_usergrop');
            $table->foreign('id_usergrop')->references('id')->on('usergrops')->onDelete('cascade');
            $table->text('text');
            $table->string('name');
            $table->unsignedBigInteger('id_form');
            $table->foreign('id_form')->references('id')->on('forms')->onDelete('cascade');
            $table->integer('under')->default(0);
            $table->string('created_at');
            $table->string('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
