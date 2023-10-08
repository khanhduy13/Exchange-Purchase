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
    <title>Login #2</title>
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
                            <strong>LẤY LẠI MẬT KHẨU</strong>
                        </h3>
                        @include('admin.alert')
                        <form action="forgotpw_action" method="post">
                            <div class="form-group first">
                                <label for="username">Nhập địa chỉ Email của bạn</label>
                                <input type="text" class="form-control" placeholder="Nhập email" id="username"
                                    name="email">
                            </div>


                            <input style="font-size: 20px;font-weight: 600; margin-top: 20px" type="submit"
                                value="LẤY LẠI MẬT KHẨU" class="btn btn-block btn-primary">

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
