@extends('template')
@section('content')
    <div id="search">
        <form class="form-inline">
            {!! Form::text('search',null,['class'=>'form-control','id'=>'DT_Search']) !!}
            {!! Form::button(null, ['class' =>'btn btn-primary glyphicon glyphicon-search search_btn','aria-hidden'=>'true'])!!}
        </form>
    </div>
    <div id="attached">
        @include('cells.showButton')
    </div>
    <div style="border-top: 3px solid #dddddd;margin-top:-1px">
        <br>
        <div class="container">
            @yield('showData')
        </div>
    </div>
@stop
