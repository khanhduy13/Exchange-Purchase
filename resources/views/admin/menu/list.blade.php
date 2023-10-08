@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Tên Danh Mục</th>
                <th>Trạng Thái</th>
                <th>Cập Nhật Lần Cuối</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $key => $menu)
                @php
                    $stt = $key + 1;
                @endphp
                <tr>

                    <td>{{ $stt }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>{!! \App\Helpers\Helper::active($menu->active) !!}</td>
                    <td>{{ $menu->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/menus/edit/{{ $menu->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $menu->id }}, '/admin/menus/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
