<div class="label_left">
@if($update=='show')<!--在新增時-->
    <div class="label_arrange">
        <button id="btn_update" class="btn btn-default glyphicon glyphicon-upload button_padding_size"
                aria-hidden="true"
                onclick="window.location.href = '{{$names}}'"></button>
    </div>
@elseif($update=='update')<!--在上傳介面時-->
    {{--<span id="note">*上傳請再按一次</span><br><!--上傳提示-->--}}
    <div class="label_arrange">
        <button id="opener" class="btn btn-default glyphicon glyphicon-upload button_padding_size"
                aria-hidden="true"></button>
    </div>
    @endif
    @if($where !='show')<!--不是在新增時-->
    @if($where =='product_order'||$where =='account_class')
        <div class="label_arrange">
            <button id="download" class="btn btn-default glyphicon glyphicon-download button_padding_size"
                    aria-hidden="true"></button>
        </div>
    @else
        <div class="label_arrange">
            <button id="btn_download" class="btn btn-default glyphicon glyphicon-download button_padding_size"
                    aria-hidden="true"
                    onclick="window.location.href = '/excel/{{$where}}/export'"></button>
        </div>
    @endif
    @endif
    <div class="label_arrange">
        <button id="btn_trash" class="btn btn-default glyphicon glyphicon-trash button_padding_size"
                aria-hidden="true"></button>
    </div>
    @if($where !='show')
        <div class="label_arrange">
            <button id="btn_new" class="btn btn-default glyphicon glyphicon-plus button_padding_size" aria-hidden="true"
                    onclick="window.location.href = '{{$where}}/create'"></button>
        </div>
    @elseif($where =='show')
        <div class="label_arrange">
            <button id="btn_new" class="btn btn-default glyphicon glyphicon-plus button_padding_size" aria-hidden="true"
                    onclick="window.location.href = 'create'"></button>
        </div>
    @endif
</div>
{{--@if($pages=='show')<!--看全部資料時，分頁--> <!--看單一資料時，不會顯示-->--}}
<div class="label_right">
    <div class="label_arrange">
        <label id="DT_Message"></label>
    </div>
    <div class="label_arrange">
        <label for="DT_Select">顯示:</label>
        <select id="DT_Select" style="padding: 0.5% ">　
            <option id="DT_10" value="10">10</option>
            <option id="DT_15" value="15">15</option>
            <option id="DT_20" value="20">20</option>
            <option id="DT_all" value="-1">全部</option>
        </select>
        <label for="DT_Select">筆</label>
    </div>
    <div class="label_arrange">
        <button id="DT_left" class="btn btn-danger glyphicon glyphicon-chevron-left button_chevron_size"
                data-toggle="tooltip-message-b" data-placement="bottom" title="較新"></button>
        <button id="DT_right" class="btn btn-danger glyphicon glyphicon-chevron-right button_chevron_size"
                data-toggle="tooltip-message-b" data-placement="bottom" title="較舊"></button>
    </div>
</div>
{{--@endif--}}

