<?php


namespace App\Http\View\Composers;


use App\Http\Services\DanhMucService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HeaderComposer
{

    public function compose(View $view)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $username = $user->tennd;
        } else {
            $username = 'Đăng nhập';
        }
        $view->with('username', $username);
    }
}
