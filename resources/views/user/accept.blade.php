@include('user.header')
<link rel="stylesheet" href="/template/dist/css/listpost.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<form method="POST">
    <div style="margin-top: 80px; background-color: #ffffff;">
        <div class="container mt-5 mb-5" style="background-color: #ffffff;">
            <div class=" justify-content-center row">
                <div class="col-md-10" style="margin-top: 10px">
                    <h2 class="receive_title">Bài đăng của bạn</h2>
                    <div class="row p-2 bg-white rounded">
                        <div class="receive_top_content">
                            <img src="{{ $post->Hinhanh }}">
                            <div style="display: flex;flex-direction: column; gap: 2px; width: 430px">
                                <h4 style="font-size: 18px">Tên sản phẩm: <span>{{ $post->Tendovat }}</span>
                                </h4>
                                <h4>Loại danh mục:<span>{{ $post->danhmuc->name }}</span></h4>
                                <h4>Số lượng: <span>{{ $post->Soluong }}</span></h4>
                                <h4>Số lượng còn: <span id="soluongcon"
                                        style="color: #ff1414;font-weight: 600">{{ $post->Soluongcon }}</span></h4>
                                <h4 style="font-weight: 600">
                                    Giá: <span style="color: #ff1414;">{!! \App\Helpers\Helper::price($post->Gia) !!}đ</span> </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div div class="col-md-10" style="margin-top: 10px">
                    <h2 class="receive_title">Bài đăng muốn trao đổi</h2>
                    <div class="row p-2 bg-white rounded ">
                        <div class="receive_top_content">
                            <img src="{{ $exchange->Hinhanh }}">
                            <div style="display: flex;flex-direction: column; gap: 2px; width: 430px">
                                <h4 style="font-size: 18px">Tên sản phẩm: <span>{{ $exchange->Tendovat }}</span>
                                </h4>
                                <h4>Loại danh mục:<span>{{ $exchange->danhmuc->name }}</span></h4>
                                <h4>Số lượng: <span
                                        style="color: #ff1414;font-weight: 600">{{ $exchange->Soluong }}</span>
                                </h4>
                                <h4>Số lượng muốn đổi: <span id="slmuondoi"
                                        style="color: #ff1414;font-weight: 600">{{ $exchange->Slmuondoi }}</span></h4>
                                <h4>Địa chỉ trao đổi: <span>{{ $exchange->Diachi }}</span></h4>
                                <h4 style="font-weight: 600">
                                    Giá: <span style="color: #ff1414;">{!! \App\Helpers\Helper::price($exchange->Gia) !!}đ</span>
                                </h4>
                                <h4>Mô tả:<span>{{ $exchange->Mota }}</span></h4>
                            </div>
                            <div class="col-md-4" style="border-left: 1px solid black;">
                                <label style="color: #000000;font-weight:bold;font-size: 26px">Thông tin liên
                                    hệ</label>
                                <div class="mt-1 mb-1 spec-1">
                                    @foreach ($email as $email)
                                        <h4>Tên: <span>{{ $email->tennd }}</span></h4>
                                        <h4>Email: <span>{{ $email->email }}</span> </h4>
                                    @endforeach
                                    @foreach ($detail_user as $detail_user)
                                        <h4>Địa chỉ: <span>{{ $detail_user->Diachi }}</span></h4>
                                        <h4>Số điện thoại: <span>{{ $detail_user->Sdt }}</span></h4>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="justify-content: center;align-items: center;display: flex;">
                <div class="form-group" style="margin-top: 50px">
                    <label>Chọn thao tác</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" name="trangthai" value="1" id="admin"
                            {{ $post->trangthai == 1 }}>
                        <label for="admin">Chấp nhận</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" name="trangthai" value="2" id="khachhang"
                            {{ $post->trangthai == 2 }}>
                        <label for="khachhang">Từ chối</label>
                    </div>
                    <div class="row">
                        <div>
                            <span id="thongbao" style="color: red; font-weight: 600; display: none;">Số lượng còn nhỏ
                                hơn số lượng muốn đổi.</span>
                            <button id="thuchien" type="submit" class="btn btn-primary btn-block">THỰC HIỆN</button>
                        </div>
                    </div>
                </div>
            </div>
            <input id="resultInput" type="hidden" name="Soluongcon">
        </div>
    </div>
    @csrf
</form>
<script>
    var firstNumber = {{ $post->Soluongcon }};
    var secondNumber = {{ $exchange->Slmuondoi }};
    var result = 0;

    function calculateResult() {
        var radioValue = document.querySelector('input[name="trangthai"]:checked').value;

        if (radioValue === '1') {
            result = firstNumber - secondNumber;
        } else if (radioValue === '2') {
            result = firstNumber;
        }

        var input = document.getElementById('resultInput');
        input.value = result;
    }

    // Gọi hàm calculateResult khi radio button thay đổi
    var radioButtons = document.querySelectorAll('input[name="trangthai"]');
    radioButtons.forEach(function(radioButton) {
        radioButton.addEventListener('change', calculateResult);
    });
</script>
<script>
    var soluongcon = parseInt(document.getElementById('soluongcon').innerText);
    var slmuondoi = parseInt(document.getElementById('slmuondoi').innerText);
    var thuchienButton = document.getElementById('thuchien');
    var thongbaoSpan = document.getElementById('thongbao');

    if (soluongcon < slmuondoi) {
        thuchienButton.disabled = true;
        thongbaoSpan.style.display = 'inline';
    }
</script>


@include('user/footer')
