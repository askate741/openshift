@extends('app')
@section('css')
    <!--suppress ALL -->
    {{--<script type='text/javascript' src={{ '../../js/SelectAjaxName.js' }}></script>引入抓取會員帳務資料JS--}}
    <script type='text/javascript' src={{ '../../js/jquery.PrintArea.js' }}></script>{{--引入抓取會員帳務資料JS--}}
    <script type='text/javascript' src={{ '../../js/ArraySearchDelete.js' }}></script>{{--引入陣列查詢元素移除--}}
    <script type='text/javascript' src={{ '../../js/spin.min.js' }}></script>{{--引入進度圈JS--}}
    <script type='text/javascript' src={{ '../../js/ProgressLoading.js' }}></script>{{--引入進度圈自訂JS--}}
    <script type='text/javascript' src={{ '../../js/dialog.js' }}></script>{{--引入上傳彈跳視窗JS--}}
    <script type='text/javascript' src={{ '../../js/NumberToChinese.js' }}></script>{{--引入數字轉中文金額--}}
    {{--    <script type='text/javascript' src={{ '../../js/test/ReceiptAjax.js' }}></script>--}}{{--引入抓取會員帳務資料JS Test--}}{{--
        <link type="text/css" rel="stylesheet" href={{ '../../css/ReceiptPrint.css' }} >--}}
    <script type='text/javascript' src={{ '../../js/ReceiptPrint.js' }}></script>
    <link type="text/css" rel="stylesheet" href={{ '../../css/Customize.Clear.css' }}>{{--清除css格式--}}
    <style>
        .ReceiptDetail {
            width: 210mm;
            height: 297mm;
            /*border: solid 1px;*/
            margin: auto;
         /*   page-break-after:always;*/
        }

        .ReceiptDetail table {
            border-collapse: collapse; /*讓格與格中間沒有間距*/
        }

        .ReceiptDetail th {
            text-align: center;
        }

        .ReceiptDetail img {
            max-width: 100%;
        }

        .ReceiptDetail .receipt_title { /*調整字體大小、粗體、置中*/
            font-size: 26px;
            font-weight: bold;
            text-align: center;
        }

        .ReceiptDetail .receipt_title_sm { /*粗體字*/
            font-weight: bold;
            border-bottom: 1px white solid; /*給予底線白，為了修復 .receipt_border_tbr 黑色底線的延伸*/
        }

        .ReceiptDetail .receipt_title_sm_fn { /*粗體字帶有特殊字型*/
            font-weight: bold;
            font-family: 'Monotype Corsiva';
            /*text-align: center;*/
            border-bottom: 1px white solid; /*給予底線白，為了修復 .receipt_border_tbr 黑色底線的延伸*/
        }

        .ReceiptDetail .receipt_border_n {
            border-bottom: 1px white solid; /*給予底線白，為了修復 .receipt_border_tbr 黑色底線的延伸*/
        }

        .ReceiptDetail .receipt_border_tbr { /*調整上下右框限*/
            /*border-top: 1px black solid;*/
            /*border-bottom: 1px black solid;*/
            /*border-right: 1px black solid;*/
            border: 1px black solid;
        }

        .ReceiptDetail .receipt_border_bl { /*調整底線用、粗體字*/
            font-weight: bold;
            border-bottom: 2px black solid;
        }
    </style>
    {{--<script>--}}
    {{--$(document).ready(function(){--}}
    {{--//            $.get("a.html",function(data){ //初始將a.html include div#iframe--}}
    {{--//                $("#iframe").html(data);--}}
    {{--//            });--}}
    {{--$(function(){--}}
    {{--$('.list-side li').click(function() {--}}
    {{--// 找出 li 中的超連結 href(#id)--}}
    {{--var $this = $(this),--}}
    {{--_clickTab = $this.find('a').attr('href'); // 找到連結a中的href標籤值--}}
    {{--if("-1"==_clickTab.search("http://")){ //不為http://執行下列程式--}}
    {{--$.get(_clickTab,function(data){--}}
    {{--// $("#iframe").html(data);--}}
    {{--$("#iframe").append(data);--}}
    {{--});--}}
    {{--return false;--}}
    {{--}--}}
    {{--})--}}
    {{--})--}}
    {{--});--}}
    {{--</script>--}}
    {{--<script>--}}
    {{--//        $("#paper_test").click( function () {--}}
    {{--//            console.log("sad");--}}
    {{--//      //      $("#paper_content").append("<iframe src='https://www.w3schools.com'></iframe>");--}}
    {{--//--}}
    {{--//        })--}}
    {{--function aa() {--}}
    {{--$("#paper_content").append("<iframe class='aas' src='http://localhost:8000/pdf/3'></iframe>");--}}
    {{--}--}}
    {{--function aa2() {--}}
    {{--// $("#paper_content").find("#PrintArea").printArea();--}}
    {{--//   document.getElementById("aas").contentWindow.print();--}}
    {{--//      $(".aas").get(0).contentWindow.print();--}}
    {{--var frm = $(".aas").get(0).contentWindow;--}}
    {{--frm.focus();// focus on contentWindow is needed on some ie versions--}}
    {{--frm.print();--}}
    {{--}--}}
    {{--</script>--}}
    <style>
        #member_table {
            width: 50%;
            text-align: center;
            margin-left: 50px;
            margin-bottom: 25px;
        }

        #member_table th {
            text-align: center;
            padding: 5px;
        }

        #member_table td {
            padding: 5px;
        }

        #print_disabled {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10000;
            background-color: #000000;
            opacity: 0.2;
            display: none;
        }

        #print_word {
            position: fixed;
            top: 25%;
            left: 50%;
            margin: 0 0 0 -77px;
            z-index: 10001;
            color: black;
            font-weight: bold;
            display: none;
        }
    </style>
    {{--<script>--}}
    {{--$(function () {--}}
    {{--});--}}
    {{--</script>--}}
@stop
@section('body')
    <br>
    {!! Form::label('member_select','選擇會員:',['style'=>'margin-left:50px']) !!}&nbsp;&nbsp;
    {!! Form::select('member_select',$account_name, null,['placeholder' => '請選擇會員名稱','id'=>'member_select'])!!}   &nbsp;&nbsp;
    <button id="paper_test">測試</button>
    <button id="paper_test_pt">測試列印</button>
    <button id="member_print">列印</button>
    <button onClick="window.location.href='/account'">回首頁</button>
    <br>
    {!! Form::label('select_all','全選:',['style'=>'margin-left:79px']) !!}
    &nbsp;&nbsp;
    {!! Form::checkbox('select_all',false,null,['id'=>'select_all_member','style'=>'margin-top:20px']) !!}
    <hr style="border:1px black solid;">
    <table id="member_table" border="1">
        <tr>
            <th width="18%">會員編號</th>
            <th>會員姓名</th>
            <th width="20%">狀態</th>
        </tr>
    </table>
    <div id="paper_content">
    </div>
    {{--<ul class="list-side">--}}
        {{--<li><a href="/pdf/3">About</a></li>--}}
        {{--<li><a href="/pdf/7">News</a></li>--}}
        {{--<li><a href="/pdf/9">Product</a></li>--}}
        {{--<li><a href="http://www.ucamc.com/" target="_blank">UCAMC</a></li>--}}
    {{--</ul>--}}
    <div id="iframe">
        <!--jquery 插入html 位址-->
    </div>
    {{--    <div id="print_disabled"></div>--}}{{--畫面區塊置最上層透明--}}{{--
        <div id="print_word">資料加載中...請耐心等候</div>
        <div id="print_spinner"></div>--}}{{--spinner放置位置--}}{{--
        <div id="PrintArea">
            <div class="TableClone">
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
                        <td class="receipt_border_tbr" width="21.5%" style="padding-top:3px;padding-bottom:3px">
                            93北市社會字第2315號
                        </td>
                        <td class="receipt_border_n" rowspan="2" colspan="6"></td>
                        <td class="receipt_title_sm" align="left" width="10%">
                            日&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;期:
                        </td>
                        <td id="receipt_date" colspan="3">0000/00/00</td>
                    </tr>
                    <tr>
                        <td class="receipt_border_tbr" style="padding:3px">統一編號: 99946325</td>
                        <td class="receipt_title_sm">收據編號:</td>
                        <td id="receipt_date_tw" class="receipt_border_n" width="3%">000-</td>
                        <td class="receipt_title_sm_fn" width="7%">TCRM</td>
                        <td id="receipt_top_member_no" class="receipt_border_n" width="8%">000</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="10" height=22px></td>
                    </tr>
                    <tr>
                        <td class="receipt_border_tbr" rowspan="2" style="padding:3px">茲收到 <br>RECEIVED FROM</td>
                        <td class="receipt_border_n" rowspan="2" width="8%"></td>
                        <td id="receipt_top_name" class="receipt_border_bl" rowspan="2" colspan="7" align="center">000</td>
                        <td></td>
                        <td class="receipt_border_n" rowspan="2"></td>
                    </tr>
                    <tr>
                        <td id="receipt_integrate" class="receipt_border_bl" valign="bottom" style="font-size: 12px">
                            0000000p
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="10" height=11px></td>
                    </tr>
                    <tr>
                        <td class="receipt_border_tbr" rowspan="2" style="padding-top:2px;">金額<br>AMOUNT</td>
                        <td class="receipt_border_n" rowspan="2"></td>
                        <td class="receipt_border_n" width="15%" style="padding-top:2px;">新台幣</td>
                        <td id="receipt_total_tw" class="receipt_border_bl" colspan="6"
                            style="font-size: 18px;padding-top: 2px;">零
                        </td>
                        <td style="font-size: 18px">元整</td>
                        <td rowspan="2"></td>
                    </tr>
                    <tr>
                        <td style="padding-top:2px;">NT</td>
                        <td id="receipt_total_nt" class="receipt_border_bl" colspan="7"
                            style="font-size: 18px;padding-top: 2px;">$0,000.00
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="10" height=11px></td>
                    </tr>
                    <tr>
                        <td class="receipt_border_tbr" rowspan="2" style="padding:3px">付款方式<br>BY</td>
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
                        <td class="receipt_border_tbr" rowspan="2" style="padding:3px">用途<br>FOR</td>
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
                <table class="ReceiptDetails" border="1" width="100%" style="text-align: center">
                    <tr class="TitleRemove">
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
                    <tr class="ContentInsert0">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td></td>
                    </tr>
                    <tr class="ContentInsert1">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td valign="top" rowspan="18" style="font-size: 28px;border-top: 1px white solid" width="15%"><u>$&nbsp;&nbsp;&nbsp;00,000</u>
                        </td>
                    </tr>
                    <tr class="ContentInsert2">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr class="ContentInsert3">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr class="ContentInsert4">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr class="ContentInsert5">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr class="ContentInsert6">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr class="ContentInsert7">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr class="ContentInsert8">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr class="ContentInsert9">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr class="ContentInsert10">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr class="ContentInsert11">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr class="ContentInsert12">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr class="ContentInsert13">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr class="ContentInsert14">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr class="ContentInsert15">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr class="ContentInsert16">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr class="ContentInsert17">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr class="ContentInsert18">
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
                        <td id="receipt_address" colspan="11" align="center">0</td>
                    </tr>
                    <tr>
                        <td colspan="11" height=22px></td>
                    </tr>
                    <tr>
                        <td id="receipt_bottom_member_no" align="center" width="24%">000</td>
                        <td id="receipt_bottom_name" class="receipt_title" height="22px">000</td>
                        <td align="center" width="24%">鈞啟</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="receipt_mobile" align="right" valign="bottom" height="22px">0000-000-000</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="11" align="center"><img style="width: 40%" src="{{ '../../img/tcrm003.png' }}"></td>
                    </tr>
                </table>
            </div>
            --}}{{--<p style="page-break-after:always"></p>--}}{{--
        </div>--}}
    {{--<input id="biuuu_button" type="button" value="打印">--}}
    {{--<div id="myPrintArea">.....文本打印部分.....</div> <div class="quote_title">引用</div><div class="quote_div"></div>--}}
@stop