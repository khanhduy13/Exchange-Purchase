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
        Schema::create('doanhthu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_baidang');
            $table->foreign('id_baidang')
                ->references('id')
                ->on('baidang');
            $table->string('dtbaidang');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
                ->references('id')
                ->on('ttnguoidung');
            $table->string('dtnap');    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doanhthu');
    }
};

