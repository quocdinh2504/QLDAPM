<?php

namespace App\Http\Controllers;

use App\Models\HangSanXuat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; // Thêm thư viện xử lý file

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

        $orm = new HangSanXuat();
        $orm->tenhang = $request->tenhang;
        $orm->tenhang_slug = Str::slug($request->tenhang, '-');
        
        if ($request->hasFile('hinhanh')) {
            $path = $request->file('hinhanh')->store('hangsanxuat', 'public');
            $orm->hinhanh = $path;
        }

        $orm->save();
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

        $orm = HangSanXuat::find($id);
        $orm->tenhang = $request->tenhang;
        $orm->tenhang_slug = Str::slug($request->tenhang, '-');

        if ($request->hasFile('hinhanh')) {
            if(!empty($orm->hinhanh)) Storage::disk('public')->delete($orm->hinhanh);
            $path = $request->file('hinhanh')->store('hangsanxuat', 'public');
            $orm->hinhanh = $path;
        }

        $orm->save();
        return redirect()->route('hangsanxuat');
    }

    public function getXoa($id)
    {
        $orm = HangSanXuat::find($id);
        if(!empty($orm->hinhanh)) Storage::disk('public')->delete($orm->hinhanh);
        $orm->delete();
        return redirect()->route('hangsanxuat');
    }
}