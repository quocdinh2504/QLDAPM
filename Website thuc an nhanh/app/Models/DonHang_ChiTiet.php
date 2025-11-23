<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DonHang_ChiTiet extends Model
{
    protected $table = 'donhang_chitiet';

    // Quan hệ: Chi tiết này thuộc về Đơn hàng nào
    public function DonHang(): BelongsTo
    {
        return $this->belongsTo(DonHang::class, 'donhang_id', 'id');
    }

    // Quan hệ: Chi tiết này là của Món ăn nào
    public function SanPham(): BelongsTo
    {
        return $this->belongsTo(SanPham::class, 'sanpham_id', 'id');
    }
}