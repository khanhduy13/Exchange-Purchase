@extends('admin.main')

@section('content')
    <table class="table">


        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Tên Người Dùng</th>
                <th>Email</th>
                <th>Đã nạp</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accs as $key => $acc)
                @php
                    $stt = $key + 1;
                @endphp
                <tr>

                    <td>{{ $stt }}</td>
                    <td>{{ $acc->tennd }}</td>
                    <td>{{ $acc->email }}</td>
                    <td>{!! \App\Helpers\Helper::price($acc->Danap) !!}đ</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <?php
    $totalSodu = 0; // Biến lưu tổng Sodu
    
    foreach ($accs as $acc) {
        $totalSodu += $acc->Danap; // Cộng dồn giá trị Sodu
    }
    ?>
    <div style="margin-left: 724px;font-size: 20px;font-weight: 600">Tổng cộng: {!! \App\Helpers\Helper::price($totalSodu) !!}đ</div>
    <div class="text-right mb-4 mt-2" style="padding-right: 40px">
        <a class="btn btn-primary" href="{{ route('export.pdf') }}">Xuất báo cáo</a>
    </div>
@endsection
