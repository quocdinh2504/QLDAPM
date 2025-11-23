<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham; // Gọi Model LoaiSanPham
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Gọi thư viện xử lý chuỗi (để tạo slug)

class LoaiSanPhamController extends Controller
{
    // 1. Xem danh sách
    public function getDanhSach()
    {
        $loaisanpham = LoaiSanPham::all(); // Lấy tất cả dữ liệu từ CSDL
        return view('loaisanpham.danhsach', compact('loaisanpham')); // Trả về View và truyền biến sang
    }

    // 2. Hiện form thêm mới
    public function getThem()
    {
        return view('loaisanpham.them');
    }

    // 3. Xử lý thêm mới vào CSDL
    public function postThem(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào (Validation)
        $request->validate([
            'tenloai' => ['required', 'string', 'max:255', 'unique:loaisanpham'],
        ]);

        $orm = new LoaiSanPham();
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai, '-'); // Tạo slug: "Gà Rán" -> "ga-ran"
        $orm->save(); // Lưu vào CSDL

        return redirect()->route('loaisanpham'); // Quay về trang danh sách
    }

    // 4. Hiện form sửa
    public function getSua($id)
    {
        $loaisanpham = LoaiSanPham::find($id); // Tìm loại sản phẩm theo ID
        return view('loaisanpham.sua', compact('loaisanpham'));
    }

    // 5. Xử lý cập nhật
    public function postSua(Request $request, $id)
    {
        $request->validate([
            'tenloai' => ['required', 'string', 'max:255', 'unique:loaisanpham,tenloai,' . $id],
        ]);

        $orm = LoaiSanPham::find($id);
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai, '-');
        $orm->save();

        return redirect()->route('loaisanpham');
    }

    // 6. Xử lý xóa
    public function getXoa($id)
    {
        $orm = LoaiSanPham::find($id);
        $orm->delete();

        return redirect()->route('loaisanpham');
    }
}