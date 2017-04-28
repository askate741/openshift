$(".error_null").bind("click", function () {
    if (church_no.value == 0) {
        if ($(".church").find("a").size() == 0) {
            $("#church_no").after("<a class=error_color>  * 請選擇所屬教會 </a>");
        }
    } else {
        $("a").remove(".error_color");
    }
    if (member_type.value == 0) {
        if ($(".member_type").find("a").size() == 0) {
            $("#member_type").after("<a class=error_color>  * 請選擇身分類型 </a>");
        }
    } else {
        $("a").remove(".error_color");
    }
    if (devotee_name.value == 0) {
        if ($(".devotee_name").find("a").size() == 0) {
            $("#devotee_name").after("<a class=error_color>  * 請輸入姓名 </a>");
        }
    } else {
        $("a").remove(".error_color");
    }
    if (title.value == 0) {
        if ($(".title").find("a").size() == 0) {
            $("#title").after("<a class=error_color>  * 請輸入姓名 </a>");
        }
    } else {
        $("a").remove(".error_color");
    }
});