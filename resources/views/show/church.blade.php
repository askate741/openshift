@extends('tcrm.show')
@section('showData')
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>教會名稱:&nbsp{{$church->church_name}}</strong></h3>
        </div>
        <div class="panel-body">
            <div class="list-group">
                <a class="list-group-item"><strong>通訊郵遞區號:</strong>&nbsp{{$church->add_zipcode}}</a>
                <a class="list-group-item"><strong>通訊縣市:</strong>&nbsp{{$church->add_city}}</a>
                <a class="list-group-item"><strong>通訊鄉鎮市區:</strong>&nbsp{{preg_replace('/([0-9])/i','',$church->add_dist)}}
                </a>
                <a class="list-group-item"><strong>通訊地址:</strong>&nbsp{{$church->add_street}}</a>
                <a class="list-group-item"><strong>電話號碼:</strong>&nbsp{{$church->church_tel}}</a>
                <a class="list-group-item"><strong>相關網站:</strong>&nbsp{{$church->ext}}</a>
                <a class="list-group-item"><strong>聯絡人:</strong>&nbsp{{$church->contact}}</a>
            </div>
        </div>
    </div>
@stop