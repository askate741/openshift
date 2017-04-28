<div class="member_no form-group">{{--會員名稱--}}
    {!! Form::label('member_no','會員名稱:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            {!! Form::select('member_no', $members, null,['placeholder' => '請選擇會員名稱','id'=>'member_no','class'=>'form-control selectpicker'])!!}
        </div>
    </div>
</div>
<div class="form-group">{{--新增會員--}}
    {!! Form::label('add_member_no','新增會員:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4">
        <div class="checkbox">
            {!! Form::checkbox('add_member_no','yes',null,['id'=>'create_member','style'=>'margin-left:0px']) !!}
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
            {!! Form::select('course_no',[], null, ['placeholder' => '請選擇課程名稱','class'=>'form-control selectpicker'])!!}
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
<script>
    $(document).ready
    (function () {
        $("#step0Next").hide();
        $(".course_type").hide();
        $("#create_member").click(function () {/*檢查是否勾選CheckBox*/
            if ($("#create_member").prop("checked") === true) {/*如果有勾選*/
                $(".member_no").hide();
                /*隱藏 member_no class*/
                $("#step0Next").show();
                $("#SaveAccount").hide();
                var member_view = "稍後新增會員";
                var member_num = "{{$member_last+1}}";
                /*抓資料庫最後一筆會員id，放入 church_num*/
                var new_option = new Option(member_view, member_num);
                /*建立一個new_option物件，把上面的值填入*/
                document.getElementById('member_no').options.add(new_option);
                /*新增一個 Select option*/
                document.getElementById("member_no").value = "{{$member_last+1}}";
                /*設定member_no的value值*/
            }
            else {/*如果沒勾選*/
                $("#member_no").find("option:last").remove();
                $(".member_no").show();
                /*顯示 member_no class*/
                $("#step0Next").hide();
                $("#SaveAccount").show();
            }
        });
    });
</script>