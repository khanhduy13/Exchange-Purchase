@extends('admin.main')

@section('content')
    <table class="table">


        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Hình ảnh</th>
                <th>Tên đồ vật</th>
                <th>Số lượng</th>
                <th>Giá/vật</th>
                <th>Số lượng muốn đổi</th>
                <th>Đồ vật được trao đổi</th>
                <th>Hình ảnh</th>
                <th>Giá/vật</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($postexchanges as $key => $postexchange)
                @php
                    $stt = $key + 1;
                    $post = $posts->where('id', $postexchange->id_baidang)->first(); // Lấy bài viết tương ứng
                @endphp
                <tr>
                    <td class="centered-cell">{{ $stt }}</td>
                    <td class="centered-cell"><img width="50px" src="{{ $postexchange->Hinhanh }}"></td>
                    <td class="centered-cell">{{ $postexchange->Tendovat }}</td>
                    <td class="centered-cell">{{ $postexchange->Soluong }}</td class="centered-cell">
                    <td class="centered-cell">{!! \App\Helpers\Helper::price($postexchange->Gia) !!}đ</td class="centered-cell">
                    <td class="centered-cell">{{ $postexchange->Slmuondoi }}</td class="centered-cell">
                    <td>{{ $post->Tendovat }}</td class="centered-cell">
                    <td class="centered-cell"><img width="50px" src="{{ $post->Hinhanh }}"></td class="centered-cell">
                    <td class="centered-cell">{!! \App\Helpers\Helper::price($post->Gia) !!}đ</td class="centered-cell">
                    <td class="centered-cell" style="width: 70px;">{!! \App\Helpers\Helper::trangthai2($post->trangthai) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-right mb-4 mt-2" style="padding-right: 40px">
        <a class="btn btn-primary" href="{{ route('export.pdf1') }}">Xuất báo cáo</a>
    </div>
@endsection
<style>
    .centered-cell {
        text-align: center;
        vertical-align: middle;
    }
</style>
