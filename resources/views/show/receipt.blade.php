<style>
    body {
        width: 210mm;
        height: 297mm;
        /*border: solid 1px;*/
        margin: auto;
    }

    table {
        border-collapse: collapse; /*讓格與格中間沒有間距*/
    }

    tr, td {
        /*border: 0px solid #000;  !*有細內框也有細外框*!*/
    }

    img {
        max-width: 100%;
    }

    .receipt_title { /*調整字體大小、粗體、置中*/
        font-size: 26px;
        font-weight: bold;
        text-align: center;
    }

    .receipt_title_sm { /*粗體字*/
        font-weight: bold;
        border-bottom: 1px white solid; /*給予底線白，為了修復 .receipt_border_tbr 黑色底線的延伸*/
    }

    .receipt_title_sm_fn { /*粗體字帶有特殊字型*/
        font-weight: bold;
        font-family: 'Monotype Corsiva';
        /*text-align: center;*/
        border-bottom: 1px white solid; /*給予底線白，為了修復 .receipt_border_tbr 黑色底線的延伸*/
    }

    .receipt_border_n {
        border-bottom: 1px white solid; /*給予底線白，為了修復 .receipt_border_tbr 黑色底線的延伸*/
    }

    .receipt_border_tbr { /*調整上下右框限*/
        /*border-top: 1px black solid;*/
        /*border-bottom: 1px black solid;*/
        /*border-right: 1px black solid;*/
        border: 1px black solid;
    }

    .receipt_border_bl { /*調整底線用、粗體字*/
        font-weight: bold;
        border-bottom: 2px black solid;
    }

