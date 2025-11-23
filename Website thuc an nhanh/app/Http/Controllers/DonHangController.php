<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use App\Models\TinhTrang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    // 1. Xem danh sách đơn hàng
    public function getDanhSach()
    {
        // Lấy đơn mới nhất lên đầu
        $donhang = DonHang::orderBy('created_at', 'desc')->get();
        return view('admin.donhang.danhsach', compact('donhang'));
    }

    // 2. Thêm đơn hàng (Thường khách hàng đặt từ Frontend, Admin ít khi nhập tay)
    public function getThem()
    {
        // Có thể để trống hoặc redirect về danh sách
        return redirect()->route('admin.donhang');
    }

    public function postThem(Request $request)
    {
        // Xử lý sau nếu cần
    }

    // 3. Sửa trạng thái đơn hàng
    public function getSua($id)
    {
        $donhang = DonHang::find($id);
        $tinhtrang = TinhTrang::all(); // Lấy danh sách trạng thái (Mới, Đang giao...)
        return view('admin.donhang.sua', compact('donhang', 'tinhtrang'));
    }

    public function postSua(Request $request, $id)
    {
        $request->validate([
            'tinhtrang_id' => ['required'],
            'dienthoaigiaohang' => ['required', 'string', 'max:20'],
            'diachigiaohang' => ['required', 'string', 'max:255'],
        ]);

        $orm = DonHang::find($id);
        $orm->tinhtrang_id = $request->tinhtrang_id;
        $orm->dienthoaigiaohang = $request->dienthoaigiaohang;
        $orm->diachigiaohang = $request->diachigiaohang;
        $orm->save();

        return redirect()->route('admin.donhang');
    }

    // 4. Xóa đơn hàng
    public function getXoa($id)
    {
        // Xóa chi tiết đơn hàng trước
        DonHang_ChiTiet::where('donhang_id', $id)->delete();

        // Sau đó mới xóa đơn hàng chính
        $orm = DonHang::find($id);
        $orm->delete();

        return redirect()->route('admin.donhang');
    }
}