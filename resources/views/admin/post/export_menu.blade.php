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

<h2 style="fontweight: bold; margin-left: 60px">Bảng thống kê bài đăng theo danh mục</h2>
<table class="table">
    <thead>
        <tr>
            <th td class="centered-cell" style="width: 300px">Tên Danh Mục</th>
            <th class="centered-cell" style="width: 200px">Tổng số bài đăng</th>
        </tr>
    </thead>
    <tbody>
        @php
            $currentCategory = null;
            $categoryCount = 0;
            $totalPosts = 0;
        @endphp

        @foreach ($posts as $key => $post)
            @php
                $category = $post->danhmuc->name;
            @endphp

            @if ($currentCategory != $category)
                @php
                    if ($currentCategory != null) {
                        // Hiển thị tổng số bài đăng cho danh mục trước đó
                        echo '<tr>';
                        echo '<td style="padding-left: 50px">' . $currentCategory . '</td>';
                        echo '<td class="centered-cell">' . $categoryCount . '</td>';
                        echo '</tr>';
                        $totalPosts += $categoryCount;
                    }
                    
                    $currentCategory = $category;
                    $categoryCount = 0;
                @endphp
            @endif

            @php
                $categoryCount++;
            @endphp

            @if ($key == $posts->count() - 1)
                @php
                    // Hiển thị tổng số bài đăng cho danh mục cuối cùng
                    echo '<tr>';
                    echo '<td style="padding-left: 50px">' . $currentCategory . '</td>';
                    echo '<td class="centered-cell">' . $categoryCount . '</td>';
                    echo '</tr>';
                    $totalPosts += $categoryCount;
                @endphp
            @endif
        @endforeach
        <tr>
            <td style="font-weight: bold;padding-left: 50px">Tổng số bài đăng</td>
            <td class="centered-cell" style="font-weight: bold">{{ $totalPosts }}</td>
        </tr>

    </tbody>
</table>
<style>
    .centered-cell {
        text-align: center;
        vertical-align: middle;
    }
</style>
