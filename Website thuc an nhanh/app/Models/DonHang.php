<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DonHang extends Model
{
    protected $table = 'donhang';

    // Quan hệ: Đơn hàng thuộc về 1 Người dùng (Khách hàng)
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Quan hệ: Đơn hàng có 1 Tình trạng
    public function TinhTrang(): BelongsTo
    {
        return $this->belongsTo(TinhTrang::class, 'tinhtrang_id', 'id');
    }

    // Quan hệ: Đơn hàng có nhiều Chi tiết (nhiều món ăn bên trong)
    public function DonHang_ChiTiet(): HasMany
    {
        return $this->hasMany(DonHang_ChiTiet::class, 'donhang_id', 'id');
    }
}
