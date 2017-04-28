@extends('template')
@section('css2')
    <script type='text/javascript' src={{ '../../js/validation/Customize.Validator-church.js' }}></script>
@stop
@section('content')
    <!--教會編號-->
    <div class="container" >
        @if($where=='create')
            {!! Form::open(['url'=>'church' ,'class'=>" well form-horizontal" ,'id'=>'SignupForm']) !!}
        @else
            {!! Form::model($church,['method'=>'PATCH','action'=>['ChurchesController@update',$church->no],'class'=>" well form-horizontal" ,'id'=>'SignupForm']) !!}
        @endif
        <fieldset>
            <legend>教會名錄</legend>
            <div class="form-group">{{--教會名稱--}}
                {!! Form::label('church_name','教會名稱:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                        {!! Form::text('church_name',null,['placeholder' => '教會名稱','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">{{--郵遞區號--}}
                {!! Form::label('add_zipcode',' 通訊郵遞區號:' ,['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        {!! Form::text('add_zipcode',null,['placeholder' => '通訊郵遞區號','id'=>'add_zipcode','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">{{--通訊縣市--}}
                {!! Form::label('add_city','通訊縣市:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        {!! Form::select('add_city',[],null,['placeholder' => '請選擇縣市','id'=>'add_city','class'=>'form-control selectpicker'])!!}
                    </div>
                </div>
            </div>
            <div class="form-group">{{--通訊鄉鎮市區--}}
                {!! Form::label('add_dist','通訊鄉鎮市區:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        {!! Form::select('add_dist', [],null,['id'=>'add_dist','class'=>'form-control selectpicker'])!!}
                    </div>
                </div>
            </div>
            <div class="form-group">{{--通訊地址--}}
                {!! Form::label('add_street','通訊地址:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        {!! Form::text('add_street',null,['placeholder' => '通訊地址','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">{{--聯絡電話--}}
                {!! Form::label('church_tel','聯絡電話:',['class'=>'col-md-4 control-label']) !!}
                <div class=" col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                        {!! Form::text('church_tel',null,['placeholder' => '電話號碼','class'=>'form-control ']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">{{--分機--}}
                {!! Form::label('ext','分機:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                        {!! Form::text('ext',null,['placeholder' => '分機號碼','class'=>'form-control ']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">{{--信箱--}}
                {!! Form::label('web_or_mail','信箱:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i>@</i></span>
                        {!! Form::text('web_or_mail',null,['placeholder' => '信箱','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">{{--聯絡人--}}
                {!! Form::label('contact','聯絡人:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        {!! Form::text('contact',null,['placeholder' => '聯絡人','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-warning  form-control" id="church-post">送出<span
                                class="glyphicon glyphicon-send "></span></button>
                </div>
            </div>
        </fieldset>
        {!! Form::close() !!}
    </div>
    <script>
        $(function () {
            $("#SignupForm").JsonToAddress({
                zipcode_name: "add_zipcode",
                city_name: "add_city",
                dist_name: "add_dist",
            });

        });
    </script>

@stop