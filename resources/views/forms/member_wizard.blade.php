@extends('template')
@section('css2')
    <script type='text/javascript' src={{ '../../js/Card_Wizard.js' }}></script>{{--引入精靈式表單JS--}}
    <link type="text/css" rel="stylesheet" href={{ '../../css/formToWizard.css' }}>{{--引入精靈式表單CSS--}}
    <script type='text/javascript' src={{ '../../js/validation/Customize.Validator-member.js' }}></script>
@stop
@section('content')
    {{--<div id="main">--}}
    <div class="container" >
        {!! Form::model($member_data,['method'=>'PATCH','action'=>['MembersController@update',$member->no],'id'=>'SignupForm','class'=>" well form-horizontal"]) !!}
        <fieldset>
            <legend>會員資料</legend>
            @include('wizard.member')
        </fieldset>
        <fieldset>
            <legend>信用卡</legend>
            @include('wizard.credit_card')
        </fieldset>
        <p>
            {!! Form::submit('送出',['id'=>'SaveAccount']) !!}
        </p>
        {!! Form::close() !!}
    </div>
@stop