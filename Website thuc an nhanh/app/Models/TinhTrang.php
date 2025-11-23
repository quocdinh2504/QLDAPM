<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TinhTrang extends Model
{
    protected $table = 'tinhtrang';

    // Quan hệ: Một tình trạng có nhiều đơn hàng
    public function DonHang(): HasMany
    {
        return $this->hasMany(DonHang::class, 'tinhtrang_id', 'id');
    }
}
