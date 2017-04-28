@extends('template')
@section('css2')
    <script type='text/javascript' src={{ '../../js/Member_Wizard.js' }}></script>{{--引入精靈式表單JS--}}
    <link type="text/css" rel="stylesheet" href={{ '../../css/formToWizard.css' }}>{{--引入精靈式表單CSS--}}
    <script type='text/javascript' src={{ '../../js/validation/Customize.Validator-member.js' }}></script>
@stop
@section('content')
    {{--<div id="main">--}}
    <div class="container" >
        {!! Form::open(['url'=>'member','id'=>'SignupForm','class'=>" well form-horizontal"]) !!}
        <fieldset>
            <legend>會員資料</legend>
            @include('wizard.member')
        </fieldset>
       <fieldset>
            <legend>教會名錄</legend>
            @include('wizard.church')
        </fieldset>
        <fieldset>
            <legend>信用卡資料</legend>
            @include('wizard.credit_card')
        </fieldset>
        <br>
        <p>
        {!! Form::submit('送出',['id'=>'SaveAccount']) !!}
        </p>
        {!! Form::close() !!}
    </div>
@stop
