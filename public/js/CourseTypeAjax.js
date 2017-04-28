$(function () {
    $('#course_type_no').change(event => {
        $.ajax({
            url: `http://localhost:8000/course_registrations/${event.target.value}` ,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $("#course_no").empty();
                $('#course_no').append("<option selected='selected'>請選擇課程名稱</option>");
                for (var i = 0; i < data.length; i++) {
                    $('#course_no').append("<option value=" + data[i].no + ">" + data[i].course_name + "</option>");
                }
            },
            cache: false
        });
    });
});
