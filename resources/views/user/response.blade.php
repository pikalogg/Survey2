@extends('layouts.default')

@section('title')
    Topic-response
@endsection

@section('css')
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
    <style>
        .input-text{
            -webkit-appearance: none;
            width: 60%;
            border: 0;
            font-family: inherit;
            padding: 12px 0;
            height: 48px;
            font-size: 14px;
            font-weight: 500;
            border-bottom: 1px solid #C8CCD4;
            border-radius: 0;
            color: #223254;
            transition: all .15s ease;
            margin-left: 10px ;
            background: none;

        }
        .input-text:focus{
            border-bottom: 2px solid #990099;
            outline: none;
        }
        .radio, .checkbox {
            position: relative;
            cursor: pointer;
            line-height: 20px;
            font-size: 14px;
            margin: 15px;
        }
        .radio .label {
            position: relative;
            display: block;
            float: left;
            margin-right: 10px;
            width: 20px;
            height: 20px;
            border: 2px solid #c8ccd4;
            border-radius: 100%;
            -webkit-tap-highlight-color: transparent;
        }
        .checkbox .label {
            position: relative;
            display: block;
            float: left;
            margin-right: 10px;
            width: 20px;
            height: 20px;
            border: 2px solid #c8ccd4;
            -webkit-tap-highlight-color: transparent;
        }
        .radio .label:after  {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 10px;
            height: 10px;
            border-radius: 100%;
            background: #3399CC;
            transform: scale(0);
            transition: all 0.2s ease;
            opacity: 0.08;
            pointer-events: none;
        }
        .checkbox .label:after {
            content: '';
            width: 9px;
            height: 5px;
            position: absolute;
            top: 5px;
            left: 3px;
            border: 3px solid #333;
            border-top: none;
            border-right: none;
            background: transparent;
            opacity: 0;
            transform: rotate(-45deg);
        }
        input[type="radio"]:checked + .label {
            border-color: #3399CC;
        }
        input[type="checkbox"]:checked + .label {
            border-color: #3399CC;
        }
        input[type="radio"]:checked + .label:after {
            transform: scale(1);
            transition: all 0.2s ease;
            opacity: 1;
        }
        .hidden {
            display: none;
        }
        .checkbox input[type=checkbox]:checked + .label:after {
            opacity: 1;
        }
    </style>
@endsection

@section('body')
    @include('user/modules.response')
@endsection

@section('js')

@endsection