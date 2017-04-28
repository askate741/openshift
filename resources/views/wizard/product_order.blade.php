
<div class="form-group">{{--產品流向--}}
    {!! Form::label('product_flow','產品流向:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4">
        <label class="radio-inline">
            {!! Form::radio('product_flow','0',true,['id'=>'in_radio']) !!}進貨
        </label>
        <label class="radio-inline">
            {!! Form::radio('product_flow','1',false, ['id'=>'out_radio']) !!}出貨
        </label>
    </div>
</div>
<div class="product_member_no" style="display: none">
    <div class="member_no form-group">{{--購買會員--}}
        {!! Form::label('member_no','購買會員:',['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                {!! Form::select('member_no', $members, null, ['placeholder' => '請選擇會員','id'=>'member_no','disabled'=>'disabled','class'=>'form-control selectpicker'])!!}
            </div>
        </div>
    </div>
    @if($where=='create')
        <div class="form-group">{{--新增會員--}}
            {!! Form::label('member_text','新增會員:',['id'=>'member_text','class'=>'col-md-4 control-label']) !!}
            <div class="col-md-4">
                <div class="checkbox">
                    {!! Form::checkbox('create_member','yes',null,['id'=>'create_member','style'=>'margin-left:0px']) !!}
                </div>
            </div>
        </div>
    @endif
</div>
<div class="product_no form-group">{{--產品名稱--}}
    {!! Form::label('product_no','產品名稱:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
            {!! Form::select('product_no',$products, null, ['placeholder' => '請選擇產品','id'=>'product_no','class'=>'form-control selectpicker'])!!}
        </div>
    </div>
</div>
<!--新增產品-->
@if($where=='create')
    <div class="create_product form-group">{{--新增產品--}}
        {!! Form::label('create_product','新增產品:',['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-4 inputGroupContainer">
            <div class="product_name input-group" style="display: none">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                {!! Form::text('product_name',null,['placeholder' => '輸入產品名稱'/*,'id'=>'product_name'*/,'class'=>'form-control'])!!}
            </div>
            <div class="checkbox">
                {!! Form::checkbox('create_product','yes',null,['id'=>'create_product','style'=>'margin-left:0px']) !!}
            </div>
        </div>
    </div>
@endif
<div class="form-group">{{--商品庫存--}}
    {!! Form::label('inventory','商品庫存:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            @if($where=='create')
                {!! Form::text('inventory',null,['id'=>'inventory','disabled'=>'disabled','style'=>'text-align:center;','class'=>'form-control'])!!}
            @else
                {!! Form::text('inventory',$inventory,['id'=>'inventory','disabled'=>'disabled','style'=>'text-align:center;','class'=>'form-control'])!!}
            @endif
        </div>
    </div>
</div>
<div class="actual_price form-group">{{--商品庫存--}}
    {!! Form::label('actual_price','實際價格:',['id'=>'actual_price_label','class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            {!! Form::text('actual_price',null,['placeholder' => '商品單價','id'=>'actual_price','class'=>'form-control'])!!}
        </div>
    </div>
</div>
<div class="form-group">{{--進貨數量--}}
    {!! Form::label('quantity','進貨數量:',['id'=>'quantity_label','class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            {!! Form::text('quantity',null,['placeholder' => '進貨數量','id'=>'quantity','class'=>'form-control'])!!}
        </div>
    </div>
</div>
<div class="form-group">{{--日期--}}
    {!! Form::label('order_date','日期:',['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4 inputGroupContainer">
        {!! Form::date('order_date', \Carbon\Carbon::now(),['class'=>'form-control'])!!}
    </div>
</div>
<script>
    var member_view = "稍後新增會員";
    var member_num = "{{ $member_last+1}}";
    var product_view = "稍後新增產品";
    var product_num = "{{ $product_last+1}}";
    $(document).ready(function () {
        if (location.href.match("edit") !== null) {/*在網頁載入時，判斷網址是否為edit*/
            if ($("#member_no").val() !== "") {/*如果會員不為空*/
                $("#out_radio").prop('checked', true);
                $("#in_radio").prop('checked', false);
                $("#member_no").prop('disabled',false);
                $(".product_member_no").show();
                $("#quantity_label").text("出貨數量:");
                $("#quantity").val($("#quantity").val().replace(/[^0-9]/g, ""));
            }
        }
        $("#step0Next").hide();
        $("#create_member").click(function () {/*檢查是否勾選CheckBox*/
            if ($("#create_member").prop("checked") === true) {/*如果有勾選*/
                $("#step0Next").show();
                $("#SaveAccount").hide();
                $(".member_no").hide();
                $("#member_no").append($("<option></option>").prop("value", member_num).text(member_view));
                $("#member_no").val(member_num);
            }
            else {/*如果沒勾選*/
                $("#step0Next").hide();
                $("#SaveAccount").show();
                $('#member_no option[value=' + member_num + ']').remove();
                $(".member_no").show();
            }
        });
        $("#create_product").click(function () {/*檢查是否勾選CheckBox*/
            if ($("#create_product").prop("checked") === true) {/*如果有勾選*/
                $(".product_no").hide();
//                $("#product_name").show();
                $(".product_name").show();
//                $("#product_price").show();
                $("#product_no").append($("<option></option>").prop("value", product_num).text(product_view));
                $("#product_no").val(product_num);
                $("#actual_price_label").text("產品價格:");
                $("#original_price").remove();
                /*移除原價span*/
                $("#inventory").val("");
            }
            else {/*如果沒勾選*/
                $("#product_no").find("option:last").remove();
                $(".product_no").show();
//                $("#product_name").hide();
                $(".product_name").hide();
                $("#actual_price_label").text("實際價格:");
//                $("#product_price").hide();
            }
        });
        $("#in_radio").click(function () {
            $("#step0Next").hide();
            $("#SaveAccount").show();
            $("#stepDesc0").hide();
            $("#stepDesc1").hide();
            $(".product_member_no").hide();
            $("#quantity_label").text("進貨數量:");
            $(".create_product").show();
            $("#member_no").prop("disabled", true);
            $("#SignupForm")[0].reset();
            /*清空表單所有欄位*/
            $("#in_radio").prop("checked", true);
            /*設定選擇進貨貨*/
            $("#original_price").remove();
            /*移除原價span*/

        });
        $("#out_radio").click(function () {
            $(".product_member_no").show();
            $(".member_no").show();
            $("#actual_price_label").text("實際價格:");
            $("#quantity_label").text("出貨數量:");
            $(".create_product").hide();
            $("#member_no").prop("disabled", false);
            $(".product_no").show();
            $(".product_name").hide();
//            $("#product_name").hide();
//            $("#product_price").hide();
            $("#SignupForm")[0].reset();
            /*清空表單所有欄位*/
            $("#out_radio").prop("checked", true);
            /*設定選擇出貨*/
            $("#original_price").remove();
            /*移除原價span*/
        });
    });
</script>