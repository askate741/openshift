<div class="church form-group">{{--所屬教會--}}
    {!! Form::label('church_no','所屬教會:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
            {!! Form::select('church_no',$churches, null,['placeholder' => '請選擇所屬教會','id'=>'church_no','class'=>'form-control selectpicker'])!!}
        </div>
    </div>
</div>
<div class="form-group">{{--新增教會--}}
    {!! Form::label('church_new','新增教會:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4">
        <div class="checkbox">
            {!! Form::checkbox('church_new','yes',null,['id'=>'create_church','style'=>'margin-left:0px']) !!}
        </div>
    </div>
</div>
<div class="member_type form-group">{{--身分類型--}}
    {!! Form::label('member_type','身分類型:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            {!! Form::select('member_type', ['S'=>'贊助會員','L'=>'學員','G'=>'一般奉獻','M'=>'理監事','C'=>'服事者/同工','O'=>'其他'],null,['placeholder' => '請選擇身分類型','class'=>'form-control selectpicker'])!!}
        </div>
    </div>
</div>
<div class="devotee_name form-group">{{--姓名--}}
    {!! Form::label('devotee_name',' 姓名:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            {!! Form::text('devotee_name',null,['placeholder' => '姓名','class'=>'form-control'])!!}
        </div>
    </div>
</div>
<div class="title form-group">{{--奉獻抬頭--}}
    {!! Form::label('title',' 奉獻抬頭:' ,['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            {!! Form::text('title',null,['placeholder' => '奉獻抬頭','class'=>'form-control'])!!}
        </div>
    </div>
</div>
<div class="form-group">{{--收據寄送方式--}}
    {!! Form::label('delivery','收據寄送方式:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4">
        <label class="radio-inline">
            {!! Form::radio('delivery', 'Y',true ) !!}年次寄
        </label>
        <label class="radio-inline">
            {!! Form::radio('delivery', 'M') !!}逐月寄
        </label>
        <label class="radio-inline">
            {!! Form::radio('delivery','N') !!}不必寄
        </label>
    </div>
</div>
<div class="form-group">{{--性別--}}
    {!! Form::label('gender','性別:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4">
        <label class="radio-inline">
            {!! Form::radio('gender', 'M',true) !!}男
        </label>
        <label class="radio-inline">
            {!! Form::radio('gender', 'F') !!}女
        </label>
    </div>
</div>
<div class="form-group">{{--出生日期--}}
    {!! Form::label('birthday','出生日期:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::date('birthday',null,['class'=>'form-control'])!!}
    </div>
</div>
<div class="form-group">{{--入會/到職日--}}
    {!! Form::label('date_in','入會/到職日:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        {!! Form::date('date_in', \Carbon\Carbon::now(),['class'=>'form-control'])!!}
    </div>
</div>
<div class="form-group">{{--離會/離職日--}}
    {!! Form::label('date_out','離會/離職日:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        {!! Form::date('date_out', null,['class'=>'form-control'])!!}
    </div>
</div>
<div class="devotee_name form-group">{{--身分證字號--}}
    {!! Form::label('uid','身分證字號:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            {!! Form::text('uid',null,['placeholder' => '身分證字號','class'=>'form-control'])!!}
        </div>
    </div>
</div>
<div class="devotee_name form-group">{{--市話--}}
    {!! Form::label('member_tel','市話:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
            {!! Form::text('member_tel',null,['placeholder' => '市話','class'=>'form-control'])!!}
        </div>
    </div>
</div>
<div class="devotee_name form-group">{{--手機--}}
    {!! Form::label('mobile','手機:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
            {!! Form::text('mobile',null,['placeholder' => '手機','class'=>'form-control'])!!}
        </div>
    </div>
</div>
<div class="form-group">{{--通訊郵遞區號--}}
    {!! Form::label('add2_zipcode',' 通訊郵遞區號:' ,['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            {!! Form::text('add2_zipcode',null,['placeholder' => '通訊郵遞區號','class'=>'form-control','id'=>'add2_zipcode']) !!}
        </div>
    </div>
</div>
<div class="form-group">{{--通訊縣市--}}
    {!! Form::label('add2_city','通訊縣市:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            {!! Form::select('add2_city',[],null,['placeholder' => '請選擇縣市','id'=>'add2_city','class'=>'form-control selectpicker'])!!}
        </div>
    </div>
</div>
<div class="form-group">{{--通訊鄉鎮市區--}}
    {!! Form::label('add_dist2','通訊鄉鎮市區:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            {!! Form::select('add2_dist', [],null,['id'=>'add2_dist','class'=>'form-control selectpicker'])!!}
        </div>
    </div>
</div>
<div class="form-group">{{--通訊地址--}}
    {!! Form::label('add2_street','通訊地址:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            {!! Form::text('add2_street',null,['placeholder' => '通訊地址','class'=>'form-control','id'=>'add2_street']) !!}
        </div>
    </div>
</div>

<div class="form-group">{{--收據寄送方式--}}
    {!! Form::label('add1','戶籍地址:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4">
        <label class="radio-inline">
            {!! Form::radio('add1', 'yes',false,['id'=>'add1_yes']) !!}同上
        </label>
        <label class="radio-inline">
            {!! Form::radio('add1', 'no',true,['id'=>'add1_no']) !!}不同
        </label>
    </div>
</div>
<div class="address">
    <div class="form-group">{{--戶籍郵遞區號--}}
        {!! Form::label('add1_zipcode',' 戶籍郵遞區號:' ,['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                {!! Form::text('add1_zipcode',null,['placeholder' => '通訊郵遞區號','class'=>'form-control','id'=>'add1_zipcode']) !!}
            </div>
        </div>
    </div>
    <div class="form-group">{{--戶籍縣市--}}
        {!! Form::label('add1_city','戶籍縣市:',['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                {!! Form::select('add1_city',[],null,['placeholder' => '請選擇縣市','id'=>'add1_city','class'=>'form-control selectpicker'])!!}
            </div>
        </div>
    </div>
    <div class="form-group">{{--戶籍鄉鎮市區--}}
        {!! Form::label('add1_dist','戶籍鄉鎮市區:',['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                {!! Form::select('add1_dist', [],null,['id'=>'add1_dist','class'=>'form-control selectpicker'])!!}
            </div>
        </div>
    </div>
    <div class="form-group">{{--戶籍地址--}}
        {!! Form::label('add1_street','戶籍地址:',['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                {!! Form::text('add1_street',null,['placeholder' => '通訊地址','class'=>'form-control','id'=>'add1_street']) !!}
            </div>
        </div>
    </div>
</div>

<div class="form-group">{{--信箱--}}
    {!! Form::label('email','信箱:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i>@</i></span>
            {!! Form::text('email',null,['placeholder' => '信箱','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">{{--信用卡--}}
    {!! Form::label('credit_card_radio','信用卡:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4">
        <label class="radio-inline">
            {!! Form::radio('credit_card_radio', 'yes',false,['id'=>'credit_card_yes']) !!}有
        </label>
        <label class="radio-inline">
            {!! Form::radio('credit_card_radio', 'no',true,['id'=>'credit_card_no']) !!}沒有
        </label>
    </div>
</div>

<script>
    $(document).ready
    (function () {
        if (location.href.match("edit") !== null) {/*在網頁載入時，判斷網址是否為edit*/
            if ($("#add2_zipcode").val() === $("#add1_zipcode").val() && $("#add2_zipcode").val() !== "") {/*如果支出為空*/
                $("#add1_yes").prop('checked', true);
                $(".address").hide();
            }
            if ($("#issue_bank").val() !== "") {/*如果銀行不等於空*/
                $("#credit_card_yes").prop('checked', true);
                $("#SaveAccount").hide();
                $("#step0Next").show();
                $("#card_id_ok").show();
                $('#card_id_1').val($('#card_id').val().substring(0, 4));
                $('#card_id_2').val($('#card_id').val().substring(4, 8));
                $('#card_id_3').val($('#card_id').val().substring(8, 12));
                $('#card_id_4').val($('#card_id').val().substring(12, 16));
            }
            else {
                $("#stepDesc0").hide();
                $("#stepDesc1").hide();
                $("#SaveAccount").show();
            }
        }
    });
    $("#add1_yes").click(function () {/*如果勾 Yes*/
        /*add2的值會等於add1*/
        $("#add1_zipcode").val($("#add2_zipcode").val());
        $("#add1_city").val($("#add2_city").val()).trigger("change");
        $("#add1_dist").val($("#add2_dist").val());
        $("#add1_street").val($("#add2_street").val());
        /*隱藏 地址選單*/
        $(".address").hide();
    });
    $("#add1_no").click(function () {/*如果勾 No*/
        /*顯示 地址選單*/
        $(".address").show();
    });

    $(function () {
        $("#SignupForm").JsonToAddress({
            zipcode_name: "add1_zipcode",
            city_name: "add1_city",
            dist_name: "add1_dist",
        });
        $("#SignupForm").JsonToAddress({
            zipcode_name: "add2_zipcode",
            city_name: "add2_city",
            dist_name: "add2_dist",
        });
    });
</script>