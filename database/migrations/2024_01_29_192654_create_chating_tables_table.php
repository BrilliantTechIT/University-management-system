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
        Schema::create('chating_tables', function (Blueprint $table) {
            $table->id();
            $table->integer('id_send');
            $table->String('message');
            $table->String('mtype');
            $table->String('id_order');
            $table->integer('stute')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chating_tables');
    }
};
