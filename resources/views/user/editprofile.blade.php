@include('user.header')
<link rel="stylesheet" href="/template/dist/css/profile.css">


<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>


<body>
    <div class="container bootstrap snippet">
        <form class="form" action="" method="post" id="registrationForm">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-outline mb-4">
                        <div class="text-center" id="hinhanh_show">
                            <img src="{{ $detail->Anhdaidien }}"
                                class="avatarProfile img-circle img-thumbnail avatarEditImage">
                        </div>

                        <label class="label_change_image" for="upload"> Thay đổi</label>
                        <input type="file" name="Anhdaidien" class="form-control" id="upload"
                            style="display: none
                        " />
                        <input type="hidden" name="hinhanh" value="{{ $detail->Anhdaidien }}" id="hinhanh01">
                    </div>
                </div>
                <!--/col-3-->
                <div class="col-sm-9">

                    <div class="tab-content">
                        <div class="tab-pane active" id="home">

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name" class="label_title">
                                        Tên người dùng
                                    </label>
                                    <input type="text" class="label_input" name="tennd" id="first_name"
                                        placeholder="Tên người dùng" title="Nhập tên người dùng của bạn"
                                        value="{{ $user->tennd }}">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="last_name" class="label_title">
                                        Số điện thoại
                                    </label>
                                    <input type="text" class="label_input" name="Sdt" id="last_name"
                                        placeholder="Số điện thoại" title="Số điện thoại" value="{{ $detail->Sdt }}">
                                </div>
                            </div>


                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="last_name" class="label_title">
                                        Địa chỉ
                                    </label>
                                    <input type="text" class="label_input" name="Diachi" id="last_name"
                                        placeholder="Địa chỉ" title="Địa chỉ" value="{{ $detail->Diachi }}">
                                </div>
                            </div>


                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email" class="label_title">
                                    Email
                                </label>
                                <label class="label_input" name="email" id="email">{{ $user->email }}</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit" data-toggle="modal"
                                    data-target="#myModal" data-message="Cập nhật trang cá nhân thành công!"><i
                                        class="glyphicon glyphicon-ok-sign"></i>Lưu</button>
                            </div>
                        </div>
                        @csrf



                    </div>
                    <!--/tab-pane-->
                </div>
                <!--/col-9-->
        </form>

    </div>
    <!--/row-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Thông báo</h4>
                </div>
                <div class="modal-body">
                    <p style="display: flex;justify-content: center;align-items: center" id="modal-message"></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#myModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var message = button.data('message'); // Extract info from data-* attributes
                var modal = $(this);
                modal.find('.modal-body #modal-message').text(message);
            });
        });
    </script>
    <style>
        #modal-message {
            font-family: Arial, sans-serif;
            font-size: 25px;
            font-weight: bold;
            color: rgb(32, 226, 15);
        }
    </style>
</body>
@include('user.footer')
