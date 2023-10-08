<?php


namespace App\Http\Services;

use App\Models\DetailUser;
use App\Models\PostExchange;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccService
{

    public function getuser()
    {
        return User::where('role_id', 2)->get();
    }
    public function getadmin()
    {
        return User::where('role_id', 1)->get();
    }


    public function create($request)
    {
        $request->validate(
            [
                'tennd' => 'required',
                'email' => 'required|email:filter',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ],
            [
                'email.required' => 'Bạn chưa nhập email',
                'tennd.required' => 'Bạn chưa nhập tên',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password_confirmation.required' => 'Bạn chưa nhập xác nhận mật khẩu',
            ]
        );
        try {
            $user = User::create([
                'tennd' => (string) $request->input('tennd'),
                'email' => (string) $request->input('email'),
                'password' => Hash::make($request->password),
                'role_id' => (string) $request->input('role_id'),

            ]);
            $Dtuser = new DetailUser([
                'id_user' => $user->id,
            ]);
            Session::flash('success', 'Tạo tài khoản mới thành công');
            $Dtuser->save();
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $acc)
    {
        $oldPasswordHash = $acc->password;
        $acc->tennd = (string) $request->input('tennd');
        // $acc->email = (string) $request->input('email');
        $acc->trangthai = (string) $request->input('active');
        $acc->role_id = (string) $request->input('role_id');
        $acc->save();
        Session::flash('success', 'Cập nhật tài khoản thành công');
        return true;
    }
    public function delete($request)
    {
        $user = User::where('id', $request->input('id'))->first();
        if ($user) {
            $user->delete();
            return true;
        }

        return false;
    }

    public function getsuccess()
    {
        return PostExchange::where('trangthai', 1)->get();
    }
}
