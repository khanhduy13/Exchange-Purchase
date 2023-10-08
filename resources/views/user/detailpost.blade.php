<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@include('user.header')
<link rel="stylesheet" href="/template/dist/css/profile.css">
<link rel="stylesheet" href="/template/dist/css/receive.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <style>
        .thumbnail {
            border-radius: 5%;
            transition: transform 0.3s;
            object-fit: contain !important;
            /* Thời gian hoạt động của transition */
        }

        .thumbnail:hover {
            transform: scale(1.2);
            /* Scale ảnh lên 1.2 lần khi hover */
        }
    </style>
</head>
<div style="display: flex; margin-top:150px;justify-content: center">
    <div style="width: 1200px;">
        <div class="receive_top_content">
            <img class="thumbnail" src="{{ $post->Hinhanh }}">
            <div style="display: flex;flex-direction: column; width: 630px">
                <h4 style="font-size: 18px">Tên sản phẩm: <span>{{ $post->Tendovat }}</span>
                </h4>
                <h4>Loại danh mục:<span>{{ $post->danhmuc->name }}</span></h4>
                <h4>Số lượng còn: <span id="slmuondoi"
                        style="color: #ff1414;font-weight: 600">{{ $post->Soluongcon }}</span></h4>
                <h4>Địa chỉ trao đổi: <span>{{ $post->Diachi }}</span></h4>
                <h4 style="font-weight: 600">
                    Giá: <span style="color: #ff1414;">{!! \App\Helpers\Helper::price($post->Gia) !!}đ</span>
                </h4>
                <h4>Mô tả:</h4><span style=" white-space: pre-line;">{{ $post->Mota }}</span>
                <div style="margin-left: 200px">
                    <button class="btn btn-primary btn-rounded"><a style="color: #e7e6e7;"
                            href="/user/buypost/{{ $post->id }} ">Mua
                            ngay</a></button>
                    <button class="btn btn-primary btn-rounded"><a style="color: #e7e6e7"
                            href="/user/exchangepost/{{ $post->id }} ">Trao đổi</a></button>
                </div>
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

@include('user.footer')
