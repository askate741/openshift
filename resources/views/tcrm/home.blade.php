@extends('template')
@section('content')
    <div id="search">
        <form class="form-inline">
            {!! Form::text('search',null,['class'=>'form-control','id'=>'DT_Search']) !!}
            {!! Form::button(null, ['class' =>'btn btn-primary glyphicon glyphicon-search search_btn','aria-hidden'=>'true'])!!}
        </form>
    </div>
    <div id="attached">
        @include('pages.button')
    </div>
    @yield('show')
    @include('pages.DataTable_js')
    @include('pages.update')
    @include('pages.download')
@stop