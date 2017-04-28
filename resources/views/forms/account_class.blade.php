@extends('template')
@section('css2')
    <script type='text/javascript' src={{ '../../js/validation/Customize.Validator-account_class.js' }}></script>
@stop
@section('content')
    <!--會計類別-->
    <div class="container">
        @if($where=='create')
            {!! Form::open(['url'=>'account_class','class'=>" well form-horizontal" ,'id'=>'SignupForm']) !!}
        @else
            {!! Form::model($account_class,['method'=>'PATCH','action'=>['AccountClassesController@update',$account_class->no],'class'=>" well form-horizontal" ,'id'=>'SignupForm']) !!}
        @endif
        <fieldset>
            <legend>會計科目</legend>
            <div class="form-group">{{--會計類別--}}
                {!! Form::label('class','會計類別:' ,['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4">
                    <label class="radio-inline">
                        {!! Form::radio('class', '0',false,['id'=>'in_radio']) !!}收入
                    </label>
                    <label class="radio-inline">
                        {!! Form::radio('class', '1',true,['id'=>'out_radio']) !!}支出
                    </label>
                </div>
            </div>
            <div class="subclass1_no form-group">{{--會計科目1--}}
                {!! Form::label('subclass1_no','會計科目1:',['class'=>'col-md-4 control-label']) !!}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    {!! Form::select('subclass1_no',$in, null,['placeholder' => '請選擇收入科目','id'=>'in','class'=>'form-control selectpicker','style'=>'display:none','disabled'=>'disabled'])!!}<!-- 收入的會計科目 大項  -->
                    {!! Form::select('subclass1_no',$out, null,['placeholder' => '請選擇支出科目','id'=>'out','class'=>'form-control selectpicker'])!!}<!-- 支出的會計科目 大項  -->
                    </div>
                </div>
            </div>
        @if($where=='create')
                <div class="form-group">{{--新增會計科目1--}}
                    {!! Form::label('subclass1_name','新增會計科目1:',['class'=>'col-md-4 control-label']) !!}
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group subclass1_name" style="display: none">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                            {!! Form::text('subclass1_name',null,['id'=>'subclass1_name','placeholder' => '會計科目1','class'=>'form-control','disabled'=>'disabled'/*,'style'=>'display:none'*/]) !!}
                        </div>
                        <div class="checkbox">
                            {!! Form::checkbox('create_subclass1_name','yes',null,['id'=>'create_subclass1_name','style'=>'margin-left:0px']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">{{--新增會計科目2--}}
                    {!! Form::label('subclass2_name','新增會計科目2:',['id'=>'change_title','class'=>'col-md-4 control-label']) !!}
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                            {!! Form::text('subclass2_name',null,['id'=>'	subclass_name2','placeholder' => '會計科目2','class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
            @else
                <div class="form-group">{{--新增會計科目2--}}
                    {!! Form::label('subclass2_name','會計科目2:',[/*'id'=>'change_title',*/'class'=>'col-md-4 control-label']) !!}
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                            {!! Form::text('subclass2_name',$account_class->sub2class->subclass2_name,['id'=>'subclass_name2','placeholder' => '會計科目2','class'=>'form-control']) !!}
                            {!! Form::hidden('subclass2_no',null,['size'=>16,'maxlength'=>32]) !!}
                        </div>
                    </div>
                </div>
            @endif
            <br>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-warning  form-control" id="account_class-post">送出<span
                                class="glyphicon glyphicon-send "></span></button>
                </div>
            </div>
            </fieldset>
        {!! Form::close() !!}
    </div>
    <script>
        var subclass1_view = "稍後新增會計科目1";
        var subclass1_num = "{{$subclass1_last+1}}";
        var current_id;
        $(document).ready
        (function () {
            if (location.href.match("edit") !== null) {/*在網頁載入時，判斷網址是否為edit*/
//               $("#change_title").text("會計科目2:");/*修改原標題*/
                if ($("#out").val() === "") {/*如果支出為空*/
                    $("#out").hide().prop('disabled', true);
                    $("#in").show().prop('disabled', false);
                }
            }
        });
        /*存當前 select 屬性不等於 隱藏的 id */
        $("#create_subclass1_name").click(function () {/*檢查是否勾選CheckBox*/
            $(".subclass1_no select").each(function () {/*遍歷 .subclass1_no 所有 select*/
                if ($(this).is(":hidden") !== true) {/*當前的 select 如果不等於 隱藏*/
                    current_id = "#" + $(this).attr('id');
                    /* current_id 會等於當前 select 的 id*/
                }
            });
            if ($("#create_subclass1_name").prop("checked") === true) {/*如果有勾選*/
                $("#subclass1_name").show().prop('disabled', false);
                $(".subclass1_name").show();
                $(".subclass1_no").hide();
                $(current_id).append($("<option></option>").prop("value", subclass1_num).text(subclass1_view));
                /*新增option，並設定值*/
                $(current_id).val(subclass1_num);
            }
            else {/*如果沒勾選*/
                $(".subclass1_no").show();
                $("#subclass1_name").hide().prop('disabled', true);
                $(".subclass1_name").hide();
                $(".subclass1_no").find("option[value=" + subclass1_num + "]").remove();
            }
        });
        $("#in_radio").click(function () {
            $("#SignupForm")[0].reset();
            $("#in_radio").prop("checked", true);
            $(".subclass1_no").find("option[value=" + subclass1_num + "]").remove();
            $("#in").show().prop('disabled', false);
            $("#out").hide().prop('disabled', true);
            if ($("#create_subclass1_name").prop("checked") === true) {/*如果有勾選*/
                $("#subclass1_name").show().prop('disabled', false);
                $(".subclass1_name").show();
                $(".subclass1_no").hide();
                $("#in").append($("<option></option>").prop("value", subclass1_num).text(subclass1_view));
                /*新增option，並設定值*/
                $("#in").val(subclass1_num);
            }
            else {/*如果沒勾選*/
                $(".subclass1_no").show();
                $("#subclass1_name").hide().prop('disabled', true);
                $(".subclass1_name").hide();
            }
        });
        $("#out_radio").click(function () {
            $("#SignupForm")[0].reset();
            $("#out_radio").prop("checked", true);
            $(".subclass1_no").find("option[value=" + subclass1_num + "]").remove();
            $("#out").show().prop('disabled', false);
            $("#in").hide().prop('disabled', true);
            if ($("#create_subclass1_name").prop("checked") === true) {/*如果有勾選*/
                $("#subclass1_name").show().prop('disabled', false);
                $(".subclass1_name").show();
                $(".subclass1_no").hide();
                $("#out").append($("<option></option>").prop("value", subclass1_num).text(subclass1_view));
                /*新增option，並設定值*/
                $("#out").val(subclass1_num);
            }
            else {/*如果沒勾選*/
                $(".subclass1_no").show();
                $("#subclass1_name").hide().prop('disabled', true);
                $(".subclass1_name").hide();
            }
        });
    </script>
@stop
