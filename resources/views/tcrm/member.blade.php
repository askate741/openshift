@extends('tcrm.home')
@section('show')
    {{ csrf_field() }}{{--防止CSRF攻击(跨站请求伪造攻击--}}
    <table class="table table-hover" id="table">
        <thead>
        <tr>
            {{--抬頭--}}
            <th class="text-center label_word_size">{!! Form::checkbox('check_all','yes',null,['id'=>'check_all']) !!}</th>
            <th class="text-center label_word_size"></th>
            <th class="text-center label_word_size">姓名</th>
            <th class="text-center label_word_size">通訊縣市</th>
            <th class="text-center label_word_size">通訊鄉鎮市</th>
            <th class="text-center label_word_size">通訊地址</th>
            <th class="text-center label_word_size">手機</th>
            <th class="text-center label_word_size">市話</th>
            <th class="text-center label_word_size">入會日期</th>
            <th class="text-center label_word_size">離職日期</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tabs as $item)
            <tr class="item{{$item->no}}" data-id="{{  $item->no }}" data-token="{{ csrf_token() }}" onDblClick="window.location.href = 'member/{{$item->no}}'">
                <td class="text-center">{!! Form::checkbox('check_no_col[]',null) !!}</td>
                <td class="label_word_size text-center">{{$item->no}}</td>
                <td class="label_word_size">{{$item->devotee_name}}</td>
                <td class="label_word_size">{{$item->add2_city}}</td>
                <td class="label_word_size">{{$item->add2_dist}}</td>
                <td class="label_word_size">{{$item->add2_street}}</td>
                <td class="label_word_size">{{$item->mobile}}</td>
                <td class="label_word_size">{{$item->member_tel	}}</td>
                <td class="label_word_size">{{$item->date_in}}</td>
                <td class="label_word_size">{{$item->date_out}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop
