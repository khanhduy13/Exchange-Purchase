<!doctype html>
<html lang="en">
@include('admin.head')

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="/template/dist/css/login.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .form-control::placeholder {
            color: #c4c0c0
        }
    </style>
</head>

<body>
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('template/bg_1.jpg');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7" style="width: 400px;">
                        <h3 style="margin-bottom: 50px;justify-content: center;align-items: center;display: flex">
                            <strong>ĐĂNG NHẬP</strong>
                        </h3>
                        @include('admin.alert')
                        <form action="login_action" method="post">
                            <div class="form-group first">
                                <label for="username">Email</label>
                                <input type="text" class="form-control" placeholder="Nhập email" id="username"
                                    name="email">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Mật khẩu</label>
                                <input type="password" class="form-control" placeholder="Nhập mật khẩu" id="password"
                                    name="password">
                            </div>

                            <div class="d-flex mb-3 align-items-center">
                                <span class="ml-auto"><a href="/forgotpw" class="forgot-pass">Quên mật khẩu</a></span>
                            </div>

                            <input style="font-size: 20px;font-weight: 600" type="submit" value="ĐĂNG NHẬP"
                                class="btn btn-block btn-primary">
                            <div style="display: flex;justify-content: center;margin-top: 12px">
                                <p style="font-weight: 500; color: rgb(138, 132, 132)">Bạn chưa có tài khoản? </p>
                                <a style="color: blue;text-decoration: none;margin-left: 4px" href="/register">Đăng
                                    kí</a>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@include('admin.footer')

</html>
