@include('user.header')

<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/template/plugins/fontawesome-free/css/all.min.css">
</head>
@include('user.slide')

<body style="background-color: #ffffff">
    {{-- sldebar --}}
    <div class="sidebar">
        <h4 style="font-weight: 600">Danh sách danh mục</h4>
        <div class="col-md-3">
            <!-- Danh sách các mục -->
            <ul id="menuList" style="margin-bottom: 30px;">
                <li data-value="" style="width: 200px;font-size: 16px; font-weight: 600">Tất cả danh mục</li>
                @foreach ($menus as $menu)
                    @if ($menu->name != 'Tiền mặt')
                        <li style="width: 200px;margin-top: 10px; font-size: 16px; font-weight: 600"
                            data-value="{{ $menu->name }}">
                            {{ $menu->name }}
                        </li>
                    @endif
                @endforeach
            </ul>

        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="search">
            <div>
                <!-- Ô input để nhập địa chỉ -->
                <span style="font-size: 16px;font-weight: 600; margin-right: 10px">Nhập địa chỉ:</span>
                <input style="height: 30px; width: 200px" type="text" id="searchInputAddress"
                    placeholder="Tìm kiếm theo địa chỉ">
            </div>
            <div style="margin-left: 100px">
                <!-- Ô input để nhập tên -->
                <span style="font-size: 16px;font-weight: 600; margin-right: 10px">Nhập tên đồ vật:</span>
                <input style="height: 30px; width: 200px" type="text" id="searchInputName"
                    placeholder="Tìm kiếm theo tên">
            </div>
        </div>
        <h2 style="font-size: 18px; font-weight: 600; margin-left: 160px ">Dành cho bạn:</h2>
        <!-- Thông báo khi không có kết quả -->
        <div id="noResultMessage"
            style="display: none; text-align: center; margin-top: 20px; font-size: 24px;font-weight: bold;color: #1e33ee">
            Không có kết quả tìm kiếm phù hợp.
        </div>
        <div class="d-flex justify-content-center row ">
            @foreach ($posts as $key => $post)
                <div class="col-md-9" style="background: none !important; margin-left: 160px">
                    <div class="project_items" onmouseover="showLink(this)" onmouseout="hideLink(this)">
                        <div class="project_items_sub">
                            <div class="image-container ">
                                <img class="img-fluid img-responsive rounded product-image" src="{{ $post->Hinhanh }}">
                            </div>
                            <div class="project_items_center">
                                <h2 class="items_center_title">Tên đồ vật: <span>{{ $post->Tendovat }}</span></h2>
                                <h2 class="items_center_category">
                                    Loại danh mục:
                                    <span>{{ $post->danhmuc->name }}</span>
                                </h2>
                                <h2 class="items_center_quantity">Số lượng còn:<span>{{ $post->Soluongcon }}</span>
                                </h2>
                                <h2 class="items_center_place">Địa chỉ trao đổi: <span>{{ $post->Diachi }}</span>
                                </h2>
                                <div style="display: flex">
                                    <h2 class="items_center_price" style="width: 350px;">Giá:
                                        <span>{!! \App\Helpers\Helper::price($post->Gia) !!}đ</span>
                                    </h2>
                                    <div class="button_details" style="display: none;">
                                        <a href="/user/detailpost/{{ $post->id }}">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    </div>
    <div style="display: flex; justify-content: center; align-items: center;">
        <div class="pagination d-flex justify-content-center">
            {{ $posts->onEachSide(1)->links('pagination::bootstrap-4', ['format' => ':number']) }}
        </div>
    </div>
</body>
<footer>
    <div class="footer-container">
        <div class="footer-content">
            <h3>Thông tin liên lạc</h3>
            <p>48 Cao Thắng, Thanh Bình, Hải Châu, Đà Nẵng</p>
            <p>Email: quangnhattruong990@gmail.com</p>
            <p>Phone: 090-527-1726</p>
        </div>
        <div class="footer-content">
            <h3>Follow Us</h3>
            <ul class="social-media">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2023 Your Website. All rights reserved.</p>
    </div>
</footer>

