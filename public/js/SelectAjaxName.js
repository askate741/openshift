$(function () {
    var ajax_count = 0;
    $(".TableClone .ReceiptDetails td").remove();
    $("#member_select").change(event => {
        var IncreaseTempNum = event.target.value;
        $('#member_table').append("<tr><td>" + $('#member_select').val() + "</td><td>" + $('#member_select :selected').text() + "</td><td><button class='cancel_member'>取消</button></td></tr>");
        /*插入一欄並帶入text值*/
        $("#PrintArea").append($(".TableClone").clone().attr('class', 'TableClone' + IncreaseTempNum));
        /*複製一份空報表*/
        $('.TableClone' + IncreaseTempNum).append("<p style='page-break-after:always;'></p>");
        /*插入換頁字段*/
        $.ajax({
            url: `http://localhost:8000/pdf_person/${event.target.value}`,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // var ReceiptTotal = 0;
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    // ReceiptTotal += data[i].account_amount;
                    $('.TableClone' + IncreaseTempNum + ' #receipt_top_name').attr('id', 'receipt_top_name' + IncreaseTempNum).text(data[i].devotee_name);
                    /*會員名稱(上)*/
                    $('.TableClone' + IncreaseTempNum + ' #receipt_bottom_name').attr('id', 'receipt_bottom_name' + IncreaseTempNum).text(data[i].devotee_name);
                    /*會員名稱(下)*/
                    $('.TableClone' + IncreaseTempNum + ' #receipt_top_member_no').attr('id', 'receipt_top_member_no' + IncreaseTempNum).text(data[i].no);
                    /*會員編號(上)*/
                    $('.TableClone' + IncreaseTempNum + ' #receipt_bottom_member_no').attr('id', 'receipt_bottom_member_no' + IncreaseTempNum).text(data[i].no);
                    /*會員編號(下)*/
                    $('.TableClone' + IncreaseTempNum + ' #receipt_address').attr('id', 'receipt_address' + IncreaseTempNum).text(data[i].add2_zipcode + data[i].add2_city + data[i].add2_dist.replace(/[0-9]/g, "") + data[i].add2_street);
                    /*會員地址*/
                    $('.TableClone' + IncreaseTempNum + ' #receipt_mobile').attr('id', 'receipt_mobile' + IncreaseTempNum).text(data[i].mobile);
                    /*會員手機*/
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
                ajax_count++;

            },
            cache: false
        });
        $.ajax({
            url: `http://localhost:8000/pdf_detail/${event.target.value}`,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // var IncreaseTempNum = event.target.value;
                console.log(data);
                // $(".TableClone" + IncreaseTempNum + " .ReceiptDetails td").remove();
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
                                /*插入明細 編號 */
                                break;
                            case 6:
                                $(".TableClone" + IncreaseTempNum + " .ContentInsert" + i).append("<td>" + data[i].subclass2_name + "</td>");
                                /*插入明細 編號 */
                                break;
                            case 7:
                                $(".TableClone" + IncreaseTempNum + " .ContentInsert" + i).append("<td>" + data[i].account_memo + "</td>");
                                /*插入明細 編號 */
                                break;
                            case 8:
                                $(".TableClone" + IncreaseTempNum + " .ContentInsert" + i).append("<td>$&nbsp;&nbsp;" + data[i].account_amount + "</td>");
                                /*插入明細 編號 */
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
                ajax_count++;


            },
            cache: false
        });
    });
    $('#member_table').delegate('.cancel_member', 'click', function () {/*重要!*/
        /*動態產生的按鈕，需使用特殊的方法觸發*/
        $(this).parents("tr").remove();
        /*抓取當下的父元素 tr 做移除*/
        $(".TableClone" + $(this).parents('tr').text().replace(/[^0-9]/g, "")).remove();

    });
    var cancel_size;
    var print_spinner = document.getElementById('print_spinner');
    var opts = {
        lines: 13, // 花瓣數目
        length: 20, // 花瓣長度
        width: 10, // 花瓣寬度
        radius: 30, // 花瓣距中心半徑
        corners: 1, // 花瓣圆滑度 (0-1)
        rotate: 0, // 花瓣旋轉角度
        direction: 1, // 花瓣旋转方向 1: 順時針, -1: 逆時針
        color: '#5882FA', // 花瓣颜色
        speed: 1, // 花瓣旋轉速度
        trail: 60, // 花瓣旋轉时的拖影(百分比)
        shadow: false, // 花瓣是否顯示陰影
        hwaccel: false, //spinner 是否啟用硬件加速及高速旋转
        className: 'print_spinner', // spinner css 樣式名稱
        zIndex: 2e9, // spinner的z軸 (默認是2000000000)
        top: '50%', // spinner 相對父容器Top定位 單位 px
        left: '50%'// spinner 相對父容器Le1ft定位 單位 px
    };
    var spinner = new Spinner(opts);
    var myList = [];

    $('#member_select option').each(function() {
        myList.push($(this).val())
    });
    // var delay_print = 1000;
    // cancel_size = $("#member_table").find(".cancel_member").size();
    $("#member_print").click(function () {
        alert(myList.filter(Number));
        // var check_num = -1;
        // $("#print_disabled").show();
        /*顯示全版背景遮罩*/
        // spinner.spin(print_spinner);
        /*啟用spinner*/
        // while (check_num < 0) {
        //     alert("qwewq");
        //     setTimeout('ReadyPrint()', delay_print);
        //     // delay_print=delay_print+500;
        //     check_num = $("receipt_total_nt" + $('#member_select').val()).text();
        //
        // }
        // alert(check_num);

    });
    // function ReadyPrint() {
    //     // if ($("receipt_total_nt" + $('#member_select').val()).text() > 0 && ajax_count == (cancel_size * 2)) {
    //     $(".TableClone").hide();
    //     $("#PrintArea").show();
    //     $("#PrintArea").printArea();
    //     $(".TableClone").show();
    //     $("#PrintArea").hide();
    //     $("#print_disabled").hide();
    //     /*影藏全版背景遮罩*/
    //     // }
    // }

});

