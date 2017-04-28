<div class="form-group">{{--教會名稱--}}
    {!! Form::label('church_name','教會名稱:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
            {!! Form::text('church_name',null,['placeholder' => '教會名稱','class'=>'form-control','id'=>'church_name']) !!}
        </div>
    </div>
</div>
<div class="form-group">{{--郵遞區號--}}
    {!! Form::label('add_zipcode',' 通訊郵遞區號:' ,['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            {!! Form::text('add_zipcode',null,['placeholder' => '通訊郵遞區號','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">{{--通訊縣市--}}
    {!! Form::label('add_city','通訊縣市:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            {!! Form::select('add_city',[],null,['placeholder' => '請選擇縣市','id'=>'add_city','class'=>'form-control selectpicker'])!!}
        </div>
    </div>
</div>
<div class="form-group">{{--通訊鄉鎮市區--}}
    {!! Form::label('add_dist','通訊鄉鎮市區:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            {!! Form::select('add_dist', [],null,['id'=>'add_dist','class'=>'form-control selectpicker'])!!}
        </div>
    </div>
</div>
<div class="form-group">{{--通訊地址--}}
    {!! Form::label('add_street','通訊地址:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            {!! Form::text('add_street',null,['placeholder' => '通訊地址','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">{{--聯絡電話--}}
    {!! Form::label('church_tel','聯絡電話:',['class'=>'col-md-4 control-label']) !!}
    <div class=" col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
            {!! Form::text('church_tel',null,['placeholder' => '電話號碼','class'=>'form-control ']) !!}
        </div>
    </div>
</div>
<div class="form-group">{{--分機--}}
    {!! Form::label('ext','分機:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
            {!! Form::text('ext',null,['placeholder' => '分機號碼','class'=>'form-control ']) !!}
        </div>
    </div>
</div>
<div class="form-group">{{--信箱--}}
    {!! Form::label('web_or_mail','信箱:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i>@</i></span>
            {!! Form::text('web_or_mail',null,['placeholder' => '信箱','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">{{--聯絡人--}}
    {!! Form::label('contact','聯絡人:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            {!! Form::text('contact',null,['placeholder' => '聯絡人','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<script>
    $("#create_church").click(function () {/*檢查是否勾選CheckBox*/
        if ($("#create_church").prop("checked") === true) {/*如果有勾選*/
            $(".church").hide();
            /*隱藏 Church Select*/
            var church_view = "稍後新增教會";
            var church_num = "{{$last+1}}";
            /*抓資料庫最後一筆教會id，放入 church_num*/
            var new_option = new Option(church_view, church_num);
            /*建立一個new_option物件，把上面的值填入*/
            document.getElementById('church_no').options.add(new_option);
            /*新增一個 Select option*/
            document.getElementById("church_no").value = "{{$last+1}}";
            /*設定church_no的value值*/
        }
        else {/*如果沒勾選*/
            $("#church_no").find("option:last").remove();
            /*移除Select中索引值最大Option*/
            $(".church").show();
            /*顯示 Church Select*/
        }
    });
    $(function () {
        $("#SignupForm").JsonToAddress({
            zipcode_name: "add_zipcode",
            city_name: "add_city",
            dist_name: "add_dist",
        });
    });
</script>