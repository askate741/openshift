@extends('tcrm.show')
@section('showData')
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>課程名稱:&nbsp{{$course->course_name}}</strong></h3>
        </div>
        <div class="panel-body">
            <div class="list-group">
                <a class="list-group-item"><strong>課程分類:</strong>&nbsp{{$course->course_type->course_type_name}}</a>
                <a class="list-group-item"><strong>主辦單位:</strong>&nbsp{{$course->church->church_name}}</a>
                <a class="list-group-item"><strong>牧者同工:</strong>&nbsp{{$course->member->devotee_name}}</a>
                <a class="list-group-item"><strong>課程日期-起:</strong>&nbsp{{$course->date_start}}</a>
                <a class="list-group-item"><strong>課程日期-迄:</strong>&nbsp{{$course->date_end}}</a>
                <a class="list-group-item"><strong>堂數:</strong>&nbsp{{$course->section_count}}</a>
                <a class="list-group-item"><strong>備註:</strong>&nbsp{{$course->course_memo}}</a>
            </div>
        </div>
    </div>
@stop