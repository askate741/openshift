$(function () {
    $('#account_person').change(event => {
        $.ajax({
            url: `http://localhost:8000/pdf_person/${event.target.value}`,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $("#account_content").empty();
                // $('#course_no').append("<option selected='selected'>請選擇課程名稱</option>");
                // for (var i = 0; i < data.length; i++) {
                //     $('#course_no').append("<option value=" + data[i].no + ">" + data[i].course_name + "</option>");
                // }

                var Total = 0;
                for (var i = 0; i < data.length; i++) {
                    console.log(data);
                    Total += data[i].account_amount;
                    $('#account_content').append("<span>帳務編號: " + data[i].no + "<br></span>");
                    $('#account_content').append("<span>會員編號: " + data[i].member_no + "<br></span>");
                    $('#account_content').append("<span>會員名稱: " + data[i].devotee_name + "<br></span>");
                    $('#account_member_name').val(data[i].devotee_name);
                    $('#account_content').append("<span>通訊地址: "+data[i].add2_zipcode + data[i].add2_city + data[i].add2_dist.replace(/[0-9]/g,"")+data[i].add2_street+"<br></span>");
                    $('#account_address').val(data[i].add2_zipcode + data[i].add2_city + data[i].add2_dist.replace(/[0-9]/g,"")+data[i].add2_street);
                    $('#account_content').append("<span>日期: " + data[i].account_date.replace(/-/g, "/") + "<br></span>");
                    $('#account_date').val(data[i].account_date.replace(/-/g, "/"));/*日期,replace是將 - 取代為 / */
                    $('#account_content').append("<span>金額: " + data[i].account_amount + "元<br></span>");
                    $('#account_total_nt').val("$"+Total);/*NT總金額*/
                    $('#account_content').append("<span>收支流向: " + data[i].cert_type + "<br></span>");
                    $('#account_content').append("<span>收支憑證: " + data[i].cert + "</span><hr>");
                }

            },
            cache: false
        });
    });
});
