<?php

namespace App\Http\Controllers;

use App\Models\HangSanXuat; // Gọi Model HangSanXuat
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Gọi thư viện xử lý chuỗi (để tạo slug)

class HangSanXuatController extends Controller
{
    // 1. Xem danh sách
    public function getDanhSach()
    {
        $HangSanXuat = HangSanXuat::all(); // Lấy tất cả dữ liệu từ CSDL
        return view('HangSanXuat.danhsach', compact('HangSanXuat')); // Trả về View và truyền biến sang
    }

    // 2. Hiện form thêm mới
    public function getThem()
    {
        return view('HangSanXuat.them');
    }

    // 3. Xử lý thêm mới vào CSDL
    public function postThem(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào (Validation)
        $request->validate([
            'tenhang' => ['required', 'string', 'max:255', 'unique:HangSanXuat'],
        ]);

        $orm = new HangSanXuat();
        $orm->tenhang = $request->tenhang;
        $orm->tenhang_slug = Str::slug($request->tenhang, '-'); // Tạo slug: "Gà Rán" -> "ga-ran"
        $orm->save(); // Lưu vào CSDL

        return redirect()->route('HangSanXuat'); // Quay về trang danh sách
    }

    // 4. Hiện form sửa
    public function getSua($id)
    {
        $HangSanXuat = HangSanXuat::find($id); // Tìm loại sản phẩm theo ID
        return view('HangSanXuat.sua', compact('HangSanXuat'));
    }

    // 5. Xử lý cập nhật
    public function postSua(Request $request, $id)
    {
        $request->validate([
            'tenhang' => ['required', 'string', 'max:255', 'unique:HangSanXuat,tenhang,' . $id],
        ]);

        $orm = HangSanXuat::find($id);
        $orm->tenhang = $request->tenhang;
        $orm->tenhang_slug = Str::slug($request->tenhang, '-');
        $orm->save();

        return redirect()->route('HangSanXuat');
    }

    // 6. Xử lý xóa
    public function getXoa($id)
    {
        $orm = HangSanXuat::find($id);
        $orm->delete();

        return redirect()->route('HangSanXuat');
    }
}