@extends('template')
@section('css2')
    <link type="text/css" rel="stylesheet" href={{ '../../css/formToWizard.css' }}>{{--引入精靈式表單CSS--}}
    <script type='text/javascript' src={{ '../../js/validation/Customize.Validator-product.js' }}></script>
@stop
@section('content')
    <!--產品流向-->
    <div class="container">
        {!! Form::model($product_order,['method'=>'PATCH','action'=>['ProductsController@update',$product_order->no],'id'=>'SignupForm','class'=>" well form-horizontal"]) !!}
        <fieldset>
            <legend>信用卡資料</legend>
            @include('wizard.product_order')
            <br>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-warning  form-control" id="SaveAccount">送出<span
                                class="glyphicon glyphicon-send "></span></button>
                </div>
            </div>
        </fieldset>
        {!! Form::close() !!}
    </div>
@stop
