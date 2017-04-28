@extends('tcrm.home')
@section('show')
    {{ csrf_field() }}{{--防止CSRF攻击(跨站请求伪造攻击--}}
    <table class="table table-hover" id="table">
        <thead>
        <tr>
            {{--抬頭--}}
            <th class="text-center label_word_size">{!! Form::checkbox('check_all','yes',null,['id'=>'check_all']) !!}</th>
            <th class="text-center label_word_size"></th>
            <th class="text-center label_word_size">教會名稱</th>
            <th class="text-center label_word_size">通訊郵遞區號</th>
            <th class="text-center label_word_size">通訊縣市</th>
            <th class="text-center label_word_size">通訊鄉鎮市</th>
            <th class="text-center label_word_size">通訊地址</th>
            <th class="text-center label_word_size">聯絡電話</th>
            <th class="text-center label_word_size">分機</th>
            <th class="text-center label_word_size">聯絡人</th>
        </tr>
        </thead>

        <tbody>

        @foreach($tabs as $item)
            <tr class="item{{$item->no}}" data-id="{{  $item->no }}" data-token="{{ csrf_token() }}" onDblClick="window.location.href = 'church/{{$item->no}}'">
                <td class="text-center">{!! Form::checkbox('check_no_col[]',null) !!}</td>
                <td class="label_word_size text-center">{{$item->no}}</td>
                <td class="label_word_size">{{$item->church_name}}</td>
                <td class="label_word_size">{{$item->add_zipcode}}</td>
                <td class="label_word_size">{{$item->add_city}}</td>
                <td class="label_word_size">{{$item->add_dist}}</td>
                <td class="label_word_size">{{$item->add_street}}</td>
                <td class="label_word_size">{{$item->church_tel	}}</td>
                <td class="label_word_size">{{$item->ext}}</td>
                <td class="label_word_size">{{$item->contact}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

@stop
