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
        Schema::create('cash_stores', function (Blueprint $table) {
            $table->id();
            $table->String('item');
            $table->String('num');
            $table->String('uid');

            $table->String('unite');
            $table->String('note',3000)->nullable();
            $table->String('create_by');
            $table->Integer('stute')->default(0);// 0 or 1
            $table->Integer('accept_by')->default(0);// 0 or 1
            $table->Integer('cash_by')->default(0);// 0 or 1

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_stores');
    }
};
