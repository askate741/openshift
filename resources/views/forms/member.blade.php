@extends('template')
@section('content')
    @if($where=='create')
        {!! Form::open(['url'=>'member']) !!}
    @else
        {!! Form::model($member,['method'=>'PATCH','action'=>['MembersController@update',$member->no]]) !!}
    @endif
    {!! Form::label('church_no','所屬教會:') !!}
    {!! Form::select('church_no',$churches, null,['placeholder' => '請選擇所屬教會'])!!}
    <br>
    {!! Form::label('member_type','身分類型:') !!}
    {!! Form::select('member_type', ['S'=>'贊助會員','L'=>'學員','G'=>'一般奉獻',
    'M'=>'理監事','C'=>'服事者/同工','O'=>'其他'],null,['placeholder' => '請選擇身分類型'])!!}
    <br>
    {!! Form::label('devotee_name',' 姓名:') !!}
    {!! Form::text('devotee_name',null,['size'=>10,'maxlength'=>32]) !!}
    <br>
    {!! Form::label('title',' 奉獻抬頭:') !!}
    {!! Form::text('title',null,['size'=>16,'maxlength'=>32]) !!}
    <br>
    {!! Form::label('delivery','收據寄送方式:') !!}
    {!! Form::radio('delivery', 'Y') !!}
    {!! Form::label('delivery','年次寄') !!}
    {!! Form::radio('delivery', 'M') !!}
    {!! Form::label('delivery','逐月寄') !!}
    {!! Form::radio('delivery','N') !!}
    {!! Form::label('delivery','不必寄') !!}
    <br>
    {!! Form::label('gender','性別:') !!}
    {!! Form::radio('gender', 'M') !!}
    {!! Form::label('gender','男') !!}
    {!! Form::radio('gender', 'F') !!}
    {!! Form::label('gender','女') !!}
    <br>
    {!! Form::label('birthday','出生日期:') !!}
    {!! Form::date('birthday')!!}
    <br>
    {!! Form::label('date_in','入會/到職日:') !!}
    {!! Form::date('date_in')!!}
    <br>
    {!! Form::label('date_out','離會/離職日') !!}
    {!! Form::date('date_out' )!!}
    <br>
    {!! Form::label('uid',' 身分證字號:') !!}
    {!! Form::text('uid',null,['size'=>10,'maxlength'=>10]) !!}
    <br>
    {!! Form::label('member_tel',' 市話:') !!}
    {!! Form::text('member_tel',null,['size'=>10,'maxlength'=>10,'id'=>'telephone']) !!}
    <br>
    {!! Form::label('mobile',' 手機:') !!}
    {!! Form::text('mobile',null,['size'=>10,'maxlength'=>10]) !!}
    <br>
    {!! Form::label('add2_zipcode',' 通訊郵遞區號:') !!}
    {!! Form::text('add2_zipcode',null,['size'=>5,'maxlength'=>5]) !!}
    <br>
    {!! Form::label('add2','通訊地址:') !!}
{{--    {!! Form::hidden('add2_city',null,['id'=>'temp2_city']) !!}
    {!! Form::hidden('add2_dist',null,['id'=>'temp2_dist']) !!}--}}
    {!! Form::select('add2_city', [],null,['placeholder' => '請選擇縣市','id'=>'add2_city'])!!}
    {!! Form::select('add2_dist', [],null,['id'=>'add2_dist'])!!}
    {!! Form::text('add2_street',null,['size'=>25,'maxlength'=>32,'placeholder' => '請輸入通訊地址']) !!}
    <br>
    {!! Form::label('add1','戶籍地址:') !!}
    {!! Form::radio('add1', 'yes',false,['onclick'=>'add1_yes()']) !!}
    {!! Form::label('add1','同上') !!}
    {!! Form::radio('add1', 'no',true,['onclick'=>'add1_no()']) !!}
    {!! Form::label('add1','不同') !!}
    <br>
    <div class="address">
        {!! Form::label('add1_zipcode','戶籍郵遞區號:') !!}
        {!! Form::text('add1_zipcode',null,['size'=>5,'maxlength'=>5]) !!}
        <br>
        {!! Form::label('add1','戶籍地址:') !!}
{{--        {!! Form::hidden('add1_city',null,['id'=>'temp1_city']) !!}
        {!! Form::hidden('add1_dist',null,['id'=>'temp1_dist']) !!}--}}
        {!! Form::select('add1_city', [],null,['placeholder' => '請選擇縣市','id'=>'add1_city'])!!}
        {!! Form::select('add1_dist', [],null,['id'=>'add1_dist'])!!}
        {!! Form::text('add1_street',null,['size'=>25,'maxlength'=>32,'placeholder' => '請輸入戶籍地址']) !!}
    </div>
    {!! Form::label('email',' Email:') !!}
    {!! Form::text('email',null,['size'=>32,'maxlength'=>50]) !!}
    <br>
    {!! Form::label('credit_card_radio','信用卡:') !!}
    {!! Form::radio('credit_card_radio', 'yes',false,['id'=>'credit_card_yes']) !!}
    {!! Form::label('credit_card_radio','有') !!}
    {!! Form::radio('credit_card_radio', 'no',true,['id'=>'credit_card_no']) !!}
    {!! Form::label('credit_card_radio','沒有') !!}
    <br>
    {!! Form::submit($where,['class'=>'btn btn-success form-control']) !!}
    <script>
        function add1_yes() {/*如果勾 Yes*/
            /*add2的值會等於add1*/
            $("#add1_zipcode").val($("#add2_zipcode").val());
            $("#add1_city").val($("#add2_city").val()).trigger("change");
            $("#add1_dist").val($("#add2_dist").val());
            $("#add1_street").val($("#add2_street").val());
            $(".address").hide();
            /*隱藏 地址選單*/
        }
        function add1_no() {/*如果勾 No*/
            $(".address").show();
            /*顯示 地址選單*/
        }
        $(function () {
            $("#address2").JsonToAddress({
                zipcode_name: "add2_zipcode",
                city_name: "add2_city",
                dist_name: "add2_dist",
/*                temp_city_name: "temp2_city",
                temp_dist_name: "temp2_dist"*/
            });
            $("#address1").JsonToAddress({
                zipcode_name: "add1_zipcode",
                city_name: "add1_city",
                dist_name: "add1_dist",
/*                temp_city_name: "temp1_city",
                temp_dist_name: "temp1_dist"*/
            });
        });
    </script>
    @if($where=='create')
        {!! Form::close() !!}
        @include('errors.404')
    @else
        {!! Form::close() !!}
        @include('errors.404')
    @endif
@stop
