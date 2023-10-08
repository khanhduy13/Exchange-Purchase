<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Services\AccService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class AccController extends Controller
{
    protected $AccService;
    public function __construct(AccService $AccService)
    {
        $this->AccService = $AccService;
    }


    public function index()
    {
        return view('admin.acc.list', [
            'title' => 'Danh sách tài khoản',
            'accs' => $this->AccService->getuser()
        ]);
    }

    public function index2()
    {
        return view('admin.acc.listAdmin', [
            'title' => 'Danh sách tài khoản',
            'accs' => $this->AccService->getadmin()
        ]);
    }

    public function create()
    {
        return view('admin.acc.add', [
            'title' => 'Thêm Tài Khoản Mới',
        ]);
    }

    public function store(Request $request)
    {
        $this->AccService->create($request);
        return redirect('/admin/accs/list');
    }

    public function show(User $acc)
    {
        return view('admin.acc.edit', [
            'title' => ' Chỉnh sửa tài khoản : ' . $acc->tennd,
            'acc' => $acc,

        ]);
    }



    public function update(User $acc, Request $request)
    {
        $this->AccService->update($request, $acc);
        return redirect('/admin/accs/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->AccService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }

        return response()->json(['error' => true]);
    }
    public function revenue()
    {
        return view('admin.acc.revenue', [
            'title' => 'Danh sách người dùng, tiền nạp',
            'accs' => $this->AccService->getuser()
        ]);
    }

    public function success()
    {
        $id_post = $this->AccService->getsuccess();
        $postbd = Post::whereIn('id', $id_post->pluck('id_baidang'))->with('traodoi')->get();
        return view('admin.acc.success', [
            'title' => 'Danh sách các bài trao đổi thành công',
            'posts' => $postbd,
            'postexchanges' => $this->AccService->getsuccess()
        ]);
    }
}
