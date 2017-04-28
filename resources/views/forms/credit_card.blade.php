    {!! Form::label('issue_bank','發卡銀行:') !!}
    {!! Form::text('issue_bank',null,['size'=>16,'maxlength'=>16]) !!}
    <br>
    {!! Form::label('card_id','信用卡卡號:') !!}
    {!! Form::text('card_id',['size'=>4,'maxlength'=>4],null) !!} -
    {!! Form::text('card_id',['size'=>4,'maxlength'=>4],null) !!} -
    {!! Form::text('card_id',['size'=>4,'maxlength'=>4],null) !!} -
    {!! Form::text('card_id',['size'=>4,'maxlength'=>4],null) !!}
    <br>
    {!! Form::label('card_code','信用卡檢查碼:') !!}
    {!! Form::text('card_code',null) !!}
    <br>
    {!! Form::label('type','信用卡別:') !!}
    {!! Form::select('type',['V'=>'VISA','M'=>'Master','J'=>'JCB','U'=>'聯合信用卡'], null, ['placeholder' => '請選擇信用卡別'])!!}
    <br>
    {!! Form::label('card_end','信用卡截止日:') !!}
    {!! Form::date('card_end')!!}
    <br>
    {!! Form::label('donate_start','捐款期間-起:') !!}
    {!! Form::date('donate_start')!!}
    <br>
    {!! Form::label('donate_end','捐款期間-迄:') !!}
    {!! Form::date('donate_end')!!}
    <br>
    {!! Form::label('donate_times','捐款期間-次數:') !!}
    {!! Form::text('donate_times',null) !!}
    <br>
    {!! Form::label('donate_way','捐款方式:') !!}
    {!! Form::select('donate_way',['S'=>'單次','M'=>'每月','Y'=>'每年','O'=>'其他'], null, ['placeholder' => '請選擇捐款方式'])!!}
    <br>
    {!! Form::label('amount','承諾總金額:') !!}
    {!! Form::text('amount',null) !!}
    <br>
    {!! Form::open(['url'=>'registered_member_list_3']) !!}
    {!! Form::submit('下一步',['class'=>'btn btn-success form-control']) !!}
    {!! Form::close() !!}