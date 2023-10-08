@extends('admin.main')
@section('content')

    <body>
        <form method="POST">
            <div class="card-body ">
                <div class="input-group mb-3">
                    <input type="text" name="tennd" class="form-control" placeholder="Full name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email"class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation"class="form-control" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Vai trò</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="admin" name="role_id" value="1">
                        <label class="custom-control-label" for="admin">Admin</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="khachhang" name="role_id" value="2"
                            checked>
                        <label class="custom-control-label" for="khachhang">Người Dùng</label>
                    </div>

                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Thêm tài khoản</button>
                    </div>
                    <!-- /.col -->
                </div>
                @csrf
        </form>
    </body>
@endsection
