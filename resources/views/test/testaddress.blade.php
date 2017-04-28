@extends('app')
@section('css')
    <script type='text/javascript' src={{ '../../js/slider.js' }}></script>{{--引入右側選單JS--}}
@stop
@section('body')
    <section>
        <div id="header">
            <img src="{{ '../../img/tcrm.jpg' }}">
        </div>
    </section>
    @include('pages.menu')
@stop
