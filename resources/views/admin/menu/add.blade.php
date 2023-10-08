@extends('admin.main')

@section('content')

    <body>
        <form method="POST">
            <div class="card-body">

                <div class="form-group">
                    <label for="">Tên Danh Mục</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Kích hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                            checked>
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" data-message="Tạo danh mục thành công!">Tạo danh
                        mục</button>
                </div>
                @csrf
        </form>
    </body>
@endsection
