<?php

namespace App\Http\Services;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class menuService
{
    // menu nhiều, cần phân trang
    public function getAll()
    {
        return Menu::orderByDesc('id')->paginate(20);
    }

    public function show()
    {
        return Menu::select('name', 'id')
            ->orderbyDesc('id')
            ->get();
    }

    public function create($request)
    {
        try {
            menu::create([
                'name' => (string) $request->input('name'),
                'description' => (string) $request->input('description'),
                'active' => (string) $request->input('active'),

            ]);
            Session::flash('success', 'Tạo danh mục mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $menu): bool
    {

        $menu->name = (string) $request->input('name');
        $menu->description = (string) $request->input('description');
        $menu->active = (string) $request->input('active');
        $menu->save();
        Session::flash('success', 'Cập nhật danh mục thành công');
        return true;
    }

    public function delete($request)
    {
        $menu = Menu::where('id', $request->input('id'))->first();
        if ($menu) {
            $menu->delete();
            return true;
        }

        return false;
    }

    public function getId($id)
    {
        return Menu::where('id', $id)->where('active', 1)->firstOrFail();
    }

    public function getProduct($menu)
    {

        return $menu->products()
            ->select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->orderBy('id')
            ->paginate(12);
    }
}
