{!! Form::label('name','教會名稱:') !!}
{!! Form::text('name',null,['size'=>16,'maxlength'=>16]) !!}
<br>
{!! Form::label('add_zipcode',' 通訊郵遞區號:') !!}
{!! Form::text('add_zipcode',null,['size'=>5,'maxlength'=>5]) !!}
<br>
{!! Form::label('add','通訊地址:') !!}
{!! Form::component('address', 'cells.addresses', ['name1'=>'add_city','name2'=>'add_dist']) !!}
{!!  Form::address('add_city')  !!}
{!! Form::text('add_street',null,['size'=>25,'maxlength'=>30,'placeholder' => '請輸入通訊地址']) !!}
<br>
{!! Form::label('tel','聯絡電話:') !!}
{!! Form::text('tel',null,['size'=>10,'maxlength'=>10]) !!}
{!! Form::label('ext','分機') !!}
{!! Form::text('ext',null,['size'=>3,'maxlength'=>5]) !!}
<br>
{!! Form::label('web_or_mail','網站:') !!}
{!! Form::text('web_or_mail',null,['size'=>32,'maxlength'=>32]) !!}
<br>
{!! Form::label('contact','聯絡人:') !!}
{!! Form::text('contact','黃大銘',['size'=>8,'maxlength'=>16]) !!}
