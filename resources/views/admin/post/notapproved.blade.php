@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Tên Người Dùng</th>
                <th>Tên đồ vật</th>
                <th>Số lượng</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Thời gian</th>

                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $key => $post)
                @php
                    $stt = $key + 1;
                @endphp
                <tr>

                    <td>{{ $stt }}</td>
                    <td>{{ $post->baidang->tennd }}</td>
                    <td>{{ $post->Tendovat }}</td>
                    <td>{{ $post->Soluong }}</td>
                    <td>{{ $post->danhmuc->name }}</td>
                    <td>{{ $post->Gia }}</td>
                    <td><img width="50px" src="{{ $post->Hinhanh }}"></td>
                    <td>{!! \App\Helpers\Helper::trangthai($post->trangthai) !!}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/posts/edit/{{ $post->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
