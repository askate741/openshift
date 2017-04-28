$('#table').DataTable({
//            "paging":   false,/*禁用分頁、選單顯示*/
//            "ordering": false,/*禁用欄位排序*/
//            "info":     false,/*進用左下角顯示欄位*/
    "lengthChange": false, /*禁 顯示幾筆*/
    "infoCallback": function (settings, start, end, max, total, pre) {
        var api = this.api();
        var Info = api.page.info();
        $('#tableInfo').html("顯示&nbsp" + Info.pages + "&nbsp頁&nbsp，" +start+"&nbsp到&nbsp"+ max + "&nbsp筆");
    }
});
var table = $('#table').DataTable();
/*顯示幾筆*/
var info = table.page.info();
$('#tableInfo').html(
    "總共&nbsp" + info.pages + "&nbsp頁&nbsp，1&nbsp到&nbsp"+ info.recordsTotal + "&nbsp筆"
);
/*刪除 未完*/
$('#table tbody').on('click', 'tr', function () {
    $(this).toggleClass('selected');
});
$('#btn_trash').click(function () {
    table.rows('.selected').remove().draw(false);
});
/*查詢*/
$('#DT_search').on('keyup', function () {
    table.search(this.value).draw();
});
/*分頁*/
$('#first').on('click', function () {
    table.page('first').draw(false);
});
$('#left').on('click', function () {
    table.page('previous').draw(false);
});

$('#right').on('click', function () {
    table.page('next').draw(false);
});

$('#last').on('click', function () {
    table.page('last').draw(false);
});


/*下拉式*/
$("#select").change(function () {
    table.page.len($("#select").val()).draw();
});

$('#_10').on('click', function () {
    table.page.len(10).draw();
});
$('#_15').on('click', function () {
    table.page.len(15).draw();
});
$('#_20').on('click', function () {
    table.page.len(20).draw();
});
$('#all').on('click', function () {
    table.page.len(-1).draw();
});
