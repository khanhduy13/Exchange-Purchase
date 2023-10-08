<?php

namespace App\Http\Controllers;

use App\Http\Services\PostService;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Models\DetailUser;
use App\Models\Post;
use App\Models\PostExchange;
use App\Models\User;

class PostController extends Controller
{
    protected $PostService, $UserService;
    public function __construct(PostService $PostService, UserService $UserService)
    {
        $this->PostService = $PostService;
        $this->UserService = $UserService;
    }

    public function crpost()
    {
        return view('user.post', [
            'title' => 'Đăng bài',
            'menus' => $this->PostService->getdanhmuc()
        ]);
    }

    public function store(Request $request, User $User)
    {
        $this->PostService->create($request, $User);
        return redirect()->back();
    }

    public function list()
    {
        return view('user.listpost', [
            'title' => 'Danh sách bài đã đăng',
            'posts' => $this->UserService->getdadang(),
        ]);
    }
    public function detail(Post $post, DetailUser $detailuser)
    {

        $editpost = $post;
        $detail = DetailUser::where('id_user', $editpost->id_user)->get();
        $user = $editpost->baidang;
        $tendanhmuc = $editpost->danhmuc;
        return view('user.detailpost', [
            'title' => 'Chi tiết bài đăng',
            'post' => $editpost,
            'user' => $user,
            'tendanhmuc' => $tendanhmuc,
            'detail' => $detail
        ]);
    }

    public function buy(Post $post)
    {

        $editpost = $post;
        $detail = DetailUser::where('id_user', $editpost->id_user)->get();
        $user = $editpost->baidang;
        $tendanhmuc = $editpost->danhmuc;
        return view('user.buy', [
            'title' => 'Mua',
            'post' => $editpost,
            'user' => $user,
            'tendanhmuc' => $tendanhmuc,
            'detail' => $detail,
            'menus' => $this->PostService->getdanhmuc()
        ]);
    }

    public function exchange(Post $post)
    {

        $editpost = $post;
        $detail = DetailUser::where('id_user', $editpost->id_user)->get();
        $user = $editpost->baidang;
        $tendanhmuc = $editpost->danhmuc;
        return view('user.exchange', [
            'title' => 'Trao đổi',
            'post' => $editpost,
            'user' => $user,
            'tendanhmuc' => $tendanhmuc,
            'detail' => $detail,
            'menus' => $this->PostService->getdanhmuc()
        ]);
    }

    public function postexchange(Request $request)
    {
        $this->PostService->crpostexchange($request);
        return redirect()->back();
    }
    public function postbuy(Request $request)
    {
        $this->PostService->crpostexchange($request);
        return redirect()->back();
    }
    public function listExchanged()
    {
        $posts = $this->UserService->getDagoi();
        $userIds = [];
        foreach ($posts as $post) {
            $userIds[] = $post->traodoi->id_user;
        }
        $users = User::whereIn('id', $userIds)->get();

        $detailUsers = DetailUser::whereIn('id_user', $userIds)->get();
        return view('user.postexchanged', [
            'title' => 'Danh sách các yêu cầu đã gởi',
            'posts' => $posts,
            'users' => $users,
            'detailusers' => $detailUsers,
        ]);
    }
    public function listreceive()
    {
        $id_bds = $this->UserService->getdanhan();

        if ($id_bds->count() === 0) {
            return view('user.empty_receive', [
                'title' => 'Yêu cầu nhận được',
            ]);
        }

        $id_baidangs = $id_bds->pluck('id'); // Lấy danh sách id của các bài đăng

        $send = PostExchange::whereIn('id_baidang', $id_baidangs)->with('traodoi')->get();
        if ($send->count() === 0) {
            return view('user.empty_receive', [
                'title' => 'Yêu cầu nhận được',
            ]);
        }

        return view('user.receive', [
            'title' => 'Yêu cầu nhận được',
            'posts' => $id_bds, // Truyền danh sách các bài đăng
            'sends' => $send,
        ]);
    }


    public function accept(Post $posted, PostExchange $exchange)
    {
        $id_user = $exchange->id_user;
        $detail_user = DetailUser::where('id_user', $id_user)->get();
        $email = User::where('id', $id_user)->get();
        return view('user.accept', [
            'title' => 'Thực hiện yêu cầu',
            'post' => $posted,
            'exchange' => $exchange,
            'detail_user' => $detail_user,
            'email' => $email,
        ]);
    }

    public function update(Post $posted, PostExchange $exchange, Request $request)
    {
        $this->UserService->udexchange($request, $posted, $exchange);
        return redirect('/user/receive');
    }
}
