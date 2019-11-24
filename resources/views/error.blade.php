<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>error</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/styles.min.css">
    <style>
        #parent{
            text-align: center;
            padding-top: 200px;
        }
        #hihi{
            color: gray;
            font-size:20px;
            text-decoration: none;
        }
        #hihi:hover{
            color: blueviolet;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div id="parent">
        <h3 style="font-size: 30px;">Có lỗi rồi!</h3>
        <i style="font-size:230px" class="fa fa-frown-o"></i>
        <br>
        <button><a id="hihi" href="{{$href ?? ''}}">Back here<i style="font-size:20px" class="fa fa-angle-double-right"></i></a></button>
    </div>
</body>
</html>