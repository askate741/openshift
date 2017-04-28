<!DOCTYPE html>
<html lang="tw">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'TCRM會計系統') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
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
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            <a href="{{ url('/login') }}">登入</a>
            {{--<a href="{{ url('/register') }}">註冊</a>--}}
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
           {{--台北市台灣教會更新協會--}}TCRM
        </div>
        <div class="links">
            <a href="http://tcrmtw.porg.tw/?ctl=page&id=262">協會緣起</a>
            <a href="http://tcrmtw.porg.tw/?ctl=Article&id=1593">協會簡介</a>
            <a href="http://tcrmtw.porg.tw/?ctl=Article&id=1588">見證分享</a>
            <a href="http://tcrmtw.porg.tw/?ctl=video-clip">影音播放</a>
            <a href="http://tcrmtw.porg.tw/?ctl=page&id=264">聯絡我們</a>
        </div>
    </div>
</div>
</body>
</html>
