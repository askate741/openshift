<div class="label_left">
    <div class="label_arrange" onclick="window.location.href = '{{$names}}'">
        <button id="btn_update" class="btn btn-default glyphicon glyphicon-upload" aria-hidden="true"
                style="padding: 1% 5%;margin: 0 -0.5%;"></button>
    </div>
    <div class="label_arrange" onclick="window.location.href = '/excel/{{$where}}/export'">
        <button id="btn_download" class="btn btn-default glyphicon glyphicon-download" aria-hidden="true"
                style="padding: 1% 5%;margin: 0 -0.5%;"></button>
    </div>

    <div class="label_arrange">
        <button id="btn_trash" class="btn btn-default glyphicon glyphicon-trash" aria-hidden="true"
                style="padding: 1% 5%;margin:0 -0.5%;"></button>
    </div>

    <div class="label_arrange" onclick="window.location.href = 'create'">
        <button id="btn_new" class="btn btn-default glyphicon glyphicon-plus" aria-hidden="true"
                style="padding: 1% 5%;margin:0 -0.5%;"></button>
    </div>
</div>

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
        <button id="DT_left" class="btn btn-danger glyphicon glyphicon-chevron-left"
                style="margin-bottom: 5px; padding: 0.8% 3%"></button>
        <button id="DT_right" class="btn btn-danger glyphicon glyphicon-chevron-right"
                style="margin-bottom: 5px; padding: 0.8% 3%"></button>
    </div>
</div>
