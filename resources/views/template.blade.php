@extends('app')
@section('css')
    {{--<script type='text/javascript' src={{ '../../js/slider.js' }}></script>--}}{{--引入右側選單JS--}}
    <script type='text/javascript' src={{ '../../js/dialog.js' }}></script>{{--引入上傳彈跳視窗JS--}}
    {{--<script type='text/javascript' src={{ '../../js/Customize.Show.js' }}></script>--}}
    <script type='text/javascript' src={{ '../../js/DialogDownload.js' }}></script>{{--引入下載彈跳視窗JS--}}
    {{--<script type='text/javascript' src={{ '../../js/jquery.chained.js' }}></script>--}}{{--引入地址連動JS--}}
    <script type='text/javascript' src={{ '../../js/validation/bootstrapValidator.min.js' }}></script>
    <script type='text/javascript' src={{ '../../js/validation/zh_TW.min.js' }}></script>
    <script type='text/javascript' src={{ '../../js/JsonToAddress.js' }}></script>{{--引入地址連動JS--}}
    {{--<script type='text/javascript' src={{ '../../js/error_null.js' }}></script>--}}
    <script type='text/javascript' src={{ '../../js/jquery.dataTables.min.js' }}></script>
    <script type='text/javascript' src={{ '../../js/dataTables.bootstrap.min.js' }}></script>
    <script type='text/javascript' src={{ '../../js/url.min.js' }}></script>
    <link type="text/css" rel="stylesheet" href={{ '../../css/content.css' }}>{{--引入內容用CSS--}}
    <link type="text/css" rel="stylesheet" href={{ '../../css/Customize.DataTable.css' }}>{{--引入內容用CSS--}}
    <link type="text/css" rel="stylesheet" href={{ '../../css/dataTables.bootstrap.min.css' }}>{{--引入內容用CSS--}}
    <link type="text/css" rel="stylesheet" href={{ '../../css/Customize.Clear.css' }}>{{--清除css格式--}}
    {{--<script type='text/javascript'--}}
            {{--src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>--}}
    {{--<script type='text/javascript'--}}
            {{--src=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/language/zh_TW.min.js"></script>--}}
        <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">
    @yield('css2')
@stop
@section('body')
    @yield('content')
@stop
