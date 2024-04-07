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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('mobile');
            $table->string('name');
            $table->string('name2');
            $table->string('phone');
            $table->string('kod');
            $table->string('hash');
            $table->string('state');
            $table->string('city');
            $table->string('password');
            $table->string('code');
            $table->string('active_am');
          //  $table->unsignedBigInteger('id_pay');
          //  $table->foreign('id_pay')->references('id')->on('pays')->onDelete('cascade');
            $table->string('gender');
            $table->string('marriage');
            $table->string('birth');
            $table->string('father');
            $table->string('mail');
            $table->string('number_vahed');
            $table->string('number_block');
            $table->string('number_block2');
            $table->string('warehouse');
            $table->string('parking');
            $table->text('location');
            $table->string('form_j');
            $table->string('contract');
            $table->string('am_start_contract');
            $table->string('am_end_contract');
            $table->string('unit');
            $table->string('namename2');
            $table->string('kodkod2');
            $table->string('numbernumber2');
            $table->text('significant');
            $table->text('theory');
            $table->text('tashati');
            $table->text('packages_encouragement_received');
            $table->text('other');
            $table->string('created_at');
            $table->string('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
