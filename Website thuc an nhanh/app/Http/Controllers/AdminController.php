<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use App\Models\User;
use Illuminate\Support\Facades\DB; // Dùng để tính tổng tiền

class AdminController extends Controller
{
    // Bắt buộc đăng nhập mới xem được Dashboard
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // 1. Thống kê Món ăn
        $tong_sanpham = SanPham::count();
        
        // 2. Thống kê Khách hàng (chỉ đếm User có role là 'user')
        $tong_khachhang = User::where('role', 'user')->count();
        
        // 3. Thống kê Đơn hàng
        $tong_donhang = DonHang::count();
        
        // 4. Tính tổng doanh thu
        // Dựa trên bảng DonHang_ChiTiet: tổng = số lượng * đơn giá
        $tong_doanhthu = DonHang_ChiTiet::sum(DB::raw('soluongban * dongiaban'));

        // 5. Lấy 5 đơn hàng mới nhất để hiển thị nhanh
        $donhang_moi = DonHang::orderBy('created_at', 'desc')->take(5)->get();

        // Trả về View kèm dữ liệu
        return view('admin_dashboard.dashboard', compact(
            'tong_sanpham', 
            'tong_khachhang', 
            'tong_donhang', 
            'tong_doanhthu',
            'donhang_moi'
        ));
    }
}