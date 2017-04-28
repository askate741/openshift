@extends('app')
@section('css')
    <link  type="text/css" rel="stylesheet" href={{ '../css/login.css' }}>
@stop
@section('body')
    <section>
        <div id="login_sign">
            <div class="login_text">
                {!! Form::label('user','帳號',['id'=>'user_label','class'=>'control-label col-sm-1']) !!}
                {!! Form::text('user',null,['id'=>'user_text','class'=>'form-control col-sm-2','placeholder'=>'輸入帳號']) !!}
            </div>
            <div class="login_text">
                {!! Form::label('password','密碼',['id'=>'password_label','class'=>'control-label col-sm-1 ']) !!}
                {!! Form::text('password',null,['id'=>'password_text','class'=>'form-control col-sm-2','placeholder'=>'輸入密碼']) !!}
            </div>
            <div class="login_text">
                {!! Form::checkbox('remember', 'remember',null, ['id' => 'remember']) !!}
                {!! Form::label('remember', Lang::get('記住我'), ['id' => 'remember']) !!}
                {!! Form::button('登入', ['id'=>'btn_login','class' =>'btn btn-default'])!!}
            </div>
        </div>
    </section>
@stop