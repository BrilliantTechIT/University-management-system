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
        Schema::create('ask_off_tables', function (Blueprint $table) {
            $table->id();
            $table->Date('fromDate');
            $table->String('toDate');
            $table->String('uid');

            $table->String('note',3000)->nullable();
            $table->String('create_by');
            $table->boolean('is_for_year')->default(0);
            $table->Integer('stute')->default(0);// 0 or 1
            $table->Integer('type')->default(0);// 0 or 1
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
        Schema::dropIfExists('ask_off_tables');
    }
};
