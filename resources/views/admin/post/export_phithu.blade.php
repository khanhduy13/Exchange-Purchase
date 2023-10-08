<style>
    @font-face {
        font-family: 'DejaVu Sans';
        /* src: url('/fonts/Roboto-ThinItalic.ttf') format('truetype'); */
    }

    body {
        font-family: 'DejaVu Sans', sans-serif;
    }

    table {
        border-collapse: collapse;
        /* Đảm bảo các cell không có khoảng trống giữa chúng */
        width: 100%;
        /* Đặt chiều rộng cho table */
    }

    th,
    td {
        border: 1px solid black;
        /* Tạo border cho các cell */
        padding: 8px;
        /* Tạo khoảng cách giữa border và nội dung trong cell */
        text-align: left;
        /* Canh trái nội dung trong cell */
    }
</style>

<body>
    <h2 style="fontweight: bold; margin-left: 40px">Bảng thống kê tổng số phí thu của bài đăng</h2>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Tên đồ vật</th>
                <th style="width: 90px">Số lượng</th>
                <th>Giá</th>
                <th>Phí thu</th>
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
                    <td>{!! \App\Helpers\Helper::price($post->Phithu) !!}đ</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin:10px 0 0 400px; font-size: 20px;font-weight: bold;">
        <p>Tổng số phí thu: {!! \App\Helpers\Helper::price($totalPhithu) !!}đ</p>
    </div>
</body>
