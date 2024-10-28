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
        Schema::create('messaging_tables', function (Blueprint $table) {
            $table->id();
            $table->Integer('id_user');
            // $table->String('uid');

            $table->String('tital',500);
            $table->String('message',5000);
            $table->Integer('type');//0message/1file;
            $table->Integer('create_by');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messaging_tables');
    }
};
