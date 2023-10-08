@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Tên Người Dùng</th>
                <th>Tên đồ vật</th>
                <th style="width: 90px">Số lượng</th>
                <th style="width: 90px">Số lượng còn</th>
                <th style="width: 90px">Số lượng đã trao đổi</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Thời gian</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @php
                $currentMonth = null;
                $currentYear = null;
            @endphp
            @php
                // Sắp xếp mảng $posts theo thứ tự giảm dần của trường 'created_at'
                $sortedPosts = $posts->sortByDesc('created_at')->values();
            @endphp
            @foreach ($sortedPosts as $key => $post)
                @php
                    $stt = $key + 1;
                    $sl = $post->Soluong - $post->Soluongcon;
                    $month = $post->created_at->format('m');
                    $year = $post->created_at->format('Y');
                @endphp

                @if ($currentMonth != $month || $currentYear != $year)
                    <tr>
                        <td style="color: rgb(37, 18, 214);font-weight: bold" colspan="12">Tháng {{ $month }},
                            {{ $year }}</td>
                    </tr>
                @endif

                <tr>
                    <td>{{ $stt }}</td>
                    <td>{{ $post->baidang->tennd }}</td>
                    <td>{{ $post->Tendovat }}</td>
                    <td>{{ $post->Soluong }}</td>
                    <td>{{ $post->Soluongcon }}</td>
                    <td>{{ $sl }}</td>
                    <td>{{ $post->danhmuc->name }}</td>
                    <td>{!! \App\Helpers\Helper::price($post->Gia) !!}đ</td>
                    <td><img width="50px" src="{{ $post->Hinhanh }}"></td>
                    <td>{!! \App\Helpers\Helper::trangthai($post->trangthai) !!}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/posts/edit/{{ $post->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>

                @php
                    $currentMonth = $month;
                    $currentYear = $year;
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection
