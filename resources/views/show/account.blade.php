@extends('tcrm.show')
@section('showData')
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>帳務編號:&nbsp{{$account->no}}</strong></h3>
        </div>
        <div class="panel-body">
            <div class="list-group">
                <a class="list-group-item"><strong>日期:</strong>&nbsp{{$account->account_date}}</a>
                <a class="list-group-item"><strong>會計科目編號:</strong>&nbsp{{$account->account_class_no}}</a>
                <a class="list-group-item"><strong>會員名稱:</strong>&nbsp{{$account->member->devotee_name}}</a>
                <a class="list-group-item"><strong>摘要:</strong>&nbsp{{$account->account_memo}}</a>
                <a class="list-group-item"><strong>金額:</strong>&nbsp{{$account->account_amount}}元</a>
                <a class="list-group-item"><strong>收支流向:</strong>&nbsp{{$account->cert_type}}</a>
                <a class="list-group-item"><strong>收支憑證:</strong>&nbsp{{$account->cert}}</a>
            </div>
        </div>
    </div>
@stop