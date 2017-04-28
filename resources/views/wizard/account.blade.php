<div class="form-group">{{--會計類別--}}
    {!! Form::label('account_class','會計類別:' ,['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4">
        <label class="radio-inline">
            {!! Form::radio('account_class', '0',false,['id'=>'in_radio']) !!}收入
        </label>
        <label class="radio-inline">
            {!! Form::radio('account_class', '1',true,['id'=>'out_radio']) !!}支出
        </label>
    </div>
</div>
<div class="member_no form-group" style="display:none">{{--會員名稱--}}
    {!! Form::label('member_no','會員名稱:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
            {!! Form::select('member_no',$members, null,['placeholder' => '請選擇會員名稱','id'=>'member_no','disabled'=>'disabled','class'=>'form-control selectpicker'])!!}
        </div>
    </div>
</div>
<div class="member_new form-group" style="display:none">{{--新增會員--}}
    {!! Form::label('member_new','新增會員:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4">
        <div class="checkbox">
            {!! Form::checkbox('member_new','yes',null,['id'=>'create_member','style'=>'margin-left:0px']) !!}
        </div>
    </div>
</div>
{{--</div>--}}
<div class="form-group">{{--會計科目1--}}
    {!! Form::label('subclass1_no','會計科目1:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
        {!! Form::select('subclass1_no',$in, null,['placeholder' => '請選擇收入科目1','id'=>'in','class'=>'form-control selectpicker','style'=>'display:none','disabled'=>'disabled'])!!}<!-- 收入的會計科目 大項  -->
        {!! Form::select('subclass1_no',$out, null,['placeholder' => '請選擇支出科目1','id'=>'out','class'=>'form-control selectpicker'])!!}<!-- 支出的會計科目 大項  -->
        </div>
    </div>
</div>
<div class="form-group">{{--會計科目2--}}
    {!! Form::label('account_class_no','會計科目2:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            {!! Form::select('account_class_no',[], null,['placeholder' => '請選擇會計科目2','id'=>'subclass2_no','class'=>'form-control selectpicker'])!!}{{--會計科目2 no 會等於 account_class_no--}}
        </div>
    </div>
</div>
<div class="form-group">{{--收支流向--}}
    {!! Form::label('cert_type','收支流向:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            {!! Form::select('cert_type', ['C'=>'現金','B'=>'銀行','P'=>'郵局','S'=>'信用卡'], null,['placeholder' => '請選擇收支流向','class'=>'form-control selectpicker'])!!}{{--會計科目2 no 會等於 account_class_no--}}
        </div>
    </div>
</div>
<div class="form-group">{{--日期--}}
    {!! Form::label('account_date','日期:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::date('account_date',null,['class'=>'form-control'])!!}
    </div>
</div>
<div class="form-group">{{--摘要--}}
    {!! Form::label('account_memo','摘要:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::textarea('account_memo',null,['placeholder' => '摘要','class'=>'form-control'])!!}
    </div>
</div>
<div class="form-group">{{--金額--}}
    {!! Form::label('account_amount','金額:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            {!! Form::text('account_amount',null,['placeholder' => '金額','class'=>'form-control'])!!}
        </div>
    </div>
</div>
<div class="form-group">{{--收支憑證--}}
    {!! Form::label('cert','收支憑證:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            {!! Form::text('cert',null,['placeholder' => '收支憑證','class'=>'form-control'])!!}
        </div>
    </div>
</div>
<script>
    $(document).ready
    (function () {
        var member_view = "稍後新增會員";
        var member_num = "{{$member_last+1}}";
        $("#step0Next").hide();

        $("#in_radio").click(function () {
            $("#in").show().prop('disabled', false);
            $("#out").hide().prop('disabled', true);
            $("#out").val($("#out").find('option:first').val());
            /*還原選項*/
            //$(".account_member_no").show();
            $(".member_no").show();
            $(".member_new").show();
            $("#member_no").prop("disabled", false);
            $("#subclass2_no").empty().append("<option selected='selected'>請選擇會計科目2</option>");
        });
        $("#out_radio").click(function () {
            $("#out").show().prop('disabled', false);
            // $(".account_member_no").hide();
            $(".member_no").hide();
            $(".member_new").hide();
            $("#in").hide().prop('disabled', true);
            $("#in").val($("#in").find('option:first').val());
            /*還原選項*/
            $("#create_member").prop("checked", false);
            $('#member_no option[value=' + member_num + ']').remove();
            $("#member_no").val($("#member_no").find('option:first').val()).prop("disabled", true);
            $("#subclass2_no").empty().append("<option selected='selected'>請選擇會計科目2</option>");
            $("#step0Next").hide();
            $("#SaveAccount").show();
            $("#stepDesc0").hide();
            $("#stepDesc1").hide();
        });
        $("#create_member").click(function () {/*檢查是否勾選CheckBox*/
            if ($("#create_member").prop("checked") === true) {/*如果有勾選*/
                $(".member_no").hide();
                $(".member_new").hide();
                /*隱藏 member_no class*/
                $("#step0Next").show();
                $("#SaveAccount").hide();
                $("#member_no").append($("<option></option>").prop("value", member_num).text(member_view));
                /*新增option，並設定值*/
                $("#member_no").val(member_num);
                /*設定member_no的value值*/
            }
            else {/*如果沒勾選*/
                $("#member_no").find("option:last").remove();
                $(".member_no").show();
                $(".member_new").show();
                /*顯示 member_no class*/
                $("#step0Next").hide();
                $("#SaveAccount").show();
            }
        });
    });
</script>

