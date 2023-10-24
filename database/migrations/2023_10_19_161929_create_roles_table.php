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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->String('id_user');
            $table->Integer('Dashbord');
            $table->Integer('Users');
            $table->Integer('Group');
            $table->Integer('Roles');
            $table->Integer('Financial_exchange');
            $table->Integer('Store_exchange');
            $table->Integer('vacation_request');
            $table->Integer('buy_request');
            $table->Integer('ok_Financial_exchange');
            $table->Integer('ok_Store_exchange');
            $table->Integer('ok_vacation_request');
            $table->Integer('ok_buy_request');
            $table->Integer('show_Financial_exchange');
            $table->Integer('show_Store_exchange');
            $table->Integer('show_vacation_request');
            $table->Integer('show_buy_request');
            $table->Integer('send_message');
            $table->Integer('send_file');
            $table->Integer('new_task');          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
