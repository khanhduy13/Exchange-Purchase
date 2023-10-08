<?php

namespace App\Http\Services;

use App\Jobs\HasExchange;
use App\Models\DetailUser;
use App\Models\Menu;
use App\Models\Post;
use App\Models\PostExchange;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PostService
{
    public function create($request, $User)
    {
        $request->validate([
            'Tendovat' => 'required',
            'Soluong' => 'required|numeric|min:1',
            'Gia' => 'required|numeric|min:1000',
        ], [
            'Tendovat.required' => 'Nhập tên đồ vật',
            'Soluong.min' => 'Số lượng không được bé hơn 1',
            'Soluong.required' => 'Nhập số lượng đồ vật',
            'Gia.min' => 'Giá không được bé hơn 1',
            'Gia.required' => 'Nhập giá đồ vật',
        ]);

        $current_user = Auth::user()->id;
        try {
            DB::transaction(function () use ($request, $current_user) {
                // Tạo mới bài đăng trong bảng Post
                $post = new Post();
                $post->id_user = $current_user;
                $post->Tendovat = $request->input('Tendovat');
                $post->Soluong = $request->input('Soluong');
                $post->Soluongcon = $request->input('Soluong');
                $post->id_danhmuc = $request->input('id_danhmuc');
                $post->Diachi = $request->input('Diachi');
                $post->Mota = $request->input('Mota');
                $post->Hinhanh = $request->input('Hinhanh');
                $post->Gia = $request->input('Gia');
                $post->Phithu = $request->input('Phithu');
                $post->save();

                // Cập nhật số dư trong bảng User
                $user = User::find($current_user);
                $user->Sodu = $request->input('Sodu');
                $user->save();
            });

            Session::flash('success', 'Đăng bài thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }
    public function getdanhmuc()
    {
        return Menu::orderByDesc('id')->where('active', 1)->paginate(20);
    }

    public function crpostexchange($request)
    {
        $request->validate([
            'Tendovat' => 'required',
            'Soluong' => 'required|numeric|min:1',
            'Gia' => 'required|numeric|min:1000',
        ], [
            'Tendovat.required' => 'Nhập tên đồ vật',
            'Soluong.min' => 'Số lượng không được bé hơn 1',
            'Soluong.required' => 'Nhập số lượng đồ vật',
            'Gia.min' => 'Giá không được bé hơn 1',
            'Gia.required' => 'Nhập giá đồ vật',
        ]);
        $current_user = Auth::user()->id;
        try {
            PostExchange::create([
                'id_user' => $current_user,
                'id_baidang' => (string) $request->input('id_baidang'),
                'Tendovat' => (string) $request->input('Tendovat'),
                'Soluong' => (string) $request->input('Soluong'),
                'Slmuondoi' => (string) $request->input('Slmuondoi'),
                'id_danhmuc' => (string) $request->input('id_danhmuc'),
                'Diachi' => (string) $request->input('Diachi'),
                'Mota' => (string) $request->input('Mota'),
                'Hinhanh' => (string) $request->input('Hinhanh'),
                'Gia' => (string) $request->input('Gia'),
            ]);

            Session::flash('success', 'Đăng bài thành công');
            HasExchange::dispatch($request->input('email'))->delay(now()->addSeconds(2));
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
}
