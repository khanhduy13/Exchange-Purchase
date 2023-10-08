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
    <title>{{ $title }}</title>

</head>
<style>
    .form-control::placeholder {
        color: #c4c0c0
    }
</style>

<body>
    <div style="background-color: #ffffff;">
        <div class="container d-lg-flex half">
            <div class="contents order-2 order-md-1"
                style="    background-color: white;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7" style="width: 400px;">

                            <h3 style="margin-bottom: 50px;justify-content: center;align-items: center;display: flex">
                                <strong>ĐỔI MẬT KHẨU</strong>
                            </h3>
                            @include('admin.alert')
                            <form method="post">
                                <div class="form-group first">
                                    <label for="username">Mật khẩu hiện tại</label>
                                    <input style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;" type="password"
                                        class="form-control" placeholder="Nhập mật khẩu hiện tại" id="username"
                                        name="current_password">
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">Mật khẩu mới</label>
                                    <input style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;" type="password"
                                        class="form-control" placeholder="Nhập mật khẩu mới" id="password"
                                        name="new_password">
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">Xác nhận lại mật khẩu</label>
                                    <input style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;" type="password"
                                        class="form-control" placeholder="Xác nhận lại mật khẩu" id="password"
                                        name="confirm_password">
                                </div>

                                <input style="font-size: 20px;font-weight: 600;margin-top: 10px" type="submit"
                                    value="ĐỔI MẬT KHẨU" class="btn btn-block btn-primary">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@include('admin.footer')

</html>
