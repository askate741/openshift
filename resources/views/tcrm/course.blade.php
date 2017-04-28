@extends('tcrm.home')
@section('show')
        {{ csrf_field() }}{{--防止CSRF攻击(跨站请求伪造攻击--}}
            <table class="table table-hover" id="table">
                <thead>
                <tr>
                    {{--抬頭--}}
                    <th class="text-center label_word_size">{!! Form::checkbox('check_all','yes',null,['id'=>'check_all']) !!}</th>
                    <th class="text-center label_word_size"></th>
                    <th class="text-center label_word_size">課程分類</th>
                    <th class="text-center label_word_size">課程名稱</th>
                    <th class="text-center label_word_size">主辦單位</th>
                    <th class="text-center label_word_size">牧者同工</th>
                    <th class="text-center label_word_size">課程日期-起</th>
                    <th class="text-center label_word_size">課程日期-仡</th>
                    <th class="text-center label_word_size">堂數</th>
                    <th class="text-center label_word_size">備註</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tabs as $item)
                    <tr class="item{{$item->no}}" data-id="{{  $item->no }}" data-token="{{ csrf_token() }}" onDblClick="window.location.href = 'course/{{$item->no}}'">
                        <td class="text-center">{!! Form::checkbox('check_no_col[]',null) !!}</td>
                        <td class="label_word_size text-center">{{$item->no}}</td>
                        <td class="label_word_size">{{$item->course_type->course_type_name}}</td>
                        <td class="label_word_size">{{$item->course_name}}</td>
                        <td class="label_word_size">{{$item->church->church_name}}</td>
                        <td class="label_word_size">{{$item->member->devotee_name}}</td>
                        <td class="label_word_size">{{$item->date_start}}</td>
                        <td class="label_word_size">{{$item->date_end}}</td>
                        <td class="label_word_size">{{$item->section_count}}</td>
                        <td class="label_word_size">{{$item->course_memo}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
@stop
