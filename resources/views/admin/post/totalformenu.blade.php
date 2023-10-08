@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 300px; padding-left: 50px">Tên Danh Mục</th>
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
    <div class="text-right mb-4 mt-2" style="padding-right: 40px">
        <a class="btn btn-primary" href="{{ route('export.pdf2') }}">Xuất báo cáo</a>
    </div>
@endsection
<style>
    .centered-cell {
        text-align: center;
        vertical-align: middle;
    }
</style>
