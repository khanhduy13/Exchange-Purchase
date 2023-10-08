@include('user.header')
<link rel="stylesheet" href="/template/dist/css/listpost.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<div style="margin-top: 80px; background-color: #ffffff;">
    <div class="container mt-5 mb-5" style="background-color: #ffffff;">
        <div class=" justify-content-center row">
            @if (count($posts) > 0)
                <div class="col-md-10" style="margin-top: 10px">
                    <h2 class="receive_title">Danh sách các bài đăng của bạn</h2>
                    @foreach ($posts as $key => $post)
                        <div class="row p-2 bg-white rounded">
                            <div class="receive_top_content">
                                <img src="{{ $post->Hinhanh }}">
                                <div style="display: flex;flex-direction: column; gap: 2px; width: 430px">
                                    <h4 style="font-size: 18px">Tên sản phẩm: <span>{{ $post->Tendovat }}</span>
                                    </h4>
                                    <h4>Loại danh mục:<span>{{ $post->danhmuc->name }}</span></h4>
                                    <h4>Số lượng: <span>{{ $post->Soluong }}</span></h4>
                                    <h4>Số lượng còn: <span>{{ $post->Soluongcon }}</span></h4>
                                    <h4 style="font-weight: 600">
                                        Giá: <span style="color: #ff1414;">{!! \App\Helpers\Helper::price($post->Gia) !!}đ</span> </h4>
                                </div>
                                <div class="align-items-center align-content-center col-md-2 mt-1"
                                    style="display: flex;justify-content: center; align-items: center">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="mt-1 mb-1 spec-1">
                                            <span style="font-size: 35px">
                                                {!! \App\Helpers\Helper::trangthai($post->trangthai) !!}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="note">
                        <p class="text_note">Danh sách các bài đã đăng:</p>
                        <div style="display: flex; justify-content: center;align-items: center; height: 150px;">
                            <p style="font-size: 30px;color: #4e3ddf;">Bạn chưa đăng gì cả. Hãy chia sẻ với mọi người
                                ngay
                                nào! </p>
                        </div>
                    </div>
            @endif
        </div>
    </div>
</div>
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
