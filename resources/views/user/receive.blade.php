@include('user.header')
<link rel="stylesheet" href="/template/dist/css/receive.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<div style="margin-top: 80px; background-color: #ffffff;">
    <div class="mt-5 mb-5" style="background-color: #ffffff;padding: 0px 80px">
        @foreach ($posts as $key => $post)
            <!-- Kiểm tra nếu có send tương ứng -->
            @if ($sends->where('id_baidang', $post->id)->count() > 0)
                <div class="row" style="border-bottom: 1px solid; margin-bottom: 20px; padding-bottom: 20px">
                    <div class="receive_top col-5" style="margin-top: 10px">
                        <div>
                            <h2 class="receive_title">Sản phẩm bạn đăng</h2>
                            <div class="receive_top_content">
                                <img src="{{ $post->Hinhanh }}">
                                <div style="display: flex;flex-direction: column; gap: 6px">
                                    <h4 style="font-size: 18px">Tên sản phẩm: <span>{{ $post->Tendovat }}</span>
                                    </h4>
                                    <h4>Loại danh mục:
                                        <span>{{ $post->danhmuc->name }}</span>
                                    </h4>
                                    <h4>Số lượng còn: <span>{{ $post->Soluongcon }}</span>
                                    </h4>
                                    <h4 style="font-weight: 600">
                                        Giá: <span style="color: #ff1414;">{!! \App\Helpers\Helper::price($post->Gia) !!}đ</span> </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div>thay doi</div> --}}

                    <!-- Vòng lặp lấy các send tương ứng -->
                    <div class="col-7" style="margin-top: 10px">
                        <h2 class="receive_title">Danh sách đồ vật trao đổi</h2>
                        @foreach ($sends->where('id_baidang', $post->id) as $key => $send)
                            <div>
                                <div class="receive_bottom_center">
                                    <img class="img-fluid img-responsive rounded product-image"
                                        src="{{ $send->Hinhanh }}">
                                    <div style="width: 320px">
                                        <h4>Tên đồ vật: <span>{{ $send->Tendovat }}</span></h2>
                                            <h4>Loại danh
                                                mục: <span>{{ $send->danhmuc->name }}</span></h4>
                                            <h4>Số lượng: <span>{{ $send->Soluong }}</span></h4>
                                            <h4>Số lượng muốn
                                                đổi: <span>{{ $send->Slmuondoi }}</span></h4>
                                            <h4 style="font-weight: 600">Giá: <span
                                                    style="color: #ff1414;">{!! \App\Helpers\Helper::price($send->Gia) !!}đ</span>
                                            </h4>
                                            <span>
                                                {!! \App\Helpers\Helper::trangthai1($send->trangthai) !!}
                                            </span>
                                    </div>
                                    <button type="submit">
                                        <a href="/user/accept/{{ $post->id }}-{{ $send->id }}">Trao
                                            đổi</a>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>



@include('user.footer')
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
