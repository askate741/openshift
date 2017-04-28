<script>
    $(function () {
        $('[data-toggle="tooltip-message-b"]').tooltip();
    });
    $('#table').DataTable({
        "dom": "",
        /*        "paging": false, /!*禁用分頁、選單顯示*!/
         "ordering": false, /!*禁用欄位排序*!/
         "info": false, /!*進用左下角顯示欄位*!/
         "scrollY": 200,
         "scrollCollapse": true,*/
        "language": {
            "zeroRecords": "沒有任何相關據",
        },
        "lengthChange": false, /*禁 顯示幾筆*/
        /*        "infoCallback": function (settings, start, end, max, total, pre) {
         var api = this.api();
         var Info = api.page.info();
         return $('#DT_Message').html("顯示&nbsp" + Info.pages + "&nbsp頁&nbsp，" + start + "&nbsp到&nbsp" + end + "&nbsp筆");
         },*/
        "columnDefs": [
            {
                orderable: false,
                targets: 0
            }
        ],
        "order": [
            [1, null]
        ],

        /*        "pagingType": "simple_numbers",
         "dom": '<"#table_pages" p>'*/
    });
    var table = $('#table').DataTable();
    /*顯示幾筆*/
    var info = table.page.info();
    var info_start = info.start + 1;
    if (info.end === 0) {
        info_start = 0;
    }
    $('#DT_Message').html(
        "總共&nbsp" + info.pages + "&nbsp頁&nbsp，" + info_start + "&nbsp到&nbsp" + info.end + "&nbsp筆"
    );
    /*查詢*/
    $('#DT_Search').on('keyup select mouseout', function () {
        table.search(this.value, false, false).draw();
        var info = table.page.info();
        var info_start = info.start + 1;
        if (info.end === 0) {
            info_start = 0;
        }
        $('#DT_Message').html(
            "總共&nbsp" + info.pages + "&nbsp頁&nbsp，" + info_start + "&nbsp到&nbsp" + info.end + "&nbsp筆"
        );
    });
    /*分頁*/
    /*        $('#first').on('click', function () {
     table.page('first').draw(false);
     });*/
    $('#DT_left').on('click', function () {
        table.page('previous').draw(false);
        var info = table.page.info();
        var info_start = info.start + 1;
        if (info.end === 0) {
            info_start = 0;
        }
        $('#DT_Message').html(
            "總共&nbsp" + info.pages + "&nbsp頁&nbsp，" + info_start + "&nbsp到&nbsp" + info.end + "&nbsp筆"
        );
    });
    $('#DT_right').on('click', function () {
        table.page('next').draw(false);
        var info = table.page.info();
        var info_start = info.start + 1;
        if (info.end === 0) {
            info_start = 0;
        }
        $('#DT_Message').html(
            "總共&nbsp" + info.pages + "&nbsp頁&nbsp，" + info_start + "&nbsp到&nbsp" + info.end + "&nbsp筆"
        );
    });
    /*        $('#last').on('click', function () {
     table.page('last').draw(false);
     });*/
    /*下拉式*/
    $("#DT_Select").change(function () {
        table.page.len($("#DT_Select").val()).draw();
        var info = table.page.info();
        var info_start = info.start + 1;
        if (info.end === 0) {
            info_start = 0;
        }
        $('#DT_Message').html(
            "總共&nbsp" + info.pages + "&nbsp頁&nbsp，" + info_start + "&nbsp到&nbsp" + info.end + "&nbsp筆"
        );
    });
    $('#DT_10').on('click', function () {
        table.page.len(10).draw();
    });
    $('#DT_15').on('click', function () {
        table.page.len(15).draw();
    });
    $('#DT_20').on('click', function () {
        table.page.len(20).draw();
    });
    $('#DT_all').on('click', function () {
        table.page.len(-1).draw();
    });
    /*陣列存放show標頭*/
    var show_title = {
        "church": ["教會編號", "教會名稱", "通訊郵遞區號", "通訊縣市", "通訊地址", "電話號碼", "分機號碼", "網站", "聯絡人"],
    };

    /*選擇性刪除 可以多選*/
    $('#table tbody').on('click', 'tr', function () {
        /*

         var id = $('#table tbody tr').data('id');
         $("#show_content").dialog("open");
         $("#show_content").empty();
         $.ajax({
         url: '' + "/show/" + id + "/",
         type: 'GET',
         dataType: 'JSON',
         async: false,
         success: function (data) {
         $("#show_content").append("<div>"+data['no']+"</div>");
         $("#show_content").append("<div>"+data['church_name']+"</div>");
         },
         cache: false
         });
         */

        if ($(this).hasClass('selected')) {/*如果有 selected 這個class*/
            $(this).toggleClass('selected').css("background-color", "");
            /*移除 selected 設成白色*/
            $(this).find("input:checkbox").prop("checked", false);
        } else {
            $(this).toggleClass('selected').css("background-color", "#e5e5e5");
            /*添加 selected 設成灰色*/
            $(this).find("input:checkbox").prop("checked", true);
        }
    });
    /*全選刪除*/
    $("#check_all").on('click', function () {
            if ($("#check_all").prop("checked")) {
                $("input[name='check_no_col[]']").prop("checked", true).parents('tr').addClass('selected').css("background-color", "#e5e5e5");
                /*添加 selected 設成灰色*/
            } else {
                $("input[name='check_no_col[]']").prop("checked", false).parents('tr').removeClass('selected').css("background-color", "");
                /*移除 selected 設成白色*/
            }
        }
    );
    $('#btn_trash').click(function () {
        $("input[name='check_no_col[]']").each(function () {
            if ($(this).parents('tr').hasClass('selected')) {
                var id = $(this).parents('tr').data('id');
                var token = $(this).parents('tr').data("token");
                $.ajax(
                    {
                        url: '{{$where}}' + "/delete/" + id + "/",
                        type: 'POST',
                        dataType: "JSON",
                        data: {
                            "id": id,
                            "_method": 'DELETE',
                            "_token": token,
                        }
                    });
                table.rows('.selected').remove().draw(false);
                $("#check_all").prop("checked", false);
            }
        });

    });
</script>