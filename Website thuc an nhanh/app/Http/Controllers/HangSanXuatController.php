<?php

namespace App\Http\Controllers;

use App\Models\HangSanXuat;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Để tạo tên file chuẩn (slug)
use Illuminate\Support\Facades\Storage; // Để lưu/xóa file
use Illuminate\Support\Facades\File; // Hỗ trợ thêm các thao tác file

class HangSanXuatController extends Controller
{
    public function getDanhSach()
    {
        $hangsanxuat = HangSanXuat::all();
        return view('hangsanxuat.danhsach', compact('hangsanxuat'));
    }

    public function getThem()
    {
        return view('hangsanxuat.them');
    }

    public function postThem(Request $request)
    {
        $request->validate([
            'tenhang' => ['required', 'string', 'max:255', 'unique:hangsanxuat'],
            'hinhanh' => ['nullable', 'image', 'max:2048'],
        ]);

        // Upload hình ảnh
        $path = null;
        if($request->hasFile('hinhanh'))
        {
            $extension = $request->file('hinhanh')->extension();
            $filename = Str::slug($request->tenhang, '-') . '.' . $extension;
            $path = Storage::putFileAs('hang-san-xuat', $request->file('hinhanh'), $filename);
        }

        // Thêm
        $orm = new HangSanXuat();
        $orm->tenhang = $request->tenhang;
        $orm->tenhang_slug = Str::slug($request->tenhang, '-');
        $orm->hinhanh = $path ?? null;
        $orm->save();

        // Sau khi thêm thành công thì tự động chuyển về trang danh sách
        return redirect()->route('hangsanxuat');

    }

    public function getSua($id)
    {
        $hangsanxuat = HangSanXuat::find($id);
        return view('hangsanxuat.sua', compact('hangsanxuat'));
    }

    public function postSua(Request $request, $id)
    {
        $request->validate([
            'tenhang' => ['required', 'string', 'max:255', 'unique:hangsanxuat,tenhang,' . $id],
            'hinhanh' => ['nullable', 'image', 'max:2048'],
        ]);

        // Upload hình ảnh
        $path = null;
        if($request->hasFile('hinhanh'))
        {
            // Xóa file cũ
            $orm = HangSanXuat::find($id);
            if(!empty($orm->hinhanh)) Storage::delete($orm->hinhanh);

            // Upload file mới
            $extension = $request->file('hinhanh')->extension();
            $filename = Str::slug($request->tenhang, '-') . '.' . $extension;
            $path = Storage::putFileAs('hang-san-xuat', $request->file('hinhanh'), $filename);
        }

        // Sửa
        $orm = HangSanXuat::find($id);
        $orm->tenhang = $request->tenhang;
        $orm->tenhang_slug = Str::slug($request->tenhang, '-');
        $orm->hinhanh = $path ?? $orm->hinhanh ?? null;
        $orm->save();

        // Sau khi sửa thành công thì tự động chuyển về trang danh sách
        return redirect()->route('hangsanxuat');

    }

    public function getXoa($id)
    {
        $orm = HangSanXuat::find($id); 
        $orm->delete();
        
        // Xoá hình ảnh khi xóa dữ liệu
        if(!empty($orm->hinhanh)) Storage::delete($orm->hinhanh);
       
        return redirect()->route('hangsanxuat');
    }
}