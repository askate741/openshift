@extends('template')
@section('css2')
    <script type='text/javascript' src={{ '../../js/Course_Wizard.js' }}></script>{{--引入精靈式表單JS--}}
    <link type="text/css" rel="stylesheet" href={{ '../../css/formToWizard.css' }}>{{--引入精靈式表單CSS--}}
    <script type='text/javascript' src={{ '../../js/validation/Customize.Validator-course.js' }}></script>
@stop
@section('content')
    {{--<div id="main" >--}}
    <div class="container">
        {!! Form::open(['url'=>'course','id'=>'SignupForm','class'=>" well form-horizontal"]) !!}
        <fieldset>
            <legend >課程表</legend>
            @include('wizard.course')
        </fieldset>
        <fieldset>
            <legend>主辦單位</legend>
            @include('wizard.church')
        </fieldset>
        <p>
            {!! Form::submit('送出',['id'=>'SaveAccount']) !!}
        </p>
        {!! Form::close() !!}
    </div>
@stop