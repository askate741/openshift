<div class="label_left">
    <div class="label_arrange">
        <button id="btn_callback" class="btn btn-default glyphicon glyphicon-share-alt button_padding_size"
                aria-hidden="true"
                style="transform:rotateY(180deg); " onclick="window.location.pathname= url('1')"></button>
    </div>
    <div class="label_arrange">
        <button id="btn_delete" class="btn btn-default glyphicon glyphicon-trash button_padding_size"
                aria-hidden="true" data-token="{{ csrf_token() }}"></button>
    </div>
    <div class="label_arrange">
        <button id="btn_new" class="btn btn-default glyphicon glyphicon-pencil button_padding_size" aria-hidden="true"
                onclick="window.location.href = url('2')+'/edit';"></button>
    </div>
</div>
<div class="label_right">
    <div class="label_arrange">
        <label id="DT_Message">

        </label>
    </div>
    <div class="label_arrange">
        <button id="DT_left" class="btn btn-danger glyphicon glyphicon-chevron-left button_chevron_size"
                data-toggle="tooltip-message-b" data-placement="bottom" title="較舊"></button>
        <button id="DT_right" class="btn btn-danger glyphicon glyphicon-chevron-right button_chevron_size"
                data-toggle="tooltip-message-b" data-placement="bottom" title="較新"></button>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     id="caveatModal-fl">{{--警告!已經 最後一筆 或已經 第一筆--}}
    <div class="modal-dialog modal-sm" role="document">
        <div class=" modal-content panel panel-danger">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h3 class="panel-title"><strong>警告</strong></h3>
            </div>
            <div class="panel-body">
                <br>
                <p id="messageModel-fl" class="text-center"></p>{{--警告訊息!字段由js帶入--}}
                <br>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">確定</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('[data-toggle="tooltip-message-b"]').tooltip();

    });
    var data_no = '{{$data_no}}';
    /*後端傳進來的陣列*/
    var from = url("1");
    /*取得主頁面值*/
    var id = url('2');
    /*取得當前id*/
    var JSON_data = JSON.parse(data_no);
    console.log();
    $('#DT_Message').html(/*顯示目前是第幾筆，總共幾筆*/
        "第&nbsp" + ( parseInt(JSON_data.indexOf(parseInt(url('2')))) + 1) + "&nbsp筆，總共&nbsp" + JSON_data.length + "&nbsp筆"
    );
    $('#btn_delete').on('click', function () {/*透過ajax做刪除*/
        var token = $(this).data("token");
        $.ajax({
            url: "/" + from + "/delete/" + id + "/",
            type: 'POST',
            dataType: "JSON",
            data: {
                "id": id,
                "_method": 'DELETE',
                "_token": token,
            },
        });
        window.location.href = "/" + url('1');
        /*返回主頁面*/
    });
    $('#DT_right').on('click', function () {/*JSON.parse->解析陣列*/
        var present_add_no = JSON_data.indexOf(parseInt(url('2'))) + 1;
        /*取的當前id的->取得陣列符合這個值的索引-> +1*/
        var present_no =JSON_data[present_add_no];
        /*將present_add_no當作索引，找id*/

        if (present_no === undefined) {
            $("#messageModel-fl").html("已經最後一筆了");
            $('#caveatModal-fl').modal('toggle');
            /*配合bootstrap使用*/

        } else {
            $('#DT_left').addClass('disabled');
            /*禁用按鈕防止跳轉時亂點*/
            window.location.href = present_no;
            /*用索引取的陣列值，作為跳轉網址*/
        }
    });
    $('#DT_left').on('click', function () {
        var present_sub_no = JSON_data.indexOf(parseInt(url('2'))) - 1;
        /*取的當前id的->取得陣列符合這個值的索引-> -1*/
        var present_no = JSON_data[present_sub_no];
        /*將present_sub_no當作索引，*/
        if (present_no === undefined) {
            $("#messageModel-fl").html("已經是第一筆了");
            $('#caveatModal-fl').modal('toggle');
            /*配合bootstrap使用*/
        } else {
            $('#DT_right').addClass('disabled');
            /*禁用按鈕防止跳轉時亂點*/
            window.location.href = present_no;
            /*用索引取的陣列值，作為跳轉網址*/
        }
    });
    /*    var count_add = parseInt(url('2')) + 1;/!*當前頁面 id 加 1*!/
     $('#DT_right').on('click', function () {
     $.ajax({
     url: "/" + from + "/" + count_add  + "/",
     type: 'GET',
     async: false,
     complete: function (response) {
     if (response.status === 200) {
     window.location.href = count_add ;
     } else {
     count_add ++;
     $('#DT_right').trigger("click");
     /!*使用按鈕觸發，重新訪問ajax*!/
     }
     }
     });
     });
     var count_sub = parseInt(url('2')) - 1;/!*當前頁面i d 減 1*!/
     $('#DT_left').on('click', function () {
     $.ajax({
     url: "/" + from + "/" + count_sub + "/",
     type: 'GET',
     async: false,
     complete: function (response) {
     if (response.status === 200) {
     window.location.href = count_sub;
     } else {
     count_sub--;
     $('#DT_left').trigger("click");
     /!*使用按鈕觸發，重新訪問ajax*!/
     }
     }
     });
     });*/
</script>

