<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function getDanhSach()
    {
        $nguoidung = User::all();
        return view('admin.nguoidung.danhsach', compact('nguoidung'));
    }

    public function getThem()
    {
        return view('admin.nguoidung.them');
    }

    public function postThem(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
            'password' => ['required', 'min:4', 'confirmed'], // confirmed: Bắt buộc nhập lại MK phải khớp
        ]);

        $orm = new User();
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@'); // Lấy phần trước @ làm username
        $orm->email = $request->email;
        $orm->password = Hash::make($request->password); // Mã hóa mật khẩu
        $orm->role = $request->role;
        $orm->save();

        return redirect()->route('admin.nguoidung');
    }

    public function getSua($id)
    {
        $nguoidung = User::find($id);
        return view('admin.nguoidung.sua', compact('nguoidung'));
    }

    public function postSua(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'role' => ['required'],
            'password' => ['confirmed'], // Không bắt buộc required, chỉ check khớp nếu có nhập
        ]);

        $orm = User::find($id);
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@');
        $orm->email = $request->email;
        $orm->role = $request->role;
        
        // Chỉ đổi mật khẩu nếu người dùng nhập vào ô Password
        if (!empty($request->password)) {
            $orm->password = Hash::make($request->password);
        }
        
        $orm->save();

        return redirect()->route('admin.nguoidung');
    }

    public function getXoa($id)
    {
        $orm = User::find($id);
        $orm->delete();
        return redirect()->route('admin.nguoidung');
    }
}