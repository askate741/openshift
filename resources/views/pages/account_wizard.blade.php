@extends('template')
@section('css2')
    <script type='text/javascript' src={{ '../../js/Product_Wizard.js' }}></script>{{--引入精靈式表單JS--}}
    <script type='text/javascript' src={{ '../../js/AccountAjax.js' }}></script>{{--引入精靈式表單JS--}}
    <link type="text/css" rel="stylesheet" href={{ '../../css/formToWizard.css' }}>{{--引入精靈式表單CSS--}}
    <script type='text/javascript' src={{ '../../js/validation/Customize.Validator-account.js' }}></script>
@stop
@section('content')
    {{--<div id="main">--}}
    <div class="container">
        {!! Form::open(['url'=>'account','id'=>'SignupForm','class'=>" well form-horizontal"]) !!}
        <fieldset>
            <legend>會計表</legend>
            @include('wizard.account')
        </fieldset>
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
        <p>
            {!! Form::submit('送出',['id'=>'SaveAccount']) !!}
        </p>
        {!! Form::close() !!}
    </div>
@stop

