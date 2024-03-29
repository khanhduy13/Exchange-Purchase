<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="/template/dist/css/header.css">
<link rel="stylesheet" href="/template/dist/css/sidebar.css">
<link rel="stylesheet" href="/template/dist/css/post.css">
<link rel="stylesheet" href="/template/dist/css/detailpost.css">
@yield('header')

<header style="position: fixed; top: 0px; left: 0px; right: 0px; z-index: 99; height: 80px;background-color: #ffba00">
    <div style=" display: flex; align-items: center; justify-content: space-between; height: 100%; padding: 0px 60px">
        <div>
            <img src="/template/logo.png" style="width: 50px">
        </div>

        <div class="container-ef">
            <div class="text"><span>TRAO ĐỔI - MUA BÁN TRỰC TUYẾN</span></div>
        </div>
        <nav>
            <ul class="nav-list">
                <li>
                    <a href="/user/newfeed">Trang chủ</a>
                    
                </li>
                <li>
                    <a href="#!">Trao đổi</a>
                    <ul class="navbar-dropdown">
                        <li>
                            <a href="/user/receive">Yêu cầu nhận được</a>
                        </li>
                        <li>
                            <a href="/user/postexchanged">Yêu cầu đã gởi</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#!">Bài đăng</a>
                    <ul class="navbar-dropdown">
                        <li>
                            <a href="/user/post">Đăng bài trao đổi</a>
                        </li>
                        <li>
                            <a href="/user/listpost">Xem các bài đã đăng</a>
                        </li>
                    </ul>
                </li>
                <li>
                    @if (Auth::check())
                    <?php $user = Auth::user(); ?>
                    <?php $detail = $user->detail; ?>
                    <a href="#!"> <img src="{{ $detail->Anhdaidien }}" class="avatar img-circle img-thumbnail"
                            alt="avatar" style="width: 35px"></a>
                    @else
                    <a href="#!"><img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                            class="avatar img-circle img-thumbnail" alt="avatar"></a>
                    @endif

                    <ul class="navbar-dropdown">
                        <li>
                            @if (Auth::check())
                            <a href="/user/profile">Trang cá nhân</a>
                            @else
                            <a href="/logout">Đăng nhập</a>
                            @endif
                        </li>
                        <li>
                            @if (Auth::check())
                            <a href="/user/resetpassword/{{ Auth::user()->id }}">Đổi
                                mật khẩu</a>
                            @endif
                        </li>
                        <li>
                            @if (Auth::check())
                            <a href="/logout">Đăng xuất</a>
                            @else
                            <a href="/register">Đăng kí</a>
                            @endif
                        </li>

                    </ul>
                </li>
                <li>
                    @if (Auth::check())
                    <span><a href="/user/profile">{{ Auth::user()->tennd }}</a></span>
                    @endif
                    @if (Auth::check())
                    <span style="margin-left: 22px;font-weight: 600">Số dư:
                        <span id="inputNumber" style="font-weight:500">{!!
                            \App\Helpers\Helper::price(Auth::user()->Sodu) !!}</span><span
                            style="font-weight:500">đ</span></span>
                    @endif
                </li>
            </ul>
        </nav>

    </div>
</header>
<style>
    .container-ef {
        display: flex;
        justify-content: center;
        max-width: 1200px;
        height: 350px;
        margin: 0 auto;
        align-items: center;
    }

    .text {
       
        position: relative;
        font-size: 2em;
        /* background: #fff; */
        color: yellow;
        text-transform: uppercase;
        letter-spacing: .3em;
        font-weight: bold;
        padding: 5px;
    }

    .text span {
        color: yellow;
        mix-blend-mode: difference;
        text-shadow:1px 1px 1px #000000;
    }

    .text:before {
        content: "";
        position: absolute;
        top: 0;
        width: 60px;
        height: 100%;
        background: #000;
        animation: thangcover 4s linear infinite;
    }

    @keyframes thangcover {
        0% {
            left: 0;
        }

        50% {
            left: calc(100% - 60px);
        }

        100% {
            left: 0;
        }
    }
</style>