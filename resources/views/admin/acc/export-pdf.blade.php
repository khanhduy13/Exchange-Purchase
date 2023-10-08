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
    <h2 style="fontweight: bold; margin-left: 90px">Bảng thống kê người dùng và tiền nạp</h2>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th style="width: 200px;">Tên Người Dùng</th>
                <th style="width: 300px;">Email</th>
                <th>Đã nạp</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalSodu = 0; // Biến lưu tổng Sodu
            
            foreach ($posts as $key => $post) {
                $totalSodu += $post->Danap; // Cộng dồn giá trị Sodu
            }
            ?>
            @foreach ($posts as $key => $post)
                @php
                    $stt = $key + 1;
                @endphp
                <tr>
                    <td style="text-align: center;">{{ $stt }}</td>
                    <td>{{ $post->tennd }}</td>
                    <td>{{ $post->email }}</td>
                    <td>{!! \App\Helpers\Helper::price($post->Danap) !!}đ</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin:10px 0 0 430px; font-size: 20px;font-weight: bold;">
        Tổng cộng: {!! \App\Helpers\Helper::price($totalSodu) !!}đ</div>
</body>
