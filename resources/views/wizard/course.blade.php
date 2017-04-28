<div class="course_type_no form-group">{{--課程分類--}}
    {!! Form::label('course_type_no','課程分類:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
            {!! Form::select('course_type_no', $type, null, ['placeholder' => '請選擇課程分類','id'=>'course_type_no','class'=>'form-control selectpicker'])!!}
        </div>
    </div>
</div>
<div class="form-group">{{--課程分類名稱--}}
    {!! Form::label('course_type_name','新增課程分類:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group course_type_name " style="display: none">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            {!! Form::text('course_type_name',null,['placeholder' => '課程分類名稱','class'=>'form-control'])!!}
        </div>
        <div class="checkbox">
            {!! Form::checkbox('add_course_type_no','yes',null,['id'=>'create_course_type_no','style'=>'margin-left:0px']) !!}
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
<div class="form-group">{{--新增主辦單位--}}
    {!! Form::label('church_new','新增主辦單位:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4">
        <div class="checkbox">
            {!! Form::checkbox('church_new','yes',null,['id'=>'create_church','style'=>'margin-left:0px']) !!}
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
<script>
    $(document).ready
    (function () {
        $("#step0Next").hide();
        $(".course_type_name").hide();
        $("#create_course_type_no").click(function () {/*檢查是否勾選CheckBox*/
            if ($("#create_course_type_no").prop("checked") === true) {/*如果有勾選*/
                $(".course_type_no").hide();
                /*隱藏 course_type Select*/
                $(".course_type_name").show();
                /*顯示 course_type Select*/
                var course_type_view = "稍後新增課程分類";
                var course_type_num = "{{$course_last+1}}";
                /*抓資料庫最後一筆no，放入 church_num*/
                var new_option = new Option(course_type_view, course_type_num);
                /*建立一個new_option物件，把上面的值填入*/
                document.getElementById('course_type_no').options.add(new_option);
                /*新增一個 Select option*/
                document.getElementById("course_type_no").value = "{{$course_last+1}}";
                /*設定course_type_no的value值*/
            }
            else {/*如果沒勾選*/
                $("#course_type_no").find("option:last").remove();
                /*移除Select中索引值最大Option*/
                $(".course_type_name").hide();
                $(".course_type_no").show();
            }
        });
    });
</script>