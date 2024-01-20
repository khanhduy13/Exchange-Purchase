<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
<link rel="stylesheet" href="/template/dist/css/receive.css">
@include('user.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<div class="container" style="margin-top: 80px;">
    <div>
        <div class="receive_top_content">
            <img class="thumbnail" src="{{ $post->Hinhanh }}">
            <div style="display: flex;flex-direction: column; width: 630px">
                <h4 style="font-size: 18px">Tên sản phẩm: <span>{{ $post->Tendovat }}</span>
                </h4>
                <h4>Loại danh mục:<span>{{ $post->danhmuc->name }}</span></h4>
                <h4 id="existingNumber">Số lượng còn: {{ $post->Soluongcon }}</h4>
                <h4>Địa chỉ trao đổi: <span>{{ $post->Diachi }}</span></h4>
                <h4 style="font-weight: 600">
                    Giá: <span style="color: #ff1414;">{!! \App\Helpers\Helper::price($post->Gia) !!}đ</span>
                </h4>
                <h4>Mô tả:</h4><span style=" white-space: pre-line;">{{ $post->Mota }}</span>
            </div>
            <div class="col-md-4" style="border-left: 1px solid black; margin-left: 150px">
                <label style="color: #000000;font-weight:bold;font-size: 26px">Thông tin liên
                    hệ</label>
                <div class="mt-1 mb-1 spec-1">
                    @foreach ($detail as $detail)
                        <h4>Tên người đăng: <span>{{ $post->baidang->tennd }}</span></h4>
                        <h4>Địa chỉ: <span>{{ $detail->Diachi }}</span> </h4>
                        <h4>Số điện thoại: <span>{{ $detail->Sdt }}</span></h4>
                        <h4>Email: <span>{{ $post->baidang->email }}</span></h4>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<form method="POST">
    <div class="container mt-3">
        <div style="display: flex">
            <div class="col-md-3"
                style="background-image: linear-gradient(to right, rgba(55, 129, 240, 0.952), rgb(129, 237, 241));">
                <div class="contact-info">
                    <img src="/template/hands.png" alt="image" style="width: 150px; height:100px ;" />
                    <h2 style="color: #0D1768">Chọn số lượng muốn mua và giá tiền để mua!</h2>
                </div>
            </div>
            <div class="col-md-9">
                @include('admin.alert')
                <div class="contact-form">
                    <div>
                        <input type="hidden" name="id_baidang" value="{{ $post->id }}">
                        <span id="errorSpan" style="display: none; color: red;margin-left: 204px">* Số lượng muốn mua
                            lớn hơn 0 và
                            không được lớn hơn số lượng còn!</span>
                        <div style="display: flex">
                            <label class="title-name">Số lượng muốn mua:</label>
                            <div class="col-sm-9">
                                <input type="number" id="inputNumber1" class="form-control"
                                    placeholder="Nhập số lượng đồ vật bạn muốn nhận" name="Slmuondoi"
                                    style="margin-bottom: 30px" value="{{ old('Soluong') }}">
                            </div>
                        </div>
                        <div style="display: flex">
                            <label class="title-name">Phương Thức Thanh Toán:</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="id_danhmuc"
                                    style="margin-bottom: 30px; height: 34px;">
                                    @foreach ($menus as $menu)
                                        @if ($menu->name == 'Tiền mặt')
                                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div style="display: flex">
                            <label class="title-name">Giá
                                trị:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id=""
                                    placeholder="Nhập giá trị đồ vật" name="Gia" style="margin-bottom: 30px"
                                    value="{{ old('Gia') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default"
                                    style="background-color: #4418e6">Mua</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="{{ $post->baidang->email }}" name="email">
            <input type="hidden" name="Tendovat" value="Tiền mặt">
            <input type="hidden" name="Soluong" value="1">
            <input type="hidden" name="Hinhanh" value="/template/Tien.jpg">
            <input type="hidden" value="{{ $post->baidang->email }}" name="email">
            @csrf
</form>
<script>
    var existingNumber = parseFloat(document.getElementById('existingNumber').innerText.split(':')[1].trim());

    document.getElementById('inputNumber1').addEventListener('input', function() {
        var inputNumber = parseFloat(this.value);
        var errorSpan = document.getElementById('errorSpan');

        if (inputNumber > existingNumber || inputNumber < 1) {
            errorSpan.style.display = 'inline';
        } else {
            errorSpan.style.display = 'none';
        }
    });
</script>
<style>
    .form-control {
        width: 70%;
    }

    .title-name {
        width: 200px !important;
    }
</style>
@include('user.footer')
