@include('user.header')
<link rel="stylesheet" href="/template/dist/css/profile.css">


<head>
    <title>Trang cá nhân</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    @include('admin.alert')
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-3">
                <div class="text-center">
                    <img src="{{ $detail->Anhdaidien }}" class="avatarProfile img-circle img-thumbnail" alt="avatar">
                </div>
            </div>
            <div class="col-sm-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <form class="form" action="" id="registrationForm">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="first_name" class="label_title">
                                        Tên người dùng
                                    </label>
                                    <label class="label_input" name="tennd" id="email">{{ $user->tennd }}</label>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="last_name" name="Sdt" class="label_title">
                                        Số điện thoại
                                    </label>
                                    <label name="Diachi" class="label_input" id="email">
                                        @if (empty($detail->Sdt))
                                            <span style="color: red">Bạn chưa cập nhật số điện thoại</span>
                                        @else
                                            {{ $detail->Sdt }}
                                        @endif
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email" class="label_title">
                                        Địa chỉ
                                    </label>
                                    <label name="Diachi" class="label_input" id="email">
                                        @if (empty($detail->Diachi))
                                            <span style="color: red"> Bạn chưa cập nhật địa chỉ</span>
                                        @else
                                            {{ $detail->Diachi }}
                                        @endif
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email" class="label_title">
                                        Email
                                    </label>
                                    <label name="email" class="label_input" id="email">{{ $user->email }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">

                                    <a href="/user/editprofile">
                                        <button type="button" class="btn btn-primary btn-block"
                                            style="width: 200px; margin-top: 50px ">Cập nhật</button>
                                    </a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@include('user.footer')
