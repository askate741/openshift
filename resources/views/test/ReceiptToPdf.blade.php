@extends('app')
@section('css')
    <script type='text/javascript' src={{ '../../js/slider.js' }}></script>{{--引入右側選單JS--}}
    {{--<link type="text/css" rel="stylesheet" href={{ '../../css/content.css' }}>--}}{{--引入內容用CSS--}}
    {{--<script type='text/javascript' src={{ '../../js/CallMemberAjax.js' }}></script>--}}{{--引入課程分類連動JS--}}
    <script type='text/javascript' src={{ '../../js/ReceiptToPdf.js' }}></script>{{--引入ajax--}}
    <script type='text/javascript' src={{ '../../js/NumberToChinese.js' }}></script>{{--引入數字轉中文金額--}}
    <link type="text/css" rel="stylesheet" href={{ '../../css/pdf.css' }}>{{--引入PDF用CSS--}}
    @yield('css2')

@stop
@section('body')
    <div class="background">
        <div id="option_up">
            {!! Form::open(['url'=>'pdf']) !!}
            <input type="button" onClick="window.location.href='/account'" value=" 回主頁 ">
            <input type="button" onClick="printdiv('pdf_print');" value=" 列印 ">
            {!! Form::submit('送出') !!}
            {{--<p>滑鼠位於座標 <span></span>.</p>--}}
            <br>
            <br>
            <input type="button" id="Increase" value="增加">
            <input type="button" id="Reduce" value="減少">
            {!! Form::text('IncreaseNum',null,['id'=>'IncreaseNum','size'=>'3','style'=>'text-align:center']) !!}
            <br>
            <br>
            <div id="IncreaseField">
                @for ($i = 1; $i <= 5; $i++)
                    <br>
                    {!! Form::select('account_person'.$i,$account_name,null,['placeholder' => '請選擇會員','id'=>'account_person'.$i,'style'=>'display:none','disabled'=>'disabled']) !!}
                    {!! Form::hidden('account_date'.$i,null,['id'=>'account_date'.$i]) !!}
                    {!! Form::hidden('account_member_name'.$i,null,['id'=>'account_member_name'.$i]) !!}
                    {!! Form::hidden('account_address'.$i,null,['id'=>'account_address'.$i]) !!}
                    {!! Form::hidden('account_total_nt'.$i,null,['id'=>'account_total_nt'.$i]) !!}
                    {!! Form::hidden('account_cert_type'.$i,null,['id'=>'account_cert_type'.$i]) !!}
                    {!! Form::hidden('account_member_type'.$i,null,['id'=>'account_member_type'.$i]) !!}
                    {!! Form::hidden('account_mobile'.$i,null,['id'=>'account_mobile'.$i]) !!}
                    {!! Form::hidden('account_date_tw'.$i,null,['id'=>'account_date_tw'.$i]) !!}
                    {!! Form::hidden('account_monthday'.$i,null,['id'=>'account_monthday'.$i]) !!}
                    {!! Form::hidden('account_total_tw'.$i,null,['id'=>'account_total_tw'.$i]) !!}
                @endfor
                {!! Form::close() !!}
            </div>
            {{--<select id="account_person" name="account_person">--}}
            {{--<option selected="selected">請選擇會員</option>--}}
            {{--@foreach($accounts as $account)--}}
            {{--<option value="{{$account->member_no}}">{{$account->member->devotee_name}}</option>--}}
            {{--@endforeach--}}
            {{--</select>--}}

            <br>
            <br>
            <div id="account_content" style="background-color: white;border: 1px solid black;">

            </div>
        </div>
        <div id="pdf_print">
            <img id='pdf' src="{{ '../../downloads/0002.jpg' }}">
        </div>
        <script>

            function printdiv(printpage) {
//                window.location.reload();
                var headstr = "<html><head><title></title></head><body>";
                var footstr = "</body>";
                var newstr = document.all.item(printpage).innerHTML;
                var oldstr = document.body.innerHTML;
                document.body.innerHTML = headstr + newstr + footstr;
                window.print();
                document.body.innerHTML = oldstr;
                return false;
            }
//                                    $(document).ready(function () {
//                                        $(document).mousemove(function (e) {
//                                            $("span").text((e.pageX-361)/3.694 + ", " + (e.pageY-256)/3.6029);
//                                        });
//                                    });
        </script>
        {{--<script>--}}
        {{--$(function () {--}}
        {{--$("#draggable").draggable();--}}
        {{--});--}}
        {{--</script>--}}
    </div>
@stop
