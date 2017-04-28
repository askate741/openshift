@extends('tcrm.home')
@section('show')
    {{ csrf_field() }}{{--防止CSRF攻击(跨站请求伪造攻击--}}
    <table class="table table-hover" id="table" >
        <thead>
        <tr>
            {{--抬頭--}}
            <th class="text-center label_word_size">{!! Form::checkbox('check_all','yes',null,['id'=>'check_all']) !!}</th>
            <th class="text-center label_word_size"></th>
            <th class="text-center label_word_size">日期</th>
            <th class="text-center label_word_size">會員名稱</th>
            <th class="text-center label_word_size">摘要</th>
            <th class="text-center label_word_size">金額</th>
            <th class="text-center label_word_size">收支流向</th>
            <th class="text-center label_word_size">收支憑證</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tabs as $item)
            <tr class="item{{$item->no}}" data-id="{{  $item->no }}" data-token="{{ csrf_token() }}" onDblClick="window.location.href = 'account/{{$item->no}}'">
                <td class="text-center">{!! Form::checkbox('check_no_col[]',null) !!}</td>
                <td class="label_word_size text-center ">{{$item->no}}</td>
                <td class="label_word_size">{{$item->account_date}}</td>
                @if($item->member==null)
                    <td class="label_word_size">無</td>
                @else
                    <td class="label_word_size ">{{$item->member->devotee_name}}</td>
                @endif
                <td class="label_word_size">{{$item->account_memo}}</td>
                <td class="label_word_size">{{$item->account_amount}}</td>
                <td class="label_word_size">{{$item->cert_type}}</td>
                <td class="label_word_size">{{$item->cert}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

