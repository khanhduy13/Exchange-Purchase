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
        Schema::create('baidang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
                ->references('id')
                ->on('nguoidung')
                ->onDelete('cascade');

            $table->string('Tendovat');
            $table->unsignedBigInteger('id_danhmuc');
            $table->foreign('id_danhmuc')
                ->references('id')
                ->on('danhmuc')
                ->onDelete('cascade');

            $table->string('Mota');
            $table->string('Hinhanh');
            $table->integer('Gia');
            $table->boolean('trangthai')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baidang');
    }
};
