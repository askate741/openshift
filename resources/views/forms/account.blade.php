@extends('template')
@section('css2')
    <script type='text/javascript' src={{ '../../js/AccountAjax.js' }}></script>{{--引入精靈式表單JS--}}
    <script type='text/javascript' src={{ '../../js/validation/Customize.Validator-account.js' }}></script>
@stop
@section('content')
    <!--會計表-->
    <div class="container">
        {!! Form::model($account_data,['method'=>'PATCH','action'=>['AccountsController@update',$account->no],'id'=>'SignupForm','class'=>" well form-horizontal"]) !!}{{--由所不同的原因: 前者帶資料、後者帶no--}}
        <fieldset>
            <legend>會計表</legend>
            <div class="form-group">{{--會計類別--}}
                {!! Form::label('account_class','會計類別:' ,['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4">
                    <label class="radio-inline">
                        {!! Form::radio('account_class', '0',false,['id'=>'in_radio']) !!}收入
                    </label>
                    <label class="radio-inline">
                        {!! Form::radio('account_class', '1',true,['id'=>'out_radio']) !!}支出
                    </label>
                </div>
            </div>
            <div class="member_no form-group" style="display:none">{{--會員名稱--}}
                {!! Form::label('member_no','會員名稱:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                        {!! Form::select('member_no',$members, null,['placeholder' => '請選擇會員名稱','id'=>'member_no','disabled'=>'disabled','class'=>'form-control selectpicker'])!!}
                    </div>
                </div>
            </div>
            {{--</div>--}}
            <div class="form-group">{{--會計科目1--}}
                {!! Form::label('subclass1_no','會計科目1:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    {!! Form::select('subclass1_no',$in, null,['placeholder' => '請選擇收入科目1','id'=>'in','class'=>'form-control selectpicker','style'=>'display:none','disabled'=>'disabled'])!!}<!-- 收入的會計科目 大項  -->
                    {!! Form::select('subclass1_no',$out, null,['placeholder' => '請選擇支出科目1','id'=>'out','class'=>'form-control selectpicker'])!!}<!-- 支出的會計科目 大項  -->
                    </div>
                </div>
            </div>
            <div class="form-group">{{--會計科目2--}}
                {!! Form::label('account_class_no','會計科目2:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        {!! Form::select('account_class_no',$subclass2, null,['placeholder' => '請選擇會計科目2','id'=>'subclass2_no','class'=>'form-control selectpicker'])!!}{{--會計科目2 no 會等於 account_class_no--}}
                    </div>
                </div>
            </div>
            <div class="form-group">{{--收支流向--}}
                {!! Form::label('cert_type','收支流向:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        {!! Form::select('cert_type', ['C'=>'現金','B'=>'銀行','P'=>'郵局','S'=>'信用卡'], null,['placeholder' => '請選擇收支流向','class'=>'form-control selectpicker'])!!}{{--會計科目2 no 會等於 account_class_no--}}
                    </div>
                </div>
            </div>
            <div class="form-group">{{--日期--}}
                {!! Form::label('account_date','日期:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4">
                    {!! Form::date('account_date',null,['class'=>'form-control'])!!}
                </div>
            </div>
            <div class="form-group">{{--摘要--}}
                {!! Form::label('account_memo','摘要:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4">
                    {!! Form::textarea('account_memo',null,['placeholder' => '摘要','class'=>'form-control'])!!}
                </div>
            </div>
            <div class="form-group">{{--金額--}}
                {!! Form::label('account_amount','金額:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        {!! Form::text('account_amount',null,['placeholder' => '金額','class'=>'form-control'])!!}
                    </div>
                </div>
            </div>
            <div class="form-group">{{--收支憑證--}}
                {!! Form::label('cert','收支憑證:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        {!! Form::text('cert',null,['placeholder' => '收支憑證','class'=>'form-control'])!!}
                    </div>
                </div>
            </div>
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
    <script>
        $(document).ready
        (function () {
            if ($("#out").val() === "") {/*如果支出為空*/
                $("#in_radio").prop('checked',true);
                $("#out").hide().prop('disabled', true);
                $("#in").show().prop('disabled', false);
                $(".member_no").show();
                $("#member_no").prop("disabled", false);
            }
            $("#in_radio").click(function () {
                $("#in").show().prop('disabled', false);
                $("#out").hide().prop('disabled', true);
                $("#out").val($("#out").find('option:first').val());
                /*還原選項*/
                $(".member_no").show();
                $("#member_no").prop("disabled", false);
                $("#subclass2_no").empty().append("<option selected='selected'>請選擇會計科目2</option>");
            });
            $("#out_radio").click(function () {
                $("#out").show().prop('disabled', false);
                $(".member_no").hide();
                $("#in").hide().prop('disabled', true);
                $("#in").val($("#in").find('option:first').val());
                /*還原選項*/
                $("#member_no").val($("#member_no").find('option:first').val()).prop("disabled", true);
                $("#subclass2_no").empty().append("<option selected='selected'>請選擇會計科目2</option>");
            });
        });
    </script>
@stop
