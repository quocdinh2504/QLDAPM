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
       Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loaisanpham_id')->constrained('loaisanpham');
            $table->foreignId('hangsanxuat_id')->constrained('hangsanxuat'); // Có thể dùng để lưu thương hiệu nước uống
            $table->string('tensanpham'); // Ví dụ: Combo Gà Giòn Vui Vẻ
            $table->string('tensanpham_slug');
            $table->integer('soluong'); // Số lượng tồn kho
            $table->double('dongia');
            $table->string('hinhanh')->nullable();
            $table->text('motasanpham')->nullable(); // Mô tả thành phần món ăn
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham');
    }
};
