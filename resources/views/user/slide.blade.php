@yield('slide')
<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" style="margin: 0px 10px"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" style="margin-top: 80px">
        <div class="carousel-item active">
            <img height="600px"
                src="https://ispvietnam.com.vn/wp-content/uploads/2021/06/bao-tri-thiet-bi-gia-dinh-tron-goi-1-1.jpg"
                class="d-block w-100" alt="Slide 1">
            <div class="carousel-caption d-none d-md-block"></div>
        </div>
        <div class="carousel-item">
            <img height="600px" src="https://photo2.tinhte.vn/data/attachment-files/2021/09/5645921_Cover_Gadget.jpg"
                class="d-block w-100" alt="Slide 2">
            <div class="carousel-caption d-none d-md-block"></div>
        </div>
        <div class="carousel-item">
            <img height="600px" src="https://hewel.com.vn/files/image/523-vai-thoi-trang-cac-loai.jpg"
                class="d-block w-100" alt="Slide 3">
            <div class="carousel-caption d-none d-md-block"></div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
