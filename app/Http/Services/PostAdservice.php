<?php


namespace App\Http\Services;

use App\Jobs\SendMail;
use App\Jobs\TuChoi;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PHPUnit\Metadata\Uses;

class PostAdservice
{
    public function getdaduyet()
    {
        return Post::with('baidang')->with('danhmuc')->where('trangthai', 1)->get();
    }
    public function getchuaduyet()
    {
        return Post::with('baidang')->with('danhmuc')->where('trangthai', 0)->get();
    }
    public function getbikhoa()
    {
        return Post::with('baidang')->with('danhmuc')->where('trangthai', 2)->get();
    }
    public function update($post, $request)
    {
        $post->ghichu = $request->input('ghichu');
        $post->trangthai = $request->input('trangthai');
        $post->save();
        Session::flash('success', 'Duyệt bài thành công');

        if ($request->input('trangthai') == 1) {
            SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));
        } else if ($request->input('trangthai') == 2) {
            TuChoi::dispatch($request->input('email'))->delay(now()->addSeconds(2));
        }

        return true;
    }
}
