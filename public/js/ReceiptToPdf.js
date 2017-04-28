$(function () {
    var IncreaseNum = 0;
    $("#Increase").click(function () {
        if ($('#IncreaseNum').val() < 5) {
            IncreaseNum++;
            $('#IncreaseNum').val(IncreaseNum);
            $('#account_person' + IncreaseNum).show().prop('disabled', false);
            // $("#IncreaseField").append("<select id=account_person" + IncreaseNum + "><option selected=selected >請選擇會員</option></select><br>");
        }
    });
    $("#Reduce").click(function () {
        if ($('#IncreaseNum').val() > 0) {
            $('#account_person' + IncreaseNum).hide().prop('disabled', true);
            IncreaseNum--;
            $('#IncreaseNum').val(IncreaseNum);
            // $("#IncreaseField").append("<select id=account_person" + IncreaseNum + "><option selected=selected >請選擇會員</option></select><br>");
        }
    });
    var IncreaseTemp;
    $("#IncreaseField select").each(function () {/*遍歷 .subclass1_no 所有 select*/
        IncreaseTemp = "#" + $(this).attr('id');
        /* current_id 會等於當前 select 的 id*/
        $(IncreaseTemp).change(event => {
            $.ajax({
                url: `http://localhost:8000/pdf_person/${event.target.value}`,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $("#account_content").empty();
                    var Total = 0;
                    var IncreaseTempNum = event.target.id.replace(/[^0-9]/g, "");
                    for (var i = 0; i < data.length; i++) {
                        // IncreaseTempNum= IncreaseTemp.replace(/[^0-9]/g,"");
                        console.log(data);
                        Total += data[i].account_amount;
                        $('#account_member_name' + IncreaseTempNum).val(data[i].devotee_name);
                        $('#account_address' + IncreaseTempNum).val(data[i].add2_zipcode + data[i].add2_city + data[i].add2_dist.replace(/[0-9]/g, "") + data[i].add2_street);
                        $('#account_date' + IncreaseTempNum).val(data[i].account_date.replace(/-/g, "/"));
                        /*日期,replace是將 - 取代為 / */
                        $('#account_total_nt' + IncreaseTempNum).val("$" + Total);
                        /*NT總金額*/
                        $('#account_cert_type' + IncreaseTempNum).val(data[i].cert_type);
                        /*付款方式*/
                        $('#account_member_type' + IncreaseTempNum).val(data[i].member_type);
                        /*用途*/
                        $('#account_mobile' + IncreaseTempNum).val(data[i].mobile);
                        /*手機*/
                        $('#account_date_tw' + IncreaseTempNum).val(data[i].account_date.replace(/-/g, "").substring(0, 4) - 1911 + "-");
                        /*民國年*/
                        $('#account_monthday' + IncreaseTempNum).val(data[i].account_date.replace(/-/g, "").substring(0, 4) - 1911 + data[i].account_date.replace(/-/g, "").substring(4) + data[i].cert_type.toLowerCase());
                        /*年份代碼*/
                        $('#account_total_tw' + IncreaseTempNum).val(digitUppercase(Total));
                        /*中文總金額*/
                    }

                },
                cache: false
            });
        });
    });

});
