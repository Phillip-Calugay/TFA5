<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customer_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone', 30);
        });

        Schema::create('staff_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('full_name');
            $table->string('role');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('staff_accounts');
        Schema::dropIfExists('customer_accounts');
    }
};
