<div class="form-group">{{--發卡銀行--}}
    {!! Form::label('issue_bank','發卡銀行:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
            {!! Form::text('issue_bank',null,['placeholder' => '發卡銀行','class'=>'form-control'])!!}
        </div>
    </div>
</div>
<div class=" form-group">{{--信用卡卡號--}}
    {!! Form::label('card_id','信用卡卡號:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
            {!! Form::text('card_id',null,['placeholder' => '信用卡卡號','class'=>'form-control'])!!}
        </div>
    </div>
</div>
<div class="church form-group">{{--信用卡別--}}
    {!! Form::label('type','信用卡別:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
            {!! Form::select('type',['V'=>'VISA','M'=>'Master','J'=>'JCB','U'=>'聯合信用卡'], null,['placeholder' => '請選擇信用卡別','id'=>'type','class'=>'form-control selectpicker'])!!}
        </div>
    </div>
</div>
<div class="form-group">{{--信用卡截止日--}}
    {!! Form::label('exp','信用卡截止日:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        {!! Form::date('exp', null,['class'=>'form-control'])!!}
    </div>
</div>
<div class="form-group">{{--捐款期間-起--}}
    {!! Form::label('donate_start','捐款期間-起:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        {!! Form::date('donate_start', null,['class'=>'form-control'])!!}
    </div>
</div>
<div class="form-group">{{--捐款期間-迄--}}
    {!! Form::label('donate_end','捐款期間-迄:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        {!! Form::date('donate_end',null,['class'=>'form-control'])!!}
    </div>
</div>
<div class=" form-group">{{--捐款期間-次數--}}
    {!! Form::label('donate_times','捐款期間-次數:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
            {!! Form::text('donate_times',null,['placeholder' => '捐款期間-次數','class'=>'form-control'])!!}
        </div>
    </div>
</div>
<div class=" form-group">{{--捐款方式--}}
    {!! Form::label('donate_way','捐款方式:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
            {!! Form::select('donate_way',['S'=>'單次','M'=>'每月','Y'=>'每年','O'=>'其他'], null, ['placeholder' => '請選擇捐款方式','class'=>'form-control selectpicker'])!!}
        </div>
    </div>
</div>
<div class=" form-group">{{--承諾總金額--}}
    {!! Form::label('promise_amount','承諾總金額:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
            {!! Form::text('promise_amount',null,['placeholder' => '承諾總金額','class'=>'form-control'])!!}
        </div>
    </div>
</div>

<script>
    /*$(".card_id").on('keyup', function () {
        $('#card_id').val($('#card_id_1').val() + $('#card_id_2').val() + $('#card_id_3').val() + $('#card_id_4').val()).trigger("change");
        console.log($('#card_id').val());
    });
    /!*信用卡卡號規則：
     由右至左（共 1 ～ 16 ），奇數位乘上 1 ，偶數位乘上 2 ，共得出 16 個[新數字]
     將每個[新數字]的十位數加上個位數，再產生[新新數字]；共16個[新新數字]
     把所有16個[新新數字]合計加總，能整除10者，為正確卡號。 *!/
    $("#card_id").change(function () {

        var card_id = [];
        var num = 0;
        var count = 0;
        var sum = 0;
        for (count = 0; count <= 15; count++) {
            num = parseInt($('#card_id').val().substring(count, count + 1));
            //奇數位乘1 ，偶數位乘2，由16~1位
            if ((count + 1) % 2 !== 0) {
                card_id[count] = num * 2;
            }
            else {
                card_id[count] = num;
            }
        }
        for (count = 0; count <= 15; count++) {
            if (card_id[count] > 9) {
                card_id[count] = (card_id[count] % 10) + 1;
            }
            sum += card_id[count];

        }
        if (sum % 10 === 0) {
            $("#card_id_ok").show();
            $("#card_id_error").hide();
        }
        else {
            $("#card_id_error").show();
            $("#card_id_ok").hide();
        }
    })*/
</script>