<script>
    var originalItems = [];
    var container = document.querySelector('.d-flex.justify-content-center.row');
    var noResultMessage = document.getElementById('noResultMessage');

    document.getElementById('searchInputAddress').addEventListener('input', function() {
        var searchValueAddress = this.value.toLowerCase();
        var searchValueName = document.getElementById('searchInputName').value.toLowerCase();

        var filteredItems = originalItems.filter(function(item) {
            var addressElement = item.querySelector('.items_center_place span');
            var address = addressElement.innerText.toLowerCase();

            return address.includes(searchValueAddress);
        });

        updateList(filteredItems);
    });

    document.getElementById('searchInputName').addEventListener('input', function() {
        var searchValueAddress = document.getElementById('searchInputAddress').value.toLowerCase();
        var searchValueName = this.value.toLowerCase();

        var filteredItems = originalItems.filter(function(item) {
            var nameElement = item.querySelector('.items_center_title span');
            var name = nameElement.innerText.toLowerCase();

            return name.includes(searchValueName);
        });

        updateList(filteredItems);
    });

    function updateList(filteredItems) {
        // Xóa hết các phần tử hiện có trong container
        while (container.firstChild) {
            container.removeChild(container.firstChild);
        }

        // Thêm lại các phần tử đã lọc vào container
        var hasVisibleItems = false;

        filteredItems.forEach(function(item) {
            container.appendChild(item);
            hasVisibleItems = true;
        });

        // Hiển thị hoặc ẩn thông báo khi không có kết quả tìm kiếm
        if (hasVisibleItems) {
            noResultMessage.style.display = 'none';
        } else {
            noResultMessage.style.display = 'block';
        }
    }

    window.addEventListener('DOMContentLoaded', function() {
        var allItems = document.getElementsByClassName('project_items');
        for (var i = 0; i < allItems.length; i++) {
            originalItems.push(allItems[i]);
        }
    });
</script>


<script>
    // Lấy danh sách các mục danh mục
    var menuItems = document.querySelectorAll("#menuList li");

    // Gắn sự kiện nhấp chuột cho từng mục danh mục
    menuItems.forEach(function(item) {
        item.addEventListener("click", function() {
            var selectedValue = this.getAttribute("data-value").toLowerCase();

            // Lọc và hiển thị chỉ các bài đăng có danh mục tương ứng
            var allItems = document.getElementsByClassName("project_items");
            for (var i = 0; i < allItems.length; i++) {
                var item = allItems[i];
                var categoryElement = item.querySelector(".items_center_category span");
                var category = categoryElement.innerText.toLowerCase();

                if (selectedValue === "" || category.includes(selectedValue)) {
                    item.style.display = "block"; // Hiển thị bài đăng
                } else {
                    item.style.display = "none"; // Ẩn bài đăng
                }
            }
        });
    });
</script>
<script>
    function showLink(element) {
        var link = element.querySelector(".button_details");
        link.style.display = "block";
    }

    function hideLink(element) {
        var link = element.querySelector(".button_details");
        link.style.display = "none";
    }
</script>
<style>
    .hidden {
        display: none !important;
    }

    .project_items {
        margin-bottom: 2px;
    }

    .project_items_sub {
        display: flex;
        align-items: center;
        margin-bottom: 0px;
    }

    .project_items_center {
        margin-left: 10px;
    }

    .button_details {
        margin-top: 10px;
        margin-left: 110px;
    }

    .image-container {
        overflow: hidden;
        width: 200px;
        /* Điều chỉnh kích thước theo nhu cầu */
        height: 190px;
        margin-top: 8px;
        justify-content: center;
        display: flex;
        align-items: center;
    }

    .image-container img {
        transition: transform 0.3s ease;
    }

    .image-container:hover img {
        transform: scale(1.2);
        /* Điều chỉnh tỉ lệ phóng to theo nhu cầu */
    }

    .search {
        display: flex;
        margin: -89px 0px 0px 122px;
        background-color: #b5dbeb;
        width: 1107px;
        height: 80px;
        justify-content: space-between;
        align-items: center;
        padding: 0px 120px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    footer {
        background-color: #f2f2f2;
        padding: 20px 0;
    }

    .footer-container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        flex-wrap: wrap;
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-content {
        flex: 1 1 300px;
        margin: 10px;
    }

    h3 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    p {
        font-size: 14px;
        line-height: 1.5;
        margin-bottom: 10px;
    }

    .social-media {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .social-media li {
        display: inline-block;
        margin-right: 10px;
    }

    .social-media li:last-child {
        margin-right: 0;
    }

    .social-media a {
        color: #333333;
        font-size: 20px;
    }

    .footer-bottom {
        background-color: #dddddd;
        padding: 10px 0;
        text-align: center;
        font-size: 12px;
        color: #777777;
    }
</style>
@include('user.footer')
