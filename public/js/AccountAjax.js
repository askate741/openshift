$(function () {
    $("#in").change(event => {
        $.ajax({
            url: `http://localhost:8000/account/sub2class/in/${event.target.value}`,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $("#subclass2_no").empty().append("<option selected='selected'>請選擇會計科目2</option>");
                for (var i = 0; i < data.length; i++) {
                    $('#subclass2_no').append("<option value=" + data[i].no + ">" + data[i].subclass2_name + "</option>");
                }
            },
            cache: false
        });
    });
    $("#out").change(event => {
        $.ajax({
            url: `http://localhost:8000/account/sub2class/out/${event.target.value}`,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $("#subclass2_no").empty().append("<option selected='selected'>請選擇會計科目2</option>");
                for (var i = 0; i < data.length; i++) {

                    $('#subclass2_no').append("<option value=" + data[i].no + ">" + data[i].subclass2_name + "</option>");
                }
            },
            cache: false
        });
    });
});