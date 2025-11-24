<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SanPham;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\LoaiSanPham;

class HomeController extends Controller
{
    public function getHome()
    {
        $loaisanpham = LoaiSanPham::with([
                    'SanPham' => function($query) { $query->latest()->take(8); }
                ])->get();
            return view('frontend.home', compact('loaisanpham'));
    }

    public function getSanPham($tenloai_slug = '')
    {
        // Bổ sung code tại đây
        return view('frontend.sanpham');
    }

    public function getSanPham_ChiTiet($tenloai_slug = '', $tensanpham_slug = '')
    {
        // Bổ sung code tại đây
        return view('frontend.sanpham_chitiet');
    }

    public function getBaiViet($tenchude_slug = '')
    {
        // Bổ sung code tại đây
        return view('frontend.baiviet');
    }

    public function getBaiViet_ChiTiet($tenchude_slug = '', $tieude_slug = '')
    {
        // Bổ sung code tại đây
        return view('frontend.baiviet_chitiet');
    }
     public function getGioHang()
    {
        if(Cart::count() > 0)
            return view('frontend.giohang');
        else
            return view('frontend.giohangrong');
    }

    public function getGioHang_Them($tensanpham_slug = '')
    {
        $sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();

        Cart::add([
            'id' => $sanpham->id,
            'name' => $sanpham->tensanpham,
            'price' => $sanpham->dongia,
            'qty' => 1,
            'weight' => 0,
            'options' => [
            'image' => $sanpham->hinhanh
            ]
        ]);

        return redirect()->route('frontend.home');
    }

    public function getGioHang_Xoa($row_id)
    {
        Cart::remove($row_id);

        return redirect()->route('frontend.giohang');
    }

    public function getGioHang_Giam($row_id)
    {
        $row = Cart::get($row_id);

        // Nếu số lượng là 1 thì không giảm được nữa
        if($row->qty > 1)
        {
            Cart::update($row_id, $row->qty - 1);
        }

        return redirect()->route('frontend.giohang');
    }

    public function getGioHang_Tang($row_id)
    {
        $row = Cart::get($row_id);

        // Không được tăng vượt quá 10 sản phẩm
        if($row->qty < 10)
        {
            Cart::update($row_id, $row->qty + 1);
        }

        return redirect()->route('frontend.giohang');
    }

    public function getTuyenDung()
    {
        return view('frontend.tuyendung');
    }

    public function getLienHe()
    {
        return view('frontend.lienhe');
    }

    // Trang đăng ký dành cho khách hàng
    public function getDangKy()
    {
        return view('user.dangky');
    }

    // Trang đăng nhập dành cho khách hàng
    public function getDangNhap()
    {
        return view('user.dangnhap');
    }
}
