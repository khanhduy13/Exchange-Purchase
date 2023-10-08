@include('user.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<div style="margin-top: 80px; background-color: #ffffff;">
    <div class="container mt-5 mb-5" style="background-color: #ffffff;">
        <!-- Hiển thị danh sách trống -->
        <div class="note">
            <p class="text_note">Danh sách yêu cầu trao đổi:</p>
            <div style="display: flex; justify-content: center;align-items: center; height: 150px;">
                <p style="font-size: 30px;color: #4e3ddf;">Bạn chưa nhận được yêu cầu trao đổi nào!</p>
            </div>
        </div>
    </div>
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
