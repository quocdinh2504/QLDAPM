<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HangSanXuat extends Model
{
    protected $table = 'hangsanxuat';

    protected $fillable = [
        'id',
        'tenhang',
        'tenhang_slug',
        'hinhanh',
    ];

    // Quan hệ: Một hãng sản xuất có nhiều sản phẩm
    public function SanPham(): HasMany
    {
        return $this->hasMany(SanPham::class, 'hangsanxuat_id', 'id');
    }
}
