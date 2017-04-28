@extends('template')
@section('css2')
    <script type='text/javascript' src={{ '../../js/CourseTypeAjax.js' }}></script>{{--引入課程Ajax--}}
    <script type='text/javascript' src={{ '../../js/validation/Customize.Validator-course_registration.js' }}></script>
@stop
@section('content')
    <!--修課紀錄-->
    <div class="container">
        {!! Form::model($course_registration,['method'=>'PATCH','action'=>['CourseRegistrationsController@update',$course_registration->no],'class'=>" well form-horizontal" ,'id'=>'SignupForm']) !!}
        <fieldset>
            <legend>修課紀錄表</legend>
            <div class="member_no form-group">{{--會員名稱--}}
                {!! Form::label('member_no','會員名稱:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        {!! Form::select('member_no', $members, null,['placeholder' => '請選擇會員名稱','id'=>'member_no','class'=>'form-control selectpicker'])!!}
                    </div>
                </div>
            </div>
            <div class="course_type_no form-group">{{--課程分類--}}
                {!! Form::label('course_type_no','課程分類:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        {!! Form::select('course_type_no', $types , null, ['placeholder' => '請選擇課程分類','id'=>'course_type_no','class'=>'form-control selectpicker'])!!}
                    </div>
                </div>
            </div>
            <div class="course_type_no form-group">{{--課程名稱--}}
                {!! Form::label('course_no','課程名稱:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        {!! Form::select('course_no', $courses, null, ['placeholder' => '請選擇課程名稱','class'=>'form-control selectpicker'])!!}
                    </div>
                </div>
            </div>
            <div class="devotee_name form-group">{{--參與人數--}}
                {!! Form::label('people_count','參與人數:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        {!! Form::text('people_count', null, ['placeholder' => '參與人數','class'=>'form-control'])!!}
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
@stop