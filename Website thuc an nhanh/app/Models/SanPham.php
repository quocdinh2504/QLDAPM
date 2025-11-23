<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SanPham extends Model
{
    protected $table = 'sanpham';

    protected $fillable = [
        'loaisanpham_id',
        'hangsanxuat_id',
        'tensanpham',
        'tensanpham_slug',
        'soluong',
        'dongia',
        'hinhanh',
        'motasanpham',
        ];

    // Quan hệ: Sản phẩm thuộc về 1 Loại sản phẩm
    public function LoaiSanPham(): BelongsTo
    {
        return $this->belongsTo(LoaiSanPham::class, 'loaisanpham_id', 'id');
    }

    // Quan hệ: Sản phẩm thuộc về 1 Hãng sản xuất
    public function HangSanXuat(): BelongsTo
    {
        return $this->belongsTo(HangSanXuat::class, 'hangsanxuat_id', 'id');
    }

    // Quan hệ: Sản phẩm nằm trong nhiều Chi tiết đơn hàng
    public function DonHang_ChiTiet(): HasMany
    {
        return $this->hasMany(DonHang_ChiTiet::class, 'sanpham_id', 'id');
    }
}