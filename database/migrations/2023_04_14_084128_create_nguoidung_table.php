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
        Schema::create('nguoidung', function (Blueprint $table) {
            $table->id();
            $table->string('tennd');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('trangthai')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('role_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguoidung');
    }
};
