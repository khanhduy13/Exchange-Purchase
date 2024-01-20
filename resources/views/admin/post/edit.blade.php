@extends('admin.main')

@section('content')
    <form method="POST">
        <div class="card-body ">

            <label for="menu">Tên người dùng</label>
            <div class="input-group mb-3">
                <label name="tennd" class="form-control" placeholder="Full name">{{ $post->baidang->tennd }}</label>
            </div>
            <label for="menu">Tên đồ vật</label>
            <div class="input-group mb-3">
                <label name="Tendovat" class="form-control" placeholder="Full name">{{ $post->Tendovat }}</label>
            </div>
            <label for="menu">Danh mục</label>
            <div class="input-group mb-3">
                <label name="name" class="form-control" placeholder="Full name">{{ $post->danhmuc->name }}</label>
            </div>
            <label for="menu">Giá</label>
            <div class="input-group mb-3">
                <label name="Gia" class="form-control" placeholder="Full name">{!! \App\Helpers\Helper::price($post->Gia) !!}đ</label>
            </div>
            <label for="menu">Mô tả</label>
            <div class="input-group mb-3">
                <label name="Mota" class="form-control" placeholder="Full name">{{ $post->Mota }}</label>
            </div>
            <label for="menu">Hình ảnh</label>
            <div class="input-group mb-3">
                <img name="Hinhanh" style="height: 280px; max-width: 420px !important; object-fit: fill"
                    class="form-control" placeholder="Full name" src="{{ $post->Hinhanh }} ">
            </div>
            <label for="menu">Lý do từ chối</label>
            <div class="input-group mb-3">
                <input name="ghichu" class="form-control" value="{{ $post->ghichu }}" />
            </div>
            <div class="form-group" style="margin-top: 50px">
                <label>Chọn thao tác</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="admin" name="trangthai" value="1"
                        {{ $post->trangthai == 1 ? 'checked=""' : '' }}>
                    <label class="custom-control-label" for="admin">DUYỆT BÀI ĐĂNG</label>
                </div>

                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="khachhang" name="trangthai" value="2"
                        {{ $post->trangthai == 2 ? 'checked=""' : '' }}>
                    <label class="custom-control-label" for="khachhang">TỪ CHỐI DUYỆT BÀI ĐĂNG</label>
                </div>
                @foreach ($email as $email)
                    <input type="hidden" name="email" value="{{ $email->email }}">
                @endforeach

            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-4">
                    <button style="margin-top: 50px" type="submit" class="btn btn-primary btn-block">THỰC HIỆN</button>
                </div>
                <!-- /.col -->
            </div>
            @csrf


    </form>
@endsection
