@extends('tcrm.show')
@section('showData')
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>會計類別:&nbsp{{$account_class->class}}</strong></h3>
        </div>
        <div class="panel-body">
            <div class="list-group">
                <a class="list-group-item"><strong>會計科目1:</strong>&nbsp{{$account_class->sub1class->subclass1_name}}</a>
                <a class="list-group-item"><strong>會計科目2:</strong>&nbsp{{$account_class->sub2class->subclass2_name}}</a>
            </div>
        </div>
    </div>
@stop