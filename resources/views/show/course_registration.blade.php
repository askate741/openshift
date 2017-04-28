@extends('tcrm.show')
@section('showData')
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>修課名稱:&nbsp{{$course_registration->course->course_name}}</strong></h3>
        </div>
        <div class="panel-body">
            <div class="list-group">
                <a class="list-group-item"><strong>會員名稱:</strong>&nbsp{{$course_registration->member->devotee_name}}</a>
                <a class="list-group-item"><strong>參與人數:</strong>&nbsp{{$course_registration->people_count}}</a>
            </div>
        </div>
    </div>
@stop