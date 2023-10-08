@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 300px; padding-left: 200px">Tên Danh Mục</th>
                <th class="centered-cell" style="width: 200px">Tổng số bài đăng</th>
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
                @php
                    $currentMonth = $month;
                    $currentYear = $year;
                @endphp
            @endforeach
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
                            echo '<td style="padding-left: 200px">' . $currentCategory . '</td>';
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
                        echo '<td style="padding-left: 200px">' . $currentCategory . '</td>';
                        echo '<td class="centered-cell">' . $categoryCount . '</td>';
                        echo '</tr>';
                        $totalPosts += $categoryCount;
                    @endphp
                @endif
            @endforeach
            <tr>
                <td style="font-weight: bold;padding-left: 200px">Tổng số bài đăng</td>
                <td class="centered-cell" style="font-weight: bold">{{ $totalPosts }}</td>
            </tr>

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
