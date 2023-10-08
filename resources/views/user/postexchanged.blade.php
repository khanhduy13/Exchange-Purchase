@include('user.header')
<link rel="stylesheet" href="/template/dist/css/listexchange.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>

<body style="margin-top: 80px">
    <div class="container mt-5 mb-5" style="background-color: #ffffff; margin-bottom: 50px ">
        @if (count($posts) > 0)
            @foreach ($posts as $key => $post)
                <div class="postexchange">
                    <div class="postexchange_container">
                        <div class="postexchange_container_top">
                            <img src=" {{ $post->traodoi->Hinhanh }}">
                            <div class="container_top-center">
                                <label>{{ $post->traodoi->Tendovat }}</label>
                                <div><span>
                                        <label style="display: inline;">Loại danh mục:
                                            {{ $post->danhmuc->name }}</label>
                                    </span></div>
                                <div>
                                    <label style=" margin-top: 2px; margin-bottom: -2px">
                                        <label style="display: inline;">Giá:
                                            {!! \App\Helpers\Helper::price($post->traodoi->Gia) !!}đ </label>
                                </div>
                                <div>
                                    <label style=" margin-top: 2px; margin-bottom: -2px">
                                        <label style="display: inline;">Số lượng còn:
                                            {{ $post->traodoi->Soluongcon }}</label>
                                    </label>
                                </div>
                                <div>
                                    <label style="display: inline;">Ghi chú: {{ $post->traodoi->Mota }}
                                    </label>
                                </div>
                            </div>
                            <div class="container_top-bottom">
                                @foreach ($users as $key => $user)
                                    @if ($user->id === $post->traodoi->id_user)
                                        <h3>Thông tin liên hệ</h3>
                                        <label style="margin-top: 2px; margin-bottom: -2px">
                                            <label style="display: inline;">Tên: {{ $user->tennd }}</label>
                                        </label>
                                        <label style=" margin-top: 2px; margin-bottom: -2px">
                                            <label style="display: inline;">Email: {{ $user->email }}</label>
                                        </label>
                                        @foreach ($detailusers as $key => $detailuser)
                                            @if ($detailuser->id_user === $user->id)
                                                <label style=" margin-top: 2px; margin-bottom: -2px">
                                                    <label style="display: inline;">Địa
                                                        chỉ:{{ $detailuser->Diachi }}</label>
                                                </label>
                                                <label style=" margin-top: 2px; margin-bottom: -2px">
                                                    <label style="display: inline;">Số điện
                                                        thoại:{{ $detailuser->Sdt }}</label>
                                                </label>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                            </div>
                        </div>
                        <div class="postexchange_container_bottom">
                            <img class="img-fluid img-responsive rounded product-image" src=" {{ $post->Hinhanh }}">
                            <div>
                                <h5>{{ $post->Tendovat }}</h5>
                                <h5>Loại danh mục:
                                    <span>{{ $post->danhmuc->name }}</span>
                                </h5>
                                <h5>Giá: <span>{!! \App\Helpers\Helper::price($post->Gia) !!}đ</span></h5>
                                <h5>Số
                                    lượng:<span>{{ $post->Soluong }}</span></h5>
                                <h5>Số lượng muốn đổi:<span>
                                        {{ $post->Slmuondoi }}</span>
                                </h5>
                                <div>
                                    {!! \App\Helpers\Helper::trangthai1($post->trangthai) !!}
                                </div>
                            </div>

                        </div>
                    </div>
            @endforeach
        @else
            <div class="note">
                <p class="text_note">Danh sách các yêu cầu đã gởi:</p>
                <div style="display: flex; justify-content: center;align-items: center; height: 150px;">
                    <p style="font-size: 30px;color: #4e3ddf;">Bạn chưa gởi yêu cầu nào cả. Hãy chọn đồ vật bạn muốn và
                        trao đổi với mọi người!</p>
                </div>
            </div>
        @endif
    </div>
    </div>
</body>
<style>
    .note {
        background-color: #ffffff;
        width: 1200px;
        height: 250px;
        border-radius: 8px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 5px 8px;
        margin-top: 30px;
    }

    .text_note {
        margin-top: 30px;
        font-size: 20px;
        font-weight: 600;
        margin-left: 30px;
    }
</style>
@include('user/footer')
