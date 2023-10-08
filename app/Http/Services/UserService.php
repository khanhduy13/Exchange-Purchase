<?php

namespace App\Http\Services;

use App\Models\DetailUser;
use App\Models\Post;
use App\Models\PostExchange;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserService
{

    public function update($request)
    {
        $user = Auth::user(); // lấy ra đối tượng người dùng đang đăng nhập
        $user = User::where('id', $user->id)->first();
        $user->tennd = $request->tennd;
        $user->save();
        $detail = DetailUser::where('id_user', $user->id)->first(); // lấy ra đối tượng "DetailUser" với "id_user" bằng "id" của người dùng đang đăng nhập
        $detail->Sdt = $request->Sdt; // cập nhật dữ liệu cho "field1" với giá trị từ request
        $detail->Diachi = $request->Diachi;
        $detail->Anhdaidien = $request->hinhanh;
        $detail->save();
        return redirect()->back()->with('success', 'Cập nhật thông tin thành công.');
    }

    public function getdaduyet()
    {
        if (Auth::check()) {
            $id_user = Auth::user()->id;
            return Post::with('baidang')->with('danhmuc')->where('trangthai', 1)->where('soluongcon', '<>', 0)->where('id_user', '<>', $id_user)->paginate(10);
        } else {
            return Post::with('baidang')->with('danhmuc')->where('trangthai', 1)->where('soluongcon', '<>', 0)->paginate(10);
        }
    }
    public function getdadang()
    {
        $user = Auth::user(); // lấy ra đối tượng người dùng đang đăng nhập
        $user = User::where('id', $user->id)->first();
        return Post::with('baidang')->with('danhmuc')->where('id_user', $user->id)->get();
    }
    public function getdagoi()
    {
        $user = Auth::user(); // lấy ra đối tượng người dùng đang đăng nhập
        $user = User::where('id', $user->id)->first();

        return PostExchange::with('traodoi')->with('danhmuc')->where('id_user', $user->id)->get();
    }
    public function getdanhan()
    {
        $user = Auth::user();
        $user = User::where('id', $user->id)->first();
        return Post::with('baidang')->with('danhmuc')->with('traodoi')->where('id_user', $user->id)->get();
    }


    public function udexchange($request, $posted, $exchange)
    {
        $posted->Soluongcon = (string) $request->input('Soluongcon');
        $posted->save();
        $exchange->trangthai = (string) $request->input('trangthai');
        $exchange->save();
        return true;
    }
}
