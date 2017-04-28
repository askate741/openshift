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

    /*@page {*/
    /*size: A4;*/
    /*margin: 0;*/
    /*}*/

    /*@media print {*/
    /*!*.NoPrint {display:none}*!*/
    /*html, body {*/
    /*width: 210mm;*/
    /*height: 297mm;*/
    /*}*/
    /*}*/
</style>
<body>
<table border="0" width="100%" style="table-layout:fixed">
    <tr>
        <td colspan="2"></td>
        <td rowspan="2"><img src="{{ '../../img/tcrm001.png' }}"></td>
        <td rowspan="2" colspan="6"><img src="{{ '../../img/tcrm002.png' }}"></td>
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
        <td class="receipt_title_sm" align="left" width="10%">日&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;期:</td>
        <td id="receipt_date" colspan="3">2015/12/31</td>
    </tr>
    <tr>
        <td class="receipt_border_tbr">統一編號: 99946325</td>
        <td class="receipt_title_sm">收據編號:</td>
        <td id="receipt_no_first" class="receipt_border_n" width="3%">104-</td>
        <td class="receipt_title_sm_fn" width="7%">TCRM</td>
        <td id="receipt_no_last" class="receipt_border_n" width="8%">572</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="10" height=22px></td>
    </tr>
    <tr>
        <td class="receipt_border_tbr" rowspan="2">茲收到 <br>RECEIVED FROM</td>
        <td class="receipt_border_n" rowspan="2" width="8%"></td>
        <td id="receipt_top_name" class="receipt_border_bl" rowspan="2" colspan="7" align="center">黃麗惠</td>
        <td></td>
        <td class="receipt_border_n" rowspan="2"></td>
    </tr>
    <tr>
        <td id="receipt_integrate" class="receipt_border_bl" valign="bottom" style="font-size: 12px">1040126p</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="10" height=11px></td>
    </tr>
    <tr>
        <td class="receipt_border_tbr" rowspan="2">金額<br>AMOUNT</td>
        <td class="receipt_border_n" rowspan="2"></td>
        <td class="receipt_border_n" width="15%">新台幣</td>
        <td id="receipt_total_tw" class="receipt_border_bl" colspan="6" style="font-size: 18px">陸仟</td>
        <td style="font-size: 18px">元整</td>
        <td rowspan="2"></td>
    </tr>
    <tr>
        <td>NT</td>
        <td id="receipt_total_nt" class="receipt_border_bl" colspan="7" style="font-size: 18px">$6,000.00</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="10" height=11px></td>
    </tr>
    <tr>
        <td class="receipt_border_tbr" rowspan="2">付款方式<br>BY</td>
        <td></td>
        <td id="receipt_cert_type" colspan="9" style="font-size: 18px">□現金□劃撥□銀行□信用卡</td>
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
        <td id="receipt_member_type" colspan="9" style="font-size: 18px">□奉獻□贊助會員□其他:</td>
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
<table border="1" width="100%" style="text-align: center">
    <tr>
        <th>明細:</th>
        <th>年</th>
        <th>月</th>
        <th>日</th>
        <th>編號</th>
        <th></th>
        <th></th>
        <th>金額</th>
        <th>合計</th>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
        <td ></td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
        <td valign="top" rowspan="18" style="font-size: 28px;border-top: 1px white solid" width="15%"><u>$&nbsp;&nbsp;&nbsp;36,000</u></td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
</table>
<table border="0" width="100%">
    <tr>
        <td colspan="11" height=22px></td>
    </tr>
    <tr>
        <td colspan="11" height=22px></td>
    </tr>
    <tr>
        <td id="receipt_address" colspan="11" align="center">106台北市大安區延吉街2536巷4-1號</td>
    </tr>
    <tr>
        <td colspan="11" height=22px></td>
    </tr>
    <tr>
        <td id="receipt_member_no" align="center" width="24%">572</td>
        <td id="receipt_bottom_name" class="receipt_title">黃麗惠</td>
        <td align="center" width="24%">鈞啟</td>
    </tr>
    <tr>
        <td></td>
        <td id="receipt_mobile" align="right" valign="bottom">0918-175-316</td>
        <td></td>
    </tr>
    <tr>
        <td colspan="11" align="center"><img style="width: 40%" src="{{ '../../img/tcrm003.png' }}"></td>
    </tr>
</table>
</body>
