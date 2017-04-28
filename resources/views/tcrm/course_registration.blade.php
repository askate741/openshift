@extends('tcrm.home')

@section('show')
        {{ csrf_field() }}{{--防止CSRF攻击(跨站请求伪造攻击--}}
            <table class="table table-hover" id="table">
                <thead>
                <tr>
                    {{--抬頭--}}
                    <th class="text-center label_word_size">{!! Form::checkbox('check_all','yes',null,['id'=>'check_all']) !!}</th>
                    <th class="text-center label_word_size"></th>
                    <th class="text-center label_word_size">會員名稱</th>
                    <th class="text-center label_word_size">課程分類</th>
                    <th class="text-center label_word_size">課程名稱</th>
                    <th class="text-center label_word_size">參與人數</th>

                </tr>
                </thead>
                <tbody>
                @foreach($tabs as $item)
                    <tr class="item{{$item->no}}" data-id="{{  $item->no }}" data-token="{{ csrf_token() }}" onDblClick="window.location.href = 'course_registration/{{$item->no}}'">
                        <td class="text-center">{!! Form::checkbox('check_no_col[]',null) !!}</td>
                        <td class="label_word_size text-center">{{$item->no}}</td>
                        <td class="label_word_size">{{$item->member->devotee_name}}</td>
                        <td class="label_word_size">{{$item->course_type->course_type_name}}</td>
                        <td class="label_word_size">{{$item->course->course_name}}</td>
                        <td class="label_word_size">{{$item->people_count}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
@stop