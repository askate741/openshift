@extends('template')
@section('css2')
    <script type='text/javascript' src={{ '../../js/validation/Customize.Validator-course.js' }}></script>
@stop
@section('content')
    <!--課程表-->
    <div class="container">
        @if($where=='create')
            {!! Form::open(['url'=>'course','class'=>" well form-horizontal" ,'id'=>'SignupForm']) !!}
        @else
            {!! Form::model($course,['method'=>'PATCH','action'=>['CoursesController@update',$course->no],'class'=>" well form-horizontal" ,'id'=>'SignupForm']) !!}
        @endif
        <fieldset>
            <legend>課程表</legend>
            <div class="course_type_no form-group">{{--課程分類--}}
                {!! Form::label('course_type_no','課程分類:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                        {!! Form::select('course_type_no', $type, null, ['placeholder' => '請選擇課程分類','id'=>'course_type_no','class'=>'form-control selectpicker'])!!}
                    </div>
                </div>
            </div>
            <div class="form-group">{{--課程名稱--}}
                {!! Form::label('course_name',' 課程名稱:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        {!! Form::text('course_name',null,['placeholder' => '課程名稱','class'=>'form-control'])!!}
                    </div>
                </div>
            </div>
            <div class="church form-group">{{--主辦單位--}}
                {!! Form::label('church_no','主辦單位:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                        {!! Form::select('church_no', $churches_no, null, ['placeholder' => '請選擇主辦單位','id'=>'church_no','class'=>'form-control selectpicker'])!!}
                    </div>
                </div>
            </div>
            <div class="church form-group">{{--牧者同工--}}
                {!! Form::label('member_no','牧者同工:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                        {!! Form::select('member_no', $member, null, ['placeholder' => '請選擇牧者同工','class'=>'form-control selectpicker'])!!}
                    </div>
                </div>
            </div>
            <div class="form-group">{{--堂數--}}
                {!! Form::label('section_count','堂數:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        {!! Form::text('section_count',null,['placeholder' => '堂數','class'=>'form-control'])!!}
                    </div>
                </div>
            </div>
            <div class="form-group">{{--課程日期-起--}}
                {!! Form::label('date_start','課程日期-起:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    {!! Form::date('date_start', null,['class'=>'form-control'])!!}
                </div>
            </div>
            <div class="form-group">{{--課程日期-迄--}}
                {!! Form::label('date_end','課程日期-迄:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    {!! Form::date('date_end', null,['class'=>'form-control'])!!}
                </div>
            </div>
            <div class="form-group">{{--備註--}}
                {!! Form::label('course_memo','備註:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4">
                    {!! Form::textarea('course_memo',null,['placeholder' => '備註','class'=>'form-control'])!!}
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
@stop