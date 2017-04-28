@extends('template')
@section('css2')
    <script type='text/javascript' src={{ '../../js/Member_Wizard.js' }}></script>{{--引入精靈式表單JS--}}
    <link type="text/css" rel="stylesheet" href={{ '../../css/formToWizard.css' }}>{{--引入精靈式表單CSS--}}
@stop
@section('content')
    <div id="main">
        {!! Form::open(['url'=>'member','id'=>'SignupForm']) !!}
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
            {!! Form::submit($where,['class'=>'btn btn-primary form-control','id'=>'SaveAccount']) !!}
        </p>
        {!! Form::close() !!}
    </div>
@stop

