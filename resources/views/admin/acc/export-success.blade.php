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

    .centered-cell {
        text-align: center;
        vertical-align: middle;
    }
</style>

<h2 style="fontweight: bold; margin-left: 60px">Bảng thống kê những bài trao đổi thành công</h2>
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">STT</th>
            <th>Tên đồ vật</th>
            <th>Số lượng</th>
            <th>Giá/vật</th>
            <th>Số lượng muốn đổi</th>
            <th>Đồ vật được trao đổi</th>
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
                <td class="centered-cell">{{ $postexchange->Tendovat }}</td>
                <td class="centered-cell">{{ $postexchange->Soluong }}</td class="centered-cell">
                <td class="centered-cell">{!! \App\Helpers\Helper::price($postexchange->Gia) !!}đ</td class="centered-cell">
                <td class="centered-cell">{{ $postexchange->Slmuondoi }}</td class="centered-cell">
                <td>{{ $post->Tendovat }}</td class="centered-cell">
                <td class="centered-cell">{!! \App\Helpers\Helper::price($post->Gia) !!}đ</td class="centered-cell">
                <td class="centered-cell" style="width: 70px;">{!! \App\Helpers\Helper::trangthai2($post->trangthai) !!}</td>
            </tr>
        @endforeach
    </tbody>
</table>
