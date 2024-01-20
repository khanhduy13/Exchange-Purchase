<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\UserService;
use App\Http\Services\PostService;
use App\Models\DetailUser;
use App\Models\Menu;
use Illuminate\Pagination\Paginator;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends BaseController
{

    protected $UserService, $PostService;
    public function __construct(UserService $UserService, PostService $PostService)
    {
        $this->UserService = $UserService;
        $this->PostService = $PostService;
    }

    public function index()
    {
        $user = Auth::user();
        $detail = $user->detail;
        return view('user.profile', [
            'title' => 'Cập nhật trang cá nhân',
            'user' => $user,
            'detail' => $detail
        ]);
    }

    public function editprofile()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $detail = $user->detail;
            return view('user.editprofile', [
                'title' => 'Cập nhật trang cá nhân',
                'user' => $user,
                'detail' => $detail
            ]);
        } else {
            return redirect()->route('login');
        }
    }

    public function show()
    {
        $title = 'Trang chủ';
        $posts = $this->UserService->getdaduyet();
        $menus = $this->PostService->getdanhmuc();
        return view('user.newfeed', compact('title', 'posts', 'menus'));
    }
    public function resetpw()
    {
        return view('user.resetpassword', [
            'title' => 'Đổi mật khẩu',
        ]);
    }


    public function resetpw_action(Request $request, User $user)
    {
        // Lấy dữ liệu từ request
        $currentPassword = $request->input('current_password');
        $newPassword = $request->input('new_password');
        $confirmPassword = $request->input('confirm_password');
        // Kiểm tra mật khẩu hiện tại của người dùng
        if (!Hash::check($currentPassword, Auth::user()->password)) {
            // Mật khẩu hiện tại không khớp, hiển thị thông báo lỗi
            return redirect()->back()->with('error', 'Mật khẩu hiện tại không đúng');
        }
        if ($newPassword == $currentPassword) {

            return redirect()->back()->with('error', 'Bạn đã nhập mật khẩu cũ');
        }
        if ($newPassword !== $confirmPassword) {

            return redirect()->back()->with('error', 'Xác nhận mật khẩu mới không khớp');
        }

        $user->password = Hash::make($newPassword);
        $user->save();

        // Đã cập nhật mật khẩu thành công, hiển thị thông báo thành công
        return redirect('login')->with('success', 'Mật khẩu đã được cập nhật thành công');
    }

    public function store(Request $request)
    {
        $this->UserService->update($request);
        return redirect()->back();
    }


    
}
