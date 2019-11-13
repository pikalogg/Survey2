<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <base href="{{ asset('') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="{{URL::to('index')}}">
                        
                    </a>
                </div>
                <div class="login-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        @if($errors->has('errorLogin'))
                        <div class="alert alert-danger">
                            <strong style="display: block; text-align: center;">
                                {{$errors->first('errorLogin')}}</strong>
                        </div>
                        @endif

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                        </div>
                        @if($errors->has('email'))
                        <p style="color: red"><b>{{$errors->first('email')}}</b></p>
                        @endif
                        @if($errors->has('errorComfirmEmail'))
                        <p style="color: red"><b>{{$errors->first('errorComfirmEmail')}}</b></p>
                        @endif
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input type="text" name="name" class="form-control" placeholder="Tên người dùng" required autofocus>
                        </div>
                        
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required autofocus>
                        </div>
                        @if($errors->has('password'))
                        <p style="color: red"><b>{{$errors->first('password')}}</b></p>
                        @endif
                        @if($errors->has('errorPassword'))
                        <p style="color: red"><b>{{$errors->first('errorPassword')}}</b></p>
                        @endif
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" name="re_password" class="form-control" placeholder="Nhập lại mật khẩu" required autofocus>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" required autofocus>
                        </div>
                        @if($errors->has('phone'))
                        <p style="color: red"><b>{{$errors->first('phone')}}</b></p>
                        @endif
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Đăng ký</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Bạn đã có tài khoản <a href="/login"> Đăng nhập</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
