$(function () {
    var member_temp = [];
    var IncreaseTempNum;
    var print_spinner = document.getElementById('print_spinner');

    $("#member_select").change(function () {
        $('#member_table').append("<tr><td>" + $('#member_select').val() + "</td><td>" + $('#member_select :selected').text() + "</td><td><button class='cancel_member'>取消</button></td></tr>");
        member_temp.push($(this).val());
        member_temp = member_temp.filter(Number);

        // $("#PrintArea").append($(".TableClone").clone().attr('class', 'TableClone' + $(this).val()));
        // $('.TableClone' + $(this).val()).append("<p style='page-break-after:always;'></p>");

        $("#member_select").val($("#member_select").find('option:first').val());
    });
    $("#select_all_member").click(function () {
        if ($("#select_all_member").prop("checked") === true) {
            $("#member_select").find('option:selected').remove();
            $('#member_select option').each(function () {
                member_temp.push($(this).val());
                $('#member_table').append("<tr><td>" + $(this).val() + "</td><td>" + $(this).text() + "</td><td><button class='cancel_member'>取消</button></td></tr>");
            });
            member_temp = member_temp.filter(Number);
            $('#member_select').prepend("<option selected='selected' value>請選擇會員名稱</option>");

            $.each(member_temp, function (index, value) {
                $("#PrintArea").append($(".TableClone").clone().attr('class', 'TableClone' + value));
                $('.TableClone' + value).append("<p style='page-break-after:always;'></p>");
            });

        } else {
            $.each(member_temp, function (index, value) {
                $(".TableClone" + value).remove();
            });
            member_temp.length = 0;
            $('#member_table td').parent().remove();
        }
    });
    $(".TableClone .ReceiptDetails td").remove();
    $("#member_print").click(function () {
        $("#print_disabled").show();
        /*顯示全版背景遮罩*/
        $("#print_word").show();
        /*顯示加載提示*/
        spinner.spin(print_spinner);
        /*啟用進度圈*/
        $(this).button('loading').delay(2000).queue(function () {
            $.each(member_temp, function (index, value) {
                IncreaseTempNum = value;
                $("#PrintArea").append($(".TableClone").clone().attr('class', 'TableClone' + IncreaseTempNum));
                $('.TableClone' + IncreaseTempNum).append("<p style='page-break-after:always;'></p>");
                $.ajax({
                    url: `/pdf_person/${IncreaseTempNum}`,
                    type: 'GET',
                    dataType: 'json',
                    async: false,
                    success: function (data) {
                        for (var i = 0; i < data.length; i++) {
                            $('.TableClone' + IncreaseTempNum + ' #receipt_top_name').attr('id', 'receipt_top_name' + IncreaseTempNum).text(data[i].devotee_name);
                            /*會員名稱(上)*/
                            $('.TableClone' + IncreaseTempNum + ' #receipt_bottom_name').attr('id', 'receipt_bottom_name' + IncreaseTempNum).text(data[i].devotee_name);
                            /*會員名稱(下)*/
                            $('.TableClone' + IncreaseTempNum + ' #receipt_top_member_no').attr('id', 'receipt_top_member_no' + IncreaseTempNum).text(data[i].no);
                            /*會員編號(上)*/
                            $('.TableClone' + IncreaseTempNum + ' #receipt_bottom_member_no').attr('id', 'receipt_bottom_member_no' + IncreaseTempNum).text(data[i].no);
                            /*會員編號(下)*/
                            if (data[i].add2_dist === null) {
                                $('.TableClone' + IncreaseTempNum + ' #receipt_address').attr('id', 'receipt_address' + IncreaseTempNum).text("");
                            } else {
                                $('.TableClone' + IncreaseTempNum + ' #receipt_address').attr('id', 'receipt_address' + IncreaseTempNum).text(data[i].add2_zipcode + data[i].add2_city + data[i].add2_dist.replace(/[0-9]/g, "") + data[i].add2_street);
                                /*會員地址*/
                            }
                            if(data[i].mobile===null){
                                $('.TableClone' + IncreaseTempNum + ' #receipt_mobile').attr('id', 'receipt_mobile' + IncreaseTempNum).text("");
                            }else{
                                $('.TableClone' + IncreaseTempNum + ' #receipt_mobile').attr('id', 'receipt_mobile' + IncreaseTempNum).text(data[i].mobile);
                                /*會員手機*/
                            }
                            $('.TableClone' + IncreaseTempNum + ' #receipt_date').attr('id', 'receipt_date' + IncreaseTempNum).text(data[i].account_date.replace(/-/g, "/"));
                            /*年/月/日*/
                            $('.TableClone' + IncreaseTempNum + ' #receipt_date_tw').attr('id', 'receipt_date_tw' + IncreaseTempNum).text(data[i].account_date.replace(/-/g, "").substring(0, 4) - 1911 + "-");
                            /*民國年*/
                            $('.TableClone' + IncreaseTempNum + ' #receipt_integrate').attr('id', 'receipt_integrate' + IncreaseTempNum).text(data[i].account_date.replace(/-/g, "").substring(0, 4) - 1911 + data[i].account_date.replace(/-/g, "").substring(4) + data[i].cert_type.toLowerCase());
                            /*識別代碼*/
                            switch (data[i].cert_type) {/*付款方式*/
                                case "C":
                                    $('.TableClone' + IncreaseTempNum + ' #receipt_cert_type').attr('id', 'receipt_cert_type' + IncreaseTempNum).text("■現金□劃撥□銀行□信用卡");
                                    break;
                                case "P":
                                    $('.TableClone' + IncreaseTempNum + ' #receipt_cert_type').attr('id', 'receipt_cert_type' + IncreaseTempNum).text("□現金■劃撥□銀行□信用卡");
                                    break;
                                case "B":
                                    $('.TableClone' + IncreaseTempNum + ' #receipt_cert_type').attr('id', 'receipt_cert_type' + IncreaseTempNum).text("□現金□劃撥■銀行□信用卡");
                                    break;
                                case "S":
                                    $('.TableClone' + IncreaseTempNum + ' #receipt_cert_type').attr('id', 'receipt_cert_type' + IncreaseTempNum).text("□現金□劃撥□銀行■信用卡");
                                    break;
                            }
                            switch (data[i].member_type) {/*用途*/
                                case "G":
                                    $('.TableClone' + IncreaseTempNum + ' #receipt_member_type').attr('id', 'receipt_member_type' + IncreaseTempNum).text("■奉獻□贊助會員□其他:");
                                    break;
                                case "S":
                                    $('.TableClone' + IncreaseTempNum + ' #receipt_member_type').attr('id', 'receipt_member_type' + IncreaseTempNum).text("□奉獻■贊助會員□其他:");
                                    break;
                                case "O":
                                    $('.TableClone' + IncreaseTempNum + ' #receipt_member_type').attr('id', 'receipt_member_type' + IncreaseTempNum).text("□奉獻□贊助會員■其他:");
                                    break;
                                default:
                                    $('.TableClone' + IncreaseTempNum + ' #receipt_member_type').attr('id', 'receipt_member_type' + IncreaseTempNum).text("□奉獻□贊助會員■其他:");
                                    break;
                            }
                        }
                    },
                    cache: false
                });
                $.ajax({
                    url: `/pdf_detail/${IncreaseTempNum}`,
                    type: 'GET',
                    dataType: 'json',
                    async: false,
                    success: function (data) {
                        var i;
                        var ReceiptTotal = 0;
                        for (i = 0; i < data.length; i++) {
                            ReceiptTotal += data[i].account_amount;
                            /*中文數字總金額*/
                            for (var cols = 1; cols <= 8; cols++) {
                                switch (cols) {
                                    case 2:
                                        $(".TableClone" + IncreaseTempNum + " .ContentInsert" + i).append("<td>" + data[i].account_date.replace(/-/g, "").substring(4, 5).replace(/0/g, "") + data[i].account_date.replace(/-/g, "").substring(5, 6) + "</td>");
                                        /*插入明細 月 */
                                        break;
                                    case 3:
                                        $(".TableClone" + IncreaseTempNum + " .ContentInsert" + i).append("<td>" + data[i].account_date.replace(/-/g, "").substring(6, 7).replace(/0/g, "") + data[i].account_date.replace(/-/g, "").substring(7, 8) + "</td>");
                                        /*插入明細 日 */
                                        break;
                                    case 4:
                                        $(".TableClone" + IncreaseTempNum + " .ContentInsert" + i).append("<td>" + data[i].no + "</td>");
                                        /*插入明細 編號 */
                                        break;
                                    case 5:
                                        $(".TableClone" + IncreaseTempNum + " .ContentInsert" + i).append("<td>" + data[i].subclass1_name + "</td>");
                                        /*插入明細 會計科目1 */
                                        break;
                                    case 6:
                                        $(".TableClone" + IncreaseTempNum + " .ContentInsert" + i).append("<td>" + data[i].subclass2_name + "</td>");
                                        /*插入明細 會計科目2 */
                                        break;
                                    case 7:
                                        $(".TableClone" + IncreaseTempNum + " .ContentInsert" + i).append("<td>" + data[i].account_memo + "</td>");
                                        /*插入明細 備註 */
                                        break;
                                    case 8:
                                        $(".TableClone" + IncreaseTempNum + " .ContentInsert" + i).append("<td>$&nbsp;&nbsp;" + data[i].account_amount + "</td>");
                                        /*插入明細 金額 */
                                        break;
                                    default:
                                        $(".TableClone" + IncreaseTempNum + " .ContentInsert" + i).append("<td></td>");
                                        /*在列裡用不著的欄位留白*/
                                        break;
                                }
                            }
                        }
                        while (i < 20) {/*補足剩下的欄位，滿20欄*/
                            for (var cols2 = 1; cols2 <= 8; cols2++) {
                                $(".TableClone" + IncreaseTempNum + " .ContentInsert" + i).append("<td height='20px'></td>");
                            }
                            i = ++i;
                        }
                        $(".TableClone" + IncreaseTempNum + " .ContentInsert0").append("<td></td>");
                        $(".TableClone" + IncreaseTempNum + " .ContentInsert1").append("<td valign='top' rowspan='18' style='font-size: 28px;border-top: 1px white solid;' width='15%'><u>$&nbsp;&nbsp;&nbsp;" + ReceiptTotal.toString().replace(/(\d{1,3})(?=(\d{3})+$)/g, "$1,") + "</u></td>");
                        /*明細總金額*/
                        $('.TableClone' + IncreaseTempNum + ' #receipt_total_nt').attr('id', 'receipt_total_nt' + IncreaseTempNum).text("$" + ReceiptTotal.toString().replace(/(\d{1,3})(?=(\d{3})+$)/g, "$1,"));
                        /*阿拉伯數字總金額*/
                        $('.TableClone' + IncreaseTempNum + ' #receipt_total_tw').attr('id', 'receipt_total_tw' + IncreaseTempNum).text(NumberToChinese(ReceiptTotal));
                        /*總金額*/
                    },
                    cache: false
                });
            });
            $(".TableClone").hide();
            $("#PrintArea").show();
            $("#PrintArea").printArea();
            $(".TableClone").show();
            $("#PrintArea").hide();
            $("#print_disabled").hide();
            /*影藏全版背景遮罩*/
            $("#print_word").hide();
            /*隱藏加載提示*/
            spinner.spin();
            /*關閉進度圈*/
            $(this).dequeue();
        });
        $(this).button('loading').delay(2000).queue(function () {
            $.each(member_temp, function (index, value) {
                $(".TableClone" + value).remove();
            });
            $(this).button('reset');
            $(this).dequeue();
        });
    });


    $('#member_table').delegate('.cancel_member', 'click', function () {/*重要!*/
        /*動態產生的按鈕，需使用特殊的方法觸發*/
        $(this).parents("tr").remove();
        /*抓取當下的父元素 tr 做移除*/
        $(".TableClone" + $(this).parents('tr').text().replace(/[^0-9]/g, "")).remove();
        member_temp.SearchDeleteOf($(this).parents('tr').text().replace(/[^0-9]/g, ""));
    });
});

