@extends('admin.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row" style="margin-top: 20px;margin-bottom: 50px">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h5>Tổng số người dùng: {{ $totalUser }}</h5>
                            <a style="color: black;font-weight: bold" href="/admin/accs/list">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5>Số bài Đã duyệt: {{ $totalPosts1 }}</h5>
                            <a style="color: black;font-weight: bold" href="/admin/posts/daduyet">Xem chi tiết</a>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h5>Số bài Chưa duyệt: {{ $totalPosts0 }}</h5>
                            <a style="color: black;font-weight: bold" href="/admin/posts/chuaduyet">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h5>Số bài Bị khóa: {{ $totalPosts2 }}</h5>
                            <a style="color: black;font-weight: bold" href="/admin/posts/bikhoa">Xem chi tiết</a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th style="width: 50px">STT</th>
                <th>Tên Người Dùng</th>
                <th style="text-align: center;">Tổng Phí Thu</th>
            </tr>
        </thead>
        <tbody>
            @php
                $stt = 1;
                $userTotalFees = [];
            @endphp

            @foreach ($sortedPosts as $key => $post)
                @php
                    // Kiểm tra xem người dùng đã xuất hiện chưa
                    if (!isset($userTotalFees[$post->baidang->tennd])) {
                        $userTotalFees[$post->baidang->tennd] = 0;
                    }

                    // Cộng phí thu vào tổng phí thu của người dùng
                    $userTotalFees[$post->baidang->tennd] += $post->Phithu;
                @endphp
            @endforeach

            {{-- Hiển thị thông tin người dùng và tổng phí thu --}}
            @foreach ($userTotalFees as $userName => $totalFee)
                <tr>
                    <td>{{ $stt++ }}</td>
                    <td><strong>{{ $userName }}</strong></td> 
                    <td style="text-align: center;"><strong>{!! \App\Helpers\Helper::price($totalFee) !!}đ</strong></td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>





    </section>
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
        @endif
        @php
            $currentMonth = $month;
            $currentYear = $year;
        @endphp
    @endforeach
    <div style="display: flex;justify-content:center;margin-bottom: 10px ">
        <h2 style="font-weight: bold">Biểu đồ thống kê bài đăng theo danh mục</h2>
    </div>
    <div>
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Tạo một mảng để lưu trữ dữ liệu posts
        var postsData = [
            @foreach ($sortedPosts as $key => $post)
                {
                    category: "{{ $post->danhmuc->name }}",
                    month: "{{ $post->created_at->format('m') }}",
                    year: "{{ $post->created_at->format('Y') }}"
                },
            @endforeach
        ];

        // Tạo một đối tượng để lưu trữ số lượng posts theo từng danh mục và thời gian
        var data = {};

        // Nhóm dữ liệu posts theo tháng và năm
        var groupedPosts = postsData.reduce(function(acc, post) {
            var key = post.year + '-' + post.month;
            if (!acc[key]) {
                acc[key] = {};
            }
            if (!acc[key][post.category]) {
                acc[key][post.category] = 0;
            }
            acc[key][post.category]++;
            return acc;
        }, {});

        // Chuẩn bị dữ liệu cho biểu đồ
        // Chuẩn bị dữ liệu cho biểu đồ
        var labels = Object.keys(groupedPosts); // Nhãn trục x
        var datasets = [];

        var categories = []; // Mảng lưu trữ các danh mục

        for (var key in groupedPosts) {
            for (var category in groupedPosts[key]) {
                if (!categories.includes(category)) {
                    categories.push(category);
                }
            }
        }

        for (var i = 0; i < categories.length; i++) {
            var category = categories[i];
            var dataset = {
                label: category,
                data: [],
                backgroundColor: getRandomColor()
            };

            for (var j = 0; j < labels.length; j++) {
                var count = groupedPosts[labels[j]][category] || 0;
                dataset.data.push(count);
            }

            datasets.push(dataset);
        }


        // Hàm tạo màu ngẫu nhiên
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Tạo biểu đồ bằng Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: datasets
            },
            options: {
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        ticks: {
                            precision: 0,
                            beginAtZero: true
                        },
                        stacked: true
                    }
                }
            }
        });
    </script>
@endsection
