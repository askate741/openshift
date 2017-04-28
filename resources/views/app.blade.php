<!DOCTYPE html>
<html lang="tw">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'TCRM會計系統') }}</title>
        {{--<link type="text/css" rel="stylesheet" href={{ '../../css/app.css' }} >--}}
        {{--<script type='text/javascript' src={{ '../../js/app.js' }}></script>--}}
        <link type="text/css" rel="stylesheet" href={{ '../../css/balloon.css' }} >
        <script type='text/javascript' src={{ '../../js/jquery-1.12.4.min.js' }}></script>
        <script type='text/javascript' src={{ '../../js/jquery-3.2.1.min.js' }}></script>
        <script type='text/javascript' src={{ '../../js/jquery.printelement.min.js' }}></script>
        <script type='text/javascript' src={{ '../../js/jquery-ui.min.js' }}></script>
        <script type='text/javascript' src={{ '../../js/bootstrap.min.js' }}></script>
        <script type='text/javascript' src={{ '../../js/angular.min.js' }}></script>
        {{--<script type='text/javascript' src={{ '../../js/vue.js' }}></script>--}}
        <link type="text/css" rel="stylesheet" href={{ '../../css/jquery-ui.min.css' }}>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href={{ '../../css/background.css' }} >
        <link type="text/css" rel="stylesheet" href={{ '../../css/adjustment.css' }} >
        <link type="text/css" rel="stylesheet" href={{ '../../css/template.css' }} >
        <link type="text/css" rel="stylesheet" href={{ '../../css/header.css' }} >
        <link type="text/css" rel="stylesheet" href={{ '../../css/word.css' }} >

        <script>
            window.Laravel =<?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        @yield('css')
    </head>
    <body id="body_background" >
        @include('cells.header')
        @yield('body')
    </body>
</html>