$(function () {
    var member_temp = [];
    $("#member_select").change(function () {
        /*如果陣列妹沒有重複的值*/
        if (member_temp.indexOf($("#member_select").val()) === -1) {
            $('#member_table').append("<tr><td>" + $('#member_select').val() + "</td><td>" + $('#member_select :selected').text() + "</td><td><button class='cancel_member'>取消</button></td></tr>");
            member_temp.push($(this).val());
            member_temp = member_temp.filter(Number);
        }
        $("#member_select").val("");
        /*重製選單*/
    });
    $("#select_all_member").click(function () {
        if ($("#select_all_member").prop("checked") === true) {
            $("#member_select").find('option:selected').remove();
            member_temp.length = 0;
            $('#member_table td').parent().remove();
            /*清空陣列避免重複*/
            $('#member_select option').each(function () {
                member_temp.push($(this).val());
                $('#member_table').append("<tr><td>" + $(this).val() + "</td><td>" + $(this).text() + "</td><td><button class='cancel_member'>取消</button></td></tr>");
            });
            member_temp = member_temp.filter(Number);
            $('#member_select').prepend("<option selected='selected' value>請選擇會員名稱</option>");
        } else {
            member_temp.length = 0;
            $('#member_table td').parent().remove();
        }
    });

    $('#member_table').delegate('.cancel_member', 'click', function () {/*重要!*/
        /*動態產生的按鈕，需使用特殊的方法觸發*/
        $(this).parents("tr").remove();
        /*抓取當下的父元素 tr 做移除*/
        member_temp.SearchDeleteOf($(this).parents('tr').text().replace(/[^0-9]/g, ""));
    });
    $("#paper_test").click(function () {
        console.log(member_temp);
    });
    $('#paper_test_pt').click(function () {
        // 找出 li 中的超連結 href(#id)
        // var  _clickTab = $(this).find('a').attr('href'); // 找到連結a中的href標籤值
        //
        // if("-1"===_clickTab.search("http://")){ //不為http://執行下列程式

        $("#iframe").html("").hide();
        for (var i = 0; i < member_temp.length; i++) {
            $.get("/pdf/" + member_temp[i],{async: false}, function (data) {
                $("#iframe").append(data);
                    $("#iframe").append("<p style='page-break-after:always;'></p>");
            });
        }
        // Global ajax cursor change
        //noinspection JSUnresolvedFunction
        $(document).ajaxStop(function () {
           // $("#iframe").printArea();
            $("#iframe").show().printElement().hide();
        });
    })
});
