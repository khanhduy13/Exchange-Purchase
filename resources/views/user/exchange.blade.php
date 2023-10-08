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
<div class="container" style="margin-top: 80px">
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
                    <h2 style="color: #0D1768">Chọn đồ vật bạn muốn dùng để trao đổi!</h2>
                </div>
            </div>
            <div class="col-md-9">
                @include('admin.alert')
                <div class="contact-form">
                    <div>
                        <input type="hidden" name="id_baidang" value="{{ $post->id }}">
                        <span id="errorSpan" style="display: none; color: red;margin-left: 204px">* Số lượng muốn đổi
                            lớn hơn 0 và
                            không được lớn hơn số lượng còn!</span>
                        <div style="display: flex">
                            <label class="title-name">Số lượng muốn đổi:</label>
                            <div class="col-sm-9">
                                <input type="number" id="inputNumber1" class="form-control"
                                    placeholder="Nhập số lượng đồ vật bạn muốn nhận" name="Slmuondoi"
                                    style="margin-bottom: 30px" value="{{ old('Soluong') }}">
                            </div>
                        </div>
                        <div style="display: flex">
                            <label class="title-name">Tên đồ vật:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" placeholder="Nhập tên đồ vật"
                                    name="Tendovat" style="margin-bottom: 30px" value="{{ old('Tendovat') }}">
                            </div>
                        </div>
                        <div style="display: flex">
                            <label class="title-name">Số lượng dùng để đổi:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control"
                                    placeholder="Nhập số lượng đồ vật bạn dùng để trao đổi" name="Soluong"
                                    style="margin-bottom: 30px" value="{{ old('Soluong') }}">
                            </div>
                        </div>
                        <div style="display: flex">
                            <label class="title-name">Danh mục:</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="id_danhmuc"
                                    style="margin-bottom: 30px; height: 34px;">
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}">
                                            {{ $menu->name }}</option>
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
                        <div style="display: flex">
                            <label class="title-name">Địa chỉ:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="" placeholder="Nhập địa chỉ"
                                    name="Diachi" style="margin-bottom: 30px" value="{{ old('Diachi') }}">
                            </div>
                        </div>
                        <div style="display: flex">
                            <label class="title-name">Mô tả:</label>
                            <div class="col-sm-9">
                                <textarea name="Mota" class="form-control" rows="5" id="comment" style="margin-bottom: 30px"> {{ old('Mota') }}</textarea>
                            </div>
                        </div>
                        <div style="display: flex">
                            <label class="title-name">Hình ảnh:</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="upload2"
                                    style="margin-bottom: 30px; " />
                                <input type="hidden" name="Hinhanh" value="" id="hinhanh01">
                                <div id="hinhanh_show" style="margin-bottom: 30px">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default" style="background-color: #0ee607">Đăng
                                    bài</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
