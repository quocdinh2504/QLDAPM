<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LoaiSanPham extends Model
{
    protected $table = 'loaisanpham';

    // Quan hệ: Một loại sản phẩm có nhiều sản phẩm
    public function SanPham(): HasMany
    {
        return $this->hasMany(SanPham::class, 'loaisanpham_id', 'id');
    }
}
