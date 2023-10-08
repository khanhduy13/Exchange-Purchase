<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFormRequest;
use App\Http\Services\menuService;
use App\Models\Menu;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(menuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm danh mục',
        ]);
    }


    public function store(CreateFormRequest $request)
    {
        $this->menuService->create($request);
        return redirect('/admin/menus/list');
    }

    public function index()
    {
        return view('admin.menu.list', [
            'title' => 'Danh sách Danh mục mới nhất',
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function show(Menu $menu)
    {
        return view('admin.menu.edit', [
            'title' => 'Chỉnh sửa danh mục:' . $menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function update(Menu $menu, CreateFormRequest $request)
    {
        $this->menuService->update($request, $menu);
        return redirect('/admin/menus/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->menuService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }

        return response()->json(['error' => true]);
    }
}
