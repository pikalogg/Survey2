<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/styles.min.css">

        <!-- Styles -->

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .tvn{
                margin-left : 50px;
            }
        </style>
    </head>
    <body>
        <div style= "display: block;" class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">Trang chủ</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div id="parent">
        <div>

        </div>
        <div class="captions">
            <h2 id="hihihihi">Tạo những biểu mẫu cuốn hút</h2>
            <div id="hihi" class="caption">   
                <i id="icon" class='far fa-calendar-check'></i>            
                <p>Thu thập và tổ chức thông tin quy mô lớn và nhỏ bằng Biểu mẫu riêng của bạn. Ứng dụng này hoàn toàn miễn phí.</p>
                <a style="font-size:22px" class=" start btn btn-success" href="/">Get Started <i style="font-size:22px" class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
        </div>
        <div class="footer-dark">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 item">
                            <h3>Services</h3>
                            <ul>
                                <li><a href="#">Web design</a></li>
                                <li><a href="#">Development</a></li>
                                <li><a href="#">Hosting</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-3 item">
                            <h3>About</h3>
                            <ul>
                                <li><a href="#">Company</a></li>
                                <li><a href="#">Team</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 item text">
                            <h3>Nhí nhố team</h3>
                            <div style="display: flex;">
                                <div>
                                    <p>Nguyễn Đức Long</p>
                                    <p>Ngô Thái Sơn</p>
                                    <p>Nguyễn Ngọc Diệu</p>
                                    <p>Thân Chí Đạt</p>
                                </div>
                                <div style="margin-left: 50px;">
                                    <p>Vũ Thị ngọc Lê</p>
                                    <p>Cao Thị Ngoan</p>
                                    <p>Bùi Thị Thu Trang</p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                    </div>
                    <p class="copyright">Company Name © 2017</p>
                </div>
            </footer>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
