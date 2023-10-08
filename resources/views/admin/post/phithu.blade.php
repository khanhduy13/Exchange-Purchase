@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Tên đồ vật</th>
                <th style="width: 90px">Số lượng</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Phí thu</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPhithu = 0;
            @endphp

            @foreach ($posts as $key => $post)
                @php
                    $stt = $key + 1;
                    $totalPhithu += $post->Phithu;
                @endphp
                <tr>
                    <td>{{ $stt }}</td>
                    <td>{{ $post->Tendovat }}</td>
                    <td>{{ $post->Soluong }}</td>
                    <td>{!! \App\Helpers\Helper::price($post->Gia) !!}đ</td>
                    <td><img width="50px" src="{{ $post->Hinhanh }}"></td>
                    <td>{!! \App\Helpers\Helper::price($post->Phithu) !!}đ</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-right mb-4 mt-2" style="padding-right: 130px; font-size: 20px;font-weight: bold">
        <p>Tổng số phí thu: {!! \App\Helpers\Helper::price($totalPhithu) !!}đ</p>
        <div class="text-right mb-4 mt-2" style="padding-right: 40px">
            <a class="btn btn-primary" href="{{ route('export.pdf3') }}">Xuất báo cáo</a>
        </div>
    </div>
@endsection
