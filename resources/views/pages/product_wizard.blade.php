@extends('template')
@section('css2')
    <script type='text/javascript' src={{ '../../js/Product_Wizard.js' }}></script>{{--引入精靈式表單JS--}}
    <script type='text/javascript' src={{ '../../js/ProductAjax.js' }}></script>
    <link type="text/css" rel="stylesheet" href={{ '../../css/formToWizard.css' }}>{{--引入精靈式表單CSS--}}
    <script type='text/javascript' src={{ '../../js/validation/Customize.Validator-product.js' }}></script>
@stop
@section('content')
    <div class="container">
        {!! Form::open(['url'=>'product_order','id'=>'SignupForm','class'=>" well form-horizontal"]) !!}
        <fieldset>
            <legend>產品資料</legend>
            @include('wizard.product_order')
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

