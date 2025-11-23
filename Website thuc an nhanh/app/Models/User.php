<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    // Các trường cho phép thêm dữ liệu (Mass Assignment)
    protected $fillable = [
        'name',
        'email',
        'username', 
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Quan hệ: Một người dùng có thể có nhiều Đơn hàng
    public function DonHang(): HasMany
    {
        return $this->hasMany(DonHang::class, 'user_id', 'id');
    }
}