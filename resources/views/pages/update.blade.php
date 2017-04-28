<div id="dialog" title="上傳檔案">{{--上傳成功後會顯示的頁面--}}
    <label>請上傳 Excel</label>
    <form action="" method="POST" ENCTYPE="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

        @if($where =='product_order')

            {!! Form::label('上傳產品表')!!}
            <input type="file" name="p_file"><br>
            {!! Form::label('上傳產品訂單')!!}
            <input  type="file" name="file"><br>
        @elseif($where =='account_class')
            {!! Form::label('上傳會計大項')!!}
            <input type="file" name="p_file"><br>
            {!! Form::label('上傳會計科目')!!}
            <input  type="file" name="file"><br>
        @else
            <input type="file" name="file"><br>
        @endif
        <button type="submit">載入</button>
    </form>
</div>
<div id="show_content" title="{{$where}}">
</div>
