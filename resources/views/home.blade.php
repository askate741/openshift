@extends('app')
<meta http-equiv="refresh" content="0.5;{{url("/account")}}">
@include('cells.balloon')
@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">訊息</div>
                <div class="panel-body">
                    你已經登入!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