</style>
<div class="ReceiptDetail">
    <table border="0" width="100%" style="table-layout:fixed">
        <tr>
            <td colspan="2"></td>
            <td rowspan="2" ><img src="{{ '../../img/tcrm001.png' }}"></td>
            <td rowspan="2" colspan="6" ><img src="{{ '../../img/tcrm002.png' }}"></td>
            <td colspan="2"></td>
        </tr>
        <tr>

        </tr>
        <tr>
            <td colspan="11" class="receipt_title">奉獻收據</td>
        </tr>
        <tr>
            <td colspan="11" class="receipt_title" style="font-family: 'Monotype Corsiva'">OFFICIAL RECEIPT</td>
        </tr>
    </table>
    <table border="0" width="100%">
        <tr>
            <td class="receipt_border_tbr" width="21.5%">93北市社會字第2315號</td>
            <td class="receipt_border_n" rowspan="2" colspan="6"></td>
            <td class="receipt_title_sm" align="left" width="10%">日&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;期:
            </td>
            <td colspan="3">{{$medium['today']}}</td>
        </tr>
        <tr>
            <td class="receipt_border_tbr">統一編號: 99946325</td>
            <td class="receipt_title_sm">收據編號:</td>
            <td class="receipt_border_n" width="3%">{{$medium['receipt_no_1']}}-</td>
            <td class="receipt_title_sm_fn" width="7%">TCRM</td>
            <td class="receipt_border_n" width="8%">{{$medium['receipt_no_2']}}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="10" height=22px></td>
        </tr>
        <tr>
            <td class="receipt_border_tbr" rowspan="2">茲收到 <br>RECEIVED FROM</td>
            <td class="receipt_border_n" rowspan="2" width="8%"></td>
            <td class="receipt_border_bl" rowspan="2" colspan="7"
                align="center">{{$person->devotee_name}}</td>
            <td></td>
            <td class="receipt_border_n" rowspan="2"></td>
        </tr>
        <tr>
            <td class="receipt_border_bl" valign="bottom"
                style="font-size: 12px">{{$medium['identify']}}
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="10" height=11px></td>
        </tr>
        <tr>
            <td class="receipt_border_tbr" rowspan="2">金額<br>AMOUNT</td>
            <td class="receipt_border_n" rowspan="2"></td>
            <td class="receipt_border_n" width="15%">新台幣</td>
            <td class="receipt_border_bl" colspan="6"
                style="font-size: 18px">{{$medium['total_tw']}}</td>
            <td style="font-size: 18px">元整</td>
            <td rowspan="2"></td>
        </tr>
        <tr>
            <td>NT</td>
            <td class="receipt_border_bl" colspan="7"
                style="font-size: 18px">${{$medium['total']}}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="10" height=11px></td>
        </tr>
        <tr>
            <td class="receipt_border_tbr" rowspan="2">付款方式<br>BY</td>
            <td></td>
            <td colspan="9" style="font-size: 18px">{{$medium['cert_type']}}</td>
        </tr>
        <tr>
            <td colspan="11" style="visibility:hidden">visibility:hidden 使欄位不會變形</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="10" height=11px></td>
        </tr>
        <tr>
            <td class="receipt_border_tbr" rowspan="2">用途<br>FOR</td>
            <td></td>
            <td colspan="9" style="font-size: 18px">{{$medium['member_type']}}</td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td></td>
            <td colspan="10" height=11px></td>
        </tr>
        <tr>
            <td colspan="3" style="visibility:hidden">visibility:hidden<br>使欄位不會變形</td>
            <td colspan="3" style="font-size: 18px">理事長:</td>
            <td colspan="5" style="font-size: 18px">經手人:</td>
        </tr>
        <tr>
            <td class="receipt_border_n" colspan="11" height=22px></td>
        </tr>
        <tr>
            <td colspan="4" style="font-size: 14px">地址/電話: 台北市中山北路二段111號8樓/ 0952346726</td>
            <td colspan="7" style="font-size: 14px">***本收據可供您做綜合所得稅捐款證明。***</td>
        </tr>
        <tr>
            <td class="receipt_border_n" colspan="11" height=44px></td>
        </tr>
    </table>
    <table border="1" width="100%" style="text-align: center;">
        <tr>
            <th>明細:</th>
            <th>月</th>
            <th>日</th>
            <th>編號</th>
            <th></th>
            <th></th>
            <th></th>
            <th>金額</th>
            <th>合計</th>
        </tr>
        @for($i=0;$i<(count($medium['detail']));$i++)
            <tr>
                <td height="20"></td>
                <td height="20">{{$medium['detail'][$i]['month']}}</td>
                <td height="20">{{$medium['detail'][$i]['date']}}</td>
                <td height="20">{{$medium['detail'][$i]['no']}}</td>
                <td height="20">{{$medium['detail'][$i]['subclass1']}}</td>
                <td height="20">{{$medium['detail'][$i]['subclass2']}}</td>
                <td height="20">{{$medium['detail'][$i]['memo']}}</td>
                <td height="20">$ {{$medium['detail'][$i]['amount']}}</td>
                @if($i<1)
                    <td valign="top" rowspan="19" width="15%"><br><u
                                style="font-size: 28px;">$&nbsp;&nbsp;&nbsp;{{$medium['total']}}</u>
                    </td>
                @endif
            </tr>
        @endfor
        @for($i=0;$i<(19-count($medium['detail']));$i++)
            <tr>
                @for($j=1;$j<=8;$j++)
                    <td height="20"></td>
                @endfor
            </tr>
        @endfor
    </table>
    <table border="0" width="100%">
        <tr>
            <td colspan="11" height=22px></td>
        </tr>
        <tr>
            <td colspan="11" height=22px></td>
        </tr>
        <tr>{{--106台北市大安區延吉街2536巷4-1號--}}
            <td colspan="11" align="center" height=22px>{{$medium['address']}}</td>
        </tr>
        <tr>
            <td colspan="11" height=22px></td>
        </tr>
        <tr>
            <td align="center" width="24%" height="30px">{{$person->no}}</td>
            <td class="receipt_title">{{$person->devotee_name}}</td>
            <td align="center" width="24%" height="30px">鈞啟</td>
        </tr>
        <tr>
            <td></td>
            <td align="right" valign="bottom"
                height="22px">{{$medium['phone']}}</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="11" align="center"><img style="width: 40%"
                                                 src="{{ '../../img/tcrm003.png' }}"></td>
        </tr>
    </table>
</div>
