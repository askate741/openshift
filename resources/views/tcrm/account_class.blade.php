@extends('tcrm.home')
@section('show')
        {{ csrf_field() }}{{--防止CSRF攻击(跨站请求伪造攻击--}}
            <table class="table table-hover" id="table">
                <thead>
                <tr>
                    {{--抬頭--}}
                    <th class="text-center label_word_size">{!! Form::checkbox('check_all','yes',null,['id'=>'check_all']) !!}</th>
                    <th class="text-center label_word_size"></th>
                    <th class="text-center label_word_size">會計類別</th>
                    <th class="text-center label_word_size">會計科目1</th>
                    <th class="text-center label_word_size">會計科目2</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tabs as $item)
                    <tr class="item{{$item->no}}" data-id="{{  $item->no }}" data-token="{{ csrf_token() }}" onDblClick="window.location.href = 'account_class/{{$item->no}}'">
                        <td class="text-center">{!! Form::checkbox('check_no_col[]',null) !!}</td>
                        <td class="label_word_size text-center">{{$item->no}}</td>
                        @if($item->class =="0")
                            <td class="label_word_size">收入</td>
                        @elseif($item->class =="1")
                            <td class="label_word_size"> 支出</td>
                        @endif
                        <td class="label_word_size">{{$item->sub1class->subclass1_name}}</td>
                        <td class="label_word_size">{{$item->sub2class->subclass2_name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
@stop